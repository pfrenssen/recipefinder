<?php

namespace Drupal\ingredient\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\ingredient\IngredientInterface;

/**
 * Defines the ingredient entity class.
 *
 * @ContentEntityType(
 *   id = "ingredient",
 *   label = @Translation("Ingredient"),
 *   label_collection = @Translation("Ingredients"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\ingredient\IngredientListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "form" = {
 *       "add" = "Drupal\ingredient\Form\IngredientForm",
 *       "edit" = "Drupal\ingredient\Form\IngredientForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   base_table = "ingredient",
 *   admin_permission = "administer ingredient",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "title",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/content/ingredient/add",
 *     "canonical" = "/ingredient/{ingredient}",
 *     "edit-form" = "/admin/content/ingredient/{ingredient}/edit",
 *     "delete-form" = "/admin/content/ingredient/{ingredient}/delete",
 *     "collection" = "/admin/content/ingredient"
 *   },
 *   field_ui_base_route = "entity.ingredient.settings"
 * )
 */
class Ingredient extends ContentEntityBase implements IngredientInterface {

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return $this->get('title')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setTitle($title) {
    $this->set('title', $title);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Title'))
      ->setDescription(t('The title of the ingredient entity.'))
      ->setRequired(TRUE)
      ->setSetting('max_length', 255)
      ->addConstraint('UniqueField')
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -5,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => -5,
      ])
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }

}
