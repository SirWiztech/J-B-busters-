<?php
require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════════════════════════════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════════════════════════════ -->
<section id="hero" class="hero">
  <!-- Animated background particles -->
  <canvas id="heroCanvas"></canvas>
  <div class="hero-bg-img" style="background-image:url('assets/images/j and b worker standing ina truck.jpg')"></div>

  <!-- Diagonal stripe overlays -->
  <div class="hero-stripe hero-stripe-1"></div>
  <div class="hero-stripe hero-stripe-2"></div>
  <div class="hero-stripe hero-stripe-3"></div>

  <div class="container hero-content">
    <div class="hero-grid">

      <!-- Left: Copy -->
      <div class="hero-copy" data-aos="fade-right" data-aos-duration="900">
        <div class="hero-badge">
          <span class="badge-dot"></span>
          Family-Owned · Fully Insured · Rockwall, TX
        </div>
        <h1 class="hero-title">
          YOUR JUNK.<br/>
          <span class="title-accent">OUR MISSION.</span><br/>
          <span class="title-sub">GONE TODAY.</span>
        </h1>
        <p class="hero-sub">
          Rockwall's most trusted junk removal crew. Text us a pic, get a free quote in minutes, and reclaim your space — <strong>same day</strong>.
        </p>
        <div class="hero-ctas">
          <a href="tel:<?= PHONE_RAW ?>" class="btn btn-red btn-lg pulse-btn">
            <i class="fas fa-phone-alt"></i> Call <?= PHONE ?>
          </a>
          <a href="sms:<?= PHONE_RAW ?>?body=Hi!%20I'd%20like%20a%20free%20quote." class="btn btn-outline-white btn-lg">
            <i class="fas fa-comment-dots"></i> Text a Pic
          </a>
        </div>
        <div class="hero-trust">
          <div class="trust-stars">
            <?php for($i=0;$i<5;$i++) echo '<i class="fas fa-star"></i>'; ?>
            <span>5.0 — Loved by Rockwall</span>
          </div>
          <div class="trust-divider"></div>
          <span><i class="fas fa-shield-alt"></i> Licensed &amp; Insured</span>
          <div class="trust-divider"></div>
          <span><i class="fas fa-bolt"></i> Same-Day Service</span>
        </div>
      </div>

      <!-- Right: Hero Card / Quick Quote Teaser -->
      <div class="hero-card-wrap" data-aos="fade-left" data-aos-duration="900" data-aos-delay="200">
        <div class="hero-card">
          <div class="hero-card-header">
            <div class="hc-icon"><i class="fas fa-bolt"></i></div>
            <div>
              <strong>Instant Free Quote</strong>
              <small>Takes 30 seconds</small>
            </div>
          </div>
          <div class="hero-card-body">
            <div class="hc-step active" data-step="1">
              <label>What do you need hauled?</label>
              <div class="hc-chips">
                <?php
                $chips = ['Furniture','Appliances','Construction Debris','Garage Junk','Yard Waste','Estate Cleanout','Electronics','Other'];
                foreach($chips as $chip): ?>
                  <button type="button" class="hc-chip" data-val="<?= $chip ?>"><?= $chip ?></button>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="hc-step" data-step="2" style="display:none">
              <label>Roughly how much?</label>
              <div class="hc-chips">
                <?php
                $sizes = ['A few items','Half a truck','Full truck','Multiple trucks'];
                foreach($sizes as $s): ?>
                  <button type="button" class="hc-chip" data-val="<?= $s ?>"><?= $s ?></button>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="hc-step" data-step="3" style="display:none">
              <label>Your zip code?</label>
              <input type="text" class="hc-input" id="hcZip" placeholder="e.g. 75087" maxlength="5" />
            </div>
            <div class="hc-step hc-result" data-step="4" style="display:none">
              <div class="hc-result-icon"><i class="fas fa-check-circle"></i></div>
              <strong>Great news — we serve your area!</strong>
              <p>Text us a pic for your exact price:</p>
              <a href="sms:<?= PHONE_RAW ?>" class="btn btn-red btn-block"><i class="fas fa-comment-dots"></i> Text <?= PHONE ?></a>
              <a href="tel:<?= PHONE_RAW ?>" class="btn btn-outline-red btn-block" style="margin-top:.5rem"><i class="fas fa-phone-alt"></i> Or Call Now</a>
            </div>
          </div>
          <div class="hc-progress">
            <div class="hc-progress-fill" id="hcProgressFill" style="width:33%"></div>
          </div>
        </div>

        <!-- Floating stat badges -->
        <div class="hero-float-badge hfb-1" data-aos="zoom-in" data-aos-delay="600">
          <i class="fas fa-truck-moving"></i>
          <div><strong>500+</strong><small>Jobs Done</small></div>
        </div>
        <div class="hero-float-badge hfb-2" data-aos="zoom-in" data-aos-delay="800">
          <i class="fas fa-clock"></i>
          <div><strong>Same Day</strong><small>Available</small></div>
        </div>
      </div>

    </div><!-- /hero-grid -->
  </div><!-- /container -->

  <!-- Scroll indicator -->
  <div class="scroll-indicator">
    <div class="scroll-mouse"><div class="scroll-dot"></div></div>
    <span>Scroll to explore</span>
  </div>
