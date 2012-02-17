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

		function loadProjectAjax(nid) {
			$('li.open').find('img').animate({opacity: "1"}, 200);
			$('#body .intro').html(''); 
			$('#words').html(''); 
			$('#body').find('img').remove();
			ajaxURL = jsonBase + nid; 
			$.ajax({ 
				type:'post', 
				url: ajaxURL, 
				dataType: 'json', 
				beforeSend: function() {
					$('.front #loading').fadeIn(); 
				},
				success: function(work){
					$('header').find('h1').html('My name is PJ. Here&rsquo;s something I made.'); 
					var project = work.nodes[0].node;
					
					var leadImage = project.LeadImage; 
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
					$('#words').append(project.Body); 
					$('#body').append(project.OtherImages); 
					$('#body #lead img').load(function() {
						var thumbHeight = $('li.open').height(); 
						var projectHeight = $('#bodyWrap').height(); 
						$('li.open').height(projectHeight+thumbHeight); 
						
						$.scrollTo('li.open #lead', 800,{offset:{top:thumbHeight, left:0}});
						
					    $('.front #loading').fadeOut(); 
					});
				}
			});	

		}
		
		$('body.front').find('ul.worklist').find('li:last-child').addClass('last'); 
		

		$('body.front').find('ul.worklist').find('li').find('a').click(function(){
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
		    	loadProjectAjax(url.nid); 
		    }
		})


		$(window).trigger('hashchange');
		$(window).trigger('onFirstLoad');


	});


	$(window).bind("load", function() {
	
			$('.front #loading').fadeOut('slow', function() {
			    $('.front article').fadeIn(500);			
				$('.front footer').fadeIn(500);
			});
			
	});
	
})(jQuery);