<?php

// +----------------------------------------------------------------------
// | 宝塔ThinkPhP6扩展包
// +----------------------------------------------------------------------
// | 版权所有 2017~2020 [ https://www.dtapp.net ]
// +----------------------------------------------------------------------
// | 官方网站: https://gitee.com/dtapps/bt
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | gitee 仓库地址 ：https://gitee.com/dtapps/bt
// | github 仓库地址 ：https://github.com/dtapps/bt
// | Packagist 地址 ：https://packagist.org/packages/liguangchun/think-bt
// +----------------------------------------------------------------------

namespace DtApp\Think\Bt;

use DtApp\Curl\CurlException;

/**
 * 设置
 * Class Setup
 * @package DtApp\Bt
 */
class Setup extends BaseBt
{
    /**
     * 获取消息通道
     * @return mixed
     * @throws CurlException
     */
    public function getNews()
    {
        $url = '/config?action=get_settings';
        //请求面板接口
        return $this->HttpPostCookie($url, []);
    }
}
