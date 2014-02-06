/**
Editable text slots
@class
@name chunkText
@extends $.ui.chunk
@memberOf $.ui
*/
$.widget('ui.chunkText', $.ui.chunk,

	/**
	@lends $.ui.chunkText
	*/
	{

	title : '',

	content : '',

	bind : function() {
		var element = this.element;

		$.ui.chunk.prototype.bind.call(this);

		this.element
			.on('click', function() {
				element.focus();
			})
			.on('blur', function() {
				$('body').editor('blur', element);
			});
	},

	/**
	Make the element editable by invokeing boom.editor.edit() on it.
	*/
	edit : function(){

		var self = this;

		$.boom.log('Text chunk slot edit');

		var $content = this.element.find( '.slot-content');

		var edit_content = function( $element ) {

			$element[0].id = $element[0].id || $.boom.util.dom.uniqueId('boom-dom-wysiwyg-');

			var old_html = self.element.html();

			if ( $element.text() == 'Default text.' ) {
				$element.html( '' );
			}

			$element.unbind('keydown');

			$('body').editor('edit', $element)
				.fail( function(){
					self.element.html( old_html ).show();
					self.destroy();
				})
				.done(function() {
					var edited = old_html != $element.html();

					if ($element.text() == '') {
						self.remove();
					} else if (edited == true) {
						self._save();
					} else {
						self.bind();
					}
				});
		};

		if ( $content.length ) {

			edit_content( $content );
			this.element
				.find( '.slot-title' )
				.attr( 'contenteditable', 'true' );

		} else {

			edit_content( this.element );
		}

	},

	/**
	Get the chunk HTML, escaped and cleaned.
	*/
	getData : function(){
		var $content = this.element.find( '.slot-content');

		if ( $content.length ) {
			this.content = $content.html();
			this.title = this.element.find( '.slot-title').text();
		} else {
			this.title = null;
			this.content = this.element.html();
		}

		return { title : this.title, text : this.content, is_block : this.element.attr('data-boom-is-block') };
	}
});