</section>


<!-- ═══════════════════════════════════════════════════════════════
     TRUST BAR (logos / credentials strip)
═══════════════════════════════════════════════════════════════ -->
<section class="trust-bar">
  <div class="container">
    <div class="trust-bar-track" id="trustTrack">
      <?php
      $trustItems = [
        ['icon'=>'fa-shield-alt',     'text'=>'Fully Insured'],
        ['icon'=>'fa-users',          'text'=>'Family Owned'],
        ['icon'=>'fa-bolt',           'text'=>'Same-Day Service'],
        ['icon'=>'fa-hand-holding-usd','text'=>'Upfront Pricing'],
        ['icon'=>'fa-recycle',        'text'=>'Eco-Friendly Disposal'],
        ['icon'=>'fa-star',           'text'=>'5-Star Rated'],
        ['icon'=>'fa-clock',          'text'=>'Open 24/7'],
        ['icon'=>'fa-map-marker-alt', 'text'=>'30+ Cities Served'],
      ];
      // Duplicate for seamless marquee
      for($loop=0; $loop<2; $loop++):
        foreach($trustItems as $item): ?>
          <div class="trust-item">
            <i class="fas <?= $item['icon'] ?>"></i>
            <span><?= $item['text'] ?></span>
          </div>
      <?php endforeach; endfor; ?>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════════════════════
     STATS COUNTER SECTION
═══════════════════════════════════════════════════════════════ -->
<section class="stats-section">
  <div class="container stats-grid">
    <?php foreach($STATS as $i => $stat): ?>
      <div class="stat-card" data-aos="fade-up" data-aos-delay="<?= $i*100 ?>">
        <div class="stat-number" data-target="<?= preg_replace('/[^0-9]/', '', $stat['number']) ?>"><?= $stat['number'] ?></div>
        <div class="stat-label"><?= $stat['label'] ?></div>
      </div>
    <?php endforeach; ?>
  </div>
</section>


<!-- ═══════════════════════════════════════════════════════════════
     SERVICES SECTION
═══════════════════════════════════════════════════════════════ -->
<section id="services" class="section section-services">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <span class="section-tag"><i class="fas fa-cog"></i> What We Do</span>
      <h2 class="section-title">WE HAUL <span class="accent">ANYTHING</span></h2>
      <p class="section-sub">From a single couch to an entire estate — if it's junk, it's gone. Fast, honest, and always fully insured.</p>
    </div>

    <div class="services-grid">
      <?php foreach($SERVICES as $i => $svc): ?>
        <div class="service-card" data-aos="fade-up" data-aos-delay="<?= ($i%4)*100 ?>">
          <div class="service-card-img" style="background-image:url('<?= $svc['img'] ?>')">
            <div class="service-card-overlay"></div>
            <span class="service-icon"><?= $svc['icon'] ?></span>
          </div>
          <div class="service-card-body">
            <h3><?= $svc['title'] ?></h3>
            <p><?= $svc['desc'] ?></p>
            <a href="#quote" class="service-link">Get a Quote <i class="fas fa-arrow-right"></i></a>
          </div>
          <div class="service-card-stripe"></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════════════════════
     HOW IT WORKS — PROCESS SECTION
═══════════════════════════════════════════════════════════════ -->
<section id="process" class="section section-process">
  <div class="process-bg-text">HOW IT WORKS</div>
  <div class="process-bg-img" style="background-image:url('assets/images/another j and b worker standing in a truck.jpg')"></div>
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <span class="section-tag light"><i class="fas fa-route"></i> How It Works</span>
      <h2 class="section-title light">FOUR STEPS TO A <span class="accent">CLEAN SPACE</span></h2>
      <p class="section-sub light">No hassle. No hidden fees. Just fast, honest junk removal.</p>
    </div>

    <div class="process-timeline">
      <?php foreach($PROCESS as $i => $step): ?>
        <div class="process-step" data-aos="fade-up" data-aos-delay="<?= $i*150 ?>">
          <div class="process-step-number"><?= str_pad($step['step'],2,'0',STR_PAD_LEFT) ?></div>
          <div class="process-step-icon"><?= $step['icon'] ?></div>
          <h3><?= $step['title'] ?></h3>
          <p><?= $step['desc'] ?></p>
          <?php if($i < count($PROCESS)-1): ?>
            <div class="process-connector"><i class="fas fa-chevron-right"></i></div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="process-cta" data-aos="zoom-in">
      <p>Ready to get started?</p>
      <a href="sms:<?= PHONE_RAW ?>" class="btn btn-red btn-lg pulse-btn">
        <i class="fas fa-comment-dots"></i> Text a Pic — Get Your Free Quote
      </a>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════════════════════
     BEFORE / AFTER INTERACTIVE SLIDER
