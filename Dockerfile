ARG command_to_exec

FROM composer

WORKDIR /usr/src/app

COPY composer.json .
COPY composer.lock .

CMD composer $command_to_exec