<?php
/**
 * Template Name: Tc Portal
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / Download / TC Portal</p>
        <h1>TC Portal</h1>
        <p>Administrative and public tools for student transfer certificates.</p>
      </div>
    </section>

    <section class="section section--soft">
      <div class="container">
        <div class="section-heading reveal">
          <p class="eyebrow">Digital Gateway</p>
          <h2 class="text-gradient">Transfer Certificate Services</h2>
          <p>Access our secure administrative portal or verify issued certificates using our public verification tool.
          </p>
        </div>

        <div class="grid grid--2">
          <article class="card glass reveal" style="padding: 4rem 2rem; text-align: center;">
            <div class="doc-icon"
              style="width: 80px; height: 80px; background: rgba(212, 175, 55, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem;">
              <svg viewBox="0 0 24 24" style="width: 40px; height: 40px; fill: var(--secondary);">
                <path
                  d="M12,17A2,2 0 0,0 14,15C14,13.89 13.11,13 12,13A2,2 0 0,0 10,15C10,16.11 10.89,17 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.89,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
              </svg>
            </div>
            <h2 class="text-gradient" style="font-family: 'Cinzel', serif; margin-bottom: 1.5rem;">TC Admin Portal</h2>
            <p style="margin-bottom: 2rem; font-size: 1.1rem; color: var(--muted);">Secure administrative gateway for
              processing and managing student transfer certificates. Authorized access only.</p>
            <a href="#" class="button button--ghost" style="padding: 1rem 3rem;">Admin Login</a>
          </article>

          <article id="verification" class="card glass reveal" style="padding: 4rem 2rem; text-align: center;">
            <div class="doc-icon"
              style="width: 80px; height: 80px; background: rgba(212, 175, 55, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem;">
              <svg viewBox="0 0 24 24" style="width: 40px; height: 40px; fill: var(--secondary);">
                <path
                  d="M15.5,14L20.5,19L19,20.5L14,15.5V14.71L13.73,14.43C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.43,13.73L14.71,14H15.5M9.5,14C11.99,14 14,11.99 14,9.5C14,7.01 11.99,5 9.5,5C7.01,5 5,7.01 5,9.5C5,11.99 7.01,14 9.5,14Z" />
              </svg>
            </div>
            <h2 class="text-gradient" style="font-family: 'Cinzel', serif; margin-bottom: 1.5rem;">TC Verification</h2>
            <p style="margin-bottom: 2rem; font-size: 1.1rem; color: var(--muted);">Public verification tool for
              validating transfer certificates issued by the institution. Ensure record authenticity.</p>
            <a href="#" class="button button--ghost" style="padding: 1rem 3rem;">Verify Now</a>
          </article>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
