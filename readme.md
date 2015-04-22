[![Build Status](https://travis-ci.org/CompassHB/compasshb.com.svg?branch=master)](https://travis-ci.org/CompassHB/compasshb.com) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/CompassHB/compasshb.com/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/CompassHB/compasshb.com/?branch=master) [![Contribute](http://rawgit.com/sunix/99c0da57ec96147bfd73/raw/e3eb038a56f7b9ed635eb06f551ccb225bbf50a9/codenvy-contribute-2.svg)](https://codenvy.com/f?id=mojyqwx13yodb1ux)

# CompassHB.com
This is the source code for [compassHB.com](http://www.compasshb.com/).

## Install on Cloud9 for local development

### Create New Workspace
* Clone from URL: https://github.com/CompassHB/compasshb.com.git

### Edit DocumentRoot (append /public)
* sudo vi /etc/apache2/sites-enabled/001-cloud9.conf

### Run the composer install script

composer cloud9:install

## Install using Homstead
These instructions have been tested on Windows 7 and OS X Yosemite. They allow you to run a full version of the application on a virtiual machine that you can start and stop when you want to develop and keep the rest of your system clean. To set-up your environment you first must install:
* [VirtualBox](https://www.virtualbox.org/wiki/Downloads) (or VMware Fusion / Desktop if you own it)
* [Vagrant](http://www.vagrantup.com/downloads.html)
* [Composer](http://www.getcomposer.org/download/)

### Homestead
Once you have VirtualBox / VMware and Vagrant installed, add the Laravel Homestead box to your Vagrant installation using the following command in your terminal. It will take a few minuts to download the box.

`vagrant box add laravel/homestead`

Then install (Homestead)[http://www.laravel.com/docs/homstead] by running the following commands:
`composer global require "laravel/homestead=~2.0"`

Ensure `~/.composer/vendor/bin` is in your PATH so you can run `homestead` from the command line. Then run `homestead init` to create a Homestead.yaml file in your ~/.homestead directory and run `homestead edit` to map the path to your cloned repo (name the site compasshb.local). Also point the SSH key to your key so you can run `homestead ssh` when you need to log into the VM. (To create a key pair on Mac and Linux run `ssh-keygen -t rsa -C "you@homestead"). See the (Laracasts Homestead Video)[https://laracasts.com/lessons/say-hello-to-laravel-homestead-two] for an overview of using Homestead. Alternatively, you may use the serve script that is available on your Homestead environment. To use the serve script, SSH into your Homestead environment and run the following command: `serve compasshb.local /home/vagrant/Code/path/to/public/directory`

Then: `git clone https://github.com/CompassHB/compasshb.com.git`
And try: `npm update` (to install Gulp and Elixir) and `npm install -g bower` (to install Bower)
Then: `bower install` and finally `gulp`
Add the following line to your /etc/hosts file `192.168.10.10 compasshb.local`

At this point you should be able to access the site at http://compasshb.local. Make sure you run  `homestead up` to start the VM. (And run `homestead halt` to suspend when you are done). The next step is to seed the database by running `php artisan migrate:refresh --seed` (you may have to run homestead ssh first). Anytime you want to reset the local databse run that command. Once that is run you can log into the site at http://compasshb.local/admin using credentials user@example.com and the password is "secret".

## Stylesheets
This theme uses SASS. Run `gulp watch` to pre-process any changes to the .scss or .sass files.

## Get Involved
* [Fork](https://help.github.com/articles/fork-a-repo/) the repository on github
* Commit and push until you are happy with your contribution
* Make a [pull request](https://help.github.com/articles/using-pull-requests/)
