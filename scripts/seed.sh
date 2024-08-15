#!/bin/bash
#
# @author Diamond Mubaarak <diamond@diamonddev.group>
#
# Runs database migrations and seeds for the application.
# Also flushes and reimport Scout indexes and sets Scout attributes.
#
# Usage: bash ./scripts/seed.sh
##

# Run database migrations and seeds
bash vendor/bin/sail php artisan migrate:refresh --seed
