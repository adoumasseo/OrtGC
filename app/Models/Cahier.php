<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $programmation_id
 * @property string $date
 * @property string $heure_debut
 * @property string $heure_fin
 * @property string $libelles
 * @property string $slug
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Programmation $programmation
 */
class Cahier extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['programmation_id', 'date', 'heure_debut', 'heure_fin', 'libelles', 'slug', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function programmation()
    {
        return $this->belongsTo('App\Models\Programmation');
    }
}
