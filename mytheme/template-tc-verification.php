<?php
/**
 * Template Name: Tc Verification
 */

$tc_result = null;
$error_message = '';

if (isset($_POST['verify_tc'])) {
    $admission_no = sanitize_text_field($_POST['admission_no']);

    if (empty($admission_no)) {
        $error_message = 'Please enter an Admission Number.';
    } else {
        $args = array(
            'post_type'      => 'tc',
            'posts_per_page' => 1,
            'meta_query'     => array(
                array(
                    'key'     => '_tc_admission_no',
                    'value'   => $admission_no,
                    'compare' => '=',
                ),
            ),
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            $query->the_post();
            $tc_result = array(
                'admission_no' => get_post_meta(get_the_ID(), '_tc_admission_no', true),
                'pdf_url'      => get_post_meta(get_the_ID(), '_tc_pdf_file', true),
            );
            wp_reset_postdata();
        } else {
            $error_message = 'No certificate found. Please verify details.';
        }
    }
}

get_header(); ?>

<style>
    .verification-container {
      max-width: 600px;
      margin: -8rem auto 6rem;
      position: relative;
      z-index: 10;
    }

    .verification-card {
      background: #fff;
      border-radius: var(--radius-lg);
      padding: 4rem 3rem;
      box-shadow: var(--shadow-xl);
      border: 1px solid var(--line);
      text-align: center;
    }

    .v-icon {
      width: 80px;
      height: 80px;
      background: rgba(212, 175, 55, 0.1);
      color: var(--secondary);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 2rem;
    }

    .v-icon svg {
      width: 40px;
      height: 40px;
      fill: currentColor;
    }

    .verification-card h2 {
      font-family: "Cinzel", serif;
      color: var(--primary);
      margin-bottom: 1rem;
      font-size: 2rem;
      text-transform: uppercase;
    }

    .verification-card p {
      color: var(--muted);
      margin-bottom: 2.5rem;
      line-height: 1.6;
    }

    .search-box-v2 {
      display: flex;
      flex-direction: column;
      gap: 1.2rem;
    }

    .search-box-v2 .input-group {
        display: flex;
        gap: 1rem;
    }

    .search-box-v2 input {
      flex: 1;
      padding: 1rem 1.5rem;
      border: 1px solid var(--line);
      border-radius: var(--radius-sm);
      font-family: inherit;
      background: #f8faff;
      font-size: 1rem;
    }

    .v-help {
      margin-top: 3rem;
      font-size: 0.9rem;
      color: var(--muted);
      padding: 1.5rem;
      background: #f8faff;
      border-radius: var(--radius-sm);
      text-align: left;
    }

    .pdf-viewer-wrap {
        margin-top: 4rem;
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 6rem;
    }

    @media (max-width: 600px) {
        .search-box-v2 .input-group {
            flex-direction: column;
        }
    }
</style>

<main>
    <section class="page-hero" style="padding: 10rem 0 12rem;">
      <div class="container">
        <h1 class="text-gradient">TC Verification Tool</h1>
        <p>Public access system to validate institucional records.</p>
      </div>
    </section>

    <section class="section" style="padding-top: 0;">
      <div class="container">
        <div class="verification-container">
          <div class="verification-card reveal active">
            <div class="v-icon">
              <svg viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
              </svg>
            </div>
            <h2>Verify Certificate</h2>
            <p>Enter the student's Admission Number to verify authenticity.</p>

            <?php if ($error_message) : ?>
                <div style="color: var(--accent); margin-bottom: 1.5rem; font-weight: 600;"><?php echo esc_html($error_message); ?></div>
            <?php endif; ?>

            <form method="POST" class="search-box-v2" action="#pdf-result">
                <div class="input-group">
                    <input type="text" name="admission_no" placeholder="Admission No." value="<?php echo isset($_POST['admission_no']) ? esc_attr($_POST['admission_no']) : ''; ?>" required>
                </div>
                <button type="submit" name="verify_tc" class="button" style="width: 100%; padding: 1.2rem;">VERIFY NOW</button>
            </form>

            <div class="v-help">
              <strong>Need help?</strong> If the certificate is not found or details are mismatched, please contact the school office immediately for manual verification.
            </div>
          </div>
        </div>

        <?php if ($tc_result) : ?>
        <div id="pdf-result" class="pdf-viewer-wrap reveal active">
            <div style="background: white; padding: 1.5rem; border-radius: var(--radius-lg); box-shadow: var(--shadow-xl); border: 1px solid var(--line);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; border-bottom: 1px solid var(--line); padding-bottom: 1rem;">
                    <h3 style="font-family: 'Cinzel', serif; color: var(--primary); margin: 0;">Admission No: <?php echo esc_html($tc_result['admission_no']); ?></h3>
                    <a href="<?php echo esc_url($tc_result['pdf_url']); ?>" class="button button--sm" target="_blank" download>DOWNLOAD TC</a>
                </div>
                <div style="height: 900px; background: #525659; border-radius: var(--radius-sm); overflow: hidden;">
                    <embed src="<?php echo esc_url($tc_result['pdf_url']); ?>" type="application/pdf" width="100%" height="100%" />
                </div>
            </div>
        </div>
        <?php endif; ?>

      </div>
    </section>
</main>

<?php get_footer(); ?>
