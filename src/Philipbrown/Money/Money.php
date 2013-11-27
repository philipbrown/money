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
