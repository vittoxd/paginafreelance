# Despliegue de Kodex Studio en Railway

El proyecto ya está preparado para Railway:
- `nixpacks.toml` define build (PHP + Node, composer, `npm run build`) y arranque (migra + cachea + sirve).
- `pdo_pgsql` está declarado como requisito (Railway lo instalará).
- Los assets compilados (`public/build`) van versionados como respaldo.

---

## Opción A — Dashboard (recomendada, sin instalar nada)

1. Entra a https://railway.app e inicia sesión con GitHub.
2. **New Project → Deploy from GitHub repo →** elige `vittoxd/paginafreelance`.
3. En el proyecto: **New → Database → Add PostgreSQL**.
4. Abre el servicio de la app → pestaña **Variables** y agrega:

```
APP_NAME=Kodex Studio
APP_ENV=production
APP_KEY=base64:UszHLIeGAavgHOD+xA9HFxPflANNMEQI9a4dI2WTpos=
APP_DEBUG=false
APP_URL=https://TU-DOMINIO.up.railway.app
LOG_CHANNEL=stderr

DB_CONNECTION=pgsql
DB_HOST=${{Postgres.PGHOST}}
DB_PORT=${{Postgres.PGPORT}}
DB_DATABASE=${{Postgres.PGDATABASE}}
DB_USERNAME=${{Postgres.PGUSER}}
DB_PASSWORD=${{Postgres.PGPASSWORD}}

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
FILESYSTEM_DISK=local
```

> Las referencias `${{Postgres.PGHOST}}` conectan automáticamente con la base PostgreSQL del proyecto.

5. Pestaña **Settings → Networking → Generate Domain**. Copia la URL y ponla en `APP_URL` (paso 4).
6. Railway construye y despliega solo. Las **migraciones corren automáticamente** al arrancar.
7. **Una sola vez**, para crear el usuario admin y el contenido de ejemplo: en el servicio, abre la terminal/Command y ejecuta:

```
php artisan db:seed --class=DemoSeeder --force
```

Listo. Tu sitio queda en la URL generada, y el panel en `/admin` (admin@demo.com / password — cámbiala).

---

## Opción B — Railway CLI (si prefieres terminal)

```bash
npm i -g @railway/cli
railway login                # abre el navegador para autenticarte
railway init                 # o: railway link  (si ya creaste el proyecto)
railway add --database postgres
# Configura las mismas variables de arriba (railway variables set KEY=VALUE)
railway up                   # despliega
railway run php artisan db:seed --class=DemoSeeder --force   # seed una vez
```

---

## Notas
- Las **imágenes subidas** a proyectos no persisten entre despliegues (filesystem efímero). Para producción real, conviene un disco S3 (lo configuramos cuando quieras).
- `php artisan serve` es suficiente para tráfico bajo; si crece, migramos a Nginx/Octane.
- Si un deploy falla por `pdo_pgsql`, verifica que la variable `DB_CONNECTION=pgsql` esté puesta.
