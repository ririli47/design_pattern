<?php
class Computer
{
    public function getElectricShock()
    {
        echo "ビリビリ";
    }

    public function makeSound()
    {
        echo "ピッポッ";
    }

    public function showLoadingScreen()
    {
        echo "読み込み中...";
    }

    public function bam()
    {
        echo "準備ができました！";
    }

    public function closeEverything()
    {
        echo "ビービービビビビビ";
    }

    public function sooth()
    {
        echo "（シーン）";
    }

    public function pullCurrent()
    {
        echo "プシュー";
    }
}

class ComputerFacede
{
    protected $computer;

    public function __construct(Computer $computer)
    {
        $this->computer = $computer;
    }

    public function turnOn()
    {
        $this->computer->getElectricShock();
        $this->computer->makeSound();
        $this->computer->showLoadingScreen();
        $this->computer->bam();
    }

    public function turnOff()
    {
        $this->computer->closeEverything();
        $this->computer->pullCurrent();
        $this->computer->sooth();
    }
}


$computer = new ComputerFacede(new Computer());
$computer->turnOn();
$computer->turnOff();
