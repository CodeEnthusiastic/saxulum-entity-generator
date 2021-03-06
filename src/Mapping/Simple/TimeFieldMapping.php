<?php

namespace Saxulum\EntityGenerator\Mapping\Simple;

use Saxulum\EntityGenerator\Mapping\AbstractFieldMapping;

class TimeFieldMapping extends AbstractFieldMapping
{
    /**
     * @return string
     */
    public function getType()
    {
        return 'time';
    }
}
