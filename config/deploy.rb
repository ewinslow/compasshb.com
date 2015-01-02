# config valid only for current version of Capistrano
lock '3.3.5'

set :application, "compasshb.com"
set :repo_url, "git@github.com:compasshb/compasshb.com.git"
set :tmp_dir, "/home/wp_9xx2cb/tmp/"
set :deploy_to, "/home/wp_9xx2cb/www/#{fetch(:application)}"
set :linked_files, %w{.env wp/wp-config.php wp/wp-content/plugins/wpseo-video wp/wp-content/themes/Total}

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
