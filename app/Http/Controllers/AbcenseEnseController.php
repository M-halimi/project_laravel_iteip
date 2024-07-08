<?php

namespace App\Http\Controllers;

use App\Models\EmploieEns;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Models\AbcenseEnseig;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\TestStatus\Success;

class AbcenseEnseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abcenses = AbcenseEnseig::paginate(5);
        //$emploies = EmploieEns::where("enseignant_id", Auth::user()->id)->get();

        // $abcenses = AbcenseEnseig::where("id",1)->with("emploieEns")->first();
        // return $abcenses;
        $enseignants  = Enseignant::all();
        $emploies = EmploieEns::all();
        return view("admin.abcenseEnseig.index", compact("abcenses","enseignants","emploies"));
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
            'enseignant_id' => 'required|exists:enseignants,id',
            'emploie_ens_id' => 'required|exists:emploie_ens,id',
            'arrived_at' => 'required|date_format:H:i',
            'is_justified' => 'boolean',
        ]);
        // dd($request);
        AbcenseEnseig::create($request->post());
        return redirect()->route('abcenseEnseig.index')->with('success','Absence record has been successfully created!');
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
        $abcense = AbcenseEnseig::find($id);
        $abcense->update($request->post());
        // dd($abcense);
        return redirect()->route('abcenseEnseig.index')->with('success','Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $abcense = AbcenseEnseig::find($id);
        $abcense->delete();

        return redirect()->route('abcenseEnseig.index')->with('danger', 'Absence record has been successfully deleted.');
    }

}
