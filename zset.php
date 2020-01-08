<?php
/**
 * Created by IntelliJ IDEA.
 * User: yanwei
 * Date: 2020/1/8
 * Time: 11:39 AM
 */
//创建
	//元素已存在，会更新排序值（score）
	$redis->zadd('zset',10,'a');
//获取
	//根据开始结束索引获取集合中的元素,-1表示最后一个，排序值越大的越靠后，如果相等，则后添加的靠后
	$redis->zrange('zset',0,-1);
	//反转排序,与zrange效果相反
	$redis->zrevrange('zset',0,-1);
	//获取指定元素（a）的索引（下标）
	$redis->zrank('zset','a');
	//获取指定元素（a）的排序值
	$redis->zscore('zset','a');
	//获取有序集合中元素个数
	$redis->zcard('zset');
	//获取指定范围的元素个数
	$redis->zcount('zset',min,max);
//删除
	//删除有序集合中一个或多个元素,删除ab元素
	$redis->zrem('zset','a','b');
//修改
	//为有序集的元素（a）的排序值增加2
	$redis->zincrby('zset',2,'a');