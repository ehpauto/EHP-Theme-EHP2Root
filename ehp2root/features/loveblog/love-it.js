jQuery(document).ready( function($) {	
	$('.ehp-lovelink').on('click', function() {	
		if($(this).hasClass('ehp-loved')) {
			alert(love_it_vars.already_loved_message);
			return false;
		}
        $('.ehp-love-ops').html('Updating...');
		var post_id = $(this).data('post-id');
		var user_id = $(this).data('user-id');
		var post_data = {
			action: 'love_it',
			item_id: post_id,
			user_id: user_id,
			love_it_nonce: love_it_vars.nonce
		};
		$.post(love_it_vars.ajaxurl, post_data, function(response) {
			if(response == 'loved') {
				$('.ehp-lovelink').addClass('ehp-loved');
				var count_wrap = $('.ehp-love-count');
				var count = count_wrap.text();
				count_wrap.text(parseInt(count) + 1);
                $('.ehp-love-ops').html('&bull;&nbsp;You have liked this blog');
			} else {
				alert(love_it_vars.error_message);
                $('.ehp-love-ops').html('&bull;&nbsp;Error, please refresh the page and try again.');
			}
		});
		return false;
	});	
});