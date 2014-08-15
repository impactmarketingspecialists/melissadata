#Melissa Data APIs for PHP

##Intial Setup
You'll need to get the node and php dependencies setup first; run:

```
npm install
curl -s http://getcomposer.org/installer | php
php composer.phar install
```

Rename config.json.dist to config.json and input your api key from Melissa Data.

##Running Tests
Tests can be run via npm or directly through grunt.

```
npm test
```
```
grunt test
```