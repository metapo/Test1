<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

interface RepositoryInterface
{
    public function getAll(): Builder;

    public function filter($query, array $filters): Builder;

    public function sort($query, $sortColumn, $sortOrder): Builder;

    public function paginate($query, $perPage = 10): Paginator;
}
