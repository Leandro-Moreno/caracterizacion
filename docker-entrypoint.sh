#!/bin/bash

set -e

if [[ "$1" == apache2* ]] || [ "$1" == php-fpm ]; then
		echo >&2 "Validando la instalación de melab"
        if ! [ -f index.php ]; then
                echo >&2 "melab no encontrado en $(pwd) - copiando..."
                tar cf - --one-file-system -C /usr/src/certificados . | tar xf -
                chmod +x script.sh
		#mv /connect.inc.php ./include/connect.inc.php
		#mv /config_ldap.inc.php ./include/config_ldap.inc.php

		rm -f melab.tar
                echo >&2 "OK! melab ha sido copiado en $(pwd)"
        fi
		
		
        echo >&2 "========================================================================"
        echo >&2
        echo >&2 " Este contenedor esta corriendo melab!"
        echo >&2
        echo >&2 "========================================================================"
fi
##chmod 775 -Rf /var/www/html/admin/error_log
echo "Docker container has been started"


# Setup a cron schedule
echo "APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120" > /usr/src/certificados/.env


exec apache2-foreground