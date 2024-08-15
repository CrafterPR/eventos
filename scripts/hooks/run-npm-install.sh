#!/bin/bash
#
# @author Diamond Mubaarak
#
# Git npm install hook
#
# Checks for package-lock.json changes and runs npm install if found

FILENAME='package-lock.json'

echo -e "Checking for package-lock.json changes..."

if [[ $(git diff HEAD@{1}..HEAD@{0} -- "${FILENAME}" | wc -l) -gt 0 ]]; then
    echo -e "Found package-lock.json changes running NPM install..."
    npm install
    exit 0
fi

echo -e "No package-lock.json changes found."
exit 0
