server '54.145.38.140',
user: 'lts',
roles: %w{web app},
port: 22

# Directory to deploy
# ===================
set :env, 'production'
set :app_debug, 'false'
set :deploy_to, '/home/lts/web'
set :shared_path, '/home/lts/web/shared'
set :overlay_path, '/home/lts/web/overlay'
set :tmp_dir, '/home/lts/web/tmp'
set :site_url, 'http://54.145.38.140/'
#set :supervisor_task, 'soscbaha_horizon'
#set :rollbar_token, ''
