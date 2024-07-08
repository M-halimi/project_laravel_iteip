<?php

namespace App\Http\Controllers;
// namespace Illuminate\Database\Eloquent;

use App\Models\Filiere;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FilliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres = Filiere::paginate(5);
        $formations = Formation::all();
        return view('admin.filliere.index', compact('filieres','formations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate( [
        'nom' => 'required|string|min:2',
        'description' => 'required|',
        'formation_id' => 'required|exists:formations,id',
        'type' => 'required',Rule::in(['Licence','Master']),
    ]);

    // Custom error messages

    // Validate the request

    // If validation passes, store the data
    Filiere::create([
        'nom' => $request->nom,
        'description' => $request->description,
        'formation_id' => $request->formation_id,
        'type' => $request->type,
        // Add other fields as necessary
    ]);

    // Redirect back or wherever you want after successful submission
    // return redirect()->back()->with('success', 'Data added successfully!');


        // try {
        //     // Attempt to create a record using validated data
        //     Filiere::create($request->only('nom'));
        // } catch (QueryException $e) {
        //     // Check if the error message contains information about a duplicate entry
        //     if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        //         // Handle the case where the entry already exists
        //         return redirect()-back()->with('danger', 'The entry already exists.');
        //     } else {
        //         // Handle other database errors
        //         return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        //     }
        // }

         return redirect()->route('f.index')->with('success','Ajouter une bonne filiere');
}



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $filiere = Filiere::find($id);
        return view('admin.filliere.show',compact('filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{

}



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $filiere = Filiere::find($id);

    // Update the fields with new values from the request
    $filiere->nom = $request->input('nom');
    $filiere->description = $request->input('description');
    $filiere->formation_id = $request->input('formation_id');
    $filiere->type = $request->input('type');

    // Save the updated instance
    $filiere->save();

    return redirect()->route('f.index')->with('warning', 'Update successful! Changes have been saved.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $filiere = Filiere::find($id);
        $filiere->delete();
        return redirect()->route('f.index')->with('danger','Filiere has been successfully deleted.');
    }
}
