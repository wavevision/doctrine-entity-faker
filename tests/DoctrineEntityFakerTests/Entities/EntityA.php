<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFakerTests\Entities;

use Doctrine\ORM\Mapping as ORM;

class EntityA
{

	/**
	 * @var int - skip this
	 */
	private static $static;

	/**
	 * @var int - skip this
	 */
	private $noAnnotation;

	/**
	 * @var string - skip this
	 * @ORM\Column(type="invalidType")
	 */
	private $invalidType;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $string;

	/**
	 * @var int
	 * @ORM\Column(type="integer")
	 */
	private $integer;

	/**
	 * @var bool
	 * @ORM\Column(type="boolean")
	 */
	private $boolean;

	public function getString(): ?string
	{
		return $this->string;
	}

	public function getInteger(): ?int
	{
		return $this->integer;
	}

}
