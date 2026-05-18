<?php
/**
 * Template Name: Mission Vision
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / About Us / Mission & Vision</p>
        <h1>Mission & Vision</h1>
        <p>Defining our purpose and our commitment to the future of our students.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="content-layout">
          <aside class="side-menu">
            <h3>In This Section</h3>
            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About the School</a>
            <a href="<?php echo esc_url( home_url( '/mission-vision/' ) ); ?>" class="active">Mission & Vision</a>
            <a href="<?php echo esc_url( home_url( '/manager-message/' ) ); ?>">Manager Message</a>
            <a href="<?php echo esc_url( home_url( '/principal-message/' ) ); ?>">Principal Message</a>
            <a href="<?php echo esc_url( home_url( '/siksha-samity/' ) ); ?>">Shiksha Samity</a>
          </aside>

          <div class="content-stack">
            <img
              style="border-radius: var(--radius-lg); width: 100%; height: auto; margin: 0 auto 2rem auto; object-fit: cover; box-shadow: var(--shadow-lg);"
              src="<?php echo get_template_directory_uri(); ?>/assets/facilities/05 Library.jpg" alt="Varanasi Public School Library">
            <div class="grid grid--1">
              <div class="card glass reveal" style="padding: 3rem;">
                <div class="icon-box" style="margin-bottom: 1.5rem;">
                  <svg viewBox="0 0 24 24" width="48" height="48" fill="var(--accent)">
                    <path
                      d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" />
                  </svg>
                </div>
                <h2 class="text-gradient">Our Vision</h2>
                <p class="lead">To create a progressive and inclusive educational environment where students are
                  encouraged to think critically and independently.</p>
                <p>We envision an institution that goes beyond academic success to foster leadership, creativity, and a
                  sense of global citizenship. Our goal is to prepare students to face the challenges of the 21st
                  century with confidence and integrity, making meaningful contributions to the world around them.</p>
              </div>

              <div class="card glass reveal"
                style="padding: 3rem; margin-top: 2rem; background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%); border-left: 5px solid var(--primary);">
                <div class="icon-box" style="margin-bottom: 1.5rem;">
                  <svg viewBox="0 0 24 24" width="48" height="48" fill="var(--primary)">
                    <path
                      d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z" />
                  </svg>
                </div>
                <h2 class="text-gradient">Our Mission</h2>
                <ul class="list" style="font-size: 1.1rem; line-height: 1.8;">
                  <li><strong>Quality Education:</strong> To provide quality CBSE-based education with modern teaching
                    methods that inspire curiosity and excellence.</li>
                  <li><strong>Holistic Development:</strong> To ensure the holistic development of students, balancing
                    academic rigor with moral and social growth.</li>
                  <li><strong>Safe Environment:</strong> To create a safe, disciplined, and inspiring environment for
                    learning where every child feels valued.</li>
                  <li><strong>Core Values:</strong> To promote values like integrity, tolerance, and responsibility,
                    shaping the character of our future leaders.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
