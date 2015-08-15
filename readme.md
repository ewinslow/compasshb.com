[![Build Status](https://travis-ci.org/CompassHB/compasshb.com.svg?branch=master)](https://travis-ci.org/CompassHB/compasshb.com) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/CompassHB/compasshb.com/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/CompassHB/compasshb.com/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/CompassHB/compasshb.com/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/CompassHB/compasshb.com/?branch=master)

# CompassHB.com
This is the source code for [compassHB.com](http://www.compasshb.com/). Contributions and involvement are welcomed! Attend a monthly in-person tech. night at the church campus.

## Organization
The folder structure is a Laravel 5 project and the main folders are:
* `app\Repositories` - Holds all the code for talking to third-party services via API including, Vimeo, Youtube, Google Analytics, EventBrite, Google Calendar, Smugmug, Planning Center Online, ESV scripture, Zencoder, Amazon AWS S3 storage, and Elasticsearch. Most of these require a valid token to be in your .env file to work and should fail gracefully if the token is missing.
* `resources\views` - Holds all the HTML template code. Uses Laravel Blade and the master layout is in the `layouts` sub-folder. Any edits to the site HTML will go here.
* `resources\assets\less` - Holds all the stylesheets built on Bootstrap. Any updates to this folder need to be pre-processed (LESS to CSS) before they will show up. Running `gulp watch` works.

## Development Environment
You can have a copy running on your computer at http://compasshb.local with these commands:
1. Clone the repo (or a fork)
2. Run: composer install
3. Run: vagrant up
4. Run: composer db:reset (from inside the VM). (You may also want to run bower install, npm install and gulp). Visit the [wiki](https://github.com/CompassHB/compasshb.com/wiki) for instructions on getting started developing in other local environments.

The master branch is automatically deployed to [http://staging.compasshb.com/](http://staging.compasshb.com/).

## Get Involved
* [Fork](https://help.github.com/articles/fork-a-repo/) the repository on github
* Commit and push until you are happy with your contribution
* Make a [pull request](https://help.github.com/articles/using-pull-requests/)