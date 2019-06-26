<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package forest
 */

get_header();

// get_vd($response);




?>
<!-- <?php echo get_theme_mod('width_setting'); ?> -->

<h1 class="site-title">

    <?php if ( is_customize_preview() ) : ?>

    <button class="customizer-edit" data-control='{ "name":"blogname" } '><?php esc_html_e( 'Edit Text', 'cjs' ); ?></button>

    <button class="customizer-edit" data-control='{ "name":"header_textcolor", "color": true } '><?php esc_html_e( 'Edit Color', 'cjs' ); ?></button>

    <button class="customizer-edit" data-control='{ "name":"frs_link_color_control", "background-color": true } '><?php esc_html_e( 'Edit Colors', 'cjs' ); ?></button>

    <button class="customizer-edit" data-control='{ "name":"header_one_bgc_color", "background-color": true } '><?php esc_html_e( 'Edit Color Header One', 'cjs' ); ?></button>

    <?php endif; ?>

</h1>

<section class="main_banner">
	<img src="<?= get_template_directory_uri() . '/assets/img/Fashion-01-bg-02.jpg'?>" alt="">
</section >
<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 flex_container padding-bottom padding-top">
				<div class="col-md-4 features_wrap">
					<div class="round">
						<i class="fas fa-plane"></i>
					</div>
					<span>Delivery within 48 hours</span>
				</div>
				<div class="col-md-4 features_wrap">
					<div class="round">
						<i class="fas fa-money-bill-alt"></i>
					</div>
					<span>Free Shipping & Returnss</span>
				</div>
				<div class="col-md-4 features_wrap">
					<div class="round">
						<i class="far fa-thumbs-up"></i>
					</div>
					<span>High quality products</span>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="slide_gallery">
	<div class="container">
		<div class="row">
			<div class="col-md-12 flex_container padding-bottom">
				<div class="col-md-4 gallery_img">
					<img src="<?= get_template_directory_uri() . '/assets/img/categories-8.jpg'?>" alt="">

				</div>
				<div class="col-md-4 gallery_img">
					<img src="<?= get_template_directory_uri() . '/assets/img/categories-4-430x522.jpg'?>" alt="">

				</div>
				<div class="col-md-4 gallery_img">
					<img src="<?= get_template_directory_uri() . '/assets/img/categories-1-430x522.jpg'?>" alt="">

				</div>
			</div>
		</div>
	</div>
</section>
<section class="paralax padding-top" style="background-image:url('<?= get_template_directory_uri() . '/assets/img/fashihon-01-bg-deal.jpg'?>')">
	<div class="container">
		<h2>SALE UP 50% OFF</h2>
		<span class="parallax_heading padding-bottom">Limited timeonly, while stocks last</span>
		<div class="row">
			<div class="col-md-12 flex_container">
				<div class="col-md-3">
					<a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/36-430x522.jpg'?>" alt=""></a>
					<div class="bgc_white">
						<a href="#">Molis metus pellentes <span class="red">$349</span><span class="grey">$400</span></a>
					</div>
				</div>
				<div class="col-md-3">
					<a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/37-430x522.jpg'?>" alt=""></a>
					<div class="bgc_white">
						<a href="#">Molis metus pellentes <span class="red">$349</span><span class="grey">$400</span></a>
					</div>
				</div>
				<div class="col-md-3">
					<a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/49-2-430x522.jpg'?>" alt=""></a>
					<div class="bgc_white">
						<a href="#">Molis metus pellentes <span class="red">$349</span><span class="grey">$400</span></a>
					</div>
				</div>
				<div class="col-md-3">
					<a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/24-430x522.jpg'?>" alt=""></a>
					<div class="bgc_white">
						<a href="#">Molis metus pellentes <span class="red">$349</span><span class="grey">$400</span></a>
					</div>
				</div>
			</div>
			<div class="col-md-12 ">
				<h2>Flex Items</h2>
				<ul class="flex_container">
					<li class="bgc_white first"><a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/36-430x522.jpg'?>" alt=""></a>
						<div class="red">
							<span>$349 <span class="grey">$400</span></span>
						</div>

</li>
					<li class="bgc_white"><a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/36-430x522.jpg'?>" alt=""></a>
						<div class="red">
							<span>$349 <span class="grey">$400</span></span>
						</div>

</li>
					<li class="bgc_white"><a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/36-430x522.jpg'?>" alt=""></a>
						<div class="red">
							<span>$349 <span class="grey">$400</span></span>
						</div>

</li>
					<li class="bgc_white last"><a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/36-430x522.jpg'?>" alt=""></a>
						<div class="red">
							<span>$349 <span class="grey">$400</span></span>
						</div>

</li>
				</ul>
			</div>
		</div>
	</div>
	<span>+SHOP MORE</span>
</section>
<section class="duo">
	<div class="container">
		<div class="row">
			<div class="col-md-12 flex_container padding-top padding-bottom">
				<div class="img_wrap yellow">
					<a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/box-feature-1.jpg'?>" alt="">
						<div class="fashion">
							<span class="header">FASHION MEN</span>
							 <span class="text">Maecenes lectus Lacus non diam auctor</span>
						</div> </a>
				</div>
				<div class="img_wrap white">
					<a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/21.jpg'?>" alt=""></a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="sale">
	<div class="container">
		<div class="row">
			<div class="col-md-12 padding-top padding-bottom">
					<a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/fashion-01-banner-1.jpg'?>" alt="">
						<div class="sale_inner">
							<span>SALE</span>
							<span class="black">UP TO</span>
							<span>50%</span>
							<span class="black jacket">-JACKET-</span>
						</div>
					</a>

			</div>

		</div>

	</div>
</section>
<section class="duo">
	<div class="container">
		<div class="row">
			<div class="col-md-12 flex_container padding-top padding-bottom">
				<div class="img_wrap yellow">
					<a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/22.jpg'?>" alt="">
						<div class="fashion">
							<span class="header">FASHION WOMEN</span>
							 <span class="text">Maecenes lectus Lacus non diam auctor</span>
						</div> </a>
				</div>
				<div class="img_wrap white">
					<a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/box-feature-2.jpg'?>" alt=""></a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="brands padding-top padding-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-12 flex_container">
					<div class="brands_img_wrap">
						<a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/logo-demo-1-170x90.png'?>" alt=""></a>
					</div>
					<div class="brands_img_wrap">
						<a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/logo-demo-2-170x90.png'?>" alt=""></a>
					</div>
					<div class="brands_img_wrap">
						<a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/logo-demo-3-170x90.png'?>" alt=""></a>
					</div>
					<div class="brands_img_wrap">
						<a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/logo-demo-4-170x90.png'?>" alt=""></a>
					</div>
					<div class="brands_img_wrap">
						<a href="#"><img src="<?= get_template_directory_uri() . '/assets/img/logo-demo-5-170x90.png'?>" alt=""></a>
					</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer();
