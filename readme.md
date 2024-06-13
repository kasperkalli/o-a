# Prueba de Programación Web - Laravel

## Descripción

Este es un proyecto sencillo de prueba de programación web construido usando Laravel, un poderoso framework de PHP para el desarrollo web. El proyecto demuestra funcionalidades básicas, incluyendo operaciones CRUD (Crear, Leer, Actualizar, Eliminar), autenticación de usuarios y enrutamiento básico.

## Requisitos Previos

Antes de comenzar, asegúrate de cumplir con los siguientes requisitos:
- PHP >= 7.3.8
- Composer
- Laravel 8.x
- MySQL u otra base de datos soportada por Laravel

## Instalación

Sigue estos pasos para configurar y ejecutar el proyecto localmente.

### 1. Clonar el Repositorio

```bash
git clone https://github.com/tu-usuario/tu-repo.git
cd tu-repo
```


### 2. Configurar Variables de Entorno

Copia el archivo `.env.example` a `.env` y actualiza las variables de entorno necesarias.

```bash
cp .env.example .env
```

Actualiza tu archivo `.env` con la configuración de tu base de datos y otros ajustes necesarios.

### 3. Generar la Clave de la Aplicación

```bash
php artisan key:generate
```

### 4. Ejecutar Migraciones y Poblar la Base de Datos

```bash
php artisan migrate --seed
```

### 5. Servir la Aplicación

```bash
php artisan serve
```

### Autenticación

Los usuarios pueden registrarse e iniciar sesión para acceder a rutas protegidas. El sistema de autenticación está construido usando las características de autenticación integradas de Laravel.

### Operaciones CRUD

El proyecto incluye una interfaz CRUD sencilla para gestionar items. Los usuarios pueden crear, ver, editar y eliminar items.

