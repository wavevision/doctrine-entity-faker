<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFaker;

class Mapper
{

	/**
	 * @var callable
	 */
	private $condition;

	/**
	 * @var callable
	 */
	private $valueFactory;

	public function __construct(callable $condition, callable $valueFactory)
	{
		$this->condition = $condition;
		$this->valueFactory = $valueFactory;
	}

	public function getCondition(): callable
	{
		return $this->condition;
	}

	public function getValueFactory(): callable
	{
		return $this->valueFactory;
	}

}
