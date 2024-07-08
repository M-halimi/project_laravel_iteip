@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Groupe</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr align="center">
                                        <th>Nom</th>
                                        <th>Formation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                    @foreach ($groupes as $groupe)
                                        <tr>
                                            <td>{{ $groupe->nom }}</td>
                                            <td>{{ $groupe->formation->nom }}</td>
                                            
                                               <td class="centered-cell" align="center">
                                                {{-- @if ( Auth::user()->id == $enseignant->id) --}}
                                                       <a href="{{ route('det.show', $groupe->id) }}" class="btn btn-primary">Show</a>
                                                {{-- @endif --}}
                                            </td> 
                                           
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{$groupes->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
