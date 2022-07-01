{{--Cette page concerne la modification d'une batiement--}}

@extends('layouts.app')

@section('section-1')
    <section class="container shadow mt-5 p-5">
        {!! Form::open(['action' => ['\App\Http\Controllers\batimentController@update',$batiment->id] , 'method'=>'POST', 'class'=>'form col-12']) !!}
        <div class="mx-auto w-100">
            <div class="row d-lg-felx d-md-flex">
                <div class="col-12 col-lg-6 ps-lg-5 pt-sm-3 text-sm-center t-sm-1 text-xs-center" >
                    <label for="nb_apt" class="form-label">Nombre d'appartements</label>
                    <input type="text" class="form-control w-75 mx-auto" name="nb_apt" value="{{$batiment->nb_apt}}">

                </div>
                <div class="col-12 col-lg-6 ps-lg-5 pt-sm-3 text-sm-center">
                    <label for="adresse" class="form-label" >Adresse</label>
                    <input type="text" class="form-control w-75 mx-auto" name="adresse" value="{{$batiment->adresse}}" >
                </div>
            </div>
            <div class="row d-lg-felx pt-lg-3 d-md-flex">
                <div class="col-12 col-lg-6 ps-lg-5 pt-sm-3 text-sm-center">
                    <label class="form-label" for="nb_hab">Nombre d'habitents</label>
                    <input type="text" class="form-control w-75 mx-auto" name="nb_hab" value="{{$batiment->nb_hab}}" >
                </div>
                <div class="col-12 col-lg-6 ps-lg-5 pt-sm-3 text-sm-center">
                    <label class="form-label" for="date_cons">Date de construction</label>
                    <input type="date" class="form-control w-75 mx-auto" name="date_cons" value="{{$batiment->date_cons}}" >
                </div>
            </div>
            <div class="row d-lg-felx pt-lg-3 d-md-flex">
                <div class="col-12 col-lg-6 ps-lg-5 pt-sm-3 text-sm-center">
                    <label class="form-label" for="femme_men">Femme de menage</label>
                    <select class="form-control w-75 mx-auto" name="femme_men" >
                        @foreach($operateur as $ope)
                                <option
                                        @if("{{$batiment->femme_men}}" == "{{$ope->nom_ope}}")
                                            selected="selected"
                                        @endif
                                        value="{{$ope->prenom_ope}}">{{$ope->prenom_ope}}
                                </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-lg-6 ps-lg-5 pt-sm-3 text-sm-center">
                    <label class="form-label" for="nom_bat">Batiment</label>
                    <input type="text" class="form-control w-75 mx-auto" name="nom_bat" value="{{$batiment->nom_bat}}" >
                </div>
            </div>
            <div class="row d-lg-felx pt-lg-3">
            {!! Form::hidden('_method','PUT') !!}
                <div class="row field-add_resident mt-4">
                    <div class="col-12 col-add_resident col-resident1 pt-sm-3 text-center">
                        <a href="#"><button type="submit" class="btn border-success text-success">Modifier</button></a>
                        <a href="/batiment" class="text-primary btn border-primary">Retour</a>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </section>

@endsection
@section('section-2')


@endsection
