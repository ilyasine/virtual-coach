jQuery(function($) {
    /**
     * Toast Message Utility
     */
    var vcToastMessage = function (title, message, type, url, autoHide, autohideInterval) {
        if (!message || message.trim() === '') {
            return; // Toast Message can't be triggered without content.
        }

        function getTarget() {
            if ($('.vc-toast-messages-enable').length) {
                return '.vc-toast-messages-enable .toast-messages-list';
            }

            if ($('.vc-onscreen-notification-enable ul.notification-list').length) {
                var toastPosition = $('.vc-onscreen-notification').hasClass('vc-position-left') ? 'left' : 'right';
                var toastMessageWrapPosition = $(
                    '<div class="vc-toast-messages-enable vc-toast-messages-enable-mobile-support">' +
                    '<div class="vc-toast-messages vc-position-' + toastPosition + ' single-toast-messages">' +
                    '<ul class="toast-messages-list vc-toast-messages-list"></ul>' +
                    '</div>' +
                    '</div>'
                );
                $('.vc-onscreen-notification').show();
                $(toastMessageWrapPosition).insertBefore('.vc-onscreen-notification-enable ul.notification-list');
            } else {
                var toastMessageWrap = $(
                    '<div class="vc-toast-messages-enable vc-toast-messages-enable-mobile-support">' +
                    '<div class="vc-toast-messages vc-position-right single-toast-messages">' +
                    '<ul class="toast-messages-list vc-toast-messages-list"></ul>' +
                    '</div>' +
                    '</div>'
                );
                $('body').append(toastMessageWrap);
            }
            return '.vc-toast-messages-enable .toast-messages-list';
        }

        function hideMessage(currentEl) {
            $(currentEl).removeClass('pull-animation').addClass('close-item').delay(500).queue(function () {
                $(this).remove();
            });
        }

        // Generate unique ID for the toast message
        var uniqueId = 'unique-' + Math.floor(Math.random() * 1000000);
        var currentEl = '.' + uniqueId;
        var urlClass = url ? 'has-url' : '';
        var bpMsgType = type || '';
        var bpIconType = 'info';

        // Determine icon type based on message type
        switch (bpMsgType) {
            case 'success':
                bpIconType = 'check';
                break;
            case 'warning':
                bpIconType = 'exclamation-triangle';
                break;
            case 'delete':
                bpIconType = 'trash';
                bpMsgType = 'error';
                break;
        }

        // Build the message content
        var messageContent = '';
        messageContent += '<div class="toast-messages-icon"><i class="vc-icon vc-icon-' + bpIconType + '"></i></div>';
        messageContent += '<div class="toast-messages-content">';
        if (title) {
            messageContent += '<span class="toast-messages-title">' + title + '</span>';
        }
        if (message) {
            messageContent += '<span class="toast-messages-content">' + message + '</span>';
        }
        messageContent += '</div>';
        messageContent += '<div class="actions"><a class="action-close primary" data-bp-tooltip-pos="left" data-bp-tooltip="gggg"><i class="vc-icon vc-icon-times" aria-hidden="true"></i></a></div>';
        messageContent += url ? '<a class="toast-messages-url" href="' + url + '"></a>' : '';

        // Append the message to the target
        $(getTarget()).append(
            '<li class="item-list read-item pull-animation bp-message-' + bpMsgType + ' ' + uniqueId + ' ' + urlClass + '">' +
            messageContent +
            '</li>'
        );

        // Auto-hide the toast message if required
        if (autoHide) {
            var interval = autohideInterval && typeof autohideInterval === 'number' ? autohideInterval * 1000 : 5000;
            setTimeout(function () {
                hideMessage(currentEl);
            }, interval);
        }

        // Add click event for manual close
        $(currentEl + ' .actions .action-close').on('click', function () {
            hideMessage(currentEl);
        });
    };

    // Initialize the toast message utility for global usage
    $(document).on('vc_trigger_toast_message', function (event, title, message, type, url, autoHide, autohideInterval) {
        vcToastMessage(title, message, type, url, autoHide, autohideInterval);
    });
});
