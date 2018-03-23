<?php
abstract class Builder
{
    final public function build()
    {
        $this->test();
        $this->lint();
        $this->assemble();
        $this->deploy();
    }

    abstract public function test();
    abstract public function lint();
    abstract public function assemble();
    abstract public function deploy();
}

class AndroidBuilder extends Builder
{
    public function test()
    {
        echo "Androidのテストを実行" .PHP_EOL;
    }
    public function lint()
    {
        echo "AndroidのLintを実行" .PHP_EOL;
    }
    public function assemble()
    {
        echo "Androidのビルドアセンブリを実行" .PHP_EOL;
    }
    public function deploy()
    {
        echo "Androidのデプロイを実行" .PHP_EOL;
    }
}

class IosBuilder extends Builder
{
    public function test()
    {
        echo "iosのテストを実行" .PHP_EOL;
    }
    public function lint()
    {
        echo "iosのLintを実行" .PHP_EOL;
    }
    public function assemble()
    {
        echo "iosのビルドアセンブリを実行" .PHP_EOL;
    }
    public function deploy()
    {
        echo "iosのデプロイを実行" .PHP_EOL;
    }
}

$androidBuilder = new AndroidBuilder();
$androidBuilder->build();

$iosBuilder = new IosBuilder();
$iosBuilder->build();
