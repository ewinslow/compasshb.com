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
      execute "ln -s #{shared_path}/public/.env #{release_path}/public/.env"
      execute "ln -s #{shared_path}/public/.htaccess #{release_path}/public/.htaccess"
      execute "ln -s #{shared_path}/public/wp-config.php #{release_path}/public/wp-config.php"
      execute "rm -rf #{release_path}/public/wp-content/uploads"
      execute "ln -s #{shared_path}/public/wp-content/uploads #{release_path}/public/wp-content/uploads"
      execute "ln -s #{shared_path}/public/wp-content/plugins/wpseo-video #{release_path}/public/wp-content/plugins/wpseo-video"
      execute "ln -s #{shared_path}/public/wp-content/themes/Total #{release_path}/public/wp-content/themes/Total"
    end
  end
  
  desc "Generating stylesheets"
  task :generate_styles do
    on roles(:web) do
      execute "cd #{release_path} && /home/wp_9xx2cb/.local/usr/bin/node /home/wp_9xx2cb/.local/usr/bin/bower install"
      execute "export GEM_PATH=/home/wp_9xx2cb/.gems/ && echo $GEM_PATH && cd #{release_path} && /home/wp_9xx2cb/.gems/bin/compass compile --trace"
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
