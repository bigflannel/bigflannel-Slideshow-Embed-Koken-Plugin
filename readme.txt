=== bigflannel Slideshow Embed Koken Plugin ===

Contributors: Mike Hartley, bigflannel
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin for use with Koken [http://koken.me].

== Description ==

Adds a shortcode to embed slideshows with next, previous and play/pause controls in essays or pages.  When in text in your Koken admin area, and when editing an essay or page, click on the slideshow icon with a '+' on it to insert a slideshow with controls. Style the added controls using their CSS selectors:

.bigflannel-slideshow-embed .sldshw-prev
.bigflannel-slideshow-embed .sldshw-play
.bigflannel-slideshow-embed .sldshw-next

and their container's CSS selectors:

.bigflannel-slideshow-embed ul .nav-content li

Style the image titles and captions using their CSS selectors:

.bigflannel-slideshow-embed .content-title
.bigflannel-slideshow-embed .content-caption

and their container's CSS selectors:

.bigflannel-slideshow-embed .text-content

== Installation ==

= For a manual installation via FTP =

* Upload the folder 'bigflannel-slideshow-embed' from the zip you download to the directory `/storage/plugins/`
* Activate the plugin through the 'Plugins' screen in settings in your Koken admin area

== Frequently Asked Questions ==

= Where are the settings? =

There are no settings.

== Changelog ==

= 1.04 =

After Koken update 0.19.3, amended the plugin to display the play / pause buttons again.
Updated CSS selectors based on amended code to make multiple slideshows work on the same page.

= 1.03 =

Amended plugin to be prev and next only, play and pause were not working on pages with multiple slideshows.

= 1.02 =

Reduced the length of the plugin title so the button in Koken is shorter and does not get pushed out of the embed window that opens.

= 1.01 =

Updated readme.txt to reflect final GitHub URL.

= 1.0 =

Initial Release

== Author ==

* [Mike Hartley, bigflannel](http://bigflannel.com)
* [Plugin Home Page](https://github.com/bigflannel/bigflannel-Slideshow-Embed-Koken-Plugin)