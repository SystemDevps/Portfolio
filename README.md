# 🚀 Sistema de Portafolio Profesional — Laravel 13

Sistema de portafolio profesional administrable, construido con **Laravel 13** siguiendo la **Arquitectura MVC**, con base de datos SQLite (configurable a MySQL) y un **panel administrativo completo** para gestionar cada apartado del portafolio.

Los datos del CV de **José Alberto Gómez Olivares** ya vienen precargados en la base de datos.

---

## 📋 Requisitos previos

- **PHP 8.2 o superior** (se recomienda PHP 8.3) con las extensiones: `mbstring`, `xml`, `curl`, `zip`, `sqlite3`, `gd`
- **Composer** (https://getcomposer.org/) — *solo si no se incluye la carpeta `vendor/`*
- (Opcional) **MySQL** si prefieres usar MySQL en lugar de SQLite

> ✅ Este proyecto ya incluye la carpeta `vendor/` y la base de datos SQLite con los datos cargados, por lo que **no necesitas ejecutar `composer install` ni migraciones**.

---

## ⚡ Instalación rápida (5 minutos)

### Opción A: Con `vendor/` incluido (recomendado)

```bash
# 1. Extraer el archivo zip
unzip portfolio-laravel.zip
cd portfolio-laravel

# 2. (Solo si no existe .env) Copiar configuración
cp .env.example .env

# 3. (Solo si APP_KEY está vacía) Generar clave de aplicación
php artisan key:generate

# 4. Iniciar el servidor de desarrollo
php artisan serve
```

Abre tu navegador en: **http://localhost:8000**

### Opción B: Sin `vendor/` (instalación desde cero)

```bash
cd portfolio-laravel
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --force
php artisan db:seed --force
php artisan serve
```

---

## 🔐 Acceso al Panel Administrativo

- **URL:** http://localhost:8000/admin/login
- **Email:** `admin@portfolio.com`
- **Contraseña:** `admin123`

> ⚠️ **Cambia la contraseña por defecto** desde el panel administrativo: inicia sesión y ve a **Cambiar Contraseña** en el menú lateral. También puedes cambiarla vía base de datos o ejecutando:
> ```bash
> php artisan tinker
> >>> $user = App\Models\User::where('email','admin@portfolio.com')->first();
> >>> $user->password = 'tu_nueva_contraseña'; // el cast "hashed" la encripta automáticamente
> >>> $user->save();
> ```

---

## 🗂️ Estructura del Proyecto (Arquitectura MVC)

```
portfolio-laravel/
├── app/
│   ├── Http/Controllers/
│   │   ├── PortfolioController.php      # Controlador público (MVC - Controller)
│   │   └── Admin/                       # Controladores del panel admin
│   │       ├── AuthController.php       # Login / Logout
│   │       ├── DashboardController.php  # Panel principal
│   │       ├── ProfileController.php    # Gestión del perfil
│   │       ├── PasswordController.php   # Cambio de contraseña del admin
│   │       ├── ExperienceController.php # CRUD experiencias
│   │       ├── EducationController.php  # CRUD educación
│   │       ├── SkillController.php      # CRUD habilidades
│   │       ├── ProjectController.php    # CRUD proyectos
│   │       └── MessageController.php    # Gestión de mensajes
│   └── Models/                          # Modelos Eloquent (MVC - Model)
│       ├── Profile.php
│       ├── Experience.php
│       ├── Education.php
│       ├── Skill.php
│       ├── Project.php
│       └── Message.php
├── database/
│   ├── migrations/                      # Migraciones de BD
│   ├── seeders/                         # Seeders con datos del CV
│   └── database.sqlite                  # Base de datos (ya poblada)
├── resources/views/                     # Vistas Blade (MVC - View)
│   ├── layouts/
│   │   ├── portfolio.blade.php          # Layout del sitio público
│   │   └── admin.blade.php              # Layout del panel admin
│   ├── portfolio/
│   │   └── index.blade.php              # Portafolio público (una sola página)
│   └── admin/                           # Vistas del panel administrativo
└── routes/
    └── web.php                          # Definición de rutas
```

---

## 📊 Base de Datos

El sistema usa **SQLite** por defecto (sin configuración adicional). Tablas:

| Tabla | Descripción |
|-------|-------------|
| `users` | Usuarios administradores (auth) |
| `profiles` | Datos personales y perfil profesional |
| `experiences` | Experiencia laboral |
| `education` | Educación y certificaciones |
| `skills` | Habilidades técnicas (con nivel y categoría) |
| `projects` | Proyectos destacados |
| `messages` | Mensajes recibidos desde el formulario de contacto |

### Cambiar a MySQL (opcional)

Edita el archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=tu_contraseña
```

Luego ejecuta:
```bash
php artisan migrate --force
php artisan db:seed --force
```

---

## 🎯 Funcionalidades del Panel Administrativo

| Módulo | Descripción |
|--------|-------------|
| **Dashboard** | Estadísticas generales y mensajes recientes |
| **Perfil** | Editar datos personales, biografía, contacto y enlaces |
| **Cambiar Contraseña** | Actualizar la contraseña del administrador desde el panel (con verificación de contraseña actual, mínimo 8 caracteres y confirmación) |
| **Experiencias** | CRUD completo de experiencia laboral |
| **Educación** | CRUD completo de educación y certificaciones |
| **Habilidades** | CRUD completo con nivel (0-100%) y categoría |
| **Proyectos** | CRUD completo de proyectos con tecnologías y enlaces |
| **Mensajes** | Ver, marcar como leídos y eliminar mensajes de contacto |

---

## 🌐 Rutas del Sistema

### Públicas
- `GET /` — Portafolio público
- `POST /contact` — Enviar mensaje de contacto

### Administrativas (requieren autenticación)
- `GET /admin/login` — Formulario de login
- `GET /admin/dashboard` — Panel principal
- `GET|PUT /admin/profile` — Editar perfil
- `GET|PUT /admin/password` — Cambiar contraseña del administrador
- `resource /admin/experiences` — CRUD experiencias
- `resource /admin/education` — CRUD educación
- `resource /admin/skills` — CRUD habilidades
- `resource /admin/projects` — CRUD proyectos
- `GET /admin/messages` — Lista de mensajes
- `GET /admin/messages/{id}` — Ver mensaje

---

## 🛠️ Comandos útiles

```bash
# Reiniciar base de datos con datos de ejemplo
php artisan migrate:fresh --seed

# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Ver rutas registradas
php artisan route:list

# Iniciar servidor en puerto específico
php artisan serve --port=8080
```

---

## 📝 Datos precargados del CV

- **Perfil:** José Alberto Gómez Olivares — Desarrollador Web Full Stack
- **4 Experiencias laborales** (SystemDevelopersCompany, Proessa, CFE, Giro de Legumbres)
- **8 Registros de educación** (UT Tecamachalco, Google Actívate, etc.)
- **22 Habilidades** (PHP, Laravel, MySQL, HTML5, CSS, JavaScript, Django, etc.)
- **3 Proyectos** destacados
- **1 Usuario administrador**

---

## 📄 Licencia

Proyecto de uso personal y educativo. Basado en Laravel (MIT License).
