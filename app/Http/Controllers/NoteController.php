<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Examen;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::paginate(5);
        $etudiants = Etudiant::all();
        $examens = Examen::all();
        return view("admin.note.index", compact("notes","etudiants","examens"));
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
            'etudiant_id' => 'required|exists:etudiants,id',
            'examen_id' => 'required|exists:examens,id',
            'note' => 'required|numeric',
            'date' => 'required|date',
        ]);
        // dd($request);
         Note::create($request->post());
        return back()->with('success','Ajouter une nouvelle Note avec succès');
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
        $note = Note::find($id);
        $note->update($request->post());
        // dd($note);
        return back()->with('success','Update successful! Changes have been saved.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Note::find($id);
        $note->delete();
        return back()->with('danger','Note has been successfully deleted.');
    }
}
