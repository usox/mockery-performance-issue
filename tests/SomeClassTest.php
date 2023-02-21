<?php

use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\MockInterface;

class SomeClassTest extends MockeryTestCase
{
	private SomeOtherClass&MockInterface $some_other_class;

	private SomeClass $subject;

	protected function setUp(): void
	{
		$this->some_other_class = Mockery::mock(SomeOtherClass::class);

		$this->subject = new SomeClass(
			$this->some_other_class
		);
	}

	public function testDoSomethingDoes(): void
	{
		$this->some_other_class->shouldReceive('foo')
			->withNoArgs()
			->once()
			->andReturn([$this->some_other_class]);

		static::assertSame(
			[
				$this->some_other_class
			],
			$this->subject->doSomething()
		);
	}
}
