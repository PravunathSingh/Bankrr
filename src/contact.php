 <?php
 require_once "include/header.php";
 echo'<body class="bg-brand-primary">';
 require_once "include/navbar.php";
 require_once "include/db.php";
 ?>

<section class="container my-24">
    <h1 class="mb-20 text-4xl font-bold text-center text-brand-text">Want To Share Something ? <i
        class="fa fa-comments"></i>
    </h1>

    <div class="grid mb-20 md:grid-cols-2 md:gap-2 md:place-content-center md:place-items-center">
      <div>
        <form id="contactForm" method="POST">
          <div class="px-8 py-10 shadow-xl bg-brand-secondary rounded-xl">
            <div class="mb-2">
              <label class="text-lg font-normal text-brand-text">Name *</label>
            </div>
            <div class="mb-8">
              <input type="text" name="userName" required
                class="w-full px-5 py-2 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
            </div>
            <div class="mb-2">
              <label class="text-lg font-normal text-brand-text">Email *</label>
            </div>
            <div class="mb-11">
              <input type="email" name="userEmail" required
                class="w-full px-5 py-2 mb-3 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
            </div>
            <div class="mb-2">
              <label class="text-lg font-normal text-brand-text">Message *</label>
            </div>
            <div class="mb-11">
              <textarea name="message" cols="30" rows="5"
                class="w-full px-5 py-2 mb-3 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary"></textarea>
            </div>

            <div>
              <button type="submit" id="sub_btn" class="w-full shadow-lg btn-primary">Send <i
                  class="fa fa-paper-plane"></i></button>
            </div>
          </div>
          <p id="thank_you_msg"></p>
        </form>
      </div>

      <div class="hidden md:block">
        <img src="../assests/contact-us.png" alt="" class="w-full h-96">
      </div>
    </div>

    <div class="grid gap-6 md:grid-cols-2 place-items-center">
      <div>
        <div>
          <h1 class="text-4xl font-bold text-center text-brand-text">Connect With Us</h1>
        </div>
      </div>

      <div>
        <a href="#"
          class="mx-5 text-4xl font-semibold transition-all text-brand-accent-secondary hover:text-brand-accent-primary"><i
            class="fab fa-facebook"></i></a>
        <a href="#"
          class="mx-5 text-4xl font-semibold transition-all text-brand-accent-secondary hover:text-brand-accent-primary"><i
            class="fab fa-linkedin"></i></a>
        <a href="#"
          class="mx-5 text-4xl font-semibold transition-all text-brand-accent-secondary hover:text-brand-accent-primary"><i
            class="fab fa-twitter"></i></a>
        <a href="#"
          class="mx-5 text-4xl font-semibold transition-all text-brand-accent-secondary hover:text-brand-accent-primary"><i
            class="fab fa-instagram"></i></a>
      </div>
    </div>
  </section>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<script>
             jQuery('#contactForm').submit(function(e){
            jQuery('#sub_btn').val('Please wait...');
            jQuery('#sub_btn').attr('disabled',true);
            jQuery.ajax({
               url:'post/contact.php',
               type: 'post',
               data: jQuery('#contactForm').serialize(),
               success:function(result){
                jQuery('#thank_you_msg').html('Thank You');
                   jQuery('#contactForm') ['0'].reset();
                   jQuery('#sub_btn').val('Send Message');
                   

               }
           });
           e.preventDefault();
        });
    </script>
  <script src="./script.js"></script>
</body>

</html>