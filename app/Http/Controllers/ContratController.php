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
            'contrats.create'
        );
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
            'name' => 'Calibri',
            'size' => 10,
        );

        // Titre encadré contrat
        $phpWord->addFontStyle('TextFont', $textFontStyle);
        $phpWord->addNumberingStyle(
            'multilevel',
            array(
                'type' => 'multilevel',
                'levels' => array(
                    array('format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
                    array('format' => 'upperLetter', 'text' => '%2.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
                )
            )
        );
        $section = $phpWord->addSection();
        $table = $section->addTable(array('align' => 'center'));
        $table->addRow();
        $cell = $table->addCell($paper->getWidth());
        $cell->setHeight(300000);

        $textRun = $cell->addTextRun(array('alignment' => 'center'));
        $textRun->addText('CONTRAT DE PRESTATION D’ENSEIGNEMENT', array('name' => 'Calibri', 'size' => 16, 'bold' => true));

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
        $section->addText('');
        $section->addText('N°……………-……………/' . $ufr->universite->nom . '/' . $ufr->nom . '/DA/SGE/SC/SPE/SerP du ……………………', 'TextFont', array('size' => 11, 'bold' => true, 'italic' => true, 'alignment' => 'center'));
        $section->addText('Entre: ', array('bold' => true));

        $section->addText($ufr->nom . ' (' . $ufr->code . ')' . ',' . $ufr->adresse . ', représentée par le Directeur' . $ufr->directeur . ' téléphone : ' . $ufr->telephone . ', E-mail professionnel : ' . $ufr->email . ' ci-après dénommé « ETABLISSEMENT » d’une part, ', 'TextFont');

        $section->addText('Et', array('bold' => true));

        $section->addText('Monsieur/' . 'JOHN DOE' . '........................');
        $section->addText('Nationalité : ' . 'Béninoise' . '........................');
        $section->addText('Profession : ' . 'Enseignant Chercheur en Génie informatique et Télécommunication' . '........................');
        $section->addText('Domicilié : ' . 'Calavi' . '........................');
        $section->addText('IFU : ' . '345678907654' . '........................');
        $section->addText('Compte bancaire N° : ' . 'BJ 456789008765' . '......................../Banque : ' . 'UBA' . '........................');
        $section->addText('Email : ' . 'john.doe@gmail.com' . '........................');
        $section->addText('Numéro de téléphone : ' . '68654356' . '........................');
        $section->addText("ci-après dénommé « L’ENSEIGNANT PRESTATAIRE » d’autre part");
        $section->addText("qui déclare être disponible pour fournir les prestations objet du présent contrat, ci-après dénommé « PRESTATIONS D’ENSEIGNEMENT »,");

        $section->addText('');
        $section->addText("Considérant que l’ENEAM est disposée à faciliter à l’enseignant prestataire l’exécution de ses prestations, conformément aux clauses et conditions du présent contrat ;");

        $section->addText('');
        $section->addText("Les parties au présent contrat ont convenu de ce qui suit :");
        $section->addText('');
        $section->addText('         1-   Objet du contrat', array('bold' => true));
        $section->addText("Le présent contrat a pour objet la fourniture de prestations d’enseignement à l’ENEAM dans les conditions de délai, normes académiques et de qualité conformément aux clauses et conditions ci-après énoncées.");

        $section->addText("");
        $section->addText('         2-   Nature des prestations', array('bold' => true));
        $section->addText("L’Entité retient par la présente les prestations de l’enseignant pour l’exécution de trente (..30..) heures d’enseignement des cours de : ");
        $section->addListItem("Lorem Ipsum", null, null, 'multilevel', array('alignment' => 'center'));
        $section->addListItem("Lorem Ipsum", null, null, 'multilevel', array('alignment' => 'center'));
        $section->addListItem("Lorem Ipsum", null, null, 'multilevel', array('alignment' => 'center'));

        $section->addText('Conformément aux exigences énumérées dans le cahier de charges joint au présent contrat.', array('italic' => true));

        $section->addText('         3-   Date de démarrage et calendrier', array('bold' => true));
        $section->addText('La durée de la prestation est de..............jours ouvrables à partir de :');
        $section->addText('');
        $tableStyle = array(
            'borderSize' => 6, // Définir la taille des bordures
            'borderColor' => '000000', // Définir la couleur des bordures
            'cellMargin' => 50, // Définir la marge intérieure des cellules
            'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER // Aligner le contenu des cellules au centre
        );
        $table = $section->addTable($tableStyle);
        $table->addRow();
        $table->addCell()->addText('Département', array('bold' => true));
        $table->addCell()->addText('Année', array('bold' => true));
        $table->addCell()->addText('ECUE¹', array('bold' => true));
        $table->addCell()->addText('Nombre', array('bold' => true));
        $table->addCell()->addText('Date de', array('bold' => true));
        $table->addCell()->addText('Date de fin', array('bold' => true));

        $table->addRow();
        $table->addCell()->addText('IG');
        $table->addCell()->addText('Master IG');
        $table->addCell()->addText('Virtualisation et Cloud computing');
        $table->addCell()->addText('30H');
        $table->addCell()->addText('23 Novembre');
        $table->addCell()->addText('05 Décembre');


        $section->addText('');
        $section->addText('         4-   Temps de présence', array('bold' => true));
        $section->addText("Dans l’exécution du présent contrat, « L’ENSEIGNANT PRESTATAIRE » ….AGOSSOU Mawutin Martien Carlos............assurera également un volume horaire hebdomadaire de	20H……………de travaux dirigés et de travaux pratiques s’il y en a lieu. En outre, il surveillera les travaux de recherche des apprenants dans les conditions prévues par les textes de l’ENEAM.");

        $section->addText("");
        $section->addText('         5-   Termes de paiement et prélèvements', array('bold' => true));
        $section->addText("Les honoraires pour les prestations d’enseignement sont de	FCFA brut par heure exécutée conformément aux exigences de l’ENEAM.");
        $section->addText("Les paiements sont effectués en Francs CFA à la fin des prestations (dépôt de sujets, corrigés types et copies corrigées) dûment constatées par une attestation de service fait, par virement bancaire après le prélèvement de l’AIB.");

        $section->addText("");
        $section->addText('         6-   Normes de Performance', array('bold' => true));
        $section->addText("L’enseignant prestataire s’engage à fournir les prestations conformément aux normes professionnelles, d’éthique et déontologiques, de compétence et d’intégrité les plus exigeantes. Il est systématiquement mis fin au présent contrat en cas de défaillance du prestataire constatée et motivée par écrit de l’ENEAM");

        $section->addText("");
        $section->addText('         7-   Droit de propriété, de devoir de réserve et de non-concurrence', array('bold' => true));
        $section->addText("Pendant la durée d’exécution du présent contrat et les cinq années suivant son expiration, l’enseignant prestataire ne divulguera aucune information exclusive ou confidentielle concernant la prestation, le présent contrat, les affaires ou les documents de l’ENEAM sans avoir obtenu au préalable l’autorisation écrite de l’Unité de formation et de recherche concernée.");
        $section->addText("");
        $section->addText("Tous les rapports ou autres documents, que l’enseignant prestataire préparera pour le compte l’ENEAM dans le cadre du présent contrat deviendront et demeureront la propriété de l’ENEAM");
        $section->addText("");
        $section->addText("Ne sont pas pris en compte les cours et autres documents préparés par l’enseignant pour l’exécution de ses prestations.");

        $section->addText("");
        $section->addText("");
        $section->addText("");
        $section->addText('         8-   Règlement des litiges', array('bold' => true));
        $section->addText("Pour tout ce qui n’est pas prévu au présent contrat, les parties se référeront aux lois béninoises en la matière. Tout litige survenu lors de l’exécution du présent contrat sera soumis aux juridictions compétentes, s’il n’est pas réglé à l’amiable ou par tout autre mode de règlement agréé par les deux parties.");
        $section->addText("");
        $section->addText('Fait en Trois (3) copies originales à Cotonou..............,le 15 Décembre 2023', 'TextFont', array('alignment' => 'center'));

        $section->addText("");
        $section->addText("");
        $section->addText('Pour l\'ENEAM', 'TextFont', array('alignment' => 'end'));
        $section->addText('L\'enseignant prestataire,                                                                                                 Le Directeur,', array('bold' => true));

        $section->addText("");
        $section->addText("");
        $section->addText("");
        $section->addText('Monsieur AGOSSOU Mawutin Martien Carlos                                  Professeur HONLONKOU N’lédji Albert', array('size' => 9, 'bold' => true));

        $section->addText("");
        $section->addText("");
        $section->addText("");
        $section->addText('                                                         VISA DE L\'AGENT COMPTABLE', array('bold' => true, 'alignment' => 'center',));


        // Enregistrer le document Word dans un fichier temporaire
        $tempFilePath = tempnam(sys_get_temp_dir(), 'word');
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFilePath);


        // Télécharger le fichier Word
        return response()->download($tempFilePath, 'example.docx')->deleteFileAfterSend(true);
    }

    public function generateLettreMission(Request $request)
    {

        $enseignant = User::find(1);

        $phpWord = new PhpWord();


        $phpWord->addFontStyle('TextFontStype', array('name' => 'Times New Roman', 'size' => 12));
        $phpWord->addParagraphStyle('ParagraphStype', array('align' => 'both', 'spaceAfter' => 100));


        $section = $phpWord->addSection();
        $section->addText('     L’Ecole nationale d’Economie appliquée et de Management (ENEAM) est heureuse de votre accord d’enseigner les cours recensés dans le tableau ci-dessous à ses étudiants du cycle 1. Vous avez ainsi à charge de délivrer 110 heures de cours (cours théoriques, travaux dirigés, travaux pratiques, ateliers/sorties pédagogiques/stages, y compris) aux apprenants. Les détails sur les cours et leurs programmations sont joints à cette lettre de mission.', 'TextFontStype', 'ParagraphStype');

        // Enregistrer le document Word dans un fichier temporaire
        $tempFilePath = tempnam(sys_get_temp_dir(), 'word');
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFilePath);

        // Télécharger le fichier Word
        return response()->download($tempFilePath, 'Lettre' . $enseignant->nom . '.docx')->deleteFileAfterSend(true);
    }
}
