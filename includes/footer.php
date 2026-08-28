<!-- ═══════════════════════════════════════════
     FOOTER
═══════════════════════════════════════════ -->
<footer class="footer">
  <div class="footer-wave">
    <svg viewBox="0 0 1440 120" preserveAspectRatio="none">
      <path d="M0,60 C360,120 720,0 1080,60 C1260,90 1380,80 1440,60 L1440,120 L0,120 Z" fill="#0a0a0a"/>
    </svg>
  </div>
  <div class="container footer-grid">

    <!-- Col 1: Brand -->
    <div class="footer-col footer-brand">
      <div class="footer-logo">
        <img src="assets/images/footer-logo.png" alt="J&B Junk Busters Logo" class="footer-logo-img" />
      </div>
      <p>Family-owned &amp; operated junk removal serving Rockwall, TX and 30+ surrounding DFW cities. Fast, honest, and always fully insured.</p>
      <div class="footer-socials">
        <a href="<?= FACEBOOK ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="mailto:<?= EMAIL ?>" aria-label="Email"><i class="fas fa-envelope"></i></a>
        <a href="tel:<?= PHONE_RAW ?>" aria-label="Phone"><i class="fas fa-phone-alt"></i></a>
      </div>
    </div>

    <!-- Col 2: Services -->
    <div class="footer-col">
      <h4>Our Services</h4>
      <ul>
        <li><a href="#services">Residential Junk Removal</a></li>
        <li><a href="#services">Commercial Cleanouts</a></li>
        <li><a href="#services">Construction Debris</a></li>
        <li><a href="#services">Estate &amp; Eviction Cleanouts</a></li>
        <li><a href="#services">Garage &amp; Shed Cleanouts</a></li>
        <li><a href="#services">Appliance Removal</a></li>
        <li><a href="#services">Yard Waste Removal</a></li>
      </ul>
    </div>

    <!-- Col 3: Service Areas -->
    <div class="footer-col">
      <h4>Service Areas</h4>
      <ul>
        <?php foreach(array_slice($SERVICE_AREAS, 0, 10) as $area): ?>
          <li><a href="#areas"><?= $area ?>, TX</a></li>
        <?php endforeach; ?>
        <li><a href="#areas" class="see-all">+ <?= count($SERVICE_AREAS) - 10 ?> more cities →</a></li>
      </ul>
    </div>

    <!-- Col 4: Contact -->
    <div class="footer-col">
      <h4>Get In Touch</h4>
      <ul class="footer-contact">
        <li><i class="fas fa-phone-alt"></i> <a href="tel:<?= PHONE_RAW ?>"><?= PHONE ?></a></li>
        <li><i class="fas fa-comment-dots"></i> <a href="sms:<?= PHONE_RAW ?>">Text a Pic for Quote</a></li>
        <li><i class="fas fa-envelope"></i> <a href="mailto:<?= EMAIL ?>"><?= EMAIL ?></a></li>
        <li><i class="fas fa-map-marker-alt"></i> <?= ADDRESS ?></li>
        <li><i class="fas fa-clock"></i> Open 24 Hours / 7 Days</li>
      </ul>
      <a href="#quote" class="btn btn-red btn-sm" style="margin-top:1rem;">Get Free Quote <i class="fas fa-arrow-right"></i></a>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container footer-bottom-inner">
      <p>© <?= date('Y') ?> J&amp;B Junk Busters. All Rights Reserved. | Fully Licensed &amp; Insured | Rockwall, TX</p>
      <p>Made with <i class="fas fa-heart" style="color:#c0392b"></i> in Rockwall, Texas</p>
    </div>
  </div>
</footer>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>