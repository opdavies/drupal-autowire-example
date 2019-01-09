<?php

namespace Drupal\autowire_example\Controller;

use Drupal\autowire_example\Service\UserCounter;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * An example controller.
 */
class ExampleController {

  use StringTranslationTrait;

  /**
   * The user counter service.
   *
   * @var \Drupal\autowire_example\Service\UserCounter
   */
  private $userCounter;

  /**
   * ExampleController constructor.
   *
   * @param \Drupal\autowire_example\Service\UserCounter $user_counter
   *   The user counter service.
   */
  public function __construct(UserCounter $user_counter) {
    $this->userCounter = $user_counter;
  }

  /**
   * Display the username of the current user.
   *
   * @return array
   *   A render array.
   */
  public function __invoke() {
    return [
      '#markup' => $this->formatPlural(
        number_format($this->userCounter->getActiveUserCount()),
        'This site has 1 active user.',
        'This site has @count active users.'
      )
    ];
  }
  
}
