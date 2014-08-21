<?php
	include('../MelissaDataProperty.php');

	class MelissaDataPropertyTest extends PHPUnit_Framework_TestCase
	{
		/**
			Test to see if all methods are in the melissa data consumer class
		*/
		public function testClassAndMethodNames()
		{
			$this->assertTrue(class_exists('MelissaDataProperty'));

			$MelissaDataReflection = new ReflectionClass("MelissaDataProperty");

			$this->assertTrue($MelissaDataReflection->hasProperty("ID"));
			$this->assertTrue($MelissaDataReflection->hasProperty("URL"));

			$this->assertTrue($MelissaDataReflection->hasMethod('__construct'));
			$this->assertTrue($MelissaDataReflection->hasMethod('setID'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getID'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getURL'));
			$this->assertTrue($MelissaDataReflection->hasMethod('setURL'));
			$this->assertTrue($MelissaDataReflection->hasMethod('sendCommand'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getZipCodeCount'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getZipcodeBuyList'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCity'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCityBuyList'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCounty'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCountyBuyList'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getRadiusCount'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getRadiusBuyList'));
		}

		/**
			Tests to see if the zip code count method is returning the right xml structure.  Assert true if so.
		*/
		public function testGetZipCodeCount()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaDataProperty($json->APIKEY);

			$returnXML = $MelissaData->getZipCodeCount('98119');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/Property/getZipCodeCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		/**
			Tests to see if the zip code buy list method is returning the right xml structure.  Assert true if so.
		*/
		public function testGetZipCodeBuyList()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaDataProperty($json->APIKEY);

			$options = new \stdClass;
			$options->zip = '98119';

			$returnXML = $MelissaData->getZipCodeBuyList('98119');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/Property/getZipCodeBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}
	}
?>