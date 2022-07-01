@extends('layouts.app')

@section('section-1')
    <section class="container shadow mt-5 p-5 rounded-2">
        @if($rs!=null)
        {!! Form::open(['action' => ['\App\Http\Controllers\residentController@update', $rs->Id_resident], 'method'=>'POST', 'class'=>'form col-12']) !!}
        {{--        <form action="\App\Http\Controllers\residentController@store" method="post" class="form col-12">--}}
        <div class="mx-auto w-100">
            <div class="row field-add_resident d-lg-felx d-md-flex">
                <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center t-sm-1 text-xs-center">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control w-75 mx-auto" name="nom" value="{{$rs->Nom}}">
                </div>
                <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                    <label for="prenom" class="form-label" >Prénom</label>
                    <input type="text" class="form-control w-75 mx-auto" name="prenom" value="{{$rs->Prenom}}">
                </div>
            </div>
            <div class="row field-add_resident d-lg-felx pt-lg-3 d-md-flex">
                <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center" >
                    <label class="form-label" for="date_nai">Date de naissance</label>
                    <input type="date" class="form-control w-75 mx-auto" name="date_nai" value="{{$rs->Date_nai}}">
                </div>
                <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                    <label class="form-label" for="cin">CIN</label>
                    <input type="text" class="form-control w-75 mx-auto" name="CIN" value="{{$rs->CIN}}">
                </div>
            </div>
            <div class="row field-add_resident d-lg-felx pt-lg-3">
                <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                    <label class="form-label" for="num_tele">Numéro de Téléphone</label>
                    <input type="text" class="form-control w-75 mx-auto" name="num_tele" value="{{$rs->num_tele}}">
                </div>
                <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                    <label class="form-label" for="nb_pers">Nombre des personnes</label>
                    <input type="text" class="form-control w-75 mx-auto" name="nb_pers" value="{{$rs->nb_pers}}">
                </div>
            </div>
            <div class="row field-add_resident pt-lg-3">
                <div class="col-6 col-lg-6 col-add_resident col-resident1 ps-lg-5 pt-sm-3 text-sm-center">
                    <label class="form-label" for="adresse">Adresse</label>
                    <select class="form-select w-75 mx-auto" name="adresse">
                        @if(count($bat)>0)
                            @foreach($bat as $batiment)
                                <option
                                @if("{{$rs->adresse}}" == "{{$batiment->nom_bat}}")
                                    selected="selected"
                                @endif
                                value="{{$batiment->nom_bat}}">{{$batiment->nom_bat}}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-6 col-lg-6 col-add_resident col-resident1 ps-lg-5 pt-sm-3 text-sm-center">
                    <label class="form-label" for="montant_a_payer">Cotisation mensuelle</label>
                    <input type="text" name="montant_a_payer" id="montant_a_payer" class="montant_a_payer form-control w-75 mx-auto" value="{{$rs->montant_a_payer}}">
                </div>
            </div>
            {!! Form::hidden('_method','PUT') !!}
            <div class="row field-add_resident mt-4">
                <div class="col-12 col-add_resident col-resident1 pt-sm-3 text-center">
                    <button class="btn border-success text-success" type="submit" name="submit">Modifier</button>
                    <button class="btn border-primary"><a href="/resident" class="text-primary">Retour</a></button>
                </div>
            </div>
        </div>
        {{--        </form>--}}
        {!! Form::close() !!}
        @else
        <div class="no_record text-center">
             <h1>Aucun resultat</h1>
        </div>
    </section>
        @endif

@endsection
