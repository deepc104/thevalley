<?php

namespace Drupal\invoice\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Checks that the submitted value is a unique integer.
 *
 * @Constraint(
 *   id = "NumericConstraint",
 *   label = @Translation("Numeric", context = "Validation"),
 *   type = "string"
 * )
 */
class NumericConstraint extends Constraint {

  // The message that will be shown if the value is not an integer.
  public $notNumeric = '%value is not a Numeric';

}