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
		}

		public function testGetCityBuyList()
		{
			$command = 'buy/city';

			$MelissaData = new MelissaData(ID::get());

			$options = new \stdClass;
			$options->city = 'wa;seattle';

			$returnXML = $MelissaData->sendCommand($command, $options);
		}
	}
?>