═══════════════════════════════════════════════════════════════ -->
<section class="section section-beforeafter">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <span class="section-tag"><i class="fas fa-exchange-alt"></i> Real Results</span>
      <h2 class="section-title">BEFORE &amp; <span class="accent">AFTER</span></h2>
      <p class="section-sub">Drag the slider to see the transformation. This is what J&amp;B Junk Busters delivers — every single time.</p>
    </div>

    <div class="ba-showcase" data-aos="fade-up">
      <!-- BA Item 1 -->
      <div class="ba-item">
        <div class="ba-slider" data-ba>
          <div class="ba-after">
            <img src="assets/images/image 1.jpg" alt="Before and After junk removal" loading="lazy" />
            <span class="ba-label ba-label-after"><i class="fas fa-check"></i> AFTER</span>
          </div>
          <div class="ba-before">
            <img src="assets/images/image 1.jpg" alt="Before and After junk removal" loading="lazy" />
            <span class="ba-label ba-label-before"><i class="fas fa-times"></i> BEFORE</span>
          </div>
          <div class="ba-handle">
            <div class="ba-handle-line"></div>
            <div class="ba-handle-circle"><i class="fas fa-arrows-alt-h"></i></div>
            <div class="ba-handle-line"></div>
          </div>
          <input type="range" class="ba-range" min="0" max="100" value="50" />
        </div>
        <div class="ba-caption">
          <h4>Full Garage Cleanout</h4>
          <p>Rockwall, TX · Completed in 2 hours</p>
        </div>
      </div>

      <!-- BA Item 2 -->
      <div class="ba-item">
        <div class="ba-slider" data-ba>
          <div class="ba-after">
            <img src="assets/images/image2.jpg" alt="Before and After yard cleanup" loading="lazy" />
            <span class="ba-label ba-label-after"><i class="fas fa-check"></i> AFTER</span>
          </div>
          <div class="ba-before">
            <img src="assets/images/image2.jpg" alt="Before and After yard cleanup" loading="lazy" />
            <span class="ba-label ba-label-before"><i class="fas fa-times"></i> BEFORE</span>
          </div>
          <div class="ba-handle">
            <div class="ba-handle-line"></div>
            <div class="ba-handle-circle"><i class="fas fa-arrows-alt-h"></i></div>
            <div class="ba-handle-line"></div>
          </div>
          <input type="range" class="ba-range" min="0" max="100" value="50" />
        </div>
        <div class="ba-caption">
          <h4>Yard Debris &amp; Brush Removal</h4>
          <p>Wylie, TX · Storm damage cleanup</p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════════════════════
     GALLERY / RECENT WORK — FILTERABLE MASONRY
═══════════════════════════════════════════════════════════════ -->
<section id="gallery" class="section section-gallery">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <span class="section-tag"><i class="fas fa-camera"></i> Our Work</span>
      <h2 class="section-title">RECENT <span class="accent">JOBS</span></h2>
      <p class="section-sub">Real jobs. Real results. Every photo is from an actual J&amp;B Junk Busters job in the DFW area.</p>
    </div>

    <!-- Filter Buttons -->
    <div class="gallery-filters" data-aos="fade-up" data-aos-delay="100">
      <button class="filter-btn active" data-filter="all">All Work</button>
      <button class="filter-btn" data-filter="garage">Garage</button>
      <button class="filter-btn" data-filter="construction">Construction</button>
      <button class="filter-btn" data-filter="furniture">Furniture</button>
      <button class="filter-btn" data-filter="appliance">Appliances</button>
      <button class="filter-btn" data-filter="estate">Estate</button>
      <button class="filter-btn" data-filter="yard">Yard</button>
    </div>

    <!-- Gallery Grid -->
    <div class="gallery-grid" id="galleryGrid">
      <?php foreach($GALLERY as $i => $item): ?>
        <div class="gallery-item" data-category="<?= $item['cat'] ?>" data-aos="fade-up" data-aos-delay="<?= ($i%4)*80 ?>">
          <img src="<?= $item['src'] ?>" alt="<?= htmlspecialchars($item['title']) ?>" loading="lazy" />
          <div class="gallery-overlay">
            <span class="gallery-cat"><?= ucfirst($item['cat']) ?></span>
            <h4><?= $item['title'] ?></h4>
            <a href="<?= $item['src'] ?>" class="gallery-zoom" data-lightbox><i class="fas fa-expand"></i></a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="gallery-cta" data-aos="fade-up">
      <a href="<?= FACEBOOK ?>" target="_blank" class="btn btn-outline-red">
        <i class="fab fa-facebook"></i> See More on Facebook
      </a>
    </div>
  </div>
