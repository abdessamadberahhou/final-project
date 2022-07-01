<?php

namespace App\Http\Controllers;

use App\Models\Batiment;
use App\Models\Facture;
use App\Models\FactureType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class printController extends Controller
{
    public function __constructor(){
        $this->middleware('auth');
    }
    public function printFact($id){
        $type = '';
        $facture = Facture::find($id);
        if($facture->nom_ope != Null){
            $type = "'operateur";
        }
        else if($facture->nom_res != Null){
            $type = "e résident";
        }
        return view('print.imprime_fact')->with('facture',$facture)->with('type',$type);
    }
    public function index()
    {
        $batiment = Batiment::all();
        $type = FactureType::all();
        $facture = DB::table('facture_batiment')->orderBy('id')->simplePaginate(10);
        return view('print.all_fac')
            ->with('facture',$facture)
            ->with('batiment',$batiment)
            ->with('type',$type);
    }
    public function search()
    {
        $batiment = Batiment::all();
        $id = $_GET['id'];
        $type_fact = $_GET['type_fact'];
        $reference = $_GET['reference'];
        $bat = $_GET['batiment'];
        $month = $_GET['month'];
        if(isset($_GET['id_res'])){
            $res = $_GET['id_res'];
        }
        else{
            $res = "";
        }
        $type = FactureType::all();
        if (!empty($month) ){
            if(!empty($res)){
                $facture = Facture::where('type_facture','like','%'.$type_fact.'%')
                    ->where('reference_facture','like','%'.$reference.'%')
                    ->where('id','like','%'.$id.'%')
                    ->whereMonth('date_ajout',$month)
                    ->where('Id_res','like',$res)
                    ->where('batiment','like','%'.$bat.'%')->simplePaginate(10);
                $facture->appends(['id'=>$id,'type_fact'=>$type_fact,'reference'=>$reference,'batiment'=>$bat,'month'=>$month]);
            }
            else{
                $facture = Facture::where('id','like','%'.$id.'%')
                    ->where('reference_facture','like','%'.$reference.'%')
                    ->where('type_facture','like','%'.$type_fact.'%')
                    ->whereMonth('date_ajout',$month)
                    ->where('Id_res','like','%'.$res.'%')
                    ->where('batiment','like','%'.$bat.'%')->simplePaginate(10);
                $facture->appends(['id'=>$id,'type_fact'=>$type_fact,'reference'=>$reference,'batiment'=>$bat,'month'=>$month]);
            }
        }
        else{
            if(!empty($res)){
                $facture = Facture::where('type_facture','like','%'.$type_fact.'%')
                    ->where('reference_facture','like','%'.$reference.'%')
                    ->where('id','like','%'.$id.'%')
                    ->where('Id_res','like',$res)
                    ->where('batiment','like','%'.$bat.'%')->simplePaginate(10);
                $facture->appends(['id'=>$id,'type_fact'=>$type_fact,'reference'=>$reference,'batiment'=>$bat,'month'=>$month,'id_res'=>$res]);
            }
            else{
                $facture = Facture::where('type_facture','like','%'.$type_fact.'%')
                    ->where('reference_facture','like','%'.$reference.'%')
                    ->where('id','like','%'.$id.'%')
                    ->where('batiment','like','%'.$bat.'%')->simplePaginate(10);
                $facture->appends(['id'=>$id,'type_fact'=>$type_fact,'reference'=>$reference,'batiment'=>$bat,'month'=>$month]);
            }
        }
        return view('print.all_fac')
            ->with('facture',$facture)
            ->with('type',$type)
            ->with('batiment',$batiment);
    }
}
