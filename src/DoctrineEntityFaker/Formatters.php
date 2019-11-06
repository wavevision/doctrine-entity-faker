<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFaker;

class Formatters
{

	public static function decimal(float $number, int $precision, int $scale): string
	{
		$decimal = number_format($number, $scale, '.', '');
		$size = $precision + (int)(strpos($decimal, '.') !== false);
		return strlen($decimal) > $size ? substr($decimal, -$size) : $decimal;
	}

}
