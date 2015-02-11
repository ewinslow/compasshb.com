# config valid only for current version of Capistrano
lock '3.3.5'

set :application, "compasshb.com"
set :repo_url, "git@github.com:compasshb/compasshb.com.git"
set :tmp_dir, "/home/wp_9xx2cb/tmp"
set :deploy_to, "/home/wp_9xx2cb/www/#{fetch(:application)}"

SSHKit.config.command_map[:composer]  = "/usr/local/php54/bin/php -d extension=phar.so /home/wp_9xx2cb/.composer/vendor/bin/composer"
# set :composer_install_flags, '--no-dev --no-interaction --optimize-autoloader -vvv'

namespace :deploy do
  
  desc "Creating shared symlinks"
  task :create_shared_symlinks do
    on roles(:web) do
      execute "ln -s #{shared_path}/config/.env #{release_path}/config/.env"
      execute "ln -s #{shared_path}/web/.htaccess #{release_path}/web/.htaccess"
      execute "ln -s #{shared_path}/config/wp-config.php #{release_path}/config/wp-config.php"
      execute "rm -rf #{release_path}/web/app/uploads"
      execute "ln -s #{shared_path}/web/app/uploads #{release_path}/web/app/uploads"
      execute "ln -s #{shared_path}/web/app/plugins/wpseo-video #{release_path}/web/app/plugins/wpseo-video"
    end
  end
  
  desc "Generating stylesheets"
  task :generate_styles do
    on roles(:web) do
      execute "export GEM_PATH=/home/wp_9xx2cb/.gems/ && echo $GEM_PATH && cd #{release_path} && /home/wp_9xx2cb/.gems/bin/compass compile config --trace"
      end
  end
    
  after :publishing, :clear_cache do 
    invoke 'deploy:create_shared_symlinks'
    invoke 'deploy:generate_styles'
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
