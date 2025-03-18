(function ($) {
    const VirtualCoachMyGoals = {
        init: function () {

            $(".vc-mg-bloc-circles").magnificPopup({
                delegate: ".gallery-item", // child items selector
                type: "image",
                gallery: {
                    enabled: true // enables gallery mode
                }
            });

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
            }

            $('i.speak').on('click', function () {

                console.log('speak icon clicked');
                // Get the closest parent element (regardless of its class)
                const parentElement = $(this).parent();

                if (parentElement.length) {
                    // Extract the text to be spoken (excluding the icon's text)
                    const textToSpeak = parentElement.contents().filter(function () {
                        return this.nodeType === 3; // Text nodes only
                    }).text().trim();

                    // Get the gender from the data-gender attribute
                    const gender = $(this).attr('data-gender');

                    // Call the speak function
                    speakText(textToSpeak, gender);
                }
            }); */

            $('button.speak-btn').on('click', function (e) {

                e.preventDefault();

                console.log('speak icon clicked');
                // Get the closest parent element (regardless of its class)
                const textValue = $(this).data('speak');


                if (textValue) {
                    // Extract the text to be spoken (excluding the icon's text)
                    textToSpeak = textValue.trim();

                    console.log(textToSpeak);

                    // Get the gender from the data-gender attribute
                    const gender = $(this).attr('data-gender');

                    // Call the speak function
                    speakText(textToSpeak, gender);
                }
            });

            //Create GOAL
            $(document).on("click", "#create-new-goal-btn", function (e) {
                e.preventDefault();
                var $this = $(this);
                // Open the popup
                $.magnificPopup.open({
                    items: {
                        src: $this.data("src"),
                        type: "inline"
                    },
                    fixedContentPos: true,
                    fixedBgPos: true,
                    //closeBtnInside: false, // Remove the close button inside the popup
                    closeOnBgClick: false,
                    closeOnContentClick: false,
                    removalDelay: 300,
                    mainClass: "create-new-goal",
                    callbacks: {
                        open: function () {
                            // Reset icon and state when popup is closed externally
                            console.log("popup is loaded");
                            //Apply js code for tabs ...

                            $(".new-goal-popup-content").tabs();

                            // Add click event handlers for Next and Previous buttons
                            $(".vc-foot-forward").click(function () {
                                var tabs = $(".new-goal-popup-content").tabs();
                                var active = tabs.tabs("option", "active");
                                tabs.tabs("option", "active", active + 1);
                            });

                            $(".vc-foot-back").click(function () {
                                var tabs = $(".new-goal-popup-content").tabs();
                                var active = tabs.tabs("option", "active");
                                tabs.tabs("option", "active", active - 1);
                            });

                        },
                        close: function () {

                        }
                    }
                });
            });

            //Edit Goal
            $(document).on("click", "#edit-goal-btn", function (e) {
                e.preventDefault();
                var $this = $(this);
                // Open the popup
                $.magnificPopup.open({
                    items: {
                        src: $this.data("src"),
                        type: "inline"
                    },
                    fixedContentPos: true,
                    fixedBgPos: true,
                    //closeBtnInside: false, // Remove the close button inside the popup
                    closeOnBgClick: false,
                    closeOnContentClick: false,
                    removalDelay: 300,
                    mainClass: "edit-goal",
                    callbacks: {
                        open: function () {
                            // Reset icon and state when popup is closed externally
                            console.log("popup is loaded");
                            //Apply js code for tabs ...

                            $(".edit-goal-popup-content").tabs();

                            // Add click event handlers for Next and Previous buttons
                            $(".vc-foot-forward").click(function () {
                                var tabs = $(".edit-goal-popup-content").tabs();
                                var active = tabs.tabs("option", "active");
                                tabs.tabs("option", "active", active + 1);
                            });

                            $(".vc-foot-back").click(function () {
                                var tabs = $(".edit-goal-popup-content").tabs();
                                var active = tabs.tabs("option", "active");
                                tabs.tabs("option", "active", active - 1);
                            });
                        },
                        close: function () {

                        }
                    }
                });
            });

            //View Goal
            $(document).on("click", "#view-goal-btn", function (e) {
                e.preventDefault();
                var $this = $(this);

                // Open the popup
                $.magnificPopup.open({
                    items: {
                        src: $this.data("src"),
                        type: "inline"
                    },
                    fixedContentPos: true,
                    fixedBgPos: true,
                    //closeBtnInside: false, // Remove the close button inside the popup
                    closeOnBgClick: false,
                    closeOnContentClick: false,
                    removalDelay: 300,
                    mainClass: "view-goal",
                    callbacks: {
                        open: function () {
                            // Reset icon and state when popup is closed externally
                            console.log("popup is loaded");
                            //Apply js code for tabs ...

                            $(".view-goal-popup-content").tabs();

                            // Add click event handlers for Next and Previous buttons
                            $(".vc-foot-forward").click(function () {
                                var tabs = $(".view-goal-popup-content").tabs();
                                var active = tabs.tabs("option", "active");
                                tabs.tabs("option", "active", active + 1);
                            });

                            $(".vc-foot-back").click(function () {
                                var tabs = $(".view-goal-popup-content").tabs();
                                var active = tabs.tabs("option", "active");
                                tabs.tabs("option", "active", active - 1);
                            });
                        },
                        close: function () {

                        }
                    }
                });
            });

            //Delete Goal
            $(document).on("click", "#delete-goal-btn", function (e) {
                e.preventDefault();
                var $this = $(this);
                // Open the popup
                $.magnificPopup.open({
                    items: {
                        src: $this.data("src"),
                        type: "inline"
                    },
                    fixedContentPos: true,
                    fixedBgPos: true,
                    //closeBtnInside: false, // Remove the close button inside the popup
                    closeOnBgClick: false,
                    closeOnContentClick: false,
                    removalDelay: 300,
                    mainClass: "delete-goal"
                });
            });

            window.pressed = function () {
                var a = document.getElementById("uploadimage");
                if (a.value == "") {
                    fileLabel.innerHTML = "Drag and Drop or Browse";
                } else {
                    var theSplit = a.value.split("\\");
                    fileLabel.innerHTML = theSplit[theSplit.length - 1];
                }
            };

            window.pressededit = function () {
                var a = document.getElementById("edituploadimage");
                if (a.value == "") {
                    fileLabelEdit.innerHTML = "Drag and Drop or Browse";
                } else {
                    var theSplit = a.value.split("\\");
                    fileLabelEdit.innerHTML = theSplit[theSplit.length - 1];
                }
            };

            let mediaRecorder;
            let audioChunks = [];
            let audioBlob;
            // -------------------------
            // Record Goal - Start Recording
            // -------------------------
            $('.vc-icon-microphone').on('click', function () {
                navigator.mediaDevices.getUserMedia({ audio: true })
                    .then(stream => {
                        mediaRecorder = new MediaRecorder(stream);
                        mediaRecorder.start();

                        // Display the recording animation and text
                        $('.vc-vibes').addClass('active');
                        $('.recording-text').text('Recording...');

                        mediaRecorder.ondataavailable = event => {
                            audioChunks.push(event.data);
                        };

                        mediaRecorder.onstop = () => {
                            audioBlob = new Blob(audioChunks, { 'type': 'audio/ogg; codecs=opus' });
                            console.log('Recording complete:', audioBlob);
                            audioChunks = []; // Reset chunks for next recording

                            // Hide the recording animation and text
                            $('.vc-vibes').removeClass('active');
                            $('.recording-text').text('Tap & Record');
                        };
                    })
                    .catch(err => {
                        console.error('Error accessing audio stream:', err);
                        alert('Please allow microphone access to record audio.');
                    });
            });

            // Save and store recording
            $('.confirm-recording').on('click', function () {
                if (mediaRecorder && mediaRecorder.state !== "inactive") {
                    mediaRecorder.stop();
                }

                // Hide the recording animation and text right after stopping
                $('.vc-vibes').removeClass('active');
                $('.recording-text').text('Tap & Record');
            });

            //Submit goal data
            $('#newgoalrecordingsubmit').on('click', function () {
                if (mediaRecorder && mediaRecorder.state !== "inactive") {
                    mediaRecorder.stop();
                }

                // Hide the recording animation and text right after stopping
                $('.vc-vibes').removeClass('active');
                $('.recording-text').text('Tap & Record');
            });
        }
    };

    // Expose the function to the global scope for dynamic execution
    window.VirtualCoachMyGoals = VirtualCoachMyGoals;
})(jQuery);
