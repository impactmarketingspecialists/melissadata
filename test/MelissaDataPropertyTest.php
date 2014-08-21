<?php
	include('../MelissaDataProperty.php');

	class MelissaDataPropertyTest extends PHPUnit_Framework_TestCase
	{
		/**
			Test to see if all methods are in the melissa data consumer class
		*/
		public function testClassAndMethodNames()
		{
			$this->assertTrue(class_exists('MelissaDataConsumer'));

			$MelissaDataReflection = new ReflectionClass("MelissaDataProperty");

			$this->assertTrue($MelissaDataReflection->hasProperty("ID"));
			$this->assertTrue($MelissaDataReflection->hasProperty("URL"));

			$this->assertTrue($MelissaDataReflection->hasMethod('__construct'));
			$this->assertTrue($MelissaDataReflection->hasMethod('setID'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getID'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getURL'));
			$this->assertTrue($MelissaDataReflection->hasMethod('setURL'));
			$this->assertTrue($MelissaDataReflection->hasMethod('sendCommand'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getZipcode'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getZipcodeBuyList'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCity'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCityBuyList'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCounty'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCountyBuyList'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getRadiusCount'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getRadiusBuyList'));
		}
	}
?>