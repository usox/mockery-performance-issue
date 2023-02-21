<?php

class SomeClass
{
	public function __construct(
		private readonly SomeOtherClass $some_other_class
	) {
	}

	/**
	 * @return array<SomeOtherClass>
	 */
	public function doSomething(): array
	{
		return $this->some_other_class->foo();
	}
}
