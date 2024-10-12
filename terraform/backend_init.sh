#!/bin/bash

# Add Docker's official GPG key:
apt-get update
apt-get install ca-certificates curl
install -m 0755 -d /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/ubuntu/gpg -o /etc/apt/keyrings/docker.asc
chmod a+r /etc/apt/keyrings/docker.asc

# Add the docker repository to Apt sources:
echo \
"deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/ubuntu \
$(. /etc/os-release && echo "$VERSION_CODENAME") stable" | \
tee /etc/apt/sources.list.d/docker.list > /dev/null
apt-get update

# Install docker 
yes | apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin

# Get backend repository

git clone https://github.com/techbabette/FormifyBackend
cd FormifyBackend

# Write to env file

echo REDIS_PASSWORD="${REDIS_PASSWORD}" >> .env
echo MYSQL_PASSWORD="${MYSQL_PASSWORD}" >> .env

echo APPLICATION_ADMIN_EMAIL="${APPLICATION_ADMIN_EMAIL}" >> .env
echo APPLICATION_ADMIN_PASSWORD="${APPLICATION_ADMIN_PASSWORD}" >> .env

echo MAIL_HOST="${MAIL_HOST}" >> .env
echo MAIL_ADDRESS="${MAIL_ADDRESS}" >> .env
echo MAIL_PASSWORD="${MAIL_PASSWORD}" >> .env
echo MAIL_PORT="${MAIL_PORT}" >> .env

echo FRONTEND_ACTIVATION_URL="${FRONTEND_ACTIVATION_URL}" >> .env

# Run backend

docker compose -f docker-compose.prod.yml up -d

# Initialize database and seed

docker exec formifybackend-application-1 php artisan migrate:fresh --seed --force

# Run a second time to pick up any missing containers (Low server resources workaround)

docker compose -f docker-compose.prod.yml up -d

echo 'Script executed successfully!' >> /run/testing.txt  