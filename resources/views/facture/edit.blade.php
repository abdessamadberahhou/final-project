@extends('layouts.app')
@section('section-1')
    @if($facture!=null )
        {!! Form::open(['action'=>['factureController@update',$facture->id],'method'=>'post']) !!}
        <input type="hidden" value="{{$facture->id}}" name="id">
        <div class="facture_payment container shadow mt-5 p-5">
            <div class="row justify-content-around text-center">
                <div class="col-lg-5">
                    <label for="reference_facture" class="label-form">Reference facture</label>
                    <input type="text" name="reference" id="reference_facture" class="form-control" value="{{$facture->reference_facture}}" >
                </div>
                <div class="col-lg-5">
                    <label for="type_facture" class="label-form">Type facture</label>
                    <input type="text" class="form-control mx-auto" id="type_facture" name="type_facture" value="{{$facture->type_facture}}" disabled>
                </div>
            </div>
            <div class="row justify-content-around text-center mt-lg-4">
                <div class="col-lg-5">
                    <label for="id_resident" class="label-form">Id
                        @if($facture->id_res != 0)
                            resident
                        @else
                            operateur
                        @endif
                    </label>
                    @if($facture->id_ope != 0)
                        <input type="text" name="id_resident" id="id_resident" class="form-control " value="{{$facture->id_ope}}">
                    @else
                        <input type="text" name="id_resident" id="id_resident" class="form-control " value="{{$facture->Id_res}}">
                    @endif
                </div>
                <div class="col-lg-5">
                    <label for="date_ajout" class="label-form">Date d'ajout</label>
                    <input type="date" name="date_ajout" id="date_ajout" class="form-control" value="{{$facture->date_ajout}}">
                </div>
            </div>
            <div class="row justify-content-around text-center mt-lg-4">
                <div class="col-lg-5">
                    <label for="montant" class="label-form">Montant facture</label>
                    <input type="text" name="montant" id="montant" class="form-control" value="{{$facture->montant}}" >
                </div>
                <div class="col-lg-5">
                    <label for="batiment" class="label-form">Batiment</label>
                    <select class="form-control mx-auto" name="batiment" >
                        @foreach($batiment as $bat)
                            <option
                                @if("{{$facture->batiment}}" == "{{$bat->nom_bat}}")
                                selected="selected"
                                @endif
                                value="{{$bat->nom_bat}}">{{$bat->nom_bat}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row justify-content-around text-center mt-lg-4">

                <div class="col-lg-5">
                    <label for="date_payment" class="label-form">Date de payment</label>
                    <input type="date" name="date_payment" id="date_payment" class="form-control" value="{{$facture->date_payment}}">
                </div>
                <div class="col-lg-5">
                </div>
            </div>
            <div class="row justify-content-around text-center mt-lg-4">
                <div class="col-lg-5">
                    {!! Form::hidden('_method','PUT') !!}
                    <button class="btn border-success text-success btn-edit" type="submit">Modifier</button>
                    <a href="/facture" class="btn border-primary text-primary btn-consult">Retour</a>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    @else
        <div class="aucun_resultat">
            <h3 class="text-center">Aucun resultat ou cette facture deja payee</h3>
        </div>
    @endif
@endsection
@section('extra-js')
    <script>
        let fact = document.getElementById('type_facture');
        t = ['id_resident','cin_res'];
        for(let i = 0; i<t.length;i++){
            document.getElementById(t[i]).setAttribute("disabled","");
        }

        fact.addEventListener('change',()=>{
            resualt = String(fact.options[fact.selectedIndex].value);
            if(resualt == 'f_elec_res' || resualt == 'f_eau_res'){
                for(let i = 0; i<t.length;i++){
                    document.getElementById(t[i]).removeAttribute('disabled');
                }
            }
            else {
                for(let i = 0; i<t.length;i++){
                    document.getElementById(t[i]).setAttribute("disabled","");
                }
            }
        });

    </script>
@endsection
