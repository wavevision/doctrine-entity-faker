<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFakerTests;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ORM\Mapping\Column;
use PHPUnit\Framework\TestCase;
use ReflectionProperty;
use Wavevision\DoctrineEntityFaker\Configuration;
use Wavevision\DoctrineEntityFaker\EntityFaker;
use Wavevision\DoctrineEntityFaker\Mapper;
use Wavevision\DoctrineEntityFakerTests\Entities\EntityA;

class EntityFakerTest extends TestCase
{

	public function testCreate(): void
	{
		$configuration = new Configuration(new AnnotationReader(), []);
		$configuration->addMapper(
			new Mapper(
				function (Column $column, ReflectionProperty $property) {
					$this->assertInstanceOf(Column::class, $column);
					return $property->getName() === 'string';
				},
				function (Column $column, ReflectionProperty $property) {
					$this->assertInstanceOf(Column::class, $column);
					$this->assertEquals('string', $property->getName());
					return '42';
				}
			)
		);
		$entityFaker = new EntityFaker($configuration);
		/** @var EntityA $entity */
		$entity = $entityFaker->create(EntityA::class);
		$this->assertInstanceOf(EntityA::class, $entity);
		$this->assertEquals(null, $entity->getInteger());
		$this->assertEquals('42', $entity->getString());
	}

}
