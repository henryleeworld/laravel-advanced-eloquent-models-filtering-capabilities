<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class NameFilter extends AbstractEloquentFilter
{
    public function __construct(protected $name)
    {
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('name', 'like', "{$this->name}%");
    }
}
