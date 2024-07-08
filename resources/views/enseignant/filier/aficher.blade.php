@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Filier</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr align="center">
                                    <th>Formation</th>
                                    <th>Filier</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Date_creation</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                @foreach ($filiers as $filier)
                                <tr>
                                    <td>{{$filier->formation->nom}}</td>
                                    <td>{{$filier->nom}}</td>
                                    <td>{{$filier->description}}</td>
                                    <td>{{$filier->type}}</td>
                                    <td>{{$filier->created_at}}</td>
                                </tr>
                                @endforeach      
                            </tbody>
                        </table>
                    {{$filiers->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection