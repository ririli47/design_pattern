<?php
abstract class Account
{
  protected $successor;
  protected $balance;

  public function setNext(Account $account)
  {
    $this->successor = $account;
  }

  public function pay(float $amountToPay)
  {
    if ($this->canPay($amountToPay))
    {
      echo sprintf('%sで%dドル支払われました' . PHP_EOL, get_called_class(), $amountToPay);
    }
    elseif ($this->successor)
    {
      echo sprintf('%sで支払いできません。次の支払い方法に進みます。' . PHP_EOL, get_called_class());
      $this->successor->pay($amountToPay);
    }
    else
    {
      throw new Exeption('残高が十分なアカウントがありません');
    }
  }

  public function canPay($amount): bool
  {
    return $this->balance >= $amount;
  }
}

class Bank extends Account
{
  protected $balance;

  public function __construct(float $balance)
  {
    $this->balance = $balance;
  }
}

class Paypal extends Account
{
  protected $balance;

  public function __construct(float $balance)
  {
    $this->balance = $balance;
  }
}

class Bitcoin extends Account
{
  protected $balance;

  public function __construct(float $balance)
  {
    $this->balance = $balance;
  }
}

$bank = new Bank(100);
$paypal = new Paypal(200);
$bitcoin = new Bitcoin(300);

$bank->setNext($paypal);
$paypal->setNext($bitcoin);

$bank->pay(298);
