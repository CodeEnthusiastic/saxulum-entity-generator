<?php

namespace Saxulum\EntityGenerator\Type;

use PhpParser\Node;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Property;
use PhpParser\Node\Stmt\PropertyProperty;
use PhpParser\Node\Stmt\Return_;
use Saxulum\EntityGenerator\TypeInterface;

abstract class AbstractSimpleType implements TypeInterface
{
    /**
     * @param string $name
     * @return Node[]
     */
    public function getProperties($name)
    {
        return array(
            new Property(2, array(
                new PropertyProperty($name)
            )),
        );
    }

    /**
     * @param string $name
     * @return Node[]
     */
    public function getMethods($name)
    {
        return array(
            new ClassMethod('set' . ucfirst($name), array(
                'type' => 1,
                'params' => array(
                    new Param($name)
                ),
                'stmts' => array(
                    new Assign(
                        new PropertyFetch(new Variable('this'), $name),
                        new Variable($name)
                    )
                )
            )),
            new ClassMethod('get' . ucfirst($name), array(
                'type' => 1,
                'stmts' => array(
                    new Return_(new PropertyFetch(new Variable('this'), $name))
                )
            ))
        );
    }
}
