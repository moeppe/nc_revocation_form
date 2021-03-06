<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2015 Leo Feyer
 * 
 * @package   NC Revocation Form
 * @author    Marcel Mathias Nolte
 * @copyright Marcel Mathias Nolte 2015
 * @website	  https://www.noltecomputer.com
 * @license   <marcel.nolte@noltecomputer.de> wrote this file. As long as you retain this notice you
 *            can do whatever you want with this stuff. If we meet some day, and you think this stuff 
 *            is worth it, you can buy me a beer in return. Meanwhile you can provide a link to my
 *            homepage, if you want, or send me a postcard. Be creative! Marcel Mathias Nolte
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'NC',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'NC\\ModuleNcRevocationFormHelper'        => 'system/modules/nc_revocation_form/classes/ModuleNcRevocationFormHelper.php',
	// Modules
	'NC\\ModuleNcRevocationForm'              => 'system/modules/nc_revocation_form/modules/ModuleNcRevocationForm.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'nc_revocation_form_default'              => 'system/modules/nc_revocation_form/templates/nc_revocation_form',
));
