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
$redis->auth('密码');
//检查是否还再连接
$a = $redis->ping();

//释放资源
$redis->close();