(function ($) {
    const VirtualCoachMyOnTrackThinking = {
        init: function () {
            
            $(".vc-mg-bloc-circles").magnificPopup({
                delegate: ".gallery-item", // child items selector
                type: "image",
                gallery: {
                    enabled: true // enables gallery mode
                }
            });
            


             //$('.add-new-cheer-popup-content').tabs();

            $(document).on("click", "#add-new-cheer-btn", function (e) {
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
                    mainClass: "add-new-cheer",
                    callbacks: {
                        open: function () {
                            // Reset icon and state when popup is closed externally
                            console.log("popup is loaded");
                            //Apply js code for tabs ...

                            $(".add-new-cheer-popup-content").tabs();

                           // Add click event handlers for Next and Previous buttons
                            $(".vc-foot-forward").click(function() {
                                var tabs = $(".add-new-cheer-popup-content").tabs();
                                var active = tabs.tabs("option", "active");
                                tabs.tabs("option", "active", active + 1);
                            });

                            $(".vc-foot-back").click(function() {
                                var tabs = $(".add-new-cheer-popup-content").tabs();
                                var active = tabs.tabs("option", "active");
                                tabs.tabs("option", "active", active - 1);
                            });
                                                          
                        },
                        close: function () {
                           
                        }
                    }
                });              
            });
            
            //$('.edit-new-cheer-popup-content').tabs();

            $(document).on("click", "#edit-cheer-btn", function (e) {
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
                    mainClass: "edit-cheer",
                    callbacks: {
                        open: function () {
                            // Reset icon and state when popup is closed externally
                            console.log("popup is loaded");
                            //Apply js code for tabs ...

                            $(".edit-cheer-popup-content").tabs();
                            
                            // Add click event handlers for Next and Previous buttons
                            $(".vc-foot-forward").click(function() {
                                var tabs = $(".edit-cheer-popup-content").tabs();
                                var active = tabs.tabs("option", "active");
                                tabs.tabs("option", "active", active + 1);
                            });

                            $(".vc-foot-back").click(function() {
                                var tabs = $(".edit-cheer-popup-content").tabs();
                                var active = tabs.tabs("option", "active");
                                tabs.tabs("option", "active", active - 1);
                            });
                            
                        },
                        close: function () {
                           
                        }
                    }
                });              
            });
            
            //$('.delete-new-cheer-popup-content').tabs();

            $(document).on("click", "#delete-cheer-btn", function (e) {
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
                    mainClass: "delete-cheer"
                });              
            });

            window.pressedott = function () {
                var a = document.getElementById("uploadimages-ott");
                if (a.value == "") {
                    fileLabelOTT.innerHTML = "Drag and Drop or Browse";
                } else {
                    var theSplit = a.value.split("\\");
                    fileLabelOTT.innerHTML = theSplit[theSplit.length - 1];
                }
            };
            
            window.pressedottedit = function () {
                var a = document.getElementById("edit-uploadimages-ott");
                if (a.value == "") {
                    fileLabelEditOTT.innerHTML = "Drag and Drop or Browse";
                } else {
                    var theSplit = a.value.split("\\");
                    fileLabelEditOTT.innerHTML = theSplit[theSplit.length - 1];
                }
            };

            let mediaRecorder;
            let audioChunks = [];
            let audioBlob;
            // -------------------------
            // Record Safety Plan - Start Recording
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

            //Submit On Track Thinking data
            $('#addnewcheerrecordingsubmit').on('click', function () {
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
    window.VirtualCoachMyOnTrackThinking = VirtualCoachMyOnTrackThinking;
})(jQuery);
