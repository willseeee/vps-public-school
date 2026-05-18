<?php
/**
 * Template Name: Admin Portal
 */

get_header(); ?>

<main>
    <section class="page-hero" style="padding: 10rem 0 12rem;">
      <div class="container">
        <h1 class="text-gradient">Administrative Gateway</h1>
        <p>Authorized access for institutional management and staff members only.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="login-container">
          <div class="login-card reveal">
            <div class="login-icon">
              <svg viewBox="0 0 24 24">
                <path
                  d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 6c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 12c-2.7 0-5.8-1.29-6-2.01V15c1.3-1.3 3.3-2 6-2s4.7.7 6 2v1.99c-.2.72-3.3 2.01-6 2.01z" />
              </svg>
            </div>
            <h2>Admin Login</h2>
            <p>Please enter your credentials to access the management dashboard.</p>

            <form>
              <div class="form-group">
                <label>Username / Email</label>
                <input type="text" class="form-control" placeholder="Enter your username">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="••••••••">
              </div>
              <button type="submit" class="button button--full">Login to Dashboard</button>
              <a href="#" class="forgot-pass">Forgot Password?</a>
            </form>

            <div class="admin-footer">
              <p>IP Address: 192.168.1.XX | Session: Secure</p>
              <p style="margin-top: 0.5rem;">Varanasi Public School Management System v4.2</p>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
