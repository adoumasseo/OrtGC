<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $code
 * @property string $nom
 * @property string $adresse
 * @property string $telephone
 * @property string $siteweb
 * @property string $email
 * @property string $recteur
 * @property string $comptable
 * @property string $ville
 * @property string $logo
 * @property string $slug
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Ufr[] $ufrs
 */
class Universite extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['code', 'nom', 'adresse', 'telephone', 'siteweb', 'email', 'recteur', 'comptable', 'ville', 'logo', 'slug', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ufrs()
    {
        return $this->hasMany('App\Models\Ufr');
    }
}
