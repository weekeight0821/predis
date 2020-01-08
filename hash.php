<?php
/**
 * Created by IntelliJ IDEA.
 * User: yanwei
 * Date: 2020/1/8
 * Time: 11:07 AM
 */
require_once __DIR__ . '/vendor/autoload.php';
//连接
$redis = new Redis();
$redis->connect('127.0.0.1',6379);

//创建
	//单个设置hash内容,字段已存在会覆盖
	$redis->hset('hash','a','value');
	//只有当字段不存在时候才设置hash表中字段值
	$redis->hsetnx('hash','a','value');
	//批量设置hash内容
	$redis->hmset('hash',[
        'a'=>12,
        'b'=>2,
        'c'=>3
    ]);
//获取
	//获取hash指定字段的值
	$redis->hget('hash','a');
	//批量获取
	$redis->hmget('hash',['a','b','c']);
	//获取全部
	$redis->hgetall('hash');
	//获取hash表中所有字段的值
	$redis->hvals('hash');
	//获取hash表中所有的字段
	$redis->hkeys('hash');
//删除
	$redis->hdel('hash','a');
//判断hash指定字段的值是否存在
$redis->hexists('hash','a');
//获取hash表中字段个数
$redis->hlen('hash');