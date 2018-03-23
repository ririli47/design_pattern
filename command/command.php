<?php

class Bulb
{
  public function turnOn()
  {
    echo "電球がつきました\n";
  }
  public function turnOff()
  {
    echo "真っ暗\n";
  }
}

interface Command
{
  public function execute();
  public function undo();
  public function redo();
}

class TurnOn implements Command
{
  protected $bulb;

  public function __construct(Bulb $bulb)
  {
    $this->bulb = $bulb;
  }

  public function execute()
  {
    $this->bulb->turnOn();
  }

  public function undo()
  {
    $this->bulb->turnOff();
  }

  public function redo()
  {
    $this->execute();
  }

}

class TurnOff implements Command
{
  protected $bulb;

  public function __construct(Bulb $bulb)
  {
    $this->bulb = $bulb;
  }

  public function execute()
  {
    $this->bulb->turnOff();
  }

  public function undo()
  {
    $this->bulb->turnOn();
  }

  public function redo()
  {
    $this->execute();
  }

}


class RemoteController
{
  public function submit(Command $command)
  {
    $command->execute();
  }
}

$bulb = new Bulb();

$turnOn = new TurnOn($bulb);
$turnOff = new TurnOff($bulb);

$remote = new RemoteController();
$remote->submit($turnOn);
$remote->submit($turnOff);
