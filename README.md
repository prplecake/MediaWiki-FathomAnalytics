# FathomAnalytics

This MediaWiki extension provides a way to configure Fathom Analytics
for your MediaWiki powered wiki.

## Installation

1. Either download a release or clone this repository. The extension
files
should end up in a directory called `FathomAnalytics` inside your
`extensions/` directory.
1. Add the following to the bottom of your `LocalSettings.php`:
   
   ```php
   wfLoadExtension( "FathomAnalytics" );
   ```

1. **Done!**

## Configuration

The following variables configure this extension:

* `$wgFathomAnalyticsURL` - defaults to
`http://cdn.usefathom.com/script.js`. Set if you use a custom domain to
serve `script.js`.
* `$wgFathomAnalyticsSiteID` - the Fathom Site ID for your site.

### Example

```php
wfLoadExtension( "FathomAnalytics" );
$wgFathomAnalyticsURL = "https://candle.example.com/script.js";
$wgFathomAnalyticsSiteID = "ABCDEFGH";
```
