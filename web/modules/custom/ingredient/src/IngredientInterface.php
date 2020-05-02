<?php

namespace Drupal\ingredient;

use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Provides an interface defining an ingredient entity type.
 */
interface IngredientInterface extends ContentEntityInterface {

  /**
   * Gets the ingredient title.
   *
   * @return string
   *   Title of the ingredient.
   */
  public function getTitle();

  /**
   * Sets the ingredient title.
   *
   * @param string $title
   *   The ingredient title.
   *
   * @return \Drupal\ingredient\IngredientInterface
   *   The called ingredient entity.
   */
  public function setTitle($title);

}
