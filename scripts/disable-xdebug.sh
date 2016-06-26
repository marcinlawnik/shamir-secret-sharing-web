#!/usr/bin/env bash

if [ "${TRAVIS_PHP_VERSION}" != "hhvm" ]; then
    phpenv config-rm xdebug.ini
fi
