<?php

namespace Drupal\invoice\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Routing\UrlGeneratorInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Link;

/**
* Provides a list controller for invoice entity.
*
* @ingroup invoice
*/
class InvoiceListBuilder extends EntityListBuilder {

/**
* The url generator.
*
* @var \Drupal\Core\Routing\UrlGeneratorInterface
*/
protected $urlGenerator;

/**
* {@inheritdoc}
*/
public static function createInstance(ContainerInterface $container, EntityTypeInterface $entity_type) {
return new static(
$entity_type,
$container->get('entity.manager')->getStorage($entity_type->id()),
$container->get('url_generator')
);
}

/**
* Constructs a new InvoiceListBuilder object.
*
* @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
* The entity type term.
* @param \Drupal\Core\Entity\EntityStorageInterface $storage
* The entity storage class.
* @param \Drupal\Core\Routing\UrlGeneratorInterface $url_generator
* The url generator.
*/
 public function __construct(EntityTypeInterface $entity_type, EntityStorageInterface $storage, UrlGeneratorInterface $url_generator) {
	parent::__construct($entity_type, $storage);
	$this->urlGenerator = $url_generator;
 }

 /**
 * {@inheritdoc}
 */
 public function render() {
 	/*$build['description'] = [
		'#markup' => $this->t('These are fieldable entities. You can manage the fields on the <a href="@adminlink">Term admin page</a>.', [
		'@adminlink' => $this->urlGenerator->generateFromRoute('entity.invoice.settings'),
		]),
	]; */
 	$build['table'] = parent::render();
 	$build['table']['#empty'] = $this->t('No invoice available.');
	$build['table']['#attached']['library'][] = 'invoice/invoice.lib';
	return $build;
 }

 public function load() {
    $entity_query = $this->storage->getQuery();
    $entity_query->condition('id', 0, '<>');
    $entity_query->pager(50);
    $header = $this->buildHeader();
    $entity_query->tableSort($header);
    $invoice_ids = $entity_query->execute();
	return $this->storage->loadMultiple($invoice_ids);
  }

 /**
 * {@inheritdoc}
 */
 public function buildHeader() {
	$header = [
	  'id' => [
	    'data' => $this->t('Invoice #'),
        'field' => 'id',
        'specifier' => 'id',
        'sort' => 'desc'
	  ],
	  'subject' => [
	    'data' => $this->t('Subject Name'),
        'field' => 'subject',
        'specifier' => 'subject',
        'sort' => 'asc'
	  ],
	  'company' => [
	    'data' => $this->t('company Name'),
        'field' => 'company',
        'specifier' => 'company',
        'sort' => 'asc'
	  ],
	  'total' => [
	    'data' => $this->t('Total'),
        'field' => 'total',
        'specifier' => 'total',
        'sort' => 'asc'
	  ],
	  'action' => [
	    'data' => $this->t('Action'),
      ],
	];
	return $header + parent::buildHeader();
 }

 /**
 * {@inheritdoc}
 */
 public function buildRow(EntityInterface $entity) {
	$row['id'] = $entity->id();
	$row['subject'] = $entity->subject->value;
	$row['company'] =  $entity->company->value;
	$row['total'] = $entity->total->value;
	$options = ['absolute' => TRUE, 'attributes' => ['class' => 'btn btn-sm']];
	$view_btn = Link::createFromRoute('View', 'entity.invoice.canonical', ['invoice' => $entity->id()], $options);
	$row['action'] = $view_btn;
	return $row + parent::buildRow($entity);
 }

}