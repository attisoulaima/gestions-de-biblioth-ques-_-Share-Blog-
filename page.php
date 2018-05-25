<?php get_header(); ?>
<div class="row">
<div class="col-sm-12"> <?php if ( have_posts() ) : while ( have_posts()
) : the_post(); get_template_part( 'content-single', get_post_format() );
endwhile; endif; ?>
</div> <!-- /.col -->
</div> <!-- /.row -->
<?php get_footer(); ?>
<div class="blog-post">
<h2 class="blog-post-title"><?php the_title(); ?></h2>
<p class="blog-post-meta"><?php the_date(); ?> par <a href="#"><?php
the_author(); ?></a></p>
<?php the_content(); ?>
</div><!-- /.blog-post -->

<h2 class="blog-post-title"><?php the_title(); ?></h2>
<h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php
the_title(); ?></a></h2>
<?php the_excerpt(); ?>
<?php get_header(); ?>
<div class="row">
<div class="col-sm-8 blog-main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
get_template_part( 'content', get_post_format() );
endwhile; endif; ?>
</div> <!-- /.blog-main -->
<?php get_sidebar(); ?>
</div> <!-- /.row -->
<?php get_footer(); ?>
<?php next_posts_link( 'Older posts' ); ?>
<?php previous_posts_link( 'Newer posts' ); ?>
<nav>
 <ul class="pager">
<li><?php next_posts_link( 'Previous' ); ?></li>
<li><?php previous_posts_link( 'Next' ); ?></li>
 </ul>
</nav>


if ( have_posts() ) : while ( have_posts() ) : the_post();
get_template_part( 'content-single', get_post_format() );
endwhile; endif;


if ( have_posts() ) : while ( have_posts() ) : the_post();
get_template_part( 'content-single', get_post_format() );
if ( comments_open() || get_comments_number() ) : comments_template();
endif; endwhile; endif;



<?php if ( post_password_required() ) { return; } ?>
<div id="comments" class="comments-area">
<?php if ( have_comments() ) : ?>
 <h3 class="comments-title">
 <?php printf( _nx( 'One comment on “%2$s”', '%1$s comments on
“%2$s”', get_comments_number(), 'comments title'), number_format_i18n(
get_comments_number() ), get_the_title() ); ?>
 </h3>
<ul class="comment-list">
 <?php wp_list_comments( array( 'short_ping' => true, 'avatar_size'
=> 50, ) ); ?>
 </ul>
 <?php endif; ?>
 <?php if ( ! comments_open() && get_comments_number() &&
post_type_supports( get_post_type(), 'comments' ) ) : ?>
 <p class="no-comments"> <?php _e( 'Comments are closed.' ); ?> </p>
 <?php endif; ?>
 <?php comment_form(); ?>
</div>


<a href="<?php comments_link(); ?>"> <?php printf( _nx( 'One Comment',
'%1$s Comments', get_comments_number(), 'comments title', 'textdomain' ),
number_format_i18n( get_comments_number() ) ); ?> </a>


function votre_fonction() { //code }
add_action( 'action', 'votre_fonction');

// Add scripts and stylesheets
function startwordpress_scripts() {
 wp_enqueue_style( 'bootstrap', get_template_directory_uri() .
'/css/bootstrap.min.css', array(), '3.3.6' );
 wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css'
);
 wp_enqueue_script( 'bootstrap', get_template_directory_uri() .
'/js/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
}
add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );


// Add Google Fonts
function startwordpress_google_fonts() {
wp_register_style('OpenSans',
'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
wp_enqueue_style( 'OpenSans');
}
add_action('wp_print_styles', 'startwordpress_google_fonts');



<title><?php echo get_bloginfo( 'name' ); ?></title>

// WordPress Titles
add_theme_support( 'title-tag' );
// Custom settings
function custom_settings_add_menu() {
 add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options',
'custom-settings', 'custom_settings_page', null, 99 );
}
add_action( 'admin_menu', 'custom_settings_add_menu' );


// Create Custom Global Settings
function custom_settings_page() { ?>
<div class="wrap">
<h1>Custom Settings</h1>
<form method="post" action="options.php">
<?php settings_fields( 'section' );
do_settings_sections( 'theme-options' );
submit_button(); ?>
</form>
</div>
<?php }

// Twitter
function setting_twitter() { ?>
<input type="text" name="twitter" id="twitter" value="<?php echo
get_option( 'twitter' ); ?>" />
<?php }


function custom_settings_page_setup() {
add_settings_section( 'section', 'All Settings', null, 'theme-options' ); 



add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'themeoptions',
'section' );
register_setting('section', 'twitter');
}
add_action( 'admin_init', 'custom_settings_page_setup' );



function setting_github() { ?>
<input type="text" name="github" id="github" value="<?php echo
get_option('github'); ?>" />
<?php }



add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'themeoptions',
'section' );
add_settings_field( 'github', 'GitHub URL', 'setting_github', 'themeoptions',
'section' );
register_setting( 'section', 'twitter' );
register_setting( 'section', 'github' );

<li><a href="#">GitHub</a></li>
<li><a href="#">Twitter</a></li>

<li><a href="<?php echo get_option('github'); ?>">GitHub</a></li>
<li><a href="<?php echo get_option('twitter'); ?>">Twitter</a></li>

// Support Featured Images
add_theme_support( 'post-thumbnails' );


<?php if ( has_post_thumbnail() ) {
the_post_thumbnail(); } ?>

<?php if ( has_post_thumbnail() ) {?>


<div class="row">
<div class="col-md-4"> <?php the_post_thumbnail('thumbnail'); ?>
</div>
<div class="col-md-6"> <?php the_excerpt(); ?> </div>
</div>
<?php } else { ?>
<?php the_excerpt(); ?> <?php } ?>

// Custom Post Type
function create_my_custom_post() {
register_post_type( 'my-custom-post',
array(
'labels' => array(
'name' => __( 'My Custom Post' ),
'singular_name' => __( 'My Custom Post' ),
),
'public' => true,
'has_archive' => true,
'supports' => array(
'title',


'editor',
'thumbnail',
 'custom-fields'
)
));
}
add_action( 'init', 'create_my_custom_post' );

if ( have_posts() ) : while ( have_posts() ) : the_post();
// Contents of the Loop
endwhile; endif;

$custom_query = new WP_Query( $args );
while ($custom_query->have_posts()) : $custom_query->the_post();
 // Contents of the custom Loop
endwhile;


$args = array(
'post_type' => 'my-custom-post',
'orderby' => 'menu_order',
'order' => 'ASC'
);


<?php get_header(); ?>
<div class="row">
<div class="col-sm-12">
<?php
$args = array(
'post_type' => 'my-custom-post',
'orderby' => 'menu_order',
'order' => 'ASC'
);
$custom_query = new WP_Query( $args );
while ($custom_query->have_posts()) : $custom_query-
>the_post(); ?>
<div class="blog-post">
<h2 class="blog-post-title"><a href="<?php
the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php the_excerpt(); ?>
</div>
<?php endwhile; ?>
</div> <!-- /.col -->
</div> <!-- /.row -->
<?php get_footer(); ?>

