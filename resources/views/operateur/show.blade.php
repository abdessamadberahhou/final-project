@extends('layouts.app')

@section('section-1')
    <section class="container shadow mt-5 p-5 rounded-2">
        @if($ope!=null)
            <div class="all pt-5">
                <div class="row text-center mb-5">
                    <h2><b>Information sur l'opérateur</b></h2>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Nom <span>:</span> </dt>
                        <dd class="col">{{$ope->nom_ope}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Prénom <span>:</span> </dt>
                        <dd class="col">{{$ope->prenom_ope}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Date de naissance <span>:</span> </dt>
                        <dd class="col">{{$ope->date_nai_ope}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Date d'embauche <span>:</span> </dt>
                        <dd class="col">{{$ope->date_emb_ope}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">CIN <span>:</span> </dt>
                        <dd class="col">{{$ope->cin_ope}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Numéro de téléphone <span>:</span> </dt>
                        <dd class="col">{{$ope->num_tele_ope}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Type opérateur <span>:</span> </dt>
                        <dd class="col">{{$ope->type_ope}}</dd>
                    </dl>
                </div>
                <div class="row w-75 mx-auto">
                    <dl class="col-12 d-flex">
                        <dt class="col d-flex justify-content-between pe-5">Salaire <span>:</span> </dt>
                        <dd class="col">{{$ope->salaire}} MAD</dd>
                    </dl>
                </div>
                <div class="retour text-center">
                    <a href="/operateur" class="btn border-primary text-primary btn-add">Retour</a>
                </div>
            </div>
        @else
            <div class="text-center">
                <h1>Aucun resultat</h1>
            </div>
            <div class="retour text-center">
                <a href="/operateur" class="btn border-primary text-primary btn-add">Retour</a>
            </div>
        @endif
    </section>

@endsection
@section('section-2')
    <div class="container shadow mt-5">
        <table class="table">
            <tr>
                <th><b>Mois</b></th>
                <th class="month text-center">JANVIER</th>
                <th class="month text-center">FÉVRIER</th>
                <th class="month text-center">MARS</th>
                <th class="month text-center">AVRIL</th>
                <th class="month text-center">MAI</th>
                <th class="month text-center">JUIN</th>
                <th class="month text-center">JUILLET</th>
                <th class="month text-center">AOÛT</th>
                <th class="month text-center">SEPTEMBRE</th>
                <th class="month text-center">OCTOBRE</th>
                <th class="month text-center">NOVEMBRE</th>
                <th class="month text-center">DÉCEMBRE</th>
            </tr>
            <tr>
                <td><b>Statut</b></td>
                <td class="statut text-center">{{$jan}}</td>
                <td class="statut text-center">{{$feb}}</td>
                <td class="statut text-center">{{$mar}}</td>
                <td class="statut text-center">{{$apr}}</td>
                <td class="statut text-center">{{$may}}</td>
                <td class="statut text-center">{{$jun}}</td>
                <td class="statut text-center">{{$jul}}</td>
                <td class="statut text-center">{{$aug}}</td>
                <td class="statut text-center">{{$sep}}</td>
                <td class="statut text-center">{{$oct}}</td>
                <td class="statut text-center">{{$nov}}</td>
                <td class="statut text-center">{{$dec}}</td>
            </tr>
        </table>

@endsection
@section('extra-js')
            <script>
                let month = document.getElementsByClassName('month');
                for(let i=0;i<month.length;i++){
                    month[i].style.color = 'darkgray';
                }
                let statut = document.getElementsByClassName('statut')
                for(let i=0;i<statut.length;i++){
                    if(statut[i].innerHTML.toString() == 'payée'){
                        statut[i].style.fontWeight = 'bold';
                        statut[i].style.color = '#0cf510';
                    }
                    else if(statut[i].innerHTML == 'impayée'){
                        statut[i].style.color = '#f5200c';
                        statut[i].style.fontWeight = 'bold';
                    }
                }
            </script>
@endsection
