/**
 * @license Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

 CKEDITOR.stylesSet.add('default',[
 		{name:'Cited Work',element:'cite'},
 		{name:'Franklin Title small',element:'p',attributes:{class:'franklin_subtitle_small'}},	
 		{name:'Franklin Title big',element:'p',attributes:{class:'franklin_subtitle_big'}},
 		{name:'Metadata',element:'p',attributes:{class:'metadata'}},
 		{name:'Metadata bold',element:'p',attributes:{class:'metadata_bold'}},
 		{name:'Event date italics',element:'p',attributes:{class:'event_date'}},
  		{name:'Wide image',element:'p',attributes:{class:'wide_image'}},

 		//{name:'Big',element:'big'},
 		//{name:'Small',element:'small'},
 		//{name:'Typewriter',element:'tt'},
 		//{name:'Computer Code',element:'code'},
 		//{name:'Keyboard Phrase',element:'kbd'},
 		//{name:'Sample Text',element:'samp'},
 		//{name:'Variable',element:'var'},
 		//{name:'Deleted Text',element:'del'},
 		//{name:'Inserted Text',element:'ins'},
 		//{name:'Inline Quotation',element:'q'},
 		//{name:'Language: RTL',element:'span',attributes:{dir:'rtl'}},
 		//{name:'Language: LTR',element:'span',attributes:{dir:'ltr'}},
 		//{name:'Image on Left',element:'img',attributes:{style:'padding: 5px; margin-right: 5px',border:'2',align:'left'}},
 		//{name:'Image on Right',element:'img',attributes:{style:'padding: 5px; margin-left: 5px',border:'2',align:'right'}},
 		//{name:'Borderless Table',element:'table',styles:{'border-style':'hidden','background-color':'#E6E6FA'}},
 		//{name:'Square Bulleted List',element:'ul',styles:{'list-style-type':'square'}}
 		]);

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

  config.contentsCss = '/assets/css/u.css';
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




