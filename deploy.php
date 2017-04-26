<?php
namespace Deployer;
require 'recipe/laravel.php';

// Configuration

set('ssh_type', 'native');
set('ssh_multiplexing', false);

set('repository', 'https://github.com/Mohammad-Alavi/ngo_api.git');

add('shared_files', []);
add('shared_dirs', []);

add('writable_dirs', []);

set('permission_method', 'chmod_777');
set('keep_releases', '3');
// Servers

server('production', '151.80.182.82')
    ->user('root')
    ->password('oQg70v8F5i')
    //->identityFile()
    ->set('deploy_path', '/var/www/html')
    ->pty(false);


// Tasks

desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php-fpm71.service');
});
after('deploy:symlink', 'php-fpm:restart');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'artisan:migrate');
after('deploy:public_disk', 'artisan:migrate');
before('deploy:symlink', 'deploy:public_disk');
