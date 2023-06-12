
# SelectBadge Field

## 1. Preview

<img alt="preview" src="preview.png">

<br>

## 2. Info 
Package combines Select field and Badge field, adds styled classes in CSS and adds functions such as icons(), map(), addTypes(), options(), labels().
- You can use to like simple css Badge
### How use Badge 
```php
->displayUsing(fn($value)=> '<span class="' .config('wame-badge.info-white'). '">' . $value . '</span>')->asHtml()
```
```php
->displayUsing(fn($value)=> '<span class="' .config('wame-badge.info'). '">' . $value . '</span>')->asHtml()
```
```php
->displayUsing(fn($value)=> '<span class="status-bg-teal s-badge">' . $value . '</span>')->asHtml(),
->displayUsing(fn($value)=> '<span class="status-bg-primary s-badge">' . $value . '</span>')->asHtml(),
````
<img alt="image2" src="image2.png">

### Added files:
```php
 resources/css/labels-status.css - register file to NovaProvider    Nova::style('label-statuses', resource_path('css/label-statuses.css'));,
 config/wame-badge.php - config('wame-badge.warning'),
 Models/Trait/BadgeStatuses.php  --add to model,
 App\Utils\Helpers\SelectBadge.php function SelectBadge; 
```

### Function
```php
public static function select ($select, $options, $types, $icons){
    return [
        Select::make(__('fields.' .$select), $select)
            ->filterable()
            ->displayUsingLabels()
            ->onlyOnForms()
            ->options($options)
            ->rules('required')->required(),
        Badge::make(__('fields.' . $select), $select)
            ->sortable()
            ->map($options)
            ->hideWhenCreating()->hideWhenUpdating()
            ->addTypes($types)
            ->icons($icons ? $icons : $types)
            ->labels($options),
    ];
}

public static function badge ($select, $options, $types, $icons){
    return [
        Badge::make(__('fields.' . $select), $select)
            ->map($options)
            ->hideWhenCreating()->hideWhenUpdating()
            ->addTypes($types)
            ->icons($icons ? $icons : $types)
            ->labels($options),
    ];
}
```
<br>

## 3. Instalation

- ### vendor publish  --SelectBadgeServiceProvider
```php
php artisan vendor:publish --provider="Wame\SelectBadge\SelectBadgeServiceProvider"
```
you can use config classes or register  ```Nova::style('label-statuses', resource_path('css/label-statuses.css'));``` in `NovaServiceProvider.php`
<br>

## 4. Usage

- ### Add to your Model Trait 
``` php
Models/Trait/BadgeStatuses.php

use App\Models\Traits\BadgeStatuses;
use BadgeStatuses;
```
- ### Add fields to your Nova Model
``` php
use App\Utils\Helpers\SelectBadge;

//...SelectBadge::select('place_execution', $this->place(), $this->placeMap(), $this->placeType(), $this->placeIcons()  ),
...SelectBadge::select('place_execution', $this->place(), $this->place('type'), $this->place('icon')  ),
``` 

- ### Edit trait example:
```php
/*
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

    // uprava css / nalepky 
    // you can use css class or tailwind classes from config too : config('wame-badge.info')
    public function placeType(){
        return [
            'office' => 'status-color-blue',
            'hall' => 'status-color-teal',
            'exterior' =>  'status-color-coral',
            'mobile' => 'status-color-aquamarine',
           // 'edit' => config('wame-badge.warning'),
        ];
    }

// Add Icons 
    public function placeIcons(){
        return [
            'office' => 'exclamation-circle',
            'hall' => 'check-circle',
            'exterior' => 'x-circle',
            'mobile' => 'document-text',
        ];
    }
*/
```
OR
```php
    const PLACE = [
        OFFICE = 1,
        HALL = 2,
        EXTERIOR = 3,
        MOBILE = 4
        ];
        
      public function placeVariable ($value = 'value') {
        $variable = [
            __('fields.office'),
            __('fields.hall'),
            __('fields.exterior'),
            __('fields.mobile'),
            __('fields.other'),
        ];
        $type = [
            'status-color-blue',
            'status-color-teal',
            'status-color-coral',
            'status-color-teal2',
            'status-color-default',
        ];
        $icon = 'collection';

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
   
```
<br>

## 5. Configuration / Customization
<br>
### You can add your custom classes 

### If you dont want Icons use null:
``` php
$icon = '';
  ...SelectBadge::select('place_execution', $this->place(), $this->place('type'), place('icon')  ),
````

Icons can find here:  https://v1.heroicons.com/
<br><br>

## 6. Badges class:
<table>
    <tr>
        <td style="background:#DC3545; color:white">red</td>
        <td style="background:#4AA02C; color:white">green</td>
        <td style="background:#6cc24a; color:white">green2</td>
        <td style="background:#0099e5; color:white">blue</td>
        <td style="background:#368BC1; color:white">ice</td>
        <td style="background:#0a8ea0; color:white">teal</td>
        <td style="background:#1cc7d0; color:white">teal2</td>
        <td style="background:#AFDCEC; color:black">coral</td>
        <td style="background:#7FFFD4; color:black">aquamarine</td>
        <td style="background:#EAC117; color:white">golden</td>
        <td style="background:#ef9421; color:white">orange</td>
        <td style="background:#fdb94e; color:white">orange-light</td>
        <td style="background:#bff199; color:black">green-light</td>
        <td style="background:#79ceb8; color:white">green-dark</td>
        <td style="background:#f7afff; color:white">pink</td>
        <td style="background:#836eaa; color:white">purple</td>
    </tr>
</table>

<table>
    <tr>
        <td style="background:#DC3545; color:white">config('wame-badge.error)</td>
        <td style="background:#bff199; color:black">denied</td>
        <td style="background:#4AA02C; color:white">approved</td>
        <td style="background:#0099e5; color:white">info</td>
        <td style="background:#AFDCEC; color:black">default</td>
        <td style="background:#EAC117; color:white">warning</td>
    </tr>
</table>
<table>
    <tr>
        <td style="background:#DC3545; color:white">config('wame-badge.error-white')</td>
        <td style="background:#bff199; color:black">denied-white</td>
        <td style="background:#4AA02C; color:white">approved-white</td>
        <td style="background:#0099e5; color:white">info-white</td>
        <td style="background:#AFDCEC; color:black">default-white</td>
        <td style="background:#EAC117; color:white">warning-white</td>
    </tr>
</table>
<img alt="colors" src="colors.png">

### config classes:
- config('wame-badge.error')
- ...
### css classes:
- status-bg-[color]
- status-color-[color]
- status-line-[color]
- status-border-[color]
- ...
### more: 
- primary 
- secondary
- none

