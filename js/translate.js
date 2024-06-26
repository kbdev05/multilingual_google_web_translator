var data = drupalSettings.multilingual_google;
function googleTranslateElementInit() {
  new google.translate.TranslateElement(
    { pageLanguage: "en", includedLanguages: data },
    "google_translate_element"
  );
}
jQuery(document).ready(function () {
  jQuery(".goog-logo-link").empty();
  jQuery(".goog-te-gadget").html(jQuery(".goog-te-gadget").children());
  if (
    document.getElementsByClassName("goog-te-banner-frame skiptranslate")[0] !==
    undefined
  ) {
    document.getElementsByClassName(
      "goog-te-banner-frame skiptranslate"
    )[0].style.display = "none";
    document.body.style.top = "0px";
  }
});
