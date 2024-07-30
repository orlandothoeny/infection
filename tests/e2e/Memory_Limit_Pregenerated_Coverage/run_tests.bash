#!/usr/bin/env bash

if [ "$DRIVER" = "phpdbg" ]
then
    # Memory limit cannot be enforced from our custom php.ini
    # under PHPDBG, hence this test shows nothing under PHPDBG
    exit 0
fi

set -e

run () {
    local INFECTION=${1}
    local PHPARGS=${2}

    if [ "$DRIVER" = "phpdbg" ]
    then
        phpdbg $PHPARGS -qrr $INFECTION
    else
        php $PHPARGS $INFECTION
    fi

    diff -u -w expected-output.txt infection.log
}

# Generate coverage reports
php -d xdebug.mode=coverage -d memory_limit=-1 vendor/bin/phpunit --coverage-xml=./coverage-reports/coverage-xml --log-junit=./coverage-reports/junit.xml

run "../../../bin/infection --skip-initial-tests --coverage=./coverage-reports --show-mutations -vvv --debug" "-d memory_limit=-1"