</section>

<!-- Lightbox Modal -->
<div class="lightbox" id="lightbox">
  <button class="lb-close" id="lbClose"><i class="fas fa-times"></i></button>
  <button class="lb-prev" id="lbPrev"><i class="fas fa-chevron-left"></i></button>
  <button class="lb-next" id="lbNext"><i class="fas fa-chevron-right"></i></button>
  <img src="" alt="Gallery preview" id="lbImg" />
  <div class="lb-caption" id="lbCaption"></div>
</div>


<!-- ═══════════════════════════════════════════════════════════════
     PRICING SECTION
═══════════════════════════════════════════════════════════════ -->
<section id="pricing" class="section section-pricing">
  <div class="pricing-bg-text">PRICING</div>
  <div class="pricing-bg-img" style="background-image:url('assets/images/$150 basic cleaning.jpg')"></div>
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <span class="section-tag light"><i class="fas fa-tag"></i> Honest Pricing</span>
      <h2 class="section-title light">SIMPLE, UPFRONT <span class="accent">PRICING</span></h2>
      <p class="section-sub light">No hidden fees. No surprises. Just fair, honest pricing based on volume.</p>
    </div>

    <div class="pricing-grid">
      <!-- Tier 1 -->
      <div class="price-card" data-aos="fade-up" data-aos-delay="0">
        <div class="price-card-badge">Small Load</div>
        <div class="price-card-icon"><i class="fas fa-box"></i></div>
        <h3>MINIMUM LOAD</h3>
        <div class="price-amount"><sup>$</sup>89<small>*</small></div>
        <p class="price-desc">Perfect for a few items — old mattress, broken appliance, small furniture pieces.</p>
        <ul class="price-features">
          <li><i class="fas fa-check"></i> Up to ¼ truck load</li>
          <li><i class="fas fa-check"></i> 1–3 large items</li>
          <li><i class="fas fa-check"></i> Same-day available</li>
          <li><i class="fas fa-check"></i> All labor included</li>
          <li><i class="fas fa-check"></i> Eco-friendly disposal</li>
        </ul>
        <a href="tel:<?= PHONE_RAW ?>" class="btn btn-outline-white btn-block">Call for Quote</a>
      </div>

      <!-- Tier 2 — FEATURED -->
      <div class="price-card price-card-featured" data-aos="fade-up" data-aos-delay="100">
        <div class="price-card-ribbon">MOST POPULAR</div>
        <div class="price-card-badge">Half Load</div>
        <div class="price-card-icon"><i class="fas fa-truck"></i></div>
        <h3>HALF TRUCK</h3>
        <div class="price-amount"><sup>$</sup>199<small>*</small></div>
        <p class="price-desc">Ideal for garage cleanouts, room clearances, or moderate junk piles.</p>
        <ul class="price-features">
          <li><i class="fas fa-check"></i> Up to ½ truck load</li>
          <li><i class="fas fa-check"></i> Garage / room cleanout</li>
          <li><i class="fas fa-check"></i> Same-day available</li>
          <li><i class="fas fa-check"></i> All labor included</li>
          <li><i class="fas fa-check"></i> Donation handling</li>
          <li><i class="fas fa-check"></i> Photo confirmation</li>
        </ul>
        <a href="sms:<?= PHONE_RAW ?>" class="btn btn-red btn-block pulse-btn">Text for Quote</a>
      </div>

      <!-- Tier 3 -->
      <div class="price-card" data-aos="fade-up" data-aos-delay="200">
        <div class="price-card-badge">Full Load</div>
        <div class="price-card-icon"><i class="fas fa-truck-ramp-box"></i></div>
        <h3>FULL TRUCK</h3>
        <div class="price-amount"><sup>$</sup>349<small>*</small></div>
        <p class="price-desc">Big jobs — full estate cleanouts, construction debris, entire garage or shed.</p>
        <ul class="price-features">
          <li><i class="fas fa-check"></i> Full truck load</li>
          <li><i class="fas fa-check"></i> Estate / eviction cleanout</li>
          <li><i class="fas fa-check"></i> Construction debris</li>
          <li><i class="fas fa-check"></i> All labor included</li>
          <li><i class="fas fa-check"></i> Priority scheduling</li>
          <li><i class="fas fa-check"></i> Volume discounts available</li>
        </ul>
        <a href="tel:<?= PHONE_RAW ?>" class="btn btn-outline-white btn-block">Call for Quote</a>
      </div>
    </div>

    <p class="pricing-note" data-aos="fade-up">* Final pricing confirmed after photo review. No obligation — ever. <a href="#quote">Get your exact quote now →</a></p>
  </div>
</section>


