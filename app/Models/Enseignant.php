<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $banque_id
 * @property string $npi
 * @property string $nom
 * @property string $prenoms
 * @property string $adresse
 * @property string $telephone
 * @property string $compte
 * @property string $ifu
 * @property string $nationalite
 * @property string $sexe
 * @property string $email
 * @property string $profession
 * @property string $date_naissance
 * @property string $slug
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Contrat[] $contrats
 * @property Cour[] $cours
 * @property Banque $banque
 * @property Exercer[] $exercers
 */
class Enseignant extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['banque_id', 'npi', 'nom', 'prenoms', 'adresse', 'telephone', 'compte', 'ifu', 'nationalite', 'sexe', 'email', 'profession', 'date_naissance', 'slug', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contrats()
    {
        return $this->hasMany('App\Models\Contrat');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cours()
    {
        return $this->hasMany('App\Models\Cour');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function banque()
    {
        return $this->belongsTo('App\Models\Banque');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exercers()
    {
        return $this->hasMany('App\Models\Exercer');
    }
}
