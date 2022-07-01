{{--Cette page concerne la creation/ajout d'une facture--}}
@extends('layouts.app')

@section('section-1')
    <section class="container shadow mt-5 p-5">
            {!! Form::open(['action' => '\App\Http\Controllers\factureController@store', 'method'=>'POST', 'class'=>'form col-12']) !!}
            <div class="mx-auto w-100">
                <div class="row field-add_resident d-lg-felx d-md-flex">


                    <div class="mt-4 col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center t-sm-1 text-xs-center">
                        <label for="type_facture" class="form-label">Type de facture</label>
                        <div class="d-flex justify-content-center align-items-center">
                            <select class="form-control w-75 " id="fact_type" name="type_facture">
                                <option value="">Choix du type</option>
                                @foreach($type_fact as $type)
                                    <option value="{{$type->valeur_type}}">{{$type->valeur_type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="mt-4 col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center t-sm-1 text-xs-center inter" id="inter">
                        <label for="nom-resident" class="form-label">Type secondaire de la facture</label>
                        <div class="d-flex mx-auto justify-content-center align-items-center">
                            <select class="form-control w-75 test1" data-live-search="true" name="fact_type_sec" id="fact_type_1">
                                <option value="">Choix du type secondaire</option>
                                @foreach($type_fact_sec as $fact_sec)
                                    <option value="{{$fact_sec->nom_type_sec}}">{{$fact_sec->type_facture_sec}}</option>
                                @endforeach
                            </select>
                            <span class="border-primary"><i class="fa-solid fa-plus h4 mb-0 ms-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"></i></span>
                        </div>
                    </div>


                    <div class="mt-4 col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center inter_1 inter" id="inter_1">
                        <label for="reference" class="form-label" >Réference de la facture</label>
                        <input type="text" class="form-control w-75 mx-auto" name="reference">
                    </div>


                    <div class="mt-4 col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center inter_2" id="inter_2">
                        <label for="resident" class="form-label" >Résident</label>
                        <div class="d-flex mx-auto justify-content-center align-items-center">
                            <select name="resident" id="resident" class="form-control w-75">
                                <option value="">Choix de résident</option>
                                @foreach($res as $resident)
                                    <option value="{{$resident->Id_resident}}">{{$resident->Nom}} {{$resident->Prenom}}</option>
                                @endforeach
                            </select>
                            <a href="/resident/create" class="border-primary text-black"><i class="fa-solid fa-plus h4 mb-0 ms-2"></i></a></div>
                    </div>


                    <div class="mt-4 col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center inter_3" id="inter_3">
                        <label for="operateur" class="form-label" >Operateur</label>
                        <div class="d-flex mx-auto justify-content-center align-items-center">
                            <select name="operateur" id="operateur" class="form-control w-75">
                                <option value="">Choix de résident</option>
                                @foreach($operateur as $ope)
                                    <option value="{{$ope->id}}">{{$ope->nom_ope}} {{$ope->prenom_ope}}</option>
                                @endforeach
                            </select>
                            <a href="/operateur/create" class="border-primary text-black"><i class="fa-solid fa-plus h4 mb-0 ms-2"></i></a></div>
                    </div>


                    <div class="mt-4 col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                        <label class="form-label" for="date_ajout">Date de création</label>
                        <input type="date" class="form-control w-75 mx-auto" name="date_ajout" value="<?php echo date('Y-m-d')?>">
                    </div>


                    <div class="mt-4 col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                        <label class="form-label" for="montant">Montant</label>
                        <input type="text" class="form-control w-75 mx-auto" id="montant" name="montant">
                    </div>


                    <div class="mt-4 col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center" id="batId">
                        <label class="form-label" for="batiment">Batiment</label>
                        <select class="form-control w-75 mx-auto" name="batiment" id="Batiment">
                            @foreach($bat as $batiment)
                                <option value="{{$batiment->nom_bat}}">{{$batiment->nom_bat}}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="mt-4 col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center" id="divAppt">
                            <label class="form-label" for="appartement">Appartement</label>
                            <input type="text" class="appartement w-75 mx-auto form-control" id="appartement" value="" disabled>
                        </div>



                    <div class="mt-4 col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center" id="description">
                        <label class="form-label" for="description">Description</label>
                        <div class="row w-75 mx-auto">
                            <textarea name="description" id="description" class="form-control col-4"></textarea>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="row field-add_resident mt-4">
                        <div class="col-12 col-add_resident col-resident1 pt-sm-3 text-center">
                            <a href=""><button type="submit" class="btn border-success text-success">Ajouter</button></a>
                            <a href="/facture" class="text-primary btn border-primary">Retour</a>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
    </section>


{{--Debut de Modal d'ajoute d'une type secondaire de factures--}}
                <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="staticBackdropLabel">Ajouter un type secondaire</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['action' => '\App\Http\Controllers\factureController@addSecType' ,'method'=>'get']) !!}
                                <div class="row text-center">
                                    <div class="col-6 mx-auto">
                                        <label for="valeur_type_sec" class="label-control">Type</label>
                                        <input type="text" name="valeur_type_sec" id="valeur_type_sec" class="form-control mt-2" required>
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <label for="nom_type_sec" class="label-control">Valeur de Type</label>
                                        <input type="text" name="nom_type_sec" id="nom_type_sec" class="form-control mt-2" required>
                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary border-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop4" class="btn border-danger text-danger">Supprimer</a>
                                    <a href="/f/createe" class=""><button class="btn border-primary text-primary" type="submit">Ajouter</button></a>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
{{--Fin de Modal d'ajoute d'une type secondaire de facture--}}



{{--Debut de Modal de suppression d'une type principle de factures--}}
                <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="staticBackdropLabel">Supprimmer un type</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row text-center">
                                    <select class="form-control w-75 mx-auto" id="del_type" name="">
                                        <option value="">Choisir le type de facture </option>
                                        @foreach($type_fact as $type)
                                            <option value="{{$type->valeur_type}}" data-id="{{$type->id}}">{{$type->valeur_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-secondary border-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="#" class="deletebtn btn border-danger text-danger">supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
{{--Fin de Modal de suppression d'une type principale de factures--}}



{{--Debut de Modal de suppression d'une type principle de factures--}}
    <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Supprimmer un type secondaire</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row text-center">
                        <select class="form-control w-75 mx-auto" id="del_type_sec" name="">
                            <option value="">Choisir le type de facture </option>
                            @foreach($type_fact_sec as $fact_sec)
                                <option value="{{$fact_sec->nom_type_sec}}" data-id="{{$fact_sec->id}}">{{$fact_sec->type_facture_sec}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-secondary border-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" class="deletebtnsec btn border-danger text-danger">supprimer</a>
                </div>
            </div>
        </div>
    </div>
{{--Fin de Modal de suppression d'une type principale de factures--}}
@endsection

@section('extra-js')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        $('#resident').on('change',function(){
            value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{url('setBatimentR')}}',
                data:{'value':value},
                success:function(data){
                    $('#Batiment').html(data);
                }
            });
        });
        $('#resident').on('change',function(){
            value1=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{url('setApt')}}',
                data:{'value1':value1},
                success:function(data){
                    $('#appartement').val(data);
                    console.log(data);
                }
            });
        })
    </script>



    <script>
        let fer = document.getElementById('fact_type_1');
        let fact = document.getElementById('fact_type');
        let    t = document.getElementsByClassName('inter');
        let fact_1 = document.getElementById('fact_type_1');
        let    tab = document.getElementById('inter_1');
        let    tab2 = document.getElementById('inter_2');
        let del = document.getElementById('del');
        let delType = document.getElementById('del_type');
        let delTypeSec = document.getElementById('del_type_sec');
        let id;
        let ids;
        let montant = document.getElementById('montant');
        let ope = document.getElementById("inter_3");
        let desc = document.getElementById("description");
        let batiment = document.getElementById('batId');
        let apt = document.getElementById('divAppt');
        // debut suppression des types principales
        delType.addEventListener('change', ()=>{
            let resualt1 = delType.options[delType.selectedIndex];
            id = resualt1.getAttribute('data-id');
        });
        $('.deletebtn').click(function (){
            swal({
                title: "voulez-vous vraiment supprimer ce type",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/f/del_type/"+id;
                    }
                });
        });
        // fin suppression des types principales


        // debut suppression des types secondaires
        delTypeSec.addEventListener('change', ()=>{
            let resualt2 = delTypeSec.options[delTypeSec.selectedIndex];
            ids = resualt2.getAttribute('data-id');
            $('.deletebtnsec').click(function (){
                swal({
                    title: "voulez-vous vraiment supprimer ce type",
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "/f/del_type_sec/"+ids;
                        }
                    });
            });
        });
        // fin suppression des types secondaires


        //Debut jQuery de les types secondaires (afficher les inputs des types secondaires)
        for(let i = 0;i<t.length;i++){
            t[i].style.display = 'none';
        }
        ope.style.display = "none";
        fact.addEventListener('change',()=>{
            resualt = String(fact.options[fact.selectedIndex].value);
            choixType(resualt);
        });
        fact_1.addEventListener('change',()=>{
            resualt_1 = String(fact_1.options[fact_1.selectedIndex].value);
            if(resualt_1 == "f_eau" || resualt_1 == "f_elec"){
                $(ope).hide(150);
                $(ope).value = "";
                $(tab).show(150);
                $(batiment).show(150);
                $(apt).hide(150);
            }
            else if(resualt_1 == "f_ope"){
                $(tab).hide(150);
                $(tab).value = "";
                $(ope).show(150);
                $(batiment).hide(150);
                $(apt).hide(150);
            }
            else if (resualt_1 == "f_amelioration"){
                $(desc).show(150);
                $(batiment).show(150);
                $(apt).hide(150);
            }
            else {
                $(ope).hide(150);
                $(ope).value = "";
                $(tab).hide(150);
                $(tab).value = "";
                $(batiment).show(150);
                $(apt).hide(150);
            }
        });
        //Fin jQuery de les types secondaires (afficher les inputs des types secondaires)



        window.addEventListener('load',()=>{
            resualt = String(fact.options[fact.selectedIndex].value);
            choixType(resualt);
        });



        function choixType (resualt){
            if(resualt == 'Facture des dépenses'){
                $(tab2).hide(150);
                for(let i = 0;i<t.length;i++){
                    $(t[i]).show(150);
                }
                tab.style.display = 'none';
                montant.value = '';
                $(apt).hide(150);
            }
            else if(resualt == "Facture des entrées"){
                $(ope).hide(150);
                $(ope).value = "";
                $(tab).hide(150);
                $(tab).value = "";
                $(apt).show(150);
                for(let i = 0;i<t.length;i++){
                    $(t[i]).hide(150);
                }
                $(tab2).show(150);
                montant.value = 120;
            }
            else {
                $(tab2).hide(150);
                for(let i = 0;i<t.length;i++){
                    $(t[i]).hide(150);
                }
                montant.value = '';
                $(ope).hide(150);
                $(ope).value = "";
                $(tab).hide(150);
                $(tab).value = "";
                $(apt).hide(150);
            }
        }
    </script>
@endsection
