<?php

namespace App\Http\Controllers;

use App\Models\AbcenseEtuds;
use App\Models\EmploieEtus;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class AbcenseEtudsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abcenses = AbcenseEtuds::paginate(5);
        $etudiants = Etudiant::all();
        $emploies = EmploieEtus::all();
        return view('admin.abcenseEtudia.index',compact('abcenses','etudiants','emploies'));
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
            'emploie_etuses_id' => 'required|exists:emploie_etuses,id',
            'arrived_at' => 'required|date_format:H:i',
            'is_justified' => 'boolean',

        ]);
        // dd($request);
        AbcenseEtuds::create($request->post());
        return redirect()->route('abcenseEtudi.index')->with('success','Absence record has been successfully created!');
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
        $abcense = AbcenseEtuds::find($id);
        $abcense->update($request->post());
        // dd($abcense);
        return redirect()->route('abcenseEtudi.index')->with('success','Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
