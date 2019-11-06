<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFaker;

use Doctrine\Common\Annotations\Reader;

class Configuration
{

	/**
	 * @var Reader
	 */
	private $reader;

	/**
	 * @var Mapper[]
	 */
	private $mappers;

	/**
	 * @param Mapper[] $mappers
	 */
	public function __construct(Reader $reader, array $mappers)
	{
		$this->reader = $reader;
		$this->mappers = $mappers;
	}

	public function getReader(): Reader
	{
		return $this->reader;
	}

	/**
	 * @return Mapper[]
	 */
	public function getMappers(): array
	{
		return $this->mappers;
	}

	/**
	 * @return static
	 */
	public function addMapper(Mapper $mapper)
	{
		array_unshift($this->mappers, $mapper);
		return $this;
	}

}
