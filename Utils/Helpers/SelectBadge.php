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

//use Laravel\Nova\Fields\Boolean;
//use Wame\IndexToggle\IndexToggle;

class SelectBadge
{
    public static function oneBoolean($name, $key, $function) :mixed
    {
        return
            Boolean::make(__('fields.'.$name), $key)
            ->readonly(function ($request) use ($function, $key){
                $status = $function->model();
                if ($status->$key) return false;
                return $status->changeStatus($key);
            })
            ->hideWhenUpdating(function ($request) use ($function, $key) {
                $status = $function->model();
                if ($status->$key) return false;
                return $status->changeStatus($key);
            })
            ->sortable();
    }


    public static function classField($data)
    {
        return Text::make(__(''), function ($data) {
            if ($done = $data->done) {
                return "<span class='progresstask'></span>";
            } else return "<span class='donetask'></span>";
        })->asHtml();
    }


    public static function selectBadge($select, $options, $map, $types, $icons)
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

    public static function belongsBadge($select, $options, $map, $types, $icons)
    {
        return [
            BelongsTo::make(__('fields.' .$select), $select)
                ->filterable()
                ->sortable()
                ->onlyOnForms(),
            Badge::make(__('fields.' . $select), $select)
                ->map($map)
                ->hideWhenCreating()->hideWhenUpdating()
                ->addTypes($types)
                ->icons($icons ? $icons : $types)
                ->labels($options),
        ];
    }



    /*
        public static function toggle($name ='done', $key = 'done') :array
        {
            return [
                Boolean::make(__('fields.'.$name), $key)
                    ->onlyOnForms()
                    ->sortable()
                    ->hideWhenCreating()
                    ->showOnPreview(),
                IndexToggle::make(__('fields.'.$name), $key)
                    ->hideWhenUpdating()
                    ->hideWhenCreating()
                    ->flash(' ')
                    ->sortable(),
            ];
        }
    */

    /*
        public static function price($data) :array
        {
            return [
                PriceField::getPriceWithoutTax( config('price-fields'), $data)->sortable(),
                PriceField::getPriceTax(config('price-fields'))->rules('required')->updateRules('sometimes'),
                PriceField::getPriceWithTax(config('price-fields'))->rules('required')->updateRules('sometimes'),
                PriceField::getPriceTaxField(config('price-fields'))->rules('required')->updateRules('sometimes'),
            ];
        }
    */

    /*
        public static function StatusFieldCustom($status, $category) :array
        {
            return [
                BelongsTo::make(__('status.field.status'), 'statuses', \App\Nova\Status::class)
                    ->relatableQueryUsing(function (NovaRequest $request, Builder $query) use ($category) {
                        $query->whereIn('model', [$category]);  // name in config
                    })
                    ->filterable()
                    ->sortable()
                    ->hideFromIndex()
                    ->hideWhenUpdating()
                    ->hideFromDetail()
                    ->withoutTrashed()
                    ->updateRules('sometimes'),

                Text::make(__('status.field.status'), 'status_id')
                    ->displayUsing(fn() => StatusFieldCss::index($status->statuses))
                    ->asHtml()
                    ->sortable()
                    ->exceptOnForms()
                    ->showOnPreview()
            ];
        }
    */

}
