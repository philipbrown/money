<?php namespace Philipbrown\Money;

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
   * @param Money
   * @return bool
   */
  public function isSameCurrency(Money $money)
  {
    return $this->currency->getIsoCode() == $money->currency->getIsoCode();
  }

  /**
   * Equals
   *
   * @param Money
   * @return bool
   */
  public function equals(Money $money)
  {
    return $this->isSameCurrency($money) && $this->cents == $money->cents;
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
