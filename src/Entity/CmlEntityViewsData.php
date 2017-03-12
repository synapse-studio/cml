<?php

namespace Drupal\cmlservice\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Cml entity entities.
 */
class CmlEntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.

    return $data;
  }

}
