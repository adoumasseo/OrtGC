<?php

namespace App\Http\Controllers;

use App\Models\Banque;
use App\Models\Ue;
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

}
