// Laravel Envoy example file. Rename this to "Envoy.blade.php"!
// Run with "composer deploy".
// ---
// NOTE: change 'user@127.0.0.1' with your remote server!
@servers(['web' => 'user@127.0.0.1'])

@task('deploy', ['on' => 'web'])
    cd /var/www/salonia.it
    git pull
    scripts/update.sh
@endtask
