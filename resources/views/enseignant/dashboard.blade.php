@extends('layouts.app')
@section('content')
<?php
use App\Models\Enseignant;
// $enseignants = Enseignant::where('nom' , Auth::id());
$user = Enseignant::all();
?>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">List Groupe</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $groupes = App\Models\Groupe::all()->count() }}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">List Etudiant</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $etudiants = App\Models\Etudiant::all()->count() }}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-user-graduate"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">List Abcense Etudiant</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $abcenses = App\Models\AbcenseEtuds::all()->count() }}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-user-times"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">List Formation Instiut</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $formations = App\Models\Formation::all()->count() }}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-graduation-cap"></i></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="laptop1">
                <div class="screen1">
                  <div class="header1"></div>
                  <div class="text1">Welcome, director {{ Auth::user()->last_name }} {{ Auth::user()->first_name }}</div>
                </div>
                <div class="keyboard1"></div>
              </div>
            </div>
            <div class="row">
                <div class="card1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                      <path
                        d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"
                      ><img src="{{ asset('asset/images/Navy Blue Graduates Graduation Program (1).png') }}" width="800px"></path>
                    </svg>
                    <div class="card1__content">
                        <p class="card1__title">Instiut Iteip</p>
                        <p class="card1__description">
                            Le tableau de bord professionnel de l'Institut ITEIP offre une vision holistique de tous les aspects de notre programme de formation en ingénierie informatique. C'est un outil puissant conçu pour fournir des informations pertinentes et exploitables aux diverses parties prenantes, y compris les étudiants, les professeurs et l'administration.
                        </p>
                        <p class="card1__description">
                            Il comprend une gamme d'indicateurs de performance clés (KPIs) pour évaluer le succès du programme, tels que le taux de réussite des étudiants, la satisfaction des étudiants, le taux de placement professionnel, etc. De plus, il offre une interface conviviale pour permettre une navigation intuitive et un accès rapide aux informations essentielles.
                        </p>
                    </div>

                  </div>

            </div>


    </div>
</div>
@endsection
