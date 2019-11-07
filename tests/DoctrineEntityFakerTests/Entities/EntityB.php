<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFakerTests\Entities;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

class EntityB
{

	/**
	 * @var bool
	 * @ORM\Column(type="boolean")
	 */
	public $boolean;

	/**
	 * @var float
	 * @ORM\Column(type="float")
	 */
	public $float;

	/**
	 * @var int
	 * @ORM\Column(type="integer")
	 */
	public $integer;

	/**
	 * @var string
	 * @ORM\Column(type="decimal", precision=12, scale=2)
	 */
	public $decimal;

	/**
	 * @var DateTime
	 * @ORM\Column(type="datetime")
	 */
	public $datetime;

	/**
	 * @var string
	 * @ORM\Column(type="string", length=20)
	 */
	public $string;

	/**
	 * @var string
	 * @ORM\Column(type="string", length=2)
	 */
	public $shortString;

	/**
	 * @var string
	 * @ORM\Column(type="text")
	 */
	public $text;

}
