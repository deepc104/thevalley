<?php 
namespace Drupal\invoice\Form;

use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

class InvoiceDeleteForm extends ContentEntityConfirmFormBase {

 public $invoice;
 
  /**
   * {@inheritdoc}
   */
 public function getFormId(){
   return 'delete_invoice_form';
 }
 
  /**
   * {@inheritdoc}
   */
 public function getQuestion(){
	$this->invoice = $this->getEntity();
    return $this->t('Are you sure you want to delete this invoice #@invoice.', ['@invoice' => $this->invoice->id()]);
 }
 
  /**
   * {@inheritdoc}
   */
 public function getConfirmText() {
	return $this->t('Delete');
 }
 
  /**
   * {@inheritdoc}
   */
  public function getCancelURL() {
    return new Url('entity.invoice.collection');
  }
  
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state){
      return parent::validateForm($form, $form_state);
  }
  
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state){
       $this->invoice->delete();
	   $this->logger('invoice')->notice('deleted %title.',
		[
		'%title' => $this->invoice->label(),
		]);
   	   $form_state->setRedirect('entity.invoice.collection');
  }
}