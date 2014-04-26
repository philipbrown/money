<?php

use PhilipBrown\Money\Money;
use PhilipBrown\Money\Currency;

class CurrencyTest extends PHPUnit_Framework_TestCase {

  public function testInit()
  {
    $c = Currency::init('GBP');
    $this->assertEquals(3, $c->getPriority());
    $this->assertEquals('GBP', $c->getIsoCode());
    $this->assertEquals('British Pound', $c->getName());
    $this->assertEquals('£', $c->getSymbol());
    $this->assertEquals(array(), $c->getAlternateSymbols());
    $this->assertEquals('Penny', $c->getSubunit());
    $this->assertEquals(100, $c->getSubunitToUnit());
    $this->assertEquals(true, $c->getSymbolFirst());
    $this->assertEquals('&#x00A3;', $c->getHtmlEntity());
    $this->assertEquals('.', $c->getDecimalMark());
    $this->assertEquals(',', $c->getThousandsSeperator());
    $this->assertEquals(826, $c->getIsoNumeric());
    $this->assertEquals('British Pound', $c);
  }

  /**
   * @expectedException        Philipbrown\Money\Exception\InvalidCurrencyException
   * @expectedExceptionMessage hot dogs is not a valid currency
   */
  public function testUnknownCurrencyException()
  {
    $c = Currency::init('Hot dogs');
  }

}
