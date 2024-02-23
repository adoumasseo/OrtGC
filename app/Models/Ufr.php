<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $universite_id
 * @property string $code
 * @property string $nom
 * @property string $adresse
 * @property string $telephone
 * @property string $siteweb
 * @property string $email
 * @property string $directeur
 * @property string $ville
 * @property string $logo
 * @property string $slug
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Contrat[] $contrats
 * @property Departement[] $departements
 * @property Exercer[] $exercers
 * @property Universite $universite
 * @property User[] $users
 */
class Ufr extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['universite_id', 'code', 'nom', 'adresse', 'telephone', 'siteweb', 'email', 'directeur', 'ville', 'logo', 'slug', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

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
    public function departements()
    {
        return $this->hasMany('App\Models\Departement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exercers()
    {
        return $this->hasMany('App\Models\Exercer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function universite()
    {
        return $this->belongsTo('App\Models\Universite');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
