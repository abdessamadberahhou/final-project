@extends('layouts.app')

@section('styles')
    <style>
        .modal-dialog{
            max-width: 80% !important;
        }
    </style>
@endsection


@section('section-1')
    <div class="container shadow mt-5 p-5">
        <div class="row mx-auto justify-content-around">
            <div class="col-lg-3 col-md-6 col-sm-9 col-9 mt-md-4 mt-lg-0 mt-sm-3 mt-3">
                <div class="small-box shadow rounded d-flex align-items-center" style="background: lightgray">
                    <div class="card-content d-flex align-items-center mx-auto">
                        <i class="fa-solid fa-people"></i>
                        <div class="info ms-2 d-block">
                            <span>Total des résidents</span><br>
                            <span>{{$residents}}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-9 col-9 mt-md-4 mt-lg-0 mt-sm-3 mt-3">

                <div class="small-box shadow rounded d-flex align-items-center" style="background: #63c7ff; .small-box{background: #3b76ef;>
                    }">
                    <div class="card-content d-flex align-items-center mx-auto">
                        <i class="fa-solid fa-circle-dollar"></i>
                        <div class="info ms-2 d-block">
                            <span>Total des factures (mois)</span><br>
                            <span>{{$motant_factures}} Dh</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-9 col-9 mt-md-4 mt-lg-0 mt-sm-3 mt-3">

                <div class="small-box shadow rounded d-flex align-items-center" style="background: #a66dd4">
                    <div class="card-content d-flex align-items-center mx-auto">
                        <i class="fa-solid fa-family-dress"></i>
                        <div class="info ms-2 d-block">
                            <span>Total des résidents (tous)</span><br>
                            <span>{{$total_residents}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-9 col-9 mt-md-4 mt-lg-0 mt-sm-3 mt-3">
                <div class="small-box  shadow rounded d-flex align-items-center" style="background: #6dd4b1">
                    <div class="card-content d-flex align-items-center mx-auto">
                        <i class="fa-solid fa-money-bills"></i>
                        <div class="info ms-2 d-block">
                            <span>Total des factures (entrées)</span><br>
                            <span>{{$sum_e}} DH</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-lg-3 col-md-6 col-sm-9 col-9 mt-md-4 mt-sm-3 mt-3 mx-sm-auto mx-lg-0">
                <div class="small-box  shadow rounded d-flex align-items-center" style="background: #0bd98b">
                    <div class="card-content d-flex align-items-center mx-auto">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        <div class="info ms-2 d-block">
                            <span>Total des factures (dépenses)</span><br>
                            <span>{{$sum_d}} DH</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-9 col-9 mt-md-4 mt-sm-3 mt-3 mx-sm-auto mx-lg-0">
                <div class="small-box  shadow rounded d-flex align-items-center" style="background: #a9eefc">
                    <div class="card-content d-flex align-items-center justify-content-between mx-4">
                        <i class="fa-solid fa-money-bills"></i>
                        <div class="info ms-2 d-block ">
                            <span>Total net restant</span><br>
                            <span id="total_brut"><b>{{$sum_e - $sum_d}} DH</b></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-9 col-9 mt-md-4 mt-sm-3 mt-3 mx-sm-auto mx-lg-0">
                <div class="small-box  shadow rounded d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#facturePaye" style="background: rgba(172,11,217,0.6)">
                    <div class="card-content d-flex align-items-center mx-auto" >
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        <div class="info ms-2 d-block">
                            <span>Total des factures (payées)</span><br>
                            <span>{{$sum_pay}}</span><br>
                            <span><b>Montant:</b> <b><span id="pay">{{$sum_npay_p}} DH</span></b></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-9 col-9 mt-md-4 mt-sm-3 mt-3 mx-sm-auto mx-lg-0">
                <div class="small-box  shadow rounded d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#factureNonPaye" style="background: rgba(11,131,217,0.6)">
                    <div class="card-content d-flex align-items-center mx-auto">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        <div class="info ms-2 d-block">
                            <span class="text-wrap">Total des <br> factures (non payées) : </span>
                            <span>{{$sum_npay}}</span><br>
                            <span><b>Montant:</b> <b><span id="n_pay">{{$sum_npay_np}} DH</span></b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="charts container mt-5 justify-content-between">
            <div class="row d-lg-flex">
                <div class="col-lg-6 ">
                    <b><h5 class="text-center">Résidents</h5></b>
                    <h6 class="text-center"><b>{{$sum_res}}</b></h6>
                    <canvas class="chart-1" id="chart-1">

                    </canvas>
                </div>
                <div class="col-lg-6">
                    <b>
                        <h5 class="text-center">Résidents (Total)</h5>
                        <h6 class="text-center"><b>{{$sum_total}}</b></h6>
                    </b>
                    <canvas class="chart-2" id="chart-2">

                    </canvas>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6 ms-lg-3">
                    <b>
                        <h5 class="text-center">Montant global des factures</h5>
                        <h6 class="text-center"><b>{{$res_fact}}DH</b></h6>
                    </b>
                    <canvas class="chart-3" id="chart-3">

                    </canvas>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade w-100" id="facturePaye" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-centered w-100">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title mx-auto" id="staticBackdropLabel">Liste des factures payées</h5>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-xl container-lg">
                        <table class="table table-striped" id="">
                            <tr>
                                <th class="col-1">
                                    <input type="text" name="id" id="idFactureP" class="form-control text-center" placeholder="id">
                                </th>
                                <th class="col-2">
                                    <select name="type_fact" id="typeFactP" class="form-control text-center">
                                        <option value="">Choisir votre type</option>
                                        @foreach($type as $type_f)
                                            <option value="{{$type_f->valeur_type}}">{{$type_f->valeur_type}}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th class="col-2">
                                    <select name="type_sec" id="typeSecP" class="form-control">
                                        <option value="">choisis type secondaire</option>
                                        @foreach($type_sec as $type)
                                            <option value="{{$type->type_facture_sec}}">{{$type->type_facture_sec}}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th>
                                    <select name="month" id="monthP" class="form-control text-center">
                                        <option value="">Tout</option>
                                        <option value="1">Janvier</option>
                                        <option value="2">Fevrier</option>
                                        <option value="3">Mars</option>
                                        <option value="4">April</option>
                                        <option value="5">Mai</option>
                                        <option value="6">June</option>
                                        <option value="7">Juillet</option>
                                        <option value="8">Aout</option>
                                        <option value="9">Septembre</option>
                                        <option value="10">Octobre</option>
                                        <option value="11">Nouvembre</option>
                                        <option value="12">Decembre</option>
                                    </select>
                                </th>
                                <th class="col-1">
                                    <input type="text" name="id_resP" id="idResP" class="form-control text-center" placeholder="Res">
                                </th>
                                <th>
                                    <select name="batiment" class="form-control text-center" id="bAtimentP">
                                        <option value="">Tout</option>
                                        @foreach($batiment as $bat)
                                            <option value="{{$bat->nom_bat}}">{{$bat->nom_bat}}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th></th>
                                <th class="text-center text-nowrap">
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center col-1">id</th>
                                <th class="text-center col-2">Type facture</th>
                                <th class="text-center col-2">Type secondaire</th>
                                <th class="text-center col-2">Date d'ajoute</th>
                                <th class="text-center col-1">Id res</th>
                                <th class="text-center col-1">Batiment</th>
                                <th class="text-center col-1">Staut</th>
                                <th class="text-center col-2">Action</th>
                            </tr>
                            <tbody id="outputs">
                            @if(count($facture_p)>0)
                                @foreach($facture_p as $fac)
                                    <tr>
                                        <td class="text-center col-1">{{$fac->id}}</td>
                                        <td class="text-center col-2">{{$fac->type_facture}}</td>
                                        <td class="text-center col-2">{{$fac->type_fact_sec}}</td>
                                        <td class="text-center col-2">{{$fac->date_ajout}}</td>
                                        <td class="text-center col-1">{{$fac->Id_res}}</td>
                                        <td class="text-center col-1">{{$fac->batiment}}</td>
                                        <td class="text-center col-1">{{$fac->statut}}</td>
                                        <td class="text-center col-2">
                                            <a href="/facture/{{$fac->id}}/" class="btn btn-consult border-primary text-primary"><i class="bi bi-eye"></i></a>
                                            <a  class="btn btn-edit border-success text-success" href="/facture/{{$fac->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                                            <a href="#" data-id="{{$fac->id}}" class="deletebtn btn btn-delete border-danger text-danger"><i class="bi bi-trash3"></i></a>

                                            @if($fac->statut != 'payé')
                                                <button class="btn border-info text-info"@if($fac->statut == 'payé')
                                                hidden
                                                    @endif>
                                                    <i class="bi bi-cash"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                </div>
        </div>
    </div>

@endsection
@section('section-2')
    <div class="modal fade w-100" id="factureNonPaye" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-centered w-100">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title mx-auto" id="staticBackdropLabel">Liste des factures non payées</h5>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-xl container-lg">
                        <table class="table table-striped" id="">
                            <tr>
                                <th class="col-1">
                                    <input type="text" name="id" id="idFactureNp" class="form-control text-center" placeholder="id">
                                </th>
                                <th class="col-2">
                                    <select name="type_fact" id="typeFactNp" class="form-control text-center">
                                        <option value="">Choisir votre type</option>
                                            @foreach($type_2 as $types)
                                                <option value="{{$types->valeur_type}}">{{$types->valeur_type}}</option>
                                            @endforeach
                                    </select>
                                </th>
                                <th class="col-2">
                                    <select name="type_sec" id="typeSecNp" class="form-control">
                                        <option value="">choisis type secondaire</option>
                                        @foreach($type_sec as $type)
                                            <option value="{{$type->type_facture_sec}}">{{$type->type_facture_sec}}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th>
                                    <select name="month" id="monthNp" class="form-control text-center">
                                        <option value="">Tout</option>
                                        <option value="1">Janvier</option>
                                        <option value="2">Fevrier</option>
                                        <option value="3">Mars</option>
                                        <option value="4">April</option>
                                        <option value="5">Mai</option>
                                        <option value="6">June</option>
                                        <option value="7">Juillet</option>
                                        <option value="8">Aout</option>
                                        <option value="9">Septembre</option>
                                        <option value="10">Octobre</option>
                                        <option value="11">Nouvembre</option>
                                        <option value="12">Decembre</option>
                                    </select>
                                </th>
                                <th class="col-1">
                                    <input type="text" name="id_res" id="idResNp" class="form-control text-center" placeholder="Res">
                                </th>
                                <th>
                                    <select name="batiment" class="form-control text-center" id="bAtimentNp">
                                        <option value="">Tout</option>
                                        @foreach($batiment as $bat)
                                            <option value="{{$bat->nom_bat}}">{{$bat->nom_bat}}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th></th>
                                <th class="text-center text-nowrap">
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">id</th>
                                <th class="text-center">Type facture</th>
                                <th class="text-center">Type secondaire</th>
                                <th class="text-center">Date d'ajoute</th>
                                <th class="text-center">Id res</th>
                                <th class="text-center">Batiment</th>
                                <th class="text-center">Staut</th>
                                <th class="text-center">Action</th>
                            </tr>
                            <tbody id="outputsn">
                            @if(count($facture_np)>0)
                                @foreach($facture_np as $fac)
                                    <tr>
                                        <td class="text-center">{{$fac->id}}</td>
                                        <td class="text-center">{{$fac->type_facture}}</td>
                                        <td class="text-center">{{$fac->type_fact_sec}}</td>
                                        <td class="text-center">{{$fac->date_ajout}}</td>
                                        <td class="text-center">{{$fac->Id_res}}</td>
                                        <td class="text-center">{{$fac->batiment}}</td>
                                        <td class="text-center">{{$fac->statut}}</td>
                                        <td class="text-center">
                                            <a href="/facture/{{$fac->id}}" class="btn btn-consult border-primary text-primary"><i class="bi bi-eye"></i></a>
                                            <a  class="btn btn-edit border-success text-success" href="/facture/{{$fac->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                                            <a href="#" data-id="{{$fac->id}}" class="deletebtn btn btn-delete border-danger text-danger"><i class="bi bi-trash3"></i></a>

                                            @if($fac->statut != 'payée')
                                                <button class="btn border-info text-info"@if($fac->statut == 'payée')
                                                hidden
                                                    @endif>
                                                    <i class="bi bi-cash"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <table class="table table-striped">

                        </table>
                        @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-js')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{asset('js/chart.js')}}"></script>
    <script>
        let firstChart = document.getElementById('chart-1').getContext('2d');
        let residentChart = new Chart(firstChart,{
            type:'bar',
            data:{
                labels:['Jan', 'Fev', 'Mars','Avril','Mai','June','Juil','Aout','Sep', 'Oct', 'Nou', 'Dec'],
                datasets:[{
                    label:'Résidents',
                    data:[
                        @for($i = 0;$i<count($mon);$i++)
                            {{$mon[$i]}},
                        @endfor
                    ],
                    backgroundColor:'lightgray',
                }]
            },
            options:{
                plugins:{
                    legend:{
                        display: true,
                    }
                }
            }
        });




        let secondChart = document.getElementById('chart-2').getContext('2d');
        let totalResident = new Chart(secondChart,{
            type:'line',
            data:{
                labels:['Jan', 'Fev', 'Mars','Avril','Mai','June','Juil','Aout','Sep', 'Oct', 'Nou', 'Dec'],
                datasets:[{
                    label:'Résidents (total)',
                    data:[
                        @for($i = 0;$i<count($mon);$i++)
                            {{$mon_all[$i]}},
                        @endfor
                    ],
                    backgroundColor:'#a66dd4',
                }]
            },
            options:{
                plugins:{
                    legend:{
                        display: true,
                    }
                }
            }
        });
        let thirdChart = document.getElementById('chart-3').getContext('2d');
        let factChart = new Chart(thirdChart,{
            type:'line',
            data:{
                labels:['Jan', 'Fev', 'Mars','Avril','Mai','June','Juil','Aout','Sep', 'Oct', 'Nou', 'Dec'],
                datasets:[{
                    label:'Résidents (total)',
                    data:[
                        @for($i = 0;$i<count($mon);$i++)
                            {{$mon_fact[$i]}},
                        @endfor
                    ],
                    backgroundColor:'#63c7ff',
                }]
            },
            options:{
                plugins:{
                    legend:{
                        display: true,
                    }
                }
            }
        });
    </script>
    <script>
        let total_bru = document.getElementById('total_brut');
        let npay = document.getElementById('n_pay');
        if(parseFloat(total_bru.innerText) < 0){
            total_bru.style.color = 'red';
        }
        if(parseFloat(npay.innerHTML)>0){
            npay.style.color = "red";
        }


        function searchNp(valuen, valuen1, valuen2, valuen3, valuen4, valuen5, valuen6){
            $.ajax({
                type : 'get',
                url : '{{url('searchDashboardNp')}}',
                data:{'valuen': valuen, 'valuen1': valuen1, 'valuen2': valuen2,'valuen3' :valuen3, 'valuen4': valuen4, 'valuen5': valuen5, 'valuen6': valuen6},
                success:function(data){
                    $('#outputsn').html(data);
                }
            });
        }

        function searchp(value, value1, value2, value3, value4, value5, value6){
            $.ajax({
                type : 'get',
                url : '{{url('searchDashboardP')}}',
                data:{'value': value, 'value1': value1, 'value2': value2,'value3' :value3, 'value4': value4, 'value5': value5, 'value6': value6},
                success:function(data){
                    $('#outputs').html(data);
                }
            });
        }


        $('#idFactureP').keyup(function(){
            value=$(this).val();
            value1 = $('#typeFactP').val();
            value2 = $('#typeSecP').val();
            value3 = $('#monthP').val();
            value4 = $('#idResP').val();
            value5 = $('#bAtimentP').val();
            searchp(value, value1, value2, value3, value4, value5);
        });
        $('#typeFactP').on('change',function(){
            value=$('#idFactureP').val();
            value1 = $(this).val();
            value2 = $('#typeSecP').val();
            value3 = $('#monthP').val();
            value4 = $('#idResP').val();
            value5 = $('#bAtimentP').val();
            searchp(value, value1, value2, value3, value4, value5);
        });
        $('#typeSecP').on('change',function(){
            value=$('#idFactureP').val();
            value1 = $('#typeFactP').val();
            value2 = $(this).val();
            value3 = $('#monthP').val();
            value4 = $('#idResP').val();
            value5 = $('#bAtimentP').val();
            searchp(value, value1, value2, value3, value4, value5);
        });
        $('#monthP').on('change',function(){
            value=$('#idFactureP').val();
            value1 = $('#typeFactP').val();
            value2 = $('#typeSecP').val();
            value3 = $(this).val();
            value4 = $('#idResP').val();
            value5 = $('#bAtimentP').val();
            searchp(value, value1, value2, value3, value4, value5);
        });
        $('#idResP').keyup(function (){
            value=$('#idFactureP').val();
            value1 = $('#typeFactP').val();
            value2 = $('#typeSecP').val();
            value3 = $('#monthP').val();
            value4 = $(this).val();
            value5 = $('#bAtimentP').val();
            searchp(value, value1, value2, value3, value4, value5);
        });
        $('#bAtimentP').on('change',function (){
            value=$('#idFactureP').val();
            value1 = $('#typeFactP').val();
            value2 = $('#typeSecP').val();
            value3 = $('#monthP').val();
            value4 = $('#idResP').val();
            value5 = $(this).val();
            searchp(value, value1, value2, value3, value4, value5);
        });







        $('#idFactureNp').keyup(function(){
            value=$(this).val();
            value1 = $('#typeFactNp').val();
            value2 = $('#typeSecNp').val();
            value3 = $('#monthNp').val();
            value4 = $('#idResNp').val();
            value5 = $('#bAtimentNp').val();
            searchNp(value, value1, value2, value3, value4, value5);
        });
        $('#typeFactNp').on('change',function(){
            value=$('#idFactureNp').val();
            value1 = $(this).val();
            value2 = $('#typeSecNp').val();
            value3 = $('#monthNp').val();
            value4 = $('#idResNp').val();
            value5 = $('#bAtimentNp').val();
            searchNp(value, value1, value2, value3, value4, value5);
        });
        $('#typeSecNp').on('change',function(){
            value=$('#idFactureNp').val();
            value1 = $('#typeFactNp').val();
            value2 = $(this).val();
            value3 = $('#monthNp').val();
            value4 = $('#idResNp').val();
            value5 = $('#bAtimentNp').val();
            searchNp(value, value1, value2, value3, value4, value5);
        });
        $('#monthNp').on('change',function(){
            value=$('#idFactureNp').val();
            value1 = $('#typeFactNp').val();
            value2 = $('#typeSecNp').val();
            value3 = $(this).val();
            value4 = $('#idResNp').val();
            value5 = $('#bAtimentNp').val();
            searchNp(value, value1, value2, value3, value4, value5);
        });
        $('#idResNp').keyup(function (){
            value=$('#idFactureNp').val();
            value1 = $('#typeFactNp').val();
            value2 = $('#typeSecNp').val();
            value3 = $('#monthNp').val();
            value4 = $(this).val();
            value5 = $('#bAtimentNp').val();
            searchNp(value, value1, value2, value3, value4, value5);
        });
        $('#bAtimentNp').on('change',function (){
            value=$('#idFactureNp').val();
            value1 = $('#typeFactNp').val();
            value2 = $('#typeSecNp').val();
            value3 = $('#monthNp').val();
            value4 = $('#idResNp').val();
            value5 = $(this).val();
            searchNp(value, value1, value2, value3, value4, value5);
        });
    </script>
@endsection
