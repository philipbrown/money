<?php namespace Philipbrown\Money;

class Money {

  /**
   * @var int
   */
  protected $value;

  /**
   * Construct
   */
  public function __construct($value, Currency $currency)
  {
    $this->value = $value;
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

}
