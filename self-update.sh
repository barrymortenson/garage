#!bin/bash

git pull
composer install --no-interaction --prefer-dist
yarn
npm run dev
