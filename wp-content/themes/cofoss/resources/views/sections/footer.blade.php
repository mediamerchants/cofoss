<?php 
$contactSectionLabel = get_field('contact_section_label','option');
$footerLogo          = get_field('footer_logo','option');
$phoneNumberLabel    = get_field('phone_number_label','option');
$phoneNumber         = get_field('phone_number','option');
$emailLabel          = get_field('email_label','option');
$emailAddress        = get_field('email_address','option');

?>
<footer class="content-info">
  <div class="container">
    <div class="row">
      <div class="container12">

        <?php if($footerLogo): ?>
          <a href="<?php echo home_url(); ?>">
            <img class="logo" src="<?php echo $footerLogo; ?>" />
          </a>
        <?php endif; ?>

        <div class="contact-info">
          <h3><?php echo $contactSectionLabel; ?></h3>
          <label class="phone"><?php echo $phoneNumberLabel ? $phoneNumberLabel : 'P:'; ?></label>
          <a href="tel:<?php echo $phoneNumber; ?>"><?php echo $phoneNumber; ?></a>

          <label class="email-address"><?php echo $emailLabel ? $emailLabel : 'E:'; ?></label>
          <a href="mailto:<?php echo $emailAddress; ?>"><?php echo $emailAddress; ?></a>
        </div>
        
      </div> <!-- .container12 -->
    </div> <!-- .row -->
  </div> <!-- .container -->
</footer>
