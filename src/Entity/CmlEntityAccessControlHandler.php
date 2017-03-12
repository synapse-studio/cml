<?php

namespace Drupal\cmlservice\Entity;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Cml entity entity.
 *
 * @see \Drupal\cmlservice\Entity\CmlEntity.
 */
class CmlEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\cmlservice\Entity\CmlEntityInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished cml entity entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published cml entity entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit cml entity entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete cml entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add cml entity entities');
  }

}
