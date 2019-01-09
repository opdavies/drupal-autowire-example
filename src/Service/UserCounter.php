<?php

namespace Drupal\autowire_example\Service;

use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * A service to count users.
 */
class UserCounter {

  /**
   * The user storage instance.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  private $userStorage;

  /**
   * UserCounter constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->userStorage = $entity_type_manager->getStorage('user');
  }

  /**
   * Count the active users.
   *
   * @return integer
   *   The number of active users.
   */
  public function getActiveUserCount() {
    return (int) $this->userStorage
      ->getQuery()
      ->condition('status', 1)
      ->count()
      ->execute();
  }

}
