<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFaker;

use Doctrine\ORM\Mapping\Column;
use Nette\SmartObject;
use function in_array;

class MapperFactory
{

	use SmartObject;

	public function type(string $type, callable $valueFactory): Mapper
	{
		return $this->types([$type], $valueFactory);
	}

	/**
	 * @param array<string> $types
	 */
	public function types(array $types, callable $valueFactory): Mapper
	{
		return new Mapper(
			function (Column $column) use ($types): bool {
				return in_array($column->type, $types, true);
			},
			$valueFactory
		);
	}

}
