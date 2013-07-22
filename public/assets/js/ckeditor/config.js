/**
 * @license Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

 CKEDITOR.stylesSet.add('default',[
 		{name:'Franklin Title small' ,element:'p',attributes:{class:'franklin_subtitle_small'}},
 		{name:'Franklin Title big' ,element:'p',attributes:{class:'franklin_subtitle_big'}},
 		{name:'Metadata' ,element:'p',attributes:{class:'metadata'}},
 		{name:'Metadata bold' ,element:'p',attributes:{class:'metadata_bold'}},
 		{name:'Event date italics' ,element:'p',attributes:{class:'event_date'}},
  		{name:'Wide image' ,element:'p',attributes:{class:'wide_image'}},
  		{name:'Cited Work', element:'cite'}
 		]);

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config
  config.entities = false;
  config.entities_latin = false;
  config.htmlEncodeOutput = false;
  config.entities_latin = false;

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'justify' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight'  ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];
	config.height = 600;
	config.filebrowserBrosdwseUrl = '/admin/ckupload/create';
	config.filebrowserImageUploadUrl = '/admin/ckupload/create';

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript';
};




