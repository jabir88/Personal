<?php if(!isset($post_title_tag) && empty($post_title_tag)){
	$post_title_tag='h3';
} ?>
<<?php echo $post_title_tag; ?> class="post-title">
	<?php 
	if(!empty($custom_url)){ ?>
		<a href="<?php echo esc_url($custom_url); ?>" <?php echo $target; echo $nofollow; ?>><?php echo esc_html($title); ?></a>
	<?php }else if($popup_style!='no'){ ?><a href="<?php echo esc_url($full_image); ?>" <?php echo $popup_attr; ?>><?php echo esc_html($title); ?></a>
	<?php }else{ 
		echo esc_html($title); 
	} ?>
</<?php echo $post_title_tag; ?>>