<?php

/**
	The class to instiante the MellisaData API
*/
class MelissaDataProperty
{
	/**
		ID of the consumer

		@var string
	*/
	protected $ID = "";

	/**
		URL for the REST service

		@var string	
	*/
	protected $URL = "http://rclist.melissadata.net/v1/Property/rest/Service.svc";

	/**
		Initialized the class and requires a ID credential to be set

		@param int $ID
	*/
	public function __construct($ID = null)
	{
		if($ID == null)
		{
			$jsonContents = file_get_contents('config.json');
			$json = json_decode($jsonContents);
			$this->setID($json->APIKEY);
		} else {
			$this->setID($ID);
		}
	}

	/**
		Set the ID for the REST service

		@param int $ID
	*/
	public function setID($ID)
	{
		$this->ID = $ID;
	}

	/**
		get the ID for the REST service

		@param int $ID
	*/
	public function getID()
	{
		return $this->ID;
	}

	/**
		Get the URL for the REST service

		@return string
	*/
	public function getURL()
	{
		return $this->URL;
	}

	/**
		Set the URL for the REST service

		@param int $ID
	*/
	public function setURL($URL)
	{
		$this->URL = $URL;
	}

	public function sendCommand($command, stdClass $options)
	{
		$get = "id=" . $this->getID() . "&" . http_build_query($options);
		$URL = $this->getURL() . "/" . $command . "?" . $get;

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $URL);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$return = curl_exec($curl);

		curl_close($curl);

		return $return;
	}

	public function getZipcode($zipcode, array $arguments=null)
	{
		$command = 'get/zip';

		$options = new \stdClass;
		$options->zip = $zipcode;

		if($arguments)
		{
			foreach($arguments AS $key=>$val)
			{
				$options->{$key} = $val;
			}
		}

		return $this->sendCommand($command, $options);
	}

	public function getZipcodeBuyList($zipcode, array $arguments=null)
	{
		$command = 'buy/zip';

		$options = new \stdClass;
		$options->zip = $zipcode;

		if($arguments)
		{
			foreach($arguments AS $key=>$val)
			{
				$options->{$key} = $val;
			}
		}

		return $this->sendCommand($command, $options);
	}

	public function getCity($city, array $arguments=null)
	{
		$command = 'get/city';

		$options = new \stdClass;
		$options->city = $city;

		if($arguments)
		{
			foreach($arguments AS $key=>$val)
			{
				$options->{$key} = $val;
			}
		}

		return $this->sendCommand($command, $options);
	}

	public function getCityBuyList($city, array $arguments=null)
	{
		$command = 'buy/city';

		$options = new \stdClass;
		$options->city = $city;

		if($arguments)
		{
			foreach($arguments AS $key=>$val)
			{
				$options->{$key} = $val;
			}
		}

		return $this->sendCommand($command, $options);
	}

	public function getCounty($county, array $arguments=null)
	{
		$command = 'get/county';

		$options = new \stdClass;
		$options->county = $county;

		if($arguments)
		{
			foreach ($argumentsr as $key=>$val) 
			{
				$options->{$key} = $val;
			}
		}

		return $this->sendCommand($command, $options);
	}

	public function getCountyBuyList($county, array $arguments=null)
	{
		$command = 'buy/county';

		$options = new \stdClass;
		$options->county = $county;

		if($arguments)
		{
			foreach ($argumentsr as $key=>$val) 
			{
				$options->{$key} = $val;
			}
		}

		return $this->sendCommand($command, $options);
	}

	public function getRadiusCount($address, $zipcode, $records, $mile, array $arguments = null)
	{
		$command = 'get/radius';

		$options = new \stdClass;
		$options->addr = $address;
		$options->zip = $zipcode;
		$options->records = $records;
		$options->mile = $mile;

		if($arguments)
		{
			foreach($arguments AS $key=>$val)
			{
				$options->{$key} = $val;
			}
		}

		return $this->sendCommand($command, $options);
	}

	public function getRadiusBuyList($address, $zipcode, $records, $mile, array $arguments = null)
	{
		$command = 'buy/radius';

		$options = new \stdClass;
		$options->addr = $address;
		$options->zip = $zipcode;
		$options->records = $records;
		$options->mile = $mile;

		if($arguments)
		{
			foreach($arguments AS $key=>$val)
			{
				$options->{$key} = $val;
			}
		}

		return $this->sendCommand($command, $options);
	}
}