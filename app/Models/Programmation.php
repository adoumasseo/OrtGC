<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $contrat_id
 * @property integer $annee_id
 * @property integer $enseignant_id
 * @property integer $ue_id
 * @property integer $ecue_id
 * @property integer $semestre
 * @property integer $heure_theorique
 * @property integer $heure_execute
 * @property string $plage_debut
 * @property string $plage_fin
 * @property string $date_debut
 * @property string $date_fin
 * @property integer $etat
 * @property string $montant
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
 * @property Ecue $ecue
 * @property Ue $ue
 * @property Contrat $contrat
 * @property Enseignant $enseignant
 */
class Programmation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['contrat_id', 'annee_id', 'enseignant_id', 'ue_id', 'ecue_id', 'semestre', 'heure_theorique', 'heure_execute', 'plage_debut', 'plage_fin', 'date_debut', 'date_fin', 'etat', 'montant', 'date_composition', 'slug', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cahiers()
    {
        return $this->hasMany('App\Models\Cahier');
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
    public function ecue()
    {
        return $this->belongsTo('App\Models\Ecue');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ue()
    {
        return $this->belongsTo('App\Models\Ue');
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
}
