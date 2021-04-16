<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFaker;

use Doctrine\ORM\Mapping\Column;
use Nette\SmartObject;
use ReflectionClass;
use ReflectionProperty;
use function get_class;

class EntityFaker
{

	use SmartObject;

	private Configuration $configuration;

	public function __construct(Configuration $configuration)
	{
		$this->configuration = $configuration;
	}

	/**
	 * @return mixed
	 */
	public function create(string $class)
	{
		return $this->updateInstance(new $class());
	}

	/**
	 * @param mixed $instance
	 * @return mixed
	 */
	public function updateInstance($instance)
	{
		$reflection = $this->reflection(get_class($instance));
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

	public function getConfiguration(): Configuration
	{
		return $this->configuration;
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

	/**
	 * @param class-string<mixed> $class
	 * @return ReflectionClass<object>
	 */
	private function reflection(string $class): ReflectionClass
	{
		return new ReflectionClass($class);
	}

}
