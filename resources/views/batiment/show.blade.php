{{--Cette page concerne la visualisation d'une batiement--}}
@extends('layouts.app')

@section('section-1')
    <section class="container shadow mt-5 p-5">
        @if($batiment!=null)
            <div class="all pt-5">
                <div class="row text-center mb-5">
                    <h2><b>Information sur le batiment</b></h2>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Nombre d'appartements <span>:</span> </dt>
                        <dd class="col">{{$batiment->nb_apt}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Adresse <span>:</span> </dt>
                        <dd class="col">{{$batiment->adresse}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Nombre d'habitents <span>:</span> </dt>
                        <dd class="col">{{$batiment->nb_hab}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Date de construction <span>:</span> </dt>
                        <dd class="col">{{$batiment->date_cons}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Femme de menage <span>:</span> </dt>
                        <dd class="col">{{$batiment->femme_men}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Batiment <span>:</span> </dt>
                        <dd class="col">{{$batiment->nom_bat}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Nombre d'appartements habités<span>:</span> </dt>
                        <dd class="col">{{$batiment->nb_apt_habite}}</dd>
                    </dl>
                </div>
            </div>
            <div class="retour text-center">
                <a href="/batiment" class="btn border-primary text-primary btn-add">Retour</a>
            </div>
        @else
            <div class="text-center pt-4">
                <h2><b>Aucun resultat</b></h2>
            </div>
            <div class="retour text-center">
                <a href="/batiment" class="btn border-primary text-primary btn-add">Retour</a>
            </div>
        @endif
    </section>
@endsection
@section('section-2')


@endsection
