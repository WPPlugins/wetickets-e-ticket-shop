<?php
$link = file_get_contents('http://wetickets.nl/shopname.php?sid='.$url);
$style = (empty($style))?"width: 500px; height: 600px;":$style; 
?>
<div class="iframe-wrapper">
	<script src="http://wetickets.nl/js/wetickets-js.js" type="text/javascript"></script>
	<iframe frameborder="0" id="wetickets_iframe" name="weTickets_ticketshop" src="http://wetickets.nl/shop/<?= $url ?>/<?=$link?>" style="<?=$style?> float: left;" allowtransparency="true">
		Your browser doesn't support iframes. <a href="http://wetickets.nl/shop/<?= $url ?>/<?=$link?>">Bestel tickets hier!</a>
	</iframe>
</div>
