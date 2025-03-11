<?php

namespace App\Services;

use App\Repository\CategoryRepository;
use App\Repository\RepositoryContract;


class CategoryService extends BaseService
{
    public function __construct(CategoryRepository $repository){
        
        parent::__construct($repository);
    }

    public function all(): mixed
    {
        return $this->repository->all([
            'user',
            'title',
        ]);
    }
}