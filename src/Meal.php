<?php

namespace Living;

use Living\lib\Client;

/**
 * Class Meal
 *
 * @package Living
 */
class Meal
{
    protected $client;

    /**
     * Meal constructor.
     *
     * @param $host
     * @param $appKey
     * @param $secret
     */
    public function __construct($host, $appKey, $secret)
    {
        $this->client = new Client($host, $appKey, $secret);
    }

    /**
     * 调用该接口查询免费的云存储套餐详情。
     *
     * @param string $iotId
     */
    public function getFreecloudstorage(string $iotId)
    {
        $response = $this->client->post('/vision/customer/freecloudstorage/get', ['iotId' => $iotId], "1.0.1");
    }

    /**
     * 调用该接口领取免费的云存储套餐。
     */
    public function consumeFreecloudstorage()
    {
        $client = new Client();
        $client->post('/vision/customer/freecloudstorage/consume', ['iotId' => $iotId], "1.0.1");
    }


    /**
     * 调用该接口查询视频云存储套餐列表。
     */
    public function queryCommodity()
    {

    }

    /**
     * 调用该接口查询云存储套餐是否可以购买。
     */
    public function checkCommodity()
    {

    }
}