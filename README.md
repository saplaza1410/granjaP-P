# GranjaP-P

**Sistema de gestión integral para finca avícola**

[![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?logo=php&logoColor=white)](https://php.net)
[![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?logo=laravel&logoColor=white)](https://laravel.com)
[![Filament](https://img.shields.io/badge/Filament-5-fdae4b)](https://filamentphp.com)
[![License](https://img.shields.io/badge/Licencia-MIT-22c55e)](LICENSE)

GranjaP-P es una aplicación web para la gestión integral de una finca avícola. Permite administrar actividades, transacciones, inventario, zonas y pedidos desde un panel de administración moderno, y ofrece una tienda pública para la venta directa de productos a clientes.

---

## Capturas de pantalla

> *Próximamente — añade capturas del panel y la tienda aquí*

---

## Características

### Panel de Administración (Filament)

- **Actividades** — registro y seguimiento de tareas de la granja
- **Transacciones** — control de ingresos y egresos con exportación
- **Inventario** — ítems y movimientos de stock en tiempo real
- **Zonas** — gestión de áreas físicas de la finca
- **Pedidos** — visualización y seguimiento de pedidos de la tienda
- **Productos** — catálogo de productos disponibles para venta
- **Usuarios** — gestión de accesos por roles
- **Dashboard** — gráficas de ingresos/egresos, proyección anual e inventario
- **Páginas especiales** — plano de construcción, plan de negocio y manuales de aves y producción

### Tienda Pública (`/tienda`)

- Catálogo de productos con productos destacados en portada
- Carrito de compras persistente en sesión
- Proceso de checkout y confirmación de pedido

---

## Stack Tecnológico

| Tecnología | Versión | Uso |
|---|---|---|
| PHP | 8.3+ | Lenguaje backend |
| Laravel | 13 | Framework principal |
| Filament | 5 | Panel de administración |
| Vite | — | Compilación de assets frontend |
| SQLite | — | Base de datos (desarrollo) |

---

## Instalación

### Requisitos previos

- PHP >= 8.3 con extensiones `pdo_sqlite`, `mbstring`, `xml`
- [Composer](https://getcomposer.org)
- Node.js >= 18

### Pasos

```bash
git clone https://github.com/saplaza1410/granjaP-P.git
cd granjaP-P
composer run setup
```

El comando `setup` automatiza:
1. Instalación de dependencias PHP (`composer install`)
2. Copia de `.env.example` → `.env` y generación de `APP_KEY`
3. Ejecución de migraciones
4. Instalación de dependencias JS y compilación de assets

### Iniciar el servidor de desarrollo

```bash
composer run dev
```

Levanta en paralelo: servidor PHP, queue worker, logger (Pail) y Vite.

### Crear el primer usuario administrador

```bash
php artisan make:filament-user
```

### Acceso

| Ruta | Descripción |
|---|---|
| `http://localhost:8000` | Portada y tienda pública |
| `http://localhost:8000/admin` | Panel de administración |

---

## Estructura del Proyecto

```
app/
├── Enums/               # Tipos enumerados (roles, tipos de transacción…)
├── Filament/
│   ├── Pages/           # Páginas personalizadas del panel
│   ├── Resources/       # Recursos CRUD de cada módulo
│   └── Widgets/         # Gráficas y estadísticas del dashboard
├── Http/Controllers/    # Controladores de la tienda pública
├── Models/              # Modelos Eloquent
└── Policies/            # Autorización por rol
database/
└── migrations/          # Esquema de la base de datos
resources/views/
├── filament/            # Vistas personalizadas del panel
└── shop/                # Vistas de la tienda pública
```

---

## Licencia

Distribuido bajo la licencia [MIT](LICENSE).
