;(function($){
	$.fn.uptaccordion = function(op){
		return this.each(function() {
			var t = this, o = $.extend({},op);
			
			$('li:first', t).addClass('active');
			
			$('li:not(.active) .accordion-content', t).hide();
			
			$('.accordion-header', t).click(function() {
				var $this = $(this);
				
				if($this.parent().hasClass('active')) return;
				
				$('.active', t).removeClass('active').children('.accordion-content').slideUp();
            	$this.parent().toggleClass('active').find('.accordion-content').slideDown();
				
			});
		});
	};
	
	$.fn.upttabs = function(op){
		return this.each(function() {
			var t = this, o = $.extend({},op);
			
			$('.panel:first', t).addClass('active');
			$('.tabs li:first', t).addClass('active');
			
			$('.panel:not(.active)', t).hide();
			
			$('.tabs a', t).click(function(e){
				var l = $(this).parent(), u = l.parent(), p = u.parent();
				
				$('li', u).removeClass('active');
				$(l).addClass('active');
				
				$('.panel', p).hide();
				$($(this).attr('href'), p).show();
				
				e.preventDefault();
			});
		});
	};
	
})(jQuery);