<!-- ═══════════════════════════════════════════════════════════════
     TESTIMONIALS / REVIEWS — MODERN LAYOUT
═══════════════════════════════════════════════════════════════ -->
<section id="reviews" class="section section-reviews">
  <div class="reviews-hero">
    <img src="assets/images/j and b with happy family.jpg" alt="J&B Junk Busters with happy family" loading="lazy" />
    <div class="reviews-hero-overlay"></div>
    <div class="reviews-hero-content">
      <div class="reviews-hero-badge"><i class="fas fa-star"></i> 5.0 Rated on Google</div>
      <h2>TRUSTED BY<br/><span class="accent">HUNDREDS</span> OF FAMILIES</h2>
      <p>Real reviews from real Rockwall & DFW families and businesses.</p>
    </div>
  </div>
  <div class="container">
    <div class="reviews-stats-bar" data-aos="fade-up">
      <div class="rsb-item">
        <div class="rsb-stars">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        </div>
        <strong>5.0 / 5.0</strong>
        <span>Average Rating</span>
      </div>
      <div class="rsb-divider"></div>
      <div class="rsb-item">
        <strong>500+</strong>
        <span>5-Star Reviews</span>
      </div>
      <div class="rsb-divider"></div>
      <div class="rsb-item">
        <strong>100%</strong>
        <span>Would Recommend</span>
      </div>
      <div class="rsb-divider"></div>
      <div class="rsb-item">
        <strong>&lt;15 min</strong>
        <span>Avg Response Time</span>
      </div>
    </div>

    <div class="reviews-carousel-wrap">
      <button class="carousel-btn carousel-prev" id="revPrev"><i class="fas fa-chevron-left"></i></button>
      <div class="reviews-carousel" id="reviewsCarousel">
        <?php foreach($TESTIMONIALS as $i => $rev): ?>
          <div class="review-card" data-aos="fade-up" data-aos-delay="<?= ($i%3)*100 ?>">
            <div class="review-card-top">
              <div class="review-quote"><i class="fas fa-quote-left"></i></div>
              <div class="review-stars">
                <?php for($s=0;$s<$rev['stars'];$s++) echo '<i class="fas fa-star"></i>'; ?>
              </div>
            </div>
            <p class="review-text"><?= htmlspecialchars($rev['text']) ?></p>
            <div class="review-author">
              <div class="review-avatar"><?= strtoupper(substr($rev['name'],0,1)) ?></div>
              <div>
                <strong><?= htmlspecialchars($rev['name']) ?></strong>
                <span><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($rev['city']) ?></span>
              </div>
              <div class="review-verified"><i class="fas fa-check-circle"></i> Verified</div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <button class="carousel-btn carousel-next" id="revNext"><i class="fas fa-chevron-right"></i></button>
    </div>

    <!-- Carousel dots (populated by JS to match actual slide positions) -->
    <div class="carousel-dots" id="revDots"></div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════════════════════
     SERVICE AREAS SECTION
═══════════════════════════════════════════════════════════════ -->
<section id="areas" class="section section-areas">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <span class="section-tag"><i class="fas fa-map-marked-alt"></i> Where We Work</span>
      <h2 class="section-title">PROUDLY SERVING <span class="accent">30+ CITIES</span></h2>
      <p class="section-sub">Based in Rockwall, TX — covering the entire eastern DFW metroplex and beyond.</p>
    </div>

    <div class="areas-grid" data-aos="fade-up" data-aos-delay="100">
      <?php foreach($SERVICE_AREAS as $i => $area): ?>
        <div class="area-chip" style="animation-delay:<?= $i*0.04 ?>s">
          <i class="fas fa-map-pin"></i> <?= $area ?>, TX
        </div>
      <?php endforeach; ?>
    </div>

    <div class="areas-cta" data-aos="fade-up">
      <p>Don't see your city? <strong>We probably still serve you!</strong></p>
      <a href="tel:<?= PHONE_RAW ?>" class="btn btn-red"><i class="fas fa-phone-alt"></i> Call & Ask — <?= PHONE ?></a>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════════════════════
     WHY CHOOSE US
