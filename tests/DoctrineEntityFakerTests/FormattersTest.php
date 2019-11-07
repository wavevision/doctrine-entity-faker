<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFakerTests;

use PHPUnit\Framework\TestCase;
use Wavevision\DoctrineEntityFaker\Formatters;

class FormattersTest extends TestCase
{

	public function testDecimal(): void
	{
		$this->assertSame('3.14', Formatters::decimal(3.1415, 2));
		$this->assertSame('3', Formatters::decimal(3.1415, 0));
	}

}
