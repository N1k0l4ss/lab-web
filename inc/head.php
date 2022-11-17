<?php /** @var string $pageTitle*/ ?>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <script src="js/jquery-3.6.1.js"></script>

	<script>
		jQuery(function () {
			var $commentsForm = jQuery('.comment-make form');
			$commentsForm.on('submit', function () {
				jQuery.post($commentsForm.attr('action'), $commentsForm.serialize(), function (response) {
					var result = JSON.parse(response);
					if (result.success) {
						var $commentsList = jQuery('.comments-list');
						$commentsList.replaceWith(result.commentsList);

						return;
					}

					var $response = jQuery(result.form);
					$commentsForm.empty().append($response.find('form >*'));
				});

				return false;
			})
		});
	</script>

    <title><?= $pageTitle ?>: Lifestyle Blog</title>
</head>