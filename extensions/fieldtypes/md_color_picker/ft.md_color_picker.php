<?php
/* ===========================================================================
ext.md_color_picker.php ---------------------------
A color picker Field Type for the ExpressionEngine control panel.
Requirements:
1) Brandon Kelly's FieldFrame extension 
http://github.com/brandonkelly/bk.fieldframe.ee_addon/tree/master
2) jQuery (for the Control Panel; extension comes bundled with ExpressionEngine)

INFO ---------------------------
Developed by: Ryan Masuga, masugadesign.com
Created:   Mar 10 2009
Last Mod:  Mar 23 2009
SEE: README.textile
=============================================================================== */
if ( ! defined('EXT')) exit('Invalid file request');

class Md_color_picker extends Fieldframe_Fieldtype {

    var $info = array(
        'name'             => 'MD Color Picker',
        'version'          => '1.0.1',
        'desc'             => 'Provides a color picker custom field',
        'docs_url'         => 'http://masugadesign.com/the-lab/scripts/md-color-picker/',
        'versions_xml_url' => 'http://masugadesign.com/versions/'
    );

	function _display_field($field_name, $field_data)
	{
		global $DSP;

		$this->include_js('js/colorpicker.js');
		$this->include_css('css/colorpicker.css');

		return $DSP->input_text($field_name, $field_data, '6', '6', 'input', '60px', '', FALSE);
	}

	/**
	 * Display Field
	 * 
	 * @param  string  $field_name      The field's name
	 * @param  mixed   $field_data      The field's current value
	 * @param  array   $field_settings  The field's settings
	 * @return string  The field's HTML
	 */
    function display_field($field_name, $field_data, $field_settings)
    {
		$this->insert_js('
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
		');

    	return $this->_display_field($field_name, $field_data);
    }

	/**
	 * Display Cell
	 * 
	 * @param  string  $cell_name      The cell's name
	 * @param  mixed   $cell_data      The cell's current value
	 * @param  array   $cell_settings  The cell's settings
	 * @return string  The cell's HTML
	 */
	function display_cell($cell_name, $cell_data, $cell_settings)
	{
		$this->insert_js('
			(function($){
				$.fn.ffMatrix.onDisplayCell.md_color_picker = function(cell) {
					$("input", cell).ColorPicker({
						onSubmit: function(hsb, hex, rgb) {
							$("input", cell).val(hex);
						},
						onBeforeShow: function () {
							$(this).ColorPickerSetColor(this.value);
						}
					})
					.bind("keyup", function(){
						$(this).ColorPickerSetColor(this.value);
					});
				}; 
			})(jQuery);
		');

		return $this->_display_field($cell_name, $cell_data);
	}

/* END class */
}
/* End of file ft.md_color_picker.php */
/* Location: ./system/extensions/fieldtypes/md_color_picker/ft.md_color_picker.php */ 