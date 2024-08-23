#!/bin/bash
#
# @author James Makau <jacjimus@gmail.com>
#
# Installs bash terminal aliases for the application.
#
# Usage: bash ./scripts/hooks/install-shell-aliases.sh
##

# Install bash terminal aliases
RC_FILES=('.bashrc' '.zshrc')

for FILE in "${RC_FILES[@]}"; do

    FILE="${HOME}/${FILE}"

    if [[ -f "$FILE" ]]; then
        if  ! grep -q 'alias sail' "$FILE"; then
            echo "Adding 'sail' alias to $FILE"
            echo "alias sail='bash vendor/bin/sail'" >>"$FILE"
        fi

        if ! grep -q 'alias art' "$FILE"; then
            echo "Adding 'art' alias to $FILE"
            echo "alias art='bash vendor/bin/sail exec application php artisan'" >>"$FILE"
        fi

        if ! grep -q 'alias t' "$FILE"; then
            echo "Adding 't' alias to $FILE"
            echo "alias t='art test --parallel --coverage-html coverage/'" >>"$FILE"
        fi

        if ! grep -q 'alias lint' "$FILE"; then
            echo "Adding 'lint' alias to $FILE"
            echo "alias lint='sail composer lint'" >>"$FILE"
        fi

        if ! grep -q 'alias sniff' "$FILE"; then
            echo "Adding 'sniff' alias to $FILE"
            echo "alias sniff='sail composer sniff'" >>"$FILE"
        fi

        if ! grep -q 'alias stan' "$FILE"; then
            echo "Adding 'stan' alias to $FILE"
            echo "alias stan='sail composer stan'" >>"$FILE"
        fi

        if ! grep -q 'alias seed' "$FILE"; then
            echo "Adding 'seed' alias to $FILE"
            echo "alias seed='bash scripts/seed.sh'" >>"$FILE"
        fi
    fi

done
