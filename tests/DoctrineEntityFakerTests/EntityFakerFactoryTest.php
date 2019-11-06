<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFakerTests;

use DateTime;
use PHPStan\Testing\TestCase;
use Wavevision\DoctrineEntityFaker\EntityFaker;
use Wavevision\DoctrineEntityFaker\EntityFakerFactory;
use Wavevision\DoctrineEntityFakerTests\Entities\EntityB;

class EntityFakerFactoryTest extends TestCase
{

	public function testCreate(): void
	{
		$faker = (new EntityFakerFactory())->create();
		$this->assertInstanceOf(EntityFaker::class, $faker);
		/** @var EntityB $entity */
		$entity = $faker->create(EntityB::class);
		$this->assertIsBool($entity->boolean);
		$this->assertIsFloat($entity->float);
		$this->assertIsInt($entity->integer);
		$this->assertIsString($entity->decimal);
		$this->assertInstanceOf(DateTime::class, $entity->datetime);
		$this->assertIsString($entity->string);
		$this->assertIsString($entity->text);
	}

}
