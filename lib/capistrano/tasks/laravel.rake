namespace :laravel do

 # manage migration task for laravel framework
 task :migrate do
   on roles(:web) do
     within release_path do
       # execute :composer, :install
       execute :php, :artisan, :migrate
     end
   end
 end

 #task for optimization
 task :optimize do
   on roles(:web) do
     within release_path do
       execute :php, :artisan, :optimize
     end
   end
 end


 #task for db seed
 task :dbseed do
   on roles(:web) do
     within release_path do
       execute :php, :artisan, 'db:seed'
     end
   end
 end

 #manage permissions task  on folder
 task :permissions do
   on roles(:web) do
     within release_path do
       execute :chmod, '777', '-R', 'storage'
       execute :chmod, '777', '-R', 'bootstrap/cache'
     end
   end
 end


end
