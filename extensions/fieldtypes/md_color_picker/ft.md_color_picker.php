<?php
/* ===========================================================================
ext.md_color_picker.php ---------------------------
Requires the FieldFrame extension and jQuery be installed

INFO ---------------------------
Developed by: Ryan Masuga, masugadesign.com
Created:   Mar 10 2009
Last Mod:  Mar 10 2009
SEE: README.textile
=============================================================================== */
if ( ! defined('EXT')) exit('Invalid file request');

class Md_color_picker extends Fieldframe_Fieldtype {

    var $info = array(
        'name'             => 'MD Color Picker',
        'version'          => '1.0.0',
        'desc'             => 'Provides a color picker custom field',
        'docs_url'         => 'http://masugadesign.com/the-lab/scripts/md-color-picker/',
        'versions_xml_url' => 'http://masugadesign.com/versions/'
    );

var $hooks = array('publish_form_headers');

function publish_form_headers()
    {
    $r = $this->get_last_call('') . NL . NL;

		$r .= '<script src="'.FT_URL.'md_color_picker/js/colorpicker.js" type="text/javascript" charset="utf-8"></script>';
		$r .= '<link rel="stylesheet" media="screen" type="text/css" href="'.FT_URL.'md_color_picker/css/colorpicker.css" />' .NL .NL;

		return $r;
    }

    function display_field($field_name, $field_data)
    {
			global $DSP;

			$r = '<script type="text/javascript" charset="utf-8">
		(function($){
				$(document).ready( function(){
					$("#'.$field_name.'").ColorPicker({
						onSubmit: function(hsb, hex, rgb) {
							$("#'.$field_name.'").val(hex);
						},
						onBeforeShow: function () {
							$(this).ColorPickerSetColor(this.value);
						}
					})
					.bind("keyup", function(){
						$(this).ColorPickerSetColor(this.value);
					});
				}); 
			})(jQuery);
			</script>';
		$r .=  $DSP->input_text($field_name, $field_data, '6', '6', 'input', '60px', '', FALSE);

    return $r;
    }

/* END class */
}
/* End of file ft.md_color_picker.php */
/* Location: ./system/extensions/fieldtypes/ft.md_color_picker.php */ 