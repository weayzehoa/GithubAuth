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

5. 修改 route/web.php 新增

    Route::get('/redirect', 'SocialAuthGithubController@redirect');
    Route::get('/callback', 'SocialAuthGithubController@callback');

6. 建立 Model 及 修改相關檔案

    php artisan make:model SocialGithubAccount -m

    a. 修改 app/SocialGithubAccount.php
    b. 修改 database/migrations/2020_10_11_054309_create_social_github_accounts_table.php
    c. 修改完成後執行 php artisan migrate:refresh

7. 新增 app/Services 目錄及 SocialGithubAccountService.php 並修改它
8. 修改 login 視圖，新增一個按鈕
9. 測試，失敗，修正錯誤。
10. 完成。
