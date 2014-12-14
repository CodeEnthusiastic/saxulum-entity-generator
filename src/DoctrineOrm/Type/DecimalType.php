<?php

namespace Saxulum\ModelGenerator\DoctrineOrm\Type;

use Saxulum\ModelGenerator\Mapping\Field\FieldMappingInterface;

class DecimalType extends AbstractType
{
    /**
     * @param FieldMappingInterface $fieldMapping
     * @return string
     */
    public function getPhpDocType(FieldMappingInterface $fieldMapping)
    {
        return 'string';
    }

    /**
     * @return string
     */
    public function getOrmType()
    {
        return 'decimal';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'decimal';
    }
}
