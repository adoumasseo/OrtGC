<?php

namespace App\Http\Controllers;

use App\Models\Banque;
use App\Models\Ue;
use App\Models\Ufr;
use App\Models\Enseignant;
use App\Models\Cycle;
use App\Models\Ecue;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function deleteBanques(Request $request)
    {
        Banque::whereIn('id', $request->banques_ids)->delete();
        notyf()->addSuccess('Banque supprimée avec succès.');
        return response()->json(['success' => true]);
    }

    public function deleteUes(Request $request)
    {
        Ue::whereIn('id', $request->ues_ids)->delete();
        notyf()->addSuccess('Ue supprimée avec succès.');
        return response()->json(['success' => true]);
    }

    public function deleteUfrs(Request $request)
    {
        Ufr::whereIn('id', $request->ufrs_ids)->delete();
        notyf()->addSuccess('Ufr supprimée avec succès.');
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

    public function deleteEcues(Request $request)
    {
        Ecue::whereIn('id', $request->ecues_ids)->delete();
        notyf()->addSuccess('Ecue supprimée avec succès.');
        return response()->json(['success' => true]);
    }
}
