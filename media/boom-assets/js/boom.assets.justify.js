$.widget('boom.justifyAssets', {
	$el : null,
	targetRightOffset : null,
	windowWidth : null,

	_bind : function() {
		var self = this;
	},

	_create : function() {
		this.$el = $(this.element);

		this._bind();

		this._setDimensions();
		this.justify();
	},

	_getOffset : function($el) {
		var offset = $el.offset();
		offset.right = this.windowWidth - (offset.left + $el.outerWidth(true));

		return offset;
	},

	justify : function() {
		var currentRow = new Row();
		var prevRow;
		var self = this;

		this.$el.children().each(function(index, element) {
			var $child = $(element);
			$child.offset = self._getOffset($child);

			if ( ! $child.css('height') || ! $child.attr('data-aspect-ratio')) {
				$child.remove();
				return true;
			}

			prevRow = jQuery.extend({}, currentRow);
			currentRow.addElementToRow($child);

			if (currentRow.isAtStart() && ! prevRow.isAtStart()) {
				prevRow.expandTo(self.targetRightOffset);
			}

		});

		var lastRowGap = currentRow.determineGap(this.targetRightOffset);

		if (lastRowGap <= (this.$el.outerWidth(true) * 0.75)) {
			currentRow.expandTo(self.targetRightOffset);
		} else {
			prevRow.merge(currentRow);
		}
	},

	_setDimensions : function() {
		this.windowWidth = $(window).width();
		this.targetRightOffset = (this.windowWidth - (this.$el.offset().left + this.$el.innerWidth()));
	}
});

function Row() {
	this.elements = [];
	this.aspectRatioSum = 0;

	Row.prototype.addElementToRow = function($el) {
		if (this._elementStartsRow($el)) {
			this.elements = [];
			this.aspectRatioSum = 0;
		}

		this.elements.push($el);
		this.aspectRatioSum += parseFloat($el.attr('data-aspect-ratio'));

		return this;
	};

	Row.prototype.determineGap = function(offset) {
		return this.elements[this.elements.length - 1].offset.right - offset;
	};

	Row.prototype.expandTo = function(offset) {
		var endOfRowGap = this.determineGap(offset);

		if (endOfRowGap > 0) {
			var increaseBy = Math.floor(endOfRowGap / this.aspectRatioSum);
			var remainder = Math.floor(endOfRowGap);

			if (increaseBy <= endOfRowGap) {
				$.each(this.elements, function(index, $el) {
					var incWidth = Math.floor(increaseBy * $el.attr('data-aspect-ratio'));
					remainder -= incWidth;

					$el
						.height('+=' + increaseBy)
						.width('+=' + incWidth);
				});
			}

			if (remainder > 0) {
				while (remainder > 0) {
					$.each(this.elements, function(index, $el) {
						if (remainder < 1) {
							return false;
						}

						$el.css('margin-right', '+=1');
						remainder -= 1;
					});
				}
			}
		}
	};

	Row.prototype.shrinkBy = function(size) {
		var perElement = Math.ceil(size / this.elements.length);

		$.each(this.elements, function(index, $el) {
			$el
				.height('-=' + Math.floor(perElement / $el.attr('data-aspect-ratio')))
				.width('-=' + perElement);
		});
	};

	Row.prototype.getWidth = function() {
		var width = 0;

		$.each(this.elements, function(index, $el) {
			width += $el.outerWidth(true);
		});

		return width;
	};

	Row.prototype.isAtStart = function() {
		return this.elements.length <= 1;
	};

	Row.prototype.merge = function(row) {
		var width = row.getWidth();
		this.shrinkBy(width);

		var heightDif = this.elements[0].height() - row.elements[0].height();

		$.each(row.elements, function(index, $el) {
			$el.height('+=' + heightDif);
		});
	};

	Row.prototype._elementStartsRow = function($el) {
		if ( ! this.elements.length) {
			return true;
		}

		return ($el.offset.top >= (this.elements[this.elements.length - 1].offset.top + $el.height()));
	};
}