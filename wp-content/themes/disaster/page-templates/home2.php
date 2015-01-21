

<?php 

/* Template Name: Home */
 
// Loads the header.php template.
get_header(); ?>
			
			<div class="home clearfix">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<div class="content">
							<?php the_content(); ?>
						</div>
						
						<div class="resources">
							
							<h2>Available Resources</h2>
							
							<div class="col1">
								<h3>eBook</h3>
								<a href="<?php bloginfo('template_directory'); ?>/docs/ds1.docx" class="icon-doc">Table of Contents</a>
								<a href="<?php bloginfo('template_directory'); ?>/docs/ds2.docx" class="icon-doc">Preface</a>
								<a href="<?php bloginfo('template_directory'); ?>/docs/ds3.docx" class="icon-doc">Editorial Commentary</a>
								<a href="<?php bloginfo('template_directory'); ?>/docs/ds4.docx" class="icon-doc">Idea Analysis - A Research Tool</a>
								<a href="<?php bloginfo('template_directory'); ?>/docs/ds5.docx" class="icon-doc">Algorithmic Approach to Building Research Strategies</a>
								<a href="<?php bloginfo('template_directory'); ?>/docs/ds6.docx" class="icon-doc">Creative and Critical Thinking Using the Idea Database </a>
								<a href="<?php bloginfo('template_directory'); ?>/docs/ds7.docx" class="icon-doc">Ideas in Recognizing Unanswered Questions</a>
								<a href="<?php bloginfo('template_directory'); ?>/docs/ds8.docx" class="icon-doc">Merging Ideas from Disparate Topics to Enhance Both</a>
								<a href="<?php bloginfo('template_directory'); ?>/docs/ds9.docx" class="icon-doc">Ideas and Bibliographic Databases</a>
								<a href="<?php bloginfo('template_directory'); ?>/docs/ds10.docx" class="icon-doc">Research, Idea Database, and Disaster Science</a>
							</div>
							
							<div class="col2">
								<h3>Idea Database</h3>
								<a href="<?php bloginfo('template_directory'); ?>/docs/ds1.xlsx" class="icon-xls">1990-99</a>
								<a href="<?php bloginfo('template_directory'); ?>/docs/ds2.xlsx" class="icon-xls">2000-9</a>
								<a href="<?php bloginfo('template_directory'); ?>/docs/ds3.xlsx" class="icon-xls">2010-13</a>
							</div>
							
						</div> <!-- /resources -->

					<?php endwhile; ?>

				<?php endif; ?>

<?php get_footer(); // Loads the footer.php template. ?>
	
	
