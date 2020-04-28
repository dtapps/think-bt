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
 * 计划任务
 * Class CronTab
 * @package DtApp\Bt
 */
class CronTab extends BaseBt
{
    /**
     * 获取网站列表
     * @return mixed
     * @throws CurlException
     */
    public function getDataList()
    {
        $url = '/crontab?action=GetDataList';
        $p_data['type'] = 'sites';
        //请求面板接口
        $result = $this->HttpPostCookie($url, $p_data);
        return [
            'data' => $result['data'],
            'orderOpt' => $result['orderOpt']
        ];
    }
}
