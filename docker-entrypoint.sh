#!/bin/bash
# Docker entrypoint script
# Written by Matteo Salonia (matteo@salonia.it) https://salonia.it

# Write directly to .env (append)
write_env() {
	cat >> .env <<EOF
$@
EOF
}

# Write option=value to .env (via append)
write_env_opt() {
	option_name=$1
	option_value=$2

	write_env "${option_name}=\"${option_value}\""
}

# Check if each variable in the tunables array is set:
# if it is, append the value in .env
check_tunables() {
	tunables=$1

	for tunable in ${tunables[@]}; do
		value="${!tunable}"

		# If value is not empty, set it
		if ! [ -z "$value" ]; then
			# Remove "DOCKER_" at the beginning of the variable name
			write_env_opt ${tunable#DOCKER_} "$value"
		fi
	done
}

cache() {
	# Clear cache & Regenerate key
	php artisan optimize:clear
	php artisan key:generate --force

	# Cache assets
	composer cache
}

# Do not apply changes if .env differs from .env.example
diff .env.example .env >/dev/null 2>&1
if ! [ $? = 0 ]; then
	# Regen cache & key
	cache

	# Execute php-fpm
	php-fpm

	# Exit on php-fpm exit
	exit 0
fi

# Default settings
DE_CACHE_STORE="redis"
DE_SESSION_DRIVER="redis"
DE_REDIS_HOST="valkey"

# Start writing env
cat > .env <<EOF
# Variables configured by Docker Entrypoint script
# Written by Matteo Salonia (matteo@salonia.it) https://salonia.it

EOF

# Logic tree:
# - Valkey?
#	- Yes:
#		CACHE_STORE & SESSION_DRIVER -> redis
#		REDIS_HOST -> valkey
#	- No:
#		- Custom CACHE_STORE?
#			- Yes -> set custom store
#			- No -> set file store
#		- Custom SESSION_DRIVER?
#			- Yes -> set custom store
#			- No -> set array store
#
# - Custom REDIS_CACHE_CONNECTION?
#	- Yes -> set custom value
# - Custom REDIS_HOST?
#	- Yes -> set custom host
# - Custom REDIS_PORT?
#	- Yes -> set custom port
#
# - AbuseIPDB_KEY?
#   - Yes -> set it; check if tunables are set

# Check if we have to use Valkey as cache/session driver
if ! [ -z "$DOCKER_VALKEY_LOCAL" ] && ! [ "$DOCKER_VALKEY_LOCAL" = "no" ]; then
	write_env "# Cache & Session store"

	# Here we write "redis" because Valkey is redis-compatible
	write_env_opt CACHE_STORE $DE_CACHE_STORE
	write_env_opt SESSION_DRIVER $DE_SESSION_DRIVER
	write_env_opt REDIS_HOST $DE_REDIS_HOST
else
	# Check cache & session settings
	write_env "# Cache & Session store"

	cache_session=(
		"DOCKER_CACHE_STORE"
		"DOCKER_SESSION_DRIVER"
	)

	check_tunables ${cache_session[@]}
fi

# Add newline
write_env

# Check redis settings
write_env "# Redis settings"

redis=(
	"DOCKER_REDIS_HOST"
	"DOCKER_REDIS_PORT"
)

check_tunables ${redis[@]}

# Check if AbuseIPDB API key is set
if ! [ -z "$DOCKER_ABUSEIPDB_KEY" ]; then
	write_env "# AbuseIPDB settings"
	write_env_opt ABUSEIPDB_KEY "$DOCKER_ABUSEIPDB_KEY"

	# Define AbuseIPDB tunables
	abuseipdb=(
		"DOCKER_ABUSEIPDB_THRESHOLD"
		"DOCKER_ABUSEIPDB_IGNORE_WHITELIST"
		"DOCKER_ABUSEIPDB_CACHE_TTL"
		"DOCKER_ABUSEIPDB_IP_OK"
		"DOCKER_ABUSEIPDB_IP_BAD"
	)

	# Check if each tunable is set and, if it is,
	# retrieve & set its value
	check_tunables ${abuseipdb[@]}
fi

# Add newline
write_env

# Check CheckRequest settings
write_env "# CheckRequest settings "

checkrequest=(
	"DOCKER_CHECKREQUEST_CACHE_TTL"
)

check_tunables ${checkrequest[@]}

# Add APP_KEY to .env, or else command below will fail
write_env
write_env "# Application key"
write_env APP_KEY=

# Regen cache & key
cache

# Execute php-fpm
php-fpm
