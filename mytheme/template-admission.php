<?php
/**
 * Template Name: Admission
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / Admission</p>
        <h1>Admission Portal</h1>
        <p>Everything you need to know about joining the Varanasi Public School family.</p>
      </div>
    </section>

    <section class="section section--soft">
      <div class="container">
        <div class="section-heading reveal">
          <p class="eyebrow">Your Path to Excellence</p>
          <h2 class="text-gradient">Admission Resources</h2>
          <p>Please select a section below to find detailed information regarding our admission process, fee policies,
            and institutional rules.</p>
        </div>

        <div class="grid grid--3">
          <article class="card glass reveal">
            <div class="card-media" style="height: 200px;">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/Front Office (2).jpg" alt="Admission Overview">
            </div>
            <div style="padding: 1.5rem;">
              <h3 class="text-gradient">Admission Overview</h3>
              <p>Learn about our step-by-step admission process, eligibility criteria, and how to register your child.
              </p>
              <a href="<?php echo esc_url( home_url( '/admission-overview/' ) ); ?>" class="button button--sm" style="margin-top: 1rem;">View Overview</a>
            </div>
          </article>

          <article class="card glass reveal">
            <div class="card-media" style="height: 200px;">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/10. Class Room 03.jpg" alt="Fee Structure">
            </div>
            <div style="padding: 1.5rem;">
              <h3 class="text-gradient">Fee Structure</h3>
              <p>Find detailed information about our transparent fee structure and digital payment convenience.</p>
              <a href="<?php echo esc_url( home_url( '/fee-structure/' ) ); ?>" class="button button--sm" style="margin-top: 1rem;">View Fees</a>
            </div>
          </article>

          <article class="card glass reveal">
            <div class="card-media" style="height: 200px;">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/06. School Gallery.jpg" alt="School Rules">
            </div>
            <div style="padding: 1.5rem;">
              <h3 class="text-gradient">School Rules</h3>
              <p>Read our institutional guidelines, code of conduct, and disciplinary policies for students.</p>
              <a href="<?php echo esc_url( home_url( '/school-rules/' ) ); ?>" class="button button--sm" style="margin-top: 1rem;">View Rules</a>
            </div>
          </article>
        </div>

        <div class="card glass reveal" style="margin-top: 4rem; padding: 3rem; text-align: center;">
          <h2 class="text-gradient">Ready to Join Us?</h2>
          <p style="max-width: 600px; margin: 1rem auto 2rem;">Initiate the enrollment process today by filling out our
            online application form. Our team will guide you through the next steps.</p>
          <a href="<?php echo esc_url( home_url( '/online-registration/' ) ); ?>" class="button button--lg">Apply for Admission</a>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
