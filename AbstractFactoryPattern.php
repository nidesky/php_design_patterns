<?php

// 抽象工厂模式是一种创建型模式，它提供了一种方式，
// 可以将一组具有同一主题的单独的工厂封装起来。它的实质是“提供接口，
// 创建一系列相关或独立的对象，而不指定这些对象的具体类”。
// 

class Button{}
class Border{}
class MacButton extends Button{}
class WinButton extends Button{}
class MacBorder extends Border{}
class WinBorder extends Border{}

interface AbstractFactory {
    public function CreateButton();
    public function CreateBorder();
}

class MacFactory implements AbstractFactory{
    public function CreateButton(){ return new MacButton(); }
    public function CreateBorder(){ return new MacBorder(); }
}
class WinFactory implements AbstractFactory{
    public function CreateButton(){ return new WinButton(); }
    public function CreateBorder(){ return new WinBorder(); }
}
