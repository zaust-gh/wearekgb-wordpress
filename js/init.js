$(document).ready(function() {
	
	// twitter
	
	getTwitters('twitterFeed', { 
		id: 'TeamKGB', 
		count: 3, 
		enableLinks: true, 
		ignoreReplies: true, 
		clearContents: true,
		template: '"%text%" <a href="http://twitter.com/%user_screen_name%/statuses/%id_str%/" target="_blank">%time%</a>'
	});
	
}); // close doc ready

