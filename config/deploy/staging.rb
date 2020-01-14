server '54.145.38.140',
user: 'lts',
roles: %w{web app},
port: 22

# Directory to deploy
# ===================
set :env, 'staging'
set :app_debug, 'false'
set :deploy_to, '/home/lts/web-2'
set :shared_path, '/home/lts/web-2/shared'
set :overlay_path, '/home/lts/web-2/overlay'
set :tmp_dir, '/home/lts/web-2/tmp'
set :site_url, 'http://54.145.38.140/'
#set :supervisor_task, 'soscbaha_horizon'
#set :rollbar_token, ''
