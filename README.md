# 阿里生活物联网平台（飞燕平台）sdk

介绍

该composer包，封装阿里物联网平台，云端api接口。可以对比[阿里云文档](https://help.aliyun.com/document_detail/153142.html?spm=a2c4g.11186623.3.3.5bf86cb8Piet1f)，查看参数描述。

安装
```
composer require yun-hai/living-ali
```

使用
```
<?php
 $meal = new Living\Meal('https://api.link.aliyun.com','appkey','secret');
 //查询免费的云存储套餐详情
 $meal->getFreecloudstorage($iotid);
```
返回数据正常示例：

```
[
    'code' =>  200,
    'data' => [
    ]
]
```


文档

1.查询免费的云存储套餐详情


```
 $meal->getFreecloudstorage($iotId)
```


2.领取免费的云存储套餐


```
 $meal->consumeFreecloudstorage($iotId)
```


3.查询可购买的视频云存储套餐列表


```
 $meal->queryCommodity($iotId)
```

4.查询云存储套餐是否可以购买

``` 
$meal->checkCommodity($iotId, $commodityCode, $specification)
```

5.获取云存储订单详情

```
$meal->getOrder($iotId, $orderId)
```

6.查询云存储套餐的订单列表

```
$meal->queryOrder($iotId, $pageNo = 0, $pageSize = 50)
```

7.设置免费云存储套餐立即生效

```
$meal->enableFreecloudstorage($iotId)
```

8.设置云存储套餐立即生效
```
$meal->enableCommodity($iotId)
```

9.设置用户的云存储套餐状态
```
$meal->setStatus($iotId, $orderId, $status)
```

License

- MIT
