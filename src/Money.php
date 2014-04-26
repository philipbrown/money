<?php namespace PhilipBrown\Money;

use PhilipBrown\Money\Exception\InvalidCurrencyException;

class Money {

  /**
   * The fractional unit of the value
   *
   * @var int
   */
  protected $fractional;

  /**
   * The currency of the value
   *
   * @var PhilipBrown\Money\Currency
   */
  protected $currency;

  /**
   * Create a new instance of Money
   *
   * @param int $fractional
   * @param PhilipBrown\Money\Currency $currency
   * @return void
   */
  public function __construct($fractional, Currency $currency)
  {
    $this->fractional = $fractional;
    $this->currency = $currency;
  }

  /**
   * A static function to create a new instance of Money.
   * I just wanted dat sexy Ruby syntax if I'm honest,
   * (https://github.com/RubyMoney/money)
   *
   * @param int $value
   * @param string $currency
   * @return PhilipBrown\Money\Money
   */
  public static function init($value, $currency)
  {
    return new Money($value, new Currency($currency));
  }

  /**
   * Get the fractional value of the object
   *
   * @return int
   */
  public function getCentsParameter()
  {
    return $this->fractional;
  }

  /**
   * Get the Currency object
   *
   * @return PhilipBrown\Money\Currency
   */
  public function getCurrencyParameter()
  {
    return $this->currency;
  }

  /**
   * Check the Iso code to evaluate the equality of the currency
   *
   * @param PhilipBrown\Money\Money
   * @return bool
   */
  public function isSameCurrency(Money $money)
  {
    return $this->currency->getIsoCode() == $money->currency->getIsoCode();
  }

  /**
   * Check the equality of two Money objects.
   * First check the currency and then check the value.
   *
   * @param PhilipBrown\Money\Money
   * @return bool
   */
  public function equals(Money $money)
  {
    return $this->isSameCurrency($money) && $this->cents == $money->cents;
  }

  /**
   * Add two the value of two Money objects and return a new Money object.
   *
   * @param PhilipBrown\Money\Money $money
   * @return PhilipBrown\Money\Money
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
   * Subtract the value of one Money object from another and return a new Money object
   *
   * @param PhilipBrown\Money\Money $money
   * @return PhilipBrown\Money\Money
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
   * Multiply two Money objects together and return a new Money object
   *
   * @param int $number
   * @return PhilipBrown\Money\Money
   */
  public function multiply($number)
  {
    return Money::init((int) round($this->cents * $number, 0, PHP_ROUND_HALF_EVEN), $this->currency->getIsoCode());
  }

  /**
   * Divide one Money object and return a new Money object
   *
   * @param int $number
   * @return PhilipBrown\Money\Money
   */
  public function divide($number)
  {
    return Money::init((int) round($this->cents / $number, 0, PHP_ROUND_HALF_EVEN), $this->currency->getIsoCode());
  }

  /**
   * Magic method to dynamically get object parameters
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
