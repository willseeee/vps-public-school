<?php if ( ! is_page_template( 'template-registration.php' ) ) : ?>
<footer class="footer">
    <div class="container">
      <div class="footer__grid">
        <div class="footer__col footer__brand">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="VPS logo">
          <strong>Varanasi Public School</strong>
          <p>A Co-Educational Senior Secondary School, Affiliated to CBSE (5+3+3+4), New Delhi</p>
          <p><small>School No.: 71322 | Affiliation No.: 210678</small></p>
        </div>

        <div class="footer__col">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
            <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About School</a></li>
            <li><a href="<?php echo esc_url( home_url( '/admission-overview/' ) ); ?>">Admission Guide</a></li>
            <li><a href="<?php echo esc_url( home_url( '/facilities/' ) ); ?>">Campus Facilities</a></li>
            <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a></li>
          </ul>
        </div>

        <div class="footer__col">
          <h4>Student Hub</h4>
          <ul>
            <li><a href="<?php echo esc_url( home_url( '/portal/' ) ); ?>">Digital Portal</a></li>
            <li><a href="<?php echo esc_url( home_url( '/results-portal/' ) ); ?>">Board Results</a></li>
            <li><a href="<?php echo esc_url( home_url( '/tc-verification/' ) ); ?>">TC Verification</a></li>
            <li><a href="<?php echo esc_url( home_url( '/fees-portal/' ) ); ?>">Online Fees</a></li>
            <li><a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">Photo Gallery</a></li>
          </ul>
        </div>

        <div class="footer__col">
          <h4>Institutional</h4>
          <ul>
            <li><a href="<?php echo esc_url( home_url( '/academic-resources/' ) ); ?>">Academic Resources</a></li>
            <li><a href="<?php echo esc_url( home_url( '/achievement/' ) ); ?>">Achievements</a></li>
            <li><a href="<?php echo esc_url( home_url( '/career/' ) ); ?>">Career at VPS</a></li>
            <li><a href="<?php echo esc_url( home_url( '/download/' ) ); ?>">Downloads</a></li>
            <li><a href="<?php echo esc_url( home_url( '/cbse-details/' ) ); ?>">CBSE Disclosure</a></li>
          </ul>
        </div>
      </div>

      <div class="footer__bottom">
        <p>&copy; <span id="year"></span> Varanasi Public School. All rights reserved.</p>
        <p>Crafting Future Leaders</p>
      </div>
    </div>
  </footer>
<?php endif; ?>

  <?php wp_footer(); ?>

</body>

</html>
