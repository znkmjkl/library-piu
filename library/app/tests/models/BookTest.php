<?php

class BookTest extends TestCase {

	public function testBookRules()
	{
		$writer = new Writer;

		$writer->author_name = 'Edek';
		$writer->author_surname = 'Wojtak';
		$writer->birth_date = '1990-01-01';

		$validator = Validator::make(array(
									'bok_isbn'=>'1234567890123',
								 	'bok_title'=>'Magda M.',
								 	'writer'=> array('writer' => $writer),
								 	'language'=> 5, 
								 	'kind'=> 2,
								 	'date'=>'1990',
								 	'edition'=> 2	
									), Book::$rules);

        $this->assertTrue($validator->passes());
	}

	public function testBookRulesWithoutTitle()
	{
		$writer = new Writer;

		$writer->author_name = 'Edek';
		$writer->author_surname = 'Wojtak';
		$writer->birth_date = '1990-01-01';

		$validator = Validator::make(array(
									'bok_isbn'=>'1234567890123',
								 	'writer'=> array('writer' => $writer),
								 	'language'=> 5, 
								 	'kind'=> 2,
								 	'date'=>'1990',
								 	'edition'=> 2	
									), Book::$rules);

        $this->assertFalse($validator->passes());
	}

	public function testBookRulesWithShortTitle()
	{
		$writer = new Writer;

		$writer->author_name = 'Edek';
		$writer->author_surname = 'Wojtak';
		$writer->birth_date = '1990-01-01';

		$validator = Validator::make(array(
									'bok_isbn'=>'1234567890123',
								 	'bok_title'=>'M',
								 	'writer'=> array('writer' => $writer),
								 	'language'=> 5, 
								 	'kind'=> 2,
								 	'date'=>'1990',
								 	'edition'=> 2	
									), Book::$rules);

        $this->assertFalse($validator->passes());
	}

	public function testBookRulesWithWrongDateFormat()
	{
		$writer = new Writer;

		$writer->author_name = 'Edek';
		$writer->author_surname = 'Wojtak';
		$writer->birth_date = '1990-01-01';

		$validator = Validator::make(array(
									'bok_isbn'=>'1234567890123',
								 	'bok_title'=>'Magda M.',
								 	'writer'=> array('writer' => $writer),
								 	'language'=> 5, 
								 	'kind'=> 2,
								 	'date'=>'1990-01-01',
								 	'edition'=> 2	
									), Book::$rules);

        $this->assertFalse($validator->passes());
	}

	public function testBookRulesWithStringLanguage()
	{
		$writer = new Writer;

		$writer->author_name = 'Edek';
		$writer->author_surname = 'Wojtak';
		$writer->birth_date = '1990-01-01';

		$validator = Validator::make(array(
									'bok_isbn'=>'1234567890123',
								 	'bok_title'=>'Magda M.',
								 	'writer'=> array('writer' => $writer),
								 	'language'=> 'language', 
								 	'kind'=> 2,
								 	'date'=>'1990',
								 	'edition'=> 2	
									), Book::$rules);

        $this->assertFalse($validator->passes());
	}

	public function testBookRulesWithoutWriter()
	{
		$writer = new Writer;

		$writer->author_name = 'Edek';
		$writer->author_surname = 'Wojtak';
		$writer->birth_date = '1990-01-01';

		$validator = Validator::make(array(
									'bok_isbn'=>'1234567890123',
								 	'bok_title'=>'Magda M.',
								 	'language'=> 5, 
								 	'kind'=> 2,
								 	'date'=>'1990',
								 	'edition'=> 2	
									), Book::$rules);

        $this->assertFalse($validator->passes());
	}

}