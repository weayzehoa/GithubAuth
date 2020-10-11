1. 安裝 Laravel 6.x LTS 及 Authentication
    composer create-project --prefer-dist laravel/laravel facebookAuth "6.*"
    composer require laravel/ui "^1.0" --dev
    php artisan ui vue --auth
    npm install && npm run dev

2. 安裝 Laravel Socialite 套件並設定相關資料
    composer require laravel/socialite

3. 取得 Github OAhth 資料並增加到 .env 設定中
    GITHUB_CLIENT_ID=XXXXXXXXXXXXXXXXXXXXXXXXXXX
    GITHUB_CLIENT_SECRET=XXXXXXXXXXXXXXXXXXXXXXX
    GITHUB_REDIRECT=https://localhost/callback

4. 建立 SocialAuthGithubController 控制器 並修改
    php artisan make:controller SocialAuthGithubController
