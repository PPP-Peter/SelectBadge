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

    public function placeVariable ($value = 'value') {
        $variable = [
            __('fields.office'),
            __('fields.hall'),
            __('fields.exterior'),
            __('fields.mobile'),
        ];
        $type = [
            'status-color-blue',
            'status-color-teal',
            'status-color-coral',
            'status-color-teal2',
        ];
        $icon = [
            'collection',
            'office-building',
            'cloud',
            'switch-vertical',
        ];

        if ($value === 'value') return $variable;
        if ($value === 'icon') return $icon;
        if ($value === 'type') return $type;
    }


    public function place($type=null){
        if ($type == null) return array_combine(array_values(self::PLACE), $this->placeVariable());

        if (is_array($this->placeVariable($type))){
            return array_combine($this->placeVariable(), $this->placeVariable($type));
        }
        else  return array_fill_keys($this->placeVariable(), $this->placeVariable($type));
    }

    // more icons https://v1.heroicons.com/
}
