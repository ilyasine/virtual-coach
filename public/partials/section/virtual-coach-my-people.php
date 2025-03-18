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

<div class="vc-my-people">
 
 <div class="vc-section-content-header">
  <div class="vc-sch-text">
   <div class="vc-sch-text-top"><?php _e('Who helps me with skills ?', $plugin_name); ?></div>
   <div class="vc-sch-text-bottom"><?php _e('Who helps me with skills ?', $plugin_name) ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></div>
  </div>
  <div class="vc-sch-button" data-src="#add-new-people" id="add-new-people-btn">
    <i class="vc-icon-plus"></i>
        <?php _e('Add New People', $plugin_name); ?>   
    </div>
 </div>

 <div class="virtual-coach-popup mfp-with-anim mfp-hide" id="add-new-people">
  <div class="vc-popup-container">
   
   <div class="vc-new-people-popup-head">
    <div class="vc-npp-title"><?php _e('Add New People',  $plugin_name) ?></div>
   </div>
   
   <div class="new-people-popup-content">
    <form class="vc-form">
    <div class="vc-mp-mb-avatar">
     <div class="vc-mp-mb-avatar-image">
      <label>
       <i class="vc-icon-camera"></i>
       <input type="file" accept="image/*" onchange="loadFile(event)">
       <img id="avatar-image" src="<?php echo esc_attr (VIRTUAL_COACH_IMG . 'vc-user.webp') ?>" />
      </label>
     </div>
    </div>
    <div class="vc-mp-mb-form">
     <div class="form-row">
      <div class="form-bloc">
       <label for="fullname"><?php _e('Full Name', $plugin_name); ?></label>
       <input type="text" class="form-control" id="fullname" placeholder="Full Name" required>
      </div>
      <div class="form-bloc">
       <label for="specialization"><?php _e('Specialization', $plugin_name); ?></label>
       <input type="text" class="form-control" id="specialization" placeholder="Specialization" required>
      </div>
     </div>
     <div class="form-row">
      <div class="form-bloc">
       <label for="edit-phonenumber"><?php _e('Phone Number', $plugin_name); ?></label>
       <input type="text" class="form-control" id="edit-phonenumber" placeholder="Phone Number" required>
      </div>
      <div class="form-bloc">
       <label for="edit-email"><?php _e('Email', $plugin_name); ?></label>
       <input type="text" class="form-control" id="edit-email" placeholder="Email" required>
      </div>
     </div>
     <div class="form-bloc">
       <label for="edit-location"><?php _e('Location', $plugin_name); ?></label>
       <input type="text" class="form-control" id="edit-location" placeholder="Location" required>
     </div>
     <div class="form-bloc">
       <label for="edit-availibility"><?php _e('Availibility', $plugin_name); ?></label>
       <input type="text" class="form-control" id="edit-availibility" placeholder="Availibility" required>
     </div>
     <div class="form-bloc">
       <label for="edit-notes"><?php _e('Notes', $plugin_name); ?></label>
       <textarea type="text" class="form-control" id="edit-notes" placeholder="Notes" rows="4" required></textarea>
     </div>
     <button type="submit"><?php _e('Submit', $plugin_name); ?></button>
    </div>
    </form>
   </div>
   
  </div>
 </div>
 
 <div class="vc-section-content-body">
  <div class="vc-mp-bloc">
   <div class="vc-mp-side-bloc">
    
    <div class="vc-mp-sb-people">
     <div class="vc-mp-sb-people-image">
      <img src="<?php echo wp_get_attachment_url(455); ?>">
     </div>
     <div class="vc-mp-sb-people-text">
      <div class="vc-mp-sb-people-text-top">Mr. Jade Kevin</div>
      <div class="vc-mp-sb-people-text-bottom">Close Friend</div>
     </div>
    </div>
    
    <div class="vc-mp-sb-people">
     <div class="vc-mp-sb-people-image">
      <img src="<?php echo wp_get_attachment_url(455); ?>">
     </div>
     <div class="vc-mp-sb-people-text">
      <div class="vc-mp-sb-people-text-top">Michael Robert</div>
      <div class="vc-mp-sb-people-text-bottom">Helping Friend</div>
     </div>
    </div>
    
    <div class="vc-mp-sb-people active">
     <div class="vc-mp-sb-people-image">
      <img src="<?php echo wp_get_attachment_url(455); ?>">
     </div>
     <div class="vc-mp-sb-people-text">
      <div class="vc-mp-sb-people-text-top">Jennifer Linda</div>
      <div class="vc-mp-sb-people-text-bottom">Helps me with Skill</div>
     </div>
    </div>
    
    <div class="vc-mp-sb-people">
     <div class="vc-mp-sb-people-image">
      <img src="<?php echo wp_get_attachment_url(455); ?>">
     </div>
     <div class="vc-mp-sb-people-text">
      <div class="vc-mp-sb-people-text-top">Mr. Jade Kevin</div>
      <div class="vc-mp-sb-people-text-bottom">Close Friend</div>
     </div>
    </div>
    
    <div class="vc-mp-sb-people">
     <div class="vc-mp-sb-people-image">
      <img src="<?php echo wp_get_attachment_url(455); ?>">
     </div>
     <div class="vc-mp-sb-people-text">
      <div class="vc-mp-sb-people-text-top">Michael Robert</div>
      <div class="vc-mp-sb-people-text-bottom">Helping Friend</div>
     </div>
    </div>
    
    <div class="vc-mp-sb-people">
     <div class="vc-mp-sb-people-image">
      <img src="<?php echo wp_get_attachment_url(455); ?>">
     </div>
     <div class="vc-mp-sb-people-text">
      <div class="vc-mp-sb-people-text-top">Jennifer Linda</div>
      <div class="vc-mp-sb-people-text-bottom">Helps me with Skill</div>
     </div>
    </div>
    
   </div>
   <div class="vc-mp-main-bloc">
    <form class="vc-form">
    <div class="vc-mp-mb-avatar">
     <div class="vc-mp-mb-avatar-image">
      <img src="<?php echo wp_get_attachment_url(455); ?>">
     </div>
     <div class="vc-mp-mb-avatar-text">
      <div class="vc-mp-mb-avatar-text-top">Jennifer Linda</div>
      <div class="vc-mp-mb-avatar-text-bottom">Helps you with skills</div>
     </div>
    </div>
    <div class="vc-mp-mb-form">
     <div class="form-row">
      <div class="form-bloc">
       <label for="phonenumber"><?php _e('Phone Number', $plugin_name); ?></label>
       <input type="text" class="form-control" id="phonenumber" value="+54 526 2451 54" placeholder="Phone Number" required>
      </div>
      <div class="form-bloc">
       <label for="email"><?php _e('Email', $plugin_name); ?></label>
       <input type="text" class="form-control" id="email" value="jeniferlinda01@gmail.com" placeholder="Email" required>
      </div>
     </div>
     <div class="form-bloc">
       <label for="location"><?php _e('Location', $plugin_name); ?></label>
       <input type="text" class="form-control" id="location" value="40-T Lem Madison, USA" placeholder="Location" required>
     </div>
     <div class="form-bloc">
       <label for="availibility"><?php _e('Availibility', $plugin_name); ?></label>
       <input type="text" class="form-control" id="validationDefault07" value="Mon - Fri (9PM - 5PM)" placeholder="Availibility" required>
     </div>
     <div class="form-bloc">
       <label for="notes"><?php _e('Notes', $plugin_name); ?></label>
       <textarea type="text" class="form-control" id="notes" placeholder="Notes" rows="4" required>I helped you in learning yoga skills. I am always be with you!</textarea>
     </div>
     <button type="submit"><?php _e('Submit', $plugin_name); ?></button>
    </div>
    </form>
   </div>
  </div>
 </div>
 
</div>
