<?php

// 通过在必须的逻辑和方法的集合前创建简单的外观接口， 门面模式隐藏了来自调用对象的复杂性
// 给其他应用提供了更简洁的调用方式

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


class CDUpperCase 
{
	public static function makeString(CD $cd, $title)
	{
		$cd->$title = strtoupper($cd->$title);
	}
}

class CDMakeXML 
{
	public static function create(CD $cd)
	{
		$doc = new DomDocument();

		//....

		return $doc->saveXML();
	}
}

// Not recommended
/*
$cd_id = 12;
$cd = new CD($cd_id);

CDUpperCase::makeString($cd, 'title');
CDUpperCase::makeString($cd, 'band');
print CDMakeXML::create($cd);
*/


class CDFacade
{
	public static function makeXMLCall(CD $cd)
	{
		CDUpperCase::makeString($cd, 'title');
		CDUpperCase::makeString($cd, 'band');
		$xml = CDMakeXML::create($cd);

		return $xml;
	}
}

print CDFacade::makeXMLCall($cd);

