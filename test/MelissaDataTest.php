<?php
	include('../MelissaData.php');
	include('ID.php');

	class MelissaDataTest extends PHPUnit_Framework_TestCase
	{
		public function testClassAndMethodNames()
		{
			$this->assertTrue(class_exists('MelissaData'));

			$MelissaDataReflection = new ReflectionClass("MelissaData");

			$this->assertTrue($MelissaDataReflection->hasProperty("ID"));
			$this->assertTrue($MelissaDataReflection->hasProperty("URL"));

			$this->assertTrue($MelissaDataReflection->hasMethod('__construct'));
			$this->assertTrue($MelissaDataReflection->hasMethod('setID'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getID'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getURL'));
			$this->assertTrue($MelissaDataReflection->hasMethod('setURL'));
			$this->assertTrue($MelissaDataReflection->hasMethod('sendCommand'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getZipCodeCount'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getZipCodeBuyList'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCityCount'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCityBuyList'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCountyCount'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCountyBuyList'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getStateCount'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getStateBuyList'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getRadiusCount'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getRadiusBuyList'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getStreetRecordCount'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getStreetRecordBuyList'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCitiesByCountyCount'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCitiesByState'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getCountiesByState'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getStatesCount'));
			$this->assertTrue($MelissaDataReflection->hasMethod('getZipsByCity'));
		}

		public function testSendCommand()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$options = new \stdClass;
			$options->st = 'wa';

			$xml = $MelissaData->sendCommand('get/CountiesByState', $options);

			$this->assertSelectRegExp('StatusCode', '/Approved/', TRUE, $xml);
		}

		public function testGetZipCodeCount()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getZipCodeCount('98119');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getZipCodeCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetZipCodeBuyList()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$options = new \stdClass;
			$options->zip = '98119';

			$returnXML = $MelissaData->getZipCodeBuyList('98119');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getZipCodeBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetCityCount()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getCityCount('wa;seattle');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getCityCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetCityBuyList()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getCityBuyList('wa;seattle');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getCityBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetCountyCount()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getCountyCount('wa;snohomish');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getCountyCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetCountyBuyList()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getCountyBuyList('wa;snohomish');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getCountyBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetStateCount()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getStateCount('wa');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getStateCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetStateBuyList()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getStateBuyList('wa');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getStateBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetRadiusCount()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getRadiusCount('Pier 52, 801 Alaskan Way', '98104', '5', '1');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getRadiusCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetRadiusBuyList()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getRadiusBuyList('Pier 52, 801 Alaskan Way', '98104', '5', '1');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getRadiusBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetStreetRecordCount()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getStreetRecordCount('98119', 'Republican');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getStreetRecordCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetStreetBuyList()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getStreetRecordBuyList('98119', 'Republican');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getStreetRecordBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetCitiesByCountyCount()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getCitiesByCountyCount('wa', 'snohomish');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getCitiesByCountyCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetCitiesByState()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getCitiesByState('wa');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getCitiesByState.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetCountiesByState()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getCountiesByState('wa');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getCountiesByState.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetStatesCount()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getStatesCount();

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getStatesCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetZipsByCity()
		{
			$jsonContents = file_get_contents('../config.json');
			$json = json_decode($jsonContents);

			$MelissaData = new MelissaData($json->APIKEY);

			$returnXML = $MelissaData->getZipsByCity('wa;seattle');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getZipsByCity.xsd');

			$this->assertTrue($schemaValidate);
		}
	}
?>