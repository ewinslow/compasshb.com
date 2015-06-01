[![Build Status](https://travis-ci.org/CompassHB/compasshb.com.svg?branch=master)](https://travis-ci.org/CompassHB/compasshb.com) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/CompassHB/compasshb.com/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/CompassHB/compasshb.com/?branch=master)

# CompassHB.com
This is the source code for [compassHB.com](http://www.compasshb.com/). Contributions are welcome in the form of [pull requests](https://github.com/CompassHB/compasshb.com/pulls) or [issues](https://github.com/CompassHB/compasshb.com/issues).

## Technology Stack
* [Laravel PHP Framework](https://www.laravel.com/)
* [Elasticsearch](https://www.elastic.co)

## Install on Cloud9 for local development

#### Create New Workspace
* Clone from URL: https://github.com/CompassHB/compasshb.com.git

#### Edit DocumentRoot (append /public)
* sudo vi /etc/apache2/sites-enabled/001-cloud9.conf

#### Run the composer install script

composer cloud9:install

## Install using Homstead
Set up the environment:
* [VirtualBox](https://www.virtualbox.org/wiki/Downloads) (or VMware Fusion)
* [Vagrant](http://www.vagrantup.com/downloads.html)
* [Composer](http://www.getcomposer.org/download/)

#### Homestead
* `vagrant box add laravel/homestead`
* `composer global require "laravel/homestead=~2.0"`
* `homestead init`
* `homestead edit` to map the path to your cloned repo (name the site compasshb.local).
* `serve compasshb.local /home/vagrant/Code/path/to/public/directory`

Then:

* `git clone https://github.com/CompassHB/compasshb.com.git`
* `npm update` (to install Gulp and Elixir)
* `npm install -g bower` (to install Bower)
* `bower install` and finally `gulp`

Add the following to  /etc/hosts  `192.168.10.10 compasshb.local`

Seed the database using `php artisan migrate:refresh --seed`

Once that is run you can log into the site at http://compasshb.local/admin using credentials user@example.com and the password is "secret".

## Stylesheets
This theme uses SASS. Run `gulp watch` to pre-process any changes to the .scss or .sass files.

## Get Involved
* [Fork](https://help.github.com/articles/fork-a-repo/) the repository on github
* Commit and push until you are happy with your contribution
* Make a [pull request](https://help.github.com/articles/using-pull-requests/)
