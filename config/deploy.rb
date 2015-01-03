# config valid only for current version of Capistrano
lock '3.3.5'

set :application, "compasshb.com"
set :repo_url, "git@github.com:compasshb/compasshb.com.git"
set :tmp_dir, "/home/wp_9xx2cb/tmp/"
set :deploy_to, "/home/wp_9xx2cb/www/#{fetch(:application)}"
set :linked_files, %w{public/.env public/wp-config.php}
set :linked_dirs, %w{public/wp-content/uploads public/wp-content/plugins/wpseo-video public/wp-content/themes/Total public/wp-content/plugins/js_composer}

SSHKit.config.command_map[:composer] = "/usr/local/php53/bin/php /home/wp_9xx2cb/.composer/vendor/bin/composer"

namespace :deploy do
  
  desc "Creating shared symlinks"
  task :create_shared_symlinks do
    on roles(:web) do
      execute "ln -s #{shared_path}/public/.env #{release_path}/public/.env"
      execute "ln -s #{shared_path}/public/wp-config.php #{release_path}/public/wp-config.php"
      execute "ln -s #{shared_path}/public/wp-content/uploads #{release_path}/public/wp-content/uploads"
      execute "ln -s #{shared_path}/public/wp-content/plugins/wpseo-video #{release_path}/public/wp-content/plugins/wpseo-video"
      execute "ln -s #{shared_path}/public/wp-content/plugins/js_composer #{release_path}/public/wp-content/plugins/js_composer"
      execute "ln -s #{shared_path}/public/wp-content/themes/Total #{release_path}/public/wp-content/themes/Total"
    end
  end
  
  after :publishing, :clear_cache do 
    invoke 'deploy:create_shared_symlinks'
  end
  
  after :restart, :clear_cache do
    on roles(:web), in: :groups, limit: 3, wait: 10 do
      # Here we can do anything such as:
      # within release_path do
      #   execute :rake, 'cache:clear'
      # end
    end
  end

end
