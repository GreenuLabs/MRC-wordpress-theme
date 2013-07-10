jQuery(function( $ ) {
	$(".single-nav a").tipsy({ gravity: "s" });
	$(".social a").tipsy({ gravity: "s" });
});


(function($) {
 
jQuery.fn.sorted = function(customOptions) {
		var options = {
			reversed: false,
			by: function(a) {
				return a.text();
			}
		};
		jQuery.extend(options, customOptions);
	
		$data = jQuery(this);
		arr = $data.get();
		arr.sort(function(a, b) {
			
		   	var valA = options.by(jQuery(a));
		   	var valB = options.by(jQuery(b));
			if (options.reversed) {
				return (valA < valB) ? 1 : (valA > valB) ? -1 : 0;				
			} else {		
				return (valA < valB) ? -1 : (valA > valB) ? 1 : 0;	
			}
		});
		return jQuery(arr);
	};

})(jQuery);

jQuery(function() {
  
  var read_button = function(class_names) {
    var r = {
      selected: false,
      type: 0
    };
    for (var i=0; i < class_names.length; i++) {
      if (class_names[i].indexOf('active') == 0) {
        r.selected = true;
      }
      if (class_names[i].indexOf('segment-') == 0) {
        r.segment = class_names[i].split('-')[1];
      }
    };
    return r;
  };
  
  var determine_sort = function($buttons) {
    var $selected = $buttons.parent().filter('[class*="active"]');
    return $selected.find('a').attr('data-value');
  };
  
  var determine_kind = function($buttons) {
    var $selected = $buttons.parent().filter('[class*="active"]');
    return $selected.find('a').attr('data-value');
  };
  
  var $preferences = {
    duration: 400,    
    adjustHeight: 'dynamic',
	useScaling: true
  };
  
  var $list = jQuery('#portfolio-items');
  var $data = $list.clone();
  
  var $controls = jQuery('#portfolio-tags');
  
  $controls.each(function(i) {
    
    var $control = jQuery(this);
    var $buttons = $control.find('a');
    
    $buttons.bind('click', function(e) {
      
      var $button = jQuery(this);
      var $button_container = $button.parent();
      var button_properties = read_button($button_container.attr('class').split(' '));      
      var selected = button_properties.selected;
      var button_segment = button_properties.segment;

      if (!selected) {

        $buttons.parent().removeClass('active');
        $button_container.addClass('active');
        
        var sorting_type = determine_sort($controls.eq(1).find('a'));
        var sorting_kind = determine_kind($controls.eq(0).find('a'));
        
        if (sorting_kind == 'all') {
          var $filtered_data = $data.find('li');
        } else {
          var $filtered_data = $data.find('li.' + sorting_kind);
        }
        
        if (sorting_type == 'size') {
          var $sorted_data = $filtered_data.sorted({
            by: function(v) {
              return parseFloat(jQuery(v).find('span').text());
            }
          });
        } else {
          var $sorted_data = $filtered_data.sorted({
            by: function(v) {
              return jQuery(v).find('strong').text().toLowerCase();
            }
          });
        }
        
        $list.quicksand($sorted_data, $preferences);
        
      }
      
      e.preventDefault();
    });
    
  }); 

 
});