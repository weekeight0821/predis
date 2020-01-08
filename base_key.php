<?php
/**
 * Created by IntelliJ IDEA.
 * User: yanwei
 * Date: 2020/1/8
 * Time: 10:33 AM
 */
require_once __DIR__ . '/vendor/autoload.php';
//连接
$redis = new Redis();
$redis->connect('127.0.0.1',6379);
//登陆密码
//$redis->auth('密码');
//检查是否还再连接
$a = $redis->ping();

//判断name是否存在，存在返回true
$redis->exists('name');
//匹配所有key，返回key名数组
$redis->keys('*');
//匹配a开头的key
$redis->keys('a*');
//同时删除多个key，返回变化的数据条数
$redis->del('name','age');
//改key名字，name改成name1
$redis->rename('name','name1');
//获取当前数据库key的数量
$redis->dbsize();
//获取key的剩余过期时间，单位秒
$redis->ttl('sex');
//设置key的过期时间,默认-1表示永不过期，-2表示已经过期，单位秒
$redis->expire('sex',10);
//选择数据库,默认第0个,默认共有16个数据库（0~15）
$redis->select(5);
//将key从当前数据库移动到指定数据库
$redis->move('age',1);
//删除当前数据库的所有key
$redis->flushdb();
//删除所有数据库的所有key
$redis->flushall();

