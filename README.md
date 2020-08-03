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

- repo: [https://github.com/KnpLabs/KnpPaginatorBundle](https://github.com/KnpLabs/KnpPaginatorBundle)

- `composer require knplabs/knp-paginator-bundle`

## Add CRUD With Pagination and Without Form ([58f6525](https://github.com/ad3n/SymfonyBlog/commit/58f6525f9020229f607c112d78c49c455d0d5271))

## Prepare Form ([91a87b1](https://github.com/ad3n/SymfonyBlog/commit/91a87b1ba66793fe6c4032fc011c9f28994e5047))

- `composer req form`

## Add CRUD With Pagination and Form ([58e5ca2](https://github.com/ad3n/SymfonyBlog/commit/58e5ca21fd44c6dfee57b4b06e7bc5d8008204e9))

- Fix bug (missing) pagination link in list tamplate (`list.html.twig`)

## Prepare Validation ([871355a](https://github.com/ad3n/SymfonyBlog/commit/871355a5e142ddcf2db6f7f5c9bca61cce54dcbc))

- `composer req validation`

## Add Unique Name Validation ([efe2a6c](https://github.com/ad3n/SymfonyBlog/commit/efe2a6c7a9e4680c19d78ac35fb198b293ce1858))

## Prepare Datatables ([aa84810](https://github.com/ad3n/SymfonyBlog/commit/aa84810e9fd9fd5f29ee4493deba0cee8f4eaa9c))

- repo: [https://github.com/omines/datatables-bundle](https://github.com/omines/datatables-bundle)

- `composer require omines/datatables-bundle asset`

## Add List Datatables ([8e06ba3](https://github.com/ad3n/SymfonyBlog/commit/8e06ba335034fe91981104e89728a5471472e78b))

## Add Post Form ([6132a1e](https://github.com/ad3n/SymfonyBlog/commit/6132a1e8f62a50d51e542f67b5843d4f62d58844))

## Change datatables to traditional table ([52f8593](https://github.com/ad3n/SymfonyBlog/commit/52f8593cd7e00416fe5289098f8ca942ea02aa98))

## Create PostController ([551ff06](https://github.com/ad3n/SymfonyBlog/commit/551ff06f42cc24bfb7ba38d9397e5fa2e4625f68))

- Fix per page (limit)

## Implement List and Prepare all action (add, edit and delete) ([e0e8b21](https://github.com/ad3n/SymfonyBlog/commit/e0e8b2127bf5ec6f6e50d5f010913107354dd5b7))

## Prepare Post add action ([501a9c9](https://github.com/ad3n/SymfonyBlog/commit/501a9c93c1bb43f3ecb9998c06ade3fb9576dea4))

## Fix "Catchable Fatal Error: **Object of class App\Entity\Category could not be converted to string**" ([1871a3c](https://github.com/ad3n/SymfonyBlog/commit/1871a3c218224bfc3d9d589f69fe59c83c2142ea))

## Implement Post add action ([7291e4e](https://github.com/ad3n/SymfonyBlog/commit/7291e4e441d6800c90a901885e2b2e8c2e8e50ea))

- Fix wrong property in list

- Fix wrong property order in list

## Implement Post edit action ([78241cd](https://github.com/ad3n/SymfonyBlog/commit/78241cdae4ad02fc86027a05ad99698608465447))

## Implement Post delete action ([1a552b7](https://github.com/ad3n/SymfonyBlog/commit/1a552b7f831acf7a8eb52e3aad3c994dab07ff48))
