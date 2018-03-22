<?php
class KaraKTea
{

}

class TeaMaker
{
    protected $availableTea = [];

    public function make($preference)
    {
        if(empty($this->availableTea[$preference]))
        {
            $this->availableTea[$preference] = new KarakTea();
        }

        return $this->availableTea[$preference];
    }
}

class TeaShop
{
    protected $orders;
    protected $teaMaker;

    public function __construct(TeaMaker $teaMaker)
    {
        $this->teaMaker = $teaMaker;
    }

    public function takeOrder(string $teaType, int $table)
    {
        $this->orders[$table] = $this->teaMaker->make($teaType);
    }

    public function serve()
    {
        foreach($this->orders as $table => $tea)
        {
            echo "テーブル# " . $table . "にお茶を出す\n";
        }
    }
}

$teaMaker = new TeaMaker();
$shop = new TeaShop($teaMaker);

$shop->takeOrder('砂糖少なめ', 1);
$shop->takeOrder('ミルク多め', 2);
$shop->takeOrder('砂糖なし', 5);

$shop->serve();
