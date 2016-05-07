<?php

namespace ConceptByte\TimeTraveller\Models;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{

    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'revisions';

    /**
     * Fillable fields on the model
     *
     * @var array
     */
    protected $fillable = ['at', 'by', 'revisionable_type', 'revisionable_id', 'state'];

    /**
     * Hidden attributes on the model
     *
     * @var array
     */
    protected $hidden = ['id', 'revisionable_type', 'revisionable_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function auditable()
    {
        return $this->morphTo();
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getStateAttribute($value)
    {
        return unserialize($value);
    }
}