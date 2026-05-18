<?php
/**
 * Template Name: Fee Structure
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / Admission / Fees</p>
        <h1>Fee Structure</h1>
        <p>Transparent pricing and digital payment guidance for our academic programs.</p>
      </div>
    </section>

    <section class="section section--soft">
      <div class="container">
        <div class="content-layout" style="display: block; max-width: 900px; margin: 0 auto;">
          <article class="content-section reveal">
            <div class="card-media"
              style="max-height: 400px; overflow: hidden; border-radius: var(--radius-lg); margin-bottom: 2rem;">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/10. Class Room 03.jpg" alt="VPS Classroom"
                style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <h2 class="text-gradient">Financial Guidelines</h2>
            <p>Our fee structure is transparent and designed to reflect the quality of education and facilities we
              provide. We aim to make the payment process as seamless as possible through our digital portal.</p>

            <div class="card glass" style="padding: 2.5rem; margin: 2rem 0;">
              <h3>Key Features</h3>
              <ul class="list" style="margin-top: 1.5rem;">
                <li style="margin-bottom: 1rem;"><strong>Digital Payments:</strong> Full convenience through our secure
                  online payment gateway.</li>
                <li style="margin-bottom: 1rem;"><strong>Transparency:</strong> Detailed breakdowns and instant digital
                  receipts for every transaction.</li>
                <li style="margin-bottom: 1rem;"><strong>Timely Updates:</strong> Regular notifications via SMS and
                  Email regarding deadlines and policy changes.</li>
              </ul>
            </div>

            <div class="info-alert"
              style="background: rgba(26, 54, 93, 0.05); border-left: 4px solid var(--secondary); padding: 1.5rem; border-radius: var(--radius-sm); margin: 2rem 0;">
              <p><strong>Note:</strong> Detailed class-wise fee charts are available at the school office. Please
                consult the administrative wing for specific scholarships or sibling discounts.</p>
            </div>

            <div class="button-row" style="margin-top: 3rem; justify-content: center;">
              <a class="button button--lg" href="<?php echo esc_url( home_url( '/fees-payment/' ) ); ?>">Proceed to Payment</a>
              <a class="button button--ghost button--lg" href="<?php echo esc_url( home_url( '/fees-portal/' ) ); ?>">Open Fee Portal</a>
            </div>
          </article>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
