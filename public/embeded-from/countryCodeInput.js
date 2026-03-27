function countryCodeInput() {
  const countryCodes = [
    { value: '{ "code": "+93", "symbol": "AF" }', name: '+93 Afghanistan' },
    { value: '{ "code": "+355", "symbol": "AL" }', name: '+355 Albania' },
    { value: '{ "code": "+213", "symbol": "DZ" }', name: '+213 Algeria' },
    {
      value: '{ "code": "+1", "symbol": "AS" }',
      name: '+1648 American Samoa'
    },
    { value: '{ "code": "+376", "symbol": "AD" }', name: '+376 Andorra' },
    { value: '{ "code": "+244", "symbol": "AO" }', name: '+244 Angola' },
    { value: '{ "code": "+1", "symbol": "AI" }', name: '+1264 Anguilla' },
    {
      value: '{ "code": "+1", "symbol": "AG" }',
      name: '+1268 Antigua and Barbuda'
    },
    { value: '{ "code": "+54", "symbol": "AR" }', name: '+54 Argentina' },
    { value: '{ "code": "+374", "symbol": "AM" }', name: '+374 Armenia' },
    { value: '{ "code": "+297", "symbol": "AW" }', name: '+297 Aruba' },
    { value: '{ "code": "+61", "symbol": "AU" }', name: '+61 Australia' },
    { value: '{ "code": "+43", "symbol": "AT" }', name: '+43 Austria' },
    { value: '{ "code": "+994", "symbol": "AZ" }', name: '+994 Azerbaijan' },
    { value: '{ "code": "+1", "symbol": "BS" }', name: '+1242 Bahamas' },
    { value: '{ "code": "+973", "symbol": "BH" }', name: '+973 Bahrain' },
    { value: '{ "code": "+880", "symbol": "BD" }', name: '+880 Bangladesh' },
    { value: '{ "code": "+1", "symbol": "BB" }', name: '+1246 Barbados' },
    { value: '{ "code": "+375", "symbol": "BY" }', name: '+375 Belarus' },
    { value: '{ "code": "+32", "symbol": "BE" }', name: '+32 Belgium' },
    { value: '{ "code": "+501", "symbol": "BZ" }', name: '+501 Belize' },
    { value: '{ "code": "+229", "symbol": "BJ" }', name: '+229 Benin' },
    { value: '{ "code": "+1", "symbol": "BM" }', name: '+1441 Bermuda' },
    { value: '{ "code": "+975", "symbol": "BT" }', name: '+975 Bhutan' },
    { value: '{ "code": "+591", "symbol": "BO" }', name: '+591 Bolivia' },
    {
      value: '{ "code": "+387", "symbol": "BA" }',
      name: '+387 Bosnia and Herzegovina'
    },
    { value: '{ "code": "+267", "symbol": "BW" }', name: '+267 Botswana' },
    { value: '{ "code": "+55", "symbol": "BR" }', name: '+55 Brazil' },
    {
      value: '{ "code": "+246", "symbol": "IO" }',
      name: '+246 British Indian Ocean Territory'
    },
    {
      value: '{ "code": "+1", "symbol": "VG" }',
      name: '+1284 British Virgin Islands'
    },
    { value: '{ "code": "+673", "symbol": "BN" }', name: '+673 Brunei' },
    { value: '{ "code": "+359", "symbol": "BG" }', name: '+359 Bulgaria' },
    { value: '{ "code": "+226", "symbol": "BF" }', name: '+226 Burkina Faso' },
    { value: '{ "code": "+257", "symbol": "BI" }', name: '+257 Burundi' },
    { value: '{ "code": "+855", "symbol": "KH" }', name: '+855 Cambodia' },
    { value: '{ "code": "+237", "symbol": "CM" }', name: '+237 Cameroon' },
    { value: '{ "code": "+1", "symbol": "CA" }', name: '+1 Canada' },
    { value: '{ "code": "+238", "symbol": "CV" }', name: '+238 Cape Verde' },
    {
      value: '{ "code": "+599", "symbol": "BQ" }',
      name: '+599 Caribbean Netherlands'
    },
    {
      value: '{ "code": "+1", "symbol": "KY" }',
      name: '+1345 Cayman Islands'
    },
    {
      value: '{ "code": "+236", "symbol": "CF" }',
      name: '+236 Central African Republic'
    },
    { value: '{ "code": "+235", "symbol": "TD" }', name: '+235 Chad' },
    { value: '{ "code": "+56", "symbol": "CL" }', name: '+56 Chile' },
    { value: '{ "code": "+86", "symbol": "CN" }', name: '+86 China' },
    {
      value: '{ "code": "+61", "symbol": "CX" }',
      name: '+61 Christmas Islands'
    },
    {
      value: '{ "code": "+61", "symbol": "CC" }',
      name: '+61 Cocos (Keeling) Islands'
    },
    { value: '{ "code": "+57", "symbol": "CO" }', name: '+57 Colombia' },
    { value: '{ "code": "+269", "symbol": "KM" }', name: '+269 Comoros' },
    { value: '{ "code": "+243", "symbol": "CD" }', name: '+243 Congo(DRC)' },
    {
      value: '{ "code": "+242", "symbol": "CG" }',
      name: '+242 Congo(Rebuplic)'
    },
    { value: '{ "code": "+682", "symbol": "CK" }', name: '+682 Cook Islands' },
    { value: '{ "code": "+506", "symbol": "CR" }', name: '+506 Costa Rica' },
    { value: '{ "code": "+225", "symbol": "CI" }', name: '+225 Côte d’Ivoire' },
    { value: '{ "code": "+385", "symbol": "HR" }', name: '+385 Croatia' },
    { value: '{ "code": "+53", "symbol": "CU" }', name: '+53 Cuba' },
    { value: '{ "code": "+599", "symbol": "CW" }', name: '+599 Curaçao' },
    { value: '{ "code": "+357", "symbol": "CY" }', name: '+357 Cyprus' },
    {
      value: '{ "code": "+420", "symbol": "CZ" }',
      name: '+420 Czech Republic'
    },
    { value: '{ "code": "+45", "symbol": "DK" }', name: '+45 Denmark' },
    { value: '{ "code": "+253", "symbol": "DJ" }', name: '+253 Djibouti' },
    { value: '{ "code": "+1", "symbol": "DM" }', name: '+1767 Dominica' },
    {
      value: '{ "code": "+1", "symbol": "DO" }',
      name: '+1 Dominican Republic'
    },
    { value: '{ "code": "+593", "symbol": "EC" }', name: '+593 Ecuador' },
    { value: '{ "code": "+20", "symbol": "EG" }', name: '+20 Egypt' },
    { value: '{ "code": "+503", "symbol": "SV" }', name: '+503 El Salvador' },
    {
      value: '{ "code": "+240", "symbol": "GQ" }',
      name: '+240 Equatorial Guinea'
    },
    { value: '{ "code": "+291", "symbol": "ER" }', name: '+291 Eritrea' },
    { value: '{ "code": "+372", "symbol": "EE" }', name: '+372 Estonia' },
    { value: '{ "code": "+251", "symbol": "ET" }', name: '+251 Ethiopia' },
    {
      value: '{ "code": "+500", "symbol": "FK" }',
      name: '+500 Falkland Islands'
    },
    { value: '{ "code": "+298", "symbol": "FO" }', name: '+298 Faroe Islands' },
    { value: '{ "code": "+679", "symbol": "FJ" }', name: '+679 Fiji' },
    { value: '{ "code": "+358", "symbol": "FI" }', name: '+358 Finland' },
    { value: '{ "code": "+33", "symbol": "FR" }', name: '+33 France' },
    { value: '{ "code": "+594", "symbol": "GF" }', name: '+594 French Guiana' },
    {
      value: '{ "code": "+689", "symbol": "PF" }',
      name: '+689 French Polynesia'
    },
    { value: '{ "code": "+241", "symbol": "GA" }', name: '+241 Gabon' },
    { value: '{ "code": "+220", "symbol": "GM" }', name: '+220 Gambia' },
    { value: '{ "code": "+995", "symbol": "GE" }', name: '+995 Georgia' },
    { value: '{ "code": "+49", "symbol": "DE" }', name: '+49 Germany' },
    { value: '{ "code": "+233", "symbol": "GH" }', name: '+233 Ghana' },
    { value: '{ "code": "+350", "symbol": "GI" }', name: '+350 Gibraltar' },
    { value: '{ "code": "+30", "symbol": "GR" }', name: '+30 Greece' },
    { value: '{ "code": "+299", "symbol": "GL" }', name: '+299 Greenland' },
    { value: '{ "code": "+1", "symbol": "GD" }', name: '+1473 Grenada' },
    { value: '{ "code": "+590", "symbol": "GP" }', name: '+590 Guadeloupe' },
    { value: '{ "code": "+1", "symbol": "GU" }', name: '+1671 Guam' },
    { value: '{ "code": "+502", "symbol": "GT" }', name: '+502 Guatemala' },
    { value: '{ "code": "+44", "symbol": "GG" }', name: '+44 Guernsey' },
    { value: '{ "code": "+224", "symbol": "GN" }', name: '+224 Guinea' },
    { value: '{ "code": "+245", "symbol": "GW" }', name: '+245 Guinea-Bissau' },
    { value: '{ "code": "+592", "symbol": "GY" }', name: '+592 Guyana' },
    { value: '{ "code": "+509", "symbol": "HT" }', name: '+509 Haiti' },
    { value: '{ "code": "+504", "symbol": "HN" }', name: '+504 Honduras' },
    { value: '{ "code": "+852", "symbol": "HK" }', name: '+852 Hong Kong' },
    { value: '{ "code": "+36", "symbol": "HU" }', name: '+36 Hungary' },
    { value: '{ "code": "+354", "symbol": "IS" }', name: '+354 Iceland' },
    { value: '{ "code": "+91", "symbol": "IN" }', name: '+91 India' },
    { value: '{ "code": "+62", "symbol": "ID" }', name: '+62 Indonesia' },
    { value: '{ "code": "+98", "symbol": "IR" }', name: '+98 Iran' },
    { value: '{ "code": "+964", "symbol": "IQ" }', name: '+964 Iraq' },
    { value: '{ "code": "+353", "symbol": "IE" }', name: '+353 Ireland' },
    { value: '{ "code": "+44", "symbol": "IM" }', name: '+44 Isle of Man' },
    { value: '{ "code": "+972", "symbol": "IL" }', name: '+972 Israel' },
    { value: '{ "code": "+39", "symbol": "IT" }', name: '+39 Italy' },
    { value: '{ "code": "+1", "symbol": "JM" }', name: '+1876 Jamaica' },
    { value: '{ "code": "+81", "symbol": "JP" }', name: '+81 Japan' },
    { value: '{ "code": "+44", "symbol": "JE" }', name: '+44 Jersey' },
    { value: '{ "code": "+962", "symbol": "JO" }', name: '+962 Jordan' },
    { value: '{ "code": "+7", "symbol": "KZ" }', name: '+7 Kazakhstan' },
    { value: '{ "code": "+254", "symbol": "KE" }', name: '+254 Kenya' },
    { value: '{ "code": "+686", "symbol": "KI" }', name: '+686 Kiribati' },
    { value: '{ "code": "+383", "symbol": "XK" }', name: '+383 Kosovo' },
    { value: '{ "code": "+965", "symbol": "KW" }', name: '+965 Kuwait' },
    { value: '{ "code": "+996", "symbol": "KG" }', name: '+996 Kyrgyzstan' },
    { value: '{ "code": "+856", "symbol": "LA" }', name: '+856 Laos' },
    { value: '{ "code": "+371", "symbol": "LV" }', name: '+371 Latvia' },
    { value: '{ "code": "+961", "symbol": "LB" }', name: '+961 Lebanon' },
    { value: '{ "code": "+266", "symbol": "LS" }', name: '+266 Lesotho' },
    { value: '{ "code": "+231", "symbol": "LR" }', name: '+231 Liberia' },
    { value: '{ "code": "+218", "symbol": "LY" }', name: '+218 Libya' },
    { value: '{ "code": "+423", "symbol": "LI" }', name: '+423 Liechtenstein' },
    { value: '{ "code": "+370", "symbol": "LT" }', name: '+370 Lithuania' },
    { value: '{ "code": "+352", "symbol": "LU" }', name: '+352 Luxembourg' },
    { value: '{ "code": "+853", "symbol": "MO" }', name: '+853 Macao' },
    {
      value: '{ "code": "+389", "symbol": "MK" }',
      name: '+389 Macedonia (FYROM)'
    },
    { value: '{ "code": "+261", "symbol": "MG" }', name: '+261 Madagascar' },
    { value: '{ "code": "+265", "symbol": "MW" }', name: '+265 Malawi' },
    { value: '{ "code": "+60", "symbol": "MY" }', name: '+60 Malaysia' },
    { value: '{ "code": "+960", "symbol": "MV" }', name: '+960 Maldives' },
    { value: '{ "code": "+223", "symbol": "ML" }', name: '+223 Mali' },
    { value: '{ "code": "+356", "symbol": "MT" }', name: '+356 Malta' },
    {
      value: '{ "code": "+692", "symbol": "MH" }',
      name: '+692 Marshall Islands'
    },
    { value: '{ "code": "+596", "symbol": "MQ" }', name: '+596 Martinique' },
    { value: '{ "code": "+222", "symbol": "MR" }', name: '+222 Mauritania' },
    { value: '{ "code": "+230", "symbol": "MU" }', name: '+230 Mauritius' },
    { value: '{ "code": "+269", "symbol": "YT" }', name: '+269 Mayotte' },
    { value: '{ "code": "+52", "symbol": "MX" }', name: '+52 Mexico' },
    { value: '{ "code": "+691", "symbol": "FM" }', name: '+691 Micronesia' },
    { value: '{ "code": "+373", "symbol": "MD" }', name: '+373 Moldova' },
    { value: '{ "code": "+377", "symbol": "MC" }', name: '+377 Monaco' },
    { value: '{ "code": "+976", "symbol": "MN" }', name: '+976 Mongolia' },
    { value: '{ "code": "+382", "symbol": "ME" }', name: '+382 Montenegro' },
    { value: '{ "code": "+1", "symbol": "MS" }', name: '+1664 Montserrat' },
    { value: '{ "code": "+212", "symbol": "MA" }', name: '+212 Morocco' },
    { value: '{ "code": "+258", "symbol": "MZ" }', name: '+258 Mozambique' },
    { value: '{ "code": "+95", "symbol": "MM" }', name: '+95 Myanmar' },
    { value: '{ "code": "+264", "symbol": "NA" }', name: '+264 Namibia' },
    { value: '{ "code": "+674", "symbol": "NR" }', name: '+674 Nauru' },
    { value: '{ "code": "+977", "symbol": "NP" }', name: '+977 Nepal' },
    { value: '{ "code": "+31", "symbol": "NL" }', name: '+31 Netherlands' },
    { value: '{ "code": "+687", "symbol": "NC" }', name: '+687 New Caledonia' },
    { value: '{ "code": "+64", "symbol": "NZ" }', name: '+64 New Zealand' },
    { value: '{ "code": "+505", "symbol": "NI" }', name: '+505 Nicaragua' },
    { value: '{ "code": "+227", "symbol": "NE" }', name: '+227 Niger' },
    { value: '{ "code": "+234", "symbol": "NG" }', name: '+234 Nigeria' },
    { value: '{ "code": "+683", "symbol": "NU" }', name: '+683 Niue' },
    {
      value: '{ "code": "+672", "symbol": "NF" }',
      name: '+672 Norfolk Islands'
    },
    { value: '{ "code": "+850", "symbol": "KP" }', name: '+850 North Korea' },
    {
      value: '{ "code": "+1", "symbol": "MP" }',
      name: '+1670 Northern Mariana Islands'
    },
    { value: '{ "code": "+47", "symbol": "NO" }', name: '+47 Norway' },
    { value: '{ "code": "+968", "symbol": "OM" }', name: '+968 Oman' },
    { value: '{ "code": "+92", "symbol": "PK" }', name: '+92 Pakistan' },
    { value: '{ "code": "+680", "symbol": "PW" }', name: '+680 Palau' },
    { value: '{ "code": "+970", "symbol": "PS" }', name: '+970 Palestine' },
    { value: '{ "code": "+507", "symbol": "PA" }', name: '+507 Panama' },
    {
      value: '{ "code": "+675", "symbol": "PG" }',
      name: '+675 Papua New Guinea'
    },
    { value: '{ "code": "+595", "symbol": "PY" }', name: '+595 Paraguay' },
    { value: '{ "code": "+51", "symbol": "PE" }', name: '+51 Peru' },
    { value: '{ "code": "+63", "symbol": "PH" }', name: '+63 Philippines' },
    { value: '{ "code": "+48", "symbol": "PL" }', name: '+48 Poland' },
    { value: '{ "code": "+351", "symbol": "PT" }', name: '+351 Portugal' },
    { value: '{ "code": "+1", "symbol": "PR" }', name: '+1 Puerto Rico' },
    { value: '{ "code": "+974", "symbol": "QA" }', name: '+974 Qatar' },
    { value: '{ "code": "+262", "symbol": "RE" }', name: '+262 Reunion' },
    { value: '{ "code": "+40", "symbol": "RO" }', name: '+40 Romania' },
    { value: '{ "code": "+7", "symbol": "RU" }', name: '+7 Russia' },
    { value: '{ "code": "+250", "symbol": "RW" }', name: '+250 Rwanda' },
    {
      value: '{ "code": "+590", "symbol": "BL" }',
      name: '+590 Saint Barthélemy'
    },
    { value: '{ "code": "+290", "symbol": "SH" }', name: '+290 Saint Helena' },
    {
      value: '{ "code": "+1", "symbol": "KN" }',
      name: '+1869 Saint Kitts and Nevis'
    },
    { value: '{ "code": "+1", "symbol": "LC" }', name: '+1758 Saint Lucia' },
    { value: '{ "code": "+590", "symbol": "MF" }', name: '+590 Saint Martin' },
    {
      value: '{ "code": "+508", "symbol": "PM" }',
      name: '+508 Saint Pierre and Miquelon'
    },
    {
      value: '{ "code": "+1", "symbol": "VC" }',
      name: '+1784 Saint Vincent and the Grenadines'
    },
    { value: '{ "code": "+685", "symbol": "WS" }', name: '+685 Samoa' },
    { value: '{ "code": "+378", "symbol": "SM" }', name: '+378 San Marino' },
    {
      value: '{ "code": "+239", "symbol": "ST" }',
      name: '+239 São Tomé and Príncipe'
    },
    { value: '{ "code": "+966", "symbol": "SA" }', name: '+966 Saudi Arabia' },
    { value: '{ "code": "+221", "symbol": "SN" }', name: '+221 Senegal' },
    { value: '{ "code": "+381", "symbol": "RS" }', name: '+381 Serbia' },
    { value: '{ "code": "+248", "symbol": "SC" }', name: '+248 Seychelles' },
    { value: '{ "code": "+232", "symbol": "SL" }', name: '+232 Sierra Leone' },
    { value: '{ "code": "+65", "symbol": "SG" }', name: '+65 Singapore' },
    {
      value: '{ "code": "+1", "symbol": "SX" }',
      name: '+1721 Sint Maarten'
    },
    {
      value: '{ "code": "+421", "symbol": "SK" }',
      name: '+421 Slovakia (Slovensko)'
    },
    {
      value: '{ "code": "+386", "symbol": "SI" }',
      name: '+386 Slovenia (Slovenija)'
    },
    {
      value: '{ "code": "+677", "symbol": "SB" }',
      name: '+677 Solomon Islands'
    },
    {
      value: '{ "code": "+252", "symbol": "SO" }',
      name: '+252 Somalia (Soomaaliya)'
    },
    { value: '{ "code": "+27", "symbol": "ZA" }', name: '+27 South Africa' },
    { value: '{ "code": "+82", "symbol": "KR" }', name: '+82 South Korea' },
    { value: '{ "code": "+211", "symbol": "SS" }', name: '+211 South Sudan' },
    { value: '{ "code": "+34", "symbol": "ES" }', name: '+34 Spain (España)' },
    { value: '{ "code": "+94", "symbol": "LK" }', name: '+94 Sri Lanka' },
    { value: '{ "code": "+249", "symbol": "SD" }', name: '+249 Sudan' },
    { value: '{ "code": "+597", "symbol": "SR" }', name: '+597 Suriname' },
    {
      value: '{ "code": "+47", "symbol": "SJ" }',
      name: '+47 Svalbard and Jan Mayen'
    },
    { value: '{ "code": "+268", "symbol": "SZ" }', name: '+268 Swaziland' },
    {
      value: '{ "code": "+46", "symbol": "SE" }',
      name: '+46 Sweden (Sverige)'
    },
    {
      value: '{ "code": "+41", "symbol": "CH" }',
      name: '+41 Switzerland (Schweiz)'
    },
    { value: '{ "code": "+963", "symbol": "SY" }', name: '+963 Syria' },
    { value: '{ "code": "+886", "symbol": "TW" }', name: '+886 Taiwan' },
    { value: '{ "code": "+992", "symbol": "TJ" }', name: '+992 Tajikstan' },
    { value: '{ "code": "+255", "symbol": "TZ" }', name: '+255 Tanzania' },
    { value: '{ "code": "+66", "symbol": "TH" }', name: '+66 Thailand' },
    { value: '{ "code": "+670", "symbol": "TL" }', name: '+670 Timor-Leste' },
    { value: '{ "code": "+228", "symbol": "TG" }', name: '+228 Togo' },
    { value: '{ "code": "+690", "symbol": "TK" }', name: '+690 Tokelau' },
    { value: '{ "code": "+676", "symbol": "TO" }', name: '+676 Tonga' },
    {
      value: '{ "code": "+1", "symbol": "TT" }',
      name: '+1868 Trinidad and Tobago'
    },
    { value: '{ "code": "+216", "symbol": "TN" }', name: '+216 Tunisia' },
    {
      value: '{ "code": "+90", "symbol": "TR" }',
      name: '+90 Turkey (Türkiye)'
    },
    { value: '{ "code": "+993", "symbol": "TM" }', name: '+993 Turkmenistan' },
    {
      value: '{ "code": "+1", "symbol": "TC" }',
      name: '+1649 Turks and Caicos Islands'
    },
    { value: '{ "code": "+688", "symbol": "TV" }', name: '+688 Tuvalu' },
    {
      value: '{ "code": "+1", "symbol": "VI" }',
      name: '+1340 U.S. Virgin Islands'
    },
    { value: '{ "code": "+256", "symbol": "UG" }', name: '+256 Uganda' },
    { value: '{ "code": "+380", "symbol": "UA" }', name: '+380 Ukraine' },
    {
      value: '{ "code": "+971", "symbol": "AE" }',
      name: '+971 United Arab Emirates'
    },
    { value: '{ "code": "+44", "symbol": "GB" }', name: '+44 United Kingdom' },
    { value: '{ "code": "+1", "symbol": "US" }', name: '+1 United States' },
    { value: '{ "code": "+598", "symbol": "UY" }', name: '+598 Uruguay' },
    {
      value: '{ "code": "+998", "symbol": "UZ" }',
      name: '+998 Uzbekistan (Oʻzbekiston)'
    },
    { value: '{ "code": "+678", "symbol": "VU" }', name: '+678 Vanuatu' },
    {
      value: '{ "code": "+39", "symbol": "VA" }',
      name: '+39 Vatican City (Città del Vaticano)'
    },
    { value: '{ "code": "+58", "symbol": "VE" }', name: '+58 Venezuela' },
    {
      value: '{ "code": "+84", "symbol": "VN" }',
      name: '+84 Vietnam (Việt Nam)'
    },
    {
      value: '{ "code": "+681", "symbol": "WF" }',
      name: '+681 Wallis and Futuna (Wallis-et-Futuna)'
    },
    {
      value: '{ "code": "+212", "symbol": "EH" }',
      name: '+212 Western Sahara'
    },
    { value: '{ "code": "+967", "symbol": "YE" }', name: '+967 Yemen' },
    { value: '{ "code": "+260", "symbol": "ZM" }', name: '+260 Zambia' },
    { value: '{ "code": "+263", "symbol": "ZW" }', name: '+263 Zimbabwe' },
    { value: '{ "code": "+358", "symbol": "AX" }', name: '+358  Åland Islands' }
  ];
  const countryCodeSelect = document.createElement('SELECT');
  countryCodeSelect.classList.add('onecrapp-form-raw-html-embed-w-full');
  countryCodeSelect.classList.add('onecrapp-form-raw-html-embed-pl-3');
  countryCodeSelect.classList.add('onecrapp-form-raw-html-embed-pr-8');
  countryCodeSelect.classList.add('onecrapp-form-raw-html-embed-py-2');
  countryCodeSelect.classList.add(
    'onecrapp-form-raw-html-embed-rounded-l-lg'
  );
  countryCodeSelect.classList.add('onecrapp-form-raw-html-embed-border-r');
  countryCodeSelect.classList.add(
    'onecrapp-form-raw-html-embed-border-solid'
  );
  countryCodeSelect.classList.add(
    'onecrapp-form-raw-html-embed-text-grey-600'
  );
  countryCodeSelect.classList.add(
    'onecrapp-form-raw-html-embed-border-grey-200'
  );
  countryCodeSelect.classList.add('onecrapp-form-raw-html-embed-bg-white');
  countryCodeSelect.classList.add(
    'focus:onecrapp-form-raw-html-embed-outline-none'
  );
  countryCodeSelect.setAttribute('id', 'countrySelect');
  countryCodeSelect.name = 'phone_country_code_data';
  // document.body.appendChild(countryCodeSelect);

  for (let i = 0; i < countryCodes.length; i++) {
    const countryOption = document.createElement('option');
    countryOption.setAttribute('value', countryCodes[i].value);
    const countryNode = document.createTextNode(countryCodes[i].name);
    countryOption.appendChild(countryNode);
    countryCodeSelect.appendChild(countryOption);
  }
  const phoneInputElement = document.getElementsByClassName(
    `gd-onecrapp-form-raw-html`
  );
  if (phoneInputElement && phoneInputElement.length) {
    for (let phoneEle of phoneInputElement) {
      phoneEle.appendChild(countryCodeSelect);
    }
  }

  fetch('https://ip2c.org/s',{method: 'GET'})
  .then((response) => {
    return response.text();
  })
  .then((payload) => {
    const countryCode = payload.toString().split(';')[1];
    countryCodes.forEach((ele) => {
      if (JSON.parse(ele.value).symbol === countryCode) {
        countryCodeSelect.value = ele.value;
      }
    });
  });
}

countryCodeInput();
