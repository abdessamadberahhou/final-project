@extends('layouts.app')

@section('section-1')
    <section class="container shadow mt-5 p-5 rounded-2">
        {!! Form::open(['action' => '\App\Http\Controllers\operatorController@store', 'method'=>'POST', 'class'=>'form col-12']) !!}
        <div class="mx-auto w-100">
            <div class="row field-add_resident d-lg-felx d-md-flex">
                <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center t-sm-1 text-xs-center">
                    <label for="nom_ope" class="form-label">Nom</label>
                    <input type="text" class="form-control w-75 mx-auto" name="nom_ope">
                </div>
                <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                    <label for="prenom_ope" class="form-label" >Prénom</label>
                    <input type="text" class="form-control w-75 mx-auto" name="prenom_ope">
                </div>
            </div>
            <div class="row field-add_resident d-lg-felx pt-lg-3 d-md-flex">
                <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                    <label class="form-label" for="date_nai_ope">Date de naissance</label>
                    <input type="date" class="form-control w-75 mx-auto" name="date_nai_ope">
                </div>
                <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                    <label class="form-label" for="date_emb_ope">Date d'embauche</label>
                    <input type="date" class="form-control w-75 mx-auto" name="date_emb_ope">
                </div>

            </div>
            <div class="row field-add_resident d-lg-felx pt-lg-3">
                <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                    <label class="form-label" for="cin_ope">CIN</label>
                    <input type="text" class="form-control w-75 mx-auto" name="CIN_ope">
                </div>
                <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                    <label class="form-label" for="num_tele_ope">Num Télé</label>
                    <input type="text" class="form-control w-75 mx-auto" name="num_tele_ope">
                </div>
            </div>
            <div class="row field-add_resident pt-lg-3">
                <div class="col-12 col-lg-6 col-add_resident col-resident1 ps-lg-5 pt-sm-3 text-sm-center">
                    <label class="form-label" for="type_ope">Type opérateur</label>
                    <select class="form-select w-75 mx-auto" name="type_ope">
                        @if(count($operateur)>0)
                            @foreach($operateur as $ope)
                                <option value="{{$ope->type_ope}}">{{$ope->type_ope}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-12 col-lg-6 col-add_resident ps-lg-5 pt-sm-3 text-sm-center">
                    <label class="form-label" for="salaire">Salaire</label>
                    <input type="text" class="form-control w-75 mx-auto" name="salaire">
                </div>
            </div>
            <div class="row field-add_resident mt-4">
                <div class="col-12 col-add_resident col-resident1 pt-sm-3 text-center">
                    <button class="btn border-success text-success" type="submit" name="submit">Ajouter</button>
                    <a href="/operateur" class="btn border-primary text-primary">Retour</a>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>

@endsection
