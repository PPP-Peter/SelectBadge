<?php

declare(strict_types = 1);

namespace App\Models\Traits;

trait BadgeStatuses
{

    const PLACE = [
        'OFFICE' => 1,
        'HALL' => 2,
        'EXTERIOR' => 3,
        'MOBILE' => 4,
    ];

    public function place($value=null){
        $variable = [
            __('fields.office'),
            __('fields.hall'),
            __('fields.exterior'),
            __('fields.mobile'),
        ];
        $icon = [
            'collection',
            'office-building',
            'cloud',
            'switch-vertical',
        ];
        $type = [
            'status-color-blue',
            'status-color-teal',
            'status-color-coral',
            'status-color-teal2',
        ];

        $data = ($value === 'value') ? $variable : (($value === 'icon') ? $icon : (($value === 'type') ? $type : null));

        if ($value == null) return array_combine(array_values(self::PLACE), $variable);
        if (is_array($data)) return array_combine($variable, $data);
        else return array_fill_keys($variable, $data);
    }

    // more icons https://v1.heroicons.com/
}
