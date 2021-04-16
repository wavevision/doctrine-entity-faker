<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFakerTests\Entities;

use Doctrine\ORM\Mapping as ORM;

// phpcs:disable SlevomatCodingStandard.Classes.UnusedPrivateElements.UnusedProperty
class EntityA
{

	/**
	 * @var int - skip this
	 */
	private static int $static;

	/**
	 * @var int - skip this
	 */
	private int $noAnnotation;

	/**
	 * @var string - skip this
	 * @ORM\Column(type="invalidType")
	 */
	private string $invalidType;

	/**
	 * @ORM\Column(type="string")
	 */
	private string $string;

	/**
	 * @ORM\Column(type="integer")
	 */
	private ?int $integer = null;

	/**
	 * @ORM\Column(type="boolean")
	 */
	private bool $boolean;

	public function getString(): ?string
	{
		return $this->string;
	}

	public function getInteger(): ?int
	{
		return $this->integer;
	}

}
