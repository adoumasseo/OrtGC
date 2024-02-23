<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\contratstoreRequest;
use App\Http\Requests\ContratUpdateRequest;
use App\Models\User;
use App\Models\Ufr;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\Style\Paper;

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
        $ufr = Ufr::find(1);
        $paper = new Paper();
        $paper->setSize('A4');
        // Créer une nouvelle instance de PhpWord
        $phpWord = new PhpWord();

        $textFontStyle = array(
            'name' => 'Arial',
            'size' => 14,
        );

        // Titre encadré contrat
        $phpWord->addFontStyle('TextFont', $textFontStyle);
        $section = $phpWord->addSection();
        $table = $section->addTable(array('align' => 'center'));
        $table->addRow();
        $cell = $table->addCell($paper->getWidth());
        $cell->setHeight(300000);

        $textRun = $cell->addTextRun(array('alignment' => 'center'));
        $textRun->addText('CONTRAT DE PRESTATION D’ENSEIGNEMENT',array('name' => 'Arial', 'size' => 16, 'bold' => true));

        // Appliquer les bordures à la cellule
        $cell->getStyle()->setBorderTopSize(6); // Bordure supérieure
        $cell->getStyle()->setBorderTopColor('000000');
        $cell->getStyle()->setBorderBottomSize(6); // Bordure inférieure
        $cell->getStyle()->setBorderBottomColor('000000');
        $cell->getStyle()->setBorderLeftSize(6); // Bordure gauche
        $cell->getStyle()->setBorderLeftColor('000000');
        $cell->getStyle()->setBorderRightSize(6); // Bordure droite
        $cell->getStyle()->setBorderRightColor('000000');

        //Contenu
        $section->addText('N°	-…………………/UAC/ENEAM/DA/SGE/SC/SPE/SerP du	……………………………………', 'TextFont');

        $section->addText( $ufr->nom . ' (' . $ufr->code . ')' . ',' . $ufr->adresse .', représentée par le Directeur' . $ufr->directeur .' téléphone : ' . $ufr->telephone . ', E-mail professionnel : ' . $ufr->email . ' ci-après dénommé « ETABLISSEMENT » d’une part, ','TextFont');

        $section->addText('Et', array('name' => 'Arial', 'size' => 14, 'bold' => true));

        $section->addText('Monsieur : ' . 'Meshach Godwin' . '........................');
        $section->addText('Nationalité : ' . 'Meshach Godwin' . '........................');
        $section->addText('Profession : ' . 'Meshach Godwin' . '........................');
        $section->addText('Domicilié : ' . 'Meshach Godwin' . '........................');
        $section->addText('IFU : ' . 'Meshach Godwin' . '........................');
        $section->addText('Compte bancaire : ' . 'Meshach Godwin' . '........................');
        $section->addText('Banque : ' . 'Meshach Godwin' . '........................');
        $section->addText('Email : ' . 'Meshach Godwin' . '........................');
        $section->addText('Numéro de téléphone : ' . 'Meshach Godwin' . '........................');

        $section->addText("ci-après dénommé « L’ENSEIGNANT PRESTATAIRE » d’autre part");

        $section->addText("qui déclare être disponible pour fournir les prestations objet du présent contrat, ci-après dénommé
        « PRESTATIONS D’ENSEIGNEMENT»,
        ");

        $section->addText("Considérant que l’ENEAM est disposée à faciliter à l’enseignant prestataire l’exécution de ses prestations, conformément aux clauses et conditions du présent contrat ;");


        // Enregistrer le document Word dans un fichier temporaire
        $tempFilePath = tempnam(sys_get_temp_dir(), 'word');
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFilePath);

        // Télécharger le fichier Word
        return response()->download($tempFilePath, 'example.docx')->deleteFileAfterSend(true);
    }

    public function generateLettreMission(Request $request){

        $enseignant = User::find(1);

        $phpWord = new PhpWord();

        
        $phpWord->addFontStyle('TextFontStype', array('name' => 'Times New Roman', 'size'=>12));
        $phpWord->addParagraphStyle('ParagraphStype', array('align'=>'both', 'spaceAfter'=>100));


        $section = $phpWord->addSection();
        $section->addText('     L’Ecole nationale d’Economie appliquée et de Management (ENEAM) est heureuse de votre accord d’enseigner les cours recensés dans le tableau ci-dessous à ses étudiants du cycle 1. Vous avez ainsi à charge de délivrer 110 heures de cours (cours théoriques, travaux dirigés, travaux pratiques, ateliers/sorties pédagogiques/stages, y compris) aux apprenants. Les détails sur les cours et leurs programmations sont joints à cette lettre de mission.','TextFontStype','ParagraphStype');

        // Enregistrer le document Word dans un fichier temporaire
        $tempFilePath = tempnam(sys_get_temp_dir(), 'word');
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFilePath);

        // Télécharger le fichier Word
        return response()->download($tempFilePath, 'Lettre'.$enseignant->nom.'.docx')->deleteFileAfterSend(true);
    }


}
