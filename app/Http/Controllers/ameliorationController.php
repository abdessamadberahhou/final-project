<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amelioration;
use App\Models\Batiment;
use Illuminate\Support\Facades\DB;

class ameliorationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amelioration = DB::table('amelioration')->orderBy('id_amel')->simplePaginate(10);
        $type_amel = DB::table('amelioration')->select('type_amel')->distinct()->get();
        $batiment = Batiment::all();
        return view('amel.amel')
            ->with('amelioration',$amelioration)
            ->with('type_amel',$type_amel)
            ->with('batiment',$batiment)
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batiment = Batiment::all();
        return view('amel.create')->with('batiment',$batiment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type_amel'=>'required',
            'batiment'=>'required',
            'date_ameli'=>'required',
            'montant'=>'required',
            'description'=>'required'
            ]);
        $amelioration = new Amelioration();
        $amelioration->type_amel = $request->input('type_amel');
        $amelioration->batiment_amel = $request->input('batiment');
        $amelioration->date_amel = $request->input('date_ameli');
        $amelioration->montant_amel = $request->input('montant');
        $amelioration->description_amel = $request->input('description');
        $amelioration->save();
        return redirect('/amelioration')->with('success','Amelioration ajoutée avec succeé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $amelioration = Amelioration::find($id);
        $batiment = Batiment::all();
        return view('amel.show')
            ->with('amelioration',$amelioration)
            ->with('batiment',$batiment)
            ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $amelioration = Amelioration::find($id);
        $all_amel = DB::table('amelioration')->select('type_amel')->distinct()->get();
        $batiment = Batiment::all();
        return view('amel.edit')
            ->with('amelioration',$amelioration)
            ->with('all_amel',$all_amel)
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
        $this->validate($request, [
            'type_amel'=>'required',
            'batiment'=>'required',
            'date_ameli'=>'required',
            'montant'=>'required',
            'description'=>'required'
        ]);
        $amelioration = Amelioration::find($id);
        $amelioration->type_amel = $request->input('type_amel');
        $amelioration->batiment_amel = $request->input('batiment');
        $amelioration->date_amel = $request->input('date_ameli');
        $amelioration->montant_amel = $request->input('montant');
        $amelioration->description_amel = $request->input('description');
        $amelioration->save();
        return redirect('/amelioration')->with('success','Amelioration modifiée avec succeé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $amel = Amelioration::find($id);
        $amel->delete();
        return redirect('/amelioration')->with('success','Amelioration suppreime avec succe');
    }
    public function search(){
        $id = $_GET['id_amel'];
        $type_amel = $_GET['type_amel'];
        $bat = $_GET['batiment'];
        $date_amel = $_GET['date_amel'];
        $amelioration = DB::table('amelioration')
            ->where('id_amel','like','%'.$id.'%')
            ->where('batiment_amel','like','%'.$bat.'%')
            ->where('type_amel','like','%'.$type_amel.'%')->simplePaginate(10);
        $type_amel = DB::table('amelioration')->select('type_amel')->distinct()->get();
        $batiment = Batiment::all();
        return view('amel.search')
            ->with('amelioration',$amelioration)
            ->with('type_amel',$type_amel)
            ->with('batiment',$batiment)
            ;
    }
}
