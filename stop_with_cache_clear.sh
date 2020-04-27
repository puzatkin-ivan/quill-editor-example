#!/usr/bin/env sh

symfony server:stop > /dev/null 2>&1

php bin/console cache:clear > status.log 2>&1

rm status.log