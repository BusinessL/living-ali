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
     * 查询免费的云存储套餐详情。
     *
     * @param string $iotId
     * @return array
     */
    public function getFreecloudstorage($iotId)
    {
        $response = $this->client->post(
            '/vision/customer/freecloudstorage/get', ['iotId' => $iotId], "1.0.1"
        );

        return $response;
    }

    /**
     * 领取免费的云存储套餐。
     *
     * @param string $iotId
     * @return array
     */
    public function consumeFreecloudstorage($iotId)
    {
        $response = $this->client->post(
            '/vision/customer/freecloudstorage/consume', ['iotId' => $iotId], "1.0.4"
        );

        return $response;
    }


    /**
     * 查询视频云存储套餐列表。
     *
     * @param string $iotId
     * @return array
     */
    public function queryCommodity($iotId)
    {
        $response = $this->client->post(
            '/vision/customer/cloudstorage/commodity/query', ['iotId' => $iotId], "1.0.4"
        );

        return $response;
    }

    /**
     * 查询云存储套餐是否可以购买。
     *
     * @param string $iotId
     * @param string $commodityCode
     * @param string $specification
     * @return array
     */
    public function checkCommodity($iotId, $commodityCode, $specification)
    {
        $response = $this->client->post(
            '/vision/customer/cloudstorage/commodity/check',
            ['iotId' => $iotId, 'commodityCode' => $commodityCode, 'specification' => $specification],
            "1.0.2"
        );

        return $response;
    }

    /**
     * 获取云存储订单详情
     *
     * @param string $iotId
     * @param  string $orderId
     * @return  array
     */
    public function getOrder($iotId, $orderId)
    {
        $response = $this->client->post(
            '/vision/customer/cloudstorage/order/get',
            ['iotId' => $iotId, 'orderId' => $orderId],
            "1.0.4"
        );

        return $response;
    }

    /**
     * 查询云存储套餐的订单列表
     *
     * @param $iotId
     * @param int $pageNo
     * @param int $pageSize
     * @return array
     */
    public function queryOrder($iotId, $pageNo = 0, $pageSize = 50)
    {
        $response = $this->client->post(
            'vision/customer/cloudstorage/order/query',
            ['iotId' => $iotId, 'pageNo' => $pageNo, 'pageSize' => $pageSize],
            "1.0.1"
        );

        return $response;
    }


    /**
     * 设置免费云存储套餐立即生效
     *
     * @param  string $iotId
     * @return array
     */
    public function enableFreecloudstorage($iotId)
    {
        $response = $this->client->post(
            '/vision/customer/freecloudstorage/enable',
            ['iotId' => $iotId],
            "1.0.1"
        );

        return $response;
    }

    /**
     * 设置云存储套餐立即生效
     *
     * @param  string $iotId
     * @return array
     */
    public function enableCommodity($iotId)
    {
        $response = $this->client->post('/vision/customer/cloudstorage/commodity/enable', [
            'iotId' => $iotId], "1.0.1");

        return $response;
    }

    /**
     * 设置用户的云存储套餐状态
     *
     * @param $iotId
     * @param $orderId
     * @param $status
     * @return array
     */
    public function setStatus($iotId, $orderId, $status)
    {
        $response = $this->client->post('/vision/customer/cloudstorage/status/set', [
            'iotId' => $iotId, 'orderId' => $orderId, 'status' => $status
        ], "1.0.1");

        return $response;
    }

}