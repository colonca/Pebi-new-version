#!/bin/sh
set -e

echo "Deploying application ..."

cd /var/wwww

# Update codebase
git fetch origin master
git reset --hard origin/master

echo "Application deployed!"