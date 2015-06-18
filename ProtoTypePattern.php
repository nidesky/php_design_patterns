<?php

// 原型模式是一种创建者模式，
// 其特点在于通过“复制”一个已经存在的实例来返回新的实例,而不是新建实例。

class CD
{
	public $band = '';
	public $title = '';

	public function __construct($id)
	{
		$this->title = DB::table('posts')->where('id', '=', $id)->pluck('title');
		$this->band  = DB::table('trades')->where('id', '=', $id)->pluck('band');
	}

	public function buy()
	{
		var_dump($this);
	}

}

class DVD extends CD
{
	public function __clone()
	{
		$this->title = 'Mixtape';
	}
}

$post_id = 12;

$dvd = new DVD(12);

$infos = [
	['demo1_band', 'demo1_title'],
	['demo2_band', 'demo2_title'],
];

foreach ($infos as $info) {
	$cd = clone $dvd;
	$cd->band  = $info[0];
	$cd->title = $info[1];

	$cd->buy();
}