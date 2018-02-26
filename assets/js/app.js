( function( $ ) {
	'use strict';

	var map = null;

	$(document).ready(function(){

		/***************
		 * Menu Sliding
		 ***************/
		 var menu_button = $('.menu-button');
		 var menu_div = $('.side-menu');
		 var overlay = $('.side-menu-overlay');
		 var menu_inner = $('.menu-side__inner');

		 menu_button.click(function() {
		 	$(this).toggleClass('open');
		 	menu_div.toggleClass('open');
		 	overlay.fadeToggle();
		 });

		 overlay.click(function(){
		 	menu_button.removeClass('open');
		 	menu_div.removeClass('open');
		 	overlay.fadeOut();
		 });

		 function calc_menu_width() {
		 	var offset = 190;
		 	var w = ( $(window).width() - $('.container').outerWidth() ) / 2 + offset;
		 	menu_inner.css('width', w);
		 }
		 if ( $(window).width() > 1024 ) {
		 	calc_menu_width();
		 }
		 

		 $(window).resize(function(){
		 	if ( $(window).width() > 1024 ) {
		 		calc_menu_width();
		 	}
		 	
		 });

		/******************
		 * Menu Collapsing
		 ******************/
		 var menu_parent = $('.menu-item-has-children');

		 menu_parent.click(function(e) {
		 	//e.preventDefault();
		 	e.stopPropagation();
		 	$(this).toggleClass('expanded');
		 	$(this).find('.sub-menu').slideToggle();
		 });

	    /***********************
	     *  Top Header Scroll
	     **********************/
	     var top_header = $('.site-header__top');

	     top_header_scroll();
	     $(window).scroll(function(){
	     	top_header_scroll();
	     });

	     function top_header_scroll() {
	     	var offset;
	     	if ( $('body').hasClass('header-image')) {
	     		offset = 500;
	     	} else {
	     		offset = 60;
	     	}

	     	if ( $(window).width() <= 1024 ) {
	     		offset = 250;
	     	}

	     	if ( $(window).width() <= 768 ) {
	     		offset = 150;
	     	}

	     	if ( $(window).width() <= 480 ) {
	     		offset = 60;
	     	}



	     	if ( $(window).scrollTop() > offset ) {
	     		top_header.addClass('top--small');
	     	} else {
	     		top_header.removeClass('top--small');
	     	}
	     }

	    /********************
	     * Select replacement
	     *******************/
	     $('select').select2({
	     	minimumResultsForSearch: Infinity
	     });

		/********************
		 *   Precinct Bar
		 *******************/
		 var bar_title = $('.precinct-bar .bar__title');
		 var offset = 37;

		 bar_title.click(function(){
		 	$(this).parent().toggleClass('open');
		 	if ( $(window).width() > 1024 ) {
		 		$(this).parent().next().toggleClass('open');
		 		$(this).parent().prev().toggleClass('open');
		 	}
		 	var content_h = $(this).next('.bar__content').height();
		 	if ( $(window).width() > 1024 ) {
		 		is_padding_needed();		 		
		 	}
		 });

		 var precicnt_bar = $('.precinct-bar');
		 var stretch_content = $('.precint-bar__partners .bar__content');

		 function precinct_calc_width() {
		 	var left = $('.container').outerWidth() * 0.3;
		 	var right = $('.container').outerWidth() * 0.7;

		 	if ( $(window).width() > 1024 ) {
		 		$('.left-width').css('width', left);
		 		$('.right-width').css('width', right);

		 		var promo_w = $('.container').outerWidth() * 0.3 + (($(window).width() -  $('.container').outerWidth() ) /2 );
		 		var partners_w = $('.container').outerWidth() * 0.7 + (($(window).width() -  $('.container').outerWidth() ) /2 );
		 		$('.precint-bar__promo').css('width', promo_w);
		 		$('.precint-bar__partners').css({'width': partners_w, 'margin-left': promo_w});
		 		var calc_width = stretch_content.width() + ($(window).width() - $('.container').outerWidth()) / 2;
		 	}
		 	

		 	
		 	//stretch_content.css('width', calc_width);
		 }

		 function is_padding_needed() {
		 	var height = $('.bar__content').height() + 37;
		 	if ( $('.precinct-bar .open').length > 1 ) {
		 		
		 		$('.precinct-bar-wrap').css('padding-top', height);
		 		$('.precinct-bar .open').css('bottom', 0);
		 	} else {
		 		$('.precinct-bar-wrap').css('padding-top', '0');
		 		$('.precinct-bar > div').css('bottom', -37);
		 	}
		 }

		 if ( $(window).width() > 1024 ) {
		 	 is_padding_needed();
		 }
		

		 precinct_calc_width();
		 $(window).resize(function(){
		 	if ( $(window).width() > 1024 ) {
		 		precinct_calc_width();
		 	}

		 });

		 if ( $(window).width() <= 1024 ) {
		 	$('.precinct-bar > div').removeClass('open');
		 }

		 /********************
		  *   Footer form
		  *******************/
	  	var footer_form = {
	  		css: '',
	  		portalId: '409345',
	  		target: '.footer-subscribe__form',
	  		formId: '3e4e0d09-e2e6-453a-aa35-f6d88ecd2104'
	  	};
		hbspt.forms.create( footer_form );

		 /********************
		  *   	Modals
		  *******************/
		var newsletter_form = {
		    css: '',
		    portalId: '409345',
		    target: '.modal-subscribe__form',
		    formId: '3e4e0d09-e2e6-453a-aa35-f6d88ecd2104'
		};

		var refer_form = {
		    css: '',
		    portalId: '409345',
		    target: '.modal-refer__form',
		    formId: 'fd6665de-0664-4bf6-aabf-46f4e9b5187e'
		};

		var modal = $('#modal-subscribe');
		
		$('#subscribe-modal').click(function(e){
			e.preventDefault();
			$('#modal-subscribe').show(100, function(){
				$(this).addClass('modal--open');	
			});
			hbspt.forms.create( newsletter_form );
		});

		$('#refer-modal').click(function(e){
			e.preventDefault();
			$('#modal-refer').show(100, function(){
				$(this).addClass('modal--open');	
			});
			hbspt.forms.create( refer_form );
		});

		$('.person-thumbnail__link').click(function(e){
			e.preventDefault();
			$('.instructors__row').removeClass('loop-active');
			$(this).parents('.instructors__row').addClass('loop-active');
			load_person($(this));
		});

		$('.gallery-alt-btn').click( function(){
			$('.modal').addClass('loading');
		});

		$('.gallery-btn__prev').click(function(){
			var position = parseFloat($('.modal').attr('data-position'));
			var target = position - 1;
			var el = $('.loop-active .person-thumbnail__link[data-position='+target+']');
			var last = $('.loop-active .person-thumbnail__link').last();
			if (el.length) {
				load_person(el);
			} else {
				load_person(last);
			}
	
		});

		$('.gallery-btn__next').click(function(){
			var position = parseFloat($('.modal').attr('data-position'));
			var target = position + 1;
			var el = $('.loop-active .person-thumbnail__link[data-position='+target+']');
			var first = $('.loop-active .person-thumbnail__link').first();
			if (el.length) {
				load_person(el);
			} else {
				load_person(first);
			}
		});

		$('.modal').keyup(function (event) {
			if (event.which === 37) { // left
				$('.modal').addClass('loading');
				var position = parseFloat($('.modal').attr('data-position'));
				var target = position - 1;
				var el = $('.loop-active .person-thumbnail__link[data-position='+target+']');
				var last = $('.loop-active .person-thumbnail__link').last();
				if (el.length) {
					load_person(el);
				} else {
					load_person(last);
				}

			}
			if (event.which === 39) { // right
				$('.modal').addClass('loading');
				var position = parseFloat($('.modal').attr('data-position'));
				var target = position + 1;
				var el = $('.loop-active .person-thumbnail__link[data-position='+target+']');
				var first = $('.loop-active .person-thumbnail__link').first();
				if (el.length) {
					load_person(el);
				} else {
					load_person(first);
				}

			}
		});

		function load_person(el) {
			$('.modal-instructor__content').empty();
			$('.modal-instructor__picture').empty();

			var person_id = el.data('instructor-id');
			var person_type = el.data('person-type');
			var index = el.data('position');
			
			if ( typeof person_id != 'undefined' ) {
				var data = {
					'action': 'person_modal_data',
					'person_id': person_id,
					'person_type': typeof person_type != 'undefined' ? person_type : 'instructor',
				};
				
				$.ajax({
					url: wp.ajaxurl,
					type: 'post',
					data: data,
				}).done(function(person){
					$('.modal').removeClass('loading');
					var person_name_html = '<h2>' + person.name + '</h2>';
					$('.modal').attr('data-position', index);

					if ( typeof person.image != 'undefined' ) {
						var person_image_html = '<img src="' + person.image +'" alt="instructor-image" />';
					} else {
						var person_image_html = '<div class="nophoto"><span class="icon-ico-gravatar"></span></div';
					}

					$(person_image_html).appendTo('.modal-instructor__picture');

					$(person_name_html).appendTo('.modal-instructor__content');
					$(person.description).appendTo('.modal-instructor__content');
					$('#modal-instructor').show(100, function(){
						$(this).addClass('modal--open');	
					});
				});
			}
		}

		//----------------------------------

		$('.modal__close').click(function(){
			closeModal();
		});

		$('body').keyup(function (event) {
	    	if (event.which === 27) { 
	    		closeModal();
	    	}
	   	});

	   	function closeModal() {
			$('.modal').hide(100, function(){
				$(this).removeClass('modal--open');	
			});
	   	}

	   	$('.membership-box').click(function(){
	   		load_membership_price($(this));
	   	});

	   	function load_membership_price(el) {
	   		$('.modal-membership__content').empty();
	   		
	   		var index = el.index();
	   		
   			var data = {
   				'action': 'membership_modal_data',
   				'index': index,
   			};
			var most_popular = '<span class="box__badge">Most popular</span>';
   			
   			$.ajax({
   				url: wp.ajaxurl,
   				type: 'post',
   				data: data,
   			}).done(function(membership){
   				$('.modal .box__badge').remove();
   				
   				$('.modal').removeClass('loading');
   				$('.modal').attr('data-position', index);

   			    $('.modal-membership__title span').text(membership.title);
   			    $('.modal-membership__top .box__price').text(membership.price);
   			    $('.modal-membership__top .box__period').text(membership.period);
   				$(membership.modal_content).appendTo('.modal-membership__content');
   				
   				if ( membership.most_popular === true ) {
   					$(most_popular).appendTo('.modal-membership__top');
   				}
   				$('#modal-membership').show(100, function(){
   					$(this).addClass('modal--open');	
   				});
   			});
	   		
	   	}


	   	$('.prev-membership').click(function(){
	   		var position = parseFloat($('.modal').attr('data-position'));
	   		var target = position - 1;
	   		var el = $('.membership-box').eq(target);
	   		var last = $('.membership-box').last();
	   		if (el.length) {
	   			load_membership_price(el);
	   		} else {
	   			load_membership_price(last);
	   		}
	   	});

	   	$('.next-membership').click(function(){
	   		var position = parseFloat($('.modal').attr('data-position'));
	   		var target = position + 1;
	   		var el = $('.membership-box').eq(target);
	   		var first = $('.membership-box').first();
	   		if (el.length) {
	   			load_membership_price(el);
	   		} else {
	   			load_membership_price(first);
	   		}
	   	});

	   	/*************************
	   	 *   	 tabs - people
	   	 ************************/
	   	var tab_nav = $('.tabs__list li');
	   	var tabs = $('.tab-container');

	   	var tabs_container = $('.tabs-container-wrapper');

	   	tab_nav.click(function(){
	   		var i = $(this).index();
	   		tab_nav.removeClass('active');
	   		$(this).addClass('active');

	   		tabs.removeClass('active');
	   		tabs.eq(i).addClass('active');
	   		calc_tab_height();
	   	});

	   	tabs.eq(0).addClass('active');
	   	$('.today-classes__nav .tabs__list li').eq(0).addClass('active');
	   	tab_nav.eq(0).addClass('active');

	   	function calc_tab_height() {
	   		var h = tabs_container.children('.tab-container.active').height();
	   		tabs_container.css('height', h);
	   	}
	   	calc_tab_height();


	   	/*************************
	   	 *  tabs - classes-mobile
	   	 ************************/
	   	 var mobile_select = $('.studio-select__select-today');

	   	 mobile_select.change(function(){
	   	 	var i = $(this).find(":selected").index();
	   	 	tabs.removeClass('active');
	   	 	tabs.eq(i).addClass('active');
	   	 	calc_tab_height();
	   	 });

	   	 /*************************
	   	  *  tabs - people-mobile
	   	  ************************/
	   	 $('.mobile-tab-trigger').click(function(){
	   	 	$(this).next().slideToggle();
	   	 	$(this).toggleClass('active');
	   	 });
	   	 if ( $(window).width() <= 480 ) {
	   	 	$('.people-tabs .tab-container').first().slideToggle();
	   	 }
	   	 
	

	   	 $('.studio-select').append($('.wcs-filters--wcs_room'));

	   	 $('.wcs-modal-call').click(function(){
	   	 	if ( typeof wcs_vue_modal.data.terms != 'undefined' ) {
	   	 		var term_id = wcs_vue_modal.data.terms.wcs_instructor[0].id;
	   	 		var data = {
	   	 			'action': 'new_modal_data',
	   	 			'term_id': term_id,
	   	 		};

	   	 		$.ajax({
	   	 			url: wp.ajaxurl,
	   	 			type: 'post',
	   	 			data: data,
	   	 		}).done(function(newData){
	   	 			var obj = wcs_vue_modal.data.terms.wcs_instructor[0];
	   	 			obj.thumb = newData.image_thumb;
	   	 			obj.join_link = newData.join_link;
	   	 			obj.join_link_label = newData.join_link_label;
	   	 			wcs_vue_modal.data.terms.wcs_instructor.splice( 0, 1, obj);
	   	 		});
	   	 	} 
	   	 });


	   	 /*************************
	   	  * Personal Trainer Form
	   	  ************************/
	   	  var form_personal_container = $('.personal-training-form');

	   	    if ( form_personal_container.length ) {
	   	  		hbspt.forms.create({
	   	  			css: '',
	   	  			portalId: '409345',
	   	  			target: '.personal-training-form',
	   	  			formId: 'ba2d487d-db13-4f02-8b48-579ecf6bcfea'
	   	  		});
	   	    }

	   	  /*************************
	   	   *     Campaign Form
	   	   ************************/
	   	    var form_campaign_container = $('.campaign-form');

	   	    if ( form_campaign_container.length ) {
	   	   		hbspt.forms.create({
	   	   			css: '',
	   	   			portalId: '409345',
	   	   			target: '.campaign-form',
	   	   			formId: 'ed34f56a-78ed-4c14-9db7-52d11fd061c2'
	   	   		});
	   	   	}


	   	   	/*************************
	   	   	 *   Facility Carousel
	   	   	 ************************/
	   	   	 var carousel_container = $('.facilities-carousel');
	   	   	 if ( carousel_container.length ) {
	   	   	 	carousel_container.owlCarousel({
	   	   	 		loop: true,
	   	   	 		margin: 10,
	   	   	 		responsive:{
   	   	 		       	0:{
   	   	 		        	items:1
   	   	 		        },
   	   	 		       	767:{
   	   	 		        	items:2
   	   	 		       	},
   	   	 		       	1024:{
   	   	 		           	items:3
   	   	 		       	}
   	   	 		    }
	   	   	 	});

	   	   	 	$('.gallery-btn__prev').click(function(){
	   	   	 		carousel_container.trigger('prev.owl.carousel');
	   	   	 	});

	   	   	 	$('.gallery-btn__next').click(function(){
	   	   	 		carousel_container.trigger('next.owl.carousel');
	   	   	 	});

	   	   	 	//enlargement
	   	   	 	var items = [];
	   	   	 	$('.slide').each(function(){
	   	   	 		var item = {
	   	   	 			src: $(this).find('a').attr('href'),
	   	   	 			w: parseInt($(this).find('a').data('width')),
	   	   	 			h: parseInt($(this).find('a').data('height'))
	   	   	 		};
	   	   	 		items.push(item);
	   	   	 	});
	   	   	 	
	   	   	 	$('.slide a').click(function(e){
	   	   	 		e.preventDefault();
	   	   	 		var index = $(this).parents('.owl-item').index();
	   	   	 		openPhotoSwipe( items, index );
	   	   	 	});

	   	   	 	var openPhotoSwipe = function(items, index) {
	   	   	 		var pswpElement = $('.pswp')[0];
	   	   	 		var options = { index: index };

	   	   	 		var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
	   	   	 		gallery.init();
	   	   	 	};
	   	   	 	
	   	   	 }


	   	   	 /*************************
	   	   	 *   Same height
	   	   	 ************************/	
	   	   	$('.same-height').matchHeight();

	   	   	/*************************
	   	   	*   Sidebar Newsletter Form
	   	   	************************/	
	   	   	var sidebar_form_container = $('.sidebar-form');
	   	   	
	   	   	if ( sidebar_form_container.length ) {
	   	   		hbspt.forms.create({
	   	   			css: '',
	   	   			portalId: '409345',
	   	   			target: '.sidebar-form',
	   	   			formId: '3e4e0d09-e2e6-453a-aa35-f6d88ecd2104'
	   	   		});
	   	   	}


	   	    /*************************
	   	   	*    Contact Page - Map
	   	   	************************/	
	   	   
	   	   	$('.contact__map').each(function(){
	   	   		map = new_map( $(this) );
	   	   	});

	   	   	 /*************************
   	   		*    Contact Page - Form
   	   		************************/
   	   		var cf_container = $('.contact__form');

   	   		if ( cf_container.length ) {
   	   			hbspt.forms.create({
   	   				css: '',
   	   				portalId: '409345',
   	   				target: '.contact__form',
   	   				formId: 'e29d5407-0f23-48f3-af13-fc5e950f88cf'
   	   			});
   	   		}

   	   		var mobile_blog_select = $('.blog-categories__mobile-select');

   	   		mobile_blog_select.change(function(){
   	   			window.location.href = $(this).find(':selected').val();
   	   		});

   	   		mobile_blog_select.find('option').each(function(){
   	   			
   	   			var current = '//' + document.location.host + window.location.pathname;
   	   			if ( $(this).val() == current ) {
   	   				$(this).attr('selected', true);
   	   				mobile_blog_select.select2({
   	   					minimumResultsForSearch: Infinity,
   	   					dropdownAutoWidth: true
   	   				});
   	   			}
   	   		});

   	   		
   	   		var tablet = function() {
   	   			if ( $(window).width() <= 1024 ) {
   	   				$('.banner__title').before($('.banner__logo'));
   	   				$('#comments').before($('.single-post__nav'));
   	   			}



   	   			if ( $(window).width() > 1024 ) {
   	   				$('.banner__join').before($('.banner__logo'));
   	   				$('#comments').after($('.single-post__nav'));
   	   			}
   	   		};
   	   		tablet();

   	   		var mobile = function() {
   	   			if ( $(window).width() <= 480 ) {
   	   				$('.today-events-wrap').after($('.today-classes .button'));
   	   			}

   	   			if ( $(window).width() > 480 ) {
   	   				$('.today-classes__title h2').after($('.today-classes .button'));

   	   			}
   	   		}
   	   		mobile();

   	   		$(window).resize(function(){
   	   			tablet();
   	   			mobile();
   	   		});
   	   		


	});
	
	function new_map( $el ) {
		var $markers = $el.find('.marker');
		var args = {
			zoom		: 20,
			scrollwheel	: false,
			center		: new google.maps.LatLng(0, 0),
			mapTypeId	: google.maps.MapTypeId.ROADMAP
		};

		var map = new google.maps.Map( $el[0], args);

		map.markers = [];

		$markers.each(function(){
			add_marker( $(this), map );
		});

		center_map( map );
		return map;
	}

	function add_marker( $marker, map ) {
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map
		});
		map.markers.push( marker );

		if ( $marker.html() ){
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});

			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open( map, marker );
			});
		}
	}

	function center_map( map ) {
		var bounds = new google.maps.LatLngBounds();

		$.each( map.markers, function( i, marker ) {
			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
			bounds.extend( latlng );
		});

		if ( map.markers.length == 1 ) {
		    map.setCenter( bounds.getCenter() );
		    map.setZoom( 17 );
		} else {
			map.fitBounds( bounds );
		}
	}
	
}( jQuery ));
