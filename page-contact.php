<php
/*
Template Name:  Contact Form Page Template
*/
?>


<?php
    //response generation function
    $response = "";

    //function to generate response
    function my_contact_form_generate_response($type, $message){
        global $response;
            if($type == "success") $response = "<div class='success'>{$message}</div>";
                else $response = "<div class='error'>{$message}</div>";
    }

    //response messages
    $missing_content = "Please fill out all of the required information";
    $email_invalid = "Email address is invalid";
    $message_unsent = "Message was not sent. Try Again.";
    $message_sent = "Your message was sent successfully";

    //user posted variables
    $name = $_POST['message_name'];
    $email = $_POST['message_email'];
    $message = $_POST['message_text'];

    //php mailer variables
    $to = get_option('admin_email');
    $subject = "Someone sent a message from" .get_bloginfo('name');
    $headers = 'From: '. $email . "rn" . 'Reply-To: '. $email . "rn";

    //validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        my_contact_form_generate_response("error", $email_invalid);

            else //email valid
            {
            //validate presence of name and email
            //send email
            }
            //validate presence of name and message
            if(empty($name) || empty($message)) {
                my_contact_form_generate_response("error", $missing_content);
            }
            else //ready to go
            {
                $sent = wp_mail($to, $subject, strip_tags($message), $headers);
                    if($sent) my_contact_form_generate_response("success", $message_sent); //message sent
                        else my_contact_form_generate_response("error", $message_unsent); //error message
            }
?>

<?php get_header(); ?>

    <div class="row">
        <section class="small-12 columns mainBodyFormSection">
            <div>
                 <img class="highlightMargin" src="<?php print IMAGES; ?>/header_highlight.png" >
            </div>

            <h1 class="contentH1"><?php the_title(); ?></h1>
            <div class="medium-7 columns formSection">
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="contactText"><?php the_content(); ?></div>
                         <?php echo $response; ?>
                             <form class="contact_form" action="<?php the_permalink(); ?>" method="post" name="contact_form">
                                 <ul class="form">
                                     <li>
                                         <p class="form">* All fields are required </p>
                                     </li>
                                     <li>
                                         <la bel class="form" for="name"><span class="requiredInfo">*</span>   Name:<br>
                                            <input class="formContact" type="text" placeholder="Annabelle Lee" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>" required/>
                                         </label>
                                     </li>
                                     <li>
                                         <label class="form" for="email"><span class="requiredInfo">*</span>   Email:<br>
                                             <input class="formContact" type="text" placeholder="name@email.com" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>" required/>
                                         </label>
                                     </li>
                                     <li>
                                         <label class="form" for="message_text"><span class="requiredInfo">*</span>   Message:<br>
                                             <textarea class="form" type="text" placeholder="42" name="message_text" cols="40" rows="6" <?php echo esc_textarea($_POST['message_text']); ?> required></textarea>
                                         </label>
                                     </li>
                                     <li>
                                         <button value="send" class="button tiny round formSubmit" type="submit"> Submit
                                         <input type="hidden" name="submitted" value="1">

                                     </li>
                                 </ul>
                             </form>
                         <?php endwhile; // end of the loop. ?>
                    </div> <!-- .contactText -->
                    <div class="medium-5 columns">
                        <div class="row">
                            <div class="small-4 columns formSectionSide">
                                <h1 class="formH1">Address:</h1>
                                  <hr class="contentStyleFormPage">

                                  <?php if( is_active_sidebar ('contact-address-widget-area')) : ?>
                                      <?php dynamic_sidebar ('contact-address-widget-area'); ?>
                                  <?php endif; ?>
                            </div>
                            <div class="small-4 columns formSectionSide">
                                <h1 class="formH1">Phone Number:</h1>
                                <hr  class="contentStyleFormPage">

                                <?php if( is_active_sidebar ('contact-phone-widget-area')) : ?>
                                      <?php dynamic_sidebar ('contact-phone-widget-area'); ?>
                                <?php endif; ?>

                            </div>
                            <div class="small-4 columns formSectionSide">
                                <h1 class="formH1">More Info:</h1>
                                <hr  class="contentStyleFormPage">
                                <ul class="form">

                                    <?php if( is_active_sidebar ('contact-info-widget-area')) : ?>
                                          <?php dynamic_sidebar ('contact-info-widget-area'); ?>                                     <?php endif; ?>

                                </ul>
                            </div>
                        </div> <!-- .row -->
                    </div> <!-- .medium-5 .columns -->

            </div> <!-- .medium-7.columns.formSection -->
        </section> <!-- .small-12.columns.mainBodyFormSection  -->
    </div> <!-- .row -->
<?php get_footer(); ?>