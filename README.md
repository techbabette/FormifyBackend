# [Formify](https://formify.techbabette.com/)

## Overview

Formify is a web application that helps people create no-code forms in a user friendly way.

## Technologies used

The backend is comprised of a main Laravel service and a NodeJS microservice, the backend services communicate using RabbitMQ and take advantage of Redis for caching, [the frontend](https://github.com/techbabette/ReactJSONForm) is based on React and its various libraries.

The backend is supported by docker compose, and, in deployment, takes advantage of Terraform and Ansible.

On new releases, the Laravel service and NodeJS microservice are both pushed as images to Amazons ECR using Github actions.
## Running

To run the backend, clone this repository and type
```
docker compose -f docker-compose.prod.yml up -d
```
To run the backend stack locally, or
```
terraform init && terraform apply
```
To deploy the backend to a Hetzner server.

## Features

- JWT based authentication distributed through a Redis cache, allowing for horizontal scaling and improving user security.
- Expandability achieved through the strategy pattern, allowing for future integration with tools like SNS and SQS for microservice communication.
