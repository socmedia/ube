<?php

namespace App\Constants;

class LeadTypes
{
    const TYPES = [
        [
            'name' => 'Umum',
            'slug_name' => 'umum',
        ],
        [
            'name' => 'Event',
            'slug_name' => 'event',
        ],
    ];

    public function getAll()
    {
        return self::TYPES;
    }
}