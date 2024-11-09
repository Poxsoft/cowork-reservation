# Cowork Reservations
Plataforma para gestionar reservas en espacios de coworking.

## Instalación

1. **Clonar el repositorio:**
   - git clone https://github.com/Poxsoft/cowork-reservation.git
   - cd cowork-reservation

2. **Instalar dependencias:**
    - composer install
    - npm install
    - npm run build

3. **Configurar entorno:**
    - Copia .env.example a .env, asigna permisos y configura la base de datos y otras credenciales.
    - cp .env.example .env
    - chmod 777 .env 
    - php artisan key:generate

4. **Asignar permisos**
    - chmod -R 777 storage 

5. **Crear la base de datos:**
    - Crea una base de datos en MySQL y configura el archivo .env con los datos de conexión.

6. **Ejecutar migraciones y seeders:**
    - php artisan migrate --seed

7. **Correr aplicación**
    - npm run dev

## Acceso de Administrador

- Email: admin@example.com
- Contraseña: password
