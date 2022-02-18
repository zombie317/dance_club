#!/usr/bin/env bash

docker-compose run --rm php composer install

docker-compose run --rm php php init --env=Development --overwrite=All

docker-compose run --rm php php yii migrate --interactive=0