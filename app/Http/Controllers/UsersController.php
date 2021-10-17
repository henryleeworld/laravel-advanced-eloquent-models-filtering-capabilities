<?php

namespace App\Http\Controllers;

use App\Filters\NameFilter;
use App\Models\User;
use Pricecurrent\LaravelEloquentFilters\EloquentFilters;


class UsersController extends Controller
{
    public function show() 
    {
        $keyword = 'Mr. Ottis';
        $users = User::filter(EloquentFilters::make([new NameFilter($keyword)]))->get();
        echo '開頭為 ' . $keyword . ' 的第一筆使用者姓名為：' . $users->first()->name . PHP_EOL;
    }
}
