<?php
/**
 * Template Name: Download
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / Download</p>
        <h1>Download</h1>
        <p>Quick access to TC tools, syllabus files, and school calendar resources.</p>
      </div>
    </section>
    <section class="section section--soft">
      <div class="container">
        <div class="section-heading reveal">
          <p class="eyebrow">Resource Center</p>
          <h2 class="text-gradient">Student & Administrative Utilities</h2>
          <p>Access essential digital tools, academic resources, and institutional documents in one centralized
            location.</p>
        </div>

        <div class="disclosure-grid">
          <article class="doc-item glass reveal" id="tc">
            <div class="doc-icon">
              <svg viewBox="0 0 24 24">
                <path
                  d="M12,17A2,2 0 0,0 14,15C14,13.89 13.11,13 12,13A2,2 0 0,0 10,15C10,16.11 10.89,17 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.89,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
              </svg>
            </div>
            <h3>TC Verification</h3>
            <p>Access the public verification system to validate issued Transfer Certificates online through our secure
              database.</p>
            <a href="<?php echo esc_url( home_url( '/tc-verification/' ) ); ?>" class="button button--ghost button--sm">Verify Certificate</a>
          </article>

          <article class="doc-item glass reveal" id="academic">
            <div class="doc-icon">
              <svg viewBox="0 0 24 24">
                <path d="M13,12H11V10H13M13,16H11V14H13M17,4H15V3H13V4H11V3H9V4H7V3H5V21H19V3H17M17,19H7V6H17V19Z" />
              </svg>
            </div>
            <h3>Academic Resources</h3>
            <p>Download the latest academic syllabus, learning objectives, and the comprehensive school calendar.</p>
            <a href="<?php echo esc_url( home_url( '/academic-resources/' ) ); ?>" class="button button--ghost button--sm">View Resources</a>
          </article>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
