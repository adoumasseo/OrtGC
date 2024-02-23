<?php

namespace App\Http\Controllers;

use App\Models\Banque;
use App\Models\Enseignant;
use App\Models\Cycle;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function deleteBanques(Request $request)
    {
        Banque::whereIn('id', $request->banques_ids)->delete();
        notyf()->addSuccess('Banque supprimée avec success.');
        return response()->json(['success' => true]);
    }

    public function deleteEnseignants(Request $request)
    {
        Enseignant::whereIn('id', $request->enseignants_ids)->delete();
        notyf()->addSuccess('Enseignant supprimé avec succès.');
        return response()->json(['success' => true]);
    }
    public function deleteCycles(Request $request)
    {
        Cycle::whereIn('id', $request->cycles_ids)->delete();
        notyf()->addSuccess('Cycle supprimé avec success.');
        return response()->json(['success' => true]);
    }
    public function findEnseignantByNpi(Request $request)
    {
        $enseignantExist = Enseignant::where('npi', $request->npi)->first();

        if($enseignantExist) {
            return redirect()->back()->with(['status' => true, 'enseignant' => $enseignantExist,]);
        } else {
            return redirect()->back()->with(['status', false]);
        }
    }
}
