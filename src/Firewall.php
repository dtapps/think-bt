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
 * 系统安全
 * Class firewall
 * @package DtApp\Bt
 */
class Firewall extends BaseBt
{
    /**
     * 获取防火墙
     * @param int $page
     * @param int $limit
     * @return mixed
     * @throws CurlException
     */
    public function getList($page = 1, $limit = 10)
    {
        $url = '/data?action=getData';
        $p_data['tojs'] = 'firewall.get_list';
        $p_data['table'] = 'firewall';
        $p_data['limit'] = $limit;
        $p_data['p'] = $page;
        $p_data['search'] = '';
        $p_data['order'] = 'id desc';
        //请求面板接口
        $result = $this->HttpPostCookie($url, $p_data);
        if (empty($result['data'])) $result['data'] = [];
        if (empty($result['page'])) $result['page'] = 0;
        if (!is_array($result['data'])) $result['data'] = [];
        return [
            'data' => $result['data'],
            'count' => $this->getCountData($result['page'])
        ];
    }

    /**
     * 获取面板日志
     * @param int $page
     * @param int $limit
     * @return mixed
     * @throws CurlException
     */
    public function getLog($page = 1, $limit = 10)
    {
        $url = '/data?action=getData';
        $p_data['tojs'] = 'firewall.get_log_list';
        $p_data['table'] = 'logs';
        $p_data['limit'] = $limit;
        $p_data['p'] = $page;
        $p_data['search'] = '';
        $p_data['order'] = 'id desc';
        //请求面板接口
        $result = $this->HttpPostCookie($url, $p_data);
        if (empty($result['data'])) $result['data'] = [];
        if (empty($result['page'])) $result['page'] = 0;
        if (!is_array($result['data'])) $result['data'] = [];
        return [
            'data' => $result['data'],
            'count' => $this->getCountData($result['page'])
        ];
    }
}