═══════════════════════════════════════════════════════════════ -->
<section class="section section-why">
  <div class="container why-grid">
    <div class="why-copy" data-aos="fade-right">
      <span class="section-tag"><i class="fas fa-trophy"></i> Why J&amp;B</span>
      <h2 class="section-title" style="text-align:left">WHY ROCKWALL <span class="accent">CHOOSES US</span></h2>
      <div class="why-list">
        <?php
        $whys = [
          ['fa-users',       'Family-Owned & Operated',     'Josh & Bailee personally oversee every job. You\'re not a number — you\'re a neighbor.'],
          ['fa-bolt',        'Same-Day Service Available',  'Call before noon, gone by evening. We keep our schedule flexible for urgent jobs.'],
          ['fa-hand-holding-usd','Upfront, Honest Pricing','The price we quote is the price you pay. Zero hidden fees, zero surprises. Ever.'],
          ['fa-shield-alt',  'Fully Licensed & Insured',    'Your property is protected. We carry full liability insurance on every single job.'],
          ['fa-leaf',        'Eco-Friendly Disposal',       'We donate usable items and recycle aggressively. Less landfill, more community good.'],
          ['fa-mobile-alt',  'Text-a-Pic Quotes',           'Snap a photo, text it over, get a quote in minutes. Modern problems, modern solutions.'],
        ];
        foreach($whys as $w): ?>
          <div class="why-item">
            <div class="why-icon"><i class="fas <?= $w[0] ?>"></i></div>
            <div>
              <strong><?= $w[1] ?></strong>
              <p><?= $w[2] ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="why-visual" data-aos="fade-left">
      <div class="why-image-stack">
        <div class="why-img why-img-1" style="background-image:url('assets/images/what we do and why choose us.jpg')"></div>
        <div class="why-img why-img-2" style="background-image:url('assets/images/j and b staff image.jpg')"></div>
        <div class="why-badge-float">
          <div class="wbf-number">5.0 <i class="fas fa-star"></i></div>
          <div class="wbf-text">Customer<br/>Rating</div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════════════════════
     INSTANT QUOTE FORM SECTION
═══════════════════════════════════════════════════════════════ -->
<section id="quote" class="section section-quote">
  <div class="quote-bg-pattern"></div>
  <div class="container quote-grid">

    <!-- Left: Info -->
    <div class="quote-info" data-aos="fade-right">
      <span class="section-tag light"><i class="fas fa-paper-plane"></i> Free Quote</span>
      <h2 class="section-title light" style="text-align:left">GET YOUR FREE<br/><span class="accent">QUOTE NOW</span></h2>
      <p>Fill out the form or just text us a picture — whichever is easier. We respond fast, usually within 15 minutes during business hours.</p>

      <div class="quote-contact-cards">
        <a href="tel:<?= PHONE_RAW ?>" class="qcc">
          <div class="qcc-icon"><i class="fas fa-phone-alt"></i></div>
          <div><strong>Call Us</strong><span><?= PHONE ?></span></div>
        </a>
        <a href="sms:<?= PHONE_RAW ?>" class="qcc">
          <div class="qcc-icon"><i class="fas fa-comment-dots"></i></div>
          <div><strong>Text a Pic</strong><span>Fastest response!</span></div>
        </a>
        <a href="mailto:<?= EMAIL ?>" class="qcc">
          <div class="qcc-icon"><i class="fas fa-envelope"></i></div>
          <div><strong>Email Us</strong><span><?= EMAIL ?></span></div>
        </a>
      </div>

      <div class="quote-guarantee">
        <i class="fas fa-shield-alt"></i>
        <div>
          <strong>Our Promise</strong>
          <p>Free quote · No obligation · Same-day available · Fully insured</p>
        </div>
      </div>
    </div>

    <!-- Right: Form — FIXED: added method, action, enctype -->
    <div class="quote-form-wrap" data-aos="fade-left">
      <form id="quoteForm" class="quote-form" novalidate method="POST" action="api/quote.php" enctype="multipart/form-data">
        <div class="form-header">
          <h3>Request Your Free Quote</h3>
          <p>Fields marked * are required</p>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="qName"><i class="fas fa-user"></i> Full Name *</label>
            <input type="text" id="qName" name="name" placeholder="John Smith" required />
            <span class="form-error">Please enter your name</span>
          </div>
          <div class="form-group">
            <label for="qPhone"><i class="fas fa-phone"></i> Phone Number *</label>
            <input type="tel" id="qPhone" name="phone" placeholder="(469) 555-0123" required />
            <span class="form-error">Please enter a valid phone number</span>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="qEmail"><i class="fas fa-envelope"></i> Email</label>
            <input type="email" id="qEmail" name="email" placeholder="john@example.com" />
          </div>
          <div class="form-group">
            <label for="qZip"><i class="fas fa-map-pin"></i> Zip Code *</label>
            <input type="text" id="qZip" name="zip" placeholder="75087" maxlength="5" required />
            <span class="form-error">Please enter your zip code</span>
          </div>
        </div>

        <div class="form-group">
          <label for="qService"><i class="fas fa-concierge-bell"></i> Service Needed *</label>
          <select id="qService" name="service" required>
            <option value="">— Select a service —</option>
            <?php foreach($SERVICES as $svc): ?>
              <option value="<?= htmlspecialchars($svc['title']) ?>"><?= htmlspecialchars($svc['title']) ?></option>
            <?php endforeach; ?>
            <option value="Other">Other / Not Sure</option>
          </select>
          <span class="form-error">Please select a service</span>
        </div>

        <div class="form-group">
          <label><i class="fas fa-ruler-combined"></i> Estimated Volume</label>
          <div class="volume-selector">
            <?php
            $volumes = [
              ['val'=>'small',  'icon'=>'<i class="fas fa-box"></i>', 'label'=>'Small',   'desc'=>'Few items'],
              ['val'=>'medium', 'icon'=>'<i class="fas fa-truck"></i>', 'label'=>'Medium',  'desc'=>'Half truck'],
              ['val'=>'large',  'icon'=>'<i class="fas fa-truck-ramp-box"></i>', 'label'=>'Large',   'desc'=>'Full truck'],
              ['val'=>'xlarge', 'icon'=>'<i class="fas fa-industry"></i>', 'label'=>'X-Large',  'desc'=>'Multiple loads'],
            ];
            foreach($volumes as $v): ?>
              <label class="volume-opt">
                <input type="radio" name="volume" value="<?= $v['val'] ?>" />
                <div class="volume-opt-inner">
                  <span class="vo-icon"><?= $v['icon'] ?></span>
                  <strong><?= $v['label'] ?></strong>
                  <small><?= $v['desc'] ?></small>
                </div>
              </label>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="form-group">
          <label for="qDetails"><i class="fas fa-align-left"></i> Describe Your Junk</label>
          <textarea id="qDetails" name="details" rows="3" placeholder="Tell us what needs to go — e.g., 'old couch, broken washer, garage full of boxes...'"></textarea>
        </div>

        <!-- Photo Upload -->
        <div class="form-group">
          <label><i class="fas fa-camera"></i> Upload Photos (optional but helpful!)</label>
          <div class="photo-upload-zone" id="photoZone">
            <input type="file" id="qPhotos" name="photos[]" multiple accept="image/*" />
            <div class="puz-content">
              <i class="fas fa-cloud-upload-alt"></i>
              <strong>Drop photos here or click to browse</strong>
              <small>JPG, PNG up to 10MB each · Max 5 photos</small>
            </div>
            <div class="puz-previews" id="photoPreviews"></div>
          </div>
        </div>

        <div class="form-group form-check-group">
          <label class="check-label">
            <input type="checkbox" id="qUrgent" name="urgent" />
            <span class="checkmark"></span>
            <i class="fas fa-bolt" style="color:#f39c12"></i> This is urgent — I need same-day service!
          </label>
        </div>

        <button type="submit" class="btn btn-red btn-lg btn-block" id="quoteSubmitBtn">
          <span class="btn-text"><i class="fas fa-paper-plane"></i> Send My Free Quote Request</span>
          <span class="btn-loader" style="display:none"><i class="fas fa-spinner fa-spin"></i> Sending...</span>
        </button>

        <p class="form-disclaimer"><i class="fas fa-lock"></i> Your info is safe. We never spam. Unsubscribe anytime.</p>

        <!-- Success message -->
        <div class="form-success" id="formSuccess" style="display:none">
          <div class="fs-icon"><i class="fas fa-check-circle"></i></div>
          <h3>Quote Request Sent! <i class="fas fa-circle-check" style="color:var(--green)"></i></h3>
          <p>We'll get back to you within <strong>15 minutes</strong>. For fastest response, text us a pic at <a href="sms:<?= PHONE_RAW ?>"><?= PHONE ?></a>.</p>
        </div>
      </form>
    </div>

  </div>
