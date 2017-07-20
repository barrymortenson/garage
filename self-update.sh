#!bin/bash

git pull
composer install --no-interaction --prefer-dist
npm install
npm run dev
