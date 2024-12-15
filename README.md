# Raadfxrd's Next Gen Portfolio

![Thumbnail](/src/assets/img/thumbnail.png)
![Project Thumbnail](https://raw.githubusercontent.com/Raadfxrd/Portfolio/refs/heads/main/src/assets/img/raadfxrd.jpeg)

This repository contains the source code for Raadfxrd's next-generation portfolio. The portfolio is built using Vue 3 and Vite, showcasing various projects, skills, and personal information.

## Table of Contents

- [Recommended IDE Setup](#recommended-ide-setup)
- [Type Support for `.vue` Imports in TS](#type-support-for-vue-imports-in-ts)
- [Customize Configuration](#customize-configuration)
- [Project Setup](#project-setup)
- [Folder Structure](#folder-structure)
- [References | Credits](#credits)
- [Scripts](#scripts)

## Recommended IDE Setup

[VSCode](https://code.visualstudio.com/) + [Volar](https://marketplace.visualstudio.com/items?itemName=Vue.volar) (and disable Vetur).

## Type Support for `.vue` Imports in TS

TypeScript cannot handle type information for `.vue` imports by default, so we replace the `tsc` CLI with `vue-tsc` for type checking. In editors, we need [Volar](https://marketplace.visualstudio.com/items?itemName=Vue.volar) to make the TypeScript language service aware of `.vue` types.

## Customize Configuration

See [Vite Configuration Reference](https://vite.dev/config/).

## Project Setup

`npm install`

## Compile and Hot-Reload for Development

`npm run dev`

## Type-Check, Compile and Minify for production

`npm run build`

## Lint with ESLint

`npm run lint`

## Folder structure

```
.DS_Store
.editorconfig
.gitignore
.prettierrc.json
.vscode/
├── extensions.json
├── settings.json
composer.json
composer.lock
env.d.ts
eslint.config.js
index.html
package.json
public/
README.md
src/
├── .DS_Store
├── App.vue
├── assets/
│   ├── img/
│   ├── main.css
│   └── reset.css
├── composables/
│   ├── useGreeting.ts
│   ├── useRotatingTitles.ts
│   └── useTechStack.ts
├── main.ts
├── pages/
│   ├── Home/
│   ├── Components/
│   │   ├── WelcomeComponent.vue
│   │   ├── TechStack.vue
│   ├── About/
│   │   ├── AboutSection.vue
├── sendEmail.php
└── shims-vue.d.ts
tsconfig.app.json
tsconfig.json
tsconfig.node.json
vendor/
├── autoload.php
├── composer/
├── graham-campbell/
├── phpmailer/
├── phpoption/
├── symfony/
└── vlucas/
vite.config.ts
```

## Credits

Big thanks to: [Vineeth TR](https://cssloaders.github.io/) for the loader <3

## Scripts

- `npm install`: Install project dependencies.
- `npm run dev`: Compile and hot-reload for development.
- `npm run build`: Type-check, compile, and minify for production.
- `npm run lint`: Lint the project with ESLint.
