<?php

return [
    /**
     * The model that fetches the revisions.
     * Override by creating your own and extending this one.
     */
    'model' => ConceptByte\TimeTraveller\Models\Revision::class,

    /**
     * The table to which the revisions will be saved.
     * Note: if you need to change this, the model also needs
     * to be changed.
     */
    'table' => 'revisions',

    /**
     * The name of the query string parameter that
     * fetches the revisions.
     */
    'at'    => 'at',

    /**
     * The time period for which revisions are preserved.
     */
    'clear' => 365,
];