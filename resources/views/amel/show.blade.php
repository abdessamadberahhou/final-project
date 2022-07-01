{{--Cette page concerne la visualisation d'une amelioration--}}
@extends('layouts.app')

@section('section-1')
    <section class="container shadow mt-5 p-5">
        @if($batiment!=null)
            <div class="all pt-5">
                <div class="row text-center mb-5">
                    <h2><b>Information sur l'amelioration</b></h2>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Type amelioration <span>:</span> </dt>
                        <dd class="col">{{$amelioration->type_amel}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Batiment <span>:</span> </dt>
                        <dd class="col">{{$amelioration->batiment_amel}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Date d'amelioration <span>:</span> </dt>
                        <dd class="col">{{$amelioration->date_amel}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Montant <span>:</span> </dt>
                        <dd class="col">{{$amelioration->montant_amel}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Description <span>:</span> </dt>
                        <dd class="col">{{$amelioration->description_amel}}</dd>
                    </dl>
                </div>
                <div class="retour text-center">
                    <a href="/amelioration" class="btn border-primary text-primary btn-add">Retour</a>
                </div>
            </div>
        @else
            <div class="text-center pt-4">
                <h2><b>Aucun resultat</b></h2>
            </div>
        @endif
    </section>
@endsection
