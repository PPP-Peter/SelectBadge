<?php

declare(strict_types = 1);

namespace App\Models\Traits;

trait BadgeStatuses
{

    const
        OFFICE = 1,
        HALL = 2,
        EXTERIOR = 3,
        MOBILE = 4;

    public function place(): array
    {
        return [
            self::OFFICE => __('fields.office'),
            self::HALL => __('fields.hall'),
            self::EXTERIOR => __('fields.exterior'),
            self::MOBILE => __('fields.mobile'),
        ];
    }

    public function placeMap(){
        return [
            \App\Models\Position::OFFICE => 'office',
            \App\Models\Position::HALL => 'hall',
            \App\Models\Position::EXTERIOR => 'exterior',
            \App\Models\Position::MOBILE => 'mobile',
        ];
    }

    // uprava css / nalepky
    public function placeType(){
        return [
            'office' => 'status-color-blue',
            'hall' => 'status-color-teal',
            'exterior' =>  'status-color-coral',
            'mobile' => 'status-color-teal2',
        ];
    }

    public function placeIcons(){
        return [
            'office' => 'collection',
            'hall' => 'office-building',
            'exterior' => 'cloud',
            'mobile' => 'switch-vertical',
        ];
    }

    // more icons https://v1.heroicons.com/
}
