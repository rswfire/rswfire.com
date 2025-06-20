# @rswfire > Setup

[![PHP](https://img.shields.io/badge/PHP-8.3.6-blue)](https://php.net)
[![Laravel](https://img.shields.io/badge/Laravel-12.9.2-blueviolet)](https://laravel.com)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-orange)](https://mysql.com)
[![Developer](https://img.shields.io/badge/Creator-@rswfire-red)](https://github.com/rswfire)
[![Documentation](https://img.shields.io/badge/Documentation-lightgrey)](/docs/readme.md)

This guide documents how to set up `rswfire.com` on a fresh machine using WSL2 (Ubuntu 22.04). It assumes you are **not using Laravel Sail** and prefer a manual setup with full control.

---

## 🚀 Overview

- Laravel app served with **nginx** and **PHP-FPM**
- **Node.js** + **Vite** for frontend
- HTTPS via **mkcert**
- Git + GPG + SSH configured for **signed commits**
- Docker used **only for deployment parity**, not local dev

---

## 1. Prerequisites

### Windows

- [WSL2 + Ubuntu 22.04](https://learn.microsoft.com/en-us/windows/wsl/install)
- Docker Desktop installed + WSL integration enabled (for future needs)
- mkcert (installed on Windows _and_ WSL)
- PHPStorm or VSCode

### Ubuntu (WSL2)

```bash
sudo apt update && sudo apt upgrade -y
sudo apt install php php-cli php-fpm php-mbstring php-xml php-curl php-zip php-mysql \
    unzip curl git nginx nodejs npm composer gnupg lsb-release ca-certificates -y
```

---

## 2. Clone the Repo

```bash
mkdir -p ~/www && cd ~/www
git clone git@github.com:rswfire/rswfire.com.git
cd rswfire.com
```

---

## 3. Set Up Environment

### Create `.env`

```bash
cp .env.example .env
nano .env
```

- Set `APP_URL=https://rswfire.local`
- Ensure `DB_*` values point to remote database (or your local DB setup)
- Wrap complex values in quotes

### Generate App Key

```bash
php artisan key:generate
```

---

## 4. Install Dependencies

```bash
composer install
npm install
```

---

## 5. mkcert for HTTPS

### On Windows

Install mkcert and run:

```powershell
choco install mkcert
mkcert -install
mkcert rswfire.local
```

### On WSL

Place the certs somewhere accessible (e.g. `/etc/nginx/certs/`) and ensure nginx can read them.

```bash
sudo mkdir -p /etc/nginx/certs
sudo cp ~/path/to/rswfire.local.pem /etc/nginx/certs/
sudo cp ~/path/to/rswfire.local-key.pem /etc/nginx/certs/
```

---

## 6. Configure NGINX

Create an nginx site config in `/etc/nginx/sites-available/rswfire.local`:

```
server {
    listen 80;
    server_name rswfire.local;
    return 301 https://$host$request_uri;
}
server {
    listen 443 ssl;
    server_name rswfire.local;

    ssl_certificate /etc/nginx/certs/rswfire.local.pem;
    ssl_certificate_key /etc/nginx/certs/rswfire.local-key.pem;

    root /home/rswfire/www/rswfire.com/public;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

Enable and test it:

```bash
sudo ln -s /etc/nginx/sites-available/rswfire.local /etc/nginx/sites-enabled/
sudo nginx -t && sudo systemctl restart nginx
```

### Add hosts entry (on Windows)

Edit `C:\Windows\System32\drivers\etc\hosts` and add:

```
127.0.0.1 rswfire.local
```

---

## 7. Git & GPG

Copy over your SSH and GPG keys:

```bash
mkdir ~/.ssh && chmod 700 ~/.ssh
# Copy your SSH key files here and add via `ssh-add`

gpg --import rsw-gpg-private.asc
git config --global user.name "Robert Samuel White"
git config --global user.email "rsw@rswfire.online"
git config --global commit.gpgsign true
git config --global user.signingkey 88A6213B73E2B0AC
```

Add this to `~/.ssh/config`:

```bash
Host github.com
  HostName github.com
  User git
  IdentityFile ~/.ssh/rswfire
  IdentitiesOnly yes
```

And make sure you have this in your `~/.bashrc` somewhere:

```bash
if ! pgrep -u "$USER" ssh-agent > /dev/null; then
  eval "$(ssh-agent -s)" >/dev/null
  ssh-add ~/.ssh/rswfire 2>/dev/null
fi
```

Test commit signing:

```bash
git commit --allow-empty -m "Test Signed Commit"
git log --show-signature -1
```

### Git Integration with PhpStorm (WSL)

PhpStorm cannot directly use Git from WSL when relying on SSH keys and GPG signing inside the WSL environment. To work around this, use a custom Git wrapper script.

#### Step 1: Create the Git Wrapper Script

Open a terminal in WSL and run: ```sudo nano /usr/local/bin/git-wsl-wrapper.sh```

Paste the following content:
```bash
#!/bin/bash

# Start ssh-agent if not already running
if [ -z "$SSH_AUTH_SOCK" ]; then
    eval "$(ssh-agent -s 2>/dev/null)" >/dev/null
    ssh-add ~/.ssh/rswfire 2>/dev/null
fi

# Delegate to actual Git binary
exec /usr/bin/git "$@"
```

Make it executable:
```sudo chmod +x /usr/local/bin/git-wsl-wrapper.sh```

#### Step 2: Configure PhpStorm to Use the Script
1. Go to Settings > Version Control > Git
2. Set the Path to Git executable to:```\\wsl$\Ubuntu\usr\local\bin\git-wsl-wrapper.sh```
3. Click Test — it should return your Git version (e.g. git version 2.34.1)

## 8. Run Laravel Locally

```bash
php artisan config:clear
php artisan view:clear

# Frontend dev server
npm run dev

# Or build for production
npm run build
```

Visit [https://rswfire.local](https://rswfire.local)

---

## ✅ Done

You’re now fully set up for local development without Sail.

---
[dotenv.md](/docs/dotenv.md) |
[readme.md](/docs/readme.md) |
setup.md
