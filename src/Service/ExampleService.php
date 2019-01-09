<?php

namespace Drupal\autowire_example\Service;

use Drupal\Core\Session\AccountProxyInterface;

class ExampleService {

  /**
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  private $currentUser;

  /**
   * Bar constructor.
   *
   * @param \Drupal\Core\Session\AccountProxyInterface $current_user
   *   The current user.
   */
  public function __construct(AccountProxyInterface $current_user) {
    $this->currentUser = $current_user;
  }

  public function __invoke() {
    dump($this->currentUser->id());
    die;
  }

}
