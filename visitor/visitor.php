<?php

interface Animal
{
    public function accept(AnimalOperation $operation);
}

interface AnimalOperation
{
    public function visitMonkey(Monkey $monkey);
    public function visitLion(Lion $lion);
    public function visitDolphin(Dolphin $dolphin);
}

class Monkey implements Animal
{
    public function shout()
    {
        echo "きゃっきゃ" . PHP_EOL;
    }

    public function accept(AnimalOperation $operation)
    {
        $operation->visitMonkey($this);
    }
}

class Lion implements Animal
{
    public function roar()
    {
        echo "がおおおお" . PHP_EOL;
    }

    public function accept(AnimalOperation $operation)
    {
        $operation->visitLion($this);
    }
}

class Dolphin implements Animal
{
    public function speak()
    {
        echo "きゅいきゅい" . PHP_EOL;
    }

    public function accept(AnimalOperation $operation)
    {
        $operation->visitDolphin($this);
    }
}


class Speak implements AnimalOperation
{
    public function visitMonkey(Monkey $monkey)
    {
        $monkey->shout();
    }

    public function visitLion(Lion $lion)
    {
        $lion->roar();
    }

    public function visitDolphin(Dolphin $dolphin)
    {
        $dolphin->speak();
    }
}

class Jump implements AnimalOperation
{
    public function visitMonkey(Monkey $monkey)
    {
        echo '20フィートジャンプして木に登った！';
    }

    public function visitLion(Lion $lion)
    {
        echo '7フィートジャンプして着地した！';
    }

    public function visitDolphin(Dolphin $dolphin)
    {
        echo '水上を少し進んでから姿を消した';
    }
}


$monkey = new Monkey();
$lion = new Lion();
$dolphin = new Dolphin();

$speak = new Speak();

$jump = new Jump();

$monkey->accept($speak);   // ウキャッ、キャッ
$monkey->accept($jump);    // 20フィートジャンプして木に登った！

$lion->accept($speak);     // ガオォオオ
$lion->accept($jump);      // 7フィートジャンプして着地した！

$dolphin->accept($speak);  // キキキ、キキキ
$dolphin->accept($jump);   // 水上を少し進んでから姿を消した
