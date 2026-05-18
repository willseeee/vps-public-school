<?php
/**
 * Template Name: Contact
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / Contact</p>
        <h1>Contact</h1>
        <p>Reach the school office for enquiries, admissions, and general support.</p>
      </div>
    </section>
    <section class="section section--soft">
      <div class="container">
        <div class="grid grid--2">
          <article class="content-section reveal">
            <h2 class="text-gradient">Get in Touch</h2>
            <p>Have a question or want to visit our campus? Send us a message and our team will get back to you shortly.
            </p>

            <form id="contact-ajax-form" class="card glass" style="margin-top: 2rem; padding: 2rem;" novalidate>
              <div style="display: grid; gap: 1.5rem;">
                <div>
                  <label
                    style="display: block; font-weight: 700; margin-bottom: 0.5rem; font-size: 0.85rem; text-transform: uppercase; color: var(--primary);">Full
                    Name <span>*</span></label>
                  <input type="text" name="full_name" placeholder="Your Name" required
                    style="width: 100%; padding: 0.8rem; border-radius: var(--radius-sm); border: 1px solid var(--line); background: var(--bg);">
                  <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem; margin-top: 4px;">Please enter your full name.</span>
                </div>
                <div>
                  <label
                    style="display: block; font-weight: 700; margin-bottom: 0.5rem; font-size: 0.85rem; text-transform: uppercase; color: var(--primary);">Email
                    Address <span>*</span></label>
                  <input type="email" name="email" placeholder="Your Email" required
                    style="width: 100%; padding: 0.8rem; border-radius: var(--radius-sm); border: 1px solid var(--line); background: var(--bg);">
                  <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem; margin-top: 4px;">Please enter a valid email address.</span>
                </div>
                <div>
                  <label
                    style="display: block; font-weight: 700; margin-bottom: 0.5rem; font-size: 0.85rem; text-transform: uppercase; color: var(--primary);">Message <span>*</span></label>
                  <textarea name="message" placeholder="How can we help?" rows="4" required
                    style="width: 100%; padding: 0.8rem; border-radius: var(--radius-sm); border: 1px solid var(--line); background: var(--bg); resize: vertical;"></textarea>
                  <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem; margin-top: 4px;">Please enter your message.</span>
                </div>
                <div id="contact-form-status" style="display: none; padding: 10px 15px; border-radius: 4px; font-size: 0.85rem; margin-top: 5px; line-height: 1.4;"></div>
                <button type="submit" id="contact-submit-btn" class="button">Send Message</button>
              </div>
            </form>
          </article>

          <div class="content-stack">
            <article class="card glass reveal">
              <h3 class="text-gradient">School Office</h3>
              <ul class="list" style="list-style: none; padding: 0;">
                <li style="margin-bottom: 1.5rem; display: flex; gap: 1rem; align-items: flex-start;">
                  <span style="color: var(--secondary); display: flex; align-items: center; padding-top: 0.2rem;">
                    <svg viewBox="0 0 24 24" style="width: 24px; height: 24px; fill: currentColor;"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                  </span>
                  <span><strong>Address:</strong> Kerakatpur, Lohta Road, Varanasi (U.P.) - 221107</span>
                </li>
                <li style="margin-bottom: 1.5rem; display: flex; gap: 1rem; align-items: flex-start;">
                  <span style="color: var(--secondary); display: flex; align-items: center; padding-top: 0.2rem;">
                    <svg viewBox="0 0 24 24" style="width: 24px; height: 24px; fill: currentColor;"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                  </span>
                  <span><strong>Email:</strong> <a href="mailto:vpslohta@gmail.com">vpslohta@gmail.com</a></span>
                </li>
                <li style="margin-bottom: 1.5rem; display: flex; gap: 1rem; align-items: flex-start;">
                  <span style="color: var(--secondary); display: flex; align-items: center; padding-top: 0.2rem;">
                    <svg viewBox="0 0 24 24" style="width: 24px; height: 24px; fill: currentColor;"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                  </span>
                  <span><strong>Phone:</strong> <a href="tel:+917800007770">7800007770</a>, <a
                      href="tel:+919721525924">9721525924</a></span>
                </li>
              </ul>
            </article>

            <article class="card glass reveal" style="text-align: center; padding: 2rem;">
              <div style="margin-bottom: 1.5rem;">
                <!-- Note: Used a professional portrait placeholder since the image generator is currently unavailable -->
                <img src="<?php echo get_template_directory_uri(); ?>/assets/WhatsApp Image 2026-05-11 at 7.35.32 PM.jpeg" alt="Principal" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 4px solid var(--bg); box-shadow: 0 10px 20px rgba(0,0,0,0.1); margin: 0 auto; display: block;">
              </div>
              <h3 class="text-gradient" style="margin-bottom: 0.5rem; font-family: 'Cinzel', serif;">Our Principal</h3>
              <p style="font-weight: 700; color: var(--primary); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1rem;">Leadership & Vision</p>
              <p style="font-size: 0.95rem; color: var(--muted); font-style: italic; line-height: 1.6;">"We look forward to welcoming you to our campus and answering any questions you may have about your child's educational journey."</p>
            </article>

            <article class="card glass reveal">
              <h3 class="text-gradient">Follow Our Journey</h3>
              <p>Join our community on social media for daily updates and campus highlights.</p>
              <div class="contact-social-links" style="margin-top: 1.5rem; display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="https://www.facebook.com/vpslohta" target="_blank" rel="noreferrer"
                  class="button button--ghost button--sm">Facebook</a>
                <a href="https://www.instagram.com/varanasipublicschool.krp/" target="_blank" rel="noreferrer"
                  class="button button--ghost button--sm">Instagram</a>
                <a href="https://www.youtube.com/@vpslohta" target="_blank" rel="noreferrer"
                  class="button button--ghost button--sm">YouTube</a>
              </div>
            </article>

            <article class="card glass reveal">
              <h3 class="text-gradient">Quick Admission</h3>
              <p>Ready to join the VPS family? Start your registration online.</p>
              <a class="button button--sm" href="<?php echo esc_url( home_url( '/online-registration/' ) ); ?>" style="margin-top: 1rem;">Enroll Now</a>
            </article>
          </div>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="section-heading reveal">
          <p class="eyebrow">Find Us</p> <br>
          <h2 class="text-gradient">Our Location</h2>
        </div>
        <div class="card glass reveal" style="padding: 0.5rem; overflow: hidden; border-radius: var(--radius-lg);">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115421.18658340692!2d82.79532109726557!3d25.307157799999988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398e2d80875094d9%3A0x53856eea079e9a27!2sVaranasi%20Public%20School!5e0!3m2!1sen!2sin!4v1777545350147!5m2!1sen!2sin"
            width="100%" height="450" style="border:0; display: block;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contact-ajax-form');
    const submitBtn = document.getElementById('contact-submit-btn');
    const statusDiv = document.getElementById('contact-form-status');

    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();

            let isValid = true;
            const requiredFields = contactForm.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                const parent = field.closest('div');
                const errorSpan = parent ? parent.querySelector('.error-text') : null;
                
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#ef4444';
                    if (errorSpan) errorSpan.style.display = 'block';
                } else {
                    field.style.borderColor = 'var(--line)';
                    if (errorSpan) errorSpan.style.display = 'none';
                }
            });

            // Email check
            const emailField = contactForm.querySelector('input[name="email"]');
            if (emailField && emailField.value.trim()) {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const parent = emailField.closest('div');
                const errorSpan = parent ? parent.querySelector('.error-text') : null;
                
                if (!emailPattern.test(emailField.value.trim())) {
                    isValid = false;
                    emailField.style.borderColor = '#ef4444';
                    if (errorSpan) {
                        errorSpan.textContent = 'Please enter a valid email address.';
                        errorSpan.style.display = 'block';
                    }
                }
            }

            if (!isValid) {
                const firstInvalid = contactForm.querySelector('[style*="#ef4444"]');
                if (firstInvalid) firstInvalid.focus();
                return;
            }

            // Show loading
            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending Message...';
            statusDiv.style.display = 'block';
            statusDiv.style.background = 'rgba(59, 130, 246, 0.1)';
            statusDiv.style.color = '#2563eb';
            statusDiv.style.border = '1px solid rgba(59, 130, 246, 0.2)';
            statusDiv.textContent = 'Sending your message securely, please wait...';

            const formData = new FormData(contactForm);
            formData.append('action', 'submit_contact');
            formData.append('nonce', vps_ajax.nonce);

            fetch(vps_ajax.ajax_url, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    statusDiv.style.background = 'rgba(34, 197, 94, 0.1)';
                    statusDiv.style.color = '#16a34a';
                    statusDiv.style.border = '1px solid rgba(34, 197, 94, 0.2)';
                    statusDiv.textContent = data.data.message || 'Message sent successfully!';
                    
                    contactForm.reset();
                    submitBtn.textContent = 'Send Message';
                    submitBtn.disabled = false;
                    
                    setTimeout(() => {
                        statusDiv.style.display = 'none';
                    }, 8000);
                } else {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Send Message';
                    statusDiv.style.background = 'rgba(239, 68, 68, 0.1)';
                    statusDiv.style.color = '#dc2626';
                    statusDiv.style.border = '1px solid rgba(239, 68, 68, 0.2)';
                    statusDiv.textContent = data.data.message || 'An error occurred. Please try again.';
                }
            })
            .catch(error => {
                console.error('Error sending message:', error);
                submitBtn.disabled = false;
                submitBtn.textContent = 'Send Message';
                statusDiv.style.background = 'rgba(239, 68, 68, 0.1)';
                statusDiv.style.color = '#dc2626';
                statusDiv.style.border = '1px solid rgba(239, 68, 68, 0.2)';
                statusDiv.textContent = 'Network error. Please check your internet connection.';
            });
        });
    }
});
</script>

<?php get_footer(); ?>
