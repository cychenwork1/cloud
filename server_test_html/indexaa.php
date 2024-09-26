<?php
/*
Template Name: Home Page
*/
?>
<?php
if($_REQUEST['page']=='thumb')
{
	$_REQUEST['w'] = $_REQUEST['width'];
	include(TEMPLATEPATH . '/thumb.php');
	exit;
}
?>
<?php get_header(); ?>


<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/css/slider.css" type="text/css" media="screen">
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/library/js/jquery-1.3.2.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/library/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/library/js/jquery_002.js" type="text/javascript"></script>
<script type="text/javascript">
Cufon.replace('h2', { fontFamily:'Museo Slab' });
Cufon.replace('h3', { fontFamily:'Museo Slab' });

$(window).load(function() {
	$('#slider').nivoSlider({
	  effect:'random', //Specify sets like: 'fold,fade,sliceDown'
		slices:15,
		animSpeed:500,
		pauseTime:3000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:true, //Next & Prev
		directionNavHide:true, //Only show on hover
		controlNav:true, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
        controlNavThumbsFromRel:false, //Use image rel for thumbs
		controlNavThumbsSearch: '.jpg', //Replace this with...
		controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
		keyboardNav:false, //Use left & right arrows
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});

$(document).ready(function() {
	$('#download-form input:radio').change(function(){
		var url = $('#download-form input:radio:checked').val();
		$('#download-btn').attr('href', url);
	});

	$('a#download-jump').click(function(){
		$(window).scrollTo($('a[name="download"]'), 6000);
	});
});
</script>

     <div id="slider_banner">
     	 <div id="sidebr_banner_in">
         	
            	<div  id="slider">

   <?php if ( get_option('ptthemes_banner1_url') != "") { ?>
 		<a style="display:block;" class="nivo-imageLink" href="<?php echo stripslashes(get_option('ptthemes_banner1_link'));  ?>">
        <img style="display:none;" src="<?php echo stripslashes(get_option('ptthemes_banner1_url'));  ?>" alt="" title="<?php echo stripslashes(get_option('ptthemes_banner1_caption'));  ?>" />
        </a>
        <?php } ?>
        
        <?php if ( get_option('ptthemes_banner2_url') != "") { ?>
 		<a style="display:block;" class="nivo-imageLink" href="<?php echo stripslashes(get_option('ptthemes_banner2_link'));  ?>">
        <img style="display:none;" src="<?php echo stripslashes(get_option('ptthemes_banner2_url'));  ?>" alt="" title="<?php echo stripslashes(get_option('ptthemes_banner2_caption'));  ?>" />
        </a>
        <?php } ?>
        
        <?php if ( get_option('ptthemes_banner3_url') != "") { ?>
 		<a style="display:block;" class="nivo-imageLink" href="<?php echo stripslashes(get_option('ptthemes_banner3_link'));  ?>">
        <img style="display:none;" src="<?php echo stripslashes(get_option('ptthemes_banner3_url'));  ?>" alt="" title="<?php echo stripslashes(get_option('ptthemes_banner3_caption'));  ?>" />
        </a>
        <?php } ?>
        
        
        <?php if ( get_option('ptthemes_banner4_url') != "") { ?>
 		<a style="display:block;" class="nivo-imageLink" href="<?php echo stripslashes(get_option('ptthemes_banner4_link'));  ?>">
        <img style="display:none;" src="<?php echo stripslashes(get_option('ptthemes_banner4_url'));  ?>" alt="" title="<?php echo stripslashes(get_option('ptthemes_banner4_caption'));  ?>" />
        </a>
        <?php } ?>
        
        
        <?php if ( get_option('ptthemes_banner5_url') != "") { ?>
 		<a style="display:block;" class="nivo-imageLink" href="<?php echo stripslashes(get_option('ptthemes_banner5_link'));  ?>">
        <img style="display:none;" src="<?php echo stripslashes(get_option('ptthemes_banner5_url'));  ?>" alt="" title="<?php echo stripslashes(get_option('ptthemes_banner5_caption'));  ?>" />
        </a>
        <?php } ?>
        
        <?php if ( get_option('ptthemes_homepage_features') != "") { ?>
 		<a style="display:block;" class="nivo-imageLink" href="<?php echo stripslashes(get_option('ptthemes_banner1_link'));  ?>">
        <img style="display:none;" src="<?php echo stripslashes(get_option('ptthemes_banner1_url'));  ?>" alt="" title="<?php echo stripslashes(get_option('ptthemes_banner1_caption'));  ?>" />
        </a>
        <?php } ?>
		
	</div> <!-- slider #end -->
            
         </div> <!-- slider #inner -->
     </div> <!-- slider banner #end -->
     
     
     
     <div id="wrapper">
     
	 <table>
        <thead>
            <tr>
                <th>主選單01</th>
                <th>主選單01</th>
                <th>主選單01</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <a href="#">
                        <img src="https://fakeimg.pl/300x200/200">
                    </a>
                </td>
                <td>
                    <a href="#">
                        <img src="https://fakeimg.pl/300x200/200">
                    </a>
                </td>
                <td>
                    <a href="#">
                        <img src="https://fakeimg.pl/300x200/200">
                    </a>
                </td>

            </tr>
        </tbody>
    </table>
    
 
	</div> <!-- wrapper #end -->	
 
<?php get_footer(); ?>    
      