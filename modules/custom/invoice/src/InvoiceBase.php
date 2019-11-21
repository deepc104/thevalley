<?php

namespace Drupal\invoice;

class InvoiceBase {
	
	public function getInvoiceId() {
	    $invoice_count = \Drupal::entityQuery('invoice')->count()->execute();
		return $invoice_count+1;
	}

}