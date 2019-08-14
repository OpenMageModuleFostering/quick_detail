jQuery(function($) {
    

    function _qsJnit(){
	
                var selectorObj = arguments[0];
                var listprod = $(selectorObj.itemClass);
		
		var _qsHref = "<div id=\"quickdetail_handler\" href=\"#\" style=\"visibility:hidden;position:absolute;top:0;left:0\"></div>";
		$(document.body).append(_qsHref);
                
                $.each(listprod, function(index, value) { 
                    var liindex = this;
                    $(selectorObj.imgClass, this).bind('mouseover', function() {
                       $('#quickdetail_handler').html($(liindex).find('.quickdetail_div').html());
                    })
                    $(selectorObj.imgClass, this).tooltip({
                                track: true,
                                delay: 0,
                                showURL: false,
                                showBody: " - ",
                                fade: 250,
                                bodyHandler: function() { 
                                return $("#quickdetail_handler").html(); 
                                } 
                        });
                        var bkgColor = '#'+$('#background_color_info').attr('value');
                        $('#tooltip').css('background-color',bkgColor);
                });
		
    }
    
    _qsJnit({
		itemClass : '.category-products li.item', //selector for each items in catalog product list,use to insert quickview image
                imgClass: '.product-image' //class for quickview href product-collateral
	});
})