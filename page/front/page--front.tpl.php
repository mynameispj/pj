<header id="page" class="clearfix">
	<?php print render($primary_local_tasks); ?>
	<h2>
	  <a href="/" class="brand">PJ McCormick</a>
	  UX Design Lead<span class="hidden-phone"> at Amazon</span>,<span class="hidden-phone"> Designer/Developer Hybrid,</span> Speaker, Cancer Survivor
  </h2>
  <div class="navbar">
  	<div class="navbar-inner">
  	
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="nav-collapse collapse">

        <nav> 
          <ul> 
            <li><a href="">Blog</a></i></li>
            <li><a href="/work">Work</a></li>
            <li><a href="/reading">Reading</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
           
          
          </ul>
        </nav>
      </div> 
    </div> 

  <div class="container">
    <div class="row header-reveal"> 
      <div class="span12 blog-tags content">
    		<?php print render($page['blog_tags']); ?>
      </div>
    </div>
  </div>
</header>

<section class="container" id="main">
	<?php if ($tabs): ?>
		<div class="tabs">
			<?php print render($tabs); ?>
		</div>
	<?php endif; ?>
	<?php print render($secondary_local_tasks); ?>
	<?php if ($messages): ?>
		<div id="console" class="clearfix"><?php print $messages; ?></div>
	<?php endif; ?>
	<?php if ($page['help']): ?>
		<div id="help">
		  <?php print render($page['help']); ?>
		</div>
	<?php endif; ?>
	<?php if ($action_links): ?>
		<ul class="action-links"><?php print render($action_links); ?></ul>
	<?php endif; ?>
	<?php print views_embed_view('frontpage','block_1');  ?>  
</section>

<footer>
	<div class="container">
	  <div class="row"> 
	    <div class="span4"> 
	      <?php print render($page['elsewhere']); ?>
	    </div>
	    <div class="span4"> 
	      <?php print render($page['long_road_back']); ?>	    
	    </div>
	    <div class="span4"> 
	      <?php print render($page['reading_list']); ?>
	    </div>
	  </div>
    <div class="row"> 
      <div class="span12"> 
  			<p>This site and the stuff on it was made by PJ McCormick. The words are &copy; PJ McCormick, 2010&mdash;<?php print date("Y"); ?>, the design work belongs to the various clients and project owners.</p>
      </div>
    </div>
	</div>
</footer>
