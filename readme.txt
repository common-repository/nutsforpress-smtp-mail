=== NutsForPress SMTP Mail ===

Contributors: Christian Gatti
Tags: NutsForPress,SMTP,mail,email,spam,prevent
Donate link: https://www.paypal.com/paypalme/ChristianGatti
Requires at least: 5.3
Tested up to: 6.5
Requires PHP: 7.x
Stable tag: 1.5
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

NutsForPress SMTP Mail is a simple and lightweight plugin that prevents emails sent by your website to be marked as spam from the recipient servers.


== Description ==

*SMTP Mail* is one of the several NutsForPress plugins providing some essential features that WordPress does not offer itself or offers only partially.  


*SMTP Mail* allows you to:

* set up your personal SMTP server to be used for every outgoing email message sent by your website (registration email, newsletters, e-commerce notifications, etc.)
* define the sender address and the sender name, so that your email will be displayed into recipient mail client like *My Name <myname@mydomain.ext>*
* send test emails to a real recipient, to check that your SMTP settings are correct, or to a service that checks emails reliability (for example mail-tester)

SMTP Mail is full compliant with WPML (you don't need to translate any option value)

Take a look at the others [NutsForPress Plugins](https://wordpress.org/plugins/search/nutsforpress/)

**Whatever is worth doing at all is worth doing well**


== Installation ==

= Installation From Plugin Repository =

* Into your WordPress plugin section, press "Add New"
* Use "NutsForPress" as search term
* Click on *Install Now* on *NutsForPress SMTP Mail* into result page, then click on *Activate*
* Setup "NutsForPress SMTP Mail" options by clicking on the link you find under the "NutsForPress" menu
* Enjoy!

= Manual Installation =

* Download *NutsForPress SMTP Mail* from https://wordpress.org/plugins/nutsforpress
* Into your WordPress plugin section, press "Add New" then press "Load Plugin"
* Choose nutsforpress-smtp-mail.zip file from your local download folder
* Press "Install Now"
* Activate *NutsForPress SMTP Mail*
* Setup "NutsForPress SMTP Mail" options by clicking on the link you find under the "NutsForPress" menu
* Enjoy!


== Changelog ==

= 1.5 =
* Fixed a bug that caused the reset of the options of this plugin when WPML was installed and activated after the configuration of this plugin

= 1.4 =
* Tested up to WordPress 6.2

= 1.3 =
* Now you can get debug info during mail test through a console log

= 1.2.3 =
* Now you can get debug info during mail test through a console log

= 1.2.2 =
* Fixed a bug that displayed some option messages that should have been kept hidden by a css rule miswritten by an escape rule

= 1.2.1 =
* Fixed a bug that caused to some urls contained into some descriptions in the plugin options were showed as html code, instead of clickable urls 

= 1.2 =
* New root version, in order to welcome a new NutsForPress plugin
* Security improved by escaping echoed variables

= 1.1.2 =
* Fixed a bug that prevented from saving local options when WPML is not active

= 1.1.1 =
* Root functions improvement

= 1.1 =
* Just a small style enhancement and some minor bug fix

= 1.0 =
* First full working release


== Translations ==

* English: default language
* Italian: entirely translated


== Credits ==

* Very many thanks to [DkR](https://dkr.srl/) and [SviluppoEuropa](https://sviluppoeuropa.it/)!