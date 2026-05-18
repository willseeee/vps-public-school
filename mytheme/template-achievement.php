<?php
/**
 * Template Name: Achievement
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / Achievement</p>
        <h1>Achievement</h1>
        <p>Showcasing excellence in academics, co-curricular performance, discipline, and student growth.</p>
      </div>
    </section>
    <section class="section section--soft">
      <div class="container">
        <div class="section-heading reveal">
          <p class="eyebrow">Legacy of Excellence</p>
          <h2 class="text-gradient">Celebrating Institutional Milestones</h2>
          <p>From academic brilliance to sporting triumphs, our students continue to raise the bar of excellence every
            year.</p>
        </div>

        <div class="grid grid--3">
          <article class="card glass reveal" style="padding: 2rem; border-top: 4px solid var(--secondary);">
            <div class="card-media" style="margin-bottom: 1.5rem; border-radius: var(--radius-sm);">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/10. Class Room 02.jpg" alt="Academic Excellence">
            </div>
            <h3 class="text-gradient">Academic Brilliance</h3>
            <p>Our students consistently achieve top ranks in CBSE board examinations, reflecting our commitment to
              rigorous academic standards and personalized mentorship.</p>
          </article>

          <article class="card glass reveal" style="padding: 2rem; border-top: 4px solid var(--secondary);">
            <div class="card-media" style="margin-bottom: 1.5rem; border-radius: var(--radius-sm);">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/02 MPH Hall.jpg" alt="Co-Curricular Triumphs">
            </div>
            <h3 class="text-gradient">Co-Curricular Triumphs</h3>
            <p>VPS students shine in inter-school competitions, ranging from debate and drama to music and arts,
              showcasing their multifaceted talents on various stages.</p>
          </article>

          <article class="card glass reveal" style="padding: 2rem; border-top: 4px solid var(--secondary);">
            <div class="card-media" style="margin-bottom: 1.5rem; border-radius: var(--radius-sm);">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/06. School Gallery.jpg" alt="Sporting Glory">
            </div>
            <h3 class="text-gradient">Sporting Glory</h3>
            <p>Our athletes have secured numerous medals at district and state-level sports meets, demonstrating
              exceptional sportsmanship, discipline, and physical prowess.</p>
          </article>
        </div>

        <div class="card glass reveal" style="margin-top: 4rem; padding: 3rem; text-align: center;">
          <h2 class="text-gradient">Character & Leadership</h2>
          <p style="max-width: 800px; margin: 1rem auto;">Beyond medals and ranks, our greatest achievement is the
            character of our students. We foster leaders who are empathetic, responsible, and ready to contribute
            positively to society.</p>
          <div class="button-row" style="justify-content: center; margin-top: 2rem;">
            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="button">Our Philosophy</a>
            <a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" class="button button--ghost">View Gallery</a>
          </div>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
