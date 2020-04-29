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

use DtApp\Curl\BtCn;
use DtApp\Curl\CurlException;

/**
 * 中间件
 * Class BaseBt
 * @package DtApp\Think\Bt
 */
class BaseBt
{
    /**
     * 定义当前版本
     */
    const VERSION = '6.0.1';

    /**
     * 配置
     * @var
     */
    public $config;

    /**
     * Base constructor.
     * @param array $options
     * @throws BtException
     */
    public function __construct(array $options = [])
    {
        if (empty($options['key'])) if (empty(config('dtapp.bt.key'))) throw new BtException('请检查配置 接口密钥：[key]，示例：x0m1NM1yumUVTyzLrpoJ4tgbVAZFzWVj');
        if (empty($options['panel'])) if (empty(config('dtapp.bt.panel'))) throw new BtException('请检查配置 面板地址：[panel]，示例：http://127.0.0.1:8888');
        if (!empty($options['panel']) && !empty($options['key'])) $this->config = new DataArray($options);
        if (!empty(config('dtapp.bt.panel')) && !empty(config('dtapp.bt.panel'))) $this->config = new DataArray(config('dtapp.bt'));
    }

    /**
     * 发起POST请求
     * @param string $url 网址
     * @param array $data 数据
     * @param bool $is_json 是否返回Json格式
     * @return bool|mixed|string
     * @throws CurlException
     */
    protected function HttpPostCookie(string $url, array $data = [], bool $is_json = true)
    {
        $config = [
            'bt_panel' => $this->config->get('panel'),
            'bt_key' => $this->config->get('key')
        ];
        //定义cookie保存位置
        $file = app()->getRootPath() . 'runtime/dtapp/bt/cookie/';
        $cookie_file = $file . md5($this->config->get('panel')) . '.cookie';
        is_dir($file) or mkdir($file, 0777, true);
        if (!file_exists($cookie_file)) {
            $fp = fopen($cookie_file, 'w+');
            fclose($fp);
        }
        $BtCn = new BtCn($config);
        return $BtCn->httpPost($url, $data, $cookie_file, 60, $is_json);
    }

    /**
     * 获取总数
     * @param string $str
     * @return false|int|string
     */
    protected function getCountData(string $str)
    {
        $start = strpos($str, "共");
        $end = strpos($str, "条数据");
        $count = substr($str, $start + 3, $end - $start - 3);
        if (empty($count)) return 0;
        return $count;
    }
}
