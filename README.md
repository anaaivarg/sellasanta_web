#  SellaSanta

**Sistema de gestión digital para la cofradía de "La Llegada de Jesús al Calvario y Nuestra Señora del Perdón"**

> Proyecto de fin de ciclo — Ciclo Superior de Desarrollo de Aplicaciones Web (DAW) · 2025-2026  
> Autora: **Ana Aivar Gracia**

---

## Descripción

SellaSanta nace de una necesidad real: la cofradía controlaba la asistencia a los ensayos de Semana Santa con sellos en tarjetas de cartón, que con frecuencia se perdían, rompían o acababan en la lavadora, con un coste de 3 € por reposición.

Esta aplicación web sustituye ese sistema por una plataforma digital que centraliza la gestión de cofrades, eventos y asistencias. Los cofrades generan un código QR personalizado para cada ensayo, el administrador lo escanea y la asistencia queda registrada automáticamente.

---

##  Funcionalidades principales

- **Calendario de eventos** — visualización mensual con FullCalendar, con tipos de eventos diferenciados por color (ensayos, misas, procesiones, reuniones, actos)
- **Registro de asistencia por QR** — cada cofrade genera un código QR encriptado y con caducidad de 24 horas para cada ensayo
- **Gestión de cofrades** — CRUD completo con validación de DNI, asignación de sección, junta y atributo
- **Estadísticas de participación** — porcentaje de asistencia por cofrade y por ensayo
- **Control de acceso por roles** — área pública, área de cofrade autenticado y área de administración (Junta de Gobierno)
- **Páginas informativas públicas** — inicio, cofradía, noticias, Semana Santa y contacto

---

## 🛠️ Tecnologías

| Capa | Tecnología |
|---|---|
| Backend | PHP 8.2 · Laravel 12 · Laravel Breeze |
| Frontend | Blade · Tailwind CSS 3 · FullCalendar 6 · SweetAlert2 · Font Awesome |
| Base de datos | MySQL 8.0 |
| QR | SimpleSoftwareIO/simple-qrcode |
| Herramientas | PhpStorm · Composer · NPM · GitHub · phpMyAdmin |

---

## ⚙️ Instalación

### Requisitos previos

- PHP ≥ 8.2
- Composer
- Node.js y NPM
- MySQL 8.0

### Pasos

```bash
# 1. Clonar el repositorio
git clone https://github.com/anaaivarg/sellasanta_web.git
cd sellasanta_web

# 2. Instalar dependencias PHP
composer install

# 3. Instalar dependencias JavaScript y compilar assets
npm install && npm run build

# 4. Configurar el entorno
cp .env.example .env
php artisan key:generate

# 5. Configurar la base de datos en .env
# DB_DATABASE=sellasanta
# DB_USERNAME=tu_usuario
# DB_PASSWORD=tu_contraseña

# 6. Ejecutar migraciones
php artisan migrate

# 7. Arrancar el servidor
php artisan serve
```

La aplicación estará disponible en `http://localhost:8000`.

---

##  Roles de usuario

| Rol | Acceso | Capacidades |
|---|---|---|
| **Público** | Sin login | Páginas informativas (inicio, cofradía, noticias, contacto) |
| **Cofrade** | Login requerido | Ver calendario, generar QR de asistencia, ver sus estadísticas |
| **Administrador** | Cargo en Junta (Hermano Mayor, Secretario o Delegado) | Todo lo anterior + CRUD de cofrades, CRUD de eventos, control de asistencias global |

> La distinción entre cofrade y administrador se gestiona mediante el cargo asignado en la Junta de Gobierno, sin necesidad de un campo "rol" adicional.

---

##  Estructura del proyecto

```
sellasanta_web/
├── app/
│   ├── Http/
│   │   ├── Controllers/        # EventoController, UsuarioController, AsistenciaController...
│   │   └── Middleware/         # AdminMiddleware (control de acceso por cargo)
│   └── Models/                 # Usuario, Evento, Instrumento, Gobierno, Atributo
├── database/
│   └── migrations/             # Estructura de la base de datos
├── resources/
│   └── views/                  # Vistas Blade (eventos, asistencias, usuarios, auth...)
└── routes/
    └── web.php                 # Definición de rutas y niveles de acceso
```

---

##  Licencia

Proyecto académico de uso educativo. Todos los derechos reservados © Ana Aivar Gracia, 2025.
