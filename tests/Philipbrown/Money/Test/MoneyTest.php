<?php namespace Philipbrown\Money\Test;

use Philipbrown\Money\Money;
use Philipbrown\Money\Currency;

class MoneyTest extends TestCase {

  public function testGetValue()
  {
    $m = Money::init(500, 'USD');
    $this->assertEquals(500, $m->cents);
    $this->assertInstanceOf('Philipbrown\Money\Currency', $m->currency);
  }

  public function testIsSameCurrency()
  {
    $one = Money::init(500, 'USD');
    $two = Money::init(500, 'USD');
    $three = Money::init(500, 'GBP');
    $this->assertTrue($one->isSameCurrency($two));
    $this->assertFalse($one->isSameCurrency($three));
  }

}
