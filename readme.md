# Model: Symfony+Nuxt+Caddy

A demonstration project of the usage of [Altcha](https://altcha.org/) in a Symfony6 + Nuxt.js 3 environnement.


## Install

Add those lines to your hosts file:

    127.0.0.1 local.api.altcha-demo.net
    127.0.0.1 local.app.altcha-demo.net

Copy the .env files, and edit it if needed:

    cp .env.skeleton .env
    cp api/.env.skeleton api/.env

Change the DB root password in :

* api/.env
* .env

Run from the project directory:

    docker-compose build

Install dependencies : 

    docker exec -it api bash
    composer install
    exit

    docker exec -it app bash
    yarn install
    exit


## Run

Run from the project directory:

    docker-compose up

Start the nuxt server:

    docker exec -it app bash
    yarn dev

Your nuxt app should now be accessible in your browser at https://local.app.altcha-demo.net
