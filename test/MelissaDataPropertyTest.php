<?php
	include('./MelissaDataProperty.php');

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
			$this->assertTrue($MelissaDataReflection->hasMethod('getCityCount'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCityBuyList'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCountyCount'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCountyBuyList'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getRadiusCount'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getRadiusBuyList'));
		}

		/**
			Tests to see if the zip code count method is returning the right xml structure.  Assert true if so.
		*/
		public function testGetZipCodeCount()
		{
			$jsonContents = file_get_contents('./config.json');
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
			$jsonContents = file_get_contents('./config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaDataProperty($json->APIKEY);

			$options = new \stdClass;
			$options->zip = '98119';

			$returnXML = $MelissaData->getZipCodeBuyList('98119');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/Property/getZipCodeBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}

		/**
			Tests to see if the get city count method works and is returning the right xml structure.  Assert true if so.
		*/
		public function testGetCityCount()
		{
			$jsonContents = file_get_contents('./config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaDataProperty($json->APIKEY);

			$returnXML = $MelissaData->getCityCount('wa;seattle');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/Property/getCityCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		/**
			Tests to see if the get county count method is returning the right xml structure.  Assert true if so.
		*/
		public function testGetCountyCount()
		{
			$jsonContents = file_get_contents('./config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaDataProperty($json->APIKEY);

			$returnXML = $MelissaData->getCountyCount('wa;snohomish');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/Property/getCountyCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		/**
			Tests to see if the zip code count method is returning the right xml structure.  Assert true if so.
		*/
		public function testGetCountyBuyList()
		{
			$jsonContents = file_get_contents('./config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaDataProperty($json->APIKEY);

			$returnXML = $MelissaData->getCountyBuyList('wa;snohomish');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/Property/getCountyBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}

		/**
			Tests to see if the get radius count method is returning the right xml structure.  Assert true if so.
		*/
		public function testGetRadiusCount()
		{
			$jsonContents = file_get_contents('./config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaDataProperty($json->APIKEY);

			$returnXML = $MelissaData->getRadiusCount('Pier 52, 801 Alaskan Way', '98104', '5', '1');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/Property/getRadiusCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		/**
			Tests to see if the get radius buy list is returning the right xml structure.  Assert true if so.
		*/
		public function testGetRadiusBuyList()
		{
			$jsonContents = file_get_contents('./config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaDataProperty($json->APIKEY);

			$returnXML = $MelissaData->getRadiusBuyList('Pier 52, 801 Alaskan Way', '98104', '5', '1');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/Property/getRadiusBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}
	}
?>