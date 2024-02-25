<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $classe_id
 * @property integer $ue_id
 * @property mixed $ecues
 * @property integer $semestre
 * @property string $slug
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Class $class
 * @property Ue $ue
 */
class Cours extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['classe_id', 'ue_id', 'ecues', 'semestre', 'slug', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

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
    public function ue()
    {
        return $this->belongsTo('App\Models\Ue');
    }
}
