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

  public function testEquals()
  {
    $one = Money::init(500, 'USD');
    $two = Money::init(500, 'USD');
    $three = Money::init(500, 'GBP');
    $four = Money::init(500, 'GBP');
    $five = Money::init(1000, 'USD');
    $six = Money::init(1000, 'GBP');
    $this->assertTrue($one->equals($two));
    $this->assertTrue($three->equals($four));
    $this->assertFalse($one->equals($three));
    $this->assertFalse($one->equals($five));
    $this->assertFalse($one->equals($six));
    $this->assertFalse($three->equals($one));
    $this->assertFalse($three->equals($five));
    $this->assertFalse($three->equals($six));
  }

}
