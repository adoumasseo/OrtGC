<?php

namespace App\Http\Controllers;

use App\Models\Banque;
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
public function deleteCycles(Request $request)
{
    Cycle::whereIn('id', $request->cycles_ids)->delete();
    notyf()->addSuccess('Cycle supprimé avec success.');
    return response()->json(['success' => true]);
}

}
