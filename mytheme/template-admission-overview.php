<?php
/**
 * Template Name: Admission Overview
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / Admission / Overview</p>
        <h1>Admission Overview</h1>
        <p>Your journey towards excellence begins here. Learn about our seamless admission process.</p>
      </div>
    </section>

    <section class="section section--soft">
      <div class="container">
        <div class="content-layout" style="display: block; max-width: 900px; margin: 0 auto;">
          <article class="content-section reveal">
            <div class="card-media"
              style="max-height: 500px; overflow: hidden; border-radius: var(--radius-lg); margin-bottom: 2rem;">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/Front Office (2).jpg" alt="Admission Support"
                style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <h2 class="text-gradient">Start Your Journey</h2>
            <p class="lead">We offer a transparent and parent-friendly admission process designed for clarity and ease
              at every step.</p>

            <div class="card glass" style="padding: 2.5rem; margin: 2rem 0;">
              <h3 style="margin-bottom: 1.5rem;">The Admission Process</h3>
              <ol class="list">
                <li style="margin-bottom: 1rem;"><strong>Step 1: Inquiry</strong><br>Submit an online enquiry or visit
                  our front office for a registration form.</li>
                <li style="margin-bottom: 1rem;"><strong>Step 2: Documentation</strong><br>Provide necessary student and
                  parent credentials including birth certificate and previous academic records.</li>
                <li style="margin-bottom: 1rem;"><strong>Step 3: Interaction</strong><br>Scheduled school interaction
                  for the student and a campus visit for the parents.</li>
                <li style="margin-bottom: 1rem;"><strong>Step 4: Admission</strong><br>Final documentation review and
                  fee submission to secure the seat.</li>
              </ol>
            </div>

            <div class="grid grid--2" style="margin-top: 3rem;">
              <div class="card glass" style="padding: 1.5rem;">
                <h4>Important Dates</h4>
                <p>Admission for the new academic session typically opens in December. Early registration is encouraged.
                </p>
              </div>
              <div class="card glass" style="padding: 1.5rem;">
                <h4>Age Criteria</h4>
                <p>Admissions are granted based on the age criteria specified by the CBSE guidelines for various
                  classes.</p>
              </div>
            </div>

            <div class="button-row" style="margin-top: 3rem; justify-content: center;">
              <button class="button button--lg enroll-trigger">Initiate Enrollment</button>
              <a class="button button--ghost button--lg" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Visit Campus</a>
            </div>
          </article>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
