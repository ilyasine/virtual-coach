(function ($) {
    const VirtualCoachMyClearPicture = {
        init: function () {
            
           /*  function speakText(text, gender) {
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
            } */
        
            /* $('i.speak').on('click', function () {
		
                console.log('speak icon clicked');
                // Get the closest parent element (regardless of its class)
                const parentElement = $(this).parent();
        
                if (parentElement.length) {
                    // Extract the text to be spoken (excluding the icon's text)
                    const textToSpeak = parentElement.contents().filter(function() {
                        return this.nodeType === 3; // Text nodes only
                    }).text().trim();
        
                    // Get the gender from the data-gender attribute
                    const gender = $(this).attr('data-gender');
        
                    // Call the speak function
                    speakText(textToSpeak, gender);
                }
            }); */


        }
    };

    // Expose the function to the global scope for dynamic execution
    window.VirtualCoachMyClearPicture = VirtualCoachMyClearPicture;
})(jQuery);
