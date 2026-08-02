<div align="center">

# 📝 To-Do List

### Aplicación web para gestión de tareas, categorías y etiquetas

Construida con **Laravel 12** siguiendo el patrón **MVC**, vistas **Blade** y estilos con **Tailwind CSS v4**.

</div>

---

## 📖 Descripción

Aplicación web integral para la gestión de tareas personales. Permite **crear, listar, ver, editar y eliminar** tareas, organizarlas por **categorías** y clasificarlas con **múltiples etiquetas**. Diseñada sin sistema de autenticación (se contempla como fase futura) y totalmente **responsive** para uso en escritorio y dispositivos móviles.

## ✨ Características

| Módulo              | Funcionalidad                                                                                         |
| ------------------- | ----------------------------------------------------------------------------------------------------- |
| 🗂️ **Tareas**       | CRUD completo · título, descripción, categoría, etiquetas múltiples y estado (pendiente / completada) |
| 📁 **Categorías**   | CRUD completo · organiza tus tareas por área o proyecto                                               |
| 🏷️ **Etiquetas**    | CRUD completo · clasifica tareas con múltiples tags                                                   |
| 📱 **Responsive**   | Interfaz adaptada a móvil, tablet y escritorio                                                        |
| ✅ **Validaciones** | Formularios con validación de datos en servidor                                                       |
| 🎨 **UI moderna**   | Tailwind CSS v4 con gradientes, iconos SVG y componentes reutilizables                                |

## 🛠️ Stack Tecnológico

- **Backend:** Laravel 12 (PHP 8.2)
- **Frontend:** Blade Templates + Tailwind CSS v4
- **Base de datos:** MySQL (vía XAMPP)
- **Bundler:** Vite
- **Arquitectura:** MVC (Modelo - Vista - Controlador)

## 📋 Requisitos previos

- [XAMPP](https://www.apachefriends.org/) (PHP ≥ 8.2 y MySQL)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) y npm

## 🚀 Instalación

**1. Clonar el repositorio dentro de `htdocs`**

```bash
cd C:/xampp/htdocs
git clone https://github.com/tu-usuario/todolist.git
cd todolist
```

**2. Instalar dependencias de PHP**

```bash
composer install
```

**3. Instalar dependencias de Node**

```bash
npm install
```

**4. Configurar variables de entorno**

```bash
cp .env.example .env
php artisan key:generate
```

Edita el archivo `.env` con los datos de conexión de tu base de datos local (host, puerto, nombre de la BD, usuario y contraseña).

**5. Crear la base de datos**

Desde XAMPP, abre `phpMyAdmin` y crea una base de datos llamada `todolist_db`.

**6. Ejecutar las migraciones**

```bash
php artisan migrate
```

_(Opcional) Poblar con datos de ejemplo:_

```bash
php artisan db:seed
```

## ▶️ Uso

Necesitas **dos terminales abiertas simultáneamente**:

**Terminal 1 — Compilar los assets (Tailwind/Vite):**

```bash
npm run dev
```

**Terminal 2 — Levantar el servidor de Laravel:**

```bash
php artisan serve
```

Abre tu navegador en:

```
http://127.0.0.1:8000
```

> 💡 Para producción, corre `npm run build` una vez y ya no necesitas dejar `npm run dev` corriendo.

## 🗂️ Estructura del proyecto

```
todolist/
├── app/
│   ├── Http/Controllers/
│   │   ├── TaskController.php
│   │   ├── CategoryController.php
│   │   └── TagController.php
│   └── Models/
│       ├── Task.php
│       ├── Category.php
│       └── Tag.php
├── database/
│   └── migrations/
│       ├── ..._create_categories_table.php
│       ├── ..._create_tags_table.php
│       ├── ..._create_tasks_table.php
│       └── ..._create_task_tag_table.php
├── resources/
│   ├── views/
│   │   ├── layouts/app.blade.php
│   │   ├── components/form-errors.blade.php
│   │   ├── tasks/
│   │   ├── categories/
│   │   └── tags/
│   └── css/app.css
└── routes/
    └── web.php
```

## 🧩 Modelo de datos

```
┌─────────────┐        ┌─────────────┐        ┌─────────────┐
│  Category   │        │    Task     │        │     Tag     │
├─────────────┤        ├─────────────┤        ├─────────────┤
│ id          │◄──────┐│ id          │┌──────►│ id          │
│ name        │  1:N   │ title       ││  N:N   │ name        │
└─────────────┘        │ description ││        └─────────────┘
                        │ status      ││
                        │ category_id ││        ┌─────────────┐
                        └─────────────┘└───────►│  task_tag   │
                                                 │ task_id     │
                                                 │ tag_id      │
                                                 └─────────────┘
```

- Una **Task** pertenece a una **Category** (`belongsTo`)
- Una **Category** tiene muchas **Tasks** (`hasMany`)
- Una **Task** tiene muchas **Tags**, y una **Tag** puede estar en muchas **Tasks** (`belongsToMany`, relación N:N vía tabla pivote `task_tag`)

## 🗺️ Rutas principales

| Método         | Ruta                     | Acción                               |
| -------------- | ------------------------ | ------------------------------------ |
| GET            | `/`                      | Página principal (listado de tareas) |
| GET/POST       | `/tasks`                 | Listar / crear tareas                |
| GET/PUT/DELETE | `/tasks/{task}`          | Ver / editar / eliminar tarea        |
| GET/POST       | `/categories`            | Listar / crear categorías            |
| GET/PUT/DELETE | `/categories/{category}` | Ver / editar / eliminar categoría    |
| GET/POST       | `/tags`                  | Listar / crear etiquetas             |
| GET/PUT/DELETE | `/tags/{tag}`            | Ver / editar / eliminar etiqueta     |

Ver el listado completo con:

```bash
php artisan route:list
```

## 🗺️ Roadmap

- [ ] Autenticación de usuarios (login / registro)
- [ ] Filtros y búsqueda de tareas
- [ ] Fechas límite y recordatorios
- [ ] Modo oscuro

## 📄 Licencia

Este proyecto es de uso académico / personal.

---

<div align="center">

Hecho con ☕ y Laravel

</div>
