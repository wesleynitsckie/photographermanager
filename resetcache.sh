#!/bin/bash
echo "=== Resetting the cache"
app/console cache:clear
echo "=== Resetting File owner"
chown www-data:www-data ../photographermanager -R
echo "=== Changing file permissions"
chmod 777 . -R

