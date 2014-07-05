<?php 
/**/
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<title><?php wp_title('|',true,'right'); ?> SOLSYS &#124 Philippines Solar PV Power Systems Provider</title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/normalize.css" type="text/css" media="screen" />
	
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php
	
	wp_enqueue_script( 'jquery' ); ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jquery.highlight-3.js"></script>
	<script type="text/javascript">
	//http://johannburkard.de/blog/programming/javascript/highlight-javascript-text-higlighting-jquery-plugin.html
	jQuery.fn.highlight = function(text) { 
	$(this).each(function() { 
	$.highlight(this, text.toUpperCase()); 
	}); 
	} 
	////// 
	var myString = "solsyspower solar_decathlon solarindustry reworld treehugger ecobusinesscom pvmagazine" ; 
	myArray = myString.split(" "); 
	for(i=0;i<myArray.length;i++) 
	{ 
	$('td').highlight(myArray[i]); 
	}
	</script>


	<?php 
	
	
	if (is_page('products') || is_page('projects') || is_page('solar101')) { ?>
	<style type="text/css">
	<?php
		// Displaying Child pages
		$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc' ) );
		foreach( $mypages as $page ) {		
			$content = $page->post_content;
			if ( ! $content ) // Check for empty page
			continue;

			$content = apply_filters( 'the_content', $content ); ?>
			
			#basic-modal-<?php echo $page->ID ?>-content,
	<?php }	?>
		#basic-modal-content {display:none;}
		/* Overlay */
		#simplemodal-overlay {background-color:#000;;}
		/* Container */
.modal h2 {margin:0;padding:0;}
.highlight { font-weight: bold; }
		#simplemodal-container {width:600px; color:#333; background-color:#fff; border:2px solid #000; padding:12px; line-height: 180%;}
		#simplemodal-container a.modalCloseImg {background:url(<?php bloginfo('template_directory'); ?>/images/x.png) no-repeat; width:25px; height:29px; display:inline; z-index:3200; position:absolute; top:-10px; right:-10px; cursor:pointer;}
	</style>
		
	<?php } ?>
	
	
	<?php wp_head(); ?>
	
</head>

<body>
	<div id="wrapper">
		<div id="header">
			<div class="logo">
				<a href="<?php bloginfo('url'); ?>/" title="SOLSYS Power Solutions, Inc." alt="SOLSYS Power Solutions, Inc."><img src="<?php bloginfo('template_url'); ?>/images/solsys-logo.png" alt="SOLSYS Power Solutions, Inc." /></a>
			</div>
			<div class="header">
				<div class="phoneinquire">
					<span>Tel: +63 2 624 3861 / +63 917 838 4723</span>
					<small>for all inquiries and free phone consultation</small>
				</div>
				<div class="clientportal">
					<span>CLIENT PORTAL</span>
					<script type="text/javascript">
						<!--
						function myPopup() {
							window.open( "<?php bloginfo('template_directory'); ?>/images/ClientLoginHolder.jpg",'','scrollbars=no,menubar=no,height=400,width=600,resizable=no,toolbar=no,status=no');
						}
						//-->
					</script>

					<form name="formresult" id="formresult">
						<input type="text" name="username" value="username" />
						<input type="text" name="password" value="password" />
						<input type="submit" name="submit" value=" " id="submit" onClick="myPopup()"  />
					</form>
					<form name="formresult" id="formresult">
						<input type="submit" name="demo" value=" " id="demo" onClick="myPopup()" />
					</form>
				</div>
				<div class="navigation">
					<ul>
						
					<?php 
						$clean_page_list = wp_list_pages('title_li=&depth=1');
						$clean_page_list = preg_replace('/title=\"(.*?)\"/','',$clean_page_list);
						echo $clean_page_list;
						?>
					</ul>
				</div>
			</div>
			<div class="clearboth"></div>
		</div>
		<!-- end header. start article -->
