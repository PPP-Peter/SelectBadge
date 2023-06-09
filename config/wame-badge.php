<?php

$default = "inline-flex items-center whitespace-nowrap h-6 px-2 rounded-full font-bold"; //font-semibold
$color = 'white';

return [
    "success" => "bg-green-100 text-green-600 dark:bg-green-500 dark:text-green-900 $default",
    "error" => "bg-red-100 text-red-600 dark:bg-red-400 dark:text-red-900 $default",
    "warning" => "bg-yellow-100 text-yellow-600 dark:bg-yellow-300 dark:text-yellow-800 $default",
    "info" => "bg-sky-100 text-sky-600 dark:bg-sky-600 dark:text-sky-900 $default",
    "default" => "bg-gray-100 text-gray-600 dark:bg-gray-600 dark:text-gray-900 $default",
    "approved" => "bg-green-300 text-gray-600 text-light-green-600  approved $default",
    "denied" => "bg-red-500 text-black text-light-green-600 dark:bg-red-500 denied $default",
    "sky" => "bg-sky-100 text-gray-600 dark:bg-sky-100 sky $default",

    "success-$color" => "bg-green-300 text-$color dark:bg-green-500 dark:text-$color $default",
    "error-$color" => "bg-red-100 text-$color dark:bg-red-400 dark:text-$color $default",
    "warning-$color" => "bg-yellow-100 text-$color dark:bg-yellow-300 dark:text-$color $default",
    "info-$color" => "bg-sky-100 text-$color dark:bg-sky-600 dark:text-$color $default",
    "default-$color" => "bg-gray-100 text-$color dark:bg-gray-600 dark:text-$color $default",
    "approved-$color" => "bg-green-300 text-$color  approved $default",
    "denied-$color" => "bg-red-500 text-$color dark:bg-red-500 denied $default",

    "credit" => "bg-green-100 text-green-600 dark:bg-green-100 dark:text-green-600 $default",
    "advertising" => "bg-green-100 text-green-600 dark:bg-green-100 dark:text-green-600 $default",
    "order" => "bg-primary-100 text-primary-600 dark:bg-primary-100 dark:text-primary  -600 $default",
    "manual" => "bg-yellow-100 text-yellow-600 dark:bg-yellow-100 dark:text-yellow-600 $default",
    "expiration" => "bg-red-100 text-red-600 dark:bg-red-100 dark:text-red-600 $default",
    "cancel" => "bg-red-100 text-red-600 dark:bg-red-100 dark:text-red-600 $default",
];
