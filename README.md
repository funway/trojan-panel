# README.md

An administration panel for trojan-gfw VPN.

## Installation

1. `composer install` 安装 PHP 依赖库 → vendor/
2. `npm install` 安装 JS 依赖库 → node_modules/
3. `npm run build` 从 JS 依赖库生成实际使用的 CSS/JS 文件 → public/build/
    
    或者使用 `npm run dev` 命令启动一个 vite 服务 (这在编写前端代码时候很好用)，实时扫描项目中使前端代码，然后自动重新生成 CSS/JS 文件 → public/build/
    

## Deployment

1. `composer install --optimize-autoloader --no-dev` 只安装生产环境要用的依赖库，删除 dev 依赖库，比如 Debugbar
2. `npm install --production` 只安装生产环境要用的 JS 依赖库
3. `npm run build` 生成实际使用的 CSS/JS 文件
4. 将项目拷贝到服务器
5. 修改 .env 文件, `APP_ENV=production`
6. [Optional]
`php artisan key:generate` 重新生成 APP_KEY
`php artisan config:cache` 重新生成配置缓存
`php artisan route:cache` 重新生成路由缓存
`php artisan view:cache` 重新生成视图缓存

## Database

需要自行给数据库添加两个定时任务

1. 每月自动计算 total_download, total_upload 并将 download, upload 清零
2. 每 N 分钟自动计算用户是否过期 (expire_at)，过期则将 quota 清零

## Dependencies

1. Laravel 11
2. Tailwind CSS
3. Flowbite
4. flatpickr

## Todo