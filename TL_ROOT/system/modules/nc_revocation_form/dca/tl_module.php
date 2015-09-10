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
 * Table tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'nc_revocation_form_mail_admin';

$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'nc_revocation_form_mail_user';
 
$GLOBALS['TL_DCA']['tl_module']['palettes']['ncRevocationForm'] = '{title_legend},name,headline,type;{config_legend},disableCaptcha,nc_revocation_form_template,nc_revocation_form_mail_admin,nc_revocation_form_mail_user;{redirect_legend},jumpTo;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['subpalettes']['nc_revocation_form_mail_admin'] = 'nc_revocation_form_mail_admin_address,nc_revocation_form_mail_admin_subject,nc_revocation_form_mail_admin_text';

$GLOBALS['TL_DCA']['tl_module']['subpalettes']['nc_revocation_form_mail_user'] = 'nc_revocation_form_mail_user_subject,nc_revocation_form_mail_user_text';

$GLOBALS['TL_DCA']['tl_module']['fields']['nc_revocation_form_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['nc_revocation_form_template'],
	'default'                 => 'mb_member_default',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_nc_revocation_form', 'getRevocationFormTemplates'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['nc_revocation_form_mail_admin'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['nc_revocation_form_mail_admin'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['nc_revocation_form_mail_admin_address'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['nc_revocation_form_mail_admin_address'],
	'exclude'                 => true,
	'flag'                    => 1,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'long'),
	'load_callback' => array
	(
		array('tl_module_nc_revocation_form', 'getDefaultAdminAddress')
	),
	'sql'                     => "varchar(255) COLLATE utf8_bin NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['nc_revocation_form_mail_admin_subject'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['nc_revocation_form_mail_admin_subject'],
	'exclude'                 => true,
	'flag'                    => 1,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'long'),
	'load_callback' => array
	(
		array('tl_module_nc_revocation_form', 'getDefaultAdminSubject')
	),
	'sql'                     => "varchar(255) COLLATE utf8_bin NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['nc_revocation_form_mail_admin_text'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['nc_revocation_form_mail_admin_text'],
	'exclude'                 => true,
	'inputType'               => 'textarea',
	'eval'                    => array('style'=>'height:120px', 'decodeEntities'=>true, 'alwaysSave'=>true),
	'load_callback' => array
	(
		array('tl_module_nc_revocation_form', 'getDefaultAdminText')
	),
	'sql'                     => "text NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['nc_revocation_form_mail_user'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['nc_revocation_form_mail_admin'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['nc_revocation_form_mail_user_subject'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['nc_revocation_form_mail_user_subject'],
	'exclude'                 => true,
	'flag'                    => 1,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'long'),
	'load_callback' => array
	(
		array('tl_module_nc_revocation_form', 'getDefaultUserSubject')
	),
	'sql'                     => "varchar(255) COLLATE utf8_bin NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['nc_revocation_form_mail_user_text'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['nc_revocation_form_mail_admin_text'],
	'exclude'                 => true,
	'inputType'               => 'textarea',
	'eval'                    => array('style'=>'height:120px', 'decodeEntities'=>true, 'alwaysSave'=>true),
	'load_callback' => array
	(
		array('tl_module_nc_revocation_form', 'getDefaultUserText')
	),
	'sql'                     => "text NULL"
);

/**
 * Class tl_module_nc_revocation_form
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @package   NC Revocation Form
 * @author    Marcel Mathias Nolte
 * @copyright Marcel Mathias Nolte 2015
 */
class tl_module_nc_revocation_form extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}


	/**
	 * Return all news templates as array
	 *
	 * @return array
	 */
	public function getRevocationFormTemplates()
	{
		return $this->getTemplateGroup('nc_revocation_form_');
	}


	/**
	 * Load the default recipient address
	 *
	 * @param mixed $varValue
	 *
	 * @return mixed
	 */
	public function getDefaultAdminAddress($varValue)
	{
		if (!trim($varValue))
		{
			$varValue = $GLOBALS['TL_ADMIN_EMAIL'];
		}

		return $varValue;
	}


	/**
	 * Load the default mail subject for the admin mail
	 *
	 * @param mixed $varValue
	 *
	 * @return mixed
	 */
	public function getDefaultAdminSubject($varValue)
	{
		if (!trim($varValue))
		{
			$varValue = $GLOBALS['TL_LANG']['tl_module']['nc_revocation_form_mail_admin_subject']['default'];
		}

		return $varValue;
	}


	/**
	 * Load the default mail text for the admin mail
	 *
	 * @param mixed $varValue
	 *
	 * @return mixed
	 */
	public function getDefaultAdminText($varValue)
	{
		if (!trim($varValue))
		{
			$varValue = $GLOBALS['TL_LANG']['tl_module']['nc_revocation_form_mail_admin_text']['default'];
		}

		return $varValue;
	}


	/**
	 * Load the default mail subject for the user mail
	 *
	 * @param mixed $varValue
	 *
	 * @return mixed
	 */
	public function getDefaultUserSubject($varValue)
	{
		if (!trim($varValue))
		{
			$varValue = $GLOBALS['TL_LANG']['tl_module']['nc_revocation_form_mail_user_subject']['default'];
		}

		return $varValue;
	}


	/**
	 * Load the default mail text for the user mail
	 *
	 * @param mixed $varValue
	 *
	 * @return mixed
	 */
	public function getDefaultUserText($varValue)
	{
		if (!trim($varValue))
		{
			$varValue = $GLOBALS['TL_LANG']['tl_module']['nc_revocation_form_mail_user_text']['default'];
		}

		return $varValue;
	}
}