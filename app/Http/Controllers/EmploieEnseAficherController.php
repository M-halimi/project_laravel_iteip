<?php

namespace App\Http\Controllers;

use App\Models\EmploieEns;
use App\Models\Enseignant;
use App\Models\Groupe;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmploieEnseAficherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enseignant =  Enseignant::where('user_id' , Auth::id())->first();
        $emploies =  EmploieEns::where("enseignant_id" ,  $enseignant->id)->get();
        // $emploies = EmploieEns::where('enseignant_id',  Auth::id(-))->get();
        $enseignants = Enseignant::all();
        $groupes = Groupe::all();
        $Modules = Module::all();
        return view("enseignant.emploie.emploie", compact("emploies","Modules","groupes","enseignants"));

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
    public function show(string $id)
    {
        //
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
