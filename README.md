# Bitrix-модуль: отдача данных из инфоблока через API

Данный модуль позволяет обращаться по эндпоинтам GET-запросом, и получать заранее подготовленные данные из инфоблоков, реализуя собственный REST, используя контроллеры Битрикс. Таким образом, Битрикс становится бэкэндом с удобной админкой, который только отдает данные. Обработка данных ведется на фронтэнде, например, Vue.js

## Установка

В корне Битрикс-сайта у вас должна быть папка local. Для установки модуля нужно:
1. Положить папки `modules`, `routes` и файл `api.php` в папку `local. Получатся такие пути: `/local/modules/` и `/local/routes/` `/local/api.php`
2. В корне сайта изменить файл .htaccess:

```apacheconf
#закомментировать или удалить строки ниже
#RewriteCond %{REQUEST_FILENAME} !/bitrix/urlrewrite.php$
#RewriteRule ^(.*)$ /bitrix/urlrewrite.php [L]
#добавить строки ниже
RewriteCond %{REQUEST_FILENAME} !/bitrix/routing_index.php$
RewriteRule ^(.*)$ /bitrix/routing_index.php [L]
```

3. Добавить в конце `bitrix/.settings.php`:

```php
'routing' => ['value' => [
  'config' => ['web.php', 'api.php']
]],
```

## Использование

1. В админке Битрикса создаем инфоблок, в котором будем добавлять наши записи. Либо используем уже существующий инфоблок. 
2. Создаем наши разделы и записи в этих разделах через админку Битрикса:
![alt text](./git-images/firefox_NXIDpx4JbO.png?raw=true)
![alt text](./git-images/firefox_5A3tw9kbwB.png?raw=true)
![alt text](./git-images/firefox_5CiJsnf0cw.png?raw=true)
3. В файле /local/modules/content.api/controller/User.php прописываем наши эндпоинты, по которым будем забирать данные.
4. Смотрим на результат:
![alt text](./git-images/firefox_h1D3gfZNfv.png?raw=true)