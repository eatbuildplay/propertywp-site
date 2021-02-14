<?php get_header(); ?>

<?php require( get_template_directory() . '/templates/search-form-home.php'); ?>

<!-- used for the scroll on click -->
<div id="homepage-content-start"></div>

<?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'home_right_1' ); ?>
	</div><!-- #primary-sidebar -->
<?php endif; ?>

<!-- Home Content Section 1 -->
<div class="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Leverage Our Expertise</h2>
        <p>Proven Results & An Unparalleled Track Record.</p>
      </div>
      <div class="col-md-6">
        <h3>What is your Property Worth?</h3>
        <?php require( get_template_directory() . '/templates/form-cms-short.php' ); ?>
      </div><!-- ./col -->
    </div><!-- ./row -->
  </div>
</div>
<!-- / Home Content Section 1 -->

<!-- Home Content Section 2 -->
<div class="home-content-section section1">
  <div class="container home-content-section">

    <div class="col-md-4 offset-md-2">

      <img class="img-fluid" src="https://picsum.photos/800/400" />
      <h2>Encore Realty has the experience to help you through every stage of the journey</h2>
      <p>Nam sit amet lectus massa. Mauris vitae ante ut arcu fringilla ullamcorper sit amet ut nibh. In pulvinar eleifend semper. Phasellus ut feugiat metus. Proin luctus nisl dolor, a porta leo cursus a. Mauris venenatis imperdiet dui.</p>
      <h3>Fusce rutrum egestas enim vel semper.</h3>
      <button class="btn btn-success">Learn More</button>

    </div>

  </div>
</div>
<!-- / Home Content Section 2 -->

<!-- Home Content Section 3 -->
<div class="home-section">
  <div class="container">
    <div class="row">
      <h2>Boston's largest selection of properties for sale and rent</h2>
      <h3>You've come to the right place to find your next property</h3>
      <p>AllAccessBoston.com aggregates listing from the largest MLS providers and rental service API's in the Boston area. We've also got a thorough selection of every major luxury building in the city. If you can't find it here, it hasn't been built yet.</p>
    </div>
  </div>
</div>
<!-- / Home Content Section 3 -->

<?php get_footer(); ?>
