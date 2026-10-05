(function () {
  // Load Google Website Translator (English page -> Hindi)
  window.googleTranslateElementInit = function () {
    new google.translate.TranslateElement(
      { pageLanguage: 'en', includedLanguages: 'en,hi', autoDisplay: false },
      'google_translate_element'
    );
  };
  var s = document.createElement('script');
  s.src = 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
  s.async = true;
  document.head.appendChild(s);

  // Current language comes from Google's cookie
  function currentLang() {
    var m = document.cookie.match(/(?:^|;\s*)googtrans=\/en\/(\w+)/);
    return m ? m[1] : 'en';
  }

  function writeCookie(value, expire) {
    var base = 'googtrans=' + value + '; path=/' + (expire ? '; expires=Thu, 01 Jan 1970 00:00:00 GMT' : '');
    document.cookie = base;                                   // current host
    if (location.hostname.indexOf('.') > -1) {                // also parent domain (not for localhost)
      document.cookie = base + '; domain=.' + location.hostname;
    }
  }

  function setLang(l) {
    if (l === currentLang()) return;
    if (l === 'en') writeCookie('', true);
    else writeCookie('/en/' + l, false);
    location.reload();
  }

  // Mark the active button
  var lang = currentLang();
  document.querySelectorAll('.lang-btn').forEach(function (b) {
    b.classList.toggle('active', b.dataset.lang === lang);
    b.addEventListener('click', function () { setLang(b.dataset.lang); });
  });
  document.documentElement.lang = lang;
})();