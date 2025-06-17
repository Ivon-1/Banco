# Gestión Banco

Aplicación web para la gestión de cuentas bancarias y movimientos (ingresos y retiradas) desarrollada en Laravel.

## Características
- Gestión de cuentas bancarias (alta, listado)
- Registro de movimientos: ingresos y retiradas
- Visualización de movimientos por cuenta
- Validación de saldo y operaciones seguras

## Requisitos
- PHP >= 8.0
- Composer
- MySQL o SQLite
- Node.js y npm (para assets front-end)

## Instalación
1. Clona el repositorio:
   ```bash
   git clone https://github.com/tu-usuario/banco.git
   cd banco
   ```
2. Instala dependencias PHP:
   ```bash
   composer install
   ```
3. Instala dependencias front-end:
   ```bash
   npm install && npm run build
   ```
4. Copia el archivo de entorno y configura tus variables:
   ```bash
   cp .env.example .env
   # Edita .env con tus datos de base de datos
   ```
5. Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```
6. Ejecuta las migraciones:
   ```bash
   php artisan migrate
   ```
7. (Opcional) Si quieres datos de prueba:
   ```bash
   php artisan db:seed
   ```
8. Inicia el servidor:
   ```bash
   php artisan serve
   ```

## Uso básico
- Accede a `/cuentas` para ver y crear cuentas.
- Accede a los movimientos de cada cuenta para registrar ingresos o retiradas.

## Licencia
Este proyecto está bajo la licencia MIT.
