#!/bin/bash
while read line
do
    go get -u $line
done < "deps"