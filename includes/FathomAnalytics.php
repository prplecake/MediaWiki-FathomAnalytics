<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension, it is not a valid entry point.' );
}

$wgExtensionCredits[$type][] = [
	'path' => __FILE__,
	'name' => 'Fathom Analytics',
	'version' => '0.1',
	'author' => "Matthew Jorgensen",
	'url' => 'https://git.sr.ht/~mjorgensen/MediaWiki-FathomAnalytics',
	'license-name' => 'GPL-2.0-or-later'
];

$wgFathomAnalyticsURL = '';
$wgFathomAnalyticsSiteID = '';

class FathomAnalytics {
	public static function onSkinAfterBottomScripts( Skin $skin, &$text = '' ) {
		global $wgFathomAnalyticsURL, $wgFathomAnalyticsSiteID;

		if ( $skin->getUser()->isAllowed( 'noanalytics' ) ) {
			$text .= "<!-- Web analytics code inclusion is disabled for this user. -->\r\n";
			return true;
		}

		$appended = false;
		if ( $wgFathomAnalyticsURL !== '' && $wgFathomAnalyticsSiteID !== '') {
			$text .= "<script src=" . $wgFathomAnalyticsURL . " site=" . $wgFathomAnalyticsSiteID . " defer></script>";
			$appended = true;
		}

		if ( !$appended ) {
			$text .= "<!-- No anayltics configured. -->\r\n";
		}
		return true;
	}
}

$wgHooks['SkinAfterBottomScripts'][] = 'FathomAnalytics::onSkinAfterBottomScripts';
