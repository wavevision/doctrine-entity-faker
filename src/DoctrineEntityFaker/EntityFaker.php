<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFaker;

use Doctrine\ORM\Mapping\Column;
use ReflectionClass;
use ReflectionProperty;

class EntityFaker
{

	/**
	 * @var Configuration
	 */
	private $configuration;

	public function __construct(Configuration $configuration)
	{
		$this->configuration = $configuration;
	}

	/**
	 * @return mixed
	 */
	public function create(string $class)
	{
		$reflection = $this->reflection($class);
		$instance = new $class();
		foreach ($reflection->getProperties() as $property) {
			if ($property->isStatic()) {
				continue;
			}
			$columnAnnotation = $this->annotation($property);
			if ($columnAnnotation === null) {
				continue;
			}
			$mapper = $this->selectMapper($property, $columnAnnotation);
			if ($mapper === null) {
				continue;
			}
			$property->setAccessible(true);
			$property->setValue($instance, $mapper->getValueFactory()($columnAnnotation, $property));
		}
		return $instance;
	}

	/**
	 * @return mixed
	 */
	private function annotation(ReflectionProperty $property)
	{
		return $this->configuration->getReader()->getPropertyAnnotation($property, Column::class);
	}

	private function selectMapper(ReflectionProperty $reflectionProperty, Column $column): ?Mapper
	{
		foreach ($this->configuration->getMappers() as $mapper) {
			if ($mapper->getCondition()($column, $reflectionProperty)) {
				return $mapper;
			}
		}
		return null;
	}

	private function reflection(string $class): ReflectionClass
	{
		return new ReflectionClass($class);
	}

}
