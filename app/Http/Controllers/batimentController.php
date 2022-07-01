<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Resident;
use Illuminate\Http\Request;
use App\Models\Batiment;
use App\Models\Operateur;

class batimentController extends Controller
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
        $batiment = Batiment::orderBy('id','desc')->get();
        return view('batiment.batiment')->with('batiment',$batiment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fem = 'femme de menage';
        $operateur = Operateur::where('type_ope', $fem)->get();
        return view('batiment.create')->with('operateur',$operateur);
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
            'nb_apt'=>'required',
            'adresse'=>'required',
            'nb_hab'=>'required',
            'date_cons'=>'required',
            'femme_men'=>'required',
        ]);
        $batiment = new Batiment();
        $batiment->nb_apt = $request->input('nb_apt');
        $batiment->adresse = $request->input('adresse');
        $batiment->nb_hab = $request->input('nb_hab');
        $batiment->date_cons = $request->input('date_cons');
        $batiment->femme_men = $request->input('femme_men');
        $batiment->save();
        $max = $batiment->max('id');
        $bat = Batiment::find($max);
        $bat->nom_bat = 'batiment '.$max;
        $bat->save();
        return redirect('/batiment')->with('success','batiment ajouté avec succé');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $batiment = Batiment::find($id);
        return view('batiment.show')->with("batiment",$batiment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $batiment = Batiment::find($id);
        $operateur = Operateur::where('type_ope','femme de menage')->get();
        return view('batiment.edit')
            ->with('batiment',$batiment)
            ->with('operateur',$operateur);
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
            'nb_apt'=>'required',
            'adresse'=>'required',
            'nb_hab'=>'required',
            'date_cons'=>'required',
            'femme_men'=>'required',
            'nom_bat'=>'required'
        ]);
        $batiment = Batiment::find($id);
        $batiment->nb_apt = $request->input('nb_apt');
        $batiment->adresse = $request->input('adresse');
        $batiment->nb_hab = $request->input('nb_hab');
        $batiment->date_cons = $request->input('date_cons');
        $batiment->femme_men = $request->input('femme_men');
        $batiment->nom_bat = $request->input('nom_bat');
        $batiment->save();
        return redirect('/batiment')->with('success','Batiment modifié avec succé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batiment = Batiment::find($id);
        $batiment->delete();
        return redirect('batiment')->with('success','batiment supprimé avec succé');
    }

    public function search()
    {
        $id = $_GET['id'];
        $nb_apt = $_GET['nb_apt'];
        $adresse = $_GET['adresse'];
        $femme_men = $_GET['femme_men'];
        $batiment = Batiment::where('id','like','%'.$id.'%')
            ->where('nb_apt','like','%'.$nb_apt.'%')
            ->where('adresse','like','%'.$adresse.'%')
            ->where('femme_men','like','%'.$femme_men.'%')
            ->get();
        return view('batiment.search')
            ->with('batiment',$batiment);
    }
}
