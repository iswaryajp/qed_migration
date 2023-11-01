<?php

declare(strict_types = 1);

namespace Drupal\custom_migration\Plugin\migrate\source;

use Drupal\Core\Database\Query\SelectInterface;
use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Source plugin for beer user accounts.
 *
 * @MigrateSource(
 *   id = "custom_migration_source"
 * )
 */
final class CustomMigrationSource extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query(): SelectInterface {
    $fields = [
      'id', 
	  'title', 
	  'description'
    ];
    return $this->select('source_city', 'mea')
      ->fields('mea', $fields);
  }

  /**
   * {@inheritdoc}
   */
  public function fields(): array {
    return [
      'id' => $this->t('Account ID'),
      'title' => $this->t('City TITLE'),
      'description' => $this->t('Description'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getIds(): array {
    return [
      'id' => [
        'type' => 'integer',
        'alias' => 'mea',
      ],
    ];
  }

}
