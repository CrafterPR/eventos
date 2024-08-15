#!/bin/bash
#
# @author Diamond Mubaarak
#
# Git sync-env-files hook
#
# Syncs .env files between branches

SRC=$1
DEST=$2

echo "Syncing $1 and $2"

# Ensure destination ends with newline
if [[ $3 != "warn" ]]; then
    sed -i '$a\' "$DEST"
fi

# Read the $SRC file
while read line || [ -n "$line" ]; do

    # skip empty lines
    if [[ -z $line ]]; then 
        continue
    fi

    # Split key and value
    IFS='='
    read -a split_line <<< "$line"
    KEY=${split_line[0]}
    VALUE=${split_line[1]}

    # Check key exists in .env
    echo -e "Checking $KEY"
    KEY_FOUND=$(grep "$KEY=" "$DEST")
    RETURN=0

    if [[ -z $KEY_FOUND ]]; then 
        if [[ $3 == "warn" ]]; then
            RETURN=1
            echo -e "$KEY found in $SRC not in $DEST"
        else
            echo -e "Syncing $KEY var from $SRC to $DEST"
            echo "$KEY=$VALUE" | tee -a "$DEST" > /dev/null
        fi
    fi

done <"$SRC"

if [[ $RETURN == 1 ]]; then
    echo -e "Found keys $SRC not present in $DEST"
    echo -e "Done!"
    exit 1
fi

echo -e "Done!"
exit 0
