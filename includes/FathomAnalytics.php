<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This file is a MediaWiki extension, it is not a valid entry point.' );
}

$wgExtensionCredits['other'][] = [
	'path' => __FILE__,
	'name' => 'Fathom Analytics',
	'version' => '0.1',
	'author' => "Matthew Jorgensen",
	'url' => 'https://git.sr.ht/~mjorgensen/MediaWiki-FathomAnalytics',
	'license-name' => 'GPL-2.0-or-later'
];

class FathomAnalytics {
	public static function onSkinAfterBottomScripts( $skin, &$text = '') {
		global $wgFathomAnalyticsURL, $wgFathomAnalyticsSiteID;

		if ( $skin->getUser()->isAllowed( 'noanalytics' ) ) {
			$text .= "<!-- Web analytics code inclusion is disabled for this user. -->\r\n";
			return true;
		}

		if ( $wgFathomAnalyticsURL == '' ) {
			$wgFathomAnalyticsURL = 'https://cdn.usefathom.com/script.js';
		}

		$appended = false;
		if ( $wgFathomAnalyticsSiteID !== '') {
			$text .= "<script src=" . $wgFathomAnalyticsURL . " site=" . $wgFathomAnalyticsSiteID . " defer></script>\r\n";
			$appended = true;
		}

		if ( !$appended ) {
			$text .= "<!-- No analytics configured. -->\r\n";
		}
		return true;
	}
}

$wgHooks['SkinAfterBottomScripts'][] = 'FathomAnalytics::onSkinAfterBottomScripts';
