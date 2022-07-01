@extends('layouts.app')
@section('section-1')
    @if($facture!=null)
        <div class="facture_payment container shadow mt-5 p-5">
            <div class="row justify-content-around text-center">
                <div class="col-lg-5">
                    <label for="id_facture" class="label-form">Id facture</label>
                    <input type="text" name="id_facture" id="id_facture" class="form-control" value="{{$facture->id}}"  disabled>
                </div>
                <div class="col-lg-5">
                    <label for="type_facture" class="label-form">Type facture</label>
                    <input type="text" name="type_facture" id="type_facture" class="form-control" value="{{$facture->type_facture}}" disabled>
                </div>
            </div>
            <div class="row justify-content-around text-center mt-lg-4">
                <div class="col-lg-5">
                    <label for="reference_facture" class="label-form">Reference facture</label>
                    <input type="text" name="reference_facture" id="reference_facture" class="form-control" value="{{$facture->reference_facture}}"  disabled>
                </div>
                <div class="col-lg-5">
                    <label for="date_ajout" class="label-form">Date d'ajout</label>
                    <input type="text" name="date_ajout" id="date_ajout" class="form-control" value="{{$facture->date_ajout}}" disabled>
                </div>
            </div>
            <div class="row justify-content-around text-center mt-lg-4">
                <div class="col-lg-5">
                    <label for="montant_facture" class="label-form">Montant facture</label>
                    <input type="text" name="montant_facture" id="montant_facture" class="form-control" value="{{$facture->montant}}"  disabled>
                </div>
                <div class="col-lg-5">
                    <label for="batiment" class="label-form">Batiment</label>
                    <input type="text" name="batiment" id="batiment" class="form-control" value="{{$facture->batiment}}" disabled>
                </div>
            </div>
            <div class="row justify-content-around text-center mt-lg-4">
                <div class="col-lg-5">
                    <label for="id_resident" class="label-form">Id resident</label>
                    <input type="text" name="id_resident" id="id_resident" class="form-control" value="{{$facture->Id_res}}"  disabled>
                </div>
                <div class="col-lg-5">
                    <label for="date_payment" class="label-form">Date de payment</label>
                    <input type="text" name="date_payment" id="date_payment" class="form-control" value="{{$facture->date_payment}}" disabled>
                </div>
            </div>
            <div class="row justify-content-around text-center mt-lg-4">
                <div class="col-lg-5">
                    <label for="statut" class="label-form">statut</label>
                    <input type="text" name="statut" id="statut" class="form-control" value="{{$facture->statut}}"  disabled>
                </div>
                <div class="col-lg-5">
                    <label for="num_recu" class="label-form">Num de reçu</label>
                    <input type="text" name="num_recu" id="num_recu" class="form-control" value="{{$facture->num_recu}}" disabled>
                </div>
            </div>
            <div class="row justify-content-around text-center mt-lg-4">
                <div class="col-lg-5">
                    <a href="/payment/facture" class="btn border-primary text-primary btn-consult">Revenir</a>
                    <a href="{{$facture->id}}/edit" class="btn border-success text-success btn-edit">Modifier</a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center">
            <h1>Aucun resultat</h1>
        </div>
    @endif
@endsection
