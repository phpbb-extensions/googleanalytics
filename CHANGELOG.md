# Changelog

## 1.0.6 - 2020-11-15

- Added support for Google Analytics Measurement ID. This is for users who have set up a Google Analytics 4 property with a Web data stream (which begins with "G-") instead of Universal Analytics (which begins with "UA-").

## 1.0.5 - 2019-11-15

- Support added for Google Analytics new Global Site tag. Now there is an option to select whether you want to use the new Global Site tag (gtag.js), or the older Analytics tag (analytics.js). Existing installations will not be automatically switched over to the newer Global Site tag, however, fresh installs will default to the newer Global Site tag. Details about the new Global Site tag can be found in your Google Analytics Account Admin.
- Fixed a bug where Google Analytics ACP Board settings could conflict with other extensions ACP Board settings that resulted in a PHP error.
- Added Spanish casual honorifics translation.

## 1.0.4 - 2018-05-17

- Added an option to enable visitor IP anonymization. This is recommended by Google to make the data collected for Analytics compliant with the EU‘s GDPR laws which go into effect May 25, 2018.
- Added German translation (formal and casual)

## 1.0.3 - 2017-08-04

- Minor code improvements
- Added Russian translation
- Added Slovak translation

## 1.0.2 - 2017-01-12

- Supports phpBB 3.1 and 3.2
- Added support for tracking users by their user ID (must be enabled in your Google Analytics account to take advantage of it)
- Lots of internal code updates and improvements
- Added Brazilian Portuguese translation
- Added Croatian translation (casual and formal)
- Added Czech translation
- Added Danish translation
- Added Greek translation
- Added Italian translation
- Added Turkish translation

## 1.0.1 - 2014-11-28

- Fixed issues in the README.md
- Added a new template event `phpbb_googleanalytics_alter_ga_requirements` which may be used by other extensions to add more tracking options (like the ability to track advertisements). See here for a example: https://support.google.com/analytics/answer/2444872?hl=en&utm_id=ad
- Added Arabic language pack
- Added Dutch language pack
- Added French language pack
- Added Mandarin Chinese language pack
- Added Polish language pack
- Added Portuguese language pack
- Added Romanian language pack
- Added Spanish language pack
- Added Swedish language pack

## 1.0.0 - 2014-10-21

- First release
