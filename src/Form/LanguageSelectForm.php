<?php

namespace Drupal\multilingual_google_web_translator\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure language settings for this site.
 */
class LanguageSelectForm extends ConfigFormBase {

  /** 
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'multilingual_google_web_translator.settings';

  /** 
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'google_multilingual_settings';
  }

  /** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

  /** 
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::SETTINGS);

    $form['google_languages'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Select Languages that you want to display in your Multilingual Language Selector on Frontend OR leave it to show All languages.'),
      '#options' => $this->getlanguageOptions(),
      '#default_value' => $config->get('google_languages') ?: [],
    ];

    return parent::buildForm($form, $form_state);
  }
  
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /** 
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration.
    $this->configFactory->getEditable(static::SETTINGS)
      // Set the submitted configuration setting.
      ->set('google_languages', $form_state->getValue('google_languages'))
      ->save();

    parent::submitForm($form, $form_state);
  }

  public function getlanguageOptions(){
   $options = [];
   $options = ["Afrikaans" =>	"af",
   "Albanian" => "sq",
   "Amharic" => "am",
   "Arabic" => "ar",
   "Armenian" => "hy",
   "Azerbaijani" => "az",
   "Basque" => "eu",
   "Belarusian" => "be",
   "Bengali" => "bn",
   "Bosnian" => "bs",
   "Bulgarian" => "bg",
   "Catalan" => "ca",
   "Cebuano" => "ceb",
   "Chinese (Simplified)" => "zh-CN",
   "Chinese (Traditional)" => "zh-TW",
   "Corsican" => "co",
   "Croatian" => "hr",
   "Czech" => "cs",
   "Danish" => "da",
   "Dutch" => "nl",
   "English" => "en",
   "Esperanto" => "eo",
   "Estonian" => "et",
   "Finnish" => "fi",
   "French" => "fr",
   "Frisian" => "fy",
   "Galician" => "gl",
   "Georgian" => "ka",
   "German" => "de",
   "Greek" => "el",
   "Gujarati" => "gu",
   "Haitian Creole" => "ht",
   "Hausa" => "ha",
   "Hawaiian" => "haw",
   "Hebrew" => "he",
   "Hindi" => "hi",
   "Hmong" => "hmn",
   "Hungarian" => "hu",
   "Icelandic" => "is",
   "Igbo" => "ig",
   "Indonesian" => "id",
   "Irish" => "ga",
   "Italian" => "it",
   "Japanese" => "ja",
   "Javanese" => "jv",
   "Kannada" => "kn",
   "Kazakh" => "kk",
   "Khmer" => "km",
   "Kinyarwanda" => "rw",
   "Korean" => "ko",
   "Kurdish" => "ku",
   "Kyrgyz" => "ky",
   "Lao" => "lo",
   "Latin" => "la",
   "Latvian" => "lv",
   "Lithuanian" => "lt",
   "Luxembourgish" => "lb",
   "Macedonian" => "mk",
   "Malagasy" => "mg",
   "Malay" => "ms",
   "Malayalam" => "ml",
   "Maltese" => "mt",
   "Maori" => "mi",
   "Marathi" => "mr",
   "Mongolian" => "mn",
   "Myanmar (Burmese)" => "my",
   "Nepali" => "ne",
   "Norwegian" => "no",
   "Nyanja (Chichewa)" => "ny",
   "Odia (Oriya)" => "or",
   "Pashto" => "ps",
   "Persian" => "fa",
   "Polish" => "pl",
   "Portuguese" => "pt",
   "Punjabi" => "pa",
   "Romanian" => "ro",
   "Russian" => "ru",
   "Samoan" => "sm",
   "Scots Gaelic" => "gd",
   "Serbian" => "sr",
   "Sesotho" => "st",
   "Shona" => "sn",
   "Sindhi" => "sd",
   "Sinhala (Sinhalese)" => "si",
   "Slovak" => "sk",
   "Slovenian" => "sl",
   "Somali" => "so",
   "Spanish" => "es",
   "Sundanese" => "su",
   "Swahili" => "sw",
   "Swedish" => "sv",
   "Tagalog (Filipino)" => "tl",
   "Tajik" => "tg",
   "Tamil" => "ta",
   "Tatar" => "tt",
   "Telugu" => "te",
   "Thai" => 	"th",
   "Turkish" => "tr",
   "Turkmen" => "tk",
   "Ukrainian" => "uk",
   "Urdu" => "ur",
   "Uyghur" => "ug",
   "Uzbek" => "uz",
   "Vietnamese" => "vi",
   "Welsh" => "cy",
   "Xhosa" => "xh",
   "Yiddish" => "yi",
   "Yoruba" => "yo",
   "Zulu" => "zu"];
   $final_options = array_flip($options);
   return $final_options;
    
  }

}
