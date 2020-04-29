<?php

// +----------------------------------------------------------------------
// | 宝塔ThinkPhP6扩展包
// +----------------------------------------------------------------------
// | 版权所有 2017~2020 [ https://www.dtapp.net ]
// +----------------------------------------------------------------------
// | 官方网站: https://gitee.com/dtapps/think-bt
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | gitee 仓库地址 ：https://gitee.com/dtapps/think-bt
// | github 仓库地址 ：https://github.com/dtapps/think-bt
// | Packagist 地址 ：https://packagist.org/packages/liguangchun/think-bt
// +----------------------------------------------------------------------

use DtApp\Curl\CurlException;
use DtApp\Think\Bt\Api;

require '../vendor/autoload.php';

$api = new Api();
try {
    var_dump($api->getLogs()->page(1)->limit(10)->order('id desc')->toArray());
} catch (CurlException $e) {
    var_dump($e->getMessage());
}
