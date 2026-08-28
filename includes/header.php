<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="J&B Junk Busters — Rockwall TX's #1 rated junk removal & cleanup service. Fast, free quotes. Family-owned. Serving 30+ DFW cities. Call 469-510-8246." />
  <meta name="keywords" content="junk removal Rockwall TX, junk hauling DFW, garage cleanout, estate cleanout, construction debris, furniture removal Texas" />
  <meta property="og:title"       content="J&B Junk Busters | Removal & Cleanup Services — Rockwall, TX" />
  <meta property="og:description" content="Fast, free quotes. Text a pic of your junk! Family-owned junk removal serving Rockwall & 30+ DFW cities." />
  <meta property="og:type"        content="website" />
  <title>J&B Junk Busters — Removal & Cleanup Services | Rockwall, TX</title>

  <!-- Preconnect -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@300;400;500;600;700;800;900&family=Barlow+Condensed:wght@600;700;800;900&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- AOS Animations -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css" />

  <!-- Favicon (inline SVG shield) -->
  <link rel="icon" type="image/jpeg" href="assets/images/footer-logo.png" />
</head>
<body>

<!-- ═══════════════════════════════════════════
     PRELOADER
═══════════════════════════════════════════ -->
<div id="preloader">
  <div class="preloader-inner">
    <img src="assets/images/j&b logo.png" alt="J&B Junk Busters" class="preloader-logo" />
    <div class="preloader-bar"><div class="preloader-fill"></div></div>
    <p>Loading your clean slate…</p>
  </div>
</div>

<!-- ═══════════════════════════════════════════
     FLOATING CTA BUTTONS (always visible)
═══════════════════════════════════════════ -->
<div class="floating-ctas">
  <a href="tel:<?= PHONE_RAW ?>" class="float-btn float-call" aria-label="Call us">
    <i class="fas fa-phone-alt"></i>
    <span class="float-tooltip">Call Now</span>
  </a>
  <a href="sms:<?= PHONE_RAW ?>?body=Hi!%20I'd%20like%20a%20free%20quote%20for%20junk%20removal." class="float-btn float-text" aria-label="Text us">
    <i class="fas fa-comment-dots"></i>
    <span class="float-tooltip">Text a Pic</span>
  </a>
  <button id="backToTop" class="float-btn float-top" aria-label="Back to top">
    <i class="fas fa-chevron-up"></i>
  </button>
</div>

<!-- ═══════════════════════════════════════════
     TOP BAR
═══════════════════════════════════════════ -->
<div class="topbar">
  <div class="container topbar-inner">
    <div class="topbar-left">
      <span><i class="fas fa-map-marker-alt"></i> <?= ADDRESS ?></span>
      <span class="topbar-divider">|</span>
      <span><i class="fas fa-clock"></i> Open 24/7 — Always Available</span>
    </div>
    <div class="topbar-right">
      <a href="<?= FACEBOOK ?>" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>
      <a href="mailto:<?= EMAIL ?>"><i class="fas fa-envelope"></i></a>
      <span class="topbar-badge"><i class="fas fa-shield-alt"></i> Fully Insured</span>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════
     NAVIGATION
═══════════════════════════════════════════ -->
<nav class="navbar" id="navbar">
  <div class="container nav-inner">

    <!-- Logo -->
    <a href="#hero" class="nav-logo">
      <img src="assets/images/j&b logo.png" alt="J&B Junk Busters Logo" class="nav-logo-img" />
    </a>

    <!-- Desktop Nav -->
    <ul class="nav-links" id="navLinks">
      <li><a href="#hero"      class="nav-link active">Home</a></li>
      <li><a href="#services"  class="nav-link">Services</a></li>
      <li><a href="#process"   class="nav-link">How It Works</a></li>
      <li><a href="#gallery"   class="nav-link">Our Work</a></li>
      <li><a href="#pricing"   class="nav-link">Pricing</a></li>
      <li><a href="#reviews"   class="nav-link">Reviews</a></li>
      <li><a href="#areas"     class="nav-link">Areas</a></li>
      <li><a href="#contact"   class="nav-link">Contact</a></li>
    </ul>

    <!-- CTA Button -->
    <a href="tel:<?= PHONE_RAW ?>" class="nav-cta">
      <i class="fas fa-phone-alt"></i>
      <span><?= PHONE ?></span>
    </a>

    <!-- Hamburger -->
    <button class="hamburger" id="hamburger" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu" id="mobileMenu">
  <button class="mobile-close" id="mobileClose"><i class="fas fa-times"></i></button>
  <div class="mobile-menu-content">
    <div class="mobile-logo">
      <img src="assets/images/j&b logo.jpg" alt="J&B Junk Busters Logo" class="mobile-logo-img" />
    </div>
    <ul>
      <li><a href="#hero"     class="mobile-link">🏠 Home</a></li>
      <li><a href="#services" class="mobile-link">⚙️ Services</a></li>
      <li><a href="#process"  class="mobile-link">🔄 How It Works</a></li>
      <li><a href="#gallery"  class="mobile-link">📸 Our Work</a></li>
      <li><a href="#pricing"  class="mobile-link">💲 Pricing</a></li>
      <li><a href="#reviews"  class="mobile-link">⭐ Reviews</a></li>
      <li><a href="#areas"    class="mobile-link">📍 Service Areas</a></li>
      <li><a href="#contact"  class="mobile-link">✉️ Contact</a></li>
    </ul>
    <div class="mobile-ctas">
      <a href="tel:<?= PHONE_RAW ?>" class="btn btn-red btn-block"><i class="fas fa-phone-alt"></i> Call <?= PHONE ?></a>
      <a href="sms:<?= PHONE_RAW ?>" class="btn btn-outline-white btn-block"><i class="fas fa-comment-dots"></i> Text a Pic</a>
    </div>
  </div>
</div>