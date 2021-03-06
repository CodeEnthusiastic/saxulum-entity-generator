<?php

namespace Saxulum\EntityGenerator\Type\Relation;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Scalar\String_;
use Saxulum\EntityGenerator\Mapping\FieldMappingInterface;
use Saxulum\EntityGenerator\Mapping\Relation\One2OneInverseSideMapping;

class One2OneInverseSideType extends AbstractOne2OneType
{
    /**
     * @param  FieldMappingInterface $fieldMapping
     * @return Node[]
     */
    public function getMethodsNodes(FieldMappingInterface $fieldMapping)
    {
        if (!$fieldMapping instanceof One2OneInverseSideMapping) {
            throw new \InvalidArgumentException('Field mapping has to be One2OneInverseSideMapping!');
        }

        return array(
            $this->getBidiretionalSetterMethodNode($fieldMapping, $fieldMapping->getMappedBy(), 'set', 'set'),
            $this->getGetterMethodNode($fieldMapping->getName(), $fieldMapping->getTargetModel()),
        );
    }

    /**
     * @param  FieldMappingInterface $fieldMapping
     * @return Node[]
     */
    public function getMetadataNodes(FieldMappingInterface $fieldMapping)
    {
        if (!$fieldMapping instanceof One2OneInverseSideMapping) {
            throw new \InvalidArgumentException('Field mapping has to be One2OneInverseSideMapping!');
        }

        return array(
            new MethodCall(new Variable('builder'), 'addInverseOneToOne', array(
                new Arg(new String_($fieldMapping->getName())),
                new Arg(new String_($fieldMapping->getTargetModel())),
                new Arg(new String_($fieldMapping->getMappedBy())),
            )),
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'one2one-inverseside';
    }
}
