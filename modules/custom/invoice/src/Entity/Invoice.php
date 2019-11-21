<?php

namespace Drupal\invoice\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the invoice entity.
 *
 * @ingroup invoice
 *
 * @ContentEntityType(
 *   id = "invoice",
 *   label = @Translation("Invoice"),
 *   base_table = "invoice",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "user_id" = "user_id",
 *     "created" = "created",
 *     "changed" = "changed"
 *   },
 * 	 handlers = {
 * 		"view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 * 		"list_builder" = "Drupal\invoice\Entity\Controller\InvoiceListBuilder",
 *   	"form" = {
 *     		"add" = "Drupal\invoice\Form\InvoiceForm",
 *     		"edit" = "Drupal\invoice\Form\InvoiceForm",
 *     		"delete" = "Drupal\invoice\Form\InvoiceDeleteForm",
 *   	},
 *   },
 *   admin_permission = "administer invoice entity",
 *   links = {
 *     "canonical" = "/invoice/{invoice}",
 *     "canonical" = "/invoice/add",
 *     "edit-form" = "/invoice/{invoice}/edit",
 *     "delete-form" = "/invoice/{invoice}/delete",
 *     "collection" = "/invoice/list"
 *   },
 *   field_ui_base_route = "entity.invoice.settings",
 * )
 */
 
 class Invoice extends ContentEntityBase implements ContentEntityInterface {
  use EntityChangedTrait;

  protected $id;  

  public static function preCreate(EntityStorageInterface $storage, array &$values) {
	parent::preCreate($storage, $values);
    	$values += array(
          'user_id' => \Drupal::currentUser()->id(),
        );
  }
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    // Standard field, used as unique if primary index.
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Invoice #'))
      ->setDescription(t('The ID of the Invoice entity.'))
      ->setReadOnly(TRUE)
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'type' => 'string',
        'weight' => -7,
      ])
      ->setDisplayConfigurable('view', TRUE);

    // Standard field, unique outside of the scope of the current project.
    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the Invoice entity.'))
      ->setReadOnly(TRUE);
	  
    $fields['user_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('User Name'))
      ->setDescription(t('The Name of the associated user.'));
	  
    $fields['invoice_date'] = BaseFieldDefinition::create('datetime')
        ->setLabel(t('Date'))
        ->setDescription(t('Invoice date'))
		->setSettings([
			'datetime_type' => 'date'
		  ])
        ->setDisplayOptions('view', [
            'label' => 'inline',
            'type' => 'datetime_default',
			'settings' => [
			  'format_type' => 'medium',
			],
            'weight' => -6,
        ])
        ->setDisplayConfigurable('view', TRUE);
      
    $fields['subject'] = BaseFieldDefinition::create('string')
        ->setLabel(t('Subject'))
        ->setDescription(t('Invoice subject'))
        ->setDisplayOptions('view', [
          'label' => 'inline',
          'type' => 'string',
          'weight' => -5,
        ])
        ->setDisplayConfigurable('view', TRUE);
      
    $fields['company'] = BaseFieldDefinition::create('string')
        ->setLabel(t('Company'))
        ->setDescription(t('Address - Company Name'))
        ->setDisplayOptions('view', [
          'label' => 'inline',
          'type' => 'string',
          'weight' => -4,
        ])
        ->setDisplayConfigurable('view', TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
        ->setLabel(t('Name'))
        ->setDescription(t('Address - Name'))
        ->setDisplayOptions('view', [
          'label' => 'inline',
          'type' => 'string',
          'weight' => -3,
        ])
        ->setDisplayConfigurable('view', TRUE);

    $fields['street'] = BaseFieldDefinition::create('string')
        ->setLabel(t('Street'))
        ->setDescription(t('Address - Street'))
        ->setDisplayOptions('view', [
          'label' => 'inline',
          'type' => 'string',
          'weight' => -2,
        ])
        ->setDisplayConfigurable('view', TRUE);

    $fields['house'] = BaseFieldDefinition::create('string')
        ->setLabel(t('House Number'))
        ->setDescription(t('Address - House Number'))
        ->setDisplayOptions('view', [
          'label' => 'inline',
          'type' => 'string',
          'weight' => -1,
        ])

        ->setDisplayConfigurable('view', TRUE);

    $fields['postal'] = BaseFieldDefinition::create('string')
        ->setLabel(t('Postal Code'))
        ->setDescription(t('Address - Postal Code'))
        ->setDisplayOptions('view', [
          'label' => 'inline',
          'type' => 'string',
          'weight' => 0,
        ])
        ->setDisplayConfigurable('view', TRUE);

    $fields['city'] = BaseFieldDefinition::create('string')
        ->setLabel(t('City'))
        ->setDescription(t('Address - City'))
        ->setDisplayOptions('view', [
          'label' => 'inline',
          'type' => 'string',
          'weight' => 1,
        ])
        ->setDisplayConfigurable('view', TRUE);
     
    $fields['discount'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Discount'))
      ->setDescription(t('Discount'))
      ->setDisplayOptions('view', [
          'label' => 'inline',
          'type' => 'string',
          'weight' => 2,
        ])
        ->setDisplayConfigurable('view', TRUE);
		
     $fields['tax'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Tax'))
      ->setDescription(t('Tax'))
      ->setDisplayOptions('view', [
          'label' => 'inline',
          'type' => 'string',
          'weight' => 2,
        ])
        ->setDisplayConfigurable('view', TRUE);

	  $fields['total'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Total'))
      ->setDescription(t('Total'))
      ->setDisplayOptions('view', [
          'label' => 'inline',
          'type' => 'string',
          'weight' => 2,
        ])
        ->setDisplayConfigurable('view', TRUE);			
		

    $fields['list_details'] = BaseFieldDefinition::create('string_long')
      ->setLabel(t('List details'))
      ->setDescription(t('List Details'))
      ->setDisplayOptions('view', [
          'label' => 'hidden',
          'type' => 'string',
          'weight' => 3,
        ])
        ->setDisplayConfigurable('view', TRUE);  

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
        ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.')); 

    return $fields;
  }
}