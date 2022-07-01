@extends('layouts.app')

@section('section-1')
    <section class="container shadow mt-5 p-5 rounded-2">
        {!! Form::open(['action' => '\App\Http\Controllers\residentController@store', 'method'=>'POST', 'class'=>'form col-12']) !!}
{{--        <form action="\App\Http\Controllers\residentController@store" method="post" class="form col-12">--}}
            <div class="mx-auto w-100">
                <div class="row field-add_resident d-lg-felx d-md-flex">
                    <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center t-sm-1 text-xs-center">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control w-75 mx-auto" name="nom">
                    </div>
                    <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                        <label for="prenom" class="form-label" >Prénom</label>
                        <input type="text" class="form-control w-75 mx-auto" name="prenom">
                    </div>
                </div>
                <div class="row field-add_resident d-lg-felx pt-lg-3 d-md-flex">
                    <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                        <label class="form-label" for="date_nai">Date de naissance</label>
                        <input type="date" class="form-control w-75 mx-auto" name="date_nai">
                    </div>
                    <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                        <label class="form-label" for="cin">CIN</label>
                        <input type="text" class="form-control w-75 mx-auto" name="CIN">
                    </div>
                </div>
                <div class="row field-add_resident d-lg-felx pt-lg-3">
                    <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                        <label class="form-label" for="num_tele">Numéro de Téléphone</label>
                        <input type="text" class="form-control w-75 mx-auto" name="num_tele">
                    </div>
                    <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                        <label class="form-label" for="nb_pers">Nombre de personnes</label>
                        <input type="text" class="form-control w-75 mx-auto" name="nb_pers">
                    </div>
                </div>
                <div class="row field-add_resident pt-lg-3">
                    <div class="col-12 col-lg-6 col-add_resident col-resident1 ps-lg-5 pt-sm-3 text-sm-center">
                        <label class="form-label" for="adresse">Adresse</label>
                        <select class="form-select w-75 mx-auto" name="adresse" id="adresse">
                            <option value="">choix du batiment</option>
                            @if(count($bat)>0)
                                @foreach($bat as $batiment)
                                    <option value="{{$batiment->nom_bat}}">{{$batiment->nom_bat}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-12 col-lg-6 col-add_resident col-resident1 ps-lg-5 pt-sm-3 text-sm-center">
                        <label class="form-label" for="montant_a_payer">Cotisation mensuelle</label>
                        <input type="text" name="montant_a_payer" id="montant_a_payer" class="montant_a_payer form-control w-75 mx-auto" value="120">
                    </div>
                </div>
                <div class="row field-add_resident pt-lg-3">
                    <div class="col-12 col-lg-6 col-add_resident col-resident1 ps-lg-5 pt-sm-3 text-sm-center">
                        <label class="form-label" for="appartement">Numéro de l'appartement</label>
                        <select class="form-select w-75 mx-auto" name="appartement" id="appartement">
                            {{$outputs}}
                        </select>
                    </div>
                </div>

                <div class="row field-add_resident mt-4">
                    <div class="col-12 col-add_resident col-resident1 pt-sm-3 text-center">
                        <button class="btn border-success text-success" type="submit" name="submit">Ajouter</button>
                        <a href="/resident" class="btn border-primary text-primary">Retour</a>
                    </div>
                </div>
            </div>
{{--        </form>--}}
        {!! Form::close() !!}
    </section>

@endsection
@section('extra-js')
    <script src="{{asset('js/jquery.js')}}"></script>
    <script>
        $('#adresse').on('change',function(){
            value=$(this).val();
            value1=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{url('selectApt')}}',
                data:{'test':value, 'test1':value1},
                success:function(data){
                    $('#appartement').html(data);
                    console.log(data);
                }
            });
        })

    </script>

@endsection
