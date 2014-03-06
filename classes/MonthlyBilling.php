<?php
/**
 * Created by PhpStorm.
 * User: davidtang
 * Date: 3/4/14
 * Time: 5:54 PM
 */

class MonthlyBilling {
  protected $cr;
  protected $campaigns;

  public function __construct($campaigns, $cr = 0.10)
  {
    $this->campaigns = $campaigns;
    $this->cr = $cr;
  }

  public function total()
  {
    $total = 0;

    foreach($this->campaigns as $campaign) {
      $total = $total + $campaign['spent'];
    }

    return $total * $this->cr;
  }

  public function getInvoiceItems()
  {
    $billItems = [];

    foreach ($this->campaigns as $campaign) {
      $billItems[] = [
        'campaign' => $campaign['campaign'],
        'total' => $campaign['spent'] * $this->cr
      ];
    }

    return $billItems;
  }
} 