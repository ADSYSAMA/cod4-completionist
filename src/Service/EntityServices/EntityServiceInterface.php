<?php

namespace App\Service\EntityServices;

interface EntityServiceInterface
{
    public function setData($entity, array $data): void;
}