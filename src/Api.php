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
 * 接口
 * Class Api
 * @package DtApp\Think\Bt
 */
class Api extends BaseBt
{
    /**
     * 获取监控信息
     * @param string $type 类型 GetCpuIo = CPU信息/内存 GetDiskIo = 磁盘IO GetNetWorkIo = 网络IO
     * @param int $start_time 开始时间
     * @param int $end_time 结束时间
     * @return mixed
     * @throws CurlException
     */
    public function getInfo($type = 'GetCpuIo', $start_time = 0, $end_time = 0)
    {
        if (empty($start_time)) $start_time = strtotime(date('Y-m-d'));
        if (empty($end_time)) $end_time = time();
        $url = "/ajax?action={$type}&start={$start_time}&end={$end_time}";
        //请求面板接口
        return $this->HttpPostCookie($url, []);
    }

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

    /**
     * 获取数据库列表
     * @param int $page
     * @param int $limit
     * @param string $search
     * @return mixed
     * @throws CurlException
     */
    public function getDatabaseList($page = 1, $limit = 15, $search = '')
    {
        $url = '/data?action=getData';
        $p_data['tojs'] = 'database.get_list';
        $p_data['table'] = 'databases';
        $p_data['limit'] = $limit;
        $p_data['p'] = $page;
        $p_data['search'] = $search;
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
     * 获取防火墙
     * @param int $page
     * @param int $limit
     * @return mixed
     * @throws CurlException
     */
    public function getFirewallList($page = 1, $limit = 10)
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

    /**
     * 获取网站列表
     * @param int $page
     * @param int $limit
     * @param string $search
     * @param int $type
     * @return mixed
     * @throws CurlException
     */
    public function getCronTabList($page = 1, $limit = 15, $search = '', $type = -1)
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

    /**
     * 获取软件列表
     * @param int $page
     * @param int $type
     * @param int $force
     * @param string $query
     * @return mixed
     * @throws CurlException
     */
    public function getSoftList($page = 1, $type = 0, $force = 0, $query = '')
    {
        $url = '/plugin?action=get_soft_list';
        $p_data['p'] = $page;
        $p_data['type'] = $type;
        $p_data['tojs'] = 'soft.get_list';
        $p_data['force'] = $force;// 是否更新列表 1=是 0=否
        $p_data['query'] = $query; // 搜索
        //请求面板接口
        return $this->HttpPostCookie($url, $p_data);
    }

    /**
     * 获取硬盘信息
     * @return mixed
     * @throws CurlException
     */
    public function getDiskInfo()
    {
        $url = '/system?action=GetDiskInfo';
        //请求面板接口
        return $this->HttpPostCookie($url, []);
    }

    /**
     * 获取信息系统
     * @return mixed
     * @throws CurlException
     */
    public function getSystemTotal()
    {
        $url = '/system?action=GetSystemTotal';
        //请求面板接口
        return $this->HttpPostCookie($url, []);
    }

    /**
     * 获取用户信息
     * @return mixed
     * @throws CurlException
     */
    public function getUserInfo()
    {
        $url = '/ssl?action=GetUserInfo';
        //请求面板接口
        return $this->HttpPostCookie($url, []);
    }

    /**
     * 获取网络信息
     * @return mixed
     * @throws CurlException
     */
    public function getNetWork()
    {
        $url = '/system?action=GetNetWork';
        //请求面板接口
        return $this->HttpPostCookie($url, []);
    }

    /**
     * 获取插件信息
     * @return mixed
     * @throws CurlException
     */
    public function getPlugin()
    {
        $url = '/plugin?action=get_index_list';
        //请求面板接口
        return $this->HttpPostCookie($url, []);
    }

    /**
     * 获取软件信息
     * @return mixed
     * @throws CurlException
     */
    public function getSoft()
    {
        $url = '/plugin?action=get_soft_list';
        //请求面板接口
        return $this->HttpPostCookie($url, []);
    }

    /**
     * 获取更新信息
     * @return mixed
     * @throws CurlException
     */
    public function getUpdatePanel()
    {
        $url = '/ajax?action=UpdatePanel';
        //请求面板接口
        return $this->HttpPostCookie($url, []);
    }
}
