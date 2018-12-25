[![Build Status](https://travis-ci.org/ppshobi/openweathermap.svg?branch=master)](https://travis-ci.org/ppshobi/openweathermap)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ppshobi/openweathermap/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ppshobi/openweathermap/?branch=master)

# Summary
This is a small cli tool built around the openweatherapi to display the current weather information for a given location. At this point this tool only displays the current weather information.

# Installation
You need php7+, and composer to install this tool.
 - clone this repository
 - `cd` into the repo
 - `composer install` to install composer dependencies, 
 - `chmod u+x weather` this command will give executable permissions to the program
Boom you are done

# Usage
- `cd` into the repo if you are not already
- `./weather bangalore` will display weather information for bangalore the location defaults to *London*.

# Testing

 - run `composer test`


