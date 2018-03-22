<?php
interface Lion
{
    public function roar();
}

class AfricanLion implements Lion
{
    public function roar()
    {

    }
}

class AsianLion implements Lion
{
    public function roar()
    {

    }
}

class Hunter
{
    public function hunt(Lion $lion)
    {
        echo "hunt!\n";
    }
}

class WildDog
{
    public function bark()
    {

    }
}

class WildDogAdapter implements Lion
{
    protected $dog;

    public function __construct(WildDog $dog)
    {
        $this->dog = $dog;
    }

    public function roar()
    {
        $this->dog->bark();
    }
}

$wildDog = new WildDog();
$wildDogAdapter = new WildDogAdapter($wildDog);

$hunter = new Hunter();
$hunter->hunt($wildDogAdapter);
