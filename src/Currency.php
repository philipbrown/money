<?php namespace PhilipBrown\Money;

use PhilipBrown\Money\Exception\InvalidCurrencyException;

class Currency {

  /**
   * @var int
   */
  protected $priority;

  /**
   * @var string
   */
  protected $iso_code;

  /**
   * @var string
   */
  protected $name;

  /**
   * @var string
   */
  protected $symbol;

  /**
   * @var array
   */
  protected $alternate_symbols;

  /**
   * @var string
   */
  protected $subunit;

  /**
   * @var int
   */
  protected $subunit_to_unit;

  /**
   * @var bool
   */
  protected $symbol_first;

  /**
   * @var string
   */
  protected $html_entity;

  /**
   * @var string
   */
  protected $decimal_mark;

  /**
   * @var string
   */
  protected $thousands_separator;

  /**
   * @var int
   */
  protected $iso_numeric;

  /**
   * Create a new instance of Currency
   *
   * @param string $name
   * @return void
   */
  public function __construct($name)
  {
    $name = strtolower($name);

    $currencies = array_merge(
      json_decode(file_get_contents(__DIR__.'/config/currency_iso.json'), true),
      json_decode(file_get_contents(__DIR__.'/config/currency_non_iso.json'), true)
    );

    if(!array_key_exists($name, $currencies)) {
      throw new InvalidCurrencyException("$name is not a valid currency");
    }

    $this->priority = $currencies[$name]['priority'];
    $this->iso_code = $currencies[$name]['iso_code'];
    $this->name = $currencies[$name]['name'];
    $this->symbol = $currencies[$name]['symbol'];
    $this->alternate_symbols = $currencies[$name]['alternate_symbols'];
    $this->subunit = $currencies[$name]['subunit'];
    $this->subunit_to_unit = $currencies[$name]['subunit_to_unit'];
    $this->symbol_first = $currencies[$name]['symbol_first'];
    $this->html_entity = $currencies[$name]['html_entity'];
    $this->decimal_mark = $currencies[$name]['decimal_mark'];
    $this->thousands_separator = $currencies[$name]['thousands_separator'];
    $this->iso_numeric = $currencies[$name]['iso_numeric'];
  }

  /**
   * Create a new Currency object
   *
   * @param string $name
   * @return PhilipBrown\Money\Currency
   */
  public static function init($name)
  {
    return new Currency($name);
  }

  /**
   * Get Priority
   *
   * @return string
   */
  public function getPriority()
  {
    return $this->priority;
  }

  /**
   * Get ISO Code
   *
   * @return string
   */
  public function getIsoCode()
  {
    return $this->iso_code;
  }

  /**
   * Get Name
   *
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Get Symbol
   *
   * @return string
   */
  public function getSymbol()
  {
    return $this->symbol;
  }

  /**
   * Get Alternate Symbols
   *
   * @return string
   */
  public function getAlternateSymbols()
  {
    return $this->alternate_symbols;
  }

  /**
   * Get Subunit
   *
   * @return string
   */
  public function getSubunit()
  {
    return $this->subunit;
  }

  /**
   * Get Subunit to unit
   *
   * @return string
   */
  public function getSubunitToUnit()
  {
    return $this->subunit_to_unit;
  }

  /**
   * Get Symbol First
   *
   * @return string
   */
  public function getSymbolFirst()
  {
    return $this->symbol_first;
  }

  /**
   * Get HTML Entity
   *
   * @return string
   */
  public function getHtmlEntity()
  {
    return $this->html_entity;
  }

  /**
   * Get Decimal Mark
   *
   * @return string
   */
  public function getDecimalMark()
  {
    return $this->decimal_mark;
  }

  /**
   * Get Thousands Seperator
   *
   * @return string
   */
  public function getThousandsSeperator()
  {
    return $this->thousands_separator;
  }

  /**
   * Get ISO Numberic
   *
   * @return string
   */
  public function getIsoNumeric()
  {
    return $this->iso_numeric;
  }

  /**
   * @return string
   */
  public function __toString()
  {
    return $this->getName();
  }

}
