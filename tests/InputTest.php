<?php

require __DIR__ . '/../classes/Input.php';

class InputTest extends PHPUnit_Framework_TestCase {

	public function tearDown() {
		$_GET['email'] = NULL;
	}

	public function test_1()
	{
		// Arrange
		$_GET['email'] = 'dtang@usc.edu';

		// Act
		$result = Input::get('email');

		// Assert
		$this->assertEquals('dtang@usc.edu', $result);
	}

	public function test_2()
	{
		// No arrange, we want to be NULL

		// Act
		$result1 = Input::get('email');
		$result2 = Input::get('plan', 'standard');

		// Assert
		$this->assertNull($result1);
		$this->assertEquals('standard', $result2);
	}

}

?>