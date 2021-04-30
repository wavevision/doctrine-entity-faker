<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFakerTests\Entities;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

class EntityB
{

	/**
	 * @ORM\Column(type="boolean")
	 */
	public bool $boolean;

	/**
	 * @ORM\Column(type="float")
	 */
	public float $float;

	/**
	 * @ORM\Column(type="integer")
	 */
	public int $integer;

	/**
	 * @ORM\Column(type="decimal", precision=3, scale=2)
	 */
	public string $decimal;

	/**
	 * @ORM\Column(type="datetime")
	 */
	public DateTime $datetime;

	/**
	 * @ORM\Column(type="string", length=20)
	 */
	public string $string;

	/**
	 * @ORM\Column(type="string")
	 */
	public string $stringDefaultLength;

	/**
	 * @ORM\Column(type="string", length=2)
	 */
	public string $shortString;

	/**
	 * @ORM\Column(type="text")
	 */
	public string $text;

}
