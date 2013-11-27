<?php namespace Philipbrown\Money\Test;

use Philipbrown\Money\Money;
use Philipbrown\Money\Currency;

class MoneyTest extends TestCase {

  public function testGetValue()
  {
    $m = Money::init(500, 'USD');
    $this->assertEquals(500, $m->cents);
  }

}
