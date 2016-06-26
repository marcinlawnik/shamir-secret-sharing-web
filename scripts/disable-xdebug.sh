#!/usr/bin/env bash

#This disables xdebug in php, not in hhvm
if [ "${TRAVIS_PHP_VERSION}" != "hhvm" ]; then
    phpenv config-rm xdebug.ini
fi