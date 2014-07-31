<?
require_onece("Command.php");

/**
	The class to instiante the MellisaData API
*/
class MellisaData
{
	/**
		ID of the consumer

		@var string
	*/
	protected $ID = "";

	/**
		URL of the REST service

		@var string	
	*/
	protected $URL = "http://list.mellisadata.net/v1/Consumer/rest/Service.svc";

	/**
		Set the ID for the REST service

		$param int $ID
	*/
	public function setID($ID)
	{
		$this->ID = $ID;
	}

	/**
		Set the ID for the REST service

		@return string
	*/
	public function getURL()
	{
		return $this->URL;
	}

	/**
		Set the ID for the REST service

		$param int $ID
	*/
	public function setURL($URL)
	{
		$this->URL = $URL;
	}

	/**
		Send command

		$param string $command
		$param object $options
	*/
	protected function sendCommand($command, Object $options, Object $arguments = null)
	{
		$get = "id=" . $this->getID() . "&" . http_build_query($options);
		$URL = "/" . $command . "?" . $get;

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $URL);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		return curl_exec($curl);
	}

	/**
		City requests will return records from specified city within a specified state, from selected ZIP codes.  Multiple entries are delimited with a comma.

		@param int $zip

		@return string XML
	*/
	public function getZipCodeCount($zip, Object $arguments = null)
	{
		$command = 'get/zip';

		$options = new \stdClass;
		$options = $zip;

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}

	/**
		City requests will return records from specified city within a specified state, from selected ZIP codes.  Multiple entries are delimited with a comma.

		@param int $zip

		@return string XML
	*/
	public function getZipCodeBuyList($zip, Object $arguments = null)
	{
		$command = 'buy/zip';

		$options = new \stdClass;
		$options = $zip;

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}

	/**
		City requests will return records from a specified city within a specified state from selected ZIP codes.  Multiple entries are delimited with a comma.

		@param string $city

		@return string XML
	*/
	public functiuon getCityCount($city, Object $arguments = null)
	{
		$command = 'get/city';

		$options = new \stdClass;
		$options->city = $city;

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}

	/**
		City requests will return records from a specified city within a specified state from selected ZIP codes.  Multiple entries are delimited with a comma.

		@param string $city

		@return string XML
	*/
	public function getBuyCityList($city, Object $arguments = null)
	{
		$command = 'buy/city';

		$options new \stdClass;
		$options->city = $city;

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}

	/**
		Counties requests will return records from a specified county within a specified state.  Multiple entries are delimited with a comma.

		@param string $county

		@return string XML
	*/
	public function getCountyCount($county, Object $arguments = null)
	{
		$command = 'get/county';

		$options new \stdClass;
		$options->county = $county;

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}

	/**
		Counties requests will return records from a specified county within a specified state.  Multiple entries are delimited with a comma.

		@param string $county

		@return string XML
	*/
	public function getBuyCountyList($county, Object $arguments = null)
	{
		$command = 'buy/county';

		$options = new \stdClass;
		$options->county = $county;

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}

	/**
		State requests will return records from a specified state.  Multiple entries are delimited with a comma.

		@param string $state

		@return string XML
	*/
	public function getStateCount($state, Object $arguments = null)
	{
		$command = 'get/state';

		$options = new \stdClass;
		$options->st = $state;

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}

	/**
		State requests will return records from a specified state.  Multiple entries are delimited with a comma.

		@param string $state

		@return string XML
	*/
	public function getStateBuyList($state, Object $arguments = null)
	{
		$command = 'buy/state';

		$options = new \stdClass;
		$options->st = $state;

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}

	/**
		Radius requests will return the nearest records to the selected address up tto 100,00 records (65,535).

		@param string $address
		@param int @zipcode
		@param int $records
		@param int $mile
	*/
	public function getRadiusCount($address, $zipcode, $records, $mile, Object $arguments = null)
	{
		$command = 'get/radius';

		$options = new \stdClass;
		$options->address = $address;
		$options->zip = $zipcode;
		$options->records = $records;
		$options->mile = $mile;

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}

	/**
		Radius requests will return the nearest records to the selected address up tto 100,00 records (65,535).

		@param string $address
		@param int @zipcode
		@param int $records
		@param int $mile
	*/
	public function getRadiusBuyList($address, $zipcode, $records, $mile, Object $arguments = null)
	{
		$command = 'buy/radius';

		$options = new \stdClass;
		$options->address = $address;
		$options->zip = $zipcode;
		$options->records = $records;
		$options->mile = $mile;

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}

	/**
		Strees reqiests will return records from a specified street within a specified ZIP code

		@param int $zipcode
		@param string string
	*/
	public function getStreetRecordCount($zipcode, Object $arguments = null)
	{
		$command = 'get/street';

		$options = new \stdClass;
		$options->zip = $zipcode;
		$options->str = 'empresa';

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}

	/**
		Strees reqiests will return records from a specified street within a specified ZIP code

		@param int $zipcode
		@param string string
	*/
	public function getStreetRecordBuyList($zipcode, Object $arguments = null)
	{
		$command = 'get/street';

		$options = new \stdClass;
		$options->zip = $zipcode;
		$options->str = 'empresa';

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}

	/**
		Cities by County request returnes a complete list of cities within the specified U.S. County

		@param string state
		@param string county
	*/
	public function getCitiesByCountyCount($state, $county, Object $arguments = null)
	{
		$command = 'get/CitiesByCounty';

		$options = new \stdClass;
		$options->st = $state;
		$options->county = $county;

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}

	/**
		Cities by State request returns a complete list of cities within the specified U.S. State

		@param string state

		@return string XML
	*/
	public function getCitiesByState($state, Object $arguments = null)
	{
		$command = 'get/CitiesByState';

		$options = new \stdClass;
		$options->st = $state;

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}

	/**
		Counties by State request returnes a complete list of counties within the spcified U.S. State

		@param string state

		@return string XML
	*/
	public function getCountiesByState($state, Object $arguments = null)
	{
		$command = 'get/CountiesByState';

		$options = new \stdClass;
		$options->st = $state;

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}


	/**
		States requrest returnes a complete list of States within the USA

		@return string XML
	*/
	public function getStateCount(Object $arguments = null)
	{
		$command = 'get/States';

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, new \stdClass);
	}

	/**
		ZIPs by City request returnes a complete list of ZIP Codes within the specified city.
		States are separated from a city with a semi-colon.  Multiple entries are delimited with a comma

		@param string $city

		@return strin XML
	*/
	public function getZipsByCity($city, Object $arguments = null)
	{
		$command = 'get/ZipsByCity';

		$options = new \stdClass;
		$options->city = $city;

		foreach($arguments AS $key=>$val)
		{
			$options->$key = $val;
		}

		return $this->sendCommand($command, $options);
	}

}
?>