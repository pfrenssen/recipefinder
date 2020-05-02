<?php

namespace Drupal\recipe;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a recipe entity type.
 */
interface RecipeInterface extends ContentEntityInterface, EntityChangedInterface {

  /**
   * Gets the recipe title.
   *
   * @return string
   *   Title of the recipe.
   */
  public function getTitle();

  /**
   * Sets the recipe title.
   *
   * @param string $title
   *   The recipe title.
   *
   * @return \Drupal\recipe\RecipeInterface
   *   The called recipe entity.
   */
  public function setTitle($title);

  /**
   * Gets the recipe creation timestamp.
   *
   * @return int
   *   Creation timestamp of the recipe.
   */
  public function getCreatedTime();

  /**
   * Sets the recipe creation timestamp.
   *
   * @param int $timestamp
   *   The recipe creation timestamp.
   *
   * @return \Drupal\recipe\RecipeInterface
   *   The called recipe entity.
   */
  public function setCreatedTime($timestamp);

}
