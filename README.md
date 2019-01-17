# symfony-price-hotel

## Getting Started

Install dependencies
```bash
composer install
```

Create .env file with :

```dotenv
DATABASE_URL=mysql://USERNAME:PASSWORD@127.0.0.1:PORT/DATABASE_NAME
```

Create database with the database name you want
```bash
php bin/console doctrine:database:create DATABASE_NAME
```

Make entity migration
```bash
php bin/console make:migration
```

Make migration to the database
```bash
php bin/console doctrine:migrations:migrate
```

Start the project
```bash
php bin/console server:run
```

### Create Entity

```bash
php bin/console make:entity
```

### Create Simple Controller

```bash
php bin/console make:controller
```

### Create CRUD Entity Controller

```bash
php bin/console make:crud
```

