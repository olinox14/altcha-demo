FROM node:24.12.0-bullseye

ENV WORKDIR /var/app

RUN corepack enable; \
    yarn set version 4.3.1;

# Define working directory.
WORKDIR ${WORKDIR}

CMD node
