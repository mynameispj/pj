

/* Declare a namespace for the site */
var Site = window.Site || {};

/* Create a closure to maintain scope of the '$'
   and remain compatible with other frameworks.  */
(function($) {
	//same as $(document).ready();
	$(function() {
		$('ul.worklist').find('li').find('img').animate({opacity: "0.6"}, 300);

		 $('ul.worklist').find('li').hover(  
            function () {  
                $(this).find('img').animate({opacity: "1"}, 200);
            },   
            function () {  
                $(this).find('img').animate({opacity: "0.6"}, 100);
            }  
        ); 
	
		//Style First Paragraphs 
        $('.node-type-work #body').each(function() {
          $(this).find('img').removeAttr("height");
          $(this).find('img').removeAttr("width");
        });


   
        /**
* hoverIntent r5 // 2007.03.27 // jQuery 1.1.2+
* <http://cherne.net/brian/resources/jquery.hoverIntent.html>
* 
* @param  f  onMouseOver function || An object with configuration options
* @param  g  onMouseOut function  || Nothing (use configuration options object)
* @author    Brian Cherne <brian@cherne.net>
*/
(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY;};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev]);}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev]);};var handleHover=function(e){var p=(e.type=="mouseover"?e.fromElement:e.toElement)||e.relatedTarget;while(p&&p!=this){try{p=p.parentNode;}catch(e){p=this;}}if(p==this){return false;}var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);}if(e.type=="mouseover"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob);},cfg.timeout);}}};return this.mouseover(handleHover).mouseout(handleHover);};})(jQuery);
 

	
		$('a.sitelink').hoverIntent(  
            function () {  
                $(this).find('.notice').fadeIn();      
            },   
            function () {  
                $(this).find('.notice').fadeOut();        
            }  
        ); 
		
		var thisNID; 
		var jsonBase = '/home/json/'; 
		var ajaxURL; 
		var url; 

		function loadProjectAjax(nid,onLoad) {
			$('li.open').find('img').animate({opacity: "1"}, 200);
			$('#body .intro').html(''); 
			$('#words').html(''); 
			$('#body').find('img').remove();
			$('#otherImages').html(''); 
			ajaxURL = jsonBase + nid; 
			$.ajax({ 
				type:'post', 
				url: ajaxURL, 
				dataType: 'json', 
				beforeSend: function() {
					if (onLoad != 1) $('.front #loading').fadeIn(); 
				},
				success: function(work){
					$('header').find('h1').html('My name is PJ. Here&rsquo;s something I made.'); 
					var project = work.nodes[0].node;
					
					var leadImage = '<img src="'+project.LeadImage+'" />'; 
					leadImage = leadImage.replace(/,/g,'');
					
					var projectTitle = project.Title;					 
					projectTitle = String(projectTitle); 
					projectTitle = projectTitle.toLowerCase(); 
					projectTitle = projectTitle.replace(/\s/g,'');
					
					$('#body').attr('class',projectTitle); 

					$.bbq.pushState({ project : project.Path });
					$.bbq.pushState({ nid : project.Nid });  
					$('#body #lead').append(leadImage);
					$('#body .intro').append(project.LeadParagraph);
					$('#body .intro').prepend('<h1>'+project.Title+'</h1>'); 
					$('#bodyWrap .header .title').html(project.Title); 
					if (project.OtherImagesUpload != null) {
						
						//JSON data for other images comes back as a string; 
						//split it into an array based on commas as a separator
						var otherImages = project.OtherImagesUpload.split(','); 

						for(i=0;i<otherImages.length;i++){
							var thisImg = '<img src="'+otherImages[i]+'" />'; 
							$('#otherImages').append(thisImg);
						}
					}

					$('#words').append(project.Body); 
					 
					$('#body img').load(function() {
						$('#bodyWrap').show();
						sizeProjectCanvas(); 
						if (onLoad != 1) $.scrollTo('li.open #lead', 100,{offset:{top:-100, left:0}});
					    $('.front #loading').fadeOut(); 
					    
					});
				}
			});	

		}
		
		function sizeProjectCanvas() {
			 
			var thumbHeight = $('li.open .image').height(); 
			var projectHeight = $('#bodyWrap').height(); 
			$('li.open').height(projectHeight+thumbHeight+140);
		}
		
		$(window).resize(function() {
			sizeProjectCanvas(); 
		});
		
		$('ul.worklist').find('li:last-child').addClass('last'); 

		$('ul.worklist').find('li').find('a').click(function(){
			$('body').addClass('projectOpen'); 
			thisNID = $.trim($(this).parent().parent().find('.nid').text()); 
			$('ul.worklist li').removeAttr('style'); 
			$('li.open').removeClass('open'); 
			$(this).parent().parent().addClass('open'); 
			$('#bodyWrap').appendTo('li.open'); 
			loadProjectAjax(thisNID); 
			return false; 
		}); 

		$(window).bind('hashchange', function(e) {
		    url = $.deparam.fragment(); 
		})

		$(window).bind('onFirstLoad', function(e) {
		    if (url.nid !== undefined) {
		    	loadProjectAjax(url.nid,1); 
		    }
		})

		$(window).trigger('hashchange');
		$(window).trigger('onFirstLoad');

		//Props to Chris Coyier: http://css-tricks.com/persistent-headers/
		function UpdateTableHeaders() {
		   $("#bodyWrap").each(function() {
		
		       var el             = $(this),
		           offset         = el.offset(),
		           scrollTop      = $(window).scrollTop(),
		           floatingHeader = $(".floatingHeader", this)
		
		       if ((scrollTop > offset.top) && (scrollTop < offset.top + el.height())) {
		           floatingHeader.css({
		            "visibility": "visible"
		           });
		       } else {
		           floatingHeader.css({
		            "visibility": "hidden"
		           });
		       };
		   });
		}
		
		var clonedHeaderRow;
		
		$("#bodyWrap").each(function() {
			clonedHeaderRow = $(".header", this);
			clonedHeaderRow
			 .before(clonedHeaderRow.clone())
			 //.css("width", clonedHeaderRow.width())
			 .addClass("floatingHeader");
			
		});
		
		$(window)
		.scroll(UpdateTableHeaders)
		.trigger("scroll");
		
		
		$('.closeProject').click(function(){
			$.scrollTo('li.open', 100,{offset:{top:-100, left:0}});
			$('li.open').removeAttr('style');
			$('li.open').removeClass('open');
			$('#bodyWrap').hide(); 
			$('body').removeClass('projectOpen');
			return false; 
		}); 

	
	});
		
		


	$(window).bind("load", function() {
	
			//$('.front #loading').fadeOut('slow', function() {
			//    $('.front article').fadeIn(500);			
			//	$('.front footer').fadeIn(500);
			//});
			
	});
	
})(jQuery);