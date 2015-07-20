# Config Github Settings
github_username = "fideloper"
github_repo = "Vaprobash"
github_branch = "master"
github_url = "https://raw.githubusercontent.com/#{github_username}/#{github_repo}/#{github_branch}"

require 'json'
require 'yaml'

VAGRANTFILE_API_VERSION = "2"
confDir = $confDir ||= File.expand_path("vendor/laravel/homestead")

homesteadYamlPath = "Homestead.yaml"
afterScriptPath = "after.sh"
aliasesPath = "aliases"

require File.expand_path(confDir + '/scripts/homestead.rb')

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
	if File.exists? aliasesPath then
		config.vm.provision "file", source: aliasesPath, destination: "~/.bash_aliases"
	end

	Homestead.configure(config, YAML::load(File.read(homesteadYamlPath)))

	# Install Elasticsearch
	config.vm.provision "shell", path: "#{github_url}/scripts/elasticsearch.sh"

	if File.exists? afterScriptPath then
		config.vm.provision "shell", path: afterScriptPath
	end
end
