<?php

namespace App\Http\Controllers;

use App\Models\Banque;
use App\Models\Ufr;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function deleteBanques(Request $request)
    {
        Banque::whereIn('id', $request->banques_ids)->delete();
        notyf()->addSuccess('Banque supprimée avec succès.');
        return response()->json(['success' => true]);
    }

    public function deleteUfrs(Request $request)
    {
        Ufr::whereIn('id', $request->ufrs_ids)->delete();
        notyf()->addSuccess('Ufs supprimée avec succès.');
        return response()->json(['success' => true]);
    }
    
}
