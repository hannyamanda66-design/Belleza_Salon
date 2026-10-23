# Belleza Salon

A salon management web app (PHP + MySQL) packaged with Docker.
Main feature: manage customer data (view, add, delete).

## Prerequisites
- Docker Desktop (tested with Docker 28.5.1, Compose v2)
- Git

## How to Run
1. Clone the repository:
```
   git clone https://github.com/hannyamanda66-design/Belleza_Salon.git
   cd Belleza_Salon
   git checkout chore/dockerize-project
```
2. Prepare the environment file:
```
   copy .env.example .env   (Windows)
   cp .env.example .env     (Mac/Linux)
```
   Then edit the passwords in `.env` as you like.
3. Build and start:
```
   docker compose up --build -d
```

## Access
- URL: http://localhost:8080
- Host port: 8080, container port: 80
- The host port can be changed via `APP_PORT` in `.env`

## Environment Variables
See `.env.example`: `APP_PORT`, `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`, `DB_ROOT_PASSWORD`

## Verification
1. `docker compose ps` -> `app` is "Up", `db` is "healthy"
2. Open http://localhost:8080 -> the customer list is displayed
3. Click "Add New Queen" and add a record -> it appears in the list

## Logs and Status
```
docker compose ps
docker compose logs
docker compose logs -f app
```

## Stop and Clean Up
```
docker compose down        (stop containers, database data is kept)
docker compose down -v     (stop containers and delete database data)
```

## Troubleshooting
- `Table 'Customer' doesn't exist`: MySQL on Linux is case-sensitive. This is handled with `lower_case_table_names=1`. Run `docker compose down -v`, then start again.
- Port 8080 is already in use: change `APP_PORT` in `.env`.
- Turn off XAMPP (Apache/MySQL) while running Docker.
- Empty tables: `db/belleza_salon.sql` is only imported when the database volume is first created; use `docker compose down -v`.

## Known Limitations
- Initial data comes from `db/belleza_salon.sql`.
- The `lower_case_table_names` option only takes effect on a new database.

## How It Works
- The `app` service connects to the database through the service name `db`, not `localhost`.
- The `app` service only starts after `db` reports a healthy status (healthcheck).
- MySQL data is stored in the `db-data` volume, so it is not lost when containers restart.
- The `lower_case_table_names=1` option is used because MySQL on Linux treats table names as case-sensitive.