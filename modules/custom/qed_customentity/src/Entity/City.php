<?php

namespace Drupal\qed_customentity\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the city entity.
 *
 * @ContentEntityType(
 *   id = "qed_city",
 *   label = @Translation("City"),
 *   handlers = {
 *     "storage" = "Drupal\Core\Entity\Sql\SqlContentEntityStorage",
 *   },
 *   base_table = "qed_city",
 *   data_table = "qed_city_field_data",
 *   entity_keys = {
 *     "id" = "id",
 *     "_id" = "_id",
 *     "title" = "city",
 *     "loc" = "loc",
 *     "pop" = "pop",
 *     "state" = "state",
 *   },
 * )
 */
class City extends ContentEntityBase implements ContentEntityInterface {
    public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
        $fields = [];
        
        $fields['id'] = BaseFieldDefinition::create('integer')
        ->setLabel(t('ID'))
        ->setDescription(t('The ID of the city.'))
        ->setReadOnly(TRUE);

        $fields['title'] = BaseFieldDefinition::create('string')
          ->setLabel(t('City Title'))
          ->setDescription(t('The title of the City'))
          ->setRequired(TRUE);
        
        $fields['loc'] = BaseFieldDefinition::create('string')
          ->setLabel(t('City location'))
          ->setDescription(t('The location of the City'))
          ->setRequired(TRUE);
        
        $fields['pop'] = BaseFieldDefinition::create('string')
          ->setLabel(t('City population'))
          ->setDescription(t('The population of the City'))
          ->setRequired(TRUE);
        
        $fields['state'] = BaseFieldDefinition::create('string')
          ->setLabel(t('State'))
          ->setDescription(t('The State of the City'))
          ->setRequired(TRUE);

        return $fields;
      }
}