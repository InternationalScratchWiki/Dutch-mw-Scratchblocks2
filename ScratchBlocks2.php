<?php
/*
 * ScratchBlocks extension for MediaWiki
 * Renders <scratchblocks> tags to shiny scratch blocks
 *
 * Copyright 2013, Tim Radvan
 * MIT Licensed
 * http://opensource.org/licenses/MIT
 *
 * Includes scratchblocks2
 * http://github.com/blob8108/scratchblocks2
 *
 */


if (!defined('MEDIAWIKI')) {
    die();
}


// Hooks

$wgExtensionFunctions[] = 'sbSetup';
$wgHooks['ParserFirstCallInit'][] = 'sbParserInit';


// Hook callback function into parser

function sbParserInit (Parser $parser) {
    // Register <scratchblocks> tag
    $parser->setHook('scratchblocks', 'sbRenderTag');
    $parser->setHook('sb', 'sbRenderInlineTag');
    return true;
}


// Output HTML for <scratchblocks> tag

function sbRenderTag ($input, array $args, Parser $parser, PPFrame $frame) {
    return '<pre class="blocks">' . htmlspecialchars($input) . '</pre>';
}


// Output HTML for <scratchblocks> tag

function sbRenderInlineTag ($input, array $args, Parser $parser,
                            PPFrame $frame) {
    return '<code class="blocks">' . htmlspecialchars($input) . '</code>';
}


// Make wiki load resources

function sbSetup () {
    global $wgOut;
    $wgOut->addModules('ext.scratchBlocks');
}


// Define resources

$wgResourceModules['ext.scratchBlocks'] = array(
    'scripts' => array(
        'scratchblocks2/build/scratchblocks2.js',
        'run_scratchblocks2.js',
        'translations.js',
    ),

    'styles' => 'scratchblocks2/build/scratchblocks2.css',

    // jQuery is loaded anyway
    'dependencies' => array(),

    // Where the files are
    'localBasePath' => __DIR__,
    'remoteExtPath' => 'mw-ScratchBlocks2'
);

