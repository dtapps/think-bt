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

namespace DtApp\Think\Bt;

use Exception;

/**
 * 错误处理
 * Class BtException
 * @package DtApp\Bt
 */
class BtException extends Exception
{
    public function errorMessage()
    {
        return $this->getMessage();
    }
}
