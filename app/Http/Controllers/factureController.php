<?php

namespace App\Http\Controllers;

use App\Models\FactureTypeSec;
use App\Models\Operateur;
use App\Models\Resident;
use App\Models\FactureType;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Batiment;
use \Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class factureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batiment = Batiment::all();
        $type = FactureType::all();
        $type_sec = FactureTypeSec::all();
        $facture = DB::table('facture_batiment')->orderBy('id', 'DESC')->simplePaginate(10);
        return view('facture.facture')
            ->with('facture',$facture)
            ->with('batiment',$batiment)
            ->with('type_sec',$type_sec)
            ->with('type',$type);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bat = Batiment::all();
        $res = Resident::all()->sortBy("Nom");
        $type_fact = FactureType::all();
        $operateur = Operateur::all()->sortBy("nom_ope");
        $type_fact_sec = FactureTypeSec::all();
        return view('facture.create')
            ->with('bat',$bat)
            ->with('res',$res)
            ->with('type_fact',$type_fact)
            ->with('type_fact_sec',$type_fact_sec)
            ->with('operateur',$operateur)
            ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $id_res = $request->input('resident');
            $sig = "";
            $type_sec = $request->input('fact_type_sec');
            $date = $request->input('date_ajout');
            if($request->input('type_facture')=="Facture des entrées"){
                $sig = "res";
            }
            else if ($request->input('type_facture')=="Facture des dépenses"){
                if($type_sec == "f_ope"){
                    $sig = "ope";
                }
                else{
                    $sig = "fact";
                }
            }
            if($sig == "res") {
                $res = Resident::find($id_res);
                $nom_res = $res->Nom . ' ' . $res->Prenom;
                $type_fact = $request->input('type_facture');
                $check = Facture::all()->where('Id_res','like',$id_res);
                $exp = explode('-',$date);
                foreach ($check as $dt) {
                    $exdate = explode('-',$dt->date_ajout);
                    if($exdate[1]==$exp[1]){
                        return back()->with('error','facture existe déja');
                    }
                }
                if ($type_fact == "Facture des entrées") {
                    $this->validate($request, [
                        'resident' => 'required',
                        'date_ajout' => 'required',
                        'montant' => 'required',
                        'batiment' => 'required',
                    ]);
                    $facture = new Facture();
                    $facture->type_facture = $request->input('type_facture');
                    $facture->reference_facture = 'facture_' . $request->input('date_ajout') . '_res-' . $id_res;
                    $facture->date_ajout = $request->input('date_ajout');
                    $facture->montant = $request->input('montant');
                    $facture->batiment = $request->input('batiment');
                    $facture->description_amelioration = $request->input('description');
                    $facture->Id_res = $id_res;
                    $facture->nom_res = $nom_res;
                    $facture->save();
                    return redirect('/facture')->with('success', 'facture ajoutée avec succée');
                }
            }
            else if($sig == "ope") {
                $check = Facture::all()->where('id_ope','like',$request->input('operateur'));
                $exp = explode('-',$date);
                foreach ($check as $dt) {
                    $exdate = explode('-',$dt->date_ajout);
                    if($exdate[1]==$exp[1]){
                        return back()->with('error','facture existe déja');
                    }
                }
                $oper = Operateur::find($request->input('operateur'));
                $facture = new Facture();
                $facture->type_facture = $request->input('type_facture');
                $facture->type_fact_sec = 'Facture Operateur';
                $facture->reference_facture = 'facture' . '_' . $request->input('fact_type_sec') . "_" . $oper->id . date('Y-m-d') . '_' . time();
                $facture->date_ajout = $request->input('date_ajout');
                $facture->id_ope = $request->input("operateur");
                $facture->montant = $request->input('montant');
                $facture->batiment = $request->input('batiment');
                $facture->description_amelioration = $request->input('description');
                $facture->nom_ope = $oper->nom_ope . " " . $oper->prenom_ope;
                $facture->save();
                return redirect('/facture')->with('success', 'facture ajoutée avec succée');
            }
            else if($sig == "fact"){
                try {
                    $facture = new Facture();
                    if($request->input('fact_type_sec') == 'f_elec'){
                        $name = "Facture d'electricite";
                    }
                    else if($request->input('fact_type_sec') == 'f_eau'){
                            $name = "Facture d'eau";
                    }
                    else if ($request->input('fact_type_sec') == 'f_amelioration'){
                        $name = "Facture d'amelioration";
                    }
                    else{
                        $name = $request->input('fact_type_sec');
                    }





                    $facture->type_facture = $request->input('type_facture');






                    if($type_sec == 'f_elec' || $type_sec == 'f_eau'){
                        if($type_sec == 'f_elec'){
                            $check = DB::table('facture_batiment')->where('type_fact_sec','like',"Facture d'electricite")->get();
                            $exp = explode('-',$date);
                            foreach ($check as $dt) {
                                $exdate = explode('-',$dt->date_ajout);
                                if($exdate[1]==$exp[1]){
                                    return back()->with('error','facture existe déja');
                                }
                            }
                        }
                        if($type_sec == 'f_eau'){
                            $check1 = DB::table('facture_batiment')->where('type_fact_sec','like',"Facture d'eau")->get();
                            $exp = explode('-',$date);
                            foreach ($check1 as $dt) {
                                $exdate = explode('-',$dt->date_ajout);
                                if($exdate[1]==$exp[1]){
                                    return back()->with('error','facture existe déja');
                                }
                            }
                        }

                        $facture->reference_facture = $request->input('reference');
                    }
                    else{
                        $facture->reference_facture = 'facture' . '_' . $request->input('fact_type_sec') . "_". date('Y-m-d') . '_' . time();
                    }
                    $facture->date_ajout = $request->input('date_ajout');
                    $facture->montant = $request->input('montant');
                    $facture->batiment = $request->input('batiment');
                    $facture->description_amelioration = $request->input('description');
                    $facture->type_fact_sec = $name;
                    $facture->save();
                    return redirect('/facture')->with('success', 'facture ajoutée avec succée');
                } catch (QueryException $e) {
                    $errorCode = $e->errorInfo[1];
                    if ($errorCode == 1062) {
                        return redirect('/facture/create')->with('error', 'facture existe déja');
                    }
                }
            }

    }


    public function setBatimentR(Request $request){
        $outputs = '';
        $outputs1 = '';
        if($request->ajax()){
            $bat = DB::table('residents')
                ->where('Id_resident','=',$request->value)
                ->value('adresse');
                $outputs .= '<option value="'.$bat.'">'.$bat.'</option>';
            return Response([$outputs]);
        }

    }

    public function setApt(Request $request){
        if($request->ajax()){
            $apt = DB::table('residents')
                ->where('Id_resident','=',$request->value1)
                ->value('num_apt');
            return Response($apt);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fac = Facture::find($id);
        $type = "";
        if($fac != null){
            if($fac->nom_ope != null){
                $type = "'operateur";
            }
            else if($fac->nom_res != null){
                $type = "e résident";
            }
        }
        return view('facture.show',)->with('type',$type)->with('fac',$fac);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facture = Facture::find($id);
        $batiment = Batiment::all();
        $allfac = FactureType::all();
        return view('facture.edit')
            ->with('facture',$facture)
            ->with('allfac',$allfac)
            ->with('batiment',$batiment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'type_facture'=>'required',
            'reference'=>'required',
            'date_ajout'=>'required',
            'montant'=>'required',
            'batiment'=>'required'
        ]);
        $facture = Facture::find($id);
        $facture->type_facture = $request->input('type_facture');
        $facture->reference_facture = $request->input('reference');
        $facture->date_ajout = $request->input('date_ajout');
        $facture->montant = $request->input('montant');
        $facture->batiment = $request->input('batiment');
        $facture->save();
        return redirect('/facture')->with('success','Facture modifiée avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facture = Facture::find($id);
        $facture->delete();
        return redirect('facture')->with('success','Facture supprimée avec succée');
    }
    public function search()
    {
        $batiment = Batiment::all();
        $id = $_GET['id'];
        $type_fact = $_GET['type_fact'];
        $type_sec_fact = $_GET['type_fact_sec'];
        $bat = $_GET['batiment'];
        $month = $_GET['month'];
        if(isset($_GET['id_res'])){
            $res = $_GET['id_res'];
        }
        else{
            $res = "";
        }
        $type_sec = FactureTypeSec::all();
        $type = FactureType::all();
        if (!empty($month)){
            if(!empty($res)){
            $facture = Facture::where('type_facture','like','%'.$type_fact.'%')
                //->where('reference_facture','like','%'.$reference.'%')
                ->where('id','like','%'.$id.'%')
                ->where('type_fact_sec','like','%'.$type_fact.'%')
                ->whereMonth('date_ajout',$month)
                ->where('Id_res','like',$res)
                ->where('batiment','like','%'.$bat.'%')->simplePaginate(10);
            $facture->appends(['id'=>$id,'type_fact'=>$type_fact,'batiment'=>$bat,'month'=>$month]);
            }
            else{
                $facture = Facture::where('id','like','%'.$id.'%')
                    //->where('reference_facture','like','%'.$reference.'%')
                    ->where('type_facture','like','%'.$type_fact.'%')
                    ->whereMonth('date_ajout',$month)
                    ->where('Id_res','like','%'.$res.'%')
                    ->where('batiment','like','%'.$bat.'%')->simplePaginate(10);
                $facture->appends(['id'=>$id,'type_fact'=>$type_fact,'batiment'=>$bat,'month'=>$month]);
            }
        }
        else{
            if(!empty($res)){
                $facture = Facture::where('type_facture','like','%'.$type_fact.'%')
                    //->where('reference_facture','like','%'.$reference.'%')
                    ->where('id','like','%'.$id.'%')
                    ->where('Id_res','like',$res)
                    ->where('batiment','like','%'.$bat.'%')->simplePaginate(10);
                $facture->appends(['id'=>$id,'type_fact'=>$type_fact,'batiment'=>$bat,'month'=>$month,'id_res'=>$res]);
            }
            else{
                $facture = Facture::where('type_facture','like','%'.$type_fact.'%')
                    //->where('reference_facture','like','%'.$reference.'%')
                    ->where('id','like','%'.$id.'%')
                    ->where('batiment','like','%'.$bat.'%')->simplePaginate(10);
                $facture->appends(['id'=>$id,'type_fact'=>$type_fact,'batiment'=>$bat,'month'=>$month]);
            }
        }
        return view('facture.search')
            ->with('facture',$facture)
            ->with('type',$type)
            ->with('type_sec', $type_sec)
            ->with('batiment',$batiment);
    }
    public function factureAdd(){
        return view('facture.facture_payment');
    }
    public function typeAdd(Request $request){
            $request->validate([
                'valeur_type'=>'required'
            ]);
        try{
            $type = new FactureType;
            $type->valeur_type = $request->input('valeur_type');
            $type->save();
        }
        catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect('/facture/create')->with('error','Type existe déja ');
            }
        }
        return redirect('/facture/create')->with('success','Type ajouté avec succes');
    }
    public function addSecType(Request $request){
        try{
            $sec_type = new FactureTypeSec;
            $sec_type->type_facture_sec = $request->input('valeur_type_sec');
            $sec_type->nom_type_sec = $request->input('nom_type_sec');
            $sec_type->save();
        }
        catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect('/facture/create')->with('error','Type existe déja ');
            }
        }
        return redirect('/facture/create')->with('success','Type ajouté avec succée');
    }
    public function delType($id){
        $type = FactureType::find($id);
        $type->delete();
        return redirect('/facture/create')->with('success','type supprimé avec sucée');
    }
    public function delSecType($id){
        $type = FactureTypeSec::find($id);
        $type->delete();
        return redirect('/facture/create')->with('success','type secondaire supprimé avec sucée');
    }
    public function pay($id){
        $facture = Facture::find($id);
        if($facture->statut == 'impayée'){
            $facture->date_payment = date('Y-m-d');
            $facture->statut = 'payée';
            $facture->save();
            return back()->with('success','votre facture a été payée avec succée');
        }
        else{
            return redirect('/facture')->with('error','facture payée');
        }
    }
    public function generate(){
        $last_gen = DB::table('dernier_gen')->max('last_gen');
        $date = explode('-',$last_gen);
        $resident = Resident::all();
        $fact_date = Facture::all();
        if ($date[1] == Carbon::now()->month){
            return redirect('/facture')->with('error','les factures de ce mois deja crées');
        }
        else{
            DB::insert("insert into dernier_gen values(NULL,'".date('Y-m-d')."');");
            foreach($resident as $res){
                $fact = new Facture();
                $fact->type_facture = "Facture des entrées";
                $fact->reference_facture = 'facture_'.date('Y-m-d').'_res-'.$res->Id_resident;
                $fact->date_ajout = date('Y-m-d');
                $fact->montant = 120;
                $fact->batiment = $res->adresse;
                $fact->Id_res = $res->Id_resident;
                $fact->nom_res = $res->Nom. $res->Prenom;
                $fact->save();
            }
            return redirect('/facture')->with('success','les factures mois crées avec succée');
        }
    }
}
