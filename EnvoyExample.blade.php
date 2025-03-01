// Laravel Envoy example file. Rename this to "Envoy.blade.php"!

// NOTE: change 'user@127.0.0.1' with your remote server!
@servers(['web' => 'user@127.0.0.1'])

@task('update', ['on' => 'web'])
    cd /var/www/salonia.it
    git pull
    scripts/update.sh
@endtask
