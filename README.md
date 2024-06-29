# VPN-Panel

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

## Dependences

1. Laravel 11
2. Tailwind CSS

## Todo

1. 给用户模型增加 expire 属性
2. 完善节点管理
3. 修改 trojan 的密码，不使用 `user_name:user_passowrd` 形式。而是由服务器生成一个六位随机码 token, 然后使用 `user_name:token` 的形式。这样就可以在生成的 节点URL、节点二维码 中都明文写上这个 token 了，也就可以构造订阅链接了。