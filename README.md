#Melissa Data APIs for PHP
This library is an implementation of Melissa Data's Consumer and Property APIs in PHP.

##Installation
This package is intended for distribution via Composer. Until acceptance in the Composer channel's, this repository may be linked directly in your composer.json by adding:
```
{
	"repositories": [{
    "type": "package",
    "package": {
        "name": "impactmarketingspecialists/melissadata",
        "version": "0.1.0",
        "source": {
            "url": "https://github.com/impactmarketingspecialists/melissadata.git",
            "type": "git",
        	"reference": "master"
        }
        }
    }],
    "require": {
    "impactmarketingspecialists/melissadata": "0.1.*"
    }
}
```
##Usage
When instantiating, you must provide a valid API key provided by Melissa Data, and you must specifiy a mode. By default, test mode is selected and API calls are sent to Melissa Data's test server. To make live calls, you must specify 'production' mode.
```
<?php
	include('./MelissaDataConsumer.php');
	$MelissaData = new MelissaDataConsumer($APIKEY , 'production');
	$returnXML = $MelissaData->getZipCodeCount('98119');
?>
```

##Builds and Testing
###Intial Setup
You'll need to get the node and php dependencies setup first; run:

```
npm install
curl -s http://getcomposer.org/installer | php
php composer.phar install
```

###Running Tests
Tests can be run via npm or directly through grunt. Before running tests, rename _config.json.dist_ to _config.json_ and input a valid API key provided by Melissa Data.

```
npm test
```
or
```
grunt test
```

###Tests and Coverage
Testing is not intended to provide full code coverage, rather to ensure that all implementation methods are functioning properly and to detect changes in API responses from Melissa Data. XSDs are generated for each call against the Melissa Data API and testing simply validates that responses still match that schema. If there is a change in the schema it is unlikely that it will impact the functioning of this library, but implementations using this library will need to be adjusted to properly handle the changed response data they will receive.