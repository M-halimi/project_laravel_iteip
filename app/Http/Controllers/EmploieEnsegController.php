<?php

namespace App\Http\Controllers;

use App\Models\EmploieEns;
use App\Models\Enseignant;
use App\Models\Groupe;
use App\Models\Module;
use Illuminate\Http\Request;

class EmploieEnsegController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emploies = EmploieEns::paginate(5);
        $groupes = Groupe::all();
        $enseignants = Enseignant::all();
        $modules = Module::all();
        return view('admin.emploieEns.index',compact('emploies','modules','enseignants','groupes'));
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
        $request->validate([
            'jour' => 'required|string|min:4',
            'Heure_debut' => 'required|date_format:H:i',
            'Heure_fin' => 'required|date_format:H:i|',
            'groupe_id' => 'required|exists:groupes,id',
            'enseignant_id' => 'required|exists:enseignants,id',
            'module_id' => 'required|exists:modules,id',
            'user_id' => 'required|exists:users,id',
            ]);
            // dd($request);
            EmploieEns::create($request->post());
            return redirect()->route('emploiEns.index')->with('success','Ajouter une nouvelle Emploie avec succès');


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
        $emploie = EmploieEns::find($id);
        $emploie->update($request->post());
        return redirect()->route('emploiEns.index')->with('success','Update Emploie avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emploie = EmploieEns::find($id);
        $emploie->delete();
        return redirect()->route('emploiEns.index')->with('danger','delte');
    }
}
