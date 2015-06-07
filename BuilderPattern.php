<?php

/**
 * 建造者接口
 */
interface BuilderInterface
{
    /**
     * 构造一个产品
     */
    public function createVehicle();

    /**
     * 添加轮子
     */
    public function addWheel();

    /**
     * 添加引擎
     */
    public function addEngine();

    /**
     * 添加车门
     */
    public function addDoors();

    /**
     * 获取建造好的产品
     */
    public function getVehicle();
}

/**
 * 产品抽象类
 */
abstract class Vehicle
{
	/**
	 * 产品属性集合
	 */
    protected $data;

    /**
     * 设置产品属性
     */
    public function setPart($key, $value)
    {
        $this->data[$key] = $value;
    }
}


/**
 * 自行车建造者
 */
class BikeBuilder implements BuilderInterface
{
    /**
     * 自行车对象
     */
    protected $bike;

    /**
     * 添加车门
     */
    public function addDoors()
    {
    }

    /**
     * 添加引擎
     */
    public function addEngine()
    {
        $this->bike->setPart('engine', new Engine());
    }

    /**
     * 添加轮子
     */
    public function addWheel()
    {
        $this->bike->setPart('forwardWheel', new Wheel());
        $this->bike->setPart('rearWheel', new Wheel());
    }

    /**
     * 将自行车对象赋给bike属性
     */
    public function createVehicle()
    {
        $this->bike = new Bike();
    }

    /**
     * 返回建造好的自行车
     */
    public function getVehicle()
    {
        return $this->bike;
    }
}

/**
 * 汽车建造者
 */
class CarBuilder implements BuilderInterface
{

    protected $car;

    /**
     * 添加车门
     */
    public function addDoors()
    {
        $this->car->setPart('rightdoor', new Door());
        $this->car->setPart('leftDoor', new Door());
    }

    /**
     * 添加引擎
     */
    public function addEngine()
    {
        $this->car->setPart('engine', new Engine());
    }

    /**
     * 添加轮子
     */
    public function addWheel()
    {
        $this->car->setPart('wheelLF', new Wheel());
        $this->car->setPart('wheelRF', new Wheel());
        $this->car->setPart('wheelLR', new Wheel());
        $this->car->setPart('wheelRR', new Wheel());
    }

    /**
     * 建造新的汽车
     */
    public function createVehicle()
    {
        $this->car = new Car();
    }

    /**
     * 返回建造好的汽车
     */
    public function getVehicle()
    {
        return $this->car;
    }
}

class Bike extends Vehicle{}
class Car extends Vehicle{}
class Engine{}
class Wheel{}
class Door{}
class Bike{}


/**
 * 导演类
 */
class Director
{
    /**
     * 通过传入一个实现了建造者接口的建造类(BikeBuilder或者CarBuilder)返回相应的产品
     */
    public function build(BuilderInterface $builder)
    {
        $builder->createVehicle();
        $builder->addDoors();
        $builder->addEngine();
        $builder->addWheel();

        return $builder->getVehicle();
    }
}

// 实例化一个自行车建造者对象
$bikeBuilder = new BikeBuilder();
// 通过导演类生成自行车
$bike = new Director($bikeBuilder);
