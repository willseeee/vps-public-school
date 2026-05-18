<?php
/**
 * Template Name: Gallery
 */

get_header(); ?>

<main>
    <section class="page-hero">
      <div class="container">
        <p class="breadcrumb">Home / Gallery</p>
        <h1>Gallery</h1>
        <p>A dedicated page for photos, video, events, activities, and school news.</p>
      </div>
    </section>
    <section class="section section--soft">
      <div class="container">
        <div class="section-heading reveal">
          <p class="eyebrow">Visual Journey</p>
          <h2 class="text-gradient">Moments of Excellence & Joy</h2>
          <p>Explore the vibrant life at Varanasi Public School through our curated collection of photos, videos, and
            news highlights.</p>
        </div>

        <div class="gallery-filters reveal">
          <button class="filter-btn active" data-filter="photos">Photos</button>
          <button class="filter-btn" data-filter="videos">Videos</button>
          <button class="filter-btn" data-filter="news">News</button>
          <button class="filter-btn" data-filter="events">Events</button>
        </div>

        <div class="gallery-container">
          <div class="grid grid--3 gallery-main-grid">
            <?php
            $gallery_query = new WP_Query( array(
                'post_type'      => 'gallery_item',
                'posts_per_page' => 100,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC'
            ) );

            $lightbox_images = array();
            $lightbox_index  = 0;

            if ( $gallery_query->have_posts() ) :
                while ( $gallery_query->have_posts() ) : $gallery_query->the_post();
                    $type = get_post_meta( get_the_ID(), '_gallery_item_type', true );
                    if ( empty( $type ) ) {
                        $type = 'photo';
                    }

                    // Render dynamic content based on type
                    if ( $type === 'photo' ) {
                        $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                        if ( ! $thumb_url ) {
                            $fallback = get_post_meta( get_the_ID(), '_gallery_image_url', true );
                            if ( $fallback ) {
                                $thumb_url = get_template_directory_uri() . $fallback;
                            }
                        }
                        if ( $thumb_url ) {
                            $lightbox_images[] = $thumb_url;
                        }
                        ?>
                        <article class="card glass reveal gallery-item-wrap" data-category="photos" style="padding: 1rem;">
                          <div class="card-media" style="margin: 0 0 1rem; cursor: pointer;" onclick="openLightbox(<?php echo $lightbox_index; ?>)">
                            <?php if ( $thumb_url ) : ?>
                              <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>" class="gallery-thumb">
                            <?php endif; ?>
                          </div>
                        </article>
                        <?php
                        $lightbox_index++;

                    } elseif ( $type === 'video' ) {
                        $video_url = get_post_meta( get_the_ID(), '_gallery_video_url', true );
                        // Format embed URL if necessary
                        if ( $video_url ) {
                            if ( strpos( $video_url, 'youtube.com/watch?v=' ) !== false ) {
                                $parts = parse_url( $video_url );
                                parse_str( $parts['query'], $query );
                                $video_url = 'https://www.youtube.com/embed/' . $query['v'];
                            } elseif ( strpos( $video_url, 'youtu.be/' ) !== false ) {
                                $id = substr( strrchr( $video_url, '/' ), 1 );
                                $video_url = 'https://www.youtube.com/embed/' . $id;
                            } elseif ( strpos( $video_url, 'youtube.com/embed/' ) === false ) {
                                $video_url = 'https://www.youtube.com/embed/' . $video_url;
                            }
                        } else {
                            $video_url = 'https://www.youtube.com/embed/rnvLDK0zgCE';
                        }
                        ?>
                        <article class="card glass reveal gallery-item-wrap" data-category="videos" style="padding: 0.5rem; overflow: hidden;">
                          <iframe width="100%" height="250" src="<?php echo esc_url( $video_url ); ?>"
                            title="<?php the_title_attribute(); ?>" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen style="border-radius: 8px;"></iframe>
                        </article>
                        <?php

                    } elseif ( $type === 'news' ) {
                        $news_link = get_post_meta( get_the_ID(), '_gallery_news_link', true );
                        if ( empty( $news_link ) ) {
                            $news_link = '#';
                        }
                        ?>
                        <article class="card glass reveal gallery-item-wrap" data-category="news" style="padding: 1.5rem;">
                          <span style="font-size: 0.8rem; color: var(--primary); font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;"><?php echo get_the_date( 'F j, Y' ); ?></span>
                          <h4 style="color: var(--primary); font-family: 'Cinzel', serif; margin: 0.5rem 0;"><?php the_title(); ?></h4>
                          <div style="font-size: 0.95rem; color: var(--muted); margin-bottom: 1rem;">
                            <?php the_content(); ?>
                          </div>
                          <a href="<?php echo esc_url( $news_link ); ?>" style="color: var(--primary); font-weight: 600; text-decoration: none; font-size: 0.9rem;">Read More &rarr;</a>
                        </article>
                        <?php

                    } elseif ( $type === 'event' ) {
                        $event_location = get_post_meta( get_the_ID(), '_gallery_event_location', true );
                        $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                        if ( ! $thumb_url ) {
                            $fallback = get_post_meta( get_the_ID(), '_gallery_image_url', true );
                            if ( $fallback ) {
                                $thumb_url = get_template_directory_uri() . $fallback;
                            }
                        }
                        if ( $thumb_url ) {
                            $lightbox_images[] = $thumb_url;
                        }
                        ?>
                        <article class="card glass reveal gallery-item-wrap" data-category="events" style="padding: 1rem;">
                          <div class="card-media" style="margin: 0 0 1rem; cursor: pointer;" onclick="openLightbox(<?php echo $lightbox_index; ?>)">
                            <?php if ( $thumb_url ) : ?>
                              <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>" class="gallery-thumb">
                            <?php endif; ?>
                          </div>
                          <div class="card-body">
                            <h4 style="color: var(--primary); font-family: 'Cinzel', serif; margin: 0.5rem 0;"><?php the_title(); ?></h4>
                            <div style="font-size: 0.85rem; color: var(--muted);">
                              <?php the_content(); ?>
                              <?php if ( $event_location ) : ?>
                                <span style="display: block; margin-top: 5px; font-weight: 600; color: var(--primary);">📍 <?php echo esc_html( $event_location ); ?></span>
                              <?php endif; ?>
                            </div>
                          </div>
                        </article>
                        <?php
                        $lightbox_index++;
                    }

                endwhile;
                wp_reset_postdata();
            else :
                echo '<p style="grid-column: span 3; text-align: center; color: var(--muted); padding: 3rem 0;">No gallery items found.</p>';
            endif;
            ?>
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
      .gallery-filters {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin: 2rem 0 3rem;
        flex-wrap: wrap;
      }

      .filter-btn {
        padding: 0.6rem 2rem;
        border-radius: 99px;
        border: none;
        background: #f0f2f5;
        color: var(--primary);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.05em;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      }

      .filter-btn:hover {
        background: #e4e7eb;
        transform: translateY(-2px);
      }

      .filter-btn.active {
        background: #f26522; /* Vibrant Orange as per image */
        color: white;
        box-shadow: 0 10px 20px rgba(242, 101, 34, 0.3);
      }

      .gallery-item-wrap {
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
      }

      .gallery-item-wrap.hidden {
        display: none !important;
        opacity: 0;
        transform: scale(0.8);
      }

      .gallery-thumb {
        transition: transform 0.3s ease;
      }

      .card-media:hover .gallery-thumb {
        transform: scale(1.05);
      }

      .gallery-grid {
        gap: 1.5rem;
      }

      .gallery-item {
        position: relative;
        border-radius: var(--radius-md);
        overflow: hidden;
        cursor: pointer;
        aspect-ratio: 4/3;
      }

      .gallery-item img {
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
        width: 40px;
        height: 40px;
        fill: white;
        transform: scale(0.5);
        transition: transform 0.3s ease;
      }

      .gallery-item:hover img {
        transform: scale(1.1);
      }

      .gallery-item:hover .gallery-overlay {
        opacity: 1;
      }

      .gallery-item:hover .gallery-overlay svg {
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
      // Gallery Filtering
      const filterBtns = document.querySelectorAll('.filter-btn');
      const galleryItems = document.querySelectorAll('.gallery-item-wrap');

      // Initialize - show Photos by default
      galleryItems.forEach(item => {
        if (item.getAttribute('data-category') === 'photos') {
          item.classList.remove('hidden');
          item.classList.add('active');
        } else {
          item.classList.add('hidden');
        }
      });

      filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
          // Remove active class from all buttons
          filterBtns.forEach(b => b.classList.remove('active'));
          // Add active class to clicked button
          btn.classList.add('active');

          const filter = btn.getAttribute('data-filter');

          galleryItems.forEach(item => {
            if (item.getAttribute('data-category') === filter) {
              item.classList.remove('hidden');
              setTimeout(() => item.classList.add('active'), 50);
            } else {
              item.classList.add('hidden');
            }
          });
        });
      });

      // Dynamic Lightbox logic
      let currentImgIndex = 0;
      const images = <?php echo json_encode( $lightbox_images ); ?>;

      function openLightbox(index) {
        if (!images || images.length === 0 || index < 0 || index >= images.length) return;
        currentImgIndex = index;
        document.getElementById('lightbox-img').src = images[currentImgIndex];
        document.getElementById('lightbox').style.display = 'flex';
        document.body.style.overflow = 'hidden'; // Disable scroll
      }

      function closeLightbox() {
        document.getElementById('lightbox').style.display = 'none';
        document.body.style.overflow = 'auto'; // Enable scroll
      }

      function changeImage(step) {
        if (!images || images.length === 0) return;
        currentImgIndex += step;
        if (currentImgIndex >= images.length) currentImgIndex = 0;
        if (currentImgIndex < 0) currentImgIndex = images.length - 1;
        document.getElementById('lightbox-img').src = images[currentImgIndex];
      }

      // Close on Esc key
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowRight') changeImage(1);
        if (e.key === 'ArrowLeft') changeImage(-1);
      });

      // Close on click outside
      document.getElementById('lightbox').addEventListener('click', (e) => {
        if (e.target.id === 'lightbox') closeLightbox();
      });
    </script>
</main>

<?php get_footer(); ?>
