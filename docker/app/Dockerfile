FROM node:18.19.0-buster

ENV WORKDIR /var/app

RUN corepack enable; \
    yarn set version 4.3.1;

# Define working directory.
WORKDIR ${WORKDIR}

CMD node
