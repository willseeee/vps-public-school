<?php
/**
 * Template Name: Academic Resources
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / Download / Academic Resources</p>
        <h1>Academic Resources</h1>
        <p>Curriculum guides, learning objectives, and school calendars.</p>
      </div>
    </section>

    <section class="section section--soft">
      <div class="container">
        <div class="section-heading reveal">
          <p class="eyebrow">Academic Excellence</p>
          <h2 class="text-gradient">Curriculum & Calendar</h2>
          <p>Stay informed about the current session's academic milestones and detailed class-wise syllabus.</p>
        </div>

        <div class="grid grid--2">
          <article class="card glass reveal" style="padding: 4rem 2rem; text-align: center;">
            <div class="doc-icon"
              style="width: 80px; height: 80px; background: rgba(212, 175, 55, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem;">
              <svg viewBox="0 0 24 24" style="width: 40px; height: 40px; fill: var(--secondary);">
                <path d="M13,12H11V10H13M13,16H11V14H13M17,4H15V3H13V4H11V3H9V4H7V3H5V21H19V3H17M17,19H7V6H17V19Z" />
              </svg>
            </div>
            <h2 class="text-gradient" style="font-family: 'Cinzel', serif; margin-bottom: 1.5rem;">Academic Syllabus
            </h2>
            <p style="margin-bottom: 2rem; font-size: 1.1rem; color: var(--muted);">Download class-wise detailed
              syllabus, learning objectives, and academic roadmaps for the current session.</p>
            <a href="#" class="button button--ghost" style="padding: 1rem 3rem;">Browse Syllabus</a>
          </article>

          <article class="card glass reveal" style="padding: 4rem 2rem; text-align: center;">
            <div class="doc-icon"
              style="width: 80px; height: 80px; background: rgba(212, 175, 55, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem;">
              <svg viewBox="0 0 24 24" style="width: 40px; height: 40px; fill: var(--secondary);">
                <path
                  d="M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.11,3 19,3H18V1M17,12H12V17H17V12Z" />
              </svg>
            </div>
            <h2 class="text-gradient" style="font-family: 'Cinzel', serif; margin-bottom: 1.5rem;">School Calendar</h2>
            <p style="margin-bottom: 2rem; font-size: 1.1rem; color: var(--muted);">Stay updated with the latest event
              schedule, holiday list, and important institutional dates for the academic year.</p>
            <a href="<?php echo get_template_directory_uri(); ?>/assets/VPS%20Lohta%20Calender-2026.pdf" class="button button--ghost"
              style="padding: 1rem 3rem;" target="_blank">Download Calendar</a>
          </article>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
