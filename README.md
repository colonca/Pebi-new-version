#Pasos para ejecutar el proyecto

renombrar el .env.example a .env

Luego ejecutar desde la terminal los siguientes comandos

docker-compose up -d

docker exec -ti pebi-app bash

composer install

php artisan key:generate

php artisan migration

exit

npm install && npm run dev

Listo el proyecyto esta corriendo en el puerto 8000

http://localhost:8000


