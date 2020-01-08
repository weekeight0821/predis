<?php
/**
 * Created by IntelliJ IDEA.
 * User: yanwei
 * Date: 2020/1/8
 * Time: 11:38 AM
 */
//创建
	//添加一个或多个元素到集合中
	$redis->sadd('set','a','b');
//获取
	//返回集合中所有的元素
	$redis->smembers('set');
	//获取两个或两个以上集合的交集
	$redis->sinter('set','set1','set2');
	//获取两个或两个以上集合的并集
	$redis->sunion('set','set1','set2');
	//获取两个或者两个以上集合的差集
	$redis->sdiff('set','set1','set2');
//删除
	//删除一个或多个集合中的元素
	$redis->srem('set','a','b');
	// 随机移除一个元素，并返回移除的元素
	$redis->spop('set');
	//将set的一个元素(a)移动到set1集合中去
	$redis->smove('set','set1','a');
//判断元素是否是在指定集合中
$redis->sismember('set','a');

