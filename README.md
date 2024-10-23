<h1 align="center">Pulpoline Frontend 🚀✨</h1>

<p align="center">
  <a href="https://github.com/frfernandezdev/bff-poke-vault/actions/workflows/node.yml?branch=main"><img src="https://github.com/frfernandezdev/bff-poke-vault/actions/workflows/node.yml/badge.svg?branch=main" alt="nodejs"/></a>
  <a href="https://nodejs.org/docs/latest-v20.x/api/index.html"><img src="https://img.shields.io/badge/node-20.x-green.svg" alt="node"/></a>
</p>
<p align="center">
  <a href="https://starfish-app-leryq.ondigitalocean.app/" target="_blank"><strong>DEMO Pulpoline Frontend</strong></a>
</p>

## Technologies Used
- [Node.js](https://nodejs.org/docs/latest-v20.x/api/index.html): JavaScript runtime environment for backend.
- [PHP](https://www.php.net/): A popular general-purpose scripting language especially suited to web development.
- [Apache](https://httpd.apache.org/): A widely used web server software.

## Prerequisites

Before starting this epic adventure, make sure you have these technological superpowers at hand:

- [Node.js](https://nodejs.org/en/download/) 🌐: For all your JavaScript runtime needs.
- [Docker](https://docs.docker.com/get-docker/) 🐳: The container of your dreams.
- [Git](https://git-scm.com/downloads) 🧑‍💻: To keep everything under control with style.

## 🧑‍💻 Developing

The project is fully dockerized 🐳, if we want to start the app in **development mode**, we just need to run:

```bash
docker-compose up -d development
```

## ⚙️ Building

```bash
npm run build
```
## Deploy to Production

This project is automatically deployed to production using Koyeb. Every time a change is pushed to the main branch, Koyeb will build and deploy the latest version of the BFF to production. You can access the deployed application via the [Koyeb-generated URL](https://starfish-app-leryq.ondigitalocean.app/).
