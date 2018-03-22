<?php
class Sheep
{
    protected $name;
    protected $category;

    public function __construct(string $name, string $category = "オオツノヒツジ")
    {
        $this->name = $name;
        $this->category = $category;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setCategory(string $category)
    {
        $this->category = $category;
    }

    public function getcategory()
    {
        return $this->category;
    }

}


$original = new Sheep("ジョリー");
echo $original->getName();
echo $original->getcategory();

$cloned = clone $original;
$cloned->setName("ドリー");
echo $cloned->getName();
echo $cloned->getCategory();
