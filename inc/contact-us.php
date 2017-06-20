<?php

function whaling_city_web_contact_us_form(){ ?>

<form class="contact cf" onsubmit="event.preventDefault();"">
  <h2>Let's Talk</h2>
  <div class="half left cf">
    <input type="text" id="input-name" placeholder="Name" name="contactName">
    <input type="email" id="input-email" placeholder="Email address" name="contactEmail">
    <select id="input-subject" placeholder="Subject" name="contactSubject">
    	<option value="1">I have a question</option>
    	<option value="2">I would like to schedule a meeting?</option>
    	<option value="3">I would like to see your pricing sheet</option>
    </select>
  </div>
  <div class="half right cf">
    <textarea name="message" type="text" id="input-message" placeholder="Message"></textarea>
  </div>  
  <button id="input-submit">Get in Touch</button>
</form>

<?php }