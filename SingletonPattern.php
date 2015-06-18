<?php

// 单例模式顾名思义，就是只有一个实例。
// 作为对象的创建模式， 单例模式确保某一个类只有一个实例，
// 而且自行实例化并向整个系统提供这个实例。

public class Singleton {
    private static $_instance = NULL;

    // 私有构造方法 
    private function __construct() {}

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new Singleton();
        }
        return self::$_instance;
    }

    // 防止克隆实例
    public function __clone(){
        die('Clone is not allowed.' . E_USER_ERROR);
    }
}