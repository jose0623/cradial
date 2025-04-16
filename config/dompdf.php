<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    |
    | Set some default values. It is possible to add all defines that can be set
    | in dompdf_config.inc.php. You can also override the entire config file.
    |
    */
    'show_warnings' => false,   // Throw an Exception on warnings from dompdf

    'public_path' => null,  // Override the public path if needed

    /*
     * Dejavu Sans font is missing glyphs for converted entities, turn it off if you need to show € and £.
     */
    'convert_entities' => true,

    'options' => [
        'default_font' => 'helvetica', // Fuente estándar que viene con DomPDF
        'enable_font_subsetting' => true,
        'isRemoteEnabled' => true,
        'isHtml5ParserEnabled' => true,
        'enable_php' => false,
        'enable_javascript' => false,
        'dpi' => 96,
    ],

];
