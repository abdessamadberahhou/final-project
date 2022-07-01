@extends('layouts.app')


@section('section-1')
    <div class="container shadow mt-5 p-5">
        {!! Form::open(['action'=>['\App\Http\Controllers\ameliorationController@update',$amelioration->id_amel],'method'=>'post']) !!}
        <div class="row justify-content-around text-center">
            <div class="col-lg-4">
                <label for="type_amel" class="form-label">Type amelioration</label>
                <select class="form-control" name="type_amel" >
                    @foreach($all_amel as $amel)
                        <option
                            @if("{{$amelioration->type_amel}}" == "{{$amel->type_amel}}")
                            selected="selected"
                            @endif
                            value="{{$amel->type_amel}}">{{$amel->type_amel}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4">
                <label for="nom_bat" class="form-label">Batiment</label>
                <select class="form-control" name="batiment" >
                    @foreach($batiment as $bat)
                        <option
                            @if("{{$amelioration->batiment_amel}}" == "{{$bat->nom_bat}}")
                            selected="selected"
                            @endif
                            value="{{$bat->nom_bat}}">{{$bat->nom_bat}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row justify-content-around text-center mt-4">
            <div class="col-lg-4">
                <label for="type_amel" class="form-label">Date d'amelioration</label>
                <input type="date" class="form-control" name="date_ameli" value="{{$amelioration->date_ameli}}">
            </div>
            <div class="col-lg-4">
                <label for="montant" class="form-label">Montant</label>
                <input type="text" class="form-control" name="montant" value="{{$amelioration->montant_amel}}">
            </div>
        </div>
        <div class="row justify-content-around text-center mt-4">
            <div class="col-lg-4">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" name="description">{{$amelioration->description_amel}}</textarea>
            </div>
            <div class="col-lg-4"></div>
        </div>
        {!! Form::hidden('_method','PUT') !!}
        <div class="row justify-content-around text-center mt-4">
            <div class="col-6">
                <button class="btn border-success text-success" type="submit">Modifier</button>
                <a href="/amelioration" class="btn border-primary text-primary">Retour</a>
            </div>
        </div>
        {!! Form::close(); !!}
    </div>
@endsection
