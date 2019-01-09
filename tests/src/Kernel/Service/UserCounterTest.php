<?php

namespace Drupal\Tests\autowire_example\Kernel\Service;

use Drupal\autowire_example\Service\UserCounter;
use Drupal\KernelTests\Core\Entity\EntityKernelTestBase;

/**
 * Test the user counter service.
 */
class UserCounterTest extends EntityKernelTestBase {

  /**
   * The user counter service.
   *
   * @var \Drupal\autowire_example\Service\UserCounter
   */
  private $userCounter;

  /**
   * {@inheritdoc}
   */
  public static $modules = ['autowire_example'];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->userCounter = $this->container->get(UserCounter::class);
  }

  /** @test */
  public function active_users_are_counted() {
    $this->createUser(['status' => 1]);
    $this->createUser(['status' => 1]);

    $this->assertEquals(2, $this->userCounter->getActiveUserCount());
  }

  /** @test */
  public function blocked_users_are_not_counted() {
    $this->createUser(['status' => 1]);
    $this->createUser(['status' => 0]);

    $this->assertEquals(1, $this->userCounter->getActiveUserCount());
  }

}
