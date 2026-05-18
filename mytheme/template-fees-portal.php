<?php
/**
 * Template Name: Fees Portal
 */

get_header(); ?>

<main>
    <section class="page-hero" style="padding: 10rem 0 12rem;">
      <div class="container">
        <p class="breadcrumb">Home / Digital Portal / Fee Submission</p>
        <h1 class="text-gradient"
          style="background: linear-gradient(135deg, #fff, var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
          Online Fee Submission</h1>
        <p>Securely submit your ward's school fees through our digital payment gateway.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="payment-container" style="max-width: 1000px; margin: 0 auto;">
          <!-- Marksheet/Receipt Display Slot -->
          <div id="receipt-display-wrapper" style="margin-bottom: 3rem; display: none;"></div>

          <div class="payment-grid" id="payment-main-grid">
            <div class="payment-form-card" style="opacity: 1 !important; display: block !important;">
              <h2 class="text-gradient" style="margin-bottom: 2rem; font-family: 'Cinzel', serif;">Student Details</h2>
              
              <form id="fee-submission-form" novalidate>
                <!-- Bulletproof routing details -->
                <input type="hidden" name="action" value="submit_fee_payment">
                <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'vps_enquiry_nonce' ); ?>">
                <input type="hidden" name="ajax_url" value="<?php echo admin_url( 'admin-ajax.php' ); ?>">
                <input type="hidden" name="payment_method" id="selected-payment-method" value="UPI / QR">

                <div class="grid grid--2">
                  <div class="form-group">
                    <label style="color: var(--primary) !important; font-weight: 700;">Admission Number <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="admission_no" class="form-control" placeholder="e.g. VPS/2024/001" required style="color: #1a1a1a !important; background: #ffffff !important; font-weight: 600; border: 1px solid var(--secondary);">
                    <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem; margin-top: 4px; font-weight: 600;">Please enter the student's admission number.</span>
                  </div>
                  <div class="form-group">
                    <label style="color: var(--primary) !important; font-weight: 700;">Student Name <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="student_name" class="form-control" placeholder="Full Name" required style="color: #1a1a1a !important; background: #ffffff !important; font-weight: 600; border: 1px solid var(--secondary);">
                    <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem; margin-top: 4px; font-weight: 600;">Please enter the student's full name.</span>
                  </div>
                </div>

                <div class="grid grid--2">
                  <div class="form-group">
                    <label style="color: var(--primary) !important; font-weight: 700;">Class & Section <span style="color: #ef4444;">*</span></label>
                    <select name="class_section" class="form-control" required style="color: #1a1a1a !important; background: #ffffff !important; font-weight: 600; border: 1px solid var(--secondary); cursor: pointer;">
                      <option value="">Select Class & Section</option>
                      <option value="Nursery">Nursery</option>
                      <option value="LKG">LKG</option>
                      <option value="UKG">UKG</option>
                      <option value="Class I - A">Class I - A</option>
                      <option value="Class I - B">Class I - B</option>
                      <option value="Class II - A">Class II - A</option>
                      <option value="Class II - B">Class II - B</option>
                      <option value="Class III - A">Class III - A</option>
                      <option value="Class IV - A">Class IV - A</option>
                      <option value="Class V - A">Class V - A</option>
                      <option value="Class VI - A">Class VI - A</option>
                      <option value="Class VII - A">Class VII - A</option>
                      <option value="Class VIII - A">Class VIII - A</option>
                      <option value="Class IX - A">Class IX - A</option>
                      <option value="Class X - A">Class X - A</option>
                      <option value="Class XI - A">Class XI - Science</option>
                      <option value="Class XI - B">Class XI - Commerce</option>
                      <option value="Class XII - A">Class XII - Science</option>
                      <option value="Class XII - B">Class XII - Commerce</option>
                    </select>
                    <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem; margin-top: 4px; font-weight: 600;">Please select the student's class and section.</span>
                  </div>
                  <div class="form-group">
                    <label style="color: var(--primary) !important; font-weight: 700;">Fee Category <span style="color: #ef4444;">*</span></label>
                    <select name="fee_category" class="form-control" required style="color: #1a1a1a !important; background: #ffffff !important; font-weight: 600; border: 1px solid var(--secondary); cursor: pointer;">
                      <option value="Monthly Tuition Fee">Monthly Tuition Fee</option>
                      <option value="Quarterly Composite Fee">Quarterly Composite Fee</option>
                      <option value="Admission Fee">Admission Fee</option>
                      <option value="Transport Fee">Transport Fee</option>
                      <option value="Examination Fee">Examination Fee</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label style="color: var(--primary) !important; font-weight: 700;">Payable Amount (₹) <span style="color: #ef4444;">*</span></label>
                  <input type="number" name="payable_amount" class="form-control" placeholder="Amount in INR" required style="color: #1a1a1a !important; background: #ffffff !important; font-weight: 600; border: 1px solid var(--secondary);">
                  <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem; margin-top: 4px; font-weight: 600;">Please enter a valid positive payable fee amount.</span>
                </div>

                <h3 style="margin-top: 2.5rem; font-size: 1rem; color: var(--primary) !important; font-weight: 700;">Select Payment Method</h3>
                <div class="payment-method">
                  <div class="method-item active" data-method="UPI / QR" style="cursor: pointer;">
                    <svg viewBox="0 0 24 24">
                      <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                      <circle cx="12" cy="12" r="5" />
                    </svg>
                    <p style="font-size: 0.8rem; font-weight: 600;">UPI / QR</p>
                  </div>
                  <div class="method-item" data-method="Credit / Debit Card" style="cursor: pointer;">
                    <svg viewBox="0 0 24 24">
                      <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z" />
                    </svg>
                    <p style="font-size: 0.8rem; font-weight: 600;">Card</p>
                  </div>
                  <div class="method-item" data-method="Net Banking" style="cursor: pointer;">
                    <svg viewBox="0 0 24 24">
                      <path d="M4 10h3v7H4zM10.5 10h3v7h-3zM17 10h3v7h-3zM2 19h20v3H2zM2 9l10-7 10 7z" />
                    </svg>
                    <p style="font-size: 0.8rem; font-weight: 600;">Net Banking</p>
                  </div>
                </div>

                <div id="payment-status" style="display: none; padding: 12px 15px; border-radius: var(--radius-sm); font-size: 0.9rem; margin-top: 1.5rem; text-align: center; line-height: 1.4; font-weight: 600;"></div>

                <button type="submit" id="payment-submit-btn" class="button button--full" style="margin-top: 2.5rem; padding: 1.2rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase;">Proceed to Secure Payment</button>

                <div class="secure-badge">
                  <svg viewBox="0 0 24 24" style="width: 16px; height: 16px; fill: currentColor;">
                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z" />
                  </svg>
                  256-bit SSL Secure Transaction
                </div>
              </form>
            </div>

            <div class="payment-info-card">
              <div class="info-item">
                <h4>Payment Help</h4>
                <p>Ensure you have your Admission Number ready. This is mentioned on the student's ID card or previous fee receipts.</p>
              </div>
              <div class="info-item">
                <h4>Instant Confirmation</h4>
                <p>After successful payment, a digital receipt will be sent to your registered email and mobile number instantly.</p>
              </div>
              <div class="info-item">
                <h4>Support Desk</h4>
                <p>Facing issues? Call our accounts department at <strong>+91 7800007770</strong> (10 AM - 4 PM).</p>
              </div>
              <div class="info-item" style="margin-top: auto; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 2rem;">
                <p style="font-style: italic; font-size: 0.85rem;">"Varanasi Public School is committed to digital transparency and parent convenience."</p>
              </div>
            </div>
          </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const methodItems = document.querySelectorAll('.method-item');
            const selectedMethodInput = document.getElementById('selected-payment-method');

            // Interactive Payment Method toggling
            methodItems.forEach(item => {
                item.addEventListener('click', () => {
                    methodItems.forEach(i => i.classList.remove('active'));
                    item.classList.add('active');
                    const selectedMethod = item.getAttribute('data-method');
                    if (selectedMethodInput) {
                        selectedMethodInput.value = selectedMethod;
                    }
                });
            });

            // Dynamic AJAX submission logic
            const payForm = document.getElementById('fee-submission-form');
            const paySubmitBtn = document.getElementById('payment-submit-btn');
            const payStatus = document.getElementById('payment-status');
            const receiptWrapper = document.getElementById('receipt-display-wrapper');
            const paymentGrid = document.getElementById('payment-main-grid');

            if (payForm) {
                payForm.addEventListener('submit', (e) => {
                    e.preventDefault();

                    // Retrieve fields
                    const adminField = payForm.querySelector('input[name="admission_no"]');
                    const nameField = payForm.querySelector('input[name="student_name"]');
                    const classField = payForm.querySelector('select[name="class_section"]');
                    const amountField = payForm.querySelector('input[name="payable_amount"]');

                    let isValid = true;

                    // 1. Validate Admission Number
                    if (!adminField.value.trim()) {
                        adminField.style.borderColor = '#ef4444';
                        adminField.closest('.form-group').querySelector('.error-text').style.display = 'block';
                        isValid = false;
                    } else {
                        adminField.style.borderColor = 'var(--secondary)';
                        adminField.closest('.form-group').querySelector('.error-text').style.display = 'none';
                    }

                    // 2. Validate Student Name
                    if (!nameField.value.trim()) {
                        nameField.style.borderColor = '#ef4444';
                        nameField.closest('.form-group').querySelector('.error-text').style.display = 'block';
                        isValid = false;
                    } else {
                        nameField.style.borderColor = 'var(--secondary)';
                        nameField.closest('.form-group').querySelector('.error-text').style.display = 'none';
                    }

                    // 3. Validate Class Section Selection
                    if (!classField.value) {
                        classField.style.borderColor = '#ef4444';
                        classField.closest('.form-group').querySelector('.error-text').style.display = 'block';
                        isValid = false;
                    } else {
                        classField.style.borderColor = 'var(--secondary)';
                        classField.closest('.form-group').querySelector('.error-text').style.display = 'none';
                    }

                    // 4. Validate Amount Field
                    const amtVal = parseFloat(amountField.value);
                    if (isNaN(amtVal) || amtVal <= 0) {
                        amountField.style.borderColor = '#ef4444';
                        amountField.closest('.form-group').querySelector('.error-text').style.display = 'block';
                        isValid = false;
                    } else {
                        amountField.style.borderColor = 'var(--secondary)';
                        amountField.closest('.form-group').querySelector('.error-text').style.display = 'none';
                    }

                    if (!isValid) return;

                    // Trigger Secure Loading State
                    paySubmitBtn.disabled = true;
                    paySubmitBtn.textContent = 'Processing Payment...';
                    payStatus.style.display = 'block';
                    payStatus.style.background = 'rgba(59, 130, 246, 0.1)';
                    payStatus.style.color = '#2563eb';
                    payStatus.style.border = '1px solid rgba(59, 130, 246, 0.2)';
                    payStatus.textContent = 'Routing to secure 256-bit bank gateway, please wait...';
                    receiptWrapper.style.display = 'none';

                    const formData = new FormData(payForm);
                    const ajaxUrl = payForm.querySelector('input[name="ajax_url"]').value;

                    fetch(ajaxUrl, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        paySubmitBtn.disabled = false;
                        paySubmitBtn.textContent = 'Proceed to Secure Payment';

                        if (data.success) {
                            payStatus.style.display = 'none';
                            paymentGrid.style.display = 'none'; // Hide the input form completely
                            
                            receiptWrapper.innerHTML = data.data.html;
                            receiptWrapper.style.display = 'block';
                            receiptWrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        } else {
                            payStatus.style.background = 'rgba(239, 68, 68, 0.1)';
                            payStatus.style.color = '#dc2626';
                            payStatus.style.border = '1px solid rgba(239, 68, 68, 0.2)';
                            payStatus.textContent = data.data.message || 'Payment processing failed.';
                        }
                    })
                    .catch(error => {
                        console.error('Error processing fee:', error);
                        paySubmitBtn.disabled = false;
                        paySubmitBtn.textContent = 'Proceed to Secure Payment';
                        payStatus.style.background = 'rgba(239, 68, 68, 0.1)';
                        payStatus.style.color = '#dc2626';
                        payStatus.style.border = '1px solid rgba(239, 68, 68, 0.2)';
                        payStatus.textContent = 'A gateway network error occurred. Please try again.';
                    });
                });
            }
        });
        </script>
      </div>
    </section>
</main>

<?php get_footer(); ?>
