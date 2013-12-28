<?php namespace Philipbrown\Money;

use Philipbrown\Money\Exception\InvalidCurrencyException;

class Money {

  /**
   * @var int
   */
  protected $fractional;

  /**
   * Construct
   */
  public function __construct($fractional, Currency $currency)
  {
    $this->fractional = $fractional;
    $this->currency = $currency;
  }

  /**
   * Init
   *
   * @param $value int
   * @param $currency string
   * @return Money
   */
  public static function init($value, $currency)
  {
    return new Money($value, new Currency($currency));
  }

  /**
   * Get Value Parameter
   *
   * @return int
   */
  public function getCentsParameter()
  {
    return $this->fractional;
  }

  /**
   * Get Currency Parameter
   *
   * @return Money\Currency
   */
  public function getCurrencyParameter()
  {
    return $this->currency;
  }

  /**
   * Is Same Currency
   *
   * @param $money Money
   * @return bool
   */
  public function isSameCurrency(Money $money)
  {
    return $this->currency->getIsoCode() == $money->currency->getIsoCode();
  }

  /**
   * Equals
   *
   * @param $money Money
   * @return bool
   */
  public function equals(Money $money)
  {
    return $this->isSameCurrency($money) && $this->cents == $money->cents;
  }

  /**
   * Add
   *
   * @param $money Money
   * @return Money
   */
  public function add(Money $money)
  {
    if($this->isSameCurrency($money))
    {
      return Money::init($this->cents + $money->cents, $this->currency->getIsoCode());
    }

    throw new InvalidCurrencyException("You can't add two Money objects with different currencies");
  }

  /**
   * Subtract
   *
   * @param $money Money
   * @return Money
   */
  public function subtract(Money $money)
  {
    if($this->isSameCurrency($money))
    {
      return Money::init($this->cents - $money->cents, $this->currency->getIsoCode());
    }

    throw new InvalidCurrencyException("You can't subtract two Money objects with different currencies");
  }

  /**
   * Multiply
   *
   * @param $number int
   * @return Money
   */
  public function multiply($number)
  {
    return Money::init((int) round($this->cents * $number, 0, PHP_ROUND_HALF_EVEN), $this->currency->getIsoCode());
  }

  /**
   * Divide
   *
   * @param $number int
   * @return Money
   */
  public function divide($number)
  {
    return Money::init((int) round($this->cents / $number, 0, PHP_ROUND_HALF_EVEN), $this->currency->getIsoCode());
  }

  /**
   * __get Magic Method
   *
   * @return mixed
   */
  public function __get($param)
  {
    $method = 'get'.ucfirst($param).'Parameter';

    if(method_exists($this, $method))

    return $this->{$method}();
  }

}
