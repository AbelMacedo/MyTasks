# MyTasks - Gestor de Tareas con Laravel

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<p align="center">
  <a href="#características">Características</a> •
  <a href="#requisitos">Requisitos</a> •
  <a href="#instalación">Instalación</a> •
  <a href="#uso">Uso</a> •
  <a href="#estructura">Estructura</a> •
  <a href="#licencia">Licencia</a>
</p>

---

## Descripción

**MyTasks** es una aplicación web moderna de gestión de tareas construida con Laravel 12. Permite a los usuarios crear, actualizar, completar y eliminar tareas de forma sencilla e intuitiva. Incluye autenticación de usuarios, validación de correo electrónico y recuperación de contraseña.

## Características

✨ **Autenticación Segura**
- Registro e inicio de sesión de usuarios
- Recuperación de contraseña con enlace de restablecimiento
- Validación de correo electrónico con código de verificación

📋 **Gestión de Tareas**
- Crear nuevas tareas con título, descripción y fecha de vencimiento
- Establecer prioridades (alta, media, baja)
- Marcar tareas como completadas o incompletas
- Editar y eliminar tareas existentes
- Visualizar historial de tareas completadas

👤 **Perfil de Usuario**
- Editar información del perfil
- Cambiar contraseña
- Cambiar dirección de correo electrónico
- Verificación segura de cambio de email

🎨 **Interfaz Intuitiva**
- Diseño moderno y responsivo
- Modal de tareas para mejora en la UX
- Estilos personalizados con CSS

## Requisitos

- PHP 8.2 o superior
- Composer
- MySQL
- Servidor web (Apache, Nginx o Laravel Sail)

## Instalación

### 1. Clonar el repositorio

```bash
git https://github.com/AbelMacedo/MyTasks.git
cd MyTasks
```

### 2. Instalar dependencias

```bash
composer install
```

### 3. Configurar el archivo `.env`

```bash
cp .env.example .env
php artisan key:generate
```

Edita el archivo `.env` con tus configuraciones:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mytasks
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=465
MAIL_USERNAME=tu_usuario
MAIL_PASSWORD=tu_contraseña
MAIL_FROM_ADDRESS=noreply@mytasks.com
```

### 4. Ejecutar migraciones

```bash
php artisan migrate
```

## Uso

### Iniciar el servidor

```bash
php artisan serve
```

La aplicación estará disponible en `http://localhost:8000`

### Crear cuenta

1. Dirígete a la página de registro
2. Completa el formulario con tu información
3. Verifica tu correo electrónico
4. Inicia sesión

### Gestionar tareas

- **Crear**: Haz clic en "Nueva tarea" y completa el formulario
- **Editar**: Haz clic en el icono de edición de la tarea
- **Completar**: Haz clic en el boton de completar tarea
- **Eliminar**: Haz clic en el icono de papelera
- **Ver completadas**: Accede a la sección de tareas completadas

## Estructura del Proyecto

```
MyTasks/
├── app/
│   ├── Http/Controllers/       # Controladores de la aplicación
│   ├── Mail/                   # Clases de correo electrónico
│   ├── Models/                 # Modelos Eloquent (Task, User)
│   └── Providers/              # Proveedores de servicios
├── database/
│   ├── migrations/             # Migraciones de base de datos
│   ├── factories/              # Factories para pruebas
│   └── seeders/                # Semillas de datos
├── resources/
│   ├── views/                  # Plantillas Blade
│   │   ├── auth/               # Vistas de autenticación
│   │   ├── tasks/              # Vistas de gestión de tareas
│   │   ├── users/              # Vistas de perfil de usuario
│   │   ├── email/              # Plantillas de correo
│   │   └── layouts/            # Layouts principales
│   ├── css/                    # Estilos personalizados
│   └── js/                     # Scripts de frontend
├── routes/
│   └── web.php                 # Rutas web
├── config/                     # Archivos de configuración
└── storage/                    # Archivos de aplicación y logs
```

## Modelos Principales

### User
- **Relación**: Un usuario tiene muchas tareas
- **Atributos**: name, email, password, email_verified_at

### Task
- **Relación**: Una tarea pertenece a un usuario
- **Atributos**: title, description, priority, due_date, completed, user_id

## Endpoints Principales

### Autenticación
- `GET /` - Página de login
- `POST /login/authenticate` - Autenticar usuario
- `GET /users/create` - Formulario de registro
- `POST /users` - Crear usuario
- `POST /logout` - Cerrar sesión

### Tareas
- `POST /tasks` - Crear tarea
- `GET /tasks/edit/{id}` - Editar tarea
- `POST /tasks/update/{id}` - Actualizar tarea
- `POST /tasks/destroy/{id}` - Eliminar tarea
- `POST /tasks/completed/{id}` - Marcar como completada
- `POST /tasks/incomplete/{id}` - Marcar como incompleta
- `GET /tasks/completed-tasks` - Ver tareas completadas

### Perfil de Usuario
- `GET /users/edit-profile` - Editar perfil
- `POST /users/update-profile` - Actualizar perfil

### Email
- `GET /email/change` - Cambiar correo
- `POST /email/update` - Actualizar correo
- `GET /email/verify` - Verificar correo
- `POST /email/validate` - Validar código de verificación

### Contraseña
- `GET /password/recover` - Recuperar contraseña
- `POST /password/send-recovery-email` - Enviar email de recuperación
- `GET /password/reset/{token}` - Formulario de restablecimiento
- `POST /password/update` - Actualizar contraseña

## Tecnologías Utilizadas

- **Backend**: Laravel 12, PHP 8.2
- **Frontend**: Blade, JavaScript
- **Base de Datos**: MySQL
- **Autenticación**: Laravel Auth
- **Validación**: Laravel Validation
- **Email**: SMTP (Mailtrap)
- **Estilos**: CSS Personalizado

## Testing

Ejecutar los tests:
```bash
php artisan test
```

## Desarrollo

Para trabajar en modo desarrollo con hot reload:

```bash
composer run dev
```

Este comando ejecuta simultáneamente:
- Servidor PHP
- Queue listener
- Pail (logs)
- Vite (hot reload)

## Contribuir

Las contribuciones son bienvenidas. Por favor:

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## Licencia

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
