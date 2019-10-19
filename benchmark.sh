#!/bin/sh

base="http://0.0.0.0:1515/php-micro-router-framework-benchmark/frameworks"

cd `dirname $0`

if [ $# -eq 0 ]; then
    # include framework list
    . ./list.sh
    export targets="$list"
else
    export targets="${@%/}"
fi

cd benchmarks

bash hello_world.sh "$base"

php ../bin/show_results_table.php
