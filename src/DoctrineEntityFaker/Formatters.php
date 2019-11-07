<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFaker;

class Formatters
{

	public static function decimal(float $number, int $scale): string
	{
		return number_format($number, $scale, '.', '');
	}

}
