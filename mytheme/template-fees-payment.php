<?php
/**
 * Template Name: Fees Payment
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / Fees Payment</p>
        <h1>Fees Payment</h1>
        <p>Convenient fee payment guidance with direct access to the online student fee portal.</p>
      </div>
    </section>
    <section class="section section--soft">
      <div class="container">
        <div class="section-heading reveal">
          <p class="eyebrow">Financial Services</p>
          <h2 class="text-gradient">Secure & Convenient Fee Payment</h2>
          <p>We offer a streamlined digital payment experience for parents, ensuring transparency and ease of
            transactions.</p>
        </div>

        <div class="grid grid--2">
          <article class="content-section reveal">
            <div class="card-media">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/Front Office (2).jpg" alt="Online Payment">
            </div>
            <h2 class="text-gradient">Digital Payment Portal</h2>
            <p>Access our secure online fee portal powered by Edunext. You can pay using UPI, Credit/Debit Cards, or Net
              Banking from the comfort of your home.</p>
            <div class="button-row" style="margin-top: 2rem;">
              <a class="button" href="<?php echo esc_url( home_url( '/fees-portal/' ) ); ?>">Access Fee Portal</a>
              <a class="button button--ghost" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Payment Support</a>
            </div>
          </article>

          <article class="content-section reveal">
            <div class="card-media">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/Trasnports2.jpg" alt="Fee Guidance">
            </div>
            <h2 class="text-gradient">Payment Guidelines</h2>
            <p>To ensure a smooth academic journey, please adhere to the following financial policies:</p>
            <div class="card glass" style="margin-top: 1.5rem; padding: 1.5rem;">
              <ul class="list">
                <li><strong>Due Dates:</strong> Ensure payments are made by the specified deadlines.</li>
                <li><strong>Receipts:</strong> Digital receipts are generated instantly; please save them for your
                  records.</li>
                <li><strong>Late Fees:</strong> Late payments may attract a standard penalty as per school rules.</li>
                <li><strong>Assistance:</strong> For any discrepancies, please reach out to the accounts department.
                </li>
              </ul>
            </div>
          </article>
        </div>

        <div class="card glass reveal" style="margin-top: 4rem; padding: 3rem; text-align: center;">
          <h2 class="text-gradient">Bank Details for Direct Transfer</h2>
          <p style="margin-bottom: 2rem;">For direct bank transfers, please use the following details and share the
            transaction ID with the school office.</p>
          <div class="grid grid--3" style="text-align: left;">
            <div class="card glass" style="padding: 1.5rem;">
              <small style="text-transform: uppercase; letter-spacing: 0.1em; color: var(--secondary);">Account
                Name</small>
              <h4 style="margin: 0.5rem 0 0;">Varanasi Public School</h4>
            </div>
            <div class="card glass" style="padding: 1.5rem;">
              <small style="text-transform: uppercase; letter-spacing: 0.1em; color: var(--secondary);">Bank
                Name</small>
              <h4 style="margin: 0.5rem 0 0;">State Bank of India</h4>
            </div>
            <div class="card glass" style="padding: 1.5rem;">
              <small style="text-transform: uppercase; letter-spacing: 0.1em; color: var(--secondary);">IFSC
                Code</small>
              <h4 style="margin: 0.5rem 0 0;">SBIN00XXXXX</h4>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
