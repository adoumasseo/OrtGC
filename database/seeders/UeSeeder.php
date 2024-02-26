<?php

namespace Database\Seeders;

use App\Models\Ue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ues = [

            /* SEMESTRE 1 */

            [
                'code' => 'MTH1101',
                'nom' => "Mathématique générale",
            ],
            [
                'code' => 'ECO1102',
                'nom' => "Économie",
            ],
            [
                'code' => 'CPT1103',
                'nom' => "Comptabilite financière",
            ],
            [
                'code' => 'INF1104',
                'nom' => "Environnement logiciel",
            ],
            [
                'code' => 'INF1105',
                'nom' => "Initiation a l'algorithmique",
            ],
            [
                'code' => 'MTH1106',
                'nom' => "Mathématique pour l'informatique",
            ],
            [
                'code' => 'TCC1107',
                'nom' => "Technique de l'expression écrite et orale",
            ],
            [
                'code' => 'MGT1108',
                'nom' => "Initiation à l'entrepreneuriat",
            ],

            /* SEMESTRE 2 */

            [
                'code' => 'MTH1201',
                'nom' => "Mathématique approfondie",
            ],
            [
                'code' => 'FIN1202',
                'nom' => "Outils et techniques financières",
            ],
            [
                'code' => 'CPT1203',
                'nom' => "Architecture et technologie des ordinateurs",
            ],
            [
                'code' => 'INF1204',
                'nom' => "Initiation à la programmation",
            ],
            [
                'code' => 'INF1205',
                'nom' => "Système linux",
            ],
            [
                'code' => 'INF1206',
                'nom' => "Web design",
            ],
            [
                'code' => 'ANG1207',
                'nom' => "Anglais général",
            ],
            [
                'code' => 'TCC1208',
                'nom' => "Attitude comportementale",
            ],

            /* SEMESTRE 3 */

            [
                'code' => 'MTH1302',
                'nom' => "Probabilité et statistique",
            ],
            [
                'code' => 'CPT1303',
                'nom' => "Contrôle de gestion",
            ],
            [
                'code' => 'INF1301',
                'nom' => "Bases de données",
            ],
            [
                'code' => 'INF1304',
                'nom' => "Maintenance informatique",
            ],
            [
                'code' => 'INF1305',
                'nom' => "Structures de données",
            ],
            [
                'code' => 'MGT1506',
                'nom' => "Entrepreneuriat",
            ],
            [
                'code' => 'ROP1307',
                'nom' => "Recherche opérationnelle",
            ],
            [
                'code' => 'TCC1308',
                'nom' => "Rédaction administrative",
            ],

            /* SEMESTRE 4 */

            [
                'code' => 'INF1401',
                'nom' => "Réseaux informatiques",
            ],
            [
                'code' => 'DRV1402',
                'nom' => "Droit",
            ],
            [
                'code' => 'INF1403',
                'nom' => "Web dynamique",
            ],
            [
                'code' => 'INF1404',
                'nom' => "Analyse et conception orientée objet",
            ],
            [
                'code' => 'INF1405',
                'nom' => "Stage de programmation",
            ],
            [
                'code' => 'INF1406',
                'nom' => "Programmation évènementielle",
            ],
            [
                'code' => 'ANG1407',
                'nom' => "Anglais des affaires",
            ],
            [
                'code' => 'TCC1408',
                'nom' => "Attitude comportementale",
            ],

        ];
        foreach ($ues as $ue) {

            Ue::create([
                'code' => $ue['code'],
                'nom' => $ue['nom'],
            ]);
        }
    }
}
