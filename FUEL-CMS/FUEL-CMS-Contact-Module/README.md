# Contact Module for FUEL CMS
This is a [FUEL CMS](http://www.getfuelcms.com) contact module for adding 'contact us' functionality including a contact page/form, a contact list with social links and 'about blurb', and auto-forwarding messages to the appropriate contacts' email without revealing the email address(es) in the view.


## Installation

### Install
1. Download the zip file from GitHub:
[https://github.com/kbjohnson90/FUEL-CMS-Contact-Module](https://github.com/kbjohnson90/FUEL-CMS-Contact-Module)

2. Create a "contact" folder in fuel/modules/ and place the contents of the contact module folder in there.

3. Import the fuel_contact_install.sql and fuel_contact_permissions_install.sql from the contact/install folder into your database

4. Add "contact" to the the `$config['modules_allowed']` in fuel/application/config/MY_fuel.php

### Uninstall
To uninstall the module which will remove any permissions and database information:
``php index.php fuel/installer/uninstall contact`


## Features

### Contact Page/Form
using themes, this module creates a 'contact us' page at yoursite.com/contact. The page contains a list of contacts and a contact form.

### Themes
The module's look and feel can be customized using different themes to accomidate site frameworks and styles. Simply copy the contents of the 'default' folder into a new folder, rename and edit the new theme, and add the theme name to the ```$theme_list``` in ```config/contact.php``` (this will add the theme to the Admin Panel Settings).

### Contact List
Add contacts via the Admin Panel.
Possible information includes social links, website links, and about 'blurbs'.

Empty fields will not be displayed in the view.

### Message forwarding
When a contact form is submitted, the message is added to the database as well as forwared via email to the appropriate contact person.

This allows:

- Direct email addresses to be hidden from view (avoids SPAM)
- A copy of the message to be stored in the database
- Multiple people to recieve a single message

If no specific contact person is chosen, then the message will be forwarded to everyone (ie. 'whom it may concern').
If only one person is availble for contact then that person will be the simgle default contact email address.

### Spam Features

#### Honeypot
If the Honeypot setting is set to true in the Admin Panel Module Settings, then a honeypot form field will be added to the contact form, in which case the controller will check for the honeypot to be empty prior to submitting the form.

#### Akismet
Set your Akismet API Key in the module settings.

## BUGS
To file a bug report, go to the [issues](https://github.com/kbjohnson90/FUEL-CMS-Contact-Module/issues) page.


## LICENSE
The blog Module for FUEL CMS is licensed under [APACHE 2](http://www.apache.org/licenses/LICENSE-2.0).
