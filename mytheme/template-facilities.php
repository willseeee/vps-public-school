<?php
/**
 * Template Name: Facilities
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / Facilities</p>
        <h1>Facilities</h1>
        <p>Academic and co-curricular spaces inspired by the structure of the reference facilities page you shared.</p>
      </div>
    </section>
        <style>
      .facility-row {
        display: flex;
        gap: 4rem;
        align-items: center;
        margin-bottom: 6rem;
      }

      .facility-text {
        flex: 0 0 35%;
      }

      .facility-eyebrow {
        color: #e53935;
        font-size: 0.85rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: 0.8rem;
        display: block;
      }

      .facility-title {
        font-family: 'Cinzel', serif;
        font-size: 2.2rem;
        color: var(--primary);
        margin-bottom: 1.5rem;
        line-height: 1.2;
      }

      .facility-desc {
        font-size: 1.05rem;
        color: var(--muted);
        line-height: 1.7;
      }

      .facility-gallery {
        flex: 1;
        display: grid;
        gap: 1rem;
      }

      .facility-gallery img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
      }

      .facility-gallery img:hover {
        transform: scale(1.03);
      }

      .facility-gallery[data-count="2"] {
        grid-template-columns: 1fr 1fr;
        aspect-ratio: 24 / 9;
      }

      .facility-gallery[data-count="4"] {
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 1fr 1fr;
        aspect-ratio: 16 / 9;
      }

      .facility-gallery[data-count="6"] {
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr;
        aspect-ratio: 24 / 9;
      }

      @media (max-width: 992px) {
        .facility-row {
          flex-direction: column;
          gap: 2rem;
          margin-bottom: 4rem;
        }
        .facility-text {
          flex: auto;
          text-align: center;
        }
        .facility-gallery[data-count="2"],
        .facility-gallery[data-count="6"] {
          aspect-ratio: 16 / 9;
        }
      }
    </style>

    <section class="section section--soft" style="padding-top: 4rem;">
      <div class="container">

        <!-- Section 1 -->
        <div class="facility-row reveal">
          <div class="facility-text">
            <span class="facility-eyebrow">ACADEMIC FACILITIES</span>
            <h3 class="facility-title">Our Infrastructure</h3>
            <p class="facility-desc">An eco-friendly Campus with a well-ventilated structure designed for optimal learning. Our modern infrastructure seamlessly blends aesthetics with functional educational spaces to provide students with the perfect environment for holistic development.</p>
          </div>
          <div class="facility-gallery" data-count="2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/vps building.jpg" alt="Building">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/01. Auditoriam.jpg" alt="Classroom">
          </div>
        </div>

        <!-- Section 2 -->
        <div class="facility-row reveal">
          <div class="facility-text">
            <span class="facility-eyebrow">ACADEMIC FACILITIES</span>
            <h3 class="facility-title">Science Laboratory</h3>
            <p class="facility-desc">Scientific temperament is nurtured in our fully-equipped Physics, Chemistry, and Biology laboratories. These specialized zones are built to international safety standards, enabling hands-on experimentation and practical learning under expert guidance.</p>
          </div>
          <div class="facility-gallery" data-count="6">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/biology lab/08 Bio Lab 01.jpg" alt="Bio Lab">
            <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=800" alt="Chem Lab">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/physics lab/07 Physics Lab 01.jpg" alt="Physics Lab">
            <img src="https://images.unsplash.com/photo-1576086206900-bcabd0e6f8ebd?auto=format&fit=crop&w=800" alt="Bio Lab">
            <img src="https://images.unsplash.com/photo-1614935151651-0bea6508abb0?auto=format&fit=crop&w=800" alt="Chem Lab">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/physics lab/DSC05888.jpg" alt="Physics Lab">
          </div>
        </div>

        <!-- Section 3 -->
        <div class="facility-row reveal">
          <div class="facility-text">
            <span class="facility-eyebrow">ACADEMIC FACILITIES</span>
            <h3 class="facility-title">Computer Laboratory</h3>
            <p class="facility-desc">The computer lab is a crucial part of our digital literacy program. Equipped with the latest workstations, high-speed internet, and advanced software, it ensures our students stay ahead in today's technology-driven world.</p>
          </div>
          <div class="facility-gallery" data-count="2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/computer lab/04. PGT Computer  Lab.jpg" alt="Computer Lab">
            <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=800" alt="Smart Class">
          </div>
        </div>

        <!-- Section 4 -->
        <div class="facility-row reveal">
          <div class="facility-text">
            <span class="facility-eyebrow">ACADEMIC FACILITIES</span>
            <h3 class="facility-title">Library</h3>
            <p class="facility-desc">A library is a treasure house of knowledge. Our expansive digital and physical library features thousands of curated books, journals, and reference materials that inspire curiosity and foster a lifelong love for reading.</p>
          </div>
          <div class="facility-gallery" data-count="4">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/05 Library.jpg" alt="Library">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/06. School Gallery.jpg" alt="Library">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/Front Office (1).jpg" alt="Library">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/Front Office (2).jpg" alt="Library">
          </div>
        </div>

        <!-- Section 5 -->
        <div class="facility-row reveal">
          <div class="facility-text">
            <span class="facility-eyebrow">CO-CURRICULAR</span>
            <h3 class="facility-title">Activity Room</h3>
            <p class="facility-desc">It includes lots of learning-based fun activities for the pre-primary section. A colorful, safe, and vibrant space designed specifically for the cognitive and motor development of our youngest learners.</p>
          </div>
          <div class="facility-gallery" data-count="4">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/10. Class Room 01.jpg" alt="Activity">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/10. Class Room 02.jpg" alt="Activity">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/DSC01189.jpg" alt="Activity">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/DSC01193.jpg" alt="Activity">
          </div>
        </div>

        <!-- Section 6 -->
        <div class="facility-row reveal">
          <div class="facility-text">
            <span class="facility-eyebrow">CO-CURRICULAR</span>
            <h3 class="facility-title">Music and Dance Room</h3>
            <p class="facility-desc">Music and Dance Room is a vibrant space where rhythm and melodies come alive. It provides an ideal setting for students to express their creativity and hone their performing arts skills.</p>
          </div>
          <div class="facility-gallery" data-count="4">
            <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800" alt="Music">
            <img src="https://images.unsplash.com/photo-1571171637578-41bc2dd41cd2?auto=format&fit=crop&w=800" alt="Music">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/physics lab/Physic Lab (1).jpg" alt="Music">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/physics lab/Physic Lab (2).jpg" alt="Music">
          </div>
        </div>

        <!-- Section 7 -->
        <div class="facility-row reveal">
          <div class="facility-text">
            <span class="facility-eyebrow">CO-CURRICULAR</span>
            <h3 class="facility-title">Art and Craft</h3>
            <p class="facility-desc">Art & Craft room is a place where creativity flourishes. Students are encouraged to explore various mediums, express their imagination, and create beautiful artistic pieces under expert mentorship.</p>
          </div>
          <div class="facility-gallery" data-count="4">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/biology lab/08 Bio Lab 02.jpg" alt="Art">
            <img src="https://images.unsplash.com/photo-1581093458791-9f3c3900df4b?auto=format&fit=crop&w=800" alt="Art">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/physics lab/DSC05881.jpg" alt="Art">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/physics lab/DSC05885.jpg" alt="Art">
          </div>
        </div>

        <!-- Section 8 -->
        <div class="facility-row reveal">
          <div class="facility-text">
            <span class="facility-eyebrow">CO-CURRICULAR</span>
            <h3 class="facility-title">Smart Class Room</h3>
            <p class="facility-desc">A smart class room is a place where interactive learning takes center stage. High-definition interactive panels and audio-visual modules make complex concepts easy to understand and engaging.</p>
          </div>
          <div class="facility-gallery" data-count="2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/11. Smat Class.jpg" alt="Smart Class">
            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=800" alt="Auditorium">
          </div>
        </div>

        <!-- Section 9 -->
        <div class="facility-row reveal">
          <div class="facility-text">
            <span class="facility-eyebrow">SPORTS</span>
            <h3 class="facility-title">Sports Facilities</h3>
            <p class="facility-desc">Physical fitness is an essential part of education. Our campus boasts expansive grounds and facilities for both indoor and outdoor sports, encouraging teamwork, discipline, and healthy competition.</p>
          </div>
          <div class="facility-gallery" data-count="4">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/DSC01192.jpg" alt="Sports">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/DSC01194.jpg" alt="Sports">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/Transport.jpg" alt="Sports">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/Trasnports2.jpg" alt="Sports">
          </div>
        </div>



        <!-- Section 13 -->
        <div class="facility-row reveal">
          <div class="facility-text">
            <span class="facility-eyebrow">ACADEMIC FACILITIES</span>
            <h3 class="facility-title">Math Lab</h3>
            <p class="facility-desc">Our Math Lab makes learning mathematics a visual and hands-on experience. Equipped with modern learning models and interactive tools, it helps students understand complex mathematical concepts with ease.</p>
          </div>
          <div class="facility-gallery" data-count="2">
            <img src="https://images.unsplash.com/photo-1509228468518-180dd4864904?auto=format&fit=crop&w=800" alt="Math Lab">
            <img src="https://images.unsplash.com/photo-1596495578065-6e0763fa1178?auto=format&fit=crop&w=800" alt="Math Lab">
          </div>
        </div>

        <!-- Section 14 -->
        <div class="facility-row reveal">
          <div class="facility-text">
            <span class="facility-eyebrow">INFRASTRUCTURE</span>
            <h3 class="facility-title">Meeting Hall</h3>
            <p class="facility-desc">A sophisticated meeting hall equipped with modern audio-visual technology. It serves as a central hub for staff meetings, parent-teacher interactions, and professional development sessions.</p>
          </div>
          <div class="facility-gallery" data-count="2">
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800" alt="Meeting Hall">
            <img src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?auto=format&fit=crop&w=800" alt="Meeting Hall">
          </div>
        </div>

        <!-- Section 15 -->
        <div class="facility-row reveal">
          <div class="facility-text">
            <span class="facility-eyebrow">INFRASTRUCTURE</span>
            <h3 class="facility-title">Open Air Theatre</h3>
            <p class="facility-desc">Our spacious Open Air Theatre provides a magnificent backdrop for large-scale school events, cultural festivals, and morning assemblies, encouraging community spirit under the open sky.</p>
          </div>
          <div class="facility-gallery" data-count="2">
            <img src="https://images.unsplash.com/photo-1543326727-cf6c39e8f84c?auto=format&fit=crop&w=800" alt="Open Air Theatre">
            <img src="https://images.unsplash.com/photo-1576267423048-15c0040fec78?auto=format&fit=crop&w=800" alt="Open Air Theatre">
          </div>
        </div>

        <!-- Section 16 -->
        <div class="facility-row reveal" style="margin-bottom: 2rem;">
          <div class="facility-text">
            <span class="facility-eyebrow">CO-CURRICULAR</span>
            <h3 class="facility-title">Socially Useful Productive Work</h3>
            <p class="facility-desc">The SUPW curriculum is designed to instill a sense of dignity of labor and social responsibility. Students participate in community service and productive crafts, building strong moral character.</p>
          </div>
          <div class="facility-gallery" data-count="2">
            <img src="https://images.unsplash.com/photo-1593113580556-9d33b5c89dd1?auto=format&fit=crop&w=800" alt="SUPW">
            <img src="https://images.unsplash.com/photo-1603513360492-c15b136fb08a?auto=format&fit=crop&w=800" alt="SUPW">
          </div>
        </div>

      </div>
    </section>
</main>

<?php get_footer(); ?>
