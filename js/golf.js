(function ($) {
	Drupal.behaviors.golfpal_toggle = {
	  attach: function (context, settings) {
	  	
	    $('[data-action="toggle"]').click(function (e) {
	    	e.preventDefault();
	    	var data = $(e.currentTarget).data();
	    	if(data.target == 'child-row'){
	    		$(e.currentTarget).toggleClass('active').parents('tr').next('.child-row').toggle();
	    	}
	    });
	  }
	};
})(jQuery);