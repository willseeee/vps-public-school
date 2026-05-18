<?php get_header(); ?>

<main>
    <!-- 1. Hero Slider -->
    <section class="hero-slider">
      <?php
      $banner_args = array(
          'post_type' => 'banner',
          'posts_per_page' => -1,
          'orderby' => 'menu_order date',
          'order' => 'ASC'
      );
      $banner_query = new WP_Query($banner_args);
      $banner_count = $banner_query->found_posts;

      if ($banner_query->have_posts()) :
          $index = 0;
          while ($banner_query->have_posts()) : $banner_query->the_post();
              $active_class = ($index === 0) ? ' active' : '';
              
              // Get featured image URL
              $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
              if (!$img_url) {
                  $img_url = get_template_directory_uri() . '/assets/facilities/school photos/vps building.jpg'; // Fallback image
              }
              
              $description = get_post_meta(get_the_ID(), '_banner_description', true);
              $subtitle = get_post_meta(get_the_ID(), '_banner_subtitle', true);
              $btn1_text = get_post_meta(get_the_ID(), '_banner_btn1_text', true);
              $btn1_link = get_post_meta(get_the_ID(), '_banner_btn1_link', true);
              $btn2_text = get_post_meta(get_the_ID(), '_banner_btn2_text', true);
              $btn2_link = get_post_meta(get_the_ID(), '_banner_btn2_link', true);
              ?>
              <div class="slide<?php echo $active_class; ?>">
                <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>">
                <div class="slide-content">
                  <?php if (!empty($subtitle)) : ?>
                    <p class="eyebrow" style="color: var(--secondary);"><?php echo esc_html($subtitle); ?></p>
                  <?php endif; ?>
                  <h1><?php the_title(); ?></h1>
                  <p><?php echo nl2br(esc_html($description)); ?></p>
                  
                  <?php if (!empty($btn1_text) || !empty($btn2_text)) : ?>
                  <div class="slide-actions">
                    <?php if (!empty($btn1_text)) : ?>
                      <a href="<?php echo esc_url($btn1_link); ?>" class="button"><?php echo esc_html($btn1_text); ?></a>
                    <?php endif; ?>
                    <?php if (!empty($btn2_text)) : ?>
                      <a href="<?php echo esc_url($btn2_link); ?>" class="button button--ghost" style="color: #fff; border-color: #fff; margin-left: 1rem;"><?php echo esc_html($btn2_text); ?></a>
                    <?php endif; ?>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
              <?php
              $index++;
          endwhile;
          wp_reset_postdata();
      else :
          $banner_count = 3;
      ?>
      <div class="slide active">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/vps building.jpg" alt="Varanasi Public School campus building">
        <div class="slide-content">
          <p class="eyebrow" style="color: var(--secondary);">Welcome to Varanasi Public School</p>
          <h1>Excellence in Education </h1>
          <p>Nurturing young minds to become responsible global citizens through holistic learning and modern values.</p>
          <div class="slide-actions">
            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="button">Learn More</a>
            <a href="<?php echo esc_url( home_url( '/admission/' ) ); ?>" class="button button--ghost" style="color: #fff; border-color: #fff; margin-left: 1rem;">Admission Open</a>
          </div>
        </div>
      </div>
      <div class="slide">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/10. Class Room 01.jpg" alt="Students learning inside a classroom">
        <div class="slide-content">
          <p class="eyebrow" style="color: var(--secondary);">Modern Learning Environment</p>
          <h1>World Class Infrastructure</h1>
          <p>State-of-the-art facilities designed to provide the best possible educational experience for our students.</p>
          <div class="slide-actions">
            <a href="<?php echo esc_url( home_url( '/facilities/' ) ); ?>" class="button">Explore Campus</a>
          </div>
        </div>
      </div>
      <div class="slide">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/05 Library.jpg" alt="School library interior">
        <div class="slide-content">
          <p class="eyebrow" style="color: var(--secondary);">Holistic Development</p>
          <h1>Beyond the Classroom</h1>
          <p>Fostering creativity, sportsmanship, and leadership through a wide range of extra-curricular activities.</p>
          <div class="slide-actions">
            <a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" class="button">View Gallery</a>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <div class="slider-controls">
        <?php for ($i = 0; $i < max(1, $banner_count); $i++) : ?>
          <div class="slider-dot<?php echo ($i === 0) ? ' active' : ''; ?>"></div>
        <?php endfor; ?>
      </div>
    </section>

    <!-- 2. Value and Mission -->
    <section class="section section--mission" style="padding-bottom: 8rem;">
      <div class="container grid grid--2 align-center">
        <div class="mission-text reveal">
          <h2>Our Value and Mission</h2>
          <p>VPS is committed to providing a holistic education that empowers students to reach their full potential. We
            foster a nurturing environment that encourages academic excellence, character development, and a lifelong
            love for learning.</p>
          <p>We aim to create responsible global citizens who are prepared to face the challenges of tomorrow.</p>
          <ul class="check-list grid grid--2">
            <li><span class="check-icon">&#10003;</span> Academic Excellence</li>
            <li><span class="check-icon">&#10003;</span> Character Building</li>
            <li><span class="check-icon">&#10003;</span> Modern Infrastructure</li>
            <li><span class="check-icon">&#10003;</span> Dedicated Faculty Since 2003</li>
          </ul>
        </div>
        <div class="mission-image reveal">
          <div class="image-stack">
            <div class="image-stack__item image-stack__item--bottom">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/vps building.jpg" alt="VPS Campus">
            </div>
            <div class="image-stack__item image-stack__item--top">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/DSC01194.jpg" alt="Students at VPS">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 3. Stats Strip -->
    <section class="stats-strip reveal" style="margin-bottom: 30px;">
      <div class="container">
        <div class="stats-strip__inner">
          <div class="stat-item">
            <span class="stat-number">60+</span>
            <span class="stat-label">Qualified Staff</span>
          </div>
          <div class="stat-item">
            <span class="stat-number">50+</span>
            <span class="stat-label">Modern Rooms</span>
          </div>
          <div class="stat-item">
            <span class="stat-number">25+</span>
            <span class="stat-label">Campus Facilities</span>
          </div>
          <div class="stat-item">
            <span class="stat-number">25+</span>
            <span class="stat-label">Years Excellence</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Toppers & Achievers Slider Section -->
    <section class="section" style="background: linear-gradient(135deg, #002147 0%, #081a2e 100%); padding: 5rem 0; border-top: 1px solid rgba(212,175,55,0.3); border-bottom: 1px solid rgba(212,175,55,0.3); overflow: hidden; position: relative;">
      <!-- CSS Styles for high-quality banner responsiveness and hover transitions -->
      <style>
        .topper-banner-grid {
          display: grid;
          grid-template-columns: 1.2fr 0.8fr;
          gap: 4rem;
          align-items: center;
          max-width: 1000px;
          margin: 0 auto;
          width: 100%;
          text-align: left;
          padding: 2rem 0;
          box-sizing: border-box;
        }
        .topper-nav-btn:hover {
          background: #d4af37 !important;
          color: #002147 !important;
          box-shadow: 0 0 15px rgba(212,175,55,0.6) !important;
          transform: translateY(-50%) scale(1.1) !important;
        }
        @media (max-width: 768px) {
          .topper-banner-grid {
            grid-template-columns: 1fr !important;
            gap: 2rem !important;
            text-align: center !important;
            padding: 1rem 10px !important;
          }
          .topper-banner-grid > div {
            display: flex;
            flex-direction: column;
            align-items: center;
          }
          .topper-banner-grid h3 {
            font-size: 2.2rem !important;
          }
          .topper-score-row {
            flex-direction: column !important;
            gap: 0.8rem !important;
            align-items: center !important;
          }
        }
      </style>

      <div class="container">
        
        <div class="section-heading center reveal" style="text-align: center; margin-bottom: 3rem;">
          <!-- <p class="eyebrow" style="color: #d4af37 !important; font-weight: 700; text-transform: uppercase; letter-spacing: 2px;">Academic Luminaries</p> -->
          <h2 style="font-family: 'Cinzel', serif; font-size: 2.4rem; color: #ffffff !important; margin-top: 5px; text-shadow: 0 2px 0px ;">Toppers & Achievers</h2>
          <p style="color: #94a3b8 !important; max-width: 600px; margin: 10px auto 0;">Fostering an environment of intellectual growth and celebrating the spectacular academic milestones of our students.</p>
        </div>

        <?php
        $toppers_query = new WP_Query( array(
            'post_type'      => 'school_topper',
            'posts_per_page' => 12,
            'post_status'    => 'publish'
        ) );

        if ( $toppers_query->have_posts() ) :
        ?>
        <div style="position: relative; max-width: 1000px; margin: 0 auto; padding: 0 50px;">
          <!-- Viewport -->
          <div class="topper-slider-viewport" style="overflow: hidden; width: 100%;">
            <div class="topper-slider-track" style="display: flex; transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1); width: 100%;">
              
              <?php 
              $index = 0;
              while ( $toppers_query->have_posts() ) : $toppers_query->the_post(); 
                  $percentage = get_post_meta( get_the_ID(), '_topper_percentage', true );
                  $class      = get_post_meta( get_the_ID(), '_topper_class', true );
                  $year       = get_post_meta( get_the_ID(), '_topper_year', true );
                  $rank       = get_post_meta( get_the_ID(), '_topper_rank', true );
                  $thumb_url  = get_the_post_thumbnail_url( get_the_ID(), 'large' ); // Use large JPG image size
              ?>
                <div class="topper-slide-item" style="flex: 0 0 100%; width: 100%; box-sizing: border-box; padding: 10px;">
                  <div class="topper-banner-grid">
                    
                    <!-- Text details column -->
                    <div>
                      <span style="color: #d4af37 !important; font-size: 0.9rem; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 0.5rem;">VPS Academic Champion</span>
                      <h3 style="font-family: 'Cinzel', serif; font-size: 2.8rem; color: #ffffff !important; margin: 0 0 1.2rem; font-weight: 700; line-height: 1.2; text-shadow: 0 2px 4px rgba(0,0,0,0.3);"><?php the_title(); ?></h3>
                      
                      <!-- Score Row -->
                      <div class="topper-score-row" style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 1.8rem;">
                        <div style="background: linear-gradient(135deg, #d4af37, #aa7c11); color: #ffffff !important; font-size: 2rem; font-weight: 800; padding: 10px 25px; border-radius: var(--radius-md); box-shadow: 0 8px 20px rgba(212,175,55,0.3); border: 2px solid rgba(255,255,255,0.2); font-family: 'Outfit', sans-serif;">
                          <?php echo esc_html( $percentage ); ?>
                        </div>
                        <div>
                          <p style="margin: 0; font-size: 1.2rem; color: #f1f5f9 !important; font-weight: 700;"><?php echo esc_html( $class ); ?></p>
                          <span style="font-size: 0.9rem; color: #94a3b8 !important; font-weight: 600;">Academic Session: <?php echo esc_html( $year ); ?></span>
                        </div>
                      </div>

                      <?php if ( $rank ) : ?>
                        <div style="display: inline-block; background: rgba(212, 175, 55, 0.12); border: 1px solid rgba(212,175,55,0.35); color: #ffd700 !important; padding: 6px 18px; border-radius: 99px; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                          🏆 <?php echo esc_html( $rank ); ?>
                        </div>
                      <?php endif; ?>
                    </div>

                    <!-- Portrait JPG Image column -->
                    <div style="display: flex; justify-content: center;">
                      <div class="topper-image-frame" style="position: relative; width: 280px; height: 350px; border-radius: var(--radius-lg); border: 5px solid #d4af37; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5); overflow: hidden; background: #081e33; transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);">
                        <!-- Soft golden glow background inside frame -->
                        <div style="position: absolute; inset: 0; background: radial-gradient(circle at center, rgba(212,175,55,0.15) 0%, transparent 70%); z-index: 1;"></div>
                        
                        <?php if ( $thumb_url ) : ?>
                          <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 100%; object-fit: cover; position: relative; z-index: 2; transition: transform 0.5s ease;">
                        <?php else : ?>
                          <!-- Luxury default avatar placeholder if no JPG uploaded yet -->
                          <div style="width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative; z-index: 2; background: linear-gradient(135deg, #002147, #0b1e33); padding: 2rem; box-sizing: border-box;">
                            <svg viewBox="0 0 24 24" style="width: 100px; height: 100px; fill: #d4af37; filter: drop-shadow(0 4px 10px rgba(0,0,0,0.3));">
                              <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                            <span style="color: #94a3b8; font-size: 0.85rem; font-weight: 700; margin-top: 1rem; text-transform: uppercase; letter-spacing: 1px;">Photo Pending</span>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>

                  </div>
                </div>
              <?php 
                  $index++;
              endwhile; 
              wp_reset_postdata();
              ?>
              
            </div>
          </div>

          <!-- Slider Arrow Controls -->
          <button id="topper-prev-arrow" class="topper-nav-btn" style="position: absolute; top: 50%; left: -10px; transform: translateY(-50%); width: 45px; height: 45px; border-radius: 50%; background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(212,175,55,0.4); color: #d4af37; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 4px 15px rgba(0,0,0,0.3); transition: all 0.3s; z-index: 10;">
            <svg viewBox="0 0 24 24" style="width: 24px; height: 24px; fill: currentColor;">
              <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
            </svg>
          </button>
          <button id="topper-next-arrow" class="topper-nav-btn" style="position: absolute; top: 50%; right: -10px; transform: translateY(-50%); width: 45px; height: 45px; border-radius: 50%; background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(212,175,55,0.4); color: #d4af37; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 4px 15px rgba(0,0,0,0.3); transition: all 0.3s; z-index: 10;">
            <svg viewBox="0 0 24 24" style="width: 24px; height: 24px; fill: currentColor;">
              <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
            </svg>
          </button>

          <!-- Dot Indicators -->
          <div id="topper-dots-container" style="display: flex; justify-content: center; gap: 8px; margin-top: 1.5rem;"></div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const track = document.querySelector('.topper-slider-track');
            const slides = document.querySelectorAll('.topper-slide-item');
            const prevArrow = document.getElementById('topper-prev-arrow');
            const nextArrow = document.getElementById('topper-next-arrow');
            const dotsContainer = document.getElementById('topper-dots-container');

            if (!track || slides.length === 0) return;

            let currentSlideIndex = 0;
            const slideCount = slides.length;
            let slideAutoTimer;

            // Generate Dot indicators dynamically
            for (let i = 0; i < slideCount; i++) {
                const dot = document.createElement('div');
                dot.style.width = '10px';
                dot.style.height = '10px';
                dot.style.borderRadius = '50%';
                dot.style.background = i === 0 ? '#d4af37' : 'rgba(255, 255, 255, 0.2)';
                dot.style.cursor = 'pointer';
                dot.style.transition = 'all 0.3s';
                dot.addEventListener('click', () => {
                    goToSlide(i);
                    resetTimer();
                });
                dotsContainer.appendChild(dot);
            }

            const dots = dotsContainer.querySelectorAll('div');

            function updateArrows() {
                prevArrow.style.opacity = slideCount <= 1 ? '0.5' : '1';
                nextArrow.style.opacity = slideCount <= 1 ? '0.5' : '1';
            }

            function goToSlide(index) {
                currentSlideIndex = (index + slideCount) % slideCount;
                track.style.transform = `translateX(-${currentSlideIndex * 100}%)`;
                
                // Update dots active classes
                dots.forEach((dot, idx) => {
                    dot.style.background = idx === currentSlideIndex ? '#d4af37' : 'rgba(255, 255, 255, 0.2)';
                    dot.style.width = idx === currentSlideIndex ? '24px' : '10px';
                    dot.style.borderRadius = idx === currentSlideIndex ? '99px' : '50%';
                });
            }

            function nextSlide() {
                goToSlide(currentSlideIndex + 1);
            }

            function prevSlide() {
                goToSlide(currentSlideIndex - 1);
            }

            function startTimer() {
                slideAutoTimer = setInterval(nextSlide, 4500);
            }

            function resetTimer() {
                clearInterval(slideAutoTimer);
                startTimer();
            }

            // Events
            prevArrow.addEventListener('click', () => {
                prevSlide();
                resetTimer();
            });

            nextArrow.addEventListener('click', () => {
                nextSlide();
                resetTimer();
            });

            // Hover zoom micro-animations
            slides.forEach(slide => {
                const imgFrame = slide.querySelector('.topper-image-frame');
                const img = slide.querySelector('img');
                
                slide.addEventListener('mouseenter', () => {
                    clearInterval(slideAutoTimer);
                    if (imgFrame) imgFrame.style.transform = 'scale(1.03) translateY(-5px)';
                    if (img) img.style.transform = 'scale(1.08)';
                });
                
                slide.addEventListener('mouseleave', () => {
                    startTimer();
                    if (imgFrame) imgFrame.style.transform = 'scale(1) translateY(0)';
                    if (img) img.style.transform = 'scale(1)';
                });
            });

            // Initialize slider states
            goToSlide(0);
            updateArrows();
            startTimer();
        });
        </script>
        <?php endif; ?>

      </div>
    </section>

    <!-- 4. Discover Section -->
    <section class="section">
      <div class="container">
        <div class="section-heading center reveal">
          <p class="eyebrow">Discover Our Excellence</p>
          <h2 style="font-size: 36px;">Experience Varanasi Public School</h2>
          <p>We are dedicated to fostering an environment where students can thrive academically, socially, and
            emotionally, preparing them for the challenges of the 21st century.</p>
        </div>
        <div class="grid grid--2 align-center mt-4" style="margin-top: -30px;">
          <div class="discover-features">
            <div class="discover-feature reveal">
              <div class="df-icon"><svg viewBox="0 0 24 24">
                  <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3z" />
                </svg></div>
              <div>
                <h4>World Class Facilities</h4>
                <p>State-of-the-art classrooms, advanced science labs, and comprehensive sports complexes.</p>
              </div>
            </div>
            <div class="discover-feature reveal">
              <div class="df-icon"><svg viewBox="0 0 24 24">
                  <path
                    d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z" />
                </svg></div>
              <div>
                <h4>Co-Curricular Growth</h4>
                <p>A vibrant range of activities including performing arts, music, and competitive sports.</p>
              </div>
            </div>
            <div class="discover-feature reveal">
              <div class="df-icon"><svg viewBox="0 0 24 24">
                  <path
                    d="M21 5c-1.11-.35-2.33-.5-3.5-.5-1.95 0-4.05.4-5.5 1.5-1.45-1.1-3.55-1.5-5.5-1.5S2.45 4.9 1 6v14.65c0 .25.25.5.5.5.1 0 .15-.05.25-.05C3.1 20.45 5.05 20 6.5 20c1.95 0 4.05.4 5.5 1.5 1.35-.85 3.8-1.5 5.5-1.5 1.65 0 3.35.3 4.75 1.05.1.05.15.05.25.05.25 0 .5-.25.5-.5V6c-.6-.45-1.25-.75-2-1zm-1 13.5c-1.1-.35-2.3-.5-3.5-.5-1.7 0-4.15.65-5.5 1.5V8c1.35-.85 3.8-1.5 5.5-1.5 1.2 0 2.4.15 3.5.5v11.5z" />
                </svg></div>
              <div>
                <h4>Expert Mentorship</h4>
                <p>Our dedicated educators are experts in their fields, passionate about student success.</p>
              </div>
            </div>
          </div>
          <div class="discover-image reveal">
            <div class="image-stack">
              <div class="image-stack__item image-stack__item--bottom">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/Front Office (1).jpg" alt="VPS Front Office">
              </div>
              <div class="image-stack__item image-stack__item--top">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/10. Class Room 02.jpg" alt="Students in Class">
              </div>
              <div class="image-stack__badge">
                <div class="badge-content">
                  <span class="badge-number">20+</span>
                  <span class="badge-text">Years of<br>Excellence</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 5. Extra Curricular Activities -->
    <section class="section section--soft" style="display: none;">
      <div class="container">
        <div class="section-heading center reveal" style="margin-top: -40px;">
          <p class="eyebrow">Life at VPS</p>
          <h2 style="font-size: 36px;">Extra Curricular Activities</h2>
          <p>We believe in building balanced personalities through exposure to various fields beyond academics.</p>
        </div>
        <div class="grid grid--3 mt-4" style="margin-top: -30px;">
          <div class="activity-card reveal">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/02 MPH Hall.jpg" alt="Taekwondo at VPS">
            <div class="ac-content">
              <h4>Taekwondo</h4>
              <p>Physical fitness and discipline through martial arts training.</p>
            </div>
            <div class="ac-arrow">&#8594;</div>
          </div>
          <div class="activity-card reveal">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/school photos/Transport.jpg" alt="Basketball at VPS">
            <div class="ac-content">
              <h4>Basketball</h4>
              <p>Developing teamwork and athleticism on our professional courts.</p>
            </div>
            <div class="ac-arrow">&#8594;</div>
          </div>
          <div class="activity-card reveal">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/01. Auditoriam.jpg" alt="Swimming at VPS">
            <div class="ac-content">
              <h4>Swimming</h4>
              <p>Building endurance and aquatic skills in our modern pool.</p>
            </div>
            <div class="ac-arrow">&#8594;</div>
          </div>
        </div>
      </div>
    </section>

    <!-- 6. Gallery & Enquiry -->
    <section class="section">
      <div class="container">
        <div class="section-heading center reveal">
          <p class="eyebrow">Connect With Us</p>
          <h2 style="font-size: 36px;">School Gallery & Enquiry</h2>
          <p>Get a glimpse of our campus life or reach out to us for admission details.</p>
        </div>
        <div class="grid grid--gallery-form mt-4">
          <div class="gallery-grid reveal">
            <div class="home-gallery-item" onclick="openLightbox(0)">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/06. School Gallery.jpg" alt="Gallery 1">
              <div class="gallery-overlay"><svg viewBox="0 0 24 24">
                  <path
                    d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                </svg></div>
            </div>
            <div class="home-gallery-item" onclick="openLightbox(1)">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/11. Smat Class.jpg" alt="Gallery 2">
              <div class="gallery-overlay"><svg viewBox="0 0 24 24">
                  <path
                    d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                </svg></div>
            </div>
            <div class="home-gallery-item" onclick="openLightbox(2)">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/computer lab/04. PGT Computer  Lab.jpg" alt="Computer Lab">
              <div class="gallery-overlay"><svg viewBox="0 0 24 24">
                  <path
                    d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                </svg></div>
            </div>
            <div class="home-gallery-item" onclick="openLightbox(3)">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/biology lab/08 Bio Lab 01.jpg" alt="Biology Lab">
              <div class="gallery-overlay"><svg viewBox="0 0 24 24">
                  <path
                    d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                </svg></div>
            </div>
            <div class="home-gallery-item" onclick="openLightbox(4)">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/chemistry-lab/09 Chemistry Lab 01.jpg" alt="Chemistry Lab">
              <div class="gallery-overlay"><svg viewBox="0 0 24 24">
                  <path
                    d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                </svg></div>
            </div>
            <div class="home-gallery-item" onclick="openLightbox(5)">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/facilities/physics lab/07 Physics Lab 01.jpg" alt="Physics Lab">
              <div class="gallery-overlay"><svg viewBox="0 0 24 24">
                  <path
                    d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                </svg></div>
            </div>
          </div>
          <div class="enquiry-card reveal">
            <div class="enquiry-form">
              <h3>Enquiry Form</h3>
              <form id="home-enquiry-form">
                <div class="form-row grid grid--2">
                  <input type="text" name="your_name" placeholder="Your Name" required>
                  <input type="tel" name="mobile_no" placeholder="Mobile No." required>
                </div>
                <div class="form-row grid grid--2">
                  <input type="text" name="child_name" placeholder="Child Name" required>
                  <select name="selected_class" required>
                    <option value="" disabled selected>Select Class</option>
                    <option>Nursery - Section A</option>
                    <option>Nursery - Section B</option>
                    <option>Nursery - Section C</option>
                    <option>Nursery - Section D</option>
                    <option>LKG - Section A</option>
                    <option>LKG - Section B</option>
                    <option>LKG - Section C</option>
                    <option>LKG - Section D</option>
                    <option>UKG - Section A</option>
                    <option>UKG - Section B</option>
                    <option>UKG - Section C</option>
                    <option>UKG - Section D</option>
                    <option>Class 1 - Section A</option>
                    <option>Class 1 - Section B</option>
                    <option>Class 1 - Section C</option>
                    <option>Class 1 - Section D</option>
                    <option>Class 2 - Section A</option>
                    <option>Class 2 - Section B</option>
                    <option>Class 2 - Section C</option>
                    <option>Class 2 - Section D</option>
                    <option>Class 3 - Section A</option>
                    <option>Class 3 - Section B</option>
                    <option>Class 3 - Section C</option>
                    <option>Class 3 - Section D</option>
                    <option>Class 4 - Section A</option>
                    <option>Class 4 - Section B</option>
                    <option>Class 4 - Section C</option>
                    <option>Class 4 - Section D</option>
                    <option>Class 5 - Section A</option>
                    <option>Class 5 - Section B</option>
                    <option>Class 5 - Section C</option>
                    <option>Class 5 - Section D</option>
                    <option>Class 6 - Section A</option>
                    <option>Class 6 - Section B</option>
                    <option>Class 6 - Section C</option>
                    <option>Class 6 - Section D</option>
                    <option>Class 7 - Section A</option>
                    <option>Class 7 - Section B</option>
                    <option>Class 7 - Section C</option>
                    <option>Class 7 - Section D</option>
                    <option>Class 8 - Section A</option>
                    <option>Class 8 - Section B</option>
                    <option>Class 8 - Section C</option>
                    <option>Class 8 - Section D</option>
                    <option>Class 9 - Section A</option>
                    <option>Class 9 - Section B</option>
                    <option>Class 9 - Section C</option>
                    <option>Class 9 - Section D</option>
                    <option>Class 10 - Section A</option>
                    <option>Class 10 - Section B</option>
                    <option>Class 10 - Section C</option>
                    <option>Class 10 - Section D</option>
                    <option>Class 11 - Section A</option>
                    <option>Class 11 - Section B</option>
                    <option>Class 11 - Section C</option>
                    <option>Class 11 - Section D</option>
                    <option>Class 12 - Section A</option>
                    <option>Class 12 - Section B</option>
                    <option>Class 12 - Section C</option>
                    <option>Class 12 - Section D</option>
                  </select>
                </div>
                <div class="form-row">
                  <textarea name="message" placeholder="Your Message..." rows="4"></textarea>
                </div>
                <button type="submit" class="button button--full">Send Enquiry</button>
                <div class="form-status" id="enquiry-form-status"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="lightbox">
      <span class="close-lightbox" onclick="closeLightbox()">&times;</span>
      <button class="lightbox-prev" onclick="changeImage(-1)">&#10094;</button>
      <button class="lightbox-next" onclick="changeImage(1)">&#10095;</button>
      <div class="lightbox-content">
        <img id="lightbox-img" src="" alt="Enlarged view">
      </div>
    </div>

    <style>
      .home-gallery-item {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        cursor: pointer;
        aspect-ratio: 1/1;
      }

      .home-gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
      }

      .gallery-overlay {
        position: absolute;
        inset: 0;
        background: rgba(26, 42, 68, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
      }

      .gallery-overlay svg {
        width: 32px;
        height: 32px;
        fill: white;
        transform: scale(0.5);
        transition: transform 0.3s ease;
      }

      .home-gallery-item:hover img {
        transform: scale(1.1);
      }

      .home-gallery-item:hover .gallery-overlay {
        opacity: 1;
      }

      .home-gallery-item:hover .gallery-overlay svg {
        transform: scale(1);
      }

      /* Lightbox Styles */
      .lightbox {
        display: none;
        position: fixed;
        z-index: 9999;
        inset: 0;
        background: rgba(0, 0, 0, 0.9);
        backdrop-filter: blur(8px);
        align-items: center;
        justify-content: center;
        padding: 2rem;
        animation: fadeIn 0.3s ease;
      }

      .lightbox-content {
        max-width: 90%;
        max-height: 90vh;
        position: relative;
      }

      .lightbox-content img {
        max-width: 100%;
        max-height: 90vh;
        border-radius: 8px;
        box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
        animation: zoomIn 0.3s ease;
      }

      .close-lightbox {
        position: absolute;
        top: 2rem;
        right: 2rem;
        color: white;
        font-size: 3rem;
        cursor: pointer;
        line-height: 1;
        z-index: 10000;
      }

      .lightbox-prev,
      .lightbox-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.1);
        border: none;
        color: white;
        padding: 1.5rem 1rem;
        cursor: pointer;
        font-size: 2rem;
        border-radius: 4px;
        transition: background 0.3s;
        z-index: 10000;
      }

      .lightbox-prev:hover,
      .lightbox-next:hover {
        background: rgba(255, 255, 255, 0.2);
      }

      .lightbox-prev {
        left: 2rem;
      }

      .lightbox-next {
        right: 2rem;
      }

      @keyframes fadeIn {
        from {
          opacity: 0;
        }

        to {
          opacity: 1;
        }
      }

      @keyframes zoomIn {
        from {
          transform: scale(0.9);
          opacity: 0;
        }

        to {
          transform: scale(1);
          opacity: 1;
        }
      }
    </style>

    <script>
      let currentImgIndex = 0;
      const images = [
        '<?php echo get_template_directory_uri(); ?>/assets/facilities/06. School Gallery.jpg',
        '<?php echo get_template_directory_uri(); ?>/assets/facilities/11. Smat Class.jpg',
        '<?php echo get_template_directory_uri(); ?>/assets/facilities/computer lab/04. PGT Computer  Lab.jpg',
        '<?php echo get_template_directory_uri(); ?>/assets/facilities/biology lab/08 Bio Lab 01.jpg',
        '<?php echo get_template_directory_uri(); ?>/assets/facilities/chemistry-lab/09 Chemistry Lab 01.jpg',
        '<?php echo get_template_directory_uri(); ?>/assets/facilities/physics lab/07 Physics Lab 01.jpg'
      ];

      function openLightbox(index) {
        currentImgIndex = index;
        document.getElementById('lightbox-img').src = images[currentImgIndex];
        document.getElementById('lightbox').style.display = 'flex';
        document.body.style.overflow = 'hidden';
      }

      function closeLightbox() {
        document.getElementById('lightbox').style.display = 'none';
        document.body.style.overflow = 'auto';
      }

      function changeImage(step) {
        currentImgIndex += step;
        if (currentImgIndex >= images.length) currentImgIndex = 0;
        if (currentImgIndex < 0) currentImgIndex = images.length - 1;
        document.getElementById('lightbox-img').src = images[currentImgIndex];
      }

      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowRight') changeImage(1);
        if (e.key === 'ArrowLeft') changeImage(-1);
      });

      document.getElementById('lightbox').addEventListener('click', (e) => {
        if (e.target.id === 'lightbox') closeLightbox();
      });
    </script>
</main>

<?php get_footer(); ?>
