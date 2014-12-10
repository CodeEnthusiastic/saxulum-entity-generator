<?php

namespace Saxulum\Tests\ModelGenerator;

use PhpParser\PrettyPrinter\Standard as PhpGenerator;
use Saxulum\ModelGenerator\DoctrineOrm\Generator;
use Saxulum\ModelGenerator\Mapping\FieldMapping;
use Saxulum\ModelGenerator\Mapping\ModelMapping;
use Saxulum\ModelGenerator\DoctrineOrm\Type\IntegerType;
use Saxulum\ModelGenerator\DoctrineOrm\Type\TextType;

class ModelGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testEntityGeneration()
    {
        $types = array(
            new IntegerType(),
            new TextType(),
        );

        $phpGenerator = new PhpGenerator();
        $generator = new Generator($phpGenerator, $types);

        $modelMapping = new ModelMapping('Product');
        $modelMapping->addField(new FieldMapping('id', 'integer'));
        $modelMapping->addField(new FieldMapping('name', 'text'));

        $generator->generate($modelMapping);
    }
}