</section>


<!-- ═══════════════════════════════════════════════════════════════
     FAQ ACCORDION
═══════════════════════════════════════════════════════════════ -->
<section id="faq" class="section section-faq">
  <div class="container faq-grid">
    <div class="faq-copy" data-aos="fade-right">
      <span class="section-tag"><i class="fas fa-question-circle"></i> FAQ</span>
      <h2 class="section-title" style="text-align:left">GOT <span class="accent">QUESTIONS?</span></h2>
      <p>We've answered the most common ones below. Still curious? Just call or text — we love to chat.</p>
      <a href="tel:<?= PHONE_RAW ?>" class="btn btn-red"><i class="fas fa-phone-alt"></i> <?= PHONE ?></a>
    </div>
    <div class="faq-list" data-aos="fade-left">
      <?php
      // FIXED: use concatenation for PHONE and EMAIL constants inside the answer string
      $faqs = [
        ['How quickly can you come out?', 'We offer same-day service in most cases! If you call or text before noon, we can often be there that afternoon. For scheduled jobs, we typically book 1–2 days out.'],
        ['How do you pricing work?', 'We price by volume — how much space your junk takes up in our truck. Minimum load starts at $89. We always give you an upfront quote before we start, and that price never changes.'],
        ['Do I need to be home during pickup?', 'Not necessarily! As long as we can access the junk (e.g., it\'s in a driveway, garage with open access, or curbside), we can handle it. Just let us know the details.'],
        ['What items do you NOT take?', 'We cannot take hazardous materials (paint, chemicals, asbestos), medical waste, or live animals. Everything else — furniture, appliances, construction debris, yard waste, electronics — we haul it all!'],
        ['Are you licensed and insured?', 'Absolutely. J&B Junk Busters is fully licensed and carries comprehensive liability insurance. Your property is protected on every single job.'],
        ['Do you donate or recycle?', 'Yes! We prioritize donating usable items to local charities and recycling everything we can. We believe in keeping as much out of landfills as possible.'],
        ['Can you do commercial or construction jobs?', 'Definitely. We handle residential, commercial, and construction site cleanouts. For large or recurring commercial jobs, ask about our volume discount pricing.'],
        ['How do I get a quote?', 'Easy! Call ' . PHONE . ', text us a photo at the same number, email ' . EMAIL . ', or fill out the quote form on this page. Most quotes are returned within 15 minutes.'],
      ];
      foreach($faqs as $i => $faq): ?>
        <div class="faq-item <?= $i===0?'open':'' ?>">
          <button class="faq-question" aria-expanded="<?= $i===0?'true':'false' ?>">
            <span><?= $faq[0] ?></span>
            <i class="fas fa-plus faq-icon"></i>
          </button>
          <div class="faq-answer" <?= $i===0?'style="max-height:200px"':'' ?>>
            <p><?= $faq[1] ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════════════════════
     FINAL CTA BANNER
