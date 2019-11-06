<?php declare(strict_types = 1);

namespace Wavevision\DoctrineEntityFaker;

use Nette\SmartObject;

class EntityFakerFactory
{

	use SmartObject;

	public function create(): EntityFaker
	{
		return new EntityFaker((new ConfigurationFactory())->create());
	}

}
