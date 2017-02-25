#!bin/bash

git pull
composer install --no-interaction --no-dev --prefer-dist
yarn
npm run dev
