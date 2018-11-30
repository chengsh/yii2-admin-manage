Yii2 Admin 后台模板
=======================

### 简介
系统基于yii基础版本开发，后台模板使用的ace admin。对于一般的后台开发，比较方便; 对于数据表的CURL操作都有封装，且所有操作都有权限控制。
引用了https://packagist.org/packages/jinxing/yii2-admin 这个扩展,进行基本的配置,融化到了yii2基础版本
#### 特点
* 使用RBAC权限管理，所有操作基于权限控制
* 视图使用JS控制，数据显示使用的jquery.DataTables
* 基于数据表的增、删、改、查都有封装，添加新的数据表操作方便
### 安装要求
* PHP >= 5.4
* MySQL
### 安装
* 提示：请先确定安装了[Composer Asset插件:](https://github.com/fxpio/composer-asset-plugin)
```
php composer.phar global require "fxp/composer-asset-plugin:^1.1.1"
```
1. 下载源代码

2. 执行 composer install 安装依赖包
        
    ```
    php composer install
    ```

3. 配置好数据库配置后,导入数据表结构

需要顺序执行
* 导入rbac migration 权限控制数据表
    ```
    php yii migrate --migrationPath=@yii/rbac/migrations
    ```
* 导入后台默认数据(菜单、默认权限)
    ```
    php yii migrate --migrationPath=@jinxing/admin/migrations
    ```
    
*  导入用户表数据
    ```
     php yii migrate 
    ```
    
* 后台默认超级管理员账号：super 密码：admin123
* 管理员账号：admin 密码：admin888
