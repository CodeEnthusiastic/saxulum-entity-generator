<?php

namespace Saxulum\EntityGenerator\Mapping\Relation;

use Saxulum\EntityGenerator\Mapping\AbstractFieldMapping;

abstract class AbstractRelationMapping extends AbstractFieldMapping
{
    /**
     * @var string
     */
    protected $targetModel;

    /**
     * @param string $name
     * @param string $targetModel
     */
    public function __construct($name, $targetModel)
    {
        parent::__construct($name);
        $this->targetModel = $targetModel;
    }

    /**
     * @return string
     */
    public function getTargetModel()
    {
        return $this->targetModel;
    }
}
