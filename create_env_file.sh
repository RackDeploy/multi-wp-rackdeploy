#!/bin/bash

# Create a .env file from environment variables
echo DB_NAME=$DB_NAME >> .env
echo DB_HOST=$DB_HOST >> .env
echo DB_USER=$DB_USER >> .env
echo DB_PASS=$DB_PASS >> .env
