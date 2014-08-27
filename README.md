#Melissa Data APIs for PHP
This library is an implementation of Melissa Data's Consumer and Property APIs in PHP.

##Installation
This package is intended for distribution via Composer. Until acceptance in the Composer channel's, this repository may be linked directly in your composer.json by adding:
```
    "require": {
        "melissadata": "https://github.com/impactmarketingspecialists/melissadata.git"
    }
```

##Intial Setup
You'll need to get the node and php dependencies setup first; run:

```
npm install
curl -s http://getcomposer.org/installer | php
php composer.phar install
```

##Running Tests
Tests can be run via npm or directly through grunt. Before running tests, rename _config.json.dist_ to _config.json_ and input a valid API key provided by Melissa Data.

```
npm test
```
or
```
grunt test
```

##Tests and Coverage
Testing is not intended to provide full code coverage, rather to ensure that all implementation methods are functioning properly and to detect changes in API responses from Melissa Data. XSDs are generated for each call against the Melissa Data API and testing simply validates that responses still match that schema. If there is a change in the schema it is unlikely that it will impact the functioning of this library, but implementations using this library will need to be adjusted to properly handle the changed response data they will receive.