# Music Artists

Get popular artists by country and view their top tracks.

## Installation

Tested on PHP 5.3.10 on Ubuntu 12.04
Apache Server version: Apache/2.2.22 (Ubuntu)

Install PHP 5.3 or greater
Install Apache2

commands
sudo apt-get update
sudo apt-get install apache2

sudo apt-get install php5 libapache2-mod-php5 php5-mcrypt

More instructions here:
https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-14-04


You need to create an API account on last.fm

Read the documentation here:
http://www.last.fm/api/intro

Create an API account here:
http://www.last.fm/api/account/create

After creating the API account, use the API key obtained and define it in
config/constants.php
for
"LASTFM_API_KEY"

## Usage

Visit the index page and give a country name, as defined by the ISO 3166-1 country names standard

Click on thumbnail of artists to view their top track

Click on the track to watch and listen

## Credits

Installation of PHP and Apache
https://www.digitalocean.com

APIs for consumption
http://www.last.fm/

## Notes

Compromises/shortcuts:

An MVC approach using a framework like CodeIgniter would have been better.
User friendly error messages for each type of API error response.
Better user interface with backlinks to previous search.

Observations:

The page and limit parameters on the last.fm API sometimes returns more results than the limit specified.
This affects the pagination.

## License

The MIT License (MIT)

Copyright (c) <2016> Sanath Ballal

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
