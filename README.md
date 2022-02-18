
## Installation
```
docker-compose up -d
docker exec -it dance_club_php_1 /bin/bash
composer install
php init --env=Development --overwrite=All
```
Start server (defaults to http://127.0.0.1:20172/v1/swagger)

DESCRIPTION
-------------------
В ночной клуб приходят мальчики и девочки. Некоторые из них любят, могут или умеют танцевать. Каждый персонаж, пришедший в ночной клуб, может обладать разными навыками танцевать под разную музыку.

Когда играет Rnb на танцполе танцуют те, кто танцует хип-хоп, рнб. Когда играет Electrohouse на танцполе танцуют те, кто танцует Electrodance, house. Когда играет Поп-музыка танцуют те, кто умеет танцевать под поп-музыку. Если человек не умеет танцевать под данную музыку, он идет в бар и пьет водку.

Танцы представляют из себя движения телом, руками, ногами, головой. В разных танцах они задействованы по-разному:

в хип хопе покачивания телом вперед и назад, ноги в полу-присяде, руки согнуты в локтях, головой вперед-назад.
в электродэнс покачивание туловищем вперед-назад, почти нет движения головой, круговые движения - вращения руками, ноги двигаются в ритме.
в танцах под поп-музыку в основном плавные движения туловищем, руками, ногами и головой.
Необходимо эмулировать ночной клуб с произвольным количеством разных персонажей и с произвольным набором умений танцевать у каждого из них. В то время, когда они слышат музыку, персонажи должны соответствующим образом себя вести: танцевать или пить водку в баре.

Необходимо реализовать код, с помощью которого можно собрать в клуб определенную публику, и запустить определенный набор музыкальных композиций. Желательно, чтобы код был расширяем. Поведение персонажей (что происходит в клубе) следует выводить на экран текстом. Результат должен быть проверяемым: в любой момент времени должно быть понятно, какая музыка играет, и какой конкретно персонаж какие действия выполняет.

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
