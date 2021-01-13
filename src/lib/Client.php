<?php

namespace Living\lib;

class Client
{
    protected $host;

    protected $appKey;

    protected $appSecret;


    public function __construct($host, $appKey, $secret)
    {
        $this->host = $host;
        $this->appKey = $appKey;
        $this->appSecret = $secret;
    }

    public function post($path, $data, $version = "1.0.3")
    {
        $host = $this->host;
        $appKey = $this->appKey;
        $appSecret = $this->appSecret;

        $params = json_encode($data);
        $requestId = time();
        $request = new \HttpRequest($host, $path, \HttpMethod::POST, $appKey, $appSecret);
        //设置API版本和参数，其中，res为授权的资源ID。grantType为project时，res的值为project的ID。
        $body = '{"id":"' . $requestId . '","version":"1.0","request":{"apiVer":"' . $version . '"},' .
            '"params":' . $params . '}';

        //设定Content-Type
        $request->setHeader(\HttpHeader::HTTP_HEADER_CONTENT_TYPE,
            "application/json; charset=UTF-8");

        //设定Accept
        $request->setHeader(\HttpHeader::HTTP_HEADER_ACCEPT,
            "application/json; charset=UTF-8");

        if (strlen($body) > 0) {
            $request->setHeader(\HttpHeader::HTTP_HEADER_CONTENT_MD5,
                base64_encode(md5($body, true)));
            $request->setBodyString($body);
        }

        //指定参与签名的header
        $request->setSignHeader("X-Ca-Signature");

        $response = \HttpClient::execute($request);

        $responseArray = json_decode($response->getBody(), true) ?? [];

        return $responseArray;
    }
}