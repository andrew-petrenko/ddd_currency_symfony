<?php

namespace Domain\Transformer;

abstract class AbstractTransformer
{
    abstract public function transform(object $data): array;

    public function transformCollection(array $data): array
    {
        return array_map(function ($item) {
            return $this->transform($item);
        }, $data);
    }
}
