<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $ufr_id
 * @property integer $chef_departement
 * @property string $code
 * @property string $nom
 * @property string $logo
 * @property string $slug
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property User $user
 * @property Ufr $ufr
 * @property Filiere[] $filieres
 */
class Departement extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['ufr_id', 'chef_departement', 'code', 'nom', 'logo', 'slug', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'chef_departement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ufr()
    {
        return $this->belongsTo('App\Models\Ufr');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filieres()
    {
        return $this->hasMany('App\Models\Filiere');
    }
}
