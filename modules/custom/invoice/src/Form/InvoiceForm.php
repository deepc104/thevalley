<?php

namespace Drupal\invoice\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Serialization\Json;

/**
* Form controller for the content_entity_example entity edit forms.
*
* @ingroup content_entity_example
*/
class InvoiceForm extends ContentEntityForm {

	/**
	* {@inheritdoc}
	*/
	public function buildForm(array $form, FormStateInterface $form_state) {
		$form = parent::buildForm($form, $form_state);
		$invoice = $this->entity;

	    $form['#tree'] = TRUE;
		$next_invoice_num = \Drupal::service('invoice.base')->getInvoiceId();
		$invoice_id = ($invoice->id()<>'') ? $invoice->id() : $next_invoice_num;

		$form['id'] = [
		  '#type' => 'textfield',
		  '#title' => $this->t('Invoice #'),
		  '#default_value' => $invoice_id,
		  '#disabled' => TRUE
		];
		$form['invoice_date'] = [
		  '#type' => 'textfield',
		  '#title' => $this->t('Date'),
		  '#default_value' => isset($invoice->invoice_date->value) ?  date('Y-m-d', strtotime($invoice->invoice_date->value)): '',
		  '#attributes' => ['autocomplete' => 'off', 'data-drupal-date-format' => 'Y-m-d', 'class' =>  ['datePicker']],
		  '#required' => TRUE
		];		
		$form['subject'] = [
		  '#type' => 'textfield',
		  '#title' => $this->t('Subject'),
		  '#default_value' => ($invoice->subject->value)? $invoice->subject->value : '',
		  '#required' => TRUE
		];
		
		$form['name'] = [
		  '#type' => 'textfield',
		  '#title' => $this->t('Name'),
     	  '#default_value' => ($invoice->name->value)? $invoice->name->value : '',
		  '#required' => TRUE
		];
		$form['company'] = [
		  '#type' => 'textfield',
		  '#title' => $this->t('Company'),
     	  '#default_value' => ($invoice->company->value)? $invoice->company->value : '',
		  '#required' => TRUE
		];
		$form['street'] = [
		  '#type' => 'textfield',
		  '#title' => $this->t('Street'),
     	  '#default_value' => ($invoice->street->value)? $invoice->street->value : '',
     	  '#required' => TRUE
		];
		$form['house'] = [
		  '#type' => 'textfield',
		  '#title' => $this->t('House #'),
     	  '#default_value' => ($invoice->house->value)? $invoice->house->value : '',
     	  '#required' => TRUE
		];
		$form['postal'] = [
		  '#type' => 'textfield',
		  '#title' => $this->t('Postal Code'),
     	  '#default_value' => ($invoice->postal->value)? $invoice->postal->value : '',
     	  '#required' => TRUE
		];
		$form['city'] = [
		  '#type' => 'textfield',
		  '#title' => $this->t('City'),
     	  '#default_value' => ($invoice->city->value)? $invoice->city->value : '',
     	  '#required' => TRUE
		];

		$list = Json::decode($invoice->list_details->value);
		$form['list'] = [
            '#type' => 'details',
            '#title' => $this->t('List Item'),
            '#prefix' => '<div id="list-row-wrapper">',
            '#suffix' => '</div>',
            '#attributes' => ['class'=> ['container-inline']],
            '#open' => TRUE
        ];
        $form['list']['removed_items'] = [
		     '#type' => 'hidden',
			 '#default_value' => '',
			 '#attributes' => [
			   'class' => ['removed_items'],
			 ],
		];
        $form['list']['actions'] = [
	      '#type' => 'actions',
	    ];

 		if ($form_state->getFormObject()->getOperation() == 'edit' && !($form_state->get('ajax_call'))) {
 			$num_rows = count($list);
			$name_field = $form_state->set('num_names', $num_rows);
		}

		$num_rows = $form_state->get('num_names');
	    if ($num_rows === NULL) {
	      $name_field = $form_state->set('num_names', 1);
	      $num_rows = 1;
	    }

        for ($i = 0; $i < $num_rows; $i++) {
        	$form['list']['list_item'][$i] = [
                '#type' => 'fieldset',
                 '#attributes' => [
		              'class' => ['list-item-fieldset list-item-fieldset-'.$i],
		          ],
            ];
            $form['list']['list_item'][$i]['description']= [
			'#type' => 'textfield',
			'#title' => $this->t('Description')."<span class='err'>*</span>",
			'#maxlength' => 64,
			'#size' => 64,
			'#attributes' => [
		        'class' => ['field-desc-'.$i],
		     ],
			'#default_value' => (isset($list[$i]) && isset($list[$i]['description'])) ? $list[$i]['description'] : '',
			//'#required' => TRUE
		  ];
		  $form['list']['list_item'][$i]['unit_cost'] = [
			'#type' => 'textfield',
			'#title' => $this->t('Unit Cost')."<span class='err'>*</span>",
			'#maxlength' => 64,
			'#size' => 64,
			'#attributes' => [
		        'class' => ['calculate_field field-unitcost field-unitcost-'.$i],
		     ],
			'#default_value' =>  (isset($list[$i]) && isset($list[$i]['unit_cost'])) ? $list[$i]['unit_cost'] : '',
			//'#required' => TRUE
		  ];
		 
		   $form['list']['list_item'][$i]['quantity'] = [
			'#type' => 'textfield',
			'#title' => $this->t('Quantity')."<span class='err'>*</span>",
			'#maxlength' => 10,
			'#size' => 64,
			'#attributes' => [
		        'class' => ['calculate_field field-quantity field-quantity-'.$i],
		     ],
			'#default_value' => (isset($list[$i]) && isset($list[$i]['quantity']))  ? $list[$i]['quantity'] : '',
			//'#required' => TRUE
		  ];
		  $form['list']['list_item'][$i]['subtotal'] = [
			'#type' => 'textfield',
			'#title' => $this->t('Subtotal')."<span class='err'>*</span>",
			'#attributes' => [
		        'class' => ['update-field field-subtotal field-subtotal-'.$i],
				'readonly' => 'readonly'
		     ],
			'#default_value' => (isset($list[$i]) && isset($list[$i]['subtotal']))  ? $list[$i]['subtotal'] : 0,
			'#suffix' => '<div class="error-msg error-msg'.$i.'"></div>'
		  ];

            if ($num_rows > 1) {
                $form['list']['list_item'][$i]['remove_row'] = [
                    '#type' => 'button',
                    '#value' => t('Remove'),
                    '#name'  => t('remove'.$i),
                    '#attributes' => [
                        'class' => ['btn', 'btn-small','remove-btn'],
                        'data-row' => $i,
                    ],					
                ];
            }
        }

		$form['list']['add_row'] = [
		    '#type' => 'submit',
		    '#value' => t('Add more'),
		    '#submit' => ['::addOne'],
		    '#limit_validation_errors' => [],
		    '#ajax' => [
		        'callback' => '::addmoreCallback',
		        'wrapper' => 'list-row-wrapper',
		    ],
		    '#weight' => 20
		];
		
		$form['list']['tax'] = [
			'#type' => 'textfield',
			'#title' => $this->t('Tax in %'),
			'#maxlength' => 5,
			'#size' => 64,
			'#attributes' => [
		        'class' => ['calculate_field field-tax'],
		     ],
			'#default_value' => ($invoice->tax->value)  ? $invoice->tax->value : 0,
			'#required' => TRUE
		];
		$form['list']['discount'] = [
			'#type' => 'textfield',
			'#maxlength' => 5,
			'#title' => $this->t('Discount in %'),
			'#size' => 64,
			'#attributes' => [
		        'class' => ['calculate_field field-discount'],
		     ],
			'#default_value' => ($invoice->discount->value)  ? $invoice->discount->value : 0,
			'#required' => TRUE
		];
		$form['list']['total'] = [
			'#type' => 'textfield',
			'#title' => t('Total'),
			'#attributes' => [
			    'class' => ['field-total'],
				'readonly' => 'readonly'
			 ],
			'#default_value' => ($invoice->total->value) ? $invoice->total->value: 0,
		];

        $form_state->setCached(FALSE);
		$form['#attached']['library'][] = 'invoice/invoice.lib';

		/* Add item ends here */		
		return $form;
	}
	
