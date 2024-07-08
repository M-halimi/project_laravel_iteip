@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mx-auto"> <!-- Added mx-auto class here -->
            <button class="cssbuttons-io-button" type="button"  data-toggle="modal"  data-target="#Addnew">
                <span>Add New Module</span>
                </button>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Module</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Formation</th>
                                    <th class="text-center">Huree de Module</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($modules as $module)
                                <tr>
                                    <td class="text-center">{{$module->nom }}</td>
                                    <td class="text-center">{{$module->formation->nom }}</td>
                                    <td class="text-center">{{$module->nbr_hr.' '.' HR'}}</td>
                                    <td class="text-center">
                                        <div class="btn-group-custom">
                                            <a href="{{ route('m.edit',$module->id) }}" class="editBtn" data-toggle="modal" data-target="#Editnew{{ $module->id }}">
                                                <svg height="1em" viewBox="0 0 512 512"> 
                                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('m.destroy', $module->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="Btn11" type="submit">
                                                    <div class="sign">
                                                        <svg viewBox="0 0 16 16" class="bi bi-trash3-fill" fill="currentColor" height="18" width="18" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="text">Delete</div>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="Editnew{{ $module->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="container-fluid">
                                                <!-- Form for editing existing data -->
                                        <form action="{{ route('m.update', $module->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="nom">Nom de Modul</label>
                                                <input type="text" name="nom" id="nom" value="{{ $module->nom }}"  class="form-control">
                                                @error('nom')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="filiere_id">Formation</label>
                                                <select name="formation_id" id="formation_id"  class="form-control selected">
                                                    <option value="selected">Open this select Formation</option>
                                                    @foreach($formations as $formation)
                                                    <option value="{{ $formation->id }}"{{ $module->formation_id == $formation->id ? 'selected' : ' ' }}>{{ $formation->nom }}</option>
                                                    @endforeach
                                                </select>
                                                @error('formation_id')
                                                    <div class="alert alert-danger mt-5">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-form-label" for="description">Descrption</label>
                                                <textarea type="text" name="description" id="description" class="form-control">{{ $module->nbr_hr }}</textarea>
                                                @error('nom')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto ">
                                                    <button class="button22">
                                                        <span>Submit</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        {{$modules->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- module create  --}}
<div class="modal fade" id="Addnew" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-fluid">
                <!-- Form for creating new data -->
                    <form class="form-valide" action="{{ route('m.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="nom">Nom de Module</label>
                            <input type="text" name="nom" id="nom" class="form-control">
                            @error('nom')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="filiere_id">Formation</label>
                            <select name="formation_id" id="formation_id"  class="form-control selected">
                                <option value="selected">Open this select Formation</option>
                                @foreach($formations as $formation)
                                <option value="{{ $formation->id }}">{{ $formation->nom }}</option>
                                @endforeach
                            </select>
                            @error('formation_id')
                                <div class="alert alert-danger mt-5">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-form-label" for="description">Nbr_hr</label>
                            <input type="number" name="nbr_hr" id="description" class="form-control">
                            @error('nom')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Other necessary form fields here -->
                            <div class="form-group row">
                                    <div class="col-lg-8 ml-auto " >
                                        <button class="button22">
                                            <span>Submit</span>
                                        </button>
                                    </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection