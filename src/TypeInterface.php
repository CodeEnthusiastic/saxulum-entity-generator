<?php

namespace Saxulum\EntityGenerator;

use PhpParser\Node;

interface TypeInterface
{
    /**
     * @param string $name
     * @return Node[]
     */
    public function getProperties($name);

    /**
     * @param string $name
     * @return Node[]
     */
    public function getMethods($name);

    /**
     * @param string $name
     * @return Node[]
     */
    public function getDoctrineOrmMetadata($name);
}
