<?php
// $Id: page.tpl.php,v 1.15 2010/11/20 04:03:51 webchick Exp $
?>
<a id="top"></a>
<header class="clearfix">
	<div id="headerContent">
		<?php print render($primary_local_tasks); ?>
		<nav>
		<?php print theme('links__system_main_menu', array(
	      'links' => $main_menu,
	      'attributes' => array(
	        'id' => 'main-menu-links',
	        'class' => array('links', 'clearfix'),
	      ),
	      'heading' => array(
	        'text' => t('Main menu'),
	        'level' => 'h2',
	        'class' => array('element-invisible'),
	      ),
	    )); ?>
		
		</nav>

	</div>
	
</header>
<div id="loading"></div>
<article class="clearfix">
		<h2>My name is PJ McCormick. I'm a web designer and developer and, as of June 8, 2012, a</h2> 
		<h1>Cancer Survivor</h1>
		<p class="date">Posted: June 13, 2012</p>
		<p>On Friday, June 8, 2012, we learned that I have testicular cancer.</p>
		<p>At the moment, a lot is still very much up in the air. If I'm lucky, the cancer will claim only this one (very treasured) piece of my body. If I'm not, and the cancer has spread, then any number of surgeries and chemo- and radiotherapies are in my future.</p>
		<p>I am terrified, of course. Lately I've felt scared about everything.</p>
		<p>But I am also aware that I am very lucky. Not only to have contracted such a treatable cancer, but to be held up by the love of my incredible wife&mdash;who, in spite of her own pain and fear over this has taken amazing care of me and shown unbelievable strength and courage&mdash;and the support of an incredible circle of family and friends.</p>
		<h3>People have been asking if they can help. The good news is that, yes, they can.</h3>
		<ul id="help">
			<li>
				<h2>Check yourself</h2>
				<p>Do you have two healthy balls? Or does someone you love? Want to keep them in your life?</p><p> <a class="donate" href="http://www.cancer.org/Cancer/TesticularCancer/MoreInformation/DoIHaveTesticularCancer/do-i-have-testicular-cancer-self-exam" target="_blank">CHECK THEM, OFTEN</a></p>
			</li>
			<li>
				<h2>Make a donation in my honor</h2>
				<p>Take whatever amount you can comfortably spare right now&mdash;even the measy 5 bucks you were going to spend on coffee makes a huge difference&mdash;and donate it to the LiveStrong foundation in my honor. Not only are they an incredible organization, they have been a source of comfort and guidance to me in this difficult time.</p>
				<p><a class="donate" href="https://www.livestrong.org/donation/" target="_blank">DONATE TO LIVESTRONG</a></p>
			</li>

		
		</ul>
		<?php print render($page['cancerUpdates']); ?>
		<p class="date"><a href="/work">Go see the rest of the site</a> | <a href="mailto:pj@mynameispj.com">Email me</a></p>
</article>



<footer>
	<div class="content">
		This site and the stuff on it was made by PJ McCormick. The words are &copy; PJ McCormick, 2010&mdash;<?php print date("Y"); ?>, the design work belongs to the various clients and project owners. Like every other web designer on the face of the earth, you can <a href="http://dribbble.com/mynameispj" title="Dribbble">find him</a> at a <a href="http://www.twitter.com/mynameispj" title="Twitter">number</a> of <a href="http://www.flickr.com/photos/pjmccormick/" title="Flickr">online</a> <a href="http://www.facebook.com/pjmccormick" title="Facebook">hangouts</a>.  
	</div>
</footer>

  

