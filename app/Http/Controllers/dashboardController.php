<?php

namespace App\Http\Controllers;

use App\Models\Batiment;
use App\Models\FactureType;
use App\Models\FactureTypeSec;
use App\Models\Resident;
use App\Models\Facture;
use App\Models\Operateur;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $residents = Resident::count();
        $total_residents = Resident::sum('nb_pers');
        $motant_factures = Facture::whereMonth('date_ajout', Carbon::now()->month)->sum('montant');
        $total_ope = Operateur::count();
        $jan = DB::table('residents')->whereMonth('date_ajout',Carbon::JANUARY)->whereYear('date_ajout',Carbon::now()->year)->count();
        $feb = DB::table('residents')->whereMonth('date_ajout',Carbon::FEBRUARY)->whereYear('date_ajout',Carbon::now()->year)->count();
        $mar = DB::table('residents')->whereMonth('date_ajout',Carbon::MARCH)->whereYear('date_ajout',Carbon::now()->year)->count();
        $avr = DB::table('residents')->whereMonth('date_ajout',Carbon::APRIL)->whereYear('date_ajout',Carbon::now()->year)->count();
        $mai = DB::table('residents')->whereMonth('date_ajout',Carbon::MAY)->whereYear('date_ajout',Carbon::now()->year)->count();
        $jun = DB::table('residents')->whereMonth('date_ajout',Carbon::JUNE)->whereYear('date_ajout',Carbon::now()->year)->count();
        $jui = DB::table('residents')->whereMonth('date_ajout',Carbon::JULY)->whereYear('date_ajout',Carbon::now()->year)->count();
        $aou = DB::table('residents')->whereMonth('date_ajout',Carbon::AUGUST)->whereYear('date_ajout',Carbon::now()->year)->count();
        $sep = DB::table('residents')->whereMonth('date_ajout',Carbon::SEPTEMBER)->whereYear('date_ajout',Carbon::now()->year)->count();
        $oct = DB::table('residents')->whereMonth('date_ajout',Carbon::OCTOBER)->whereYear('date_ajout',Carbon::now()->year)->count();
        $nov = DB::table('residents')->whereMonth('date_ajout',Carbon::NOVEMBER)->whereYear('date_ajout',Carbon::now()->year)->count();
        $dec = DB::table('residents')->whereMonth('date_ajout',Carbon::DECEMBER)->whereYear('date_ajout',Carbon::now()->year)->count();
        $mon = [$jan, $feb, $mar, $avr, $mai, $jun, $jui, $aou, $sep, $oct, $nov, $dec];
        $jan_all_res = DB::table('residents')->whereMonth('date_ajout',Carbon::JANUARY)->whereYear('date_ajout',Carbon::now()->year)->select('nb_pers')->sum('nb_pers');
        $feb_all_res = DB::table('residents')->whereMonth('date_ajout',Carbon::FEBRUARY)->whereYear('date_ajout',Carbon::now()->year)->select('nb_pers')->sum('nb_pers');
        $mar_all_res = DB::table('residents')->whereMonth('date_ajout',Carbon::MARCH)->whereYear('date_ajout',Carbon::now()->year)->select('nb_pers')->sum('nb_pers');
        $avr_all_res = DB::table('residents')->whereMonth('date_ajout',Carbon::APRIL)->whereYear('date_ajout',Carbon::now()->year)->select('nb_pers')->sum('nb_pers');
        $mai_all_res = DB::table('residents')->whereMonth('date_ajout',Carbon::MAY)->whereYear('date_ajout',Carbon::now()->year)->select('nb_pers')->sum('nb_pers');
        $jun_all_res = DB::table('residents')->whereMonth('date_ajout',Carbon::JUNE)->whereYear('date_ajout',Carbon::now()->year)->select('nb_pers')->sum('nb_pers');
        $jui_all_res = DB::table('residents')->whereMonth('date_ajout',Carbon::JULY)->whereYear('date_ajout',Carbon::now()->year)->select('nb_pers')->sum('nb_pers');
        $aou_all_res = DB::table('residents')->whereMonth('date_ajout',Carbon::AUGUST)->whereYear('date_ajout',Carbon::now()->year)->select('nb_pers')->sum('nb_pers');
        $sep_all_res = DB::table('residents')->whereMonth('date_ajout',Carbon::SEPTEMBER)->whereYear('date_ajout',Carbon::now()->year)->select('nb_pers')->sum('nb_pers');
        $oct_all_res = DB::table('residents')->whereMonth('date_ajout',Carbon::OCTOBER)->whereYear('date_ajout',Carbon::now()->year)->select('nb_pers')->sum('nb_pers');
        $nov_all_res = DB::table('residents')->whereMonth('date_ajout',Carbon::NOVEMBER)->whereYear('date_ajout',Carbon::now()->year)->select('nb_pers')->sum('nb_pers');
        $dec_all_res = DB::table('residents')->whereMonth('date_ajout',Carbon::DECEMBER)->whereYear('date_ajout',Carbon::now()->year)->select('nb_pers')->sum('nb_pers');
        $mon_all = [$jan_all_res, $feb_all_res, $mar_all_res, $avr_all_res, $mai_all_res, $jun_all_res, $jui_all_res, $aou_all_res, $sep_all_res, $oct_all_res, $nov_all_res, $dec_all_res];
        $jan_fact = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::JANUARY)->whereYear('date_ajout',Carbon::now()->year)->sum('montant');
        $feb_fact = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::FEBRUARY)->whereYear('date_ajout',Carbon::now()->year)->sum('montant');
        $mar_fact = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::MARCH)->whereYear('date_ajout',Carbon::now()->year)->sum('montant');
        $avr_fact = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::APRIL)->whereYear('date_ajout',Carbon::now()->year)->sum('montant');
        $mai_fact = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::MAY)->whereYear('date_ajout',Carbon::now()->year)->sum('montant');
        $jun_fact = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::JUNE)->whereYear('date_ajout',Carbon::now()->year)->sum('montant');
        $jui_fact = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::JULY)->whereYear('date_ajout',Carbon::now()->year)->sum('montant');
        $aou_fact = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::AUGUST)->whereYear('date_ajout',Carbon::now()->year)->sum('montant');
        $sep_fact = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::SEPTEMBER)->whereYear('date_ajout',Carbon::now()->year)->sum('montant');
        $oct_fact = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::OCTOBER)->whereYear('date_ajout',Carbon::now()->year)->sum('montant');
        $nov_fact = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::NOVEMBER)->whereYear('date_ajout',Carbon::now()->year)->sum('montant');
        $dec_fact = DB::table('facture_batiment')->whereMonth('date_ajout',Carbon::DECEMBER)->whereYear('date_ajout',Carbon::now()->year)->sum('montant');
        $mon_fact = [$jan_fact, $feb_fact, $mar_fact, $avr_fact, $mai_fact, $jun_fact, $jui_fact, $aou_fact, $sep_fact, $oct_fact, $nov_fact, $dec_fact];
        $sum_total = array_sum($mon_all);
        $sum_res = array_sum($mon);
        $res_fact = array_sum($mon_fact);
        $sum_e = DB::table('facture_batiment')->where('type_facture','like',"%Facture des entrées%")->where('statut','like','payée')->sum('montant');
        $sum_d = DB::table('facture_batiment')->where('type_facture','like',"%Facture des dépenses%")->where('statut','like','payée')->sum('montant');
        $sum_pay = DB::table('facture_batiment')->where('statut','like','payée%')->count();
        $sum_npay = DB::table('facture_batiment')->where('statut','like','%impayée%')->count();
        $sum_npay_np = DB::table('facture_batiment')->where('statut','like','%impayée%')->sum('montant');
        $sum_npay_p = DB::table('facture_batiment')->where('statut','like','payée%')->sum('montant');
        $batiment = Batiment::all();
        $type = FactureType::all();
        $type_2 = FactureType::all();
        $facture_p = DB::table('facture_batiment')->where('statut','like','payée')->orderBy('id')->get();
        $facture_np = DB::table('facture_batiment')->where('statut','like','impayée')->orderBy('id')->get();
        $type_sec = FactureTypeSec::all();
        return view('dashboard.dashboard',compact('residents','motant_factures','total_residents','total_ope','mon','mon_all','sum_total','sum_res','res_fact','mon_fact','sum_e','sum_d','sum_pay','sum_npay','sum_npay_np','sum_npay_p','type','type_2','facture_np'))
            ->with('facture_p',$facture_p)
            ->with('type_sec',$type_sec)
            ->with('batiment',$batiment);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchDashboardP(Request $request){
        if($request->ajax()){
            if (!empty($request->value3)){
                $outputs = '';
                $facture = DB::table('facture_batiment')
                    ->where('statut','=','payée')
                    ->where('id','like','%'.$request->value.'%')
                    ->where('type_facture','like','%'.$request->value1.'%')
                    ->where('type_fact_sec','like','%'.$request->value2.'%')
                    ->whereMonth('date_ajout',$request->value3)
                    ->where('Id_res','like','%'.$request->value4.'%')
                    ->where('batiment','like','%'.$request->value5.'%')
                    ->get();
                foreach($facture as $fact){
                    $outputs .= '      <tr>
                                        <td class="text-center col-1">'.$fact->id.'</td>
                                        <td class="text-center col-2">'.$fact->type_facture.'</td>
                                        <td class="text-center col-2">'.$fact->type_fact_sec.'</td>
                                        <td class="text-center col-2">'.$fact->date_ajout.'</td>
                                        <td class="text-center col-1">'.$fact->Id_res.'</td>
                                        <td class="text-center col-1">'.$fact->batiment.'</td>
                                        <td class="text-center col-1">'.$fact->statut.'</td>
                                        <td class="text-center col-2">
                                                <a href="/facture/'.$fact->id.'"class="btn btn-consult border-primary text-primary"><i class="bi bi-eye"></i></a>
                                                <a  class="btn btn-edit border-success text-success" href="/facture/'.$fact->id.'/edit"><i class="bi bi-pencil-square"></i></a>
                                                <a href="#" data-id="$fac->id" class="deletebtn btn btn-delete border-danger text-danger"><i class="bi bi-trash3"></i></a>
                                        </td>
                                    </tr>';
                }
            }
            else{
                $outputs = '';
                $facture = DB::table('facture_batiment')
                    ->where('statut','=','payée')
                    ->where('id','like','%'.$request->value.'%')
                    ->where('type_facture','like','%'.$request->value1.'%')
                    ->where('type_fact_sec','like','%'.$request->value2.'%')
                    ->where('Id_res','like','%'.$request->value4.'%')
                    ->where('batiment','like','%'.$request->value5.'%')
                    ->get();
                foreach($facture as $fact){
                    $outputs .= '     <tr>
                                        <td class="text-center col-1">'.$fact->id.'</td>
                                        <td class="text-center col-2">'.$fact->type_facture.'</td>
                                        <td class="text-center col-2">'.$fact->type_fact_sec.'</td>
                                        <td class="text-center col-2">'.$fact->date_ajout.'</td>
                                        <td class="text-center col-1">'.$fact->Id_res.'</td>
                                        <td class="text-center col-1">'.$fact->batiment.'</td>
                                        <td class="text-center col-1">'.$fact->statut.'</td>
                                        <td class="text-center col-2">
                                                <a href="/facture/'.$fact->id.'" class="btn btn-consult border-primary text-primary"><i class="bi bi-eye"></i></a>
                                                <a  class="btn btn-edit border-success text-success" href="/facture/'.$fact->id.'/edit"><i class="bi bi-pencil-square"></i></a>
                                                <a href="#" data-id="$fac->id" class="deletebtn btn btn-delete border-danger text-danger"><i class="bi bi-trash3"></i></a>
                                        </td>
                                    </tr>';
                }
            }
        }
            return Response($outputs);
    }






    public function searchDashboardNp(Request $request){
        if($request->ajax()){
            if (!empty($request->valuen3)){
                $outputsn = '';
                $facture = DB::table('facture_batiment')
                    ->where('statut','=','impayée')
                    ->where('id','like','%'.$request->valuen.'%')
                    ->where('type_facture','like','%'.$request->valuen1.'%')
                    ->where('type_fact_sec','like','%'.$request->valuen2.'%')
                    ->whereMonth('date_ajout',$request->valuen3)
                    ->where('Id_res','like','%'.$request->valuen4.'%')
                    ->where('batiment','like','%'.$request->valuen5.'%')
                    ->get();
                foreach($facture as $fact){
                    $outputsn .= '      <tr>
                                        <td class="text-center col-1">'.$fact->id.'</td>
                                        <td class="text-center col-2">'.$fact->type_facture.'</td>
                                        <td class="text-center col-2">'.$fact->type_fact_sec.'</td>
                                        <td class="text-center col-2">'.$fact->date_ajout.'</td>
                                        <td class="text-center col-1">'.$fact->Id_res.'</td>
                                        <td class="text-center col-1">'.$fact->batiment.'</td>
                                        <td class="text-center col-1">'.$fact->statut.'</td>
                                        <td class="text-center col-2">
                                                <a href="/facture/"'.$fact->id.'" class="btn btn-consult border-primary text-primary"><i class="bi bi-eye"></i></a>
                                                <a  class="btn btn-edit border-success text-success" href="/facture/'.$fact->id.'/edit"><i class="bi bi-pencil-square"></i></a>
                                                <a href="#" data-id="$fac->id" class="deletebtn btn btn-delete border-danger text-danger"><i class="bi bi-trash3"></i></a>
                                        </td>
                                    </tr>';
                }
            }
            else{
                $outputsn = '';
                $facture = DB::table('facture_batiment')
                    ->where('statut','=','impayée')
                    ->where('id','like','%'.$request->valuen.'%')
                    ->where('type_facture','like','%'.$request->valuen1.'%')
                    ->where('type_fact_sec','like','%'.$request->valuen2.'%')
                    ->where('Id_res','like','%'.$request->valuen4.'%')
                    ->where('batiment','like','%'.$request->valuen5.'%')
                    ->get();
                foreach($facture as $fact){
                    $outputsn .= '      <tr>
                                        <td class="text-center col-1">'.$fact->id.'</td>
                                        <td class="text-center col-2">'.$fact->type_facture.'</td>
                                        <td class="text-center col-2">'.$fact->type_fact_sec.'</td>
                                        <td class="text-center col-2">'.$fact->date_ajout.'</td>
                                        <td class="text-center col-1">'.$fact->Id_res.'</td>
                                        <td class="text-center col-1">'.$fact->batiment.'</td>
                                        <td class="text-center col-1">'.$fact->statut.'</td>
                                        <td class="text-center col-2">
                                                <a href="/facture/"'.$fact->id.'" class="btn btn-consult border-primary text-primary"><i class="bi bi-eye"></i></a>
                                                <a  class="btn btn-edit border-success text-success" href="/facture/'.$fact->id.'/edit"><i class="bi bi-pencil-square"></i></a>
                                                <a href="#" data-id="$fac->id" class="deletebtn btn btn-delete border-danger text-danger"><i class="bi bi-trash3"></i></a>
                                        </td>
                                    </tr>';
                }
            }
        }
        return Response($outputsn);
    }

}
