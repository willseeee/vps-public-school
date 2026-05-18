<?php
/**
 * Template Name: Vps Samity
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / About Us / VPS Siksha Samity</p>
        <h1>VPS Siksha Samity</h1>
        <p>The esteemed managing body behind Varanasi Public School's success.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="content-layout">
          <aside class="side-menu">
            <h3>In This Section</h3>
            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About the School</a>
            <a href="<?php echo esc_url( home_url( '/mission-vision/' ) ); ?>">Mission & Vision</a>
            <a href="<?php echo esc_url( home_url( '/manager-message/' ) ); ?>">Manager Message</a>
            <a href="<?php echo esc_url( home_url( '/principal-message/' ) ); ?>">Principal Message</a>
            <a href="<?php echo esc_url( home_url( '/siksha-samity/' ) ); ?>" class="active">Shiksha Samity</a>
          </aside>

          <div class="content-stack">
            <img
              style="border-radius: var(--radius-lg); width: 100%; height: auto; margin: 0 auto 2rem auto; object-fit: cover; box-shadow: var(--shadow-lg);"
              src="<?php echo get_template_directory_uri(); ?>/assets/facilities/01. Auditoriam.jpg" alt="Varanasi Public School Auditorium">
            <div class="reveal">
              <h2 class="text-gradient">Varanasi Shiksha Samiti</h2>
              <p class="lead">Varanasi Shiksha Samiti is the esteemed managing body behind Varanasi Public School. The
                Samiti is dedicated to promoting quality education and nurturing young minds with strong moral values
                and modern knowledge.</p>

              <div class="card glass reveal"
                style="margin: 2rem 0; padding: 2.5rem; border-left: 5px solid var(--color-accent);">
                <p>Established with a vision to uplift educational standards in society, the Samiti has played a vital
                  role in the foundation and continuous development of the school. The institution reflects the
                  dedication, vision, and commitment of its members towards excellence in education.</p>
                <p>The foundation of the school under the guidance of the Samiti was laid by renowned educationist and
                  social worker <strong>Shri S. N. Pandey</strong>, whose mission was to create an institution that
                  blends academic excellence with character building.</p>
              </div>

              <div class="grid grid--2" style="margin-top: 3rem;">
                <div class="card glass reveal">
                  <h3 class="text-gradient">Vision of Siksha Samiti</h3>
                  <p>The Samiti envisions creating a progressive and inclusive educational environment where students
                    are encouraged to:</p>
                  <ul class="list">
                    <li>Think critically and independently</li>
                    <li>Develop creativity and leadership skills</li>
                    <li>Grow into responsible and global citizens</li>
                  </ul>
                </div>
                <div class="card glass reveal"
                  style="background: var(--bg-soft); border-top: 5px solid var(--primary);">
                  <h3 class="text-gradient" style="margin-bottom: 1rem;">Mission of Siksha Samiti</h3>
                  <ul class="list" style="color: var(--text);">
                    <li>To provide quality CBSE-based education with modern teaching methods</li>
                    <li>To ensure holistic development of students (academic + moral + social)</li>
                    <li>To create a safe, disciplined, and inspiring environment for learning</li>
                    <li>To promote values like integrity, tolerance, and responsibility</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
