<?php
/**
 * Template Name: Principal Message
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / About Us / Principal Message</p>
        <h1>Principal Message</h1>
        <p>A message from Mrs. Priyanka Singh, Principal, Varanasi Public School.</p>
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
            <a href="<?php echo esc_url( home_url( '/principal-message/' ) ); ?>" class="active">Principal Message</a>
            <a href="<?php echo esc_url( home_url( '/siksha-samity/' ) ); ?>">Shiksha Samity</a>
          </aside>

          <div class="content-stack">
            <div class="grid grid--2 align-center">
              <div class="card-media card-media--portrait reveal">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/WhatsApp Image 2026-05-11 at 7.35.32 PM.jpeg" alt="Mrs. Priyanka Singh, Principal">
                <div class="media-caption">
                  <h4>Mrs. Priyanka Singh</h4>
                  <p>Principal, Varanasi Public School</p>
                </div>
              </div>
              <div class="reveal">
                <h2 class="text-gradient">“सा विद्या या विमुक्तये।”</h2>
                <p class="lead" style="font-style: italic; color: var(--primary); margin-bottom: 1.5rem;">— Education is
                  that which liberates.</p>
                <div class="message-content" style="font-size: 1.05rem; line-height: 1.7; color: var(--text);">
                  <p>Education is about awakening – Awakening to the power and beauty that lies within all of us. To my
                    mind education is an idea, that is not just about brick, mortar, and concrete but about building
                    character, enriching minds, and about varied experiences that last a lifetime.</p>
                  <p>Shaping young impressionable minds is one of life’s biggest challenges so Varanasi Public School’s
                    vision is to give the students the all-around capability including creativity, observation, and
                    knowledge empowerment leading to the generation of excellent, performing citizens with sterling
                    character.</p>
                  <p>We, at Varanasi Public Schools, aim to empower our students to grow as individuals with strong open
                    discerning minds with an international perspective, preparing them to make a mark in the global
                    village – the world has come to be today.</p>
                  <p>My “DREAM” is to make every student a good, academically strong, and emotionally balanced human
                    being who is also a responsible citizen of India. To create an environment so healthy & safe that
                    our school becomes a home away from home for each of our faculty, staff, and students.</p>
                  <p>We provide an appealing and stimulating curriculum that is flexible and tailored to the needs of
                    each and every student as we strive for high educational outcomes and personal upliftment for all
                    our students. Our skilled, talented, and dedicated teachers ensure our students grow with confidence
                    and develop the skills for the rapidly changing 21st century.</p>
                  <div class="signature"
                    style="margin-top: 2rem; border-top: 1px solid rgba(0,0,0,0.1); padding-top: 1rem;">
                    <p>Best regards,</p>
                    <h3 style="color: var(--primary); font-family: 'Cinzel', serif;">Mrs. Priyanka Singh</h3>
                    <p>Principal<br>Varanasi Public School, Kerakatpur, Lohta</p>
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
