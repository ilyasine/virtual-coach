jQuery(function ($) {
    
    // Trigger popup on button click
    $('#start-coaching-sessions, #watch-clear-picture-course').on("click", function () {
        var $this = $(this);
        
        // Fetch popup content via AJAX
        $.ajax({
            url: virtual_coach_data.ajaxurl,
            type: 'POST',
            data: {
                action: 'load_coaching_session_popup',
                security: virtual_coach_data.nonce,
                payload: 'load_coaching_session_popup_payload',
            },
            success: function (response) {
                if (response.success && response.data) {
                    // Inject the returned content into the popup container
                    var $popupContainer = $('<div class="vc-coaching-sessions-popup-content"></div>');
                    $popupContainer.html(response.data);
                    // Open the popup
                    $.magnificPopup.open({
                        items: {
                            src: $popupContainer, // Pass the dynamically created container as the source
                            type: 'inline'
                        },
                        fixedContentPos: true,
                        fixedBgPos: true,
                        //closeBtnInside: false,
                        closeOnBgClick: false,
                        closeOnContentClick: false,
                        removalDelay: 300,
                        mainClass: 'mfp-fade',
                        callbacks: {
                            open: function () {
                                console.log('Popup opened with AJAX content');
                                                                       
                                const videoContainer = $('.coaching-sessions-popup-container');
                                const video = $(videoContainer).find('.coach-video')[0];
                                // Get references to the video and speak icon
                                const $speakIcon = $('#play-coach-video span.speak');                                                                        
                                // Get references to the buttons
                                const $backButton = $('#back-button');
                                const $nextButton = $('#next-button');

                                // Breakpoint configuration
                                const breakpoints = [
                                    {   time: 0.00, //Notice my Breath
                                        text: `We start our check in by getting a Clear Picture. Let’s bring our attention to our breath.
                                                Where do I notice it? 
                                                In my nose?    Chest?    Belly?      
                                                Tap the picture or the blue button to move to the next Clear Picture Do. `,
                                        options: [
                                            { id: 'option1', value: 'nose', label: 'Nose?' },
                                            { id: 'option2', value: 'chest', label: 'Chest?' },
                                            { id: 'option3', value: 'belly', label: 'Belly?' }
                                        ],
                                        autodisplay: true,
                                        step: 'notice-my-breath'
                                    },
                                    { 
                                        time: 13.22,
                                        text: `What does your breath feel like?                                               
                                                Is it slow?
                                                Or is it fast?
                                                Is my breath shallow?
                                                Or is it deep? 
                                                Notice is as it is, in this one moment.
                                                Tap any that you notice.`,
                                        options: [
                                            { id: 'option1', value: 'slow', label: 'Slow?' },
                                            { id: 'option2', value: 'fast', label: 'Fast?' },
                                            { id: 'option3', value: 'shallow', label: 'Shallow?' },
                                            { id: 'option4', value: 'deep', label: 'Deep?' }
                                        ],
                                        step: 'notice-my-breath'
                                    },
                                        
                                    { time: 32.14, //Notice my surrounding
                                        text: `Next let’s Notice my Surroundings.
                                                What do I see?
                                                What do I hear?
                                                What do I smell?
                                                What do I taste?
                                                What am I touching?
                                                Tap continue Check-In when you are ready.`, 
                                        options: [
                                            { id: 'option1', value: 'What do you see', label: 'What do you see?' },                                       
                                            { id: 'option2', value: 'What do you hear', label: 'What do you hear?' },                                                          
                                            { id: 'option3', value: 'What do you smell', label: 'What do you smell?' },
                                            { id: 'option4', value: 'What do you taste', label: 'What do you taste?' }, 
                                            { id: 'option5', value: 'What are you touching', label: 'What are you touching?' },
                                        ],
                                        step: 'notice-my-surroundings'
                                    },
                                    
                                    //Do a Body Check
                                    { time: 58.16,
                                        text: `Let’s do a Body Check. 
                                                What sensations do I notice right now? 
                                                Am I feeling awake?
                                                Am I feeling tired?
                                                Am I relaxed?
                                                Or do I feel tension in my body?
                                                Am I comfortable?
                                                Or am I uncomfortable?`, 
                                        options: [
                                            { id: 'option1', value: 'Do you feel awake', label: 'Awake' },
                                            { id: 'option2', value: 'Do you feel tired', label: 'Tired' },
                                            { id: 'option3', value: 'Is your body relaxed', label: 'Relaxed' },                 
                                            { id: 'option4', value: 'Do you feel tension in your body', label: 'Tension' },
                                            { id: 'option5', value: 'Do you feel comfortable', label: 'Comfortable' },
                                            { id: 'option6', value: 'Are you feeling uncomfortable', label: 'Uncomfortable' },
                                        ],
                                        step: 'label-and-rate-emotions'
                                    },
                                    //Label and Rate Emotions
                                    { time: 86.58,                
                                        text: `Let’s label and rate our feelings.
                                                Some feelings are pleasant and others are uncomfortable.  
                                                Sometimes I have more than one feeling at the same time.
                                                I will tap feelings I am having right now. 
                                                When I am ready,
                                                I will tap the Continue Check-In button to rate the level of my feelings.`, 
                                        options: [
                                            { id: 'option1', value: 'Joy', label: 'Joy' },
                                            { id: 'option2', value: 'Peace', label: 'Peace' },
                                            { id: 'option3', value: 'Love', label: 'Love' },                 
                                            { id: 'option4', value: 'Happiness', label: 'Happiness' },
                                            { id: 'option5', value: 'Gratitude', label: 'Gratitude' },
                                            { id: 'option6', value: 'Relaxation', label: 'Relaxation' },
                                            { id: 'option7', value: 'Excitement', label: 'Excitement' },
                                            { id: 'option8', value: 'Hope', label: 'Hope' },
                                            { id: 'option9', value: 'Confident', label: 'Confident' },
                                            { id: 'option10', value: 'Confused', label: 'Confused' },
                                            { id: 'option11', value: 'Sad', label: 'Sad' },
                                            { id: 'option12', value: 'Lonely', label: 'Lonely' },
                                            { id: 'option13', value: 'Depressed', label: 'Depressed' },
                                            { id: 'option14', value: 'Anxious', label: 'Anxious' },
                                            { id: 'option15', value: 'Afraid', label: 'Afraid' },
                                            { id: 'option16', value: 'Shame', label: 'Shame' },
                                            { id: 'option17', value: 'Stress', label: 'Stress' },
                                            { id: 'option18', value: 'Jealousy', label: 'Jealousy' },
                                            { id: 'option19', value: 'Disappointed', label: 'Disappointed' },
                                            { id: 'option20', value: 'Frustrated', label: 'Frustrated' },
                                            { id: 'option21', value: 'Angry', label: 'Angry' },
                                        ],
                                        step: 'label-and-rate-emotions'
                                    },
                                    // level handling
                                    {
                                        time: 114.04,
                                        level_handle : true,
                                        text: `Now, we rate the feelings by tapping the level.
                                                I tap 0, 1, 2, or 3 if I am having feelings and can talk and listen,
                                                am able to focus and be on-track. (slight pause if possible)
                                                I tap the 4, if I am having strong feelings
                                                and am having a hard time focusing and being on-track.
                                                I tap the 5 if I am hurting myself, others or property.  `,
                                        options: [
                                            { id: '0-level', value: '0-level', label: 'No Feeling' },
                                            { id: '1-level', value: '1-level', label: 'Tiny Feeling' },
                                            { id: '2-level', value: '2-level', label: 'Small Feeling' },                 
                                            { id: '3-level', value: '3-level', label: 'Medium Feeling' },
                                            { id: '4-level', value: '4-level', label: 'Strong Feeling' },
                                            { id: '5-level', value: '5-level', label: 'Overwhelming' },
                                        ],
                                        step: 'label-and-rate-emotions'
                                    },
                                    // level 4 breakpoints start 
                                    {
                                        time: 181.20, 
                                        text: `When we are at level 4 feeling, we have a hard time thinking clearly. It is a good time to use
                                        our All-the-Time skills. If I would like to continue with this Check-In, I tap the Continue
                                        Check-In button. If I don’t want to continue, I tap on one of the My Stuff buttons below to
                                        help me focus my mind and feel better. I tap the Help button if I need help.
                                        When we are at level 4 feeling, we have a hard time thinking clearly. It is a good time to use our All-
                                        the-Time skills. If I would like to continue with this Check-In, I tap the Next button. If I don’t want to
                                        continue, I tap on one of the My Stuff buttons below to help me focus my mind and feel better. I tap
                                        the Help button if I need help.`,
                                        options: [
                                            { id: 'option1', value: 'my-clear-picture', label: 'My Clear Picture' },
                                            { id: 'option2', value: 'my-goals', label: 'My Goals' },
                                            { id: 'option3', value: 'my-people', label: 'My People' },                 
                                            { id: 'option4', value: 'my-on-track-thinking', label: 'My On-Track Thinking' },
                                            { id: 'option5', value: 'my-on-track-action-plan', label: 'My On-Track Action Plan' },
                                            { id: 'option6', value: 'my-safety-plans', label: 'My Safety Plans' },
                                            { id: 'option7', value: 'my-new-me-actvities', label: 'My New-Me Activities' },
                                            { id: 'option8', value: 'my-skills-posters', label: 'My Skills Posters' },
                                            { id: 'option9', value: 'my-mountain-pose', label: 'My Mountain' },
                                        ],
                                        grid_class: 'level-4 space-center',
                                        //step: 'notice-my-breath.webp'
                                    }, 

                                    //Notice My tough : 
                                    {
                                        time: 200,
                                        //level_handle : true,
                                        text: `Next, let’s notice our thoughts. I notice a thought that is passing through my mind right
                                            now. I tap whether my mind is clear and focused or my mind is unclear and fuzzy. When
                                            you are ready, tap Next to move on to the next Clear Picture Do `, 
                                        step: 'notice-my-thoughts',
                                        options: [
                                            { id: 'my-mind-is-clear', value: 'my-mind-is-clear', label: 'My Mind is Clear & Focused' },
                                            { id: 'my-mind-is-unclear', value: 'my-mind-is-unclear', label: 'My Mind is Unclear and Fuzzy' },
                                        ],
                                        grid_class: 'space-center',
                                        step: 'my-on-track-thinking',
                                    },
                                    //Notice My Urges : 
                                    {
                                        time: 210,
                                        //level_handle : true,
                                        text: `Next, we will Notice Our Urges. I notice what I feel like doing- before I do it. I take a second
                                            and answer this question in my mind, “What do I feel like doing right now?” After I notice
                                            my urge, I tap the Next button to do On-Track Thinking. `, 
                                        step: 'notice-my-urges',
                                        options: [
                                            { id: 'notice-my-urges', value: 'Notice my Urges', label: 'Notice my Urges' },
                                        ],
                                        grid_class: 'space-center',
                                        single_item: true,
                                        step: 'notice-my-urges',
                                    },
                                    //Notice My On-Track Thinking : 
                                    {
                                        time: 220,
                                        //level_handle : true,
                                        text: `Great job getting a Clear Picture! Now we do On-Track Thinking. The first step of On-Track
                                            Thinking is Check It. I tap the Thumbs-up button if acting on these thoughts and urges will
                                            help me be on-track to my goals. I tap the Thumbs-down button, if acting on my thoughts
                                            and urges will lead me off-track from my goal. Once I have done Check It, I tap the Next
                                            button to make a skills plan. `, 
                                        step: 'my-on-track-thinking',
                                        options: [
                                            { id: 'helpful', value: 'helpful', label: ' = Helpful' },
                                            { id: 'not-helpful', value: 'not-helpful', label: ' = Not Helpful' },                                          
                                        ],
                                        grid_class: 'space-center'
                                    },
                                    //Not helful : 
                                    {
                                        time: 230,
                                        level_handle : true,
                                        text: `When I have thumbs-down thinking and urges, I Turn It. I can Turn It by thinking about my
                                            goal in this situation. I can also think of the negative consequences that will happen if I
                                            were to act on those off-track thoughts and urges. Once I have had thumbs-up thinking, I
                                            tap the Turn It to On-Track Thinking button to make a Skills Plan. `, 
                                        step: 'my-on-track-thinking',
                                        options: [
                                            { id: 'turn-it-helpful', value: 'turn-it-helpful', label: '' },                                         
                                        ],
                                        grid_class: 'space-center',
                                        single_item : true,
                                    },

                                     // level 5 breakpoints start 
                                    {
                                        time: 234.03, //old 234.16
                                        level_handle : true,
                                        //pause : true,
                                        text: `You reported that you are having a level 5. At a level 5 you are currently hurting yourself,
                                            others, or property. If you are harming yourself, others, or property right now, I recommend
                                            you immediately stop, ask for help, and move to a Safe Place.
                                            Tap the My People to see the people who help you with your skills. Tap the My Safety Plans
                                            to see ways to keep yourself safe. Call 911 if this is an emergency.
                                            If you are not harming yourself, others, or property right now, you may be at a level 4. Tap
                                            the Next to help you manage Level 4 feelings.`,
                                        options: [
                                            { id: 'my-people', value: 'my-people', label: 'My People' },
                                            { id: 'my-safety-plans', value: 'my-safety-plans', label: 'My Safety Plans' },
                                        ],
                                        grid_class: 'space-center level-5',
                                        //finalbreakpoint: true,
                                    }, 
                                    
                                
                                ];

                                // Prevent triggering already processed breakpoints
                                breakpoints.forEach(bp => {
                                    bp.handled = false;
                                    bp.initialized = false;
                                    bp.buttonShown = false;
                                });
                                video.addEventListener('timeupdate', handleBreakpoint);                                                   
                                $backButton.addClass('disabled');
                                function highlightTextWordByWord(selector, options = {}) {
                                    const {
                                        highlightClass = 'highlight-effect',
                                        delay = 300,
                                        duration = 800,
                                        color = 'rgba(255, 255, 0, 0.5)',
                                        keepHighlight = false,
                                        onComplete = null
                                    } = options;
                                    
                                    const element = document.querySelector(selector);
                                    if (!element) return;
                                    
                                    // Get the original text
                                    const originalText = element.textContent;
                                    
                                    // Create a pattern that captures words and spaces separately
                                    const wordPattern = /(\S+)(\s*)/g;
                                    let match;
                                    let words = [];
                                    
                                    // Extract words and spaces
                                    while ((match = wordPattern.exec(originalText)) !== null) {
                                        words.push({
                                            word: match[1],
                                            space: match[2]
                                        });
                                    }
                                    
                                    // Clear the element
                                    element.innerHTML = '';
                                    
                                    // Create spans for each word and preserve spacing
                                    words.forEach(item => {
                                        // Create and append the word span
                                        const wordSpan = document.createElement('span');
                                        wordSpan.textContent = item.word;
                                        wordSpan.className = 'highlight-word';
                                        wordSpan.style.position = 'relative';
                                        wordSpan.style.display = 'inline-block';
                                        wordSpan.style.transition = `background-color ${duration/2}ms ease-in-out`;
                                        element.appendChild(wordSpan);
                                        
                                        // Add the space as a separate text node to preserve formatting
                                        if (item.space) {
                                            element.appendChild(document.createTextNode(item.space));
                                        }
                                    });
                                    
                                    // Highlight each word sequentially
                                    const wordElements = element.querySelectorAll('.highlight-word');
                                    wordElements.forEach((wordEl, index) => {
                                        setTimeout(() => {
                                            // Apply highlight
                                            wordEl.style.backgroundColor = color;
                                            
                                            // Remove highlight after duration if not keeping
                                            if (!keepHighlight) {
                                                setTimeout(() => {
                                                    wordEl.style.backgroundColor = 'transparent';
                                                }, duration);
                                            }
                                            
                                            // Call completion callback after the last word
                                            if (index === wordElements.length - 1 && typeof onComplete === 'function') {
                                                setTimeout(onComplete, duration);
                                            }
                                        }, index * delay);
                                    });
                                    
                                    // Return original text for reset functionality
                                    return originalText;
                                }                                                          
                          
                                // Handle click on the speak icon
                                $speakIcon.on('click', function () {    
                                    if (video.paused) {
                                        // Play the video
                                        video.play();
                                        // Change the icon to "volume slash"
                                        $speakIcon.removeClass('vc-icon-volume-up').addClass('vc-icon-volume-slash');
                                        // Resume the typewriter effect
                                        //resumeTypewriter();
                                    } else {
                                        // Pause the video
                                        video.pause();
                                        // Change the icon to "volume"
                                        $speakIcon.removeClass('vc-icon-volume-slash').addClass('vc-icon-volume-up');
                                        // Pause the typewriter effect
                                        //pauseTypewriter();
                                    }
                                });    
                                
                                function handleBreakpoint() {

                                    const currentTime = video.currentTime;
                                    const currentIndex = breakpoints.findIndex((bp, index) => {
                                        const nextBp = breakpoints[index + 1];
                                        return currentTime >= bp.time && (!nextBp || currentTime < nextBp.time);
                                    });
                                
                                    if (currentIndex === -1) return;
                                
                                    const currentBreakpoint = breakpoints[currentIndex];
                                    const nextBreakpoint = breakpoints[currentIndex + 1];
                            
                                    if (currentBreakpoint && currentIndex != 0 && !currentBreakpoint.initialized && !currentBreakpoint.level_handle) {
                                        video.pause();
                                        console.log('Video paused at breakpoint.');
                                    }
                                    //console.log('currentIndex : ' , currentIndex);

                                    if (currentIndex === 0) {
                                        $backButton.addClass('disabled');
                                    } else {
                                        $backButton.removeClass('disabled');
                                    }
                                
                                    if (currentBreakpoint.level_handle) {
                                        //console.log('you reached the breakpoint where you should force play the video');
                                        $nextButton.hide();
                                    } else {
                                        $nextButton.show();
                                    }
                                
                                    if (!currentBreakpoint.initialized && currentBreakpoint.text) {
                                        // Show text with typing effect
                                    }
                                
                                    //console.log('currentBreakpoint.options : ', currentBreakpoint.options);

                                    if (!currentBreakpoint.initialized && currentBreakpoint.options && currentBreakpoint.autodisplay) {
                                        //console.log('here we should display the options');
                                        displayOptions(currentBreakpoint);
                                        if (currentBreakpoint.text) {
                                            typewriterActive = false;
                                            setTimeout(() => {
                                                $('.coaching-sessions-popup-text-script').text(currentBreakpoint.text);                                          
                                                //highlightTextWordByWord('.coaching-sessions-popup-text-script');
                                            }, 500);
                                        }
                                    }
                                
                                    currentBreakpoint.initialized = true;
                                
                                    if (currentBreakpoint.pause) {
                                        video.pause();
                                    }

                                }

                                function displayOptions(breakpoint) {
                                    const $optionsContainer = $('.options');
                                
                                    if (breakpoint.step) {
                                        $('#vc-step-img').attr('src', virtual_coach_data.img + breakpoint.step + '.webp');
                                    }
                                
                                    if (breakpoint.options) {
                                        // Generate the HTML for the options
                                        const optionsHTML = `
                                            <div class="options-grid ${breakpoint.grid_class ? breakpoint.grid_class : ''}">
                                                ${breakpoint.options.map((option, index) => `
                                                    <div class="option-item card ${breakpoint.single_item ? 'single_item' : ''}"
                                                        data-id="${option.value}"
                                                        data-value="${option.value}">
                                                        <img src="${virtual_coach_data.option + option.value}.webp" 
                                                            alt="${option.label}" class="option-image">
                                                        <div class="card-content">
                                                            <h3>${option.label}</h3>
                                                        </div>
                                                    </div>
                                                `).join('')}
                                            </div>
                                        `;
                                
                                        // Insert the options into the existing container
                                        $optionsContainer.html(optionsHTML).show(); // Show the options container
                                
                                        // Handle option selection
                                        $('.option-item').on('click', function () {
                                            $(this).toggleClass('selected');
                                            const target = $(this).data('value');
                                        
                                            if (target === '4-level') {
                                                console.log('handle level 4');
                                                isSeeking = true;
                                                //console.log('breakpoint : ', breakpoint);
                                                //$optionsContainer.hide(); // Hide options
                                                //$('.button-container').hide(); // Hide buttons
                                                moveToBreakpoint(181.20, video, breakpoints);
                                            } else if (target === '5-level') {
                                                console.log('handle level 5');
                                                isSeeking = true;
                                                //console.log('breakpoint : ', breakpoint);
                                                //$optionsContainer.hide(); // Hide options
                                                //$('.button-container').hide(); // Hide buttons
                                                moveToBreakpoint(234.03, video, breakpoints);
                                            }else if (target === '0-level' || target === '1-level' || target === '2-level' || target === '3-level') {
                                                console.log('handle level 0 - 3');
                                                isSeeking = true;
                                                moveToBreakpoint(200, video, breakpoints);
                                            }else if (target === 'not-helpful') {
                                                console.log('not helpful');
                                                isSeeking = true;
                                                moveToBreakpoint(230, video, breakpoints);
                                            }else if (target === 'turn-it-helpful') {
                                                console.log('turn-it-helpful');
                                                isSeeking = true;
                                                //back to rate feelings
                                                moveToBreakpoint(114.04, video, breakpoints);
                                            }
                                        });
                                    } else {
                                        // If there are no options, hide the container
                                        $optionsContainer.hide();
                                    }
                                }

                                // Function to handle the "Next" button click
                                $nextButton.on('click', function () {
                                    const currentTime = video.currentTime;
                                    const currentIndex = breakpoints.findIndex((bp, index) => {
                                        const nextBp = breakpoints[index + 1];
                                        return currentTime >= bp.time && (!nextBp || currentTime < nextBp.time);
                                    });

                                    if (currentIndex === -1) return;

                                    const nextBreakpoint = breakpoints[currentIndex + 1];
                                    console.log('nextBreakpoint : ' , nextBreakpoint)
                                    if (nextBreakpoint) {
                                        moveToBreakpoint(nextBreakpoint.time, video, breakpoints);
                                        displayOptions(nextBreakpoint); // Display options for the next breakpoint
                                    } else {
                                        console.log('No next breakpoint found.');
                                    }
                                });

                                // Function to handle the "Back" button click
                                $backButton.on('click', function () {
                                    const currentTime = video.currentTime;
                                    const currentIndex = breakpoints.findIndex((bp, index) => {
                                        const nextBp = breakpoints[index + 1];
                                        return currentTime >= bp.time && (!nextBp || currentTime < nextBp.time);
                                    });

                                    if (currentIndex === -1) return;

                                    //console.log(' current breakpoint : ', breakpoints[currentIndex]);

                                    const previousBreakpoint = breakpoints.reduce((prev, bp) => {
                                        if (bp.time < breakpoints[currentIndex].time && (!prev || bp.time > prev.time)) {
                                            return bp;
                                        }
                                        return prev;
                                    }, null);

                                    console.log('we should back to previous breakpoint : ', previousBreakpoint);

                                    if (previousBreakpoint) {
                                        moveToBreakpoint(previousBreakpoint.time, video, breakpoints);
                                        displayOptions(previousBreakpoint); // Display options for the previous breakpoint
                                    } else {
                                        console.log('No previous breakpoint found.');
                                    }
                                });

                                // Display options for the first breakpoint on page load
                                if (breakpoints.length > 0) {
                                    displayOptions(breakpoints[0]);
                                }

                                function moveToBreakpoint(targetTime, video, breakpoints) {
                                    $(video).off('timeupdate', handleBreakpoint); // Remove the timeupdate listener
                                
                                    const targetBreakpoint = breakpoints.find(bp => Math.abs(bp.time - targetTime) < 0.1);
                                
                                    if (!targetBreakpoint) {
                                        console.error('No breakpoint found for time:', targetTime);
                                        return;
                                    }

                                    //console.log('targetBreakpoint : ', targetBreakpoint);

                                    if (targetBreakpoint.options) {
                                        displayOptions(targetBreakpoint);
                                    }
                                
                                    breakpoints.forEach(bp => {
                                        if (bp.time <= targetTime) {
                                            bp.initialized = true;
                                            bp.handled = true;
                                            bp.buttonShown = true;
                                        } else {
                                            bp.initialized = false;
                                            bp.handled = false;
                                            bp.buttonShown = false;
                                        }
                                    });
                                
                                    targetBreakpoint.initialized = true;
                                    targetBreakpoint.handled = false;
                                    targetBreakpoint.buttonShown = false;
                                
                                    const handleSeekAndPlay = async () => {
                                        try {
                                            video.currentTime = targetTime;
                                
                                            await new Promise((resolve) => {
                                                const onSeeked = () => {
                                                    $(video).off('seeked', onSeeked);
                                                    resolve();
                                                };
                                                $(video).on('seeked', onSeeked);
                                            });
                                
                                            if (video.readyState < 2) {
                                                await new Promise((resolve) => {
                                                    const onCanPlay = () => {
                                                        $(video).off('canplay', onCanPlay);
                                                        resolve();
                                                    };
                                                    $(video).on('canplay', onCanPlay);
                                                });
                                            }
                                
                                            await video.play();
                                
                                            if (targetBreakpoint.text) {
                                                typewriterActive = false;
                                                setTimeout(() => {
                                                    $('.coaching-sessions-popup-text-script').text(targetBreakpoint.text);                                          
                                                    //highlightTextWordByWord('.coaching-sessions-popup-text-script');
                                                }, 500);
                                            }
                                
                                            setTimeout(() => {
                                                $(video).on('timeupdate', handleBreakpoint); // Reattach the timeupdate listener
                                            }, 500);
                                
                                        } catch (err) {
                                            $(video).on('timeupdate', handleBreakpoint); // Reattach the listener on error
                                        }
                                    };
                                
                                    if (video.readyState >= 2) {
                                        handleSeekAndPlay();
                                    } else {
                                        const onCanPlay = () => {
                                            handleSeekAndPlay();
                                            $(video).off('canplay', onCanPlay);
                                        };
                                        $(video).on('canplay', onCanPlay);
                                    }
                                }

                            },
                            close: function () {
                                console.log('Popup closed');
                            }
                        }
                    });
                } else {
                    console.error('Error: ', response.data || 'No content received.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error loading popup content', error);
            }
        });
    });

    /**
     * Function to jump to a specific time in the video and play it.
     * @param {HTMLVideoElement} videoElement - The video element to control.
     * @param {number} time - The time in seconds to jump to.
     * @param {string} logMessage - The message to log.
     */
    function jumpToTime(videoElement, time, logMessage) {
        if (!videoElement || !(videoElement instanceof HTMLVideoElement)) {
            console.error('Invalid video element.');
            return;
        }

        if (!isNaN(time) && videoElement.readyState >= 1) {
            videoElement.currentTime = time; // Set video time
            console.log('video.currentTime:', videoElement.currentTime);
            console.log(logMessage);

            videoElement.play().catch(err => console.error('Error resuming video:', err));
        } else {
            videoElement.addEventListener('loadedmetadata', function onMetadataLoaded() {
                videoElement.currentTime = time;
                videoElement.play().catch(err => console.error('Error resuming video:', err));
                console.log('video.currentTime (on metadata load):', videoElement.currentTime);
                console.log(logMessage);
                videoElement.removeEventListener('loadedmetadata', onMetadataLoaded);
            });
        }
    }
    

    

    
});