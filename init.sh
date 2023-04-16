#!/bin/bash

# Copia el archivo .env.template y lo renombra como .env
cp .env.template .env

# Limpia los valores en las variables del archivo .env.template
sed -i 's/=.*$/=/' .env.template

# Elimina la carpeta .git
rm -rf .git

source .env
current_dir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
new_dir="$( dirname "$current_dir" )/$APP_NAME"
mv "$current_dir" "$new_dir"

cmd.exe /C "taskkill /F /IM code.exe"
# pkill code
code "$new_dir"


# Inicializa un nuevo repositorio Git
git init

#ejecuta docker
docker-compose up -d

# Elimina el archivo
rm .gitattributes

# Espera un poco para que el contenedor esté listo
sleep 10
docker exec -it $APP_NAME sh -c "cd /var/www/html && composer install"


# Realiza un commit inicial
git add .
git commit -m "Ready for programming"


url="http://localhost:$APP_PORT/"
# cmd.exe /c start "$url"
explorer.exe "$url"

cd "$new_dir"

# Elimina el archivo init.sh
rm -- "$0"
