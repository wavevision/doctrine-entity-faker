<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFaker;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Faker\Factory;

class ConfigurationFactory
{

	public function create(): Configuration
	{
		$faker = Factory::create();
		$mapperFactory = new MapperFactory();
		$mappers = [];
		$mapping = [
			Types::BOOLEAN => function () use ($faker) {
				return $faker->boolean;
			},
			Types::FLOAT => function () use ($faker) {
				return $faker->randomFloat();
			},
			Types::INTEGER => function () use ($faker) {
				return $faker->numberBetween(1, 4200);
			},
			Types::DECIMAL => function (Column $column) use ($faker) {
				return Formatters::decimal($faker->randomFloat(), $column->precision, $column->scale);
			},
			Types::DATETIME_MUTABLE => function () use ($faker) {
				return $faker->dateTime;
			},
			Types::STRING => function (Column $column) use ($faker) {
				return $faker->text($column->length ?? 255);
			},
			Types::TEXT => function () use ($faker) {
				return $faker->text();
			},
		];
		foreach ($mapping as $type => $valueFactory) {
			$mappers[] = $mapperFactory->type($type, $valueFactory);
		}
		return new Configuration(new AnnotationReader(), $mappers);
	}

}
