<?php

namespace Drupal\invoice\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the Numeric constraint.
 */
class NumericValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate($items, Constraint $constraint) {
    foreach ($items as $item) {
      // First check if the value is an numeric i.e. integer or float.
      if (!is_numeric($item->value)) {
        $this->context->addViolation($constraint->notInteger, ['%value' => $item->value]);
      }
    }
  }
}