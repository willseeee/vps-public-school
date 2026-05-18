<?php
/**
 * Template Name: Manager Message
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / About Us / Manager Message</p>
        <h1>Manager Message</h1>
        <p>A message from our visionary leader, Mrs. Divya Pandey.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="content-layout">
          <aside class="side-menu">
            <h3>In This Section</h3>
            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About the School</a>
            <a href="<?php echo esc_url( home_url( '/mission-vision/' ) ); ?>">Mission & Vision</a>
            <a href="<?php echo esc_url( home_url( '/manager-message/' ) ); ?>" class="active">Manager Message</a>
            <a href="<?php echo esc_url( home_url( '/principal-message/' ) ); ?>">Principal Message</a>
            <a href="<?php echo esc_url( home_url( '/siksha-samity/' ) ); ?>">Shiksha Samity</a>
          </aside>

          <div class="content-stack">
            <div class="grid grid--2 align-center">
              <div class="card-media card-media--portrait reveal">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/Divya Pandey - Manager VPs Group.jpg"
                  alt="Mrs. Divya Pandey, Manager">
                <div class="media-caption">
                  <h4>Mrs. Divya Pandey</h4>
                  <p>Manager, Varanasi Public Group of Education</p>
                </div>
              </div>
              <div class="reveal">
                <h2 class="text-gradient">Dear Students, Parents, and Well-Wishers,</h2>
                <div class="message-content" style="font-size: 1.1rem; line-height: 1.8; color: var(--text);">
                  <p>Welcome to Varanasi Public School, Kerakatpur, where education goes beyond textbooks to shape
                    responsible, confident, and capable individuals. Our institution is committed to providing a
                    nurturing environment where students can develop academically, socially, and morally.</p>
                  <p>At VPS Kerakatpur, we believe that education is not just about acquiring knowledge but also about
                    instilling values, discipline, and a passion for lifelong learning. Our dedicated faculty and staff
                    work tirelessly to create an atmosphere that encourages innovation, curiosity, and excellence.</p>
                  <p>We take pride in offering a balanced curriculum that integrates academics, co-curricular
                    activities, and character-building programs. Our mission is to prepare students to face the
                    challenges of the future with confidence and integrity.</p>
                  <p>I extend my heartfelt gratitude to our teachers, parents, and students for their continuous support
                    and dedication. Together, let us strive for excellence and make learning a joyful and meaningful
                    journey.</p>
                  <div class="signature" style="margin-top: 2rem;">
                    <p>Warm regards,</p>
                    <h3 style="color: var(--primary); font-family: 'Cinzel', serif;">Mrs. Divya Pandey</h3>
                    <p>Manager<br>Varanasi Public Group of Education</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
