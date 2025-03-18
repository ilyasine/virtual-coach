<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://labgenz.com/
 * @since      1.0.0
 *
 * @package    Virtual_Coach
 * @subpackage Virtual_Coach/public/partials
 */

 $coach_id = Virtual_Coach_Utils::get_current_user_virtual_coach();
 $coach_gender = Virtual_Coach_Utils::get_coach_gender($coach_id);

?>

<div class="vc-my-goals">
    <div class="vc-section-content-header">
        <div class="vc-sch-text">
            <div class="vc-sch-text-top"><?php _e('My Goals', $plugin_name) ?></div>
            <div class="vc-sch-text-bottom"><?php _e('Tap on the Add a New Goal button to add a goal to your Goal List. Tap on the Goal to see the details of that goal. You can move your goals up and down the list by grabbing the dots on the left of the goal and dragging it to a higher or lower priority. You can edit your goal by tapping on the pencil button, and delete it by tapping the trash button.', $plugin_name) ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></div>
        </div>
        <div class="vc-sch-button" data-src="#create-new-goal" id="create-new-goal-btn">
            <i class="vc-icon-plus"></i>
            <?php _e('Create new Goal', $plugin_name); ?>
        </div>
    </div>

    <div class="virtual-coach-popup mfp-with-anim mfp-hide create-new-goal" id="create-new-goal">
        <div class="vc-popup-container">
            <div class="vc-popup-head">
                <div class="vc-popup-title"><?php _e('Creating your new Goal',  $plugin_name) ?></div>
                <div class="vc-popup-desc">
                    <span>
                        <?php echo sprintf( __('<b>Instructions:</b> Create a name for your goal. For example, “Fitness”. Tap Type My Goal to type a description of your goal. Tap Record My Goal to record your goal. Tap Add Images of My Goal to upload one of your photos or choose an image for your goal from the image library that reminds you of your goal.', $plugin_name) ); ?>
                        <i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i>
                    </span>
                </div>
            </div>
            <div class="vc-popup-content new-goal-popup-content">
                <ul>
                    <li><a href="#write-name"><span>1</span><?php _e('Name', $plugin_name) ?></a></li>
                    <li><a href="#write-goal"><span>2</span><?php _e('Goal', $plugin_name) ?></a></li>
                    <li><a href="#record-audio"><span>3</span><?php _e('Record',  $plugin_name) ?></a></li>
                    <li><a href="#upload-image"><span>4</span><?php _e('Image', $plugin_name) ?></a></li>
                </ul>
                <form id="newgoalrecording">
                    <div id="write-name">
                        <div class="write-text-bloc">
                            <label for="writename"><?php _e('Name of My Goal:', $plugin_name) ?></label>
                            <input type="text" id="writename" name="writename" value="" placeholder="<?php _e('Type Name of My Goal', $plugin_name) ?>">
                        </div>
                        <div class="vc-record-audio-foot">
                            <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
                            <div class="vc-foot-forward"><span id="next" value="1"><?php _e('Next', $plugin_name) ?></span><i class="vc-icon-arrow-right"></i></div>
                        </div>
                    </div>
                    <div id="write-goal">
                        <div class="write-text-bloc">
                            <label for="writegoal"><?php _e('My Goal:', $plugin_name) ?></label>
                            <input type="text" id="writegoal" name="writegoal" value="" placeholder="<?php _e('Type My Goal', $plugin_name) ?>">
                        </div>
                        <div class="vc-record-audio-foot">
                            <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
                            <div class="vc-foot-forward"><span id="next" value="1"><?php _e('Next', $plugin_name) ?></span><i class="vc-icon-arrow-right"></i></div>
                        </div>
                    </div>
                    <div id="record-audio">
                        <div class="vc-record-audio">
                            <div class="vc-record-audio-tap">
                                <div class="vc-rat-vibes">
                                    <div class="vc-vibes active">
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                    </div>
                                </div>
                                <div class="vc-rat-buttons">
                                    <div class="vc-rat-buttons-close"><i class="vc-icon-times"></i></div>
                                    <div class="vc-rat-buttons-mic">
                                        <i class="vc-icon-microphone"></i>
                                        <span><?php _e('Record My Goal', $plugin_name) ?></span>
                                    </div>
                                    <div class="vc-rat-buttons-check"><i class="vc-icon-check"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="vc-record-audio-foot">
                            <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
                            <div class="vc-foot-forward"><span id="next" value="1"><?php _e('Next', $plugin_name) ?></span><i class="vc-icon-arrow-right"></i></div>
                        </div>
                    </div>
                    <div id="upload-image">
                        <div class="upload-images-bloc">
                            <label for="uploadimage">
                                <span class="upload-images-text"><?php _e('Add an Image of My Goal:', $plugin_name) ?></span>
                                <span class="upload-images-drag">
                                    <i class="vc-icon-cloud-upload"></i>
                                    <span id="fileLabel" class="upload-images-drag-text"><?php echo sprintf( __('Drag and Drop or <span>Browse</span>', $plugin_name) ); ?></span>
                                    <input type="file" id="uploadimage" name="uploadimage" onchange="pressed()">
                                </span>
                            </label>
                        </div>
                        <div class="vc-record-audio-foot">
                            <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
                            <label for="newgoalrecordingsubmit" class="vc-foot-forward">
                                <span><?php _e('Submit', $plugin_name) ?></span>
                                <i class="vc-icon-arrow-right"></i>
                                <input type="submit" id="newgoalrecordingsubmit">
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="virtual-coach-popup mfp-with-anim mfp-hide edit-goal" id="edit-goal">
        <div class="vc-popup-container">
            <div class="vc-popup-head">
                <div class="vc-popup-title"><?php _e('Edit Goal',  $plugin_name) ?></div>
            </div>
            <div class="vc-popup-content edit-goal-popup-content">
                <ul>
                    <li><a href="#edit-write-name"><span>1</span><?php _e('Name', $plugin_name) ?></a></li>
                    <li><a href="#edit-write-goal"><span>2</span><?php _e('Goal', $plugin_name) ?></a></li>
                    <li><a href="#edit-record-audio"><span>3</span><?php _e('Record',  $plugin_name) ?></a></li>
                    <li><a href="#edit-upload-image"><span>4</span><?php _e('Image', $plugin_name) ?></a></li>
                </ul>
                <form id="edit-goalrecording">
                    <div id="edit-write-name">
                        <div class="write-text-bloc">
                            <label for="editwritename"><?php _e('Name of My Goal:', $plugin_name) ?></label>
                            <input type="text" id="editwritename" name="editwritename" value="<?php _e('Fitness', $plugin_name) ?>" placeholder="<?php _e('Type Name of My Goal', $plugin_name) ?>">
                        </div>
                        <div class="vc-record-audio-foot">
                            <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
                            <div class="vc-foot-forward"><span id="next" value="1"><?php _e('Next', $plugin_name) ?></span><i class="vc-icon-arrow-right"></i></div>
                        </div>
                    </div>
                    <div id="edit-write-goal">
                        <div class="write-text-bloc">
                            <label for="editwritegoal"><?php _e('My Goal:', $plugin_name) ?></label>
                            <input type="text" id="editwritegoal" name="editwritegoal" value="<?php _e('I want to get a Tesla Car', $plugin_name) ?>" placeholder="<?php _e('Type My Goal', $plugin_name) ?>">
                        </div>
                        <div class="vc-record-audio-foot">
                            <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
                            <div class="vc-foot-forward"><span id="next" value="1"><?php _e('Next', $plugin_name) ?></span><i class="vc-icon-arrow-right"></i></div>
                        </div>
                    </div>
                    <div id="edit-record-audio">
                        <div class="vc-record-audio">
                            <div class="vc-record-audio-tap">
                                <div class="vc-rat-vibes">
                                    <div class="vc-vibes active">
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                    </div>
                                </div>
                                <div class="vc-rat-buttons">
                                    <div class="vc-rat-buttons-close"><i class="vc-icon-times"></i></div>
                                    <div class="vc-rat-buttons-mic">
                                        <i class="vc-icon-microphone"></i>
                                        <span><?php _e('Record My Goal', $plugin_name) ?></span>
                                    </div>
                                    <div class="vc-rat-buttons-check"><i class="vc-icon-check"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="vc-record-audio-foot">
                            <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
                            <div class="vc-foot-forward"><span id="next" value="1"><?php _e('Next', $plugin_name) ?></span><i class="vc-icon-arrow-right"></i></div>
                        </div>
                    </div>
                    <div id="edit-upload-image">
                        <div class="upload-images-bloc">
                            <label for="edituploadimage">
                                <span class="upload-images-text"><?php _e('Add an Image of My Goal:', $plugin_name) ?></span>
                                <span class="upload-images-drag">
                                    <i class="vc-icon-cloud-upload"></i>
                                    <span id="fileLabelEdit" class="upload-images-drag-text"><?php echo sprintf( __('Drag and Drop or <span>Browse</span>', $plugin_name) ); ?></span>
                                    <input type="file" id="edituploadimage" name="edituploadimage" onchange="pressededit()">
                                </span>
                            </label>
                        </div>
                        <div class="vc-record-audio-foot">
                            <div class="vc-foot-back"><i class="vc-icon-arrow-left"></i></div>
                            <label for="edit-goalrecordingsubmit" class="vc-foot-forward">
                                <span><?php _e('Submit', $plugin_name) ?></span>
                                <i class="vc-icon-arrow-right"></i>
                                <input type="submit" id="edit-goalrecordingsubmit">
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="virtual-coach-popup mfp-with-anim mfp-hide view-goal" id="view-goal">
        <div class="vc-popup-container">
            <div class="vc-popup-head">
                <div class="vc-popup-title"><?php _e('My Goal',  $plugin_name) ?></div>
            </div>
            <div class="vc-popup-content view-goal-popup-content">
                <ul>
                    <li><a href="#view-write-name"><span>1</span><?php _e('Name', $plugin_name) ?></a></li>
                    <li><a href="#view-write-goal"><span>2</span><?php _e('Goal', $plugin_name) ?></a></li>
                    <li><a href="#view-record-audio"><span>3</span><?php _e('Record',  $plugin_name) ?></a></li>
                    <li><a href="#view-upload-image"><span>4</span><?php _e('Image', $plugin_name) ?></a></li>
                </ul>
                <form id="view-goalrecording">
                    <div id="view-write-name">
                        <div class="write-text-bloc">
                            <label for="viewwritename"><?php _e('Name of My Goal:', $plugin_name) ?></label>
                            <input type="text" id="viewwritename" name="viewwritename" value="<?php _e('Fitness', $plugin_name) ?>" placeholder="<?php _e('Type Name of My Goal', $plugin_name) ?>">
                        </div>
                        <div class="vc-record-audio-foot vc-bloc-options">
                            <button data-speak="
                                <?php _e('You can edit your goal by tapping on
                                the pencil button and delete it by tapping
                                the trash button.', $plugin_name);
                                ?>" 
                                data-gender="<?php echo esc_attr($coach_gender); ?>"
                                class="info-btn vc-button speak-btn">
                                <?php _e('Info', $plugin_name); ?>
                            </button>
                            <i data-src="#edit-goal" id="edit-goal-btn" class="vc-icon-pencil"></i>
                            <i data-src="#delete-goal" id="delete-goal-btn" class="vc-icon-trash"></i>
                        </div>
                    </div>
                    <div id="view-write-goal">
                        <div class="write-text-bloc">
                            <label for="viewwritegoal"><?php _e('My Goal:', $plugin_name) ?></label>
                            <input type="text" id="viewwritegoal" name="viewwritegoal" value="<?php _e('I want to take a walk 3 times per week', $plugin_name) ?>" placeholder="<?php _e('Type My Goal', $plugin_name) ?>">
                        </div>
                        <div class="vc-record-audio-foot vc-bloc-options">
                            <button class="info-btn vc-button"><?php _e('Info', $plugin_name); ?></button>
                            <i data-src="#edit-goal" id="edit-goal-btn" class="vc-icon-pencil"></i>
                            <i data-src="#delete-goal" id="delete-goal-btn" class="vc-icon-trash"></i>
                        </div>
                    </div>
                    <div id="view-record-audio">
                        <div class="vc-record-audio">
                            <div class="vc-record-audio-tap">
                                <div class="vc-rat-vibes">
                                    <div class="vc-vibes active">
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                        <div class="vc-vibe-obj"></div>
                                    </div>
                                </div>
                                <div class="vc-rat-buttons">
                                    <div class="vc-rat-buttons-close"><i class="vc-icon-times"></i></div>
                                    <div class="vc-rat-buttons-mic">
                                        <i class="vc-icon-microphone"></i>
                                        <span><?php _e('Record My Goal', $plugin_name) ?></span>
                                    </div>
                                    <div class="vc-rat-buttons-check"><i class="vc-icon-check"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="vc-record-audio-foot vc-bloc-options">
                            <button class="info-btn vc-button"><?php _e('Info', $plugin_name); ?></button>
                            <i data-src="#edit-goal" id="edit-goal-btn" class="vc-icon-pencil"></i>
                            <i data-src="#delete-goal" id="delete-goal-btn" class="vc-icon-trash"></i>
                        </div>
                    </div>
                    <div id="view-upload-image">
                        <div class="upload-images-bloc">
                            <label for="viewuploadimage">
                                <span class="upload-images-text"><?php _e('Add an Image of My Goal:', $plugin_name) ?></span>
                                <span class="upload-images-drag">
                                    <i class="vc-icon-cloud-upload"></i>
                                    <span id="fileLabelView" class="upload-images-drag-text"><?php echo sprintf( __('Drag and Drop or <span>Browse</span>', $plugin_name) ); ?></span>
                                    <input type="file" id="viewuploadimage" name="viewuploadimage" onchange="pressedview()">
                                </span>
                            </label>
                        </div>
                        <div class="vc-record-audio-foot vc-bloc-options">
                            <button class="info-btn"><?php _e('Info', $plugin_name); ?></button>
                            <i data-src="#edit-goal" id="edit-goal-btn" class="vc-icon-pencil"></i>
                            <i data-src="#delete-goal" id="delete-goal-btn" class="vc-icon-trash"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="virtual-coach-popup mfp-with-anim mfp-hide delete-goal" id="delete-goal">
        <div class="vc-popup-container">
            <div class="vc-popup-head">
                <div class="vc-popup-title"><?php _e('Delete Goal',  $plugin_name) ?></div>
            </div>
            <div class="vc-popup-content">
                <div class="delete-bloc">
                    <i class="vc-icon-exclamation-triangle"></i>
                    <span><?php _e('Do you really want to delete this goal?',  $plugin_name) ?></span>
                    <div class="delete-bloc-btn">
                        <div class="delete-bbtn"><i class="vc-icon-arrow-left"></i><span><?php _e('No',  $plugin_name) ?></span></div>
                        <div class="back-bbtn"><span><?php _e('Yes',  $plugin_name) ?></span><i class="vc-icon-trash"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="vc-section-content-body">
        <table class="vc-table-bloc">
            <thead>
                <tr> 
                    <th></th>
                    <th><?php _e('My Goals',  $plugin_name) ?></th>                
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="vc-bloc-icon"><i class="vc-icon-grip-h"></i></td>
                    <td data-src="#view-goal" id="view-goal-btn" class="vc-bloc-title"><span>Fitness</span></td>                  
                    <td class="vc-bloc-options">                       
                        <i data-src="#edit-goal" id="edit-goal-btn" class="vc-icon-pencil"></i>
                        <i data-src="#delete-goal" id="delete-goal-btn" class="vc-icon-trash"></i>
                    </td>
                </tr>
                <!-- Repeat similar rows for other goals -->
            </tbody>
        </table>
    </div>
</div>