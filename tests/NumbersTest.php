<?php

use Mockery\Adapter\Phpunit\MockeryTestCase;

class NumbersTest extends MockeryTestCase
{
	public static function numbers(): array
	{
		return array_fill(0, 1000, []);
	}

	/**
	 * @dataProvider numbers
	 */
	public function testDoTestNumbers(
	): void {
		static::assertSame(0, 0);
	}
}
