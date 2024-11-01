=== Woocommerce Single Product Search Redirect ===
Contributors: patelprashant8490
Donate link: patelprashant8490@gmail.com
Tags: woocommerce,woocommerce search redirect,woocommerce single search redirect,single search redirect,stop redirect,woocommerce single product search redirect,woocommerce single product search
Requires at least: 4.4
Tested up to: 4.6.1
Stable tag: trunk

This Plugin will allow you to manage redirect to product detail page on single result on search page.

== Description ==

I have created this plugin as i faced some issues in some woo-commerce sites i developed.

we generally use product search widget anywhere in woo store. 

I noticed that while your search query returns only 1 result it is redirect to that product detail page.

This happens in two cases.
1.  you search ends with only single result
2.  you have set "n" products to display on search page, and your search search returns (n+1),2n+1,3n+1,etc... results (for example you have set 9 products to display on search result page. when your search returns 10,19,28,.. results your 2nd,3rd,.. page will have only 1 product to display.)

In above conditions, woocommerce redirect the last single search to that last product detail page by default.

So using this plugin you can set whether to redirect automatically to that detail page or allow users to see last single search result in search format only.


== Installation ==

How to Woocommerce Single Product Search Redirect

1. downlaod the plugin.
2. Upload `woocommerce-single-product-search-redirect` to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. All done. (go to products tab in woocommerce setting to enable/disable redirection on single product search.)


== Screenshots ==

1. Enable/Disable redirection on single product search page.
2. How single product search page will look if you activated plugin.

== Changelog ==

= 1.0 =
The First Release

= 1.1 =
Update to Support with Woocommerce 2.6.4


