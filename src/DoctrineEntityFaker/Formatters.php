<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFaker;

use Nette\StaticClass;
use function number_format;

class Formatters
{

	use StaticClass;

	public static function decimal(float $number, int $scale): string
	{
		return number_format($number, $scale, '.', '');
	}

}
