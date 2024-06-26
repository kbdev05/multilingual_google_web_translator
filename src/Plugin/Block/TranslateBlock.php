<?php

namespace Drupal\multilingual_google_web_translator\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "google_translator",
 *   admin_label = @Translation("Google Translation Block"),
 * )
 */

class TranslateBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $settings = [];
    $configsettings = \Drupal::config('multilingual_google_web_translator.settings');
    if($configsettings->get('google_languages')){
    $settings = implode(",",array_keys(array_filter($configsettings->get('google_languages'))));
    }
    return [
        '#theme' => 'googletranslate',
        '#google_translate' => [] ,
        '#attached' => array(
            'library' => array('multilingual_google_web_translator/translategoogle'),
            'drupalSettings' => ['multilingual_google' =>  $settings]
            ),
      ];
  }

}