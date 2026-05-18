<?php
/**
 * Template Name: Portal
 */

get_header(); ?>

<main>
    <section class="page-hero" style="padding: 10rem 0 12rem;">
      <div class="container">
        <p class="breadcrumb">Home / Digital Portal</p>
        <h1 class="text-gradient"
          style="background: linear-gradient(135deg, #fff, var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
          VPS Digital Portal</h1>
        <p style="max-width: 600px; margin: 0 auto;">Access all student services, academic records, and institutional
          verifications in one secure location.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="portal-grid">
          <!-- Card 1: TC Verification -->
          <article class="portal-card reveal">
            <div class="portal-icon">
              <svg viewBox="0 0 24 24">
                <path
                  d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
              </svg>
            </div>
            <h3>TC Verification</h3>
            <p>Verify the authenticity of Transfer Certificates (TC) issued by Varanasi Public School. Enter the TC
              number below.</p>
            <div class="search-box">
              <input type="text" placeholder="Enter TC Number (e.g. VPS/TC/2024/001)">
              <button class="search-btn">Verify</button>
            </div>
          </article>

          <!-- Card 2: Result Portal -->
          <article class="portal-card reveal">
            <div class="portal-icon">
              <svg viewBox="0 0 24 24">
                <path
                  d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" />
              </svg>
            </div>
            <h3>Academic Results</h3>
            <p>Access school examination results and CBSE board performance summaries for students.</p>
            <div class="search-box">
              <input type="text" placeholder="Enter Roll Number / Admission No.">
              <button class="search-btn">Check</button>
            </div>
            <a href="<?php echo esc_url( home_url( '/public-disclosure/#result' ) ); ?>"
              style="margin-top: 1.5rem; font-size: 0.9rem; color: var(--secondary); font-weight: 600;">View Board
              Result Summary &rarr;</a>
          </article>

          <!-- Card 3: Fee Submission -->
          <article class="portal-card reveal">
            <div class="portal-icon">
              <svg viewBox="0 0 24 24">
                <path
                  d="M21 18v1c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2V5c0-1.1.89-2 2-2h14c1.1 0 2 .9 2 2v1h-9c-1.11 0-2 .9-2 2v8c0 1.1.89 2 2 2h9zm-9-2h10V8H12v8zm4-2.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
              </svg>
            </div>
            <h3>Fee Submission</h3>
            <p>Pay school fees online securely using our digital payment gateway. Instant receipts generated.</p>
            <div class="search-box">
              <input type="text" placeholder="Enter Admission Number">
              <a href="<?php echo esc_url( home_url( '/fees-portal/' ) ); ?>" class="search-btn"
                style="text-decoration: none; display: flex; align-items: center; justify-content: center;">Pay Now</a>
            </div>
            <a href="<?php echo esc_url( home_url( '/fees-payment/' ) ); ?>"
              style="margin-top: 1.5rem; font-size: 0.9rem; color: var(--secondary); font-weight: 600;">Payment
              Guidelines & Bank Details &rarr;</a>
          </article>

          <!-- Card 4: Student Login -->
          <article class="portal-card reveal coming-soon">
            <div class="portal-icon">
              <svg viewBox="0 0 24 24">
                <path
                  d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
              </svg>
            </div>
            <h3>Student Login</h3>
            <p>Access personalized student dashboard, attendance records, and fee payment history.</p>
            <span class="coming-soon-badge">Coming Soon</span>
            <button class="button button--ghost" style="margin-top: 1.5rem; pointer-events: none;">Login Now</button>
          </article>
        </div>
      </div>
    </section>

    <section class="section section--soft" style="padding-top: 8rem;">
      <div class="container">
        <div class="section-heading center reveal">
          <h2 class="text-gradient">Need Assistance?</h2>
          <p>If you encounter any issues while using the digital portal or need to verify records manually, please
            contact our administrative office.</p>
          <div style="margin-top: 2rem; display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap;">
            <a href="tel:+917800007770" class="button">Call Support</a>
            <a href="mailto:vpslohta@gmail.com" class="button button--ghost">Email Admin</a>
          </div>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
