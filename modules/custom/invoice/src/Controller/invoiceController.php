<?php

namespace Drupal\invoice\Controller;

use Drupal\Core\Controller\ControllerBase;
use \Drupal\Core\Entity\EntityInterface;

class invoiceController extends ControllerBase {

  public function generatePDF(EntityInterface $invoice, $destination = \Mpdf\Output\Destination::DOWNLOAD) {
  	    $view_mode = 'pdf';
	    $entity_type = 'invoice';
	    $view_builder = \Drupal::entityTypeManager()->getViewBuilder($entity_type);
	    $build = $view_builder->view($invoice, $view_mode);
	    $output = render($build);

	    $mpdf = new \Mpdf\Mpdf([
	      'tempDir' => 'sites/default/files/tmp',
	      'setAutoTopMargin' => 'pad',
	      'setAutoBottomMargin' => 'stretch',
	      'autoMarginPadding' => 5
	    ]);
	    $mpdf->WriteHTML($output);
	    return $mpdf->Output('invoice-'.$invoice->id() . '.pdf', $destination);
  }

}
