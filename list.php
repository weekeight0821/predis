<?php
/**
 * Created by IntelliJ IDEA.
 * User: yanwei
 * Date: 2020/1/8
 * Time: 10:53 AM
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
	//从列表左边放入一个或者多个元素,不存在创建
	$redis->lpush('list','值1');
	//当列表存在时，从左边放入一个元素，不存在时报错
	$redis->lpushx('list','值2');
	//从列表右边放入一个或者多个元素,不存在创建
	$redis->rpush('list','值1');
	//当列表存在时，从右边放入一个元素，不存在时报错
	$redis->rpushx('list','值2');
//获取
//根据索引获取列表中的元素，列表索引最后一个可以使用-1
//(1)$redis->lrange('list',0,-1);
	$redis->lgetrange('list',0,-1);
//根据列表索引获取值
//(1)$redis->lindex('list',0);
	$redis->lget('list',0);
//修改
	//根据索引设置列表中元素的值,当list不存在时报错
	$redis->lset('list',0,'新值');
//删除
	//从列表左边删除一个元素
	$redis->lpop('list');
	//从列表右边删除一个元素
	$redis->rpop('list');
	//从list列表里移除前 2（count）次出现的值为 value 的元素
	$redis->lremove('list','value',2);
		#count > 0: 从头往尾移除值为 value 的元素
		#count < 0: 从尾往头移除值为 value 的元素
		#count = 0: 移除所有值为 value 的元素
	//删除list列表右边的最后一个元素将其追加到list1列表,list1不存在会创建
	$redis->rpoplpush('list','list1');
	//根据索引start和stop保留列表元素,其他元素全删除
	$redis->ltrim('list',1,2);
//获取列表长度
$redis->llen('list');