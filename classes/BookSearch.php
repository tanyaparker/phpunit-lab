<?php

class BookSearch {
	protected $books;

	public function __construct($books) {
		$this->books = $books;
	}

	public function find($title, $exact = false)
	{
		$results = [];
		strtolower($title);

		foreach ($this->books as $book) {
			foreach ($book as $key => $value) {
		    	if($key == 'title') {
		    		
		    		$value = strtolower($value);

					if(!$exact) { 
						if(strpos($value, $title) !== false)
							array_push($results, $book);
					}
					else {
						if($value == $title)
							array_push($results, $book);
					}					
		    	}
			}
		}
		
		if(count($results) > 0)
			return $results;
		else 
			return false;
	}

}

?>