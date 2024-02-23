<?php

namespace App\Http\Controllers;

use App\Models\Banque;
use App\Models\Universite;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function deleteBanques(Request $request)
    {
        Banque::whereIn('id', $request->banques_ids)->delete();
        notyf()->addSuccess('Banque supprimée avec succès.');
        return response()->json(['success' => true]);
    }

    public function deleteUniversites(Request $request)
    {
        Universite::whereIn('id', $request->universites_ids)->delete();
        notyf()->addSuccess('Université supprimée avec succès.');
        return response()->json(['success' => true]);
    }
}
