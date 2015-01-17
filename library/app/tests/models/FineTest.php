<?php

class FineTest extends TestCase {

	public function testFineRules()
	{
		$validator = Validator::make(array(
									'fine_amount' => 1
									), Fine::$rules);

        $this->assertTrue($validator->passes());
	}

	public function testFineRulesWithoutFineAmount()
	{
		$validator = Validator::make(array(), Fine::$rules);

        $this->assertFalse($validator->passes());
	}

	public function testFineRulesWithStringFineAmount()
	{
		$validator = Validator::make(array(
									'fine_amount' => 'fine'
									), Fine::$rules);

        $this->assertFalse($validator->passes());
	}

}