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
 * File to display list of announcements items
 *
 * @author Ruchi Kothari
 */

// Retrieve news list
$_searchParameters       = array('GetList');
$_newsContainer_Complete = $_restClient->get($_newsController, $_searchParameters);
$_newsContainer_Complete = $_newsContainer_Complete['newsitem'];

$_newsContainer = array();
foreach ($_newsContainer_Complete as $_newsItem) {
	$_newsItem['parsedmonth'] = strftime('%b', $_newsItem['dateline']);
	$_newsItem['parseddate']  = GetStrippedDay(strftime('%d', $_newsItem['dateline']));
	$_newsItem['date']        = date('d F Y g:i A', $_newsItem['dateline']);

	if (($_newsItem['newstype'] == TYPE_GLOBAL || $_newsItem['newstype'] == TYPE_PUBLIC) && $_newsItem['newsstatus'] == STATUS_PUBLISHED) {
		$_newsContainer[] = $_newsItem;
	}
}

$_totalNewsItems = count($_newsContainer);

// Pagination
if (isset($_GET['offset'])) {
	$_newsOffset = intval($_GET['offset']);
} else {
	$_newsOffset = 0;
}

$_showOlderPosts = $_showNewerPosts = false;

$_olderOffset = $_newerOffset = 0;

if ($_newsOffset > 0) {
	$_showNewerPosts = true;

	$_newerOffset = $_newsOffset - $_settings['newsperpage'];
}

$_newsActiveCount = $_totalNewsItems - ($_newsOffset + $_settings['newsperpage']);
if ($_newsActiveCount > 0) {
	$_showOlderPosts = true;

	$_olderOffset = $_newsOffset + $_settings['newsperpage'];
}

$smarty->assign('_showNewerPosts', $_showNewerPosts);
$smarty->assign('_showOlderPosts', $_showOlderPosts);

$smarty->assign('_olderOffset', $_olderOffset);
$smarty->assign('_newerOffset', $_newerOffset);

$_newsContainer = SortRecords($_newsContainer, 'dateline');
$_newsContainer = array_slice($_newsContainer, $_newsOffset, $_settings['newsperpage']);
$smarty->assign('_newsContainer', $_newsContainer);
$smarty->assign('_newsCount', $_totalNewsItems);

$templatefile = 'announcementlist';