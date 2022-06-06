<?php

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Devsmo\Hetu;

class HetuTest extends TestCase
{

	public function validTestSet()
	{
		return array(
			// Valid sets (all values are valid)
			array('211097-9476', '1997-10-21', 20),
			array('210202A992N', '2002-02-21', 15),
		);
	}
	
	/**
	 * @dataProvider validTestSet
	 */
	public function testValidity($hetu, $birthday, $age)
	{
		$instance = Hetu::create($hetu);
		$this->assertNotNull($instance);
	}

	/**
	 * @dataProvider validTestSet
	 */
	public function testBirthday($hetu, $birthday, $age)
	{
		$instance = Hetu::create($hetu);
		$this->assertEquals($birthday, $instance->getDateStr());
	}

	/**
	 * @dataProvider validTestSet
	 */
	public function testAge($hetu, $birthday, $age)
	{
		$instance = Hetu::create($hetu);
		$this->assertEquals($age, $instance->getAge(Carbon::parse('2018-02-02')));
	}


	public function invalidTestSet()
	{
		return array(
			// Valid sets (all values are valid)
			array('211096-9476'),
			array('010202-992N'),
			array('210202-992Nsd'),
		);
	}
	
	/**
	 * @dataProvider invalidTestSet
	 */
	public function testInvalidHetu($hetu)
	{
		$instance = Hetu::create($hetu);
		$this->assertNull($instance);
	}





}
