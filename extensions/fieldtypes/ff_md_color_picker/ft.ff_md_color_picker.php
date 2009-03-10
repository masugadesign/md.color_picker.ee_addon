<?php
/* ===========================================================================
ext.md_add_sitename.php ---------------------------
Add name of current site to the CP header.
            
INFO ---------------------------
Developed by: Ryan Masuga, masugadesign.com
Created:   Jun 25 2007
Last Mod:  Jan 12 2009


Related Thread: http://expressionengine.com/forums/viewthread/54996/

CHANGELOG ---------------------------
1.2.2 - Old school update checking removed to help solve CP homepage errors
1.2.1 - Testing Subversion...
1.2.0 - Fixed bug where styles could be rendered in head more than once; added docs URL;
        added version checking (Thanks Leevi Graham); fixed default settings problem; added
        check to see if info is in session or cache to keep things speedy (again, thanks, Leevi.)
1.1.5 - Fixed in case you use a .png instead of .ico
1.1.4 - Updated the way $siteurl is created
1.1.3 - Added ability to style text as a normal or italic font
1.1.2 - Added ability to put a site's favicon next to the text
1.1.1 - Added Override setting, to put whatever text you want at the upper left
1.1.0 - Added settings, optimized some PHP
1.0.2 - Added 'stripslashes' for site names with apostrophes
1.0.1 - Small style tweaks
1.0.0 - Initial release 

http://expressionengine.com/docs/development/extensions.html
=============================================================================== */
if ( ! defined('EXT')) exit('Invalid file request');




class Ff_md_color_picker extends Fieldframe_Fieldtype {

    var $info = array(
        'name'             => 'MD Color Picker',
        'version'          => '1.0.0',
        'desc'             => 'Provides as single checkbox field type',
        'docs_url'         => 'http://masugadesign.com/',
        'versions_xml_url' => 'http://masugadesign.com/versions/'
    );

    function display_field($field_name, $field_data)
    {
        global $DSP;
        //$checked = ($field_data == 'y') ? 1 : 0;
        //return $DSP->input_checkbox($field_name, 'y', $checked);

				return  $DSP->input_text('color_pick', '', '20', '60', 'input', '260px', 'class="colorpicker"', FALSE).
 



    }


/* END class */
}
/* End of file ft.ff_md_color_picker.php */
/* Location: ./system/extensions/fieldtypes/ft.ff_md_color_picker.php */ 