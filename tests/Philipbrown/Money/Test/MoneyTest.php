<?php namespace Philipbrown\Money\Test;

use Philipbrown\Money\Money;
use Philipbrown\Money\Currency;

class MoneyTest extends TestCase {

  public function testInstantiate()
  {
    $m = Money::init(500, 'USD');
  }

}
