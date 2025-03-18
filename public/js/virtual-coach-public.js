
jQuery(function($) {

	/* $(document).trigger(
		'vc_trigger_toast_message',
		[
			'', // Title
			'<div>success</div>', // Message
			'success', // Type
			null, // URL
			false, // AutoHide
			5 // AutoHide Interval (seconds)
		]
	);
	$(document).trigger(
		'vc_trigger_toast_message',
		[
			'', // Title
			'<div>error</div>', // Message
			'error', // Type
			null, // URL
			false, // AutoHide
			5 // AutoHide Interval (seconds)
		]
	); */
	

	
	$(document).on('click', '#vc-chat-icon, #customize-avatar', function (e) {
		e.preventDefault();
	
		var $this = $(this);
		var isOpen = $this.hasClass('popup-open'); // Check if popup is already open
	
		if (isOpen) {
			// Close the popup
			$.magnificPopup.close();
			$this.removeClass('popup-open');
			$this.find('i').removeClass('vc-icon-angle-down').addClass('vc-icon-comment-dots');
		} else {
			// Open the popup
			$.magnificPopup.open({
				items: {
					src: $this.data('src'),
					type: 'inline'
				},
				fixedContentPos: true,
				fixedBgPos: true,
				closeBtnInside: false, // Remove the close button inside the popup
				closeOnBgClick: false,
				closeOnContentClick: false,
				removalDelay: 300,
				mainClass: 'mfp-fade',
				callbacks: {
					close: function () {
						// Reset icon and state when popup is closed externally
						$this.removeClass('popup-open');
						$this.find('i').removeClass('vc-icon-angle-down').addClass('vc-icon-comment-dots');
					}
				}
			});
	
			// Change icon and set open state
			$this.addClass('popup-open');
			$this.find('i').removeClass('vc-icon-comment-dots').addClass('vc-icon-angle-down');
		}
	});

});
