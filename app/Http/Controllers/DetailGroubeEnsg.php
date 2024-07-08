<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Etudiant;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DetailGroubeEnsg extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Enseignant $enseignant , $id)
    {
        $groupes = Groupe::find($id);

        // Gate::authorize('view',$enseignant);
        $etudiants = Etudiant::where('groupe_id',$id)->paginate(5);
        return view('enseignant.groupe.show',["groupes"=>$groupes,"etudiants"=>$etudiants]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
