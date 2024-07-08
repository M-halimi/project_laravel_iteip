<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Formation;
use App\Models\Groupe;
use Illuminate\Http\Request;

class EtudiantControllerafichher extends Controller
{
  
  public function afichher(){
         $formations = Formation::paginate(5);
      
        // $groupes = Groupe::all();
        // $filieres = Filiere::all();
        return view("etudiant.formation.index", compact("formations"));
    } 
    public function aficherEtu()
    {
      $etudiants = Etudiant::paginate(5);
      return view("enseignant.etudiant.aficherEtu", compact("etudiants"));
    }

   

}
