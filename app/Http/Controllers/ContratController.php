<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\contratstoreRequest;
use App\Http\Requests\ContratUpdateRequest;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Facades\Auth;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $contrats = Contrat::get();

        return view('contrats.index', compact('contrats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {

        return view(
            'contrats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(contratstoreRequest $request): RedirectResponse
    {
        // $this->authorize('create', Contrat::class);

        $validated = $request->validated();

        $contrat = Contrat::create($validated);
        notyf()->addSuccess('Contrat créée avec success.');
        return redirect()->route('contrats.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Contrat $contrat): View
    {
    
        return view('contrats.show', compact('Contrat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Contrat $contrat): View
    {
        return view(
            'contrats.edit',
            compact('Contrat')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ContratUpdateRequest $request,
        Contrat $contrat
    ): RedirectResponse {
        // $this->authorize('update', $contrat);

        $validated = $request->validated();

        $contrat->update($validated);
        notyf()->addSuccess('Contrat modifiée avec success.');
        return redirect()
            ->route('contrats.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Contrat $contrat
    ): RedirectResponse {
        // $this->authorize('delete', $contrat);

        $contrat->delete();
        notyf()->addSuccess('Contrat supprimée avec success.');
        return redirect()
            ->route('contrats.index');
    }

    public function generateWord()
    {
        // Créer une nouvelle instance de PhpWord
        $phpWord = new PhpWord();

        // Définir la police par défaut pour le document
        $defaultFontStyle = array('name' => 'Arial', 'size' => 12);
        $phpWord->setDefaultFont($defaultFontStyle);

        // Ajouter du contenu au document Word
        $section = $phpWord->addSection();
        $section->addText('Bonjour Monde!');


        // Ajouter un titre
        $titleStyle = array('size' => 16, 'bold' => true); // Style pour le titre
        $phpWord->addTitleStyle(1, $titleStyle); // Définition du style de titre

        $section = $phpWord->addSection(); // Ajout d'une section au document
        $section->addTitle('Titre 1', 1); // Ajout du titre à la section



        // Ajouter un tableau
        $section = $phpWord->addSection();

        // Définir les données du tableau
        $tableData = array(
            array('Nom', 'Âge', 'Ville'),
            array('Jean', 25, 'Paris'),
            array('Marie', 30, 'Lyon'),
            array('Pierre', 28, 'Marseille')
        );

        // Ajouter le tableau à la section
        $table = $section->addTable();
        foreach ($tableData as $rowData) {
            $table->addRow();
            foreach ($rowData as $cellData) {
                $table->addCell()->addText($cellData);
            }
        }


        // Enregistrer le document Word dans un fichier temporaire
        $tempFilePath = tempnam(sys_get_temp_dir(), 'word');
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFilePath);

        // Télécharger le fichier Word
        return response()->download($tempFilePath, 'example.docx')->deleteFileAfterSend(true);
    }


}
