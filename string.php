<?php
/**
 * Created by IntelliJ IDEA.
 * User: yanwei
 * Date: 2020/1/6
 * Time: 2:03 PM
 */
require_once __DIR__ . '/vendor/autoload.php';
//连接
$redis = new Redis();
$redis->connect('127.0.0.1',6379);
//登陆密码
//$redis->auth('密码');
//检查是否还再连接
$a = $redis->ping();

//创建
	//设置单个key
	$redis->set("key", "value");
		#第3个参数：
		#10 – 设置键key的过期时间，10秒
		#NX – 只有键key不存在的时候才会设置key的值
		#XX – 只有键key存在的时候才会设置key的值
	//一次性设置多个key
	$redis->mset([
        'name'=>'小明',
        'age'=>'13',
        'sex'=>'男'
    ]);
//获取
	//一次性获取多个key,返回索引数组
	$redis->mget(['name','age','sex']);
    //用 value 参数覆写(overwrite)给定 key 所储存的字符串值，从偏移量 offset 开始;不存在的 key 当作空白字符串处理。
    $redis->setRange('key', 1, 'redis');
	//获取指定key值的索引开始位置和结束位置所对应的值，索引从0开始
	$redis->getRange('key',1,2);
//追加
	//key已经存在，且值为字符串，会把 value 追加到原来值（value）的结尾。 如果 key 不存在，创建
	$redis->append('key','value');
//数字类型的key自减操作，key类型不是数字则报错 ,返回结果
$redis->decr('number');
//数字类型的key自加操作，与DECR相反
$redis->incr('number');
//数字类型key指定减少数值
$redis->decrby('number',10);//每次减10
//数字类型key指定增加数值，与DECRBY相反
$redis->incrby('number',10);
//获取key值的长度
$redis->strlen('key');
