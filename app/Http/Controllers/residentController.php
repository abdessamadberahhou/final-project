<?php

namespace App\Http\Controllers;
use App\Models\Resident;
use App\Models\Batiment;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class residentController extends Controller
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
        $resident = DB::table('residents')
            ->orderBy('Id_resident', 'desc')
            ->cursorPaginate(10);
        $batiment = Batiment::all();
        return view('resident.resident')
            ->with('resident',$resident)
            ->with('batiment',$batiment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $bat = Batiment::all();
        $outputs = "";
        return view('resident.create')->with('bat',$bat)->with('outputs',$outputs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'prenom'=>'required',
            'nom'=>'required',
            'date_nai'=>'required',
            'CIN'=>'required',
            'num_tele'=>'required|max:14',
            'nb_pers'=>'required',
            'adresse'=>'required',
            'appartement'=>'required',
        ]);
        $nb_apt = DB::table('residents')
            ->where('adresse','like',$request->input('adresse'))
            ->where('num_apt','like',$request->input('appartement'))
            ->value('num_apt');
        if ($nb_apt != 0){
            return back()->with('error','Appartement habité');
        }
        try{
            $resident = new Resident();
            $resident->Nom = $request->input('nom');
            $resident->Prenom = $request->input('prenom');
            $resident->Date_nai = $request->input('date_nai');
            $resident->CIN = $request->input('CIN');
            $resident->num_tele = $request->input('num_tele');
            $resident->nb_pers = $request->input('nb_pers');
            $resident->adresse = $request->input('adresse');
            $resident->date_ajout = date('Y-m-d');
            $resident->montant_a_payer = $request->input('montant_a_payer');
            $resident->num_apt = $request->input('appartement');
            if (preg_match('~[0-9]+~', $resident->Nom) ||preg_match('~[0-9]+~', $resident->Prenom )) {
                return  back()->with('error', "la champ nom ou prénom n est pas validé");
            }
            if(preg_match("/[A-Za-z]/", $resident->num_tele ) || preg_match("/[A-Za-z]/", $resident->nb_pers )){
                return  back()->with('error', "numéro de téléphone ou nombre des personnes n est pas validé");
            }
            $batiment = DB::table('batiment')->where('nom_bat','=',$request->input('adresse'))->limit(1)->value('nb_apt_habite');
            $new_batiment_a = DB::table('batiment')->where('nom_bat','=', $request->input('adresse'))->value('nb_apt');
            if (!($batiment + 1 > $new_batiment_a)){
                DB::update('update batiment set nb_apt_habite = '.($batiment + 1).' where nom_bat like "'.$request->input('adresse').'"');
            }
            else{
                return back()->with('error','Action impossible');
            }
            if (!empty($request->input('montant_a_payer'))){
                $resident->montant_a_payer = $request->input('montant_a_payer');
            }
            $resident->save();
            $nb_hab = DB::table('batiment')->where('nom_bat','like','%'.$request->input('adresse').'%')->value('nb_hab');
            $bat = DB::table('batiment')->where('nom_bat','like','%'.$request->input('adresse').'%');
            $bat->update(array('nb_hab'=>$nb_hab+$request->input('nb_pers')));
            return redirect('/resident')->with('success','Résident ajouté avec succé');
        }
        catch (\Exception $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    return back()->with('error','CIN ou numéro de téléphone est déja existé');
                }
                elseif ($errorCode == 1406){
                    return back()->with('error','Entrer un numéro de téléphone ou CIN validé');
                }
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
        $sum = DB::table('facture_batiment')->where('statut','like','payée')->sum('montant');
        $jan = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::JANUARY)->where('Id_res','like',$id)->value('statut');
        $feb = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::FEBRUARY)->where('Id_res','like',$id)->value('statut');
        $mar = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::MARCH)->where('Id_res','like',$id)->value('statut');
        $apr = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::APRIL)->where('Id_res','like',$id)->value('statut');
        $may = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::MAY)->where('Id_res','like',$id)->value('statut');
        $jun = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::JUNE)->where('Id_res','like',$id)->value('statut');
        $jul = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::JULY)->where('Id_res','like',$id)->value('statut');
        $aug = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::AUGUST)->where('Id_res','like',$id)->value('statut');
        $sep = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::SEPTEMBER)->where('Id_res','like',$id)->value('statut');
        $oct = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::OCTOBER)->where('Id_res','like',$id)->value('statut');
        $nov = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::NOVEMBER)->where('Id_res','like',$id)->value('statut');
        $dec = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::DECEMBER)->where('Id_res','like',$id)->value('statut');
        $rs = Resident::find($id);
        $sum_pay_res = DB::table('facture_batiment')->where('Id_res','like',$id)->where('statut','like','payée')->sum('montant');
        $sum_n_pay_res = DB::table('facture_batiment')->where('Id_res','like',$id)->where('statut','like','impayée')->sum('montant');
        return view('resident.show',compact('jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec','rs','sum','sum_pay_res','sum_n_pay_res'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rs = Resident::find($id);
        $bat = Batiment::all();
        return view('resident.edit')
            ->with('rs',$rs)
            ->with('bat',$bat);
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
            'prenom'=>'required',
            'nom'=>'required',
            'date_nai'=>'required',
            'CIN'=>'required',
            'num_tele'=>'required',
            'nb_pers'=>'required',
            'adresse'=>'required',
        ]);
        try{
        $resident = Resident::find($id);
        $old_batiment = DB::table('batiment')->where('nom_bat','=', $resident->adresse)->value('nb_apt_habite');
        $old_batiment_n = DB::table('batiment')->where('nom_bat','=', $resident->adresse)->value('nom_bat');
        $resident->Nom = $request->input('nom');
        $resident->Prenom = $request->input('prenom');
        $resident->Date_nai = $request->input('date_nai');
        $resident->CIN = $request->input('CIN');
        $resident->num_tele = $request->input('num_tele');
        $resident->nb_pers = $request->input('nb_pers');
        $resident->adresse = $request->input('adresse');
        $new_batiment = DB::table('batiment')->where('nom_bat','=', $request->input('adresse'))->value('nb_apt_habite');
        $new_batiment_a = DB::table('batiment')->where('nom_bat','=', $request->input('adresse'))->value('nb_apt');
            if (preg_match('~[0-9]+~', $resident->Nom) ||preg_match('~[0-9]+~', $resident->Prenom )) {
                return  back()->with('error', "la champ nom ou prénom n est pas validé");
            }
            if(preg_match("/[A-Za-z]/", $resident->num_tele ) || preg_match("/[A-Za-z]/", $resident->nb_pers )){
                return  back()->with('error', "numéro de téléphone ou nombre des personnes n est pas validé");
            }
        if (!($new_batiment + 1 > $new_batiment_a)){
            DB::update('update batiment set nb_apt_habite = '.($new_batiment + 1).' where nom_bat like "'.$request->input('adresse').'"');
        }
        else{
            return back()->with('error','Action Impossible');
        }
        if (!($old_batiment - 1 < 0)){
            DB::update('update batiment set nb_apt_habite = '.($old_batiment - 1).' where nom_bat like "'.$old_batiment_n.'"');

        }
        else{
            return back()->with('error','Action Impossible');
        }
        $resident->save();
        }
        catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect('/resident/'.$id.'/edit')->with('error','CIN ou num de téléphone déja éxisté ');
            }
        }
        return redirect('/resident')->with('success','Résident modifié avec succé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Resident::find($id);
        $hab_batiment = DB::table('batiment')->where('nom_bat','=', $res->adresse)->value('nb_hab');
        $bat = DB::table('batiment')->where('nom_bat','=',$res->adresse)->limit(1)->value('nb_apt_habite');
        DB::update('update batiment set nb_apt_habite = '.($bat + 1).' where nom_bat like "'.$res->adresse.'"');
        DB::update('update batiment set nb_hab = '.($hab_batiment - $res->nb_pers).' where nom_bat like "'.$res->adresse.'"');
        $res->delete();
        DB::delete('delete from facture_batiment where id_res = ?',[$id]);
        return redirect('/resident')->with('success','Résident supprimé avec succé');
    }
    public function search()
    {
        $batiment = Batiment::all();
        $nom = $_GET['nom'];
        $cin = $_GET['CIN'];
        $bat = $_GET['batiment'];
        $prenom = $_GET['prenom'];
        $id = $_GET['id'];
        $resident = Resident::where('Nom','like','%'.$nom.'%')
            ->where('CIN','like','%'.$cin.'%')
            ->where('adresse','like','%'.$bat.'%')
            ->where('Prenom','like','%'.$prenom.'%')
            ->where('Id_resident','like','%'.$id.'%')
            ->orderBy('Id_resident')->cursorPaginate(10);
        $resident->appends(['nom'=>$nom,'CIN'=>$cin,'batiment'=>$bat,'prenom'=>$prenom,'id'=>$id]);
        return view('resident.search')
            ->with('resident',$resident)
            ->with('batiment',$batiment);
    }
    public function selectApt(Request $request){
        $outputs = '<option value="">choisis votre appartement</option>';
        if($request->ajax()){
            $apt = DB::table('batiment')->where('nom_bat','like','%'.$request->test)->value('nb_apt');
            $nb_apt = DB::table('residents')->where('adresse','like','%'.$request->test.'%')->select('num_apt')->get();
            for ($i=1;$i<=$apt;$i++){
                $outputs .= '<option value="'.$i.'">'.$i.'</option>';
            }
            return Response($outputs);
        }

    }
}
