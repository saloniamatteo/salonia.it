image_name := salonia
container_name := ${image_name}-website
version := 1.0

# Default recipe
all: build restart

# Check if .env file exists: if not, copy default env
checkenv:
	@if ! [ -f .env ]; then \
		cp .env.example .env; \
	fi

# Build docker image
build:
	@echo "Building Docker image ${image_name}:${version}"
	docker build . -t ${image_name}:${version}

# Run shell inside container
exec:
	@echo "Spawning shell inside container ${container_name}"
	docker exec -it ${container_name} /bin/sh

# View logs
logs:
	docker logs -f ${container_name}

# Restart
restart: down up

stop: down

start: up

down:
	@echo "Removing all containers"
	docker compose down --remove-orphans

up: checkenv
	@echo "Starting containers"
	@# Check if we have to use local valkey
	@if [ "${VALKEY_LOCAL}" = "yes" ]; then \
		echo "Using local Valkey"; \
		docker compose --env-file .env up -d app valkey; \
	else \
		echo "NOT using local Valkey"; \
		docker compose --env-file .env up -d app; \
	fi

.PHONY: all build exec logs restart stop start down up
