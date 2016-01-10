A simple MediaWiki extension for rendering Scratch blocks.

Transforms `<scratchblocks>` tags inside wiki articles into `<pre class="blocks">`
in the HTML, which are then rendered to scratch blocks using CSS and JS
included in the page.


Installation
============

Just drop this folder into MediaWiki's "extensions/" folder, and add

    require_once( "$IP/extensions/mw-ScratchBlocks2/ScratchBlocks2.php" );

to your "LocalSettings.php".


Warning
-------

This repository uses Git submodules. If you `git clone`, make sure to include the `--recursive` option.

Changes
=======

Edited for the Dutch Scratch Wiki so that it supports Dutch.
