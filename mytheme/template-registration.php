<?php
/**
 * Template Name: Registration
 */

get_header(); ?>

  <aside class="reg-sidebar">
    <div class="brand">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo.png' ); ?>" alt="VPS Logo">
      <h2 style="font-size: 1.1rem; margin-bottom: 0.5rem;">VARANASI PUBLIC SCHOOL</h2>
      <p style="color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-bottom: 1.5rem;">Registration Form 2026-27</p>
      
      <div style="background: rgba(255,255,255,0.1); padding: 12px; border-radius: 4px; margin-bottom: 2rem; font-size: 0.85rem; text-align: left; line-height: 1.4; border-left: 3px solid var(--form-accent);">
        <a href="<?php echo esc_url( home_url( '/fee-submission/' ) ); ?>" style="color: var(--form-accent); font-weight: 700; text-decoration: none;">Click Here</a> 
        <span style="color: rgba(255,255,255,0.8);">for Payment, if Registration Form is already filled</span>
      </div>
    </div>

    <div class="info-group">
      <div class="info-item">
        <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
        <span>Kerakatpur, Lohta Road, Varanasi - 221107</span>
      </div>
      <div class="info-item">
        <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
        <span>www.vpslohta.com</span>
      </div>
      <div class="info-item">
        <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
        <span>vpslohta@gmail.com</span>
      </div>
      <div class="info-item">
        <svg viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
        <span>+91-7800007770, 9721525924</span>
      </div>
    </div>

    <div style="margin-top: 2rem;">
        <p style="font-size: 0.8rem; margin-bottom: 1rem; color: rgba(255,255,255,0.6);">Follow Us</p>
        <div style="display: flex; gap: 10px;">
            <a href="https://www.facebook.com/vpslohta" target="_blank" style="width: 32px; height: 32px; background: white; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: #1e3a8a;">
                <svg style="width: 18px; height: 18px; fill: #1e3a8a;" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
            </a>
            <a href="https://www.instagram.com/varanasipublicschool.krp/" target="_blank" style="width: 32px; height: 32px; background: white; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: #1e3a8a;">
                <svg style="width: 18px; height: 18px; fill: #1e3a8a;" viewBox="0 0 24 24"><path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z"/></svg>
            </a>
            <a href="https://www.youtube.com/@vpslohta" target="_blank" style="width: 32px; height: 32px; background: white; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: #1e3a8a;">
                <svg style="width: 18px; height: 18px; fill: #1e3a8a;" viewBox="0 0 24 24"><path d="M21.58 7.19c-.23-.86-.91-1.54-1.77-1.77C18.25 5 12 5 12 5s-6.25 0-7.81.42c-.86.23-1.54.91-1.77 1.77C2 8.75 2 12 2 12s0 3.25.42 4.81c.23.86.91 1.54 1.77 1.77C5.75 19 12 19 12 19s6.25 0 7.81-.42c.86-.23 1.54-.91 1.77-1.77C22 15.25 22 12 22 12s0-3.25-.42-4.81zM10 15V9l5.2 3-5.2 3z"/></svg>
            </a>
        </div>
    </div>

    <div style="margin-top: auto; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.1); text-align: left;">
      <p style="font-size: 0.7rem; color: rgba(255,255,255,0.5);">Powered By <br><strong style="color: white; letter-spacing: 1px;">EDUNEXT</strong></p>
    </div>
  </aside>

  <main class="reg-main">
    <form id="online-registration-form" method="POST" enctype="multipart/form-data" novalidate>
    <div class="form-header">
      <h1>Registration Form</h1>
      <p>Register by entering the information mentioned below</p>
    </div>

    <div class="progress-stepper">
      <div class="step active" data-step="1">
        <div class="step-icon">1</div>
        <div class="step-label">Instructions</div>
      </div>
      <div class="step" data-step="2">
        <div class="step-icon">2</div>
        <div class="step-label">Student & Parent Details</div>
      </div>
      <div class="step" data-step="3">
        <div class="step-icon">3</div>
        <div class="step-label">Upload Documents</div>
      </div>
      <div class="step" data-step="4">
        <div class="step-icon">4</div>
        <div class="step-label">Complete</div>
      </div>
    </div>

    <!-- Step 1: Instructions -->
    <div class="form-card active" id="step-1-card">
      <div style="background: #f8fafc; padding: 1.5rem; border-radius: 4px; margin-bottom: 2rem;">
        <h3 style="font-size: 1.1rem; color: #1e3a8a; margin-bottom: 1.5rem; border-left: 4px solid var(--form-accent); padding-left: 1rem;">General Instructions:</h3>
        <ul style="list-style: none; padding: 0; margin-bottom: 2rem;">
          <li style="margin-bottom: 1rem; display: flex; gap: 1rem; align-items: flex-start;">
            <span style="color: var(--form-accent); font-weight: bold;">▶</span>
            <span>Please read all instructions carefully before filling the Online Registration Form.</span>
          </li>
          <li style="margin-bottom: 1rem; display: flex; gap: 1rem; align-items: flex-start;">
            <span style="color: var(--form-accent); font-weight: bold;">▶</span>
            <span>We recommend that you use Chrome or Mozilla Firefox browser for filling this form.</span>
          </li>
          <li style="margin-bottom: 1rem; display: flex; gap: 1rem; align-items: flex-start;">
            <span style="color: var(--form-accent); font-weight: bold;">▶</span>
            <span>Filling up this form does not guarantee admission of your child. Admission is strictly as per the policy formulated based on MERIT and NO DONATIONS ACCEPTED.</span>
          </li>
          <li style="margin-bottom: 1rem; display: flex; gap: 1rem; align-items: flex-start;">
            <span style="color: var(--form-accent); font-weight: bold;">▶</span>
            <span>You would be required to upload certain documents in the Documents stage. Kindly have soft copies of the following documents ready before starting to fill the form.</span>
          </li>
          <li style="margin-bottom: 1rem; display: flex; gap: 1rem; align-items: flex-start;">
            <span style="color: var(--form-accent); font-weight: bold;">▶</span>
            <span>The intimation for assessment / observation / interaction / interview / Admission Confirmation will be notified via Email / SMS.</span>
          </li>
        </ul>

        <h3 style="font-size: 1.1rem; color: #1e3a8a; margin-bottom: 1.5rem; border-left: 4px solid var(--form-accent); padding-left: 1rem;">Documents Required During the Admission Process:</h3>
        <ul style="list-style: none; padding: 0; margin-bottom: 2rem;">
          <li style="margin-bottom: 0.75rem; display: flex; gap: 1rem; align-items: flex-start;">
            <span style="color: var(--form-accent); font-weight: bold;">▶</span>
            <span>Documents required for Applicants are Passport size picture, Birth certificate, Transfer certificate & Report card.</span>
          </li>
          <li style="margin-bottom: 0.75rem; display: flex; gap: 1rem; align-items: flex-start;">
            <span style="color: var(--form-accent); font-weight: bold;">▶</span>
            <span>Documents required for Parents are Passport size picture, PAN card and Aadhaar Card.</span>
          </li>
          <li style="margin-bottom: 0.75rem; display: flex; gap: 1rem; align-items: flex-start;">
            <span style="color: var(--form-accent); font-weight: bold;">▶</span>
            <span>All document file sizes should be less than 1 MB. All document file types should be in PDF / JPEG / JPG format except applicant and parents passport size photo file type should be JPEG / JPG only.</span>
          </li>
          <li style="margin-bottom: 0.75rem; display: flex; gap: 1rem; align-items: flex-start;">
            <span style="color: var(--form-accent); font-weight: bold;">▶</span>
            <span>Birth Certificate issued by Municipal Corporation or issued by Govt. Hospital shall be accepted.</span>
          </li>
          <li style="margin-bottom: 0.75rem; display: flex; gap: 1rem; align-items: flex-start;">
            <span style="color: var(--form-accent); font-weight: bold;">▶</span>
            <span>The application form should be submitted before the scheduled date / time. Late submission of the application form will not be accepted / considered. Incomplete forms will not be accepted / considered.</span>
          </li>
        </ul>

        <h3 style="font-size: 1.1rem; color: #1e3a8a; margin-bottom: 1.5rem; border-left: 4px solid var(--form-accent); padding-left: 1rem;">Online Registration Process:</h3>
        <ul style="list-style: none; padding: 0;">
          <li style="margin-bottom: 0.75rem; display: flex; gap: 1rem; align-items: flex-start;">
            <span style="color: var(--form-accent); font-weight: bold;">▶</span>
            <span>You would need access to Debit / Credit Card, Net Banking, etc. to make payment online.</span>
          </li>
          <li style="margin-bottom: 0.75rem; display: flex; gap: 1rem; align-items: flex-start;">
            <span style="color: var(--form-accent); font-weight: bold;">▶</span>
            <span>An acknowledgement Email will be generated on successful payment, with details filled in by you and a "Registration No" corresponding to the Applicant will also be generated, which is to be used for any further communication with the school.</span>
          </li>
          <li style="margin-bottom: 0.75rem; display: flex; gap: 1rem; align-items: flex-start;">
            <span style="color: var(--form-accent); font-weight: bold;">▶</span>
            <span>The Admission Fee Payment Link will be sent to you via Email / SMS to PAY FEE ONLINE.</span>
          </li>
        </ul>
      </div>

      <div style="margin-top: 30px; display: flex; align-items: center; gap: 10px;">
        <input type="checkbox" id="agree-check" style="width: 18px; height: 18px; cursor: pointer;">
        <label for="agree-check" style="font-size: 0.9rem; color: #1e293b; font-weight: 600; cursor: pointer;">I agree to all terms and instructions mentioned above.</label>
      </div>
      <span id="agree-error" class="error-text" style="display: none; color: #ef4444; font-size: 0.8rem; margin-top: 5px;">Kindly agree to the instructions first.</span>

      <div class="button-row" style="margin-top: 30px; text-align: right;">
        <button type="button" class="button" id="proceed-btn" style="padding: 1rem 4rem; background: #3b82f6; border-radius: 4px; color: white; border: none; font-weight: bold; cursor: pointer;">Proceed</button>
      </div>
    </div>

    <!-- Step 2: Form Details -->
    <div class="form-card" id="step-2-card">
      <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px; font-size: 0.9rem; color: #1e3a8a;">
        <span style="color: #3b82f6;">👍</span>
        <span>Have you filled enquiry form ?</span>
        <input type="checkbox" id="enquiry-check">
      </div>

      <div class="section-title" style="background: #f1f5f9; padding: 8px 15px; border-radius: 4px; display: flex; justify-content: space-between;">
        <span>Student Details:</span>
        <span style="font-size: 0.8rem; font-weight: normal;">Step 1 / 3</span>
      </div>

      <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px; font-size: 0.9rem; color: #1e3a8a; margin-top: 15px;">
        <span style="color: #3b82f6;">👍</span>
        <span>Sibling (Real Brother/Sister) only studying in same school</span>
        <input type="checkbox" name="sibling_status" id="sibling-check">
      </div>

      <div class="form-grid">
        <div class="form-group">
          <label>Academic Year <span>*</span></label>
          <select name="academic_year" class="form-control" required>
            <option value="2026-27" selected>2026-27</option>
          </select>
          <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem;">Kindly select the Academic Year.</span>
        </div>
        <div class="form-group">
          <label>Class <span>*</span></label>
          <select name="selected_class" class="form-control" required>
            <option value="" disabled selected>Select Class</option>
            <option value="nursery">Nursery</option>
            <option value="lkg">L.K.G</option>
            <option value="ukg">U.K.G</option>
            <option value="1">Class 1</option>
            <option value="2">Class 2</option>
            <option value="3">Class 3</option>
            <option value="4">Class 4</option>
            <option value="5">Class 5</option>
            <option value="6">Class 6</option>
            <option value="7">Class 7</option>
            <option value="8">Class 8</option>
            <option value="9">Class 9</option>
            <option value="10">Class 10</option>
            <option value="11">Class 11</option>
            <option value="12">Class 12</option>
          </select>
          <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem;">Kindly select the Class.</span>
        </div>
        <div class="form-group">
          <label>First Name <span>*</span></label>
          <input type="text" name="first_name" class="form-control" required>
          <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem;">Kindly insert the First Name.</span>
        </div>
        <div class="form-group">
          <label>Middle Name</label>
          <input type="text" name="middle_name" class="form-control">
        </div>
        <div class="form-group">
          <label>Last Name <span>*</span></label>
          <input type="text" name="last_name" class="form-control" required>
          <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem;">Kindly insert the Last Name.</span>
        </div>
        <div class="form-group">
          <label>Date of Birth <span>*</span></label>
          <input type="date" name="dob" class="form-control" required>
          <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem;">Kindly insert the Date of Birth.</span>
        </div>
        <div class="form-group">
          <label>Aadhaar No</label>
          <input type="text" name="aadhaar_no" class="form-control">
        </div>
        <div class="form-group">
          <label>Gender <span>*</span></label>
          <select name="gender" class="form-control" required>
            <option value="" disabled selected>Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
          <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem;">Kindly select the Gender.</span>
        </div>
        <div class="form-group">
          <label>Primary Mobile No <span>*</span></label>
          <input type="tel" name="primary_mobile" class="form-control" required pattern="[0-9]{10}">
          <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem;">Kindly insert a valid 10-digit Mobile Number.</span>
        </div>
        <div class="form-group">
          <label>Email Id <span>*</span></label>
          <input type="email" name="email" class="form-control" required>
          <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem;">Kindly insert a valid Email Address.</span>
        </div>
        <div class="form-group">
          <label>Category <span>*</span></label>
          <select name="category" class="form-control" required>
            <option value="" disabled selected>Select Category</option>
            <option value="general">General</option>
            <option value="obc">OBC</option>
            <option value="sc">SC</option>
            <option value="st">ST</option>
          </select>
          <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem;">Kindly select the Category.</span>
        </div>
        <div class="form-group">
          <label>Religion <span>*</span></label>
          <select name="religion" class="form-control" required>
            <option value="" disabled selected>Select Religion</option>
            <option value="hindu">Hindu</option>
            <option value="muslim">Muslim</option>
            <option value="sikh">Sikh</option>
            <option value="christian">Christian</option>
            <option value="jain">Jain</option>
            <option value="buddhist">Buddhist</option>
            <option value="other">Other</option>
          </select>
          <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem;">Kindly select the Religion.</span>
        </div>
        <div class="form-group">
          <label>Blood Group</label>
          <select name="blood_group" class="form-control">
            <option value="" selected>Select Blood Group</option>
            <option value="a+">A +</option>
            <option value="a-">A -</option>
            <option value="b+">B +</option>
            <option value="b-">B -</option>
            <option value="ab+">AB +</option>
            <option value="ab-">AB -</option>
            <option value="o+">O +</option>
            <option value="o-">O -</option>
          </select>
        </div>
        <div class="form-group">
          <label>Nationality</label>
          <select name="nationality" class="form-control">
            <option value="Indian" selected>Indian</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="form-group">
          <label>Birth Place</label>
          <input type="text" name="birth_place" class="form-control">
        </div>
        <div class="form-group">
          <label>Mother Tongue</label>
          <input type="text" name="mother_tongue" class="form-control">
        </div>
        <div class="form-group" style="grid-column: span 2;">
          <label>Previous School (If any, else leave blank)</label>
          <input type="text" name="previous_school" class="form-control">
        </div>
      </div>

      <div class="section-title" style="background: #f1f5f9; padding: 8px 15px; border-radius: 4px; margin-top: 30px;">
        Father Details:
      </div>
      <div class="form-grid" style="margin-top: 15px;">
        <div class="form-group">
          <label>First Name</label>
          <input type="text" name="father_first_name" class="form-control">
        </div>
        <div class="form-group">
          <label>Middle Name</label>
          <input type="text" name="father_middle_name" class="form-control">
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" name="father_last_name" class="form-control">
        </div>
        <div class="form-group">
          <label>Mobile No</label>
          <input type="tel" name="father_mobile" class="form-control">
        </div>
        <div class="form-group">
          <label>Email Id</label>
          <input type="email" name="father_email" class="form-control">
        </div>
        <div class="form-group">
          <label>Qualification</label>
          <select name="father_qualification" class="form-control">
            <option value="" selected>Select Qualification</option>
            <option value="post_graduate">Post Graduate</option>
            <option value="graduate">Graduate</option>
            <option value="under_graduate">Under Graduate</option>
            <option value="matriculate">Matriculate</option>
            <option value="below_matric">Below Matric</option>
            <option value="illiterate">Illiterate</option>
          </select>
        </div>
        <div class="form-group">
          <label>Occupation</label>
          <select name="father_occupation" class="form-control">
            <option value="" selected>Select Occupation</option>
            <option value="govt_job">Govt Job</option>
            <option value="private_job">Private Job</option>
            <option value="business">Business</option>
            <option value="professional">Professional</option>
            <option value="agriculture">Agriculture</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="form-group">
          <label>Designation</label>
          <input type="text" name="father_designation" class="form-control">
        </div>
        <div class="form-group">
          <label>Organization Name</label>
          <input type="text" name="father_org_name" class="form-control">
        </div>
        <div class="form-group">
          <label>Organization Address</label>
          <input type="text" name="father_org_address" class="form-control">
        </div>
        <div class="form-group">
          <label>Annual Income</label>
          <input type="text" name="father_annual_income" class="form-control">
        </div>
      </div>

      <div class="section-title" style="background: #f1f5f9; padding: 8px 15px; border-radius: 4px; margin-top: 30px;">
        Mother Details:
      </div>
      <div class="form-grid" style="margin-top: 15px;">
        <div class="form-group">
          <label>First Name</label>
          <input type="text" name="mother_first_name" class="form-control">
        </div>
        <div class="form-group">
          <label>Middle Name</label>
          <input type="text" name="mother_middle_name" class="form-control">
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" name="mother_last_name" class="form-control">
        </div>
        <div class="form-group">
          <label>Mobile No</label>
          <input type="tel" name="mother_mobile" class="form-control">
        </div>
        <div class="form-group">
          <label>Email Id</label>
          <input type="email" name="mother_email" class="form-control">
        </div>
        <div class="form-group">
          <label>Qualification</label>
          <select name="mother_qualification" class="form-control">
            <option value="" selected>Select Qualification</option>
            <option value="post_graduate">Post Graduate</option>
            <option value="graduate">Graduate</option>
            <option value="under_graduate">Under Graduate</option>
            <option value="matriculate">Matriculate</option>
            <option value="below_matric">Below Matric</option>
            <option value="illiterate">Illiterate</option>
          </select>
        </div>
        <div class="form-group">
          <label>Occupation</label>
          <select name="mother_occupation" class="form-control">
            <option value="" selected>Select Occupation</option>
            <option value="housewife">Housewife</option>
            <option value="govt_job">Govt Job</option>
            <option value="private_job">Private Job</option>
            <option value="business">Business</option>
            <option value="professional">Professional</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="form-group">
          <label>Designation</label>
          <input type="text" name="mother_designation" class="form-control">
        </div>
        <div class="form-group">
          <label>Organization Name</label>
          <input type="text" name="mother_org_name" class="form-control">
        </div>
        <div class="form-group">
          <label>Organization Address</label>
          <input type="text" name="mother_org_address" class="form-control">
        </div>
        <div class="form-group">
          <label>Annual Income</label>
          <input type="text" name="mother_annual_income" class="form-control">
        </div>
      </div>

      <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px; font-size: 0.9rem; color: #1e3a8a; margin-top: 20px;">
        <span>Guardian Detail If Any:</span>
        <input type="checkbox" id="guardian-check">
      </div>

      <div id="guardian-section" style="display: none;">
        <div class="form-grid">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" name="guardian_first_name" class="form-control">
          </div>
          <div class="form-group">
            <label>Middle Name</label>
            <input type="text" name="guardian_middle_name" class="form-control">
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="guardian_last_name" class="form-control">
          </div>
          <div class="form-group">
            <label>Relation with Student</label>
            <input type="text" name="guardian_relation" class="form-control">
          </div>
          <div class="form-group">
            <label>Mobile No</label>
            <input type="tel" name="guardian_mobile" class="form-control">
          </div>
          <div class="form-group">
            <label>Email Id</label>
            <input type="email" name="guardian_email" class="form-control">
          </div>
          <div class="form-group">
            <label>Qualification</label>
            <select name="guardian_qualification" class="form-control">
              <option value="" selected>Select Qualification</option>
              <option value="post_graduate">Post Graduate</option>
              <option value="graduate">Graduate</option>
              <option value="under_graduate">Under Graduate</option>
              <option value="matriculate">Matriculate</option>
              <option value="below_matric">Below Matric</option>
              <option value="illiterate">Illiterate</option>
            </select>
          </div>
          <div class="form-group">
            <label>Occupation</label>
            <select name="guardian_occupation" class="form-control">
              <option value="" selected>Select Occupation</option>
              <option value="govt_job">Govt Job</option>
              <option value="private_job">Private Job</option>
              <option value="business">Business</option>
              <option value="professional">Professional</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <label>Designation</label>
            <input type="text" name="guardian_designation" class="form-control">
          </div>
          <div class="form-group">
            <label>Organization Name</label>
            <input type="text" name="guardian_org_name" class="form-control">
          </div>
          <div class="form-group">
            <label>Organization Address</label>
            <input type="text" name="guardian_org_address" class="form-control">
          </div>
          <div class="form-group">
            <label>Annual Income</label>
            <input type="text" name="guardian_annual_income" class="form-control">
          </div>
        </div>
      </div>

      <div class="section-title" style="background: #f1f5f9; padding: 8px 15px; border-radius: 4px; margin-top: 30px;">
        Corresponding Address:
      </div>
      <div class="form-grid" style="margin-top: 15px;">
        <div class="form-group" style="grid-column: span 2;">
          <label>Corresponding Address <span>*</span></label>
          <input type="text" name="address_corresponding" class="form-control" required>
          <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem;">Kindly insert the Corresponding Address.</span>
        </div>
        <div class="form-group">
          <label>Country</label>
          <input type="text" name="country_corresponding" class="form-control" value="India">
        </div>
        <div class="form-group">
          <label>State</label>
          <input type="text" name="state_corresponding" class="form-control">
        </div>
        <div class="form-group">
          <label>City</label>
          <input type="text" name="city_corresponding" class="form-control">
        </div>
        <div class="form-group">
          <label>Pin Code</label>
          <input type="text" name="pin_corresponding" class="form-control">
        </div>
      </div>

      <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px; font-size: 0.9rem; color: #1e3a8a; margin-top: 20px;">
        <span style="color: #3b82f6;">👍</span>
        <span>Is Corresponding & Permanent Address same?</span>
        <input type="checkbox" id="same-address-check">
      </div>
      <div class="form-grid">
        <div class="form-group" style="grid-column: span 2;">
          <label>Permanent Address</label>
          <input type="text" name="address_permanent" class="form-control">
        </div>
        <div class="form-group">
          <label>Country</label>
          <input type="text" name="country_permanent" class="form-control" value="India">
        </div>
        <div class="form-group">
          <label>State</label>
          <input type="text" name="state_permanent" class="form-control">
        </div>
        <div class="form-group">
          <label>City</label>
          <input type="text" name="city_permanent" class="form-control">
        </div>
        <div class="form-group">
          <label>Pin Code</label>
          <input type="text" name="pin_permanent" class="form-control">
        </div>
      </div>

      <div class="button-row" style="margin-top: 30px;">
        <button type="button" class="button button--ghost" id="back-to-step-1" style="background: #f1f5f9; color: #1e293b; border: 1px solid #e2e8f0; padding: 8px 25px; border-radius: 4px; cursor: pointer;">Previous</button>
        <button type="button" class="button" id="next-to-step-3-btn" style="background: #3b82f6; color: white; padding: 8px 40px; border-radius: 4px; border: none; font-weight: bold; cursor: pointer;">Next</button>
      </div>
    </div>

    <!-- Step 3: Upload Documents -->
    <div class="form-card" id="step-3-card">
      <div class="section-title" style="background: #f1f5f9; padding: 8px 15px; border-radius: 4px; display: flex; justify-content: space-between;">
        <span>Upload Documents:</span>
        <span style="font-size: 0.8rem; font-weight: normal;">Step 2 / 3</span>
      </div>
      
      <p style="font-size: 0.9rem; color: #64748b; margin-top: 15px; margin-bottom: 25px; line-height: 1.5;">
        Please upload the required documents below. Allowed formats are <strong>PDF, JPG, JPEG, PNG</strong>. Max file size: <strong>1 MB</strong> per document.
      </p>

      <div class="form-grid">
        <div class="form-group">
          <label>Student Passport Photo <span>*</span></label>
          <div style="position: relative; border: 1px solid #e2e8f0; border-radius: 4px; background: #fff; display: flex; align-items: center; padding-right: 10px;">
            <input type="file" name="student_photo" id="student_photo_input" class="form-control" required style="border: none; background: transparent; cursor: pointer;">
            <svg style="width: 16px; height: 16px; fill: #64748b;" viewBox="0 0 24 24"><path d="M9 16h6v-6h4l-7-7-7 7h4v6zm-4 2h14v2H5v-2z"/></svg>
          </div>
          <span style="font-size: 0.7rem; color: #64748b; margin-top: 4px; display: block;">JPG/JPEG/PNG format only.</span>
        </div>

        <div class="form-group">
          <label>Birth Certificate <span>*</span></label>
          <div style="position: relative; border: 1px solid #e2e8f0; border-radius: 4px; background: #fff; display: flex; align-items: center; padding-right: 10px;">
            <input type="file" name="student_birth_certificate" id="birth_cert_input" class="form-control" required style="border: none; background: transparent; cursor: pointer;">
            <svg style="width: 16px; height: 16px; fill: #64748b;" viewBox="0 0 24 24"><path d="M9 16h6v-6h4l-7-7-7 7h4v6zm-4 2h14v2H5v-2z"/></svg>
          </div>
          <span style="font-size: 0.7rem; color: #64748b; margin-top: 4px; display: block;">PDF/JPG/JPEG format only.</span>
        </div>

        <div class="form-group">
          <label>Father's Photo <span>*</span></label>
          <div style="position: relative; border: 1px solid #e2e8f0; border-radius: 4px; background: #fff; display: flex; align-items: center; padding-right: 10px;">
            <input type="file" name="father_photo" id="father_photo_input" class="form-control" required style="border: none; background: transparent; cursor: pointer;">
            <svg style="width: 16px; height: 16px; fill: #64748b;" viewBox="0 0 24 24"><path d="M9 16h6v-6h4l-7-7-7 7h4v6zm-4 2h14v2H5v-2z"/></svg>
          </div>
          <span style="font-size: 0.7rem; color: #64748b; margin-top: 4px; display: block;">JPG/JPEG/PNG format only.</span>
        </div>

        <div class="form-group">
          <label>Mother's Photo <span>*</span></label>
          <div style="position: relative; border: 1px solid #e2e8f0; border-radius: 4px; background: #fff; display: flex; align-items: center; padding-right: 10px;">
            <input type="file" name="mother_photo" id="mother_photo_input" class="form-control" required style="border: none; background: transparent; cursor: pointer;">
            <svg style="width: 16px; height: 16px; fill: #64748b;" viewBox="0 0 24 24"><path d="M9 16h6v-6h4l-7-7-7 7h4v6zm-4 2h14v2H5v-2z"/></svg>
          </div>
          <span style="font-size: 0.7rem; color: #64748b; margin-top: 4px; display: block;">JPG/JPEG/PNG format only.</span>
        </div>

        <div class="form-group guardian-file-group" style="display: none;">
          <label>Guardian's Photo</label>
          <div style="position: relative; border: 1px solid #e2e8f0; border-radius: 4px; background: #fff; display: flex; align-items: center; padding-right: 10px;">
            <input type="file" name="guardian_photo" id="guardian_photo_input" class="form-control" style="border: none; background: transparent; cursor: pointer;">
            <svg style="width: 16px; height: 16px; fill: #64748b;" viewBox="0 0 24 24"><path d="M9 16h6v-6h4l-7-7-7 7h4v6zm-4 2h14v2H5v-2z"/></svg>
          </div>
          <span style="font-size: 0.7rem; color: #64748b; margin-top: 4px; display: block;">JPG/JPEG/PNG format only.</span>
        </div>
      </div>

      <div id="registration-status" class="form-status" style="margin-top: 2rem;"></div>

      <div class="button-row" style="margin-top: 30px;">
        <button type="button" class="button button--ghost" id="back-to-step-2" style="background: #f1f5f9; color: #1e293b; border: 1px solid #e2e8f0; padding: 8px 25px; border-radius: 4px; cursor: pointer;">Previous</button>
        <button type="submit" class="button" id="submit-registration-btn" style="background: #22c55e; color: white; padding: 8px 40px; border-radius: 4px; border: none; font-weight: bold; cursor: pointer;">Submit Application</button>
      </div>
    </div>

    <!-- Step 4: Complete -->
    <div class="form-card" id="step-4-card" style="text-align: center; padding: 3rem 2rem;">
      <div style="width: 80px; height: 80px; background: #dcfce7; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem auto; color: #22c55e;">
        <svg style="width: 48px; height: 48px; fill: currentColor;" viewBox="0 0 24 24">
          <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
        </svg>
      </div>
      
      <h2 style="font-size: 1.8rem; color: #1e293b; margin-bottom: 0.5rem;">Registration Submitted Successfully!</h2>
      <p style="color: #64748b; font-size: 1rem; margin-bottom: 2rem;">Thank you for registering. Your details and documents have been submitted to Varanasi Public School.</p>
      
      <div style="max-width: 400px; margin: 0 auto; background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 8px; padding: 1.5rem; margin-bottom: 2.5rem;">
        <p style="font-size: 0.85rem; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.5rem; font-weight: 600;">Your Registration Number</p>
        <h3 id="display-reg-number" style="font-size: 1.8rem; color: #1e3a8a; font-family: monospace; letter-spacing: 1px; margin: 0;">REG-2026-0000</h3>
        <p style="font-size: 0.8rem; color: #ef4444; margin-top: 10px; margin-bottom: 0; font-weight: 500;">Please note down this registration number for all future communications.</p>
      </div>

      <div style="background: rgba(59, 130, 246, 0.05); border-left: 4px solid #3b82f6; padding: 1.25rem; border-radius: 4px; max-width: 600px; margin: 0 auto 2.5rem auto; text-align: left; line-height: 1.6;">
        <h4 style="color: #1e3a8a; margin: 0 0 0.5rem 0; font-size: 1rem;">Next Step: Registration Fee Payment</h4>
        <p style="margin: 0; font-size: 0.9rem; color: #334155;">To complete the registration process, please submit the registration fee. If you've already completed the registration details, you can pay online.</p>
      </div>

      <a href="<?php echo esc_url( home_url( '/fees-portal/' ) ); ?>" class="button" style="background: #3b82f6; color: white; padding: 12px 35px; border-radius: 4px; display: inline-block; text-decoration: none; font-weight: 600;">Pay Registration Fee Online</a>
    </div>
    </form>
  </main>

  <script>
  document.addEventListener('DOMContentLoaded', () => {
      // Steppers and Cards
      const stepperSteps = document.querySelectorAll('.step');
      const step1Card = document.getElementById('step-1-card');
      const step2Card = document.getElementById('step-2-card');
      const step3Card = document.getElementById('step-3-card');
      const step4Card = document.getElementById('step-4-card');
      
      // Buttons
      const proceedBtn = document.getElementById('proceed-btn');
      const backToStep1 = document.getElementById('back-to-step-1');
      const backToStep2 = document.getElementById('back-to-step-2');
      const nextToStep3Btn = document.getElementById('next-to-step-3-btn');
      const submitBtn = document.getElementById('submit-registration-btn');
      
      // Inputs & Indicators
      const agreeCheck = document.getElementById('agree-check');
      const agreeError = document.getElementById('agree-error');
      const guardianCheck = document.getElementById('guardian-check');
      const guardianSection = document.getElementById('guardian-section');
      const guardianFileGroup = document.querySelector('.guardian-file-group');
      const sameAddressCheck = document.getElementById('same-address-check');
      
      // Address Field Sync
      const addrCorr = document.querySelector('input[name="address_corresponding"]');
      const countryCorr = document.querySelector('input[name="country_corresponding"]');
      const stateCorr = document.querySelector('input[name="state_corresponding"]');
      const cityCorr = document.querySelector('input[name="city_corresponding"]');
      const pinCorr = document.querySelector('input[name="pin_corresponding"]');
      
      const addrPerm = document.querySelector('input[name="address_permanent"]');
      const countryPerm = document.querySelector('input[name="country_permanent"]');
      const statePerm = document.querySelector('input[name="state_permanent"]');
      const cityPerm = document.querySelector('input[name="city_permanent"]');
      const pinPerm = document.querySelector('input[name="pin_permanent"]');

      // Toggle Guardian
      if (guardianCheck) {
          guardianCheck.addEventListener('change', () => {
              if (guardianCheck.checked) {
                  guardianSection.style.display = 'block';
                  guardianFileGroup.style.display = 'block';
              } else {
                  guardianSection.style.display = 'none';
                  guardianFileGroup.style.display = 'none';
                  // Clear guardian fields
                  guardianSection.querySelectorAll('input, select').forEach(el => el.value = '');
              }
          });
      }

      // Same Address Sync Logic
      if (sameAddressCheck) {
          sameAddressCheck.addEventListener('change', () => {
              if (sameAddressCheck.checked) {
                  addrPerm.value = addrCorr.value || '';
                  countryPerm.value = countryCorr.value || 'India';
                  statePerm.value = stateCorr.value || '';
                  cityPerm.value = cityCorr.value || '';
                  pinPerm.value = pinCorr.value || '';

                  addrPerm.disabled = true;
                  countryPerm.disabled = true;
                  statePerm.disabled = true;
                  cityPerm.disabled = true;
                  pinPerm.disabled = true;
              } else {
                  addrPerm.disabled = false;
                  countryPerm.disabled = false;
                  statePerm.disabled = false;
                  cityPerm.disabled = false;
                  pinPerm.disabled = false;
                  
                  addrPerm.value = '';
                  countryPerm.value = 'India';
                  statePerm.value = '';
                  cityPerm.value = '';
                  pinPerm.value = '';
              }
          });

          // Sync keyups when same is checked
          const syncAddressFields = () => {
              if (sameAddressCheck.checked) {
                  addrPerm.value = addrCorr.value || '';
                  countryPerm.value = countryCorr.value || 'India';
                  statePerm.value = stateCorr.value || '';
                  cityPerm.value = cityCorr.value || '';
                  pinPerm.value = pinCorr.value || '';
              }
          };

          [addrCorr, countryCorr, stateCorr, cityCorr, pinCorr].forEach(el => {
              if (el) el.addEventListener('input', syncAddressFields);
          });
      }

      // Step Helper functions
      const showStep = (stepNumber) => {
          // Hide all cards
          [step1Card, step2Card, step3Card, step4Card].forEach(card => {
              if (card) card.classList.remove('active');
          });
          
          // Remove active class from stepper
          stepperSteps.forEach(step => {
              step.classList.remove('active');
          });

          // Activate requested card & stepper steps
          if (stepNumber === 1) {
              step1Card.classList.add('active');
              stepperSteps[0].classList.add('active');
          } else if (stepNumber === 2) {
              step2Card.classList.add('active');
              stepperSteps[0].classList.add('active');
              stepperSteps[1].classList.add('active');
          } else if (stepNumber === 3) {
              step3Card.classList.add('active');
              stepperSteps[0].classList.add('active');
              stepperSteps[1].classList.add('active');
              stepperSteps[2].classList.add('active');
          } else if (stepNumber === 4) {
              step4Card.classList.add('active');
              stepperSteps.forEach(step => step.classList.add('active'));
          }

          window.scrollTo({ top: 0, behavior: 'smooth' });
      };

      // Step 1: Proceed Button
      if (proceedBtn) {
          proceedBtn.addEventListener('click', () => {
              if (agreeCheck.checked) {
                  agreeError.style.display = 'none';
                  showStep(2);
              } else {
                  agreeError.style.display = 'block';
              }
          });
      }

      // Step 2: Back Button
      if (backToStep1) {
          backToStep1.addEventListener('click', () => {
              showStep(1);
          });
      }

      // Step 2: Next Button Validation & Transition
      if (nextToStep3Btn) {
          nextToStep3Btn.addEventListener('click', () => {
              let isValid = true;
              
              // Required inputs in Step 2
              const requiredFields = step2Card.querySelectorAll('[required]');
              requiredFields.forEach(field => {
                  const parent = field.closest('.form-group');
                  const errorSpan = parent ? parent.querySelector('.error-text') : null;
                  
                  if (!field.value.trim()) {
                      isValid = false;
                      field.classList.add('is-invalid');
                      if (errorSpan) errorSpan.style.display = 'block';
                  } else {
                      field.classList.remove('is-invalid');
                      if (errorSpan) errorSpan.style.display = 'none';
                  }
              });

              // Specific Email validation if entered
              const emailField = step2Card.querySelector('input[type="email"]');
              if (emailField && emailField.value.trim()) {
                  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                  const parent = emailField.closest('.form-group');
                  const errorSpan = parent ? parent.querySelector('.error-text') : null;
                  
                  if (!emailPattern.test(emailField.value.trim())) {
                      isValid = false;
                      emailField.classList.add('is-invalid');
                      if (errorSpan) {
                          errorSpan.textContent = 'Please enter a valid email address.';
                          errorSpan.style.display = 'block';
                      }
                  }
              }

              if (isValid) {
                  showStep(3);
              } else {
                  // Focus first invalid field
                  const firstInvalid = step2Card.querySelector('.is-invalid');
                  if (firstInvalid) firstInvalid.focus();
              }
          });
      }

      // Step 3: Back Button
      if (backToStep2) {
          backToStep2.addEventListener('click', () => {
              showStep(2);
          });
      }

      // Step 3: Form AJAX Submission
      const regForm = document.getElementById('online-registration-form');
      const statusDiv = document.getElementById('registration-status');

      if (regForm) {
          regForm.addEventListener('submit', (e) => {
              e.preventDefault();

              // Validate Step 3 files
              let filesValid = true;
              const requiredFiles = step3Card.querySelectorAll('[required]');
              requiredFiles.forEach(fileInput => {
                  if (!fileInput.files || fileInput.files.length === 0) {
                      filesValid = false;
                      fileInput.style.border = '1px solid #ef4444';
                  } else {
                      fileInput.style.border = 'none';
                      // Validate file size (< 1MB)
                      const file = fileInput.files[0];
                      if (file.size > 1048576) {
                          filesValid = false;
                          alert(`File ${file.name} is too large. Max size allowed is 1MB.`);
                          fileInput.style.border = '1px solid #ef4444';
                      }
                  }
              });

              if (!filesValid) {
                  statusDiv.className = 'form-status error';
                  statusDiv.innerHTML = 'Please upload all mandatory documents (each under 1 MB).';
                  statusDiv.style.display = 'block';
                  return;
              }

              // Disable submit button & show loading state
              submitBtn.disabled = true;
              submitBtn.textContent = 'Submitting Application...';
              statusDiv.className = 'form-status loading';
              statusDiv.innerHTML = 'Please wait while we securely process and upload your application...';
              statusDiv.style.display = 'block';

              // Construct FormData (includes all text fields and file uploads!)
              // To ensure disabled fields (like synchronized address) are submitted, we temporarily enable them
              if (sameAddressCheck && sameAddressCheck.checked) {
                  addrPerm.disabled = false;
                  countryPerm.disabled = false;
                  statePerm.disabled = false;
                  cityPerm.disabled = false;
                  pinPerm.disabled = false;
              }

              const formData = new FormData(regForm);

              // Re-disable fields
              if (sameAddressCheck && sameAddressCheck.checked) {
                  addrPerm.disabled = true;
                  countryPerm.disabled = true;
                  statePerm.disabled = true;
                  cityPerm.disabled = true;
                  pinPerm.disabled = true;
              }

              formData.append('action', 'submit_registration');
              formData.append('nonce', vps_ajax.nonce);

              // Perform fetch POST
              fetch(vps_ajax.ajax_url, {
                  method: 'POST',
                  body: formData
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      // Update success screen registration number
                      document.getElementById('display-reg-number').textContent = data.data.reg_number;
                      
                      statusDiv.style.display = 'none';
                      regForm.reset();
                      
                      // Go to Step 4
                      showStep(4);
                  } else {
                      submitBtn.disabled = false;
                      submitBtn.textContent = 'Submit Registration';
                      statusDiv.className = 'form-status error';
                      statusDiv.innerHTML = data.data.message || 'An error occurred. Please try again.';
                  }
              })
              .catch(error => {
                  console.error('Error submitting form:', error);
                  submitBtn.disabled = false;
                  submitBtn.textContent = 'Submit Registration';
                  statusDiv.className = 'form-status error';
                  statusDiv.innerHTML = 'Network error or server down. Please check your connection and try again.';
              });
          });
      }
  });
  </script>
<?php get_footer(); ?>
