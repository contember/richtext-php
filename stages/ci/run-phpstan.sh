#!/usr/bin/env bash
set -euo pipefail
IFS=$'\n\t'
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

# project root
cd "$( dirname "$( dirname "$DIR" )" )"

php vendor/bin/phpstan analyse
