<?php
/**
 * Template Name: Results Portal
 */

get_header(); ?>

<main>
    <section class="page-hero" style="padding: 10rem 0 12rem;">
      <div class="container">
        <h1 class="text-gradient">Acedamic Results</h1>
        <p>Accessing academic milestones and institutional performance records.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="results-container">
          <div class="results-header reveal">
            <div class="stat-badge">PUBLIC EXAMINATION PORTAL</div>
            <h2 style="font-family: 'Cinzel', serif; color: var(--primary);">Institutional Result Search</h2>
            <p>Students can check their individual performance summary by entering their credentials below.</p>

            <form id="results-search-form" style="max-width: 800px; margin: 2rem auto 0; background: #ffffff !important; padding: 2rem; border-radius: var(--radius-md); border: 1px solid var(--secondary); box-shadow: var(--shadow-lg);" novalidate>
              <!-- Bulletproof routing details -->
              <input type="hidden" name="action" value="search_student_result">
              <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'vps_enquiry_nonce' ); ?>">
              <input type="hidden" name="ajax_url" value="<?php echo admin_url( 'admin-ajax.php' ); ?>">

              <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1.5rem; text-align: left;">
                
                <!-- Class Selection -->
                <div>
                  <label style="display: block; font-weight: 700; margin-bottom: 0.5rem; font-size: 0.8rem; text-transform: uppercase; color: #002147 !important;">Select Class <span style="color: #ef4444;">*</span></label>
                  <select name="class_level" style="width: 100%; padding: 0.8rem 1rem; border-radius: var(--radius-sm); border: 1px solid var(--secondary); background: #ffffff !important; color: #1a1a1a !important; font-weight: 600; cursor: pointer; font-size: 0.95rem;">
                    <option value="Class X" style="color: #1a1a1a !important; background: #ffffff !important;">Class X (Secondary)</option>
                    <option value="Class XII" style="color: #1a1a1a !important; background: #ffffff !important;">Class XII (Sr. Secondary)</option>
                  </select>
                </div>

                <!-- Academic Year Selection -->
                <div>
                  <label style="display: block; font-weight: 700; margin-bottom: 0.5rem; font-size: 0.8rem; text-transform: uppercase; color: #002147 !important;">Academic Year <span style="color: #ef4444;">*</span></label>
                  <select name="academic_year" style="width: 100%; padding: 0.8rem 1rem; border-radius: var(--radius-sm); border: 1px solid var(--secondary); background: #ffffff !important; color: #1a1a1a !important; font-weight: 600; cursor: pointer; font-size: 0.95rem;">
                    <option value="2025-26" style="color: #1a1a1a !important; background: #ffffff !important;">2025 - 2026</option>
                    <option value="2024-25" style="color: #1a1a1a !important; background: #ffffff !important;">2024 - 2025</option>
                    <option value="2023-24" style="color: #1a1a1a !important; background: #ffffff !important;">2023 - 2024</option>
                  </select>
                </div>

                <!-- Roll Number Input -->
                <div>
                  <label style="display: block; font-weight: 700; margin-bottom: 0.5rem; font-size: 0.8rem; text-transform: uppercase; color: #002147 !important;">Roll Number <span style="color: #ef4444;">*</span></label>
                  <input type="text" name="roll_number" placeholder="Enter Board Roll Number" required style="width: 100%; padding: 0.8rem 1rem; border-radius: var(--radius-sm); border: 1px solid var(--secondary); background: #ffffff !important; color: #1a1a1a !important; font-weight: 600; font-size: 0.95rem;">
                  <span class="error-text" style="display: none; color: #ef4444; font-size: 0.75rem; margin-top: 4px; font-weight: 600;">Please enter your Board Roll Number.</span>
                </div>
              </div>

              <div id="search-status" style="display: none; padding: 12px 15px; border-radius: var(--radius-sm); font-size: 0.9rem; margin-top: 1.5rem; text-align: center; line-height: 1.4; font-weight: 600;"></div>
              
              <button type="submit" id="search-submit-btn" class="button" style="margin-top: 1.5rem; width: 100%; padding: 0.9rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase;">Search Board Result</button>
            </form>
          </div>

          <!-- Marksheet Output Display Wrapper -->
          <div id="search-result-display-wrapper" style="margin-bottom: 3rem; display: none;"></div>

          <style>
          .results-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 2rem;
            align-items: start;
            margin-top: 2.5rem;
          }
          .years-sidebar {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            background: #fff;
            padding: 1.5rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--line);
          }
          .year-selector-btn {
            padding: 1.2rem 1.5rem;
            border-radius: var(--radius-sm);
            border: 1px solid var(--line);
            background: var(--bg);
            color: var(--muted);
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            box-shadow: var(--shadow-sm);
          }
          .year-selector-btn:hover {
            background: #f8fafc;
            border-color: var(--secondary);
            color: var(--primary);
            transform: translateX(5px);
          }
          .year-selector-btn.active {
            background: #fff;
            color: var(--primary);
            font-weight: 700;
            border-color: var(--secondary);
            box-shadow: var(--shadow-md);
            border-left: 4px solid var(--secondary);
          }
          .year-selector-btn.active:hover {
            transform: none;
          }
          .results-pane {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            animation: fadeIn 0.4s ease-in-out;
          }
          @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
          }

          @media (max-width: 768px) {
            .results-layout {
              grid-template-columns: 1fr;
            }
            .years-sidebar {
              flex-direction: row;
              overflow-x: auto;
              padding: 1rem;
              gap: 0.5rem;
              justify-content: start;
              -webkit-overflow-scrolling: touch;
            }
            .year-selector-btn {
              flex: 0 0 auto;
              padding: 0.8rem 1.2rem;
              white-space: nowrap;
            }
            .year-selector-btn:hover {
              transform: none;
            }
            .year-selector-btn.active {
              border-left: 1px solid var(--secondary);
              border-bottom: 3px solid var(--secondary);
            }
          }
          </style>

          <div class="results-layout">
            <!-- Left Side: Year Selector Buttons -->
            <div class="years-sidebar">
              <h3 style="font-family: 'Cinzel', serif; color: var(--primary); font-size: 1.1rem; margin-bottom: 0.5rem; text-align: center; border-bottom: 2px solid var(--line); padding-bottom: 0.5rem;">Academic Year</h3>
              
              <button class="year-selector-btn active" data-year="2025-26">
                <span class="bullet" style="width: 8px; height: 8px; border-radius: 50%; background: var(--secondary); display: inline-block;"></span>
                <span>2025 - 2026</span>
              </button>
              
              <button class="year-selector-btn" data-year="2024-25">
                <span class="bullet" style="width: 8px; height: 8px; border-radius: 50%; background: transparent; display: inline-block; border: 1px solid var(--muted);"></span>
                <span>2024 - 2025</span>
              </button>
              
              <button class="year-selector-btn" data-year="2023-24">
                <span class="bullet" style="width: 8px; height: 8px; border-radius: 50%; background: transparent; display: inline-block; border: 1px solid var(--muted);"></span>
                <span>2023 - 2024</span>
              </button>
            </div>
            
            <!-- Right Side: Dynamic Results Display -->
            <div class="results-content-area" style="position: relative; min-height: 350px; width: 100%;">

              <style>
                .result-banner-wrap {
                  width: 100%;
                  grid-column: 1 / -1;
                }
                .result-banner-wrap img {
                  width: 100%;
                  height: auto;
                  display: block;
                  border-radius: 12px;
                  box-shadow: 0 6px 30px rgba(0,0,0,0.12);
                  object-fit: cover;
                }
              </style>
              
              <!-- Year 2025-26 Results Pane — Dynamic Topper Slider -->
              <div class="results-pane" id="results-pane-2025-26">
                <?php
                $toppers_2526 = new WP_Query( array(
                    'post_type'      => 'school_topper',
                    'posts_per_page' => 20,
                    'post_status'    => 'publish',
                    'meta_query'     => array(
                        array(
                            'key'     => '_topper_year',
                            'value'   => '2025-26',
                            'compare' => '='
                        )
                    )
                ) );
                ?>

                <style>
                  .topper-slider-wrap {
                    width: 100%;
                    grid-column: 1 / -1;
                    position: relative;
                    overflow: hidden;
                    border-radius: 14px;
                    background: linear-gradient(135deg, #002147 0%, #0a2a4e 100%);
                    box-shadow: 0 8px 40px rgba(0,33,71,0.18);
                    min-height: 320px;
                  }
                  .topper-slides-track {
                    display: flex;
                    transition: transform 0.55s cubic-bezier(0.4, 0, 0.2, 1);
                    will-change: transform;
                  }
                  .topper-slide {
                    min-width: 100%;
                    display: flex;
                    align-items: center;
                    gap: 2.5rem;
                    padding: 2.5rem 3rem;
                    box-sizing: border-box;
                  }
                  .topper-slide-img {
                    flex: 0 0 200px;
                    width: 200px;
                    height: 240px;
                    border-radius: 12px;
                    object-fit: cover;
                    border: 4px solid #d4af37;
                    box-shadow: 0 0 30px rgba(212,175,55,0.35);
                    background: #0a2a4e;
                  }
                  .topper-slide-avatar {
                    flex: 0 0 200px;
                    width: 200px;
                    height: 240px;
                    border-radius: 12px;
                    background: linear-gradient(135deg, #1a3a6e 0%, #0d2240 100%);
                    border: 4px solid #d4af37;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                  }
                  .topper-slide-info {
                    flex: 1;
                    color: #fff;
                  }
                  .topper-slide-info .ts-tag {
                    display: inline-block;
                    background: rgba(212,175,55,0.2);
                    color: #d4af37;
                    font-size: 0.75rem;
                    font-weight: 700;
                    letter-spacing: 2px;
                    text-transform: uppercase;
                    padding: 4px 14px;
                    border-radius: 99px;
                    border: 1px solid rgba(212,175,55,0.4);
                    margin-bottom: 0.8rem;
                  }
                  .topper-slide-info .ts-name {
                    font-family: 'Cinzel', serif;
                    font-size: 2rem;
                    font-weight: 700;
                    color: #fff;
                    line-height: 1.2;
                    margin-bottom: 0.5rem;
                  }
                  .topper-slide-info .ts-class {
                    font-size: 0.95rem;
                    color: #94a3b8;
                    margin-bottom: 1.2rem;
                  }
                  .topper-slide-info .ts-score {
                    font-size: 3.2rem;
                    font-weight: 800;
                    background: linear-gradient(135deg, #d4af37, #f5d073);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                    line-height: 1;
                    margin-bottom: 0.4rem;
                  }
                  .topper-slide-info .ts-score-label {
                    font-size: 0.8rem;
                    color: #64748b;
                    text-transform: uppercase;
                    letter-spacing: 1.5px;
                  }
                  .topper-slider-nav {
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    background: rgba(255,255,255,0.1);
                    border: 1px solid rgba(255,255,255,0.15);
                    color: #fff;
                    width: 42px;
                    height: 42px;
                    border-radius: 50%;
                    cursor: pointer;
                    font-size: 1.2rem;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    transition: background 0.3s;
                    z-index: 10;
                  }
                  .topper-slider-nav:hover { background: rgba(212,175,55,0.35); }
                  .topper-slider-prev { left: 1rem; }
                  .topper-slider-next { right: 1rem; }
                  .topper-slider-dots {
                    position: absolute;
                    bottom: 1rem;
                    left: 50%;
                    transform: translateX(-50%);
                    display: flex;
                    gap: 7px;
                  }
                  .topper-dot {
                    width: 8px; height: 8px;
                    border-radius: 50%;
                    background: rgba(255,255,255,0.3);
                    cursor: pointer;
                    transition: background 0.3s, transform 0.3s;
                    border: none;
                    padding: 0;
                  }
                  .topper-dot.active {
                    background: #d4af37;
                    transform: scale(1.3);
                  }
                  @media (max-width: 600px) {
                    .topper-slide { flex-direction: column; padding: 1.5rem; gap: 1rem; }
                    .topper-slide-img, .topper-slide-avatar { flex: none; width: 130px; height: 160px; }
                    .topper-slide-info .ts-name { font-size: 1.4rem; }
                    .topper-slide-info .ts-score { font-size: 2rem; }
                  }
                </style>

                <?php if ( $toppers_2526->have_posts() ) : ?>
                <div class="topper-slider-wrap" id="topper-slider-2526">
                  <div class="topper-slides-track" id="topper-track-2526">
                    <?php $slide_i = 0; while ( $toppers_2526->have_posts() ) : $toppers_2526->the_post();
                      $t_name  = get_the_title();
                      $t_class = get_post_meta( get_the_ID(), '_topper_class', true );
                      $t_score = get_post_meta( get_the_ID(), '_topper_percentage', true );
                      $t_rank  = get_post_meta( get_the_ID(), '_topper_rank', true );
                      $t_img   = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                    ?>
                    <div class="topper-slide">
                      <?php if ( $t_img ) : ?>
                        <img src="<?php echo esc_url( $t_img ); ?>" alt="<?php echo esc_attr( $t_name ); ?>" class="topper-slide-img">
                      <?php else : ?>
                        <div class="topper-slide-avatar">
                          <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#d4af37" stroke-width="1"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                        </div>
                      <?php endif; ?>
                      <div class="topper-slide-info">
                        <span class="ts-tag">🏆 <?php echo esc_html( $t_rank ? $t_rank : 'School Topper' ); ?></span>
                        <div class="ts-name"><?php echo esc_html( $t_name ); ?></div>
                        <div class="ts-class"><?php echo esc_html( $t_class ? 'Class ' . $t_class . ' &nbsp;|&nbsp; Session 2025-26' : 'Session 2025-26' ); ?></div>
                        <?php if ( $t_score ) : ?>
                        <div class="ts-score"><?php echo esc_html( $t_score ); ?>%</div>
                        <div class="ts-score-label">Overall Percentage</div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <?php $slide_i++; endwhile; wp_reset_postdata(); ?>
                  </div>

                  <?php if ( $slide_i > 1 ) : ?>
                  <button class="topper-slider-nav topper-slider-prev" onclick="topperSlide('2526', -1)">&#8249;</button>
                  <button class="topper-slider-nav topper-slider-next" onclick="topperSlide('2526', 1)">&#8250;</button>
                  <div class="topper-slider-dots" id="topper-dots-2526">
                    <?php for ( $d = 0; $d < $slide_i; $d++ ) : ?>
                      <button class="topper-dot <?php echo $d === 0 ? 'active' : ''; ?>" onclick="topperGoTo('2526', <?php echo $d; ?>)"></button>
                    <?php endfor; ?>
                  </div>
                  <?php endif; ?>
                </div>

                <script>
                (function() {
                  var sliderState = { '2526': { current: 0, total: <?php echo $slide_i; ?>, timer: null } };

                  window.topperGoTo = function(id, index) {
                    var state = sliderState[id];
                    if (!state) return;
                    state.current = index;
                    var track = document.getElementById('topper-track-' + id);
                    if (track) track.style.transform = 'translateX(-' + (index * 100) + '%)';
                    var dots = document.querySelectorAll('#topper-dots-' + id + ' .topper-dot');
                    dots.forEach(function(d, i) { d.classList.toggle('active', i === index); });
                    resetTimer(id);
                  };

                  window.topperSlide = function(id, dir) {
                    var state = sliderState[id];
                    if (!state) return;
                    var next = (state.current + dir + state.total) % state.total;
                    topperGoTo(id, next);
                  };

                  function resetTimer(id) {
                    var state = sliderState[id];
                    if (!state || state.total <= 1) return;
                    clearInterval(state.timer);
                    state.timer = setInterval(function() { topperSlide(id, 1); }, 3500);
                  }

                  // Start auto-slide
                  Object.keys(sliderState).forEach(function(id) { resetTimer(id); });
                })();
                </script>

                <?php else : ?>
                <!-- No toppers found — placeholder -->
                <div style="width:100%; min-height:280px; border-radius:14px; border:2px dashed #cbd5e1; background:#f8fafc; display:flex; align-items:center; justify-content:center; flex-direction:column; gap:1rem; color:#94a3b8; padding:2rem; text-align:center;">
                  <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="1.5"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                  <div>
                    <strong style="display:block; font-size:1rem; color:#475569;">No Toppers Added Yet for 2025-26</strong>
                    <span style="font-size:0.85rem;">Go to <strong>Dashboard → School Toppers → Add New</strong></span><br>
                    <span style="font-size:0.8rem;">Set year to <code>2025-26</code> and upload a Featured Image</span>
                  </div>
                </div>
                <?php endif; ?>
              </div>


              <!-- Year 2024-25 Results Pane — Dynamic Topper Slider -->
              <div class="results-pane" id="results-pane-2024-25" style="display: none;">
                <?php
                $toppers_2425 = new WP_Query( array(
                    'post_type'      => 'school_topper',
                    'posts_per_page' => 20,
                    'post_status'    => 'publish',
                    'meta_query'     => array(
                        array(
                            'key'     => '_topper_year',
                            'value'   => '2024-25',
                            'compare' => '='
                        )
                    )
                ) );
                ?>
                <?php if ( $toppers_2425->have_posts() ) :
                  $slide_2425 = 0; $slides_2425 = array();
                  while ( $toppers_2425->have_posts() ) : $toppers_2425->the_post();
                    $slides_2425[] = array(
                      'name'  => get_the_title(),
                      'class' => get_post_meta( get_the_ID(), '_topper_class', true ),
                      'score' => get_post_meta( get_the_ID(), '_topper_percentage', true ),
                      'rank'  => get_post_meta( get_the_ID(), '_topper_rank', true ),
                      'img'   => get_the_post_thumbnail_url( get_the_ID(), 'large' ),
                    );
                    $slide_2425++;
                  endwhile; wp_reset_postdata();
                ?>
                <div class="topper-slider-wrap" id="topper-slider-2425">
                  <div class="topper-slides-track" id="topper-track-2425">
                    <?php foreach ( $slides_2425 as $s ) : ?>
                    <div class="topper-slide">
                      <?php if ( $s['img'] ) : ?>
                        <img src="<?php echo esc_url( $s['img'] ); ?>" alt="<?php echo esc_attr( $s['name'] ); ?>" class="topper-slide-img">
                      <?php else : ?>
                        <div class="topper-slide-avatar">
                          <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#d4af37" stroke-width="1"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                        </div>
                      <?php endif; ?>
                      <div class="topper-slide-info">
                        <span class="ts-tag">🏆 <?php echo esc_html( $s['rank'] ? $s['rank'] : 'School Topper' ); ?></span>
                        <div class="ts-name"><?php echo esc_html( $s['name'] ); ?></div>
                        <div class="ts-class"><?php echo esc_html( $s['class'] ? 'Class ' . $s['class'] . ' &nbsp;|&nbsp; Session 2024-25' : 'Session 2024-25' ); ?></div>
                        <?php if ( $s['score'] ) : ?>
                        <div class="ts-score"><?php echo esc_html( $s['score'] ); ?>%</div>
                        <div class="ts-score-label">Overall Percentage</div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
                  <?php if ( $slide_2425 > 1 ) : ?>
                  <button class="topper-slider-nav topper-slider-prev" onclick="topperSlide('2425', -1)">&#8249;</button>
                  <button class="topper-slider-nav topper-slider-next" onclick="topperSlide('2425', 1)">&#8250;</button>
                  <div class="topper-slider-dots" id="topper-dots-2425">
                    <?php for ( $d = 0; $d < $slide_2425; $d++ ) : ?>
                      <button class="topper-dot <?php echo $d === 0 ? 'active' : ''; ?>" onclick="topperGoTo('2425', <?php echo $d; ?>)"></button>
                    <?php endfor; ?>
                  </div>
                  <?php endif; ?>
                </div>
                <script>
                (function(){
                  var s2425 = { current:0, total:<?php echo $slide_2425; ?>, timer:null };
                  function go2425(i){ s2425.current=i; var t=document.getElementById('topper-track-2425'); if(t) t.style.transform='translateX(-'+(i*100)+'%)'; document.querySelectorAll('#topper-dots-2425 .topper-dot').forEach(function(d,j){d.classList.toggle('active',j===i);}); reset2425(); }
                  function reset2425(){ clearInterval(s2425.timer); if(s2425.total>1) s2425.timer=setInterval(function(){go2425((s2425.current+1)%s2425.total);},3500); }
                  window.topperSlide = window.topperSlide || function(){};
                  var _origSlide = window.topperSlide;
                  window.topperSlide = function(id,dir){ if(id==='2425'){go2425((s2425.current+dir+s2425.total)%s2425.total);}else{_origSlide(id,dir);} };
                  var _origGoto = window.topperGoTo;
                  window.topperGoTo = function(id,i){ if(id==='2425'){go2425(i);}else if(_origGoto){_origGoto(id,i);} };
                  reset2425();
                })();
                </script>
                <?php else : ?>
                <div style="width:100%; min-height:280px; border-radius:14px; border:2px dashed #cbd5e1; background:#f8fafc; display:flex; align-items:center; justify-content:center; flex-direction:column; gap:1rem; color:#94a3b8; padding:2rem; text-align:center;">
                  <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="1.5"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                  <div>
                    <strong style="display:block; font-size:1rem; color:#475569;">No Toppers Added Yet for 2024-25</strong>
                    <span style="font-size:0.85rem;">Go to <strong>Dashboard → School Toppers → Add New</strong></span><br>
                    <span style="font-size:0.8rem;">Set year to <code>2024-25</code> and upload a Featured Image</span>
                  </div>
                </div>
                <?php endif; ?>
              </div>

              <!-- Year 2023-24 Results Pane — Dynamic Topper Slider -->
              <div class="results-pane" id="results-pane-2023-24" style="display: none;">
                <?php
                $toppers_2324 = new WP_Query( array(
                    'post_type'      => 'school_topper',
                    'posts_per_page' => 20,
                    'post_status'    => 'publish',
                    'meta_query'     => array(
                        array(
                            'key'     => '_topper_year',
                            'value'   => '2023-24',
                            'compare' => '='
                        )
                    )
                ) );
                ?>
                <?php if ( $toppers_2324->have_posts() ) :
                  $slide_2324 = 0; $slides_2324 = array();
                  while ( $toppers_2324->have_posts() ) : $toppers_2324->the_post();
                    $slides_2324[] = array(
                      'name'  => get_the_title(),
                      'class' => get_post_meta( get_the_ID(), '_topper_class', true ),
                      'score' => get_post_meta( get_the_ID(), '_topper_percentage', true ),
                      'rank'  => get_post_meta( get_the_ID(), '_topper_rank', true ),
                      'img'   => get_the_post_thumbnail_url( get_the_ID(), 'large' ),
                    );
                    $slide_2324++;
                  endwhile; wp_reset_postdata();
                ?>
                <div class="topper-slider-wrap" id="topper-slider-2324">
                  <div class="topper-slides-track" id="topper-track-2324">
                    <?php foreach ( $slides_2324 as $s ) : ?>
                    <div class="topper-slide">
                      <?php if ( $s['img'] ) : ?>
                        <img src="<?php echo esc_url( $s['img'] ); ?>" alt="<?php echo esc_attr( $s['name'] ); ?>" class="topper-slide-img">
                      <?php else : ?>
                        <div class="topper-slide-avatar">
                          <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#d4af37" stroke-width="1"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                        </div>
                      <?php endif; ?>
                      <div class="topper-slide-info">
                        <span class="ts-tag">🏆 <?php echo esc_html( $s['rank'] ? $s['rank'] : 'School Topper' ); ?></span>
                        <div class="ts-name"><?php echo esc_html( $s['name'] ); ?></div>
                        <div class="ts-class"><?php echo esc_html( $s['class'] ? 'Class ' . $s['class'] . ' &nbsp;|&nbsp; Session 2023-24' : 'Session 2023-24' ); ?></div>
                        <?php if ( $s['score'] ) : ?>
                        <div class="ts-score"><?php echo esc_html( $s['score'] ); ?>%</div>
                        <div class="ts-score-label">Overall Percentage</div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
                  <?php if ( $slide_2324 > 1 ) : ?>
                  <button class="topper-slider-nav topper-slider-prev" onclick="topperSlide('2324', -1)">&#8249;</button>
                  <button class="topper-slider-nav topper-slider-next" onclick="topperSlide('2324', 1)">&#8250;</button>
                  <div class="topper-slider-dots" id="topper-dots-2324">
                    <?php for ( $d = 0; $d < $slide_2324; $d++ ) : ?>
                      <button class="topper-dot <?php echo $d === 0 ? 'active' : ''; ?>" onclick="topperGoTo('2324', <?php echo $d; ?>)"></button>
                    <?php endfor; ?>
                  </div>
                  <?php endif; ?>
                </div>
                <script>
                (function(){
                  var s2324 = { current:0, total:<?php echo $slide_2324; ?>, timer:null };
                  function go2324(i){ s2324.current=i; var t=document.getElementById('topper-track-2324'); if(t) t.style.transform='translateX(-'+(i*100)+'%)'; document.querySelectorAll('#topper-dots-2324 .topper-dot').forEach(function(d,j){d.classList.toggle('active',j===i);}); reset2324(); }
                  function reset2324(){ clearInterval(s2324.timer); if(s2324.total>1) s2324.timer=setInterval(function(){go2324((s2324.current+1)%s2324.total);},3500); }
                  var _origSlide2 = window.topperSlide;
                  window.topperSlide = function(id,dir){ if(id==='2324'){go2324((s2324.current+dir+s2324.total)%s2324.total);}else if(_origSlide2){_origSlide2(id,dir);} };
                  var _origGoto2 = window.topperGoTo;
                  window.topperGoTo = function(id,i){ if(id==='2324'){go2324(i);}else if(_origGoto2){_origGoto2(id,i);} };
                  reset2324();
                })();
                </script>
                <?php else : ?>
                <div style="width:100%; min-height:280px; border-radius:14px; border:2px dashed #cbd5e1; background:#f8fafc; display:flex; align-items:center; justify-content:center; flex-direction:column; gap:1rem; color:#94a3b8; padding:2rem; text-align:center;">
                  <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="1.5"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                  <div>
                    <strong style="display:block; font-size:1rem; color:#475569;">No Toppers Added Yet for 2023-24</strong>
                    <span style="font-size:0.85rem;">Go to <strong>Dashboard → School Toppers → Add New</strong></span><br>
                    <span style="font-size:0.8rem;">Set year to <code>2023-24</code> and upload a Featured Image</span>
                  </div>
                </div>
                <?php endif; ?>
              </div>
              
            </div>
          </div>

          <script>
          document.addEventListener('DOMContentLoaded', () => {
              const selectorButtons = document.querySelectorAll('.year-selector-btn');
              const resultPanes = document.querySelectorAll('.results-pane');

              selectorButtons.forEach(btn => {
                  btn.addEventListener('click', () => {
                      const targetYear = btn.getAttribute('data-year');
                      
                      // Deactivate all buttons
                      selectorButtons.forEach(b => {
                          b.classList.remove('active');
                          const bullet = b.querySelector('.bullet');
                          if (bullet) {
                              bullet.style.background = 'transparent';
                              bullet.style.border = '1px solid var(--muted)';
                          }
                      });

                      // Activate current button
                      btn.classList.add('active');
                      const bullet = btn.querySelector('.bullet');
                      if (bullet) {
                          bullet.style.background = 'var(--secondary)';
                          bullet.style.border = 'none';
                      }

                      // Show target result pane
                      resultPanes.forEach(pane => {
                          if (pane.id === `results-pane-${targetYear}`) {
                              pane.style.display = 'grid';
                          } else {
                              pane.style.display = 'none';
                          }
                      });
                  });
              });

              // Result Dynamic Search Form AJAX submit handler
              const searchForm = document.getElementById('results-search-form');
              const searchSubmitBtn = document.getElementById('search-submit-btn');
              const searchStatus = document.getElementById('search-status');
              const marksheetWrapper = document.getElementById('search-result-display-wrapper');

              if (searchForm) {
                  searchForm.addEventListener('submit', (e) => {
                      e.preventDefault();

                      const rollField = searchForm.querySelector('input[name="roll_number"]');
                      const errorSpan = rollField ? rollField.closest('div').querySelector('.error-text') : null;

                      if (!rollField.value.trim()) {
                          rollField.style.borderColor = '#ef4444';
                          if (errorSpan) errorSpan.style.display = 'block';
                          rollField.focus();
                          return;
                      } else {
                          rollField.style.borderColor = 'var(--secondary)';
                          if (errorSpan) errorSpan.style.display = 'none';
                      }

                      // Show loading state
                      searchSubmitBtn.disabled = true;
                      searchSubmitBtn.textContent = 'Searching Records...';
                      searchStatus.style.display = 'block';
                      searchStatus.style.background = 'rgba(59, 130, 246, 0.1)';
                      searchStatus.style.color = '#2563eb';
                      searchStatus.style.border = '1px solid rgba(59, 130, 246, 0.2)';
                      searchStatus.textContent = 'Searching secure database, please wait...';
                      marksheetWrapper.style.display = 'none';

                      const formData = new FormData(searchForm);
                      const ajaxUrl = searchForm.querySelector('input[name="ajax_url"]').value;

                      fetch(ajaxUrl, {
                          method: 'POST',
                          body: formData
                      })
                      .then(response => response.json())
                      .then(data => {
                          searchSubmitBtn.disabled = false;
                          searchSubmitBtn.textContent = 'Search Board Result';

                          if (data.success) {
                              searchStatus.style.display = 'none';
                              marksheetWrapper.innerHTML = data.data.html;
                              marksheetWrapper.style.display = 'block';
                              marksheetWrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
                          } else {
                              searchStatus.style.background = 'rgba(239, 68, 68, 0.1)';
                              searchStatus.style.color = '#dc2626';
                              searchStatus.style.border = '1px solid rgba(239, 68, 68, 0.2)';
                              searchStatus.textContent = data.data.message || 'Result record not found.';
                          }
                      })
                      .catch(error => {
                          console.error('Error fetching result:', error);
                          searchSubmitBtn.disabled = false;
                          searchSubmitBtn.textContent = 'Search Board Result';
                          searchStatus.style.background = 'rgba(239, 68, 68, 0.1)';
                          searchStatus.style.color = '#dc2626';
                          searchStatus.style.border = '1px solid rgba(239, 68, 68, 0.2)';
                          searchStatus.textContent = 'A network error occurred. Please try again.';
                      });
                  });
              }
          });
          </script>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
