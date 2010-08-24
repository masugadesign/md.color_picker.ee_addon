<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* ===========================================================================
ft.md_color_picker.php ---------------------------
A color picker Field Type for the ExpressionEngine control panel.

INFO ---------------------------
Developed by: Ryan Masuga, masugadesign.com
Created:   Mar 10 2009
Last Mod:  May 10 2010
SEE: README.textile
=============================================================================== */

class Md_color_picker_ft extends EE_Fieldtype
{
	var $info = array(
	    'name'             => 'MD Color Picker',
	    'version'          => '1.0.3'
	);
    
	function Md_color_picker_ft()
	{
		$this->EE =& get_instance();
		
		$this->EE->load->library('javascript');
	}
	
	function display_publish_field($data)
	{
		return $this->display_field($data);
	}
    
	function _display_field($name, $data)
	{
		$this->EE->load->helper('form');
		
		$this->EE->cp->add_to_head('<script type="text/javascript" src="'.$this->EE->config->item('theme_folder_url').'third_party/md_color_picker/js/colorpicker.js"></script>');
		$this->EE->cp->add_to_head('<link rel="stylesheet" media="screen" href="'.$this->EE->config->item('theme_folder_url').'third_party/md_color_picker/css/colorpicker.css" />');
	
		return form_input(array(
			'name' => $name,
			'value' => $data,
			'size' => '6',
			'maxlength' => '6',
			'class' => 'input',
			'style' => 'width:60px;'
		));
	}

	/**
	 * Display Field
	 * 
	 * @param  string  $field_name      The field's name
	 * @param  mixed   $field_data      The field's current value
	 * @param  array   $field_settings  The field's settings
	 * @return string  The field's HTML
	 */
	function display_field($data)
	{
		$this->EE->javascript->output('
		    $("input[name='.$this->field_name.']").ColorPicker({
			    onSubmit: function(hsb, hex, rgb) {
				    $("input[name='.$this->field_name.']").val(hex);
			    },
			    onBeforeShow: function () {
				    $(this).ColorPickerSetColor(this.value);
			    }
		    })
		    .bind("keyup", function(){
			    $(this).ColorPickerSetColor(this.value);
		    });
		');
	
		return $this->_display_field($this->field_name, $data);
	}

	/**
	 * Display Cell
	 * 
	 * @param  string  $cell_name      The cell's name
	 * @param  mixed   $cell_data      The cell's current value
	 * @param  array   $cell_settings  The cell's settings
	 * @return string  The cell's HTML
	 */
	function display_cell($data)
	{
		$this->EE->javascript->output('
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
			}
		');

		return $this->_display_field($this->cell_name, $data);
	}

/* END class */
}
/* End of file ft.md_color_picker.php */
/* Location: ./system/extensions/fieldtypes/md_color_picker/ft.md_color_picker.php */ 