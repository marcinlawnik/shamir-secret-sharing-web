#!/usr/bin/env bash

if [ "${TRAVIS_PULL_REQUEST}" = "false" ]; then
    phpenv config-rm xdebug.ini
fi
