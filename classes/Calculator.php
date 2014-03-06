<?php
/**
 * Created by PhpStorm.
 * User: davidtang
 * Date: 3/4/14
 * Time: 5:46 PM
 */

class Calculator {
  protected $a, $b;

  public function __construct($a, $b)
  {
    $this->a = $a;
    $this->b = $b;
  }

  public function add()
  {
    return $this->a + $this->b;
  }

} 