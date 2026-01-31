<?php

namespace App\Blog\Application\Repository;


use App\Blog\Domain\Aggregate\PostAggregate;

interface PostInterfaceRepository
{
    /**
     * @return PostAggregate[]
     */
    public function get(): array;

}
