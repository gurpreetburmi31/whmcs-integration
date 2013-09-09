<?php
/**
 * ###############################################
 *
 * WHMCS Integration
 * _______________________________________________
 *
 * @author         Ruchi Kothari
 *
 * @package        WHMCS Integration
 * @copyright      Copyright (c) 2001-2013, Kayako
 * @license        http://www.kayako.com/license
 * @link           http://www.kayako.com
 *
 * ###############################################
 */

/**
 * Configuration file
 *
 * @author Ruchi Kothari
 */
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

//WHMCS base URL
define('WHMCS_URL', 'http://whmcs.test.com/');

//Helpdesk URL
define('API_URL', 'http://helpdesk.test.com/api/index.php?');

//API key. Get this from ADMIN CP of helpdesk. In left navigation REST APIs>API Information
define('API_KEY', '63dd0e68-555d-e904-1136-687df01b6a56');

// Secret key. Get this from ADMIN CP of helpdesk. In left navigation REST APIs>API Information
define('SECRET_KEY', 'ZTY4ZjcwNDYtNGFiZi05ZTU0LWFkOTktNDdlNmEzMGYxZmJhZGJiYzI3NjItMjhkZC1iZWI0LWI1OTAtNzcyMTM5Njk2YzNh');

$_settings = array(
	'kb_enlatestarticles'  => 1, // 1 if latest KB article list needs to display, 0 otherwise
	'kb_enpopulararticles' => 1, // 1 if popular KB article list needs to display, 0 otherwise
	'canpostcomments'      => 'true', // True if a user can post comment, false otherwise
	'categoryarticlelimit' => 1, //Number of articles to be shown under each category
	'recentarticlelimit'   => 8, //Number of recent articles to be shown
	'populararticlelimit'  => 8, // Number of popular articles to be shown
	'articlecharlimit'     => 175, //Number of characters per article to be shown on KB listing page
	'subjectcharlimit'     => 35, //Number of characters per article subject to be shown on KB listing page
	'categorycolumns'      => 2, //Number of columns to be shown
	'newsperpage'          => 3, //News per page
	'dateformat'           => 'mm/dd/yy', //Date format to display
	'recordsperpage'       => 10, // Number of records per page
	'ignoreautoresponder'  => 0, //To stop sending autoresponder email on ticket creation
);