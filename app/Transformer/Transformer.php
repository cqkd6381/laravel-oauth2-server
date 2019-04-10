<?php

namespace App\Transformer;


abstract class Transformer
{
    /**
     * @param $items
     * @return array
     */
    public function transformerCollection($items)
    {

        return array_map([$this, 'transform'], $items);
    }

    /**
     * @param $item
     * @return mixed
     */
    public abstract function transform($item);
}
