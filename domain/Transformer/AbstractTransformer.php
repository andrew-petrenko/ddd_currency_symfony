<?php

namespace Domain\Transformer;

abstract class AbstractTransformer
{
    abstract public function transform(object $data): array;

    public function transformCollection(array $data): array
    {
        $result = [];
        foreach ($data as $item) {
            $result[] = $this->transform($item);
        }

        return $result;
    }
}
