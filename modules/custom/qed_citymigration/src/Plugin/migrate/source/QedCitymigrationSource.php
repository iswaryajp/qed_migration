<?php

declare(strict_types = 1);

namespace Drupal\qed_citymigration\Plugin\migrate\source;

use Drupal\Core\Database\Query\SelectInterface;
use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Source plugin for beer user accounts.
 *
 * @MigrateSource(
 *   id = "qed_citymigration_source"
 * )
 */
final class QedCitymigrationSource extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query(): SelectInterface {
    //Fields of source db table
    $fields = [
      '_id', 
	    'city', 
	    'loc',
      'pop',
      'state'
    ];
    return $this->select('source_city', 'mea')
      ->fields('mea', $fields);
  }

  /**
   * {@inheritdoc}
   */
  public function fields(): array {
    return [
      '_id' => $this->t('City ID'),
      'city' => $this->t('City TITLE'),
      'loc' => $this->t('Location'),
      'pop' => $this->t('Population'),
      'state' => $this->t('State')
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getIds(): array {
    return [
      '_id' => [
        'type' => 'integer',
        'alias' => 'mea',
      ],
    ];
  }

}
