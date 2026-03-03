<?php

namespace App\Http\Controllers;

use App\Filters\NameFilter;
use App\Models\User;
use Illuminate\Support\Str;
use Pricecurrent\LaravelEloquentFilters\EloquentFilters;

class UsersController extends Controller
{
    /**
     * Display the resource.
     */
    public function show() 
    {
        $keyword = Str::substr(User::inRandomOrder()->first()->name, 0, 5);
        echo __('The first user name starting with :keyword is: ', ['keyword' => $keyword]) . User::filter(EloquentFilters::make([new NameFilter($keyword)]))->first()->name . PHP_EOL;
    }
}
