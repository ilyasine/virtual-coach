(function ($) {
    const VirtualCoachMyPeople = {
        init: function () {
            $(document).on("click", "#add-new-people-btn", function (e) {
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
                    mainClass: "mfp-fade",
                    callbacks: {
                        open: function () {
                            // Reset icon and state when popup is closed externally
                            console.log("popup is loaded");
                            //Apply js code for tabs ...

                            //$(".new-goal-popup-content").tabs();
                        },
                        close: function () {}
                    }
                });
            });

            window.loadFile = function (event) {
                var output = document.getElementById("avatar-image");
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function () {
                    URL.revokeObjectURL(output.src); // free memory
                };
            };
        }
    };

    // Expose the function to the global scope for dynamic execution
    window.VirtualCoachMyPeople = VirtualCoachMyPeople;
})(jQuery);
