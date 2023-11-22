 <!-- Trigger/Open The Modal -->
 <button id="myBtn" class="hidden">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

 <!-- Modal content -->
 <div class="modal-content">
  
   

 <div class="modal-header">
    <span class="close">×</span>
    <img class="contactheader full-width" src="<?php echo get_stylesheet_directory_uri(); ?>/Contactheader.png" alt="Description de votre logo">
</div>

  <div class="modal-body">
    <form id="contactForm" class="center-form">
        <label for="name">NOM</label>
        <input type="text" id="name" name="name" required>

        <label for="email">E-MAIL</label>
        <input type="email" id="email" name="email" required>

        <label for="refPhoto">RÉF. PHOTO</label>
        <input type="text" id="refPhoto" name="refPhoto" required>

        <label for="message">MESSAGE</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
</div>

  <div class="modal-footer">
  
  </div>
</div>