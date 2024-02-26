<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Wildside\Userstamps\Userstamps;

/**
 * @property integer $id
 * @property integer $contrat_id
 * @property integer $annee_id
 * @property integer $enseignant_id
 * @property integer $ue_id
 * @property integer $ecue1
 * @property integer $enseignant1
 * @property integer $ecue2
 * @property integer $enseignant2
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
 * @property Enseignant $enseignant
 * @property Enseignant $enseignant
 * @property Contrat $contrat
 * @property Ecue $ecue
 * @property Enseignant $enseignant
 * @property Ue $ue
 */
class Programmation extends Model
{
    use HasFactory, Searchable, SoftDeletes, Sluggable, Userstamps;
    /**
     * @var array
     */
    protected $fillable = ['contrat_id', 'annee_id', 'classe_id', 'ue_id', 'ecue1', 'enseignant1', 'ecue2', 'enseignant2', 'semestre', 'heure_theorique1','heure_theorique2', 'heure_execute', 'plage_debut', 'plage_fin', 'date_debut', 'date_fin', 'etat', 'montant', 'date_composition', 'slug', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

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
    public function class()
    {
        return $this->belongsTo('App\Models\Class', 'classe_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ecue1()
    {
        return $this->belongsTo('App\Models\Ecue', 'ecue1');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enseignant1()
    {
        return $this->belongsTo('App\Models\Enseignant', 'enseignant1');
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
    public function ecue2()
    {
        return $this->belongsTo('App\Models\Ecue', 'ecue2');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enseignant2()
    {
        return $this->belongsTo('App\Models\Enseignant', 'enseignant2');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ue()
    {
        return $this->belongsTo('App\Models\Ue');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nom'
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
