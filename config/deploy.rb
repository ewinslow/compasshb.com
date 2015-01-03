# config valid only for current version of Capistrano
lock '3.3.5'

set :application, "compasshb.com"
set :repo_url, "git@github.com:compasshb/compasshb.com.git"
set :tmp_dir, "/home/wp_9xx2cb/tmp/"
set :deploy_to, "/home/wp_9xx2cb/www/#{fetch(:application)}"
set :linked_files, %w{public/.env public/wp-config.php}
set :linked_dirs, %w{public/wp-content/uploads public/wp-content/plugins/wpseo-video public/wp-content/themes/Total public/wp-content/plugins/js_composer}
SSHKit.config.command_map[:composer] = "/home/wp_9xx2cb/.composer/vendor/bin/composer"

namespace :deploy do

  after :restart, :clear_cache do
    on roles(:web), in: :groups, limit: 3, wait: 10 do
      # Here we can do anything such as:
      # within release_path do
      #   execute :rake, 'cache:clear'
      # end
    end
  end

end
