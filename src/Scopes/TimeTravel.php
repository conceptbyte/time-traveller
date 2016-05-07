<?php

namespace ConceptByte\TimeTraveller\Scopes;

use DateTime;

trait TimeTravel
{
    /**
     * Boot the logger
     */
    public static function bootTimeTravel()
    {
        if (request()->has(config('timetraveller.at'))) {
            static::addGlobalScope(new TimeTravelScope);
        }

        static::saved(function ($model) {
            $revision = config('timetraveller.model');
            (new $revision)->create([
                'revisionable_type' => get_class($model),
                'revisionable_id'   => $model->id,
                'at'                => (new DateTime())->getTimestamp(),
                'by'                => $model->getBy(),
                'state'             => serialize($model),
            ]);
        });
    }

    /**
     * @return mixed
     */
    public function revisions()
    {
        return $this->morphMany(config('timetraveller.model'), 'revisionable');
    }

    /**
     * @param $query
     * @param $time
     * @return mixed
     */
    public function scopeAt($query, $time)
    {
        return $query->with([
            'revisions' => function ($q) use ($time) {
                $q->whereAt($time);
            },
        ]);
    }

    /**
     * Revision made by
     *
     * @return mixed
     */
    abstract public function getBy();
}