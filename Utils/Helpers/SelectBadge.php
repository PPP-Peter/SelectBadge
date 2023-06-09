<?php

namespace App\Utils\Helpers;

use App\Models\Status;
use App\Models\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;

class SelectBadge
{

    public static function select($select, $options, $map, $types, $icons)
    {
        return [
            Select::make(__('fields.' .$select), $select)
                ->displayUsingLabels()
                ->onlyOnForms()
                ->options($options)
                ->filterable()
                ->rules('required')->required(),
            Badge::make(__('fields.' . $select), $select)
                ->map($map)
                ->sortable()
                ->hideWhenCreating()->hideWhenUpdating()
                ->addTypes($types)
                ->icons($icons ? $icons : $types)
                ->labels($options),
        ];
    }

    public static function badge($select, $options, $map, $types, $icons)
    {
        return [
            Badge::make(__('fields.' . $select), $select)
                ->map($map)
                ->hideWhenCreating()->hideWhenUpdating()
                ->addTypes($types)
                ->icons($icons ? $icons : $types)
                ->labels($options),
        ];
    }


}
