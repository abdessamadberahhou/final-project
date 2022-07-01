<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Operateur;
use App\Models\Batiment;
use Illuminate\Support\Facades\DB;

class operatorController extends Controller
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
            $operateur = DB::table('operateur')->orderBy('id')->cursorPaginate(10);
            $type_ope = DB::table('operateur')->select('type_ope')->distinct()->get();
            return view('operateur.operateur')
                ->with('operateur',$operateur)
                ->with('type_ope',$type_ope);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operateur = Operateur::distinct()->get(['type_ope']);
        return view('operateur.create')
            ->with('operateur',$operateur);

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
            'nom_ope'=>'required',
            'prenom_ope'=>'required',
            'date_nai_ope'=>'required',
            'date_emb_ope'=>'required',
            'CIN_ope'=>'required',
            'num_tele_ope'=>'required',
            'type_ope'=>'required',
            'salaire'=>'required'
        ]);
        $ope = new Operateur();
        $ope->nom_ope = $request->input('nom_ope');
        $ope->nom_ope = $request->input('prenom_ope');
        $ope->date_nai_ope = $request->input('date_nai_ope');
        $ope->date_emb_ope = $request->input('date_emb_ope');
        $ope->cin_ope = $request->input('CIN_ope');
        $ope->num_tele_ope = $request->input('num_tele_ope');
        $ope->type_ope = $request->input('type_ope');
        $ope->salaire = $request->input('salaire');
        if (preg_match('~[0-9]+~', $ope->nom_ope) ||preg_match('~[0-9]+~', $ope->nom_ope )) {
            return  back()->with('error', "la champ nom ou prénom n est pas validé");
        }
        if(preg_match("/[A-Za-z]/", $ope->num_tele_ope ) || preg_match("/[A-Za-z]/", $ope->num_tele_ope )){
            return  back()->with('error', "numéro de téléphone n est pas validé");
        }
        $ope->save();
        return redirect('/operateur')->with('success','Operateur ajoutee avec succee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ope = Operateur::find($id);
        $jan = DB::table("facture_batiment")->whereMonth("date_ajout",Carbon::JANUARY)->where("id_ope",'like',$id)->value("statut");
        $feb = DB::table("facture_batiment")->whereMonth("date_ajout",Carbon::FEBRUARY)->where("id_ope",'like',$id)->value("statut");
        $mar = DB::table("facture_batiment")->whereMonth("date_ajout",Carbon::MARCH)->where("id_ope",'like',$id)->value("statut");
        $apr = DB::table("facture_batiment")->whereMonth("date_ajout",Carbon::APRIL)->where("id_ope",'like',$id)->value("statut");
        $may = DB::table("facture_batiment")->whereMonth("date_ajout",Carbon::MAY)->where("id_ope",'like',$id)->value("statut");
        $jun = DB::table("facture_batiment")->whereMonth("date_ajout",Carbon::JUNE)->where("id_ope",'like',$id)->value("statut");
        $jul = DB::table("facture_batiment")->whereMonth("date_ajout",Carbon::JULY)->where("id_ope",'like',$id)->value("statut");
        $aug = DB::table("facture_batiment")->whereMonth("date_ajout",Carbon::AUGUST)->where("id_ope",'like',$id)->value("statut");
        $sep = DB::table("facture_batiment")->whereMonth("date_ajout",Carbon::SEPTEMBER)->where("id_ope",'like',$id)->value("statut");
        $oct = DB::table("facture_batiment")->whereMonth("date_ajout",Carbon::OCTOBER)->where("id_ope",'like',$id)->value("statut");
        $nov = DB::table("facture_batiment")->whereMonth("date_ajout",Carbon::NOVEMBER)->where("id_ope",'like',$id)->value("statut");
        $dec = DB::table("facture_batiment")->whereMonth("date_ajout",Carbon::DECEMBER)->where("id_ope",'like',$id)->value("statut");
        return view('operateur.show',compact('jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec','ope'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ope = Operateur::find($id);
        $operateur = Operateur::distinct()->get(['type_ope']);
        return view('operateur.edit')
            ->with('ope', $ope)
            ->with('operateur', $operateur);
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
            'nom_ope'=>'required',
            'prenom_ope'=>'required',
            'date_nai_ope'=>'required',
            'date_emb_ope'=>'required',
            'CIN_ope'=>'required',
            'num_tele_ope'=>'required',
            'type_ope'=>'required',
            'salaire'=>'required'
        ]);
        $ope = Operateur::find($id);
        $ope->nom_ope = $request->input('nom_ope');
        $ope->prenom_ope = $request->input('prenom_ope');
        $ope->date_nai_ope = $request->input('date_nai_ope');
        $ope->date_emb_ope = $request->input('date_emb_ope');
        $ope->cin_ope = $request->input('CIN_ope');
        $ope->num_tele_ope = $request->input('num_tele_ope');
        $ope->type_ope = $request->input('type_ope');
        $ope->salaire = $request->input('salaire');
        if (preg_match('~[0-9]+~', $ope->nom_ope) ||preg_match('~[0-9]+~', $ope->nom_ope )) {
            return  back()->with('error', "la champ nom ou prénom n est pas validé");
        }
        if(preg_match("/[A-Za-z]/", $ope->num_tele_ope ) || preg_match("/[A-Za-z]/", $ope->num_tele_ope )){
            return  back()->with('error', "numéro de téléphone n est pas validé");
        }
        $ope->save();
        return redirect('/operateur')->with('success','Operateur modifié avec succé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ope = Operateur::find($id);
        $ope->delete();
        return redirect('/operateur')->with('success','Operateur supprimé avec succé');
    }
    public function search(){
        $id = $_GET['id'];
        $nom_ope = $_GET['nom_ope'];
        $type_ope1 = $_GET['type_ope'];
        $type_ope = DB::table('operateur')->select('type_ope')->distinct()->get();
        $operateur = Operateur::where('id','like', '%'.$id.'%')
            ->where('nom_ope','like', '%'.$nom_ope.'%')
            ->where('type_ope','like', '%'.$type_ope1.'%')->cursorPaginate(15);
        return view('operateur.search')
            ->with('operateur',$operateur)
            ->with('type_ope',$type_ope);
    }
}
