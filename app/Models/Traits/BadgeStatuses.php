<?php

declare(strict_types = 1);

namespace App\Models\Traits;

trait BadgeStatuses
{


    const
        NOT_REQUIRED = 1,
        ELEMENTAL = 2,
        HIGH_SCHOOL = 3,
        UNIVERSITY = 4;

    const
        OFFICE = 1,
        HALL = 2,
        EXTERIOR = 3,
        MOBILE = 4;

    public function education(): array
    {
        return [
            self::NOT_REQUIRED => __('fields.not_required'),
            self::ELEMENTAL => __('fields.elemental'),
            self::HIGH_SCHOOL => __('fields.high_school'),
            self::UNIVERSITY => __('fields.university'),
        ];
    }

    public function place(): array
    {
        return [
            self::OFFICE => __('fields.office'),
            self::HALL => __('fields.hall'),
            self::EXTERIOR => __('fields.exterior'),
            self::MOBILE => __('fields.mobile'),
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
    public function educationType(){
        return [
            'not_required' => 'status-bg-green',
            'elemental' => 'status-bg-ice',
            'high_school' => 'status-bg-aquamarine',
            'university' => 'status-bg-red',
        ];
    }

    //
    public function educationMap(){
        return
            [
                \App\Models\Position::NOT_REQUIRED => 'not_required',
                \App\Models\Position::ELEMENTAL => 'elemental',
                \App\Models\Position::HIGH_SCHOOL => 'high_school',
                \App\Models\Position::UNIVERSITY => 'university',
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

    public function placeIcons(){
        return [
            'office' => 'collection',
            'hall' => 'office-building',
            'exterior' => 'cloud',
            'mobile' => 'switch-vertical',
        ];
    }
    public function educationIcons(){
        return [
            'elemental' => '',
            'university' => '',
            'not_required' => '',
            'high_school' => '',
        ];
    }
    // more icons https://v1.heroicons.com/
}
