<?php
declare(strict_types=1);

namespace App\Database\Type;

use Cake\Database\Driver;
use Cake\Database\Type\BaseType;

class CommaSeparatedType extends BaseType
{
    public function toPHP(mixed $value, Driver $driver): mixed
    {
        if ($value === null) {
            return null;
        }

        return explode(',', $value);
    }

    public function marshal(mixed $value): mixed
    {
        if (is_array($value) || $value === null) {
            return $value;
        }

        return explode(',', $value);
    }

    public function toDatabase(mixed $value, Driver $driver): mixed
    {
        return implode(',', $value);
    }

    public function toStatement(mixed $value, Driver $driver): int
    {
        if ($value === null) {
            return \PDO::PARAM_NULL;
        }

        return \PDO::PARAM_STR;
    }
}