	public function addmoreCallback(array &$form, FormStateInterface $form_state) {
		return $form['list'];
	}

	public function addOne(array &$form, FormStateInterface $form_state) {
		/*$removed = 0;
		$removed_items  = (!empty($form['list'] && isset($form['list']['removed_items']))) ? $form['list']['removed_items']['#value'] : '';
		if(isset($removed_items)){
		   $removed = explode(',',$removed_items);
		   $rem = (!empty($removed[0])) ?  count(array_unique($removed)):0;
		}
		if($rem > 0){
			$name_field = $form_state->get('num_names') - $removed;
		}else{
			$name_field = $form_state->get('num_names');
		}*/
		$name_field = $form_state->get('num_names');
	    $add_button = $name_field + 1;
	    $form_state->set('num_names', $add_button);
	    $form_state->set('ajax_call', 1);
	    $form_state->setRebuild();
	}

	/**
	* {@inheritdoc}
	*/
	public function save(array $form, FormStateInterface $form_state) {
		$keys = [];
		$entity = $this->getEntity();
		$list = $form_state->getValue('list');
		if(!empty($list) && isset($list['removed_items'])){
		   $keys = explode(',',$list['removed_items']);
		}
		if(!empty($keys)) {
			foreach($keys as $k){
				unset($list['list_item'][$k]);
			}
		}
		unset($list['removed_items']);
		//to reset indexex
		$new_list = array_merge($list['list_item']);		
		$entity->list_details->value = Json::encode($new_list);
		$entity->tax->value = $list['tax'];
		$entity->discount->value = $list['discount'];
		$entity->total->value = $list['total'];
		$entity->save();
		$form_state->setRedirect('entity.invoice.collection');
	}
}