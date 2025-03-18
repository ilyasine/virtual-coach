jQuery(function ($) {
	// Store the current speech utterance globally
	let isSpeaking = false;

	// Add click event listener to all elements with the class 'speak'
	$(document).on("click", "i.speak", function () {
		console.log("speak icon clicked");

		// Toggle the icon classes
		$(this).toggleClass("vc-icon-volume-up vc-icon-volume-slash");

		// If speech is already active, stop it
		if (isSpeaking) {
			stopSpeech();
			isSpeaking = false; // Update speech state
			return; // Exit the function
		}

		// If speech is not active, start it
		const parentElement = $(this).parent();

		if (parentElement.length) {
			// Extract the text to be spoken (excluding the icon's text)
			const textToSpeak = parentElement
				.contents()
				.filter(function () {
					return this.nodeType === 3; // Text nodes only
				})
				.text()
				.trim();

			// Get the gender from the data-gender attribute
			const gender = $(this).attr("data-gender");

			// Call the speak function
			speakText(textToSpeak, gender, $(this)); // Pass the clicked icon as a parameter
			isSpeaking = true; // Update speech state
		}
	});

	$(document).on("click", "#stop-speaker", function () {
		stopSpeech();
	})

	// Function to stop speech
	function stopSpeech() {
		if (window.speechSynthesis) {
			window.speechSynthesis.cancel(); // Stop any ongoing speech
			console.log("Speech stopped");
		}
	
		// Reset all icons to the default state, except the one inside #stop-speaker
		$("i.speak").not("#stop-speaker i").removeClass("vc-icon-volume-slash").addClass("vc-icon-volume-up");
		isSpeaking = false; // Update speech state
	}

	// Function to speak text
	function speakText(text, gender, iconElement) {
		const speech = new SpeechSynthesisUtterance(text);

		// Set voice properties
		speech.pitch = 1; // Normal pitch
		speech.rate = 1; // Normal speed

		// If speech is paused, resume it
		if (window.speechSynthesis.paused && currentSpeech) {
			window.speechSynthesis.resume();
			return;
		}

		// If speech is ongoing, pause it
		if (window.speechSynthesis.speaking && !window.speechSynthesis.paused) {
			window.speechSynthesis.pause();
			return;
		}

		// Get all voices and select one based on gender
		const voices = window.speechSynthesis.getVoices();
		let selectedVoice;

		if (gender === "female") {
			selectedVoice = voices.find((voice) => voice.name.includes("Zira") || voice.name.includes("Female"));
		} else if (gender === "male") {
			selectedVoice = voices.find((voice) => voice.name.includes("Mark") || voice.name.includes("David"));
		}

		if (selectedVoice) {
			speech.voice = selectedVoice;
		}

		// Listen for the end of speech
		speech.onend = () => {
			isSpeaking = false; // Update speech state
			iconElement.removeClass("vc-icon-volume-slash").addClass("vc-icon-volume-up"); // Reset the icon
			console.log("Speech ended");
		};

		// Start speaking
		window.speechSynthesis.speak(speech);
	}

	$(document).on("click", ".vc-sidebar-menu li[role=tab], .vc-my-stuff .vc-mcp-bloc, .vc-coaching-sessions-popup-content .options-grid.level-5 .option-item, .vc-coaching-sessions-popup-content .options-grid.level-4 .option-item", function(e) {
	//$(".vc-sidebar-menu").on("click", "li[role=tab] , .vc-my-stuff .vc-mcp-bloc", function (e) {
		e.preventDefault();

		var tab_id = $(this).data("id");

		console.log(tab_id);
		// Remove the 'active' class from all tabs
		$('li[role=tab]').removeClass('active');

		// Add the 'active' class to the clicked tab (if it has a data-id matching tab_id)
		$('li[role=tab]').each(function () {
			if ($(this).data("id") === tab_id) {
				$(this).addClass('active');
			}
		});

		console.log('here we should close the popup');	

		// Trigger the AJAX request for the corresponding tab
		$.ajax({
			url: virtual_coach_data.ajaxurl,
			data: {
				action: "load_section_content_view",
				tab_id: tab_id,
				security: virtual_coach_data.nonce,
				payload: "load_section_content_view"
			},
			type: "post",
			//dataType: 'json',
			success: function (response) {
				console.log(response);
				// Insert the response (HTML) into the corresponding container
				//$('#' + tab_id).html(response.data);
				$(".virtual-coach-section-content").html(response.data);
				$.magnificPopup.close();

				// Dynamically execute the relevant script initializer
				switch (tab_id) {
					case "my-clear-picture":
						if (window.VirtualCoachMyClearPicture) {
							window.VirtualCoachMyClearPicture.init();
						}
						break;
					case "my-goals":
						if (window.VirtualCoachMyGoals) {
							window.VirtualCoachMyGoals.init();
						}
						break;
					case "my-people":
						if (window.VirtualCoachMyPeople) {
							window.VirtualCoachMyPeople.init();
						}
						break;
					case "my-safety-plans":
						if (window.VirtualCoachMySafetyPlans) {
							window.VirtualCoachMySafetyPlans.init();
						}
						break;
					case "my-new-me-activities":
						if (window.VirtualCoachMyNewMeActivities) {
							window.VirtualCoachMyNewMeActivities.init();
						}
						break;
					case "my-on-track-thinking":
						if (window.VirtualCoachMyOnTrackThinking) {
							window.VirtualCoachMyOnTrackThinking.init();
						}
						break;
					case "my-on-track-action-plan":
						if (window.VirtualCoachMyOnTrackActionPlan) {
							window.VirtualCoachMyOnTrackActionPlan.init();
						}
						break;
					default:
						console.log(`No specific initializer for tab: ${tab_id}`);
				}
			},
			error: function (error) {
				console.log(error);
			}
		});
	});
});
