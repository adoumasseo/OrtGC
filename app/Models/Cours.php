<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $annee_id
 * @property integer $classe_id
 * @property integer $enseignant_id
 * @property integer $ecue_id
 * @property integer $contrat_id
 * @property integer $semestre
 * @property integer $heure_theorique
 * @property integer $heure_execute
 * @property string $plage
 * @property string $date_debut
 * @property string $date_fin
 * @property integer $etat
 * @property string $montant
 * @property string $lettre_mission
 * @property string $date_composition
 * @property string $slug
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Cahier[] $cahiers
 * @property Annee $annee
 * @property Contrat $contrat
 * @property Enseignant $enseignant
 * @property Class $class
 * @property Ecue $ecue
 */
class Cours extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['annee_id', 'classe_id', 'enseignant_id', 'ecue_id', 'contrat_id', 'semestre', 'heure_theorique', 'heure_execute', 'plage', 'date_debut', 'date_fin', 'etat', 'montant', 'lettre_mission', 'date_composition', 'slug', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cahiers()
    {
        return $this->hasMany('App\Models\Cahier', 'enseigner_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function annee()
    {
        return $this->belongsTo('App\Models\Annee');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contrat()
    {
        return $this->belongsTo('App\Models\Contrat');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enseignant()
    {
        return $this->belongsTo('App\Models\Enseignant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class()
    {
        return $this->belongsTo('App\Models\Classe', 'classe_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ecue()
    {
        return $this->belongsTo('App\Models\Ecue');
    }
}
