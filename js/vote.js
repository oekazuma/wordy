$(function() {

	$("button").click(function() {

			var id = $(this).attr("id");

			var read = $(this).attr("name");

			var thisButton = $(this).prev('span');

			$.ajax({

				 type: "POST",
				 url: "vote.php",
				 data: {
				 		"id":id,
				 		"read":read
				},

				 success: function(data) {
				 	
					thisButton.html(data);
				}

			});
			return false;
	});

});