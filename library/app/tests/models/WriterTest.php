<?php

class WriterTest extends TestCase {

	public function testWriterRules()
	{
		$validator = Validator::make(array(
									'author_name' => 'Edek',
									'author_surname' => 'Wojtak',
									'birth_date' => '1990-01-01'
									), Writer::$rules);

        $this->assertTrue($validator->passes());
	}

	public function testWriterRulesWithoutName()
	{
		$validator = Validator::make(array(
									'author_surname' => 'Wojtak',
									'birth_date' => '1990-01-01'
									), Writer::$rules);

        $this->assertFalse($validator->passes());
	}

	public function testWriterRulesWithShortSurname()
	{
		$validator = Validator::make(array(
									'author_name' => 'Edek',
									'author_surname' => 'W',
									'birth_date' => '1990-01-01'
									), Writer::$rules);

        $this->assertFalse($validator->passes());
	}

	public function testWriterRulesWithWrongDateFormat()
	{
		$validator = Validator::make(array(
									'author_name' => 'Edek',
									'author_surname' => 'Wojtak',
									'birth_date' => '01-01-1990'
									), Writer::$rules);

        $this->assertFalse($validator->passes());
	}

}