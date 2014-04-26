<?php

use PhilipBrown\Money\Money;
use PhilipBrown\Money\Currency;

class MoneyTest extends PHPUnit_Framework_TestCase {

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

  public function testAdd()
  {
    $one = Money::init(500, 'USD');
    $two = Money::init(500, 'USD');
    $three = $one->add($two);
    $this->assertEquals(1000, $three->cents);
  }

  /**
   * @expectedException        Philipbrown\Money\Exception\InvalidCurrencyException
   * @expectedExceptionMessage You can't add two Money objects with different currencies
   */
  public function testAddException()
  {
    $one = Money::init(500, 'USD');
    $two = Money::init(500, 'GBP');
    $three = $one->add($two);
  }

  public function testSubtract()
  {
    $one = Money::init(500, 'USD');
    $two = Money::init(100, 'USD');
    $three = $one->subtract($two);
    $this->assertEquals(400, $three->cents);
  }

  /**
   * @expectedException        Philipbrown\Money\Exception\InvalidCurrencyException
   * @expectedExceptionMessage You can't subtract two Money objects with different currencies
   */
  public function testSubtractException()
  {
    $one = Money::init(500, 'USD');
    $two = Money::init(100, 'GBP');
    $three = $one->subtract($two);
  }

  public function testMultiply()
  {
    $one = Money::init(100, 'USD');
    $two = $one->multiply(2);
    $this->assertEquals(200, $two->cents);

    $three = Money::init(1000, 'USD');
    $four = $three->multiply(.20);
    $this->assertEquals(200, $four->cents);
  }

  public function testDivide()
  {
    $one = Money::init(200, 'USD');
    $two = $one->divide(2);
    $this->assertEquals(100, $two->cents);

    $three = Money::init(1000, 'USD');
    $four = $three->divide(.20);
    $this->assertEquals(5000, $four->cents);
  }

}
