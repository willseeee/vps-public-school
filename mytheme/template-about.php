<?php
/**
 * Template Name: About
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / About Us</p>
        <h1>About Us</h1>
        <p>Learn about the school, its guiding vision, leadership messages, and the Varanasi Shiksha Samiti behind VPS.
        </p>
      </div>
    </section>

    <section class="section section--soft">
      <div class="container">
        <div class="content-layout">
          <aside class="side-menu reveal">
            <h3>In This Section</h3>
            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="active">About the School</a>
            <a href="<?php echo esc_url( home_url( '/mission-vision/' ) ); ?>">Mission & Vision</a>
            <a href="<?php echo esc_url( home_url( '/manager-message/' ) ); ?>">Manager Message</a>
            <a href="<?php echo esc_url( home_url( '/principal-message/' ) ); ?>">Principal Message</a>
            <a href="<?php echo esc_url( home_url( '/siksha-samity/' ) ); ?>">Shiksha Samity</a>
          </aside>

          <div class="content-stack">
            <article class="content-section reveal" id="school">
              <h2 class="text-gradient">About the School</h2>
              <img
                style="border-radius: var(--radius-lg); width: 100%; height: auto; margin: 0 auto 2rem auto; object-fit: cover; box-shadow: var(--shadow-lg);"
                src="<?php echo get_template_directory_uri(); ?>/assets/facilities/06. School Gallery.jpg" alt="Varanasi Public School">
              <p class="lead">Varanasi Public School (VPS), located in Kerakatpur, Lohta Road, Varanasi, is a
                co-educational institution affiliated with the Central Board of Secondary Education (CBSE).</p>

              <div class="card glass reveal" style="padding: 2.5rem; margin: 2rem 0;">
                <p>Established in 2003, VPS offers education from Nursery to Class 12, with streams in Science (PCM &
                  PCB), Commerce, and Arts. The school is managed by the Varanasi Shiksha Samiti and is dedicated to
                  providing a holistic learning experience.</p>
                <p>VPS focuses on academic excellence, co-curricular activities, and the overall development of
                  students. The campus features modern facilities, including well-equipped classrooms, advanced
                  laboratories, a library, and provisions for various indoor and outdoor sports.</p>
              </div>

              <div class="contact-info-box card glass reveal"
                style="padding: 2rem; background: var(--bg-soft); border-left: 5px solid var(--primary);">
                <h3 class="text-gradient" style="margin-bottom: 1rem;">Contact & Inquiries</h3>
                <p>For more information or inquiries, contact Varanasi Public School at:</p>
                <ul class="list" style="color: var(--text);">
                  <li><strong>Phone:</strong> +91 7800007770</li>
                  <li><strong>Email:</strong> vpslohta@gmail.com</li>
                  <li><strong>Location:</strong> Kerakatpur, Lohta Road, Varanasi-221107</li>
                </ul>
              </div>
            </article>

            <article class="card glass reveal" style="text-align: center; padding: 2rem; margin-bottom: 2rem;">
              <div style="margin-bottom: 1.5rem;">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/WhatsApp Image 2026-05-11 at 7.35.32 PM.jpeg" alt="Principal"
                  style="width: 150px; height: 150px; border-radius: 50%; object-fit: contain; border: 4px solid var(--bg); box-shadow: 0 10px 20px rgba(0,0,0,0.1); margin: 0 auto; display: block;">
              </div>
              <h3 class="text-gradient" style="margin-bottom: 0.5rem; font-family: 'Cinzel', serif;">Our Principal</h3>
              <p
                style="font-weight: 700; color: var(--primary); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1rem;">
                Leadership & Vision</p>
              <p style="font-size: 0.95rem; color: var(--muted); font-style: italic; line-height: 1.6;">"We look forward
                to welcoming you to our campus and answering any questions you may have about your child's educational
                journey."</p>
              <a href="<?php echo esc_url( home_url( '/principal-message/' ) ); ?>" class="button button--ghost"
                style="margin-top: 1.5rem; display: inline-block;">Read Full Message</a>
            </article>

            <article class="card glass reveal" id="disclosure">
              <h2 class="text-gradient">Public Disclosure</h2>
              <p>In accordance with CBSE guidelines, we maintain full transparency regarding our institutional and
                administrative compliance. Detailed records are available for public viewing.</p>
              <a class="button" href="<?php echo esc_url( home_url( '/public-disclosure/' ) ); ?>">View Disclosures</a>
            </article>
          </div>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
