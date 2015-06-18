<?php

// 建造者设计模式定义了处理其他对象的复杂构建的对象设计。
class Product {}

class ProductBuilder
{
    protected $_product = null;
    protected $_configs = [];

    public function __construct($configs)
    {
        $this->_product = new Product();
        $this->_configs = $configs;
    }

    public function build()
    {
        $this->_product->setSize($this->_config['size']);
        $this->_product->setType($this->_config['type']);
        $this->_product->setColor($this->_config['color']);
    }

    public function getProduct()
    {
        return $this->_product;
    }
}

$builder = new ProductBuilder($productConfigs);
$builder->build();
$product = $builder->getProduct();