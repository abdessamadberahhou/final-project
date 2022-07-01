{{--Cette page concerne la creation/ajout d'une amelioration--}}
@extends('layouts.app')

@section('section-1')
    <div class="container shadow mt-5 p-5">
        {!! Form::open(['action' => '\App\Http\Controllers\ameliorationController@store','method'=>'POST']) !!}
            <div class="row justify-content-around text-center">
                <div class="col-lg-4">
                    <label for="type_amel" class="form-label">Type amélioration</label>
                    <select name="type_amel" id="" class="form-select">
                        <option value="damage">Damage</option>
                        <option value="changement">Changement</option>
                        <option value="mise a jour">Mise à jour</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="nom_bat" class="form-label">Batiment</label>
                    @if(count($batiment)>0)
                        <select name="batiment" id="" class="form-select">
                            @foreach($batiment as $bat)
                                <option value="{{$bat->nom_bat}}">{{$bat->nom_bat}}</option>
                            @endforeach
                        </select>
                    @else
                                <option value="">Error</option>
                    @endif
                </div>
            </div>
            <div class="row justify-content-around text-center mt-4">
                <div class="col-lg-4">
                    <label for="type_amel" class="form-label">Date d'amélioration</label>
                    <input type="date" class="form-control" name="date_ameli" value="<?php echo date('Y-m-d') ?>">
                </div>
                <div class="col-lg-4">
                    <label for="montant" class="form-label">Montant</label>
                    <input type="text" class="form-control" name="montant" pattern="[0-9]">
                </div>
            </div>
            <div class="row justify-content-around text-center mt-4">
                <div class="col-lg-4">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" class="form-control" name="description"></textarea>
                </div>
                <div class="col-lg-4"></div>
            </div>
        <div class="row justify-content-around text-center mt-4">
            <div class="col-6">
                <button class="btn border-primary text-primary">Ajouter</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
