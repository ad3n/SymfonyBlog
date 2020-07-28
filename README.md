# Symfony Blog

## Instal Kebutuhan Awal ([70137ee](https://github.com/ad3n/SymfonyBlog/commit/70137ee65c9d3fae4e524e9242d7019df9a3934a))

- `composer req orm profiler orm-fixtures maker logger`

## Edit `.env` ([b1b677e](https://github.com/ad3n/SymfonyBlog/commit/b1b677eec9d764857b5c8da35014862c4f5e29c6))

## Add Category and Post Entity ([d5c5be2](https://github.com/ad3n/SymfonyBlog/commit/d5c5be275153a2769cd80f6d15b5107ed5026cc4))

- `php bin/console make:entity`

## Create Database and Update Schema

- `php bin/console doctrine:database:create`

- `php bin/console doctrine:schema:update --force`

## Add CRUD Without Pagination and Form ([5ca45c8](https://github.com/ad3n/SymfonyBlog/commit/5ca45c8e16e23d64901fcd0d1d861efac62cad5a))

## Prepare Pagination ([5ca45c8](https://github.com/ad3n/SymfonyBlog/commit/5ca45c8e16e23d64901fcd0d1d861efac62cad5a))

- repo: https://github.com/KnpLabs/KnpPaginatorBundle

- `composer require knplabs/knp-paginator-bundle`

## Add CRUD With Pagination and Without Form ([58f6525](https://github.com/ad3n/SymfonyBlog/commit/58f6525f9020229f607c112d78c49c455d0d5271))

## Prepare Form ([91a87b1](https://github.com/ad3n/SymfonyBlog/commit/91a87b1ba66793fe6c4032fc011c9f28994e5047))

- `composer req form`

## Add CRUD With Pagination and Form ([58e5ca2](https://github.com/ad3n/SymfonyBlog/commit/58e5ca21fd44c6dfee57b4b06e7bc5d8008204e9))

- Fix bug (missing) pagination link in list tamplate (`list.html.twig`)
