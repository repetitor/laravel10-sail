#!/bin/sh

echo start pre-commit

./vendor/bin/sail bin pint

./vendor/bin/sail php artisan test
if [ $? != 0 ]; then
	echo "Tests failed! Aborting commit." >&2
	exit 1;
fi

echo finish pre-commit
