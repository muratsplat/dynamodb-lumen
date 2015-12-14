#!/bin/bash

wget http://dynamodb-local.s3-website-us-west-2.amazonaws.com/dynamodb_local_latest.zip -O ./unitils/dynamodb_local_latest.zip

unzip ./unitils/dynamodb_local_latest.zip  -d ./unitils

java  -Djava.library.path=./unitils/DynamoDBLocal_lib -jar ./unitils/DynamoDBLocal.jar -sharedDb -inMemory &
