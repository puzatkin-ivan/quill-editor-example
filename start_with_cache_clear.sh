#!/usr/bin/env sh

php bin/console cache:clear > status.log 2>&1

symfony server:start > status.log 2>&1 &