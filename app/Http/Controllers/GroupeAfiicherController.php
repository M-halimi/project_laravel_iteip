<?php

namespace App\Http\Controllers;

use App\Models\EmploieEns;
use App\Models\Groupe;
use App\Models\Etudiant;
use App\Models\Formation;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupeAfiicherController extends Controller
{
    public function afichher()
    {
        $groupes = Groupe::paginate(5);
        $formations = Formation::all();
        return view("etudiant.groupe.afichher",compact('groupes','formations'));
    }
    public function afichherEns()
    {
        // if(Auth::id() == $groupes->id){
            // $emploie = EmploieEns::all();
            // $firstItem = $emploie->first();
            // dd($firstItem->id);
            // dd($enseignant->id)->first);

        //   dd(  $groupes = Groupe::where( ));
          $groupes = Groupe::all( );
            //    dd($groupes);;
                $enseignant = Enseignant::where('user_id', Auth::id())->first();    
                // $groupes = Groupe::where("enseignant_id" , $enseignant->id )->get();
                // $emploies =  EmploieEns::where("enseignant_id" ,  $enseignant->id)->get();
                $formations = Formation::all();
        // }
       
        
        return view("enseignant.groupe.afichhegroup",compact('groupes','formations','enseignant'));
    }
}
