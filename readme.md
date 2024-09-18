# Model: Symfony+Nuxt+Caddy

A minimal implementation of [Altcha](https://altcha.org/) in a Symfony 7 / ApiPlatform 3 + Nuxt.js 3 environment


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
    docker-compose up

Install dependencies : 

    docker exec -it altchademo_api bash
    composer install
    exit

    docker exec -it altchademo_app bash
    yarn install
    exit


## Run

Run from the project directory:

    docker-compose up

Start the nuxt server:

    docker exec -it altchademo_app bash
    yarn dev

Your nuxt app should now be accessible in your browser at https://local.app.altcha-demo.net.

## Note

You'll probably have to reach at least once the url https://local.api.altcha-demo.net in your browser 
to add a security exception. Not doing so could lead to a CORS exception while validating the captcha.