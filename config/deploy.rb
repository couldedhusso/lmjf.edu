# config valid only for current version of Capistrano
lock '3.5.0'


set :application, 'lmjf.edu'
set :repo_url, 'git@github.com:couldedhusso/lmjf.edu.git'
set :default_stage, 'staging'
set :user, 'ubuntu'

#set :branch, 'master'

# Default branch is :master
# ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

# Default deploy_to directory is /var/www/my_app_name
# set :deploy_to, '/var/www/my_app_name'

set :deploy_to, '/home/ubuntu/remote/lmjf'

role :web, '54.209.46.204' # Your HTTP server, Apache/etc
role :app, '54.209.46.204' # This may be the same as your `Web` server

set :ssh_options, { :forward_agent => true }

# Default value for :scm is :git
# set :scm, :git

# Default value for :format is :airbrussh.
# set :format, :airbrussh

# You can configure the Airbrussh format using :format_options.
# These are the defaults.
# set :format_options, command_output: true, log_file: 'log/capistrano.log', color: :auto, truncate: :auto

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
# set :linked_files, fetch(:linked_files, []).push('config/database.yml', 'config/secrets.yml')
set :linked_files, fetch(:linked_files, []).push('.env')

# Default value for linked_dirs is []
# set :linked_dirs, fetch(:linked_dirs, []).push('log', 'tmp/pids', 'tmp/cache', 'tmp/sockets', 'public/system')

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for keep_releases is 5
# set :keep_releases, 5

namespace :deploy do

  # after :clear_cache do
  #   on roles(:web)  do
  #     # Here we can do anything such as:
  #     within release_path do
  #       execute :rake, 'cache:clear'
  #     end
  #   end
  #
  # end

  after :updated,  :composer do
    on roles(:web)  do
      within release_path do
        execute :composer, :install
      end
    end
  invoke "laravel:optimize"
  invoke "laravel:permissions"
  invoke "laravel:dbseed"
  end


  # after :finished do
  #   invoke "php:fpm_restart"
  # end

end
