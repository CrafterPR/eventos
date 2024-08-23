#!/bin/bash
#
# @author James Makau
#
# Git prepare-commit-msg hook
#
# Replaces or prepends the ticket number from the current branch to the commit message

# Get current git branch
BRANCH_NAME=$(git symbolic-ref --short HEAD 2>/dev/null)

# Match EVT-XYZ, feature/EVT-XYZ, bugfix/EVT-XYZ and hotfix/EVT-XYZ
TICKET_NUMBER=$(echo "$BRANCH_NAME" | grep -Eo "(?:feature|bugfix|hotfix)?(?:\/)?(EVT-[0-9]*)" )

# Get the first line of the commit message
first_line=$(head -n 1 $1)

# Check if the first line starts with a ticket number
if [[ $first_line =~ ^\[[A-Z]+-[0-9]+\] ]]; then
    # If it does, replace it
    sed -i.bak -E "1s%^\[[A-Z]+-[0-9]+\]%[$TICKET_NUMBER]%" $1
else
    # If it doesn't, prepend the ticket number
    echo "[$TICKET_NUMBER] $(cat $1)" > $1
fi
