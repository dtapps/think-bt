<img align="right" width="100" src="https://cdn.oss.liguangchun.cn/04/999e9f2f06d396968eacc10ce9bc8a.png" alt="dtApp Logo"/>

<h1 align="left"><a href="https://www.dtapp.net/">ThinkPhP6宝塔扩展包</a></h1>

📦 ThinkPhP6宝塔扩展包

[![Latest Stable Version](https://poser.pugx.org/dtapp/think-bt/v/stable)](https://packagist.org/packages/dtapp/think-bt) 
[![Latest Unstable Version](https://poser.pugx.org/dtapp/think-bt/v/unstable)](https://packagist.org/packages/dtapp/think-bt) 
[![Total Downloads](https://poser.pugx.org/dtapp/think-bt/downloads)](https://packagist.org/packages/dtapp/think-bt) 
[![License](https://poser.pugx.org/dtapp/think-bt/license)](https://packagist.org/packages/dtapp/think-bt)

## 依赖环境

1. PHP7.0 版本及以上（低版本和7.4版本未做兼容处理！）


# 安装
## 建议配置源库

```text
composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
```

## 安装开发版

```text
composer require dtapp/think-bt ^6.0.x-dev -vvv
``````
   
## 安装稳定版
   
```text
composer require dtapp/think-bt ^6.0.* -vvv
```

## 更新

```text
composer update dtapp/think-bt -vvv
```

## 删除

```text
composer remove dtapp/think-bt -vvv
```

## 使用
#### 支持动态和静动配置
#### 动态配置：每次调用的时候传入配置参数，参数请参考下面示例方法
#### 静动配置：在根目录下的config文件夹里有个dtapp.php文件，配置如下方所示
```text
// 宝塔配置
    'bt' => [
        // 接口网址带端口
        'path' => '',
        // 密钥
        'key' => ''
    ]
```
#### 获取面板操作日志 示例代码
```text
use DtApp\Think\Bt\Api;

 $config = [
     'key' => $BT_KEY,
     'panel' => $BT_PANEL,
 ];

$api = new Api($config);
try {
    var_dump($api->getLogs()->page(1)->limit(10)->order('id desc')->toArray());
} catch (CurlException $e) {
    var_dump($e->getMessage());
}
```
