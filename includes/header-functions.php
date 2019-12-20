<?php


function chat_support_plugin_head_script() {
	?>
	<script src="http://localhost:81/socket.io/socket.io.js"></script>
	<script type="text/javascript">var socket = io.connect("http://localhost:81/");</script>
	<?php
}
add_action( 'wp_head', 'chat_support_plugin_head_script' );

?>