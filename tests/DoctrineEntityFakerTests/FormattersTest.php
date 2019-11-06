<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFakerTests;

use PHPUnit\Framework\TestCase;
use Wavevision\DoctrineEntityFaker\Formatters;

class FormattersTest extends TestCase
{

	public function testDecimal(): void
	{
		$this->assertSame('3.14', Formatters::decimal(3.1415, 12, 2));
		$this->assertSame('2458', Formatters::decimal(299792458.00, 4, 0));
		$this->assertSame('58.00', Formatters::decimal(299792458.00, 4, 2));
	}

}
