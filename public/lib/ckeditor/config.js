/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */
 var domain = window.location.protocol +'//'+ window.location.hostname +'/bdsmini';
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = domain + '/public/lib/ckfinder/ckfinder.html';

	config.filebrowserImageBrowseUrl = domain +'/public/lib/ckfinder/ckfinder.html?type=Images';

	config.filebrowserFlashBrowseUrl = domain +'/public/lib/ckfinder/ckfinder.html?type=Flash';

	config.filebrowserUploadUrl = domain + '/public/lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

	config.filebrowserImageUploadUrl = domain +'/public/lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	 
	config.filebrowserFlashUploadUrl = domain +'/public/lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

	// config.extraPlugins = 'video';
	// config.extraPlugins = 'maximize';
};
