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
			write_env_opt $tunable "$value"
		fi
	done
}

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
if ! [ -z "$VALKEY_LOCAL" ] && ! [ "$VALKEY_LOCAL" = "no" ]; then
	write_env "# Cache & Session store"

	# Here we write "redis" because Valkey is redis-compatible
	write_env_opt CACHE_STORE "redis"
	write_env_opt SESSION_DRIVER "redis"
	write_env_opt REDIS_HOST "valkey"
else
	write_env "# Cache & Session store"

	# Check if a custom cache driver is set
	if [ -z "$CACHE_STORE" ]; then
		write_env_opt CACHE_STORE "file"
	else
		write_env_opt CACHE_STORE "$CACHE_STORE"
	fi

	# Check if session driver is set
	if [ -z "$SESSION_DRIVER" ]; then
		write_env_opt SESSION_DRIVER "file"
	else
		write_env_opt SESSION_DRIVER "$SESSION_DRIVER"
	fi
fi

# Add newline
write_env

# Check redis settings
write_env "# Redis settings"

redis=(
	#"REDIS_CACHE_CONNECTION"
	"REDIS_HOST"
	"REDIS_PORT"
)

check_tunables ${redis[@]}

# Check if AbuseIPDB API key is set
if ! [ -z "$ABUSEIPDB_KEY" ]; then
	write_env "# AbuseIPDB settings"
	write_env_opt ABUSEIPDB_KEY "$ABUSEIPDB_KEY"

	# Define AbuseIPDB tunables
	abuseipdb=(
		"ABUSEIPDB_THRESHOLD"
		"ABUSEIPDB_IGNORE_WHITELIST"
		"ABUSEIPDB_CACHE_TTL"
		"ABUSEIPDB_IP_OK"
		"ABUSEIPDB_IP_BAD"
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
	"CHECKREQUEST_CACHE_TTL"
)

check_tunables ${checkrequest[@]}

# Add APP_KEY to .env, or else command below will fail
write_env
write_env "# Application key"
write_env APP_KEY=

# Clear cache & Regenerate key
php artisan optimize:clear
php artisan key:generate --force

# Cache assets
composer cache

# Execute php-fpm
php-fpm
