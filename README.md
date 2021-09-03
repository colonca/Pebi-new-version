## 🚀 Environment Setup

### 🐳 Needed tools

1. [Install Docker](https://www.docker.com/get-started)
2. [Install Docker-Compose](https://www.docker.com/get-started)
2. Clone this project: `git clone https://github.com/colonca/Pebi-new-version`
3. Move to the project folder: `cd Pebi-new-version`

### 🛠️ Environment configuration

1. renombrar el archivo de configuracion de ejemplo (`mv .env.examples .env`).

2. Inicializar el contenedor de docker.

```bash
docker-compose up -d
```

3. Abrir el contenedor de la aplicación en el modo iterativo.

```bash
docker exec -ti pebi-app bashdocker-compose up -d
```

4. Instalación de dependencias, crear key y correr las migraciones.

```bash
composer install
php artisan key:generate
php artisan migration
```

5. salir del modo iterativo

```bash
exit
```

6. Instalar las dependencias de javascript

```bash
npm install
npm run dev
```

