<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
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
 * Back end modules
 */
$GLOBALS['TL_LANG']['MOD']['messages']         = array('Benachrichtigungen', 'Benachrichtigungen aus verschiedenen Quellen.');
$GLOBALS['TL_LANG']['MOD']['ncRevocationForm'] = array('Widerrufsformular (' . ModuleNcRevocationFormHelper::getInstance()->getUnreadCount() . ')', 'Übermittelte Widerrüfe anzeigen.');


/**
 * Front end modules
 */
$GLOBALS['TL_LANG']['FMD']['forms']            = 'Formulare';
$GLOBALS['TL_LANG']['FMD']['ncRevocationForm'] = array('Widerrufsformular', 'Stellt ein Widerrufsformular dar.');