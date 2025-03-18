(function ($) {
    const VirtualCoachMySafetyPlans = {
        init: function () {
            
            $(".vc-mg-bloc-circles").magnificPopup({
                delegate: ".gallery-item", // child items selector
                type: "image",
                gallery: {
                    enabled: true // enables gallery mode
                }
            });
            
             //$('.new-safety-plan-popup-content').tabs();

            $(document).on("click", "#create-new-safety-plan-btn", function (e) {
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
                    mainClass: "create-new-safety-plan",
                    callbacks: {
                        open: function () {
                            // Reset icon and state when popup is closed externally
                            console.log("popup is loaded");
                            //Apply js code for tabs ...

                            $(".new-safety-plan-popup-content").tabs();

                           // Add click event handlers for Next and Previous buttons
                            $(".vc-foot-forward").click(function() {
                                var tabs = $(".new-safety-plan-popup-content").tabs();
                                var active = tabs.tabs("option", "active");
                                tabs.tabs("option", "active", active + 1);
                            });

                            $(".vc-foot-back").click(function() {
                                var tabs = $(".new-safety-plan-popup-content").tabs();
                                var active = tabs.tabs("option", "active");
                                tabs.tabs("option", "active", active - 1);
                            });
                                                          
                        },
                        close: function () {
                           
                        }
                    }
                });              
            });
            
            //$('.edit-safety-plan-popup-content').tabs();

            $(document).on("click", "#edit-safety-plan-btn", function (e) {
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
                    mainClass: "edit-safety-plan",
                    callbacks: {
                        open: function () {
                            // Reset icon and state when popup is closed externally
                            console.log("popup is loaded");
                            //Apply js code for tabs ...

                            $(".edit-safety-plan-popup-content").tabs();
                            
                            // Add click event handlers for Next and Previous buttons
                            $(".vc-foot-forward").click(function() {
                                var tabs = $(".edit-safety-plan-popup-content").tabs();
                                var active = tabs.tabs("option", "active");
                                tabs.tabs("option", "active", active + 1);
                            });

                            $(".vc-foot-back").click(function() {
                                var tabs = $(".edit-safety-plan-popup-content").tabs();
                                var active = tabs.tabs("option", "active");
                                tabs.tabs("option", "active", active - 1);
                            });
                        },
                        close: function () {
                           
                        }
                    }
                });              
            });
            
            //$('.delete-safety-plan-popup-content').tabs();

            $(document).on("click", "#delete-safety-plan-btn", function (e) {
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
                    mainClass: "delete-safety-plan"
                });              
            });

            window.pressedsp = function () {
                var a = document.getElementById("uploadimages-sp");
                if (a.value == "") {
                    fileLabelSP.innerHTML = "Drag and Drop or Browse";
                } else {
                    var theSplit = a.value.split("\\");
                    fileLabelSP.innerHTML = theSplit[theSplit.length - 1];
                }
            };
            
            window.pressednma = function () {
                var a = document.getElementById("uploadimages-nma");
                if (a.value == "") {
                    fileLabelNMA.innerHTML = "Drag and Drop or Browse";
                } else {
                    var theSplit = a.value.split("\\");
                    fileLabelNMA.innerHTML = theSplit[theSplit.length - 1];
                }
            };
            
            window.pressedspedit = function () {
                var a = document.getElementById("edituploadimages-sp");
                if (a.value == "") {
                    fileLabelEditSP.innerHTML = "Drag and Drop or Browse";
                } else {
                    var theSplit = a.value.split("\\");
                    fileLabelEditSP.innerHTML = theSplit[theSplit.length - 1];
                }
            };
            
            window.pressednmaedit = function () {
                var a = document.getElementById("edituploadimages-nma");
                if (a.value == "") {
                    fileLabelEditNMA.innerHTML = "Drag and Drop or Browse";
                } else {
                    var theSplit = a.value.split("\\");
                    fileLabelEditNMA.innerHTML = theSplit[theSplit.length - 1];
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

            //Submit Safety Plan data
            $('#newsafetyplanrecordingsubmit').on('click', function () {
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
    window.VirtualCoachMySafetyPlans = VirtualCoachMySafetyPlans;
})(jQuery);
