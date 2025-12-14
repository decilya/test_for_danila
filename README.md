Тестовое задание
-------------------
Нужно смотреть следующие файлы:
- https://github.com/decilya/test_for_danila/blob/main/common/services/NewsService.php
- https://github.com/decilya/test_for_danila/blob/main/common/models/BirthdayRecipient.php
- https://github.com/decilya/test_for_danila/blob/main/console/controllers/BirthdayController.php
- https://github.com/decilya/test_for_danila/blob/b96d71b186b86f7d0ed7bc2cf4810cfad7fff467/common/config/main.php#L13

### ОПИСАНИЕ ЗАДАНИЯ:

Текст программы, которая в обед поздравляет с днем рождения по смс Анну Николаевну Шульц 29.02.1978 г.р., уроженку г.Владивосток, проживающую по адресу г.Елизово, ул.Ленина д.2 кв.3. В текст объявления интегрированы горячие новости сегодняшнего дня.

Добавьте в crontab задание:
```bash
0 12 * * * /usr/bin/php /путь_к_вашему_файлу/yii birthday/send-greeting
```

В конфиге common/config/main.php для smsc_ru прописать login и password

В common/services/NewsService.php прописать apiKey




