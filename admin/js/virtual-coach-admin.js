/* jQuery(function ($) {
	//video upload
	$("#virtual_coach_video_button").on("click", function(e) {
		e.preventDefault();
		var file_frame = wp.media.frames.file_frame = wp.media({
			title: virtual_coach_data.select_video,
			button: { text: virtual_coach_data.use_video },
			multiple: false
		});
		file_frame.on("select", function() {
			var attachment = file_frame.state().get("selection").first().toJSON();
			$("#virtual_coach_video").val(attachment.url);
		});
		file_frame.open();
	});
	//audio upload
	$("#virtual_coach_audio_button").on("click", function(e) {
		e.preventDefault();
		var file_frame = wp.media.frames.file_frame = wp.media({
			title: virtual_coach_data.select_audio,
			button: { text: virtual_coach_data.use_audio },
			multiple: false
		});
		file_frame.on("select", function() {
			var attachment = file_frame.state().get("selection").first().toJSON();
			$("#virtual_coach_audio").val(attachment.url);
		});
		file_frame.open();
	});
}); */

jQuery(function ($) {
	// Video upload
	$("#virtual_coach_video_button").on("click", function (e) {
		e.preventDefault();

		// Create a new media frame for video
		var file_frame = wp.media.frames.file_frame = wp.media({
			title: virtual_coach_data.select_video,
			button: { text: virtual_coach_data.use_video },
			library: { type: "video" }, // Restrict to video files
			multiple: false,
		});

		file_frame.on("select", function () {
			var attachment = file_frame.state().get("selection").first().toJSON();
			$("#virtual_coach_video").val(attachment.url);
		});

		file_frame.open();
	});

	// Audio upload
	$("#virtual_coach_audio_button").on("click", function (e) {
		e.preventDefault();

		// Create a new media frame for audio
		var file_frame = wp.media.frames.file_frame = wp.media({
			title: virtual_coach_data.select_audio,
			button: { text: virtual_coach_data.use_audio },
			library: { type: "audio" }, // Restrict to audio files
			multiple: false,
		});

		file_frame.on("select", function () {
			var attachment = file_frame.state().get("selection").first().toJSON();
			$("#virtual_coach_audio").val(attachment.url);
		});

		file_frame.open();
	});
});
