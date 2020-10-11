1. 安裝 Laravel 6.x LTS 及 Authentication
    composer create-project --prefer-dist laravel/laravel facebookAuth "6.*"
    composer require laravel/ui "^1.0" --dev
    php artisan ui vue --auth
    npm install && npm run dev

2. 安裝 Laravel Socialite 套件並設定相關資料
    composer require laravel/socialite
