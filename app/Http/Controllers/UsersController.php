<?php

namespace App\Http\Controllers;

use App\Filters\NameFilter;
use App\Models\User;
use Illuminate\Support\Str;
use Pricecurrent\LaravelEloquentFilters\EloquentFilters;

class UsersController extends Controller
{
    public function show() 
    {
        $keyword = Str::substr(User::inRandomOrder()->first()->name, 0, 5);
        $user = User::filter(EloquentFilters::make([new NameFilter($keyword)]))->first();
        echo '開頭為 ' . $keyword . ' 的第一筆使用者姓名為：' . $user->name . PHP_EOL;
    }
}
