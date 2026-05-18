<?php
/**
 * Template Name: Career
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / Career</p>
        <h1>Career</h1>
        <p>A focused recruitment page inspired by the reference career layout, adapted for Varanasi Public School.</p>
      </div>
    </section>
    <section class="section section--soft">
      <div class="container">
        <div class="section-heading reveal">
          <p class="eyebrow">Join Our Mission</p>
          <h2 class="text-gradient">Shape the Future of Education</h2>
          <p>We are always looking for passionate educators and professionals who are dedicated to nurturing the next
            generation of leaders.</p>
        </div>

        <div class="grid grid--2">
          <article class="content-section reveal">
            <div class="card-media">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/DSC01189.jpg" alt="Work Environment">
            </div>
            <h2 class="text-gradient">Why Work with VPS?</h2>
            <p>At Varanasi Public School, we provide more than just a job; we offer a platform for growth, innovation,
              and impact.</p>
            <div class="card glass" style="margin-top: 1.5rem; padding: 1.5rem;">
              <ul class="list">
                <li>Collaborative and supportive work culture.</li>
                <li>Opportunities for professional development.</li>
                <li>Modern infrastructure and teaching tools.</li>
                <li>Competitive benefits and institutional stability.</li>
              </ul>
            </div>
          </article>

          <article class="content-section reveal">
            <div class="card-media">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/Front Office (1).jpg" alt="Application Process">
            </div>
            <h2 class="text-gradient">How to Apply</h2>
            <p>We invite applications for both teaching and administrative positions. Interested candidates can follow
              the steps below:</p>
            <div class="card glass" style="margin-top: 1.5rem; padding: 1.5rem;">
              <ol class="list">
                <li>Prepare your updated CV and a cover letter.</li>
                <li>Mention the position you are applying for in the subject.</li>
                <li>Email your documents to our recruitment team.</li>
                <li>Shortlisted candidates will be contacted for an interview.</li>
              </ol>
            </div>
            <div class="button-row" style="margin-top: 2rem;">
              <a class="button"
                href="mailto:vpslohta@gmail.com?subject=Career%20Application%20-%20Varanasi%20Public%20School">Mail Your
                Resume</a>
              <a class="button button--ghost" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Office</a>
            </div>
          </article>
        </div>

        <div class="card glass reveal" style="margin-top: 4rem; padding: 3rem; text-align: center;">
          <h2 class="text-gradient">Current Openings</h2>
          <p style="max-width: 800px; margin: 1rem auto;">While we may not have specific vacancies at this moment, we
            maintain a talent pool for future opportunities. Feel free to share your profile with us.</p>
          <div class="grid grid--3" style="margin-top: 2rem; text-align: left;">
            <div class="card glass" style="padding: 1rem; border-left: 4px solid var(--secondary);">
              <h4 style="margin: 0;">PGT / TGT Teachers</h4>
              <small>All Subjects</small>
            </div>
            <div class="card glass" style="padding: 1rem; border-left: 4px solid var(--secondary);">
              <h4 style="margin: 0;">Admin Staff</h4>
              <small>Accounts / Front Desk</small>
            </div>
            <div class="card glass" style="padding: 1rem; border-left: 4px solid var(--secondary);">
              <h4 style="margin: 0;">Support Staff</h4>
              <small>Lab Assistants / Sports</small>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
