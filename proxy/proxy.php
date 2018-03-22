<?php
interface Door
{
    public function open();
    public function close();
}

class LabDoor implements Door
{
    public function open()
    {
        echo "研究室のドアを開く\n";
    }

    public function close()
    {
        echo "研究室のドアを閉じる\n";
    }
}

class Security
{
    protected $door;

    public function __construct(Door $door)
    {
        $this->door = $door;
    }

    public function open($password)
    {
        if($this->authenticate($password))
        {
            $this->door->open();
        }
        else
        {
            echo "絶対ダメ！開けられません！\n";
        }
    }

    public function authenticate($password)
    {
        return $password === '$ecr@t';
    }

    public function close()
    {
        $this->door->close();
    }
}


$door = new Security(new LabDoor());
$door->open('invalid');

$door->open('$ecr@t');
$door->close();
