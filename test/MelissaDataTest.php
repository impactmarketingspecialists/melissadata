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
			$MelissaData = new MelissaData(ID::get());

			$options = new \stdClass;
			$options->st = 'wa';

			$xml = $MelissaData->sendCommand('get/CountiesByState', $options);

			$this->assertSelectRegExp('StatusCode', '/Approved/', TRUE, $xml);
		}

		public function testGetZipCodeCount()
		{
			$command = 'get/zip';

			$MelissaData = new MelissaData(ID::get());

			$options = new \stdClass;
			$options->zip = '98119';

			$returnXML = $MelissaData->sendCommand($command, $options);

			$DOMDocument = DOMDocument::loadXML($returnXML);

			$schemaValidate = $DOMDocument->schemaValidate('XSD/getZipCodeCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetZipCodeBuyList()
		{
			$command = 'buy/zip';

			$MelissaData = new MelissaData(ID::get());

			$options = new \stdClass;
			$options->zip = '98119';

			$returnXML = $MelissaData->sendCommand($command, $options);

			$DOMDocument = DOMDocument::loadXML($returnXML);

			$schemaValidate = $DOMDocument->schemaValidate('XSD/getZipCodeBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetCityCount()
		{
			$command = 'get/city';

			$MelissaData = new MelissaData(ID::get());

			$options = new \stdClass;
			$options->city = 'wa;seattle';

			$returnXML = $MelissaData->sendCommand($command, $options);

			$DOMDocument = DOMDocument::loadXML($returnXML);

			$schemaValidate = $DOMDocument->schemaValidate('XSD/getCityCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetCityBuyList()
		{
			$command = 'buy/city';

			$MelissaData = new MelissaData(ID::get());

			$options = new \stdClass;
			$options->city = 'wa;seattle';

			$returnXML = $MelissaData->sendCommand($command, $options);

			$DOMDocument = DOMDocument::loadXML($returnXML);

			$schemaValidate = $DOMDocument->schemaValidate('XSD/getCityBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetCountyCount()
		{
			$command = 'get/county';

			$MelissaData = new MelissaData(ID::get());

			$options = new \stdClass;
			$options->county = 'wa;snohomish';

			$returnXML = $MelissaData->sendCommand($command, $options);

			$DOMDocument = DOMDocument::loadXML($returnXML);

			$schemaValidate = $DOMDocument->schemaValidate('XSD/getCountyCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetCountyBuyList()
		{
			$command = 'buy/county';

			$MelissaData = new MelissaData(ID::get());

			$options = new \stdClass;
			$options->county = 'wa;snohomish';

			$returnXML = $MelissaData->sendCommand($command, $options);

			$DOMDocument = DOMDocument::loadXML($returnXML);

			$schemaValidate = $DOMDocument->schemaValidate('XSD/getCountyBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetStateCount()
		{
			$command = 'get/state';

			$MelissaData = new MelissaData(ID::get());

			$options = new \stdClass;
			$options->st = 'wa';

			$returnXML = $MelissaData->sendCommand($command, $options);

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getStateCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetStateBuyList()
		{
			$command = 'buy/state';

			$MelissaData = new MelissaData(ID::get());

			$options = new \stdClass;
			$options->st = 'wa';

			$returnXML = $MelissaData->sendCommand($command, $options);

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getStateBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetRadiusCount()
		{
			$MelissaData = new MelissaData(ID::get());

			$returnXML = $MelissaData->getRadiusCount('Pier 52, 801 Alaskan Way', '98104', '5', '1');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getRadiusCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetRadiusBuyList()
		{
			$MelissaData = new MelissaData(ID::get());

			$returnXML = $MelissaData->getRadiusBuyList('Pier 52, 801 Alaskan Way', '98104', '5', '1');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getRadiusBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetStreetRecordCount()
		{
			$MelissaData = new MelissaData(ID::get());

			$returnXML = $MelissaData->getStreetRecordCount('98119', 'Republican');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getStreetRecordCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetStreetBuyList()
		{
			$MelissaData = new MelissaData(ID::get());

			$returnXML = $MelissaData->getStreetRecordBuyList('98119', 'Republican');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getStreetRecordBuyList.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetCitiesByCountyCount()
		{
			$MelissaData = new MelissaData(ID::get());

			$returnXML = $MelissaData->getCitiesByCountyCount('wa', 'snohomish');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getCitiesByCountyCount.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetCitiesByState()
		{
			$MelissaData = new MelissaData(ID::get());

			$returnXML = $MelissaData->getCitiesByState('wa');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getCitiesByState.xsd');

			$this->assertTrue($schemaValidate);
		}

		public function testGetCountiesByState()
		{
			$MelissaData = new MelissaData(ID::get());

			$returnXML = $MelissaData->getCountiesByState('wa');

			$DOMDocument = DOMDocument::loadXML($returnXML);
			$schemaValidate = $DOMDocument->schemaValidate('XSD/getCountiesByState.xsd');

			$this->assertTrue($schemaValidate);
		}
	}
?>