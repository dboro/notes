# Установка

 - git clone git@github.com:dboro/notes.git
 - cd notes
 - docker compose up -d
 - docker compose exec app bash
 - composer update
 - mv .env.loc .env
 - php artisan migrate
 - npm install (на хост-машине)
 - npm run build
 - добавляеи notes.loc в хост файл ОС
 - для регистрации подойдёт любой email (верификация не предусмотрена)
