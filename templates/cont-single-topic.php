<?php

/**
 * Single Topic Content Part
 *
 
 */

 ?>
 

<?php  $forum=bbp_get_topic_forum_id();?>
<?php if ($forum == 8) : ?>


<div id="bbpress-forums">
    
    <p id="topic" ><?php echo bbp_topic_id(); ?></p>
   

	<?php do_action( 'bbp_template_before_single_topic' ); ?>

	<?php if ( post_password_required() ) : ?>

		<?php bbp_get_template_part( 'form', 'protected' ); ?>

	<?php else : ?>

		<?php bbp_topic_tag_list(); ?>

		<?php bbp_single_topic_description(); ?>

		<?php if ( bbp_show_lead_topic() ) : ?>

			<?php bbp_get_template_part( 'content', 'single-topic-lead' ); ?>

		<?php endif; ?>

		

<?php if ( bbp_is_reply_edit() ) : ?>
</div>
<?php endif; ?>

<div id="primary" class="content-area">
    	<main id="main" class="site-main" role="main">
			
			<div class="container" >
			    <ul class="chatbox" id="chatbox">
			      	<?php 
			      	    if(get_current_user_id()=="0"){
			      	    	echo "<h2><center>Login to join chat room</center></h2>";
			      	    }
			      	?>
			    </ul>
			    <br/>
			   
			</div>

		</main><!-- .site-main -->
	</div><!-- .content-area -->


<!--This is the reply page-->


<?php if ( bbp_is_reply_edit() ) : ?>
<div id="bbpress-forums">
	<?php bbp_breadcrumb(); ?>
<?php endif; ?>

<?php if ( bbp_current_user_can_access_create_reply_form() ) : ?>
	<div id="new-reply-<?php bbp_topic_id(); ?>" class="bbp-reply-form">

		        <textarea class="form-control msg_box" id="msg_box" placeholder="Type here and check the Title in Tab"></textarea>

		
	</div>
<?php endif; ?>

<?php if ( bbp_is_reply_edit() ) : ?>
</div>
<?php endif; ?>

<!-- Page ends here-->		
<?php //bbp_get_template_part( 'form', 'reply' ); ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_single_topic' ); ?>

</div>



<?php else:?>
	<h2>There we should upload regular ticket support system</h2>
<?php endif; ?>




