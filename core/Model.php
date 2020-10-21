<?php

namespace Core;
use Core\Database\Database;
use Core\Database\QueryBuilder;

class Model
{
    protected array $attributes = [];

    protected static function table()
    {
        return 'table';
    }

    public static function query(): QueryBuilder
    {
        $query = new QueryBuilder();
        return $query->table(static::table())->model(static::class);
    }

    public function __set($name, $value)
    {
//        $this->attributes[$name] = $value;
    }

}