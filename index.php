<?php get_header(); ?>


<main role="main">

	<div class="start">
		<div class="container">		
			<div class="start-inner">
				<h1 class="start-title">X-AMR Collection</h1>
				<p class="start-text">A collection of articles on cross-antimicrobial resistance</p>
				<div class="visible-xs">
					<form class="menu-search" role="search"  method="get" action="<?php echo home_url( '/' ); ?>">
          				<input class="form-control" type="search" placeholder="Search the collection" value="<?php echo get_search_query() ?>" name="s">
        			</form>	
				</div>
				<ul class="startTabs nav nav-tabs" id="myTab" role="tablist">
					<li class="startTabs-item"><a class="active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><span>Most recent Articles</span></a></li>
					<li class="startTabs-item"><a class="" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">The Journals</a></li>					
					<li class="startTabs-item"><a class="" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">About the Collection</a></li>
				</ul>
			</div><!-- start-inner -->
		</div><!-- container -->
	</div><!-- start -->

	<div class="tab-content">
    	<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
			<div class="container">
				<h2 class="pane-title">Most recent articles on cross-disciplinary antimicrobial resistance research:</h2>
          		<div class="articles">
					<?php global $numpost ; ?>
			 		<?php if (have_posts()): ?>
						<?php while (have_posts()): the_post(); ?>
							<?php get_template_part('parts/index','card'); ?>
							<?php endwhile; ?>
					<?php endif; ?>
				</div><!-- articles -->
          </div><!-- container -->
        </div><!-- tab-pane -->
			
        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			<div class="container">
				<h2 class="pane-title">Publish your cross-disciplinary antimicrobial resistance research in X-AMR, a pop-up journal.</h2>
          		<div class="about">
            		<div class="about-body">
              			Placeholder<br>
              			for content from Tasha<br><br>
              			- About the collection<br>
              			- About the editors<br>
              			- ?.<br>
              			<br><br><br>
            		</div>
          		</div><!-- about -->
          	</div><!-- container -->
        </div><!-- tab-pane -->
		
        <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
			<div class="container">
				<h2 class="pane-title">This collection on cross-antimicrobial resistance showcases a selection of articles from four of the Microbiology Society’s six journals:</h2>
          		<div class="journals">
				  <div class="item">
				  <div class="item-body">
					<h5 class="item-title">Microbiology</h5>
					<p class="item-text">Publishing high-quality research since 1947</p>
					<a class="item-link" href="#"></a>
				  </div>
				</div>
				<div class="item is-black">
				  <div class="item-body">
					<h5 class="item-title">Journal of General Virology</h5>
					<p class="item-text">Publishing high-quality research at the forefront of virology</p>
					<a class="item-link" href="#"></a>
				  </div>
				</div>
				<div class="item">
				  <div class="item-body">
					<h5 class="item-title">Journal of Medical Microbiology</h5>
					<p class="item-text">The full breath of clinical microbiology</p>
					<a class="item-link" href="#"></a>
				  </div>
				</div>
				<div class="item is-black">
				  <div class="item-body">
					<h5 class="item-title">JMM Case Reports</h5>
					<p class="item-text">Dedicated to original case reports and furthering education in medical microbiology</p>
					<a class="item-link" href="#"></a>
				  </div>
				</div>
				<div class="item">
				  <div class="item-body">
					<h5 class="item-title">Microbial Genomics</h5>
					<p class="item-text">Bases to Biology</p>
					<a class="item-link" href="#"></a>
				  </div>
				</div>
				<div class="item">
				  <div class="item-body">
					<h5 class="item-title">International Journal of Systemic and Evolutionary Microbiology</h5>
					<p class="item-text">Official publication of the ICSP and the 8AM Division of the IUMS</p>
					<a class="item-link" href="#"></a>
				  </div>
				</div>          
				</div><!-- journals -->
        	</div><!-- container -->
      </div><!-- tab-pane -->
		
	</div>	

    </main>


<?php get_footer(); ?>