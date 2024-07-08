<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use App\Models\User;
use Illuminate\Http\Request;
use PDOException;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Stagiaires = Stagiaire::paginate(5);
        $users = User::all();
        return view("admin.stagiaire.index", compact("Stagiaires","users"));
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
    public function store(Request $request){
    $request->validate([
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'nom' => 'required|string|max:10',
        'prenom' => 'required|string|max:15',
        'cin' => 'required|string|max:20',
        'copie_diplome' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'convention' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'email' => 'required|email',
    ]);


    try {
        if ($photo = $request->file('photo')) {
            $destinationPath = 'image_stagiaire/';
            $profileImage = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profileImage);
            $request['photo'] = $profileImage;
        }

        if ($copie_diplome = $request->file('copie_diplome')) {
            $destinationPath = 'image_diplome/';
            $profileImage = date('YmdHis') . "." . $copie_diplome->getClientOriginalExtension();
            $copie_diplome->move($destinationPath, $profileImage);
            $request['copie_diplome'] = $profileImage;
        }
        if ($convention = $request->file('convention')) {
            $destinationPath = 'image_convetion/';
            $profileImage = date('YmdHis') . "." . $convention->getClientOriginalExtension();
            $convention->move($destinationPath, $profileImage);
            $request['convention'] = $profileImage;
        }

        Stagiaire::create($request->post());

        return redirect()->route("s.index")->with("success", "Ajout de nouvelle formation effectué avec succès");
    } catch (PDOException $e) {
        return redirect()->route("s.index")->with("success" ,"Une erreur s'est produite lors de l'ajout d'une nouvelle formation");
    }
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
        $stagiaire = Stagiaire::find($id);

        $stagiaire->update($request->post());
        if ($request->hasFile('photo')) {
            $photoName = date('YmdHis') . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('image_stagiaire'), $photoName);
            $stagiaire->photo = $photoName;

        } else {
            unset($request['photo']);
        }

        $stagiaire->update($request->post());
        if ($request->hasFile('copie_diplome')) {
            $photoName = date('YmdHis') . '.' . $request->copie_diplome->getClientOriginalExtension();
            $request->copie_diplome->move(public_path('image_diplome'), $photoName);
            $stagiaire->copie_diplome = $photoName;

        } else {
            unset($request['copie_diplome']);
        }
        $stagiaire->update($request->post());
        if ($request->hasFile('convention')) {
            $photoName = date('YmdHis') . '.' . $request->convention->getClientOriginalExtension();
            $request->convention->move(public_path('image_convetion'), $photoName);
            $stagiaire->convention = $photoName;

        } else {
            unset($request['convention']);
        }
        $stagiaire->save();
         return redirect()->route('s.index')->with('warning','Update successful! Changes have been saved.');
        // dd($Stagiaire);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stagiaire = Stagiaire::find($id);
        // dd($stagiaire);
        $stagiaire->delete();
        return redirect()->route('s.index')->with('danger','Stagiaire has been successfully deleted.');
    }
}
