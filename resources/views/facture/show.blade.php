@extends('layouts.app')
@section('section-1')
    <section class="container shadow mt-5 py-3">
        @if($fac != null)
            <div class="all pt-5">
                <div class="row text-center mb-5">
                    <h2><b>Information sur la facture</b></h2>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Id de facture <span>:</span> </dt>
                        <dd class="col">{{$fac->id}}</dd>
                    </dl>
                </div>
                @if($fac->Id_res != 0)
                    <div class="row w-75 mx-auto">
                        <dl class="col-12 d-flex">
                            <dt class="col d-flex justify-content-between pe-5">Nom de résident <span>:</span> </dt>
                            <dd class="col">{{$fac->nom_res}}</dd>
                        </dl>
                    </div>
                @elseif($fac->id_ope != 0)
                    <div class="row w-75 mx-auto">
                        <dl class="col-12 d-flex">
                            <dt class="col d-flex justify-content-between pe-5">Nom d'operateur <span>:</span> </dt>
                            <dd class="col">{{$fac->nom_ope}}</dd>
                        </dl>
                    </div>
                @endif
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Type de facture <span>:</span> </dt>
                        <dd class="col">
                            {{$fac->type_facture}}
                            @if($fac->type_fact_sec != 0)
                                /{{$fac->type_fact_sec}}
                            @endif
                        </dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Réference de fatcture<span>:</span> </dt>
                        <dd class="col">{{$fac->reference_facture}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Date d'ajout<span>:</span> </dt>
                        <dd class="col">{{$fac->date_ajout}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Montant <span>:</span> </dt>
                        <dd class="col">{{$fac->montant}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Batiment <span>:</span> </dt>
                        <dd class="col">{{$fac->batiment}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Statut <span>:</span> </dt>
                        <dd class="col"><b>{{$fac->statut}}</b></dd>
                    </dl>
                </div>
                @if($fac->statut == 'payée')
                    @if($fac->Id_res != null || $fac->id_ope != null)
                        <div class="row w-75 mx-auto">
                            <dl class="col-12 d-flex">
                                <dt class="col d-flex justify-content-between pe-5">Facture d{{$type}} <span>:</span> </dt>
                                <dd class="col">
                                    @if($fac->nom_res != null)
                                        {{$fac->nom_res}}
                                    @elseif($fac->nom_ope !=0)
                                        {{$fac->nom_ope}}
                                    @endif
                                </dd>
                            </dl>
                        </div>
                        <div class="row w-75 mx-auto">
                            <dl class="col-12 d-flex">
                                <dt class="col d-flex justify-content-between pe-5">id d'{{$type}}<span>:</span> </dt>
                                <dd class="col">
                                    @if($fac->nom_res != null)
                                        {{$fac->Id_res}}
                                    @elseif($fac->nom_ope !=0)
                                        {{$fac->id_ope}}
                                    @endif
                                </dd>
                            </dl>
                        </div>
                    @endif
                    @if($fac->type_fact_sec != null)
                            <div class="row w-75 mx-auto">
                                <dl class="col-12 d-flex">
                                    <dt class="col d-flex justify-content-between pe-5">déscription<span>:</span> </dt>
                                    <dd class="col">{{$fac->description_amelioration}}</dd>
                                </dl>
                            </div>
                    @endif
                @endif
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">date de payment <span>:</span> </dt>
                        <dd class="col">{{$fac->date_payment}}</dd>
                    </dl>
                </div>
            </div>
            <div class="retour text-center">
                <a href="/facture" class="btn border-primary text-primary btn-add">Retour</a>
            </div>
        @else
            <div class="text-center pt-4">
                <h2><b>Aucun resultat</b></h2>
            </div>
                <div class="retour text-center">
                    <a href="/facture" class="btn border-primary text-primary btn-add">Retour</a>
                </div>
        @endif
    </section>

@endsection
@section('section-2')


@endsection
