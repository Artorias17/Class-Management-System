## Deployment Status

### Hosting Platform: Render

![Status](https://img.shields.io/website?url=https%3A%2F%2Fclass-management-system.onrender.com%2Fapi%2Fhealth-check&up_message=Deployed&up_color=brightgreen&down_message=Offline&down_color=red&style=for-the-badge&logo=render&label=Deployment_Status&cacheSeconds=3600)

## Overview

The Class Management System is a comprehensive educational management application built with modern web technologies:

* **Frontend**: Vue.js with Vue Router and Bootstrap for responsive UI
* **Backend**: Laravel RESTful API with Laravel Sanctum for authentication
* **Database**: Structure follows the schema diagram above
![Database Schema](database_schema.svg)


## Features

- [x] Basic CRUD operations
- [x] Authentication system
- [x] Role-based access control
- [x] Teacher registration

## Development Environment

### Prerequisites

- [Docker](https://www.docker.com/products/docker-desktop)
- [Visual Studio Code](https://code.visualstudio.com/)
- [Remote - Containers extension](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers)

### Setup

For consistent development environment across all machines, this project supports development with Visual Studio Code's devcontainer.

1. Clone the repository:
   ```bash
   git clone https://github.com/Artorias17/Class-Management-System.git
   ```

2. Open the project in VS Code:
   ```bash
   code Class-Management-System
   ```

3. When prompted, click "Reopen in Container" or use the command palette (F1) to select "Remote-Containers: Reopen in Container"

4. The devcontainer will automatically set up the environment, including:
   - PHP and required extensions
   - PostgreSQL Database Server
   - Composer
   - Node.js and npm
   - All project dependencies

5. Once inside the container, use the commands below to get started!

## Useful Commands

### Route Management

```bash
# Generate unique app key
php artisan key:generate

# Clear route cache
php artisan route:clear

# Regenerate and optimize routes
php artisan optimize

# Combination of the two commands above
php artisan optimize:clear

# List all available routes
php artisan route:list

# Run outstanding database migrations
php artisan migrate

# Run outstanding database migrations with seeding
php artisan migrate --seed

# Reset database migrations and seed from scratch
php artisan migrate:refresh --seed
```

### Development Workflow


```bash
# In one terminal run the PHP server
php artisan serve --host=0.0.0.0 --env=.env 

# In another terminal run webpack server by the following command:
# Watch for changes and hot reload
npm run watch

# Build for production
npm run prod
```

## Default Login Credentials

- **Email**: rr@admin.com
- **Password**: password

## License

[MIT](LICENSE)