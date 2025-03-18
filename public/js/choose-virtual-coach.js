jQuery(function ($) {
    const avatarImages = $('.vc-avatar-img');
    const selectedAvatarElement = $('#selected-avatar');
    const confirmAvatarButton = $('#confirm-avatar');

    avatarImages.on('click', function () {
        const avatarImage = $(this);
        const avatarAlt = avatarImage.attr('alt');
        const coach_id = avatarImage.data('coach-id');
        const coach_gender = avatarImage.data('gender');


        // Remove 'selected' class from all images and add to the clicked one
        avatarImages.removeClass('selected');
        avatarImage.addClass('selected');

        // Update the `data-coach-id` attribute of the #selected-avatar element
        selectedAvatarElement.attr('data-coach-id', coach_id);

        // Display the selected avatar name and show the confirm button
        selectedAvatarElement.text(avatarAlt).show();
        confirmAvatarButton.show();

        // Speak the introduction text
        speakIntroduction(avatarAlt, coach_gender);
    });

    confirmAvatarButton.on('click', function () {
        // Retrieve the coach ID from the #selected-avatar element
        const coach_id = selectedAvatarElement.attr('data-coach-id');
        console.log(coach_id);

        saveCoachToUserMeta(coach_id);
        // Uncomment to reload the page after confirmation
        // window.location.reload();
    });


    function saveCoachToUserMeta(coach_id) {
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'save_coach_avatar',
                payload: 'save_coach_avatar_payload',
                coach_id: coach_id,
            },
            success: function (response) {
                $(document).trigger(
                    'vc_trigger_toast_message',
                    [
                        '', // Title
                        '<div>' + response.data + '</div>', // Message
                        'success', // Type
                        null, // URL
                        false, // AutoHide
                        5 // AutoHide Interval (seconds)
                    ]
                );
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            },
            error: function (xhr, status, error) {
                console.error('Error saving The virtual Coach', error);
                $(document).trigger(
                    'vc_trigger_toast_message',
                    [
                        '', // Title
                        '<div> Error saving The virtual Coach</div>', // Message
                        'error', // Type
                        null, // URL
                        false, // AutoHide
                        5 // AutoHide Interval (seconds)
                    ]
                );
            }
        });
    }

    function speakText(text, gender) {
        const speech = new SpeechSynthesisUtterance(text);

        // Set voice properties
        speech.pitch = 1; // Normal pitch
        speech.rate = 1; // Normal speed

        // Get all voices and select one based on gender
        const voices = window.speechSynthesis.getVoices();
        let selectedVoice;

        if (gender === 'female') {
            selectedVoice = voices.find(voice => voice.name.includes('Zira') || voice.name.includes('Female'));
        } else if (gender === 'male') {
            selectedVoice = voices.find(voice => voice.name.includes('Mark') || voice.name.includes('David'));
        }

        if (selectedVoice) {
            speech.voice = selectedVoice;
        }

        window.speechSynthesis.speak(speech);
    }

    $('button.speak-btn').on('click', function (e) {

        e.preventDefault();

        console.log('speak icon clicked');
        // Get the latest value of the data-speak attribute
        const textValue = $(this).attr('data-speak');

        console.log('textValue : ' , textValue)

        if (textValue) {
            // Extract the text to be spoken (excluding the icon's text)
            textToSpeak = textValue.trim();

            console.log('textToSpeak ' , textToSpeak);

            // Get the gender from the data-gender attribute
            const gender = $(this).attr('data-gender');

            // Call the speak function
            speakText(textToSpeak, gender);
        }
    });

    function speakIntroduction(avatarName, gender) {
        const speechText = `Hi there, my name is ${avatarName}, and I'm here to help you find your way around. Let's get started.`;
        const speech = new SpeechSynthesisUtterance(speechText);

        // Set voice properties
        speech.pitch = 1; // Normal pitch
        speech.rate = 1; // Normal speed

        // Get all voices and select one based on gender
        const voices = window.speechSynthesis.getVoices();
        let selectedVoice;

        if (gender === 'female') {
            selectedVoice = voices.find(voice => voice.name.includes('Zira') || voice.name.includes('Female'));
        } else if (gender === 'male') {
            selectedVoice = voices.find(voice => voice.name.includes('Mark') || voice.name.includes('David'));
        }

        if (selectedVoice) {
            speech.voice = selectedVoice;
        }

        window.speechSynthesis.speak(speech);
    }
});