═══════════════════════════════════════════════════════════════ -->
<section class="section section-final-cta">
  <div class="final-cta-stripes">
    <div class="fcs fcs-1"></div>
    <div class="fcs fcs-2"></div>
    <div class="fcs fcs-3"></div>
  </div>
  <div class="container final-cta-content" data-aos="zoom-in">
    <h2>READY TO RECLAIM<br/>YOUR <span class="accent">SPACE?</span></h2>
    <p>One text. One call. That's all it takes to get your free quote and schedule your pickup.</p>
    <div class="final-cta-btns">
      <a href="tel:<?= PHONE_RAW ?>" class="btn btn-white btn-lg pulse-btn">
        <i class="fas fa-phone-alt"></i> Call <?= PHONE ?>
      </a>
      <a href="sms:<?= PHONE_RAW ?>?body=Hi!%20I'd%20like%20a%20free%20quote%20for%20junk%20removal." class="btn btn-outline-white btn-lg">
        <i class="fas fa-comment-dots"></i> Text a Pic Now
      </a>
    </div>
    <div class="final-cta-trust">
      <span><i class="fas fa-check"></i> Free Quote</span>
      <span><i class="fas fa-check"></i> Same-Day Available</span>
      <span><i class="fas fa-check"></i> Fully Insured</span>
      <span><i class="fas fa-check"></i> No Obligation</span>
    </div>
  </div>
</section>


<!-- ═══════════════════════════════════════════════════════════════
     CONTACT / MAP SECTION
═══════════════════════════════════════════════════════════════ -->
<section id="contact" class="section section-contact">
  <div class="container contact-grid">
    <div class="contact-info" data-aos="fade-right">
      <span class="section-tag"><i class="fas fa-map-marker-alt"></i> Find Us</span>
      <h2 class="section-title" style="text-align:left">LET'S <span class="accent">CONNECT</span></h2>
      <div class="contact-cards">
        <div class="contact-card">
          <div class="cc-icon"><i class="fas fa-map-marker-alt"></i></div>
          <div><strong>Our Location</strong><p><?= ADDRESS ?></p></div>
        </div>
        <div class="contact-card">
          <div class="cc-icon"><i class="fas fa-phone-alt"></i></div>
          <div><strong>Call or Text</strong><p><a href="tel:<?= PHONE_RAW ?>"><?= PHONE ?></a></p></div>
        </div>
        <div class="contact-card">
          <div class="cc-icon"><i class="fas fa-envelope"></i></div>
          <div><strong>Email Us</strong><p><a href="mailto:<?= EMAIL ?>"><?= EMAIL ?></a></p></div>
        </div>
        <div class="contact-card">
          <div class="cc-icon"><i class="fas fa-clock"></i></div>
          <div><strong>Hours</strong><p>Open 24 Hours — 7 Days a Week</p></div>
        </div>
      </div>
    </div>
    <div class="contact-map" data-aos="fade-left">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53483.59694293707!2d-96.49!3d32.9312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864c22f44e45a0b1%3A0x69e0e4dde8e8e6b0!2sRockwall%2C%20TX%2075087!5e0!3m2!1sen!2sus!4v1700000000000!5m2!1sen!2sus"
        width="100%" height="100%" style="border:0; border-radius:16px;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade" title="J&B Junk Busters Location">
      </iframe>
      <div class="map-overlay-badge">
        <i class="fas fa-map-marker-alt"></i> J&amp;B Junk Busters — Rockwall, TX
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>