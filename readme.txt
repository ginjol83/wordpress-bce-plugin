=== WordPress BCE Plugin ===
Contributors: yourusername
Tags: euro, exchange rates, ecb, bce, currency, shortcode
Requires at least: 5.0
Tested up to: 6.7
Stable tag: 1.0.0
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Display Euro exchange rates from the European Central Bank (ECB/BCE) using a simple shortcode.

== Description ==

The WordPress BCE Plugin connects to the official European Central Bank (ECB/BCE) XML feed to fetch and display real-time Euro exchange rates. Just add a shortcode to any post, page, or widget and a formatted table with country flags will appear automatically.

**Features:**

* Real-time exchange rate data from the official ECB XML feed.
* Displays country flags alongside currency codes and values.
* Lightweight — no configuration required.
* Simple shortcode: `[cotizacion_euro]`

**Data source:** [https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml](https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml)

== Installation ==

1. Upload the `wordpress-bce-plugin` folder to the `/wp-content/plugins/` directory, or install the plugin directly through the WordPress Plugins screen by searching for "WordPress BCE Plugin".
2. Activate the plugin through the **Plugins** menu in WordPress.
3. Add the shortcode `[cotizacion_euro]` to any post, page, or widget.

== Frequently Asked Questions ==

= How do I display the exchange rates? =

Add the `[cotizacion_euro]` shortcode to the content of any post, page, or text widget.

= Where does the data come from? =

All data is retrieved from the official European Central Bank (ECB) XML feed. No third-party services other than the ECB feed and flagcdn.com (for flag images) are used.

= How often is the data updated? =

The ECB publishes exchange rates once per business day, typically around 16:00 CET.

= Does the plugin cache the exchange rate data? =

The current version fetches data on every page load. Caching via WordPress transients is planned for a future release.

== Screenshots ==

1. Exchange rate table displayed on the front end with country flags and values.

== Changelog ==

= 1.0.0 =
* Initial release.

== Upgrade Notice ==

= 1.0.0 =
Initial release. No upgrade needed.
