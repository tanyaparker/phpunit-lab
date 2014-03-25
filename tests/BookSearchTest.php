<?php

require __DIR__ . '/../classes/BookSearch.php';

class BookSearchTest extends PHPUnit_Framework_TestCase {
	protected $books;

	public function setUp()
	{
		$this->books = [
  		  [ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
		  [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
		  [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
		  [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
		  [ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
		  [ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
		  [ 'title' => 'Head First Java', 'pages' => 200 ]
		];
	}

	public function test_find_subset()
	{
		// Arrange
		$search = new BookSearch($this->books);

		// Act: subset, case insensitive
		$results = $search->find('javascript');

		// Assert
		$expected = [
		  [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
		  [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
		  [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ]
		];

		$this->assertEquals($expected, $results);
	}

	public function test_find_exact()
	{
		// Arrange
		$search = new BookSearch($this->books);

		// Act: exact match, case insensitive
		$results = $search->find('javascript web applications', true);

		// Assert
		$expected = [
		  [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ]
		];

		$this->assertEquals($expected, $results);
	}

	public function test_nonexistant()
	{
		// Arrange
		$search = new BookSearch($this->books);

		// Act: find book that doesn't exist
		$results = $search->find('The Definitive Guide to Symfony', true);

		// Assert
		$this->assertEmpty($results);

	}

}

?>







