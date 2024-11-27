#!/bin/sh
# Run this script when (git) pulling from this repo

# Check where we are run and cd accordingly
dir=$(pwd)
[[ $(basename $dir) == "scripts" ]] && cd ..

# Install deps
composer install
npm i

# Build & cache assets
npm run build
composer cache
