<?php

namespace Drupal\ingredient\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the ingredient entity edit forms.
 */
class IngredientForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {

    $entity = $this->getEntity();
    $result = $entity->save();
    $link = $entity->toLink($this->t('View'))->toRenderable();

    $message_arguments = ['%label' => $this->entity->label()];
    $logger_arguments = $message_arguments + ['link' => render($link)];

    if ($result == SAVED_NEW) {
      $this->messenger()->addStatus($this->t('New ingredient %label has been created.', $message_arguments));
      $this->logger('ingredient')->notice('Created new ingredient %label', $logger_arguments);
    }
    else {
      $this->messenger()->addStatus($this->t('The ingredient %label has been updated.', $message_arguments));
      $this->logger('ingredient')->notice('Updated new ingredient %label.', $logger_arguments);
    }

    $form_state->setRedirect('entity.ingredient.canonical', ['ingredient' => $entity->id()]);
  }

}
