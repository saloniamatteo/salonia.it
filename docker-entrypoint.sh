#!/bin/bash
# Docker entrypoint script
# Written by Matteo Salonia (matteo@salonia.it) https://salonia.it

# Update configuration
./scripts/update.sh

# Execute php-fpm
php-fpm
