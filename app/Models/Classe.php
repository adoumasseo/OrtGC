<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $filiere_id
 * @property integer $cycle_id
 * @property string $nom
 * @property string $effectif
 * @property string $slug
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Filiere $filiere
 * @property Cycle $cycle
 * @property Cour[] $cours
 * @property User[] $users
 */
class Classe extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['filiere_id', 'cycle_id', 'nom', 'effectif', 'slug', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filiere()
    {
        return $this->belongsTo('App\Models\Filiere');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cycle()
    {
        return $this->belongsTo('App\Models\Cycle');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cours()
    {
        return $this->hasMany('App\Models\Cour', 'classe_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'classe_id');
    }
}
