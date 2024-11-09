# Cowork Reservations
Plataforma para gestionar reservas en espacios de coworking.

## Instalación

1. **Clonar el repositorio:**
   git clone https://github.com/Poxsoft/cowork-reservation.git
   cd cowork-reservations

2. **Instalar dependencias:**
    composer install
    npm install
    npm run dev

1. **Configurar entorno:**
    Copia .env.example a .env y configura la base de datos y otras credenciales.
    cp .env.example .env
    php artisan key:generate

4. **Crear la base de datos:**
    Crea una base de datos en MySQL y configura el archivo .env con los datos de conexión.

5. **Ejecutar migraciones y seeders:**
    php artisan migrate --seed

## Acceso de Administrador

Email: admin@example.com
Contraseña: password
