@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Formations</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr align="center">
                                    <th>Nom</th>
                                    <th>durée</th>
                                    <th>Type</th>
                                    <th>date_creation</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                @foreach ($formations as $formation)
                                <tr>
                                    <td>{{$formation->nom}}</td>
                                    <td>{{$formation->duree. ' '. 'mois'}}</td>
                                    <td>{{$formation->type}}</td>
                                    <td>{{$formation->created_at}}</td>
                                </tr>
                                @endforeach      
                            </tbody>
                        </table>
                    {{-- {{$etudiants->links()}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection