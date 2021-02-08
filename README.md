# 阿里生活物联网平台（飞燕平台）sdk

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



License

- MIT
