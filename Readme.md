[![Build Status](https://scrutinizer-ci.com/g/ppshobi/openweathermap/badges/build.png?b=master)](https://scrutinizer-ci.com/g/ppshobi/openweathermap/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ppshobi/openweathermap/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ppshobi/openweathermap/?branch=master)

# Summary
This is a small cli tool built around the openweatherapi to display the current weather information for a given location. At this point this tool only displays the current weather information.

# Installation
You need php7+, and composer to install this tool.
 - clone this repository
 - `cd` into the repo
 - `composer install` to install composer dependencies, 
 - `cp .env.exmaple .env` to create environment file
 - edit `.env` file to add the api token obtained from openweathermap
 - `chmod u+x weather` this command will give executable permissions to the program

:zap: Boom you are done

# Usage
- `cd` into the repo if you are not already
- `./weather bangalore` will display weather information for bangalore the location defaults to *London*.

# Testing

 - run `composer test`


