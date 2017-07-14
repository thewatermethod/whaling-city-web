<?php

//
// here is the php for outputting a contact us form
// the work of processing the form is handled in the javascript file "../js/contact-us.js"
//

// this function has the html for the form

function whaling_city_web_contact_us_form(){ ?>

<form class="contact cf" onsubmit="event.preventDefault();"">
  
  <h2>Let's Talk</h2>
  <div style="display: flex;">
    <div class="half left cf">
      <input type="text" id="input-name" placeholder="Name" name="contactName">
      <input type="email" id="input-email" placeholder="Email address" name="contactEmail">
      <select id="input-subject" placeholder="Subject" name="contactSubject">
        <option value="Question">I have a question</option>
        <option value="Meeting">I would like to schedule a meeting</option>
        <option value="Pricing">I would like to see your pricing sheet</option>
      </select>
      <input type="text" id="thisField" required name="thisField">
    </div>

    <div class="half right cf">
      <textarea name="message" type="text" id="input-message" placeholder="Message"></textarea>
    </div>  
  </div>
  <?php wp_nonce_field( 'whaling_city_web_contact_us_email', 'whaling_city_web_contact_us_email_nonce', true, true ); ?>

  <button id="input-submit">Get in Touch</button>
</form>

<?php }


// this is the php that takes the ajax form and sends the email

function whaling_city_web_contact_us_email(){

  if( wp_verify_nonce( $_GET['wpNonce'], 'whaling_city_web_contact_us_email' ) ){ 

    $admin = get_userdata(1);

    $to = $admin->user_email;
    $subject = $_GET['inputSubject'];
    $message = "Message from: " . $_GET['inputName'] . " - " . $_GET['inputEmail'] . "\n\n\n\n" . $_GET['inputMessage'];
    wp_mail( $to, $subject, $message );

    die( 'Email sent' );

  } else {

    die( 'email not sent' );

  }

}

// here are some hooks that we need to hook everything up

// this tells admin-ajax what to do with this action
add_action( 'wp_ajax_whaling_city_web_contact_us_email', 'whaling_city_web_contact_us_email' );

// and this makes it so logged out users can use it as well
add_action( 'wp_ajax_nopriv_whaling_city_web_contact_us_email', 'whaling_city_web_contact_us_email' );