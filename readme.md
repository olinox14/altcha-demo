# Altcha Demo

## Overview

This project is a reference implementation of **[ALTCHA](https://altcha.org/fr/)** (a privacy-focused PoW anti-spam solution) using a modern decoupled stack.

- **Backend:** Symfony 7 & API Platform 3, featuring custom State Providers and Processors to generate and verify challenges via the `altcha-org/altcha` PHP library.
- **Frontend:** Nuxt 3 (Vue.js) showcasing a client-side integration of the `<altcha-widget>` with reactive state handling.
- **Infrastructure:** Fully dockerized environment with Caddy as a reverse proxy for seamless local development.

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

## /!\ Warning

You'll probably have to reach at least once the url https://local.api.altcha-demo.net in your browser 
to add a security exception. Not doing so could lead to a CORS exception while validating the captcha.
