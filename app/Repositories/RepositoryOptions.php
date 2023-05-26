<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

trait RepositoryOptions
{
    public function filter($query, array $filters): Builder
    {
        foreach ($filters as $key => $value) {
            $query = $query->where($key, 'LIKE', "%$value%");
        }

        return $query;
    }

    public function sort($query, $sortColumn, $sortOrder): Builder
    {
        return $query->orderBy($sortColumn, $sortOrder);
    }

    public function paginate($query, $perPage = 10): Paginator
    {
        return $query->paginate($perPage);
    }
}
