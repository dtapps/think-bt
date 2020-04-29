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

use DtApp\Curl\CurlException;

/**
 * 网站管理
 * Class Site
 * @package DtApp\Think\Bt
 */
class Site extends BaseBt
{
    /**
     * 获取网站列表
     * @param int $page
     * @param int $limit
     * @param string $search
     * @param int $type
     * @return mixed
     * @throws CurlException
     */
    public function getList($page = 1, $limit = 15, $search = '', $type = -1)
    {
        $url = '/data?action=getData';
        $p_data['tojs'] = 'site.get_list';
        $p_data['table'] = 'sites';
        $p_data['limit'] = $limit;
        $p_data['p'] = $page;
        $p_data['search'] = $search;
        $p_data['order'] = 'id desc';
        $p_data['type'] = $type;
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
     * 获取网站分类
     * @return mixed
     * @throws CurlException
     */
    public function getTypes()
    {
        $url = '/site?action=get_site_types';
        //请求面板接口
        return $this->HttpPostCookie($url, []);
    }
}
