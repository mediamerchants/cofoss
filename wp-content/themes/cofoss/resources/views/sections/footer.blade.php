<?php 
$contactSectionLabel = get_field('contact_section_label','option');
$footerLogo          = get_field('footer_logo','option');
$phoneNumberLabel    = get_field('phone_number_label','option');
$phoneNumber         = get_field('phone_number','option');
$emailLabel          = get_field('email_label','option');
$emailAddress        = get_field('email_address','option');

?>
<footer class="content-info">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <?php if($footerLogo): ?>
          <a href="<?php echo home_url(); ?>">
            <img class="logo" src="<?php echo $footerLogo; ?>" />
          </a>
        <?php endif; ?>

        <div class="contact-info">
        <?php echo $contactSectionLabel ? '<h3>'.$contactSectionLabel.'</h3>' : ''; ?>
          <?php echo $phoneNumberLabel ? '<label class="phone">'. $phoneNumberLabel.'</label>' : ''; ?>
          <?php echo $phoneNumber ? '<a href="tel:'.$phoneNumber.'">'.$phoneNumber.'</a>' : ''; ?>

          <?php echo $emailLabel ? '<label class="email-address">'.$emailLabel.'</label>' : ''; ?>
          <?php echo $emailAddress ? '<a href="mailto:'.$emailAddress.'">'.$emailAddress.'</a>' : ''; ?>
        </div>
        
      </div> <!-- .container12 -->
    </div> <!-- .row -->
  </div> <!-- .container -->
</footer>
