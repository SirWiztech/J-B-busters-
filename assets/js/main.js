/* ═══════════════════════════════════════════════════════════════
   J&B JUNK BUSTERS — Main JavaScript
   ═══════════════════════════════════════════════════════════════ */

document.addEventListener('DOMContentLoaded', () => {

  // ── AOS Init ────────────────────────────────────────────────
  AOS.init({ once: true, offset: 80 });

  // ── Preloader ───────────────────────────────────────────────
  const preloader = document.getElementById('preloader');
  if (preloader) {
    window.addEventListener('load', () => preloader.classList.add('hidden'));
    // Fallback: remove after 3s regardless
    setTimeout(() => preloader.classList.add('hidden'), 3000);
  }

  // ── Sticky Navbar ───────────────────────────────────────────
  const navbar = document.getElementById('navbar');
  const backToTop = document.getElementById('backToTop');

  function handleScroll() {
    const y = window.scrollY;
    if (navbar) navbar.classList.toggle('scrolled', y > 60);
    if (backToTop) backToTop.classList.toggle('visible', y > 400);
  }
  window.addEventListener('scroll', handleScroll, { passive: true });
  handleScroll();

  if (backToTop) {
    backToTop.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // ── Active Nav Link on Scroll ───────────────────────────────
  const navLinks = document.querySelectorAll('.nav-link');
  const sections = document.querySelectorAll('section[id]');

  function updateActiveLink() {
    let current = '';
    sections.forEach(sec => {
      if (window.scrollY >= sec.offsetTop - 150) {
        current = sec.getAttribute('id');
      }
    });
    navLinks.forEach(link => {
      link.classList.toggle('active', link.getAttribute('href') === '#' + current);
    });
  }
  window.addEventListener('scroll', updateActiveLink, { passive: true });

  // ── Mobile Menu ─────────────────────────────────────────────
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobileMenu');
  const mobileClose = document.getElementById('mobileClose');

  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', () => mobileMenu.classList.add('open'));
  }
  if (mobileClose && mobileMenu) {
    mobileClose.addEventListener('click', () => mobileMenu.classList.remove('open'));
  }
  document.querySelectorAll('.mobile-link').forEach(link => {
    link.addEventListener('click', () => {
      if (mobileMenu) mobileMenu.classList.remove('open');
    });
  });

  // ── Hero Canvas — Particle Animation ────────────────────────
  const heroCanvas = document.getElementById('heroCanvas');
  if (heroCanvas) {
    const ctx = heroCanvas.getContext('2d');
    let particles = [];
    let w, h;

    function resizeCanvas() {
      w = heroCanvas.width = heroCanvas.offsetWidth;
      h = heroCanvas.height = heroCanvas.offsetHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    class Particle {
      constructor() {
        this.reset();
      }
      reset() {
        this.x = Math.random() * w;
        this.y = Math.random() * h;
        this.vx = (Math.random() - 0.5) * 0.5;
        this.vy = (Math.random() - 0.5) * 0.5;
        this.radius = Math.random() * 2 + 1;
        this.alpha = Math.random() * 0.4 + 0.1;
      }
      update() {
        this.x += this.vx;
        this.y += this.vy;
        if (this.x < 0 || this.x > w) this.vx *= -1;
        if (this.y < 0 || this.y > h) this.vy *= -1;
      }
      draw() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(192,57,43,${this.alpha})`;
        ctx.fill();
      }
    }

    const count = Math.min(60, Math.floor((w * h) / 15000));
    for (let i = 0; i < count; i++) particles.push(new Particle());

    function animateParticles() {
      ctx.clearRect(0, 0, w, h);
      particles.forEach(p => { p.update(); p.draw(); });
      // Draw lines between nearby particles
      for (let i = 0; i < particles.length; i++) {
        for (let j = i + 1; j < particles.length; j++) {
          const dx = particles[i].x - particles[j].x;
          const dy = particles[i].y - particles[j].y;
          const dist = Math.sqrt(dx * dx + dy * dy);
          if (dist < 120) {
            ctx.beginPath();
            ctx.moveTo(particles[i].x, particles[i].y);
            ctx.lineTo(particles[j].x, particles[j].y);
            ctx.strokeStyle = `rgba(192,57,43,${0.08 * (1 - dist / 120)})`;
            ctx.lineWidth = 0.5;
            ctx.stroke();
          }
        }
      }
      requestAnimationFrame(animateParticles);
    }
    animateParticles();
  }

  // ── Hero Card — Multi-Step Quote Teaser ─────────────────────
  const hcSteps = document.querySelectorAll('.hc-step');
  const hcChips = document.querySelectorAll('.hc-chip');
  const hcProgressFill = document.getElementById('hcProgressFill');
  const hcZip = document.getElementById('hcZip');
  let currentStep = 1;
  let selectedType = '';
  let selectedSize = '';

  function showStep(step) {
    currentStep = step;
    hcSteps.forEach(s => {
      const sNum = parseInt(s.dataset.step);
      s.style.display = sNum === step ? '' : 'none';
      s.classList.toggle('active', sNum === step);
    });
    if (hcProgressFill) {
      hcProgressFill.style.width = (step / 4 * 100) + '%';
    }
  }

  hcChips.forEach(chip => {
    chip.addEventListener('click', () => {
      const step = chip.closest('.hc-step');
      const stepNum = parseInt(step.dataset.step);
      // Highlight selected
      step.querySelectorAll('.hc-chip').forEach(c => c.classList.remove('selected'));
      chip.classList.add('selected');

      if (stepNum === 1) {
        selectedType = chip.dataset.val;
        showStep(2);
      } else if (stepNum === 2) {
        selectedSize = chip.dataset.val;
        showStep(3);
        if (hcZip) hcZip.focus();
      }
    });
  });

  if (hcZip) {
    hcZip.addEventListener('keydown', e => {
      if (e.key === 'Enter') {
        e.preventDefault();
        showStep(4);
      }
    });
  }

  // ── Before / After Sliders ──────────────────────────────────
  document.querySelectorAll('[data-ba]').forEach(slider => {
    const range = slider.querySelector('.ba-range');
    const before = slider.querySelector('.ba-before');
    if (!range || !before) return;

    function updateBA() {
      const val = range.value;
      before.style.clipPath = `inset(0 ${100 - val}% 0 0)`;
    }
    range.addEventListener('input', updateBA);
    updateBA();
  });

  // ── Gallery Filters ─────────────────────────────────────────
  const filterBtns = document.querySelectorAll('.filter-btn');
  const galleryItems = document.querySelectorAll('.gallery-item');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const filter = btn.dataset.filter;

      galleryItems.forEach(item => {
        if (filter === 'all' || item.dataset.category === filter) {
          item.style.display = '';
          item.style.opacity = '1';
          item.style.transform = 'scale(1)';
        } else {
          item.style.opacity = '0';
          item.style.transform = 'scale(0.8)';
          setTimeout(() => { item.style.display = 'none'; }, 300);
        }
      });
    });
  });

  // ── Lightbox ────────────────────────────────────────────────
  const lightbox = document.getElementById('lightbox');
  const lbImg = document.getElementById('lbImg');
  const lbCaption = document.getElementById('lbCaption');
  const lbClose = document.getElementById('lbClose');
  const lbPrev = document.getElementById('lbPrev');
  const lbNext = document.getElementById('lbNext');
  let lbImages = [];
  let lbIndex = 0;

  document.querySelectorAll('[data-lightbox]').forEach(link => {
    lbImages.push({ src: link.href, title: link.closest('.gallery-item')?.querySelector('h4')?.textContent || '' });
    link.addEventListener('click', e => {
      e.preventDefault();
      lbIndex = lbImages.indexOf(lbImages.find(i => i.src === link.href));
      openLightbox();
    });
  });

  function openLightbox() {
    if (!lightbox || !lbImages.length) return;
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
    updateLightbox();
  }

  function closeLightbox() {
    if (lightbox) lightbox.classList.remove('active');
    document.body.style.overflow = '';
  }

  function updateLightbox() {
    if (lbImg) lbImg.src = lbImages[lbIndex].src;
    if (lbCaption) lbCaption.textContent = lbImages[lbIndex].title;
  }

  if (lbClose) lbClose.addEventListener('click', closeLightbox);
  if (lbPrev) lbPrev.addEventListener('click', () => { lbIndex = (lbIndex - 1 + lbImages.length) % lbImages.length; updateLightbox(); });
  if (lbNext) lbNext.addEventListener('click', () => { lbIndex = (lbIndex + 1) % lbImages.length; updateLightbox(); });
  if (lightbox) {
    lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });
  }
  document.addEventListener('keydown', e => {
    if (!lightbox?.classList.contains('active')) return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowLeft') { lbIndex = (lbIndex - 1 + lbImages.length) % lbImages.length; updateLightbox(); }
    if (e.key === 'ArrowRight') { lbIndex = (lbIndex + 1) % lbImages.length; updateLightbox(); }
  });

  // ── Reviews Carousel ────────────────────────────────────────
  const revCarousel = document.getElementById('reviewsCarousel');
  const revPrev = document.getElementById('revPrev');
  const revNext = document.getElementById('revNext');
  const revDots = document.getElementById('revDots');
  let revIndex = 0;

  function getRevCards() {
    return revCarousel ? Array.from(revCarousel.children) : [];
  }

  function getCardsPerView() {
    const w = window.innerWidth;
    if (w < 600) return 1;
    if (w < 900) return 2;
    return 3;
  }

  function updateCarousel() {
    const cards = getRevCards();
    if (!cards.length || !revCarousel) return;
    const perView = getCardsPerView();
    const maxIndex = Math.max(0, cards.length - perView);
    revIndex = Math.min(revIndex, maxIndex);

    const cardWidth = cards[0].offsetWidth + 20; // gap
    revCarousel.style.transform = `translateX(-${revIndex * cardWidth}px)`;

    // Update dots
    if (revDots) {
      const dots = revDots.querySelectorAll('.dot');
      dots.forEach((d, i) => d.classList.toggle('active', i === revIndex));
    }
  }

  if (revPrev) revPrev.addEventListener('click', () => { revIndex = Math.max(0, revIndex - 1); updateCarousel(); });
  if (revNext) revNext.addEventListener('click', () => {
    const cards = getRevCards();
    const perView = getCardsPerView();
    revIndex = Math.min(cards.length - perView, revIndex + 1);
    updateCarousel();
  });

  if (revDots) {
    revDots.querySelectorAll('.dot').forEach(dot => {
      dot.addEventListener('click', () => {
        revIndex = parseInt(dot.dataset.index) || 0;
        updateCarousel();
      });
    });
  }

  window.addEventListener('resize', updateCarousel);
  updateCarousel();

  // ── FAQ Accordion ───────────────────────────────────────────
  document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.faq-item');
      const answer = item.querySelector('.faq-answer');
      const isOpen = item.classList.contains('open');

      // Close all
      document.querySelectorAll('.faq-item.open').forEach(openItem => {
        openItem.classList.remove('open');
        openItem.querySelector('.faq-question')?.setAttribute('aria-expanded', 'false');
        openItem.querySelector('.faq-answer').style.maxHeight = '0';
      });

      if (!isOpen) {
        item.classList.add('open');
        btn.setAttribute('aria-expanded', 'true');
        answer.style.maxHeight = answer.scrollHeight + 'px';
      }
    });
  });

  // ── Stat Counter Animation ──────────────────────────────────
  const statNumbers = document.querySelectorAll('.stat-number[data-target]');
  let statsAnimated = false;

  function animateStats() {
    if (statsAnimated) return;
    const firstStat = statNumbers[0];
    if (!firstStat) return;
    const rect = firstStat.getBoundingClientRect();
    if (rect.top < window.innerHeight && rect.bottom > 0) {
      statsAnimated = true;
      statNumbers.forEach(el => {
        const target = parseInt(el.dataset.target);
        const suffix = el.textContent.replace(/[0-9]/g, '');
        let current = 0;
        const increment = Math.ceil(target / 60);
        const timer = setInterval(() => {
          current += increment;
          if (current >= target) {
            current = target;
            clearInterval(timer);
          }
          el.textContent = current + suffix;
        }, 25);
      });
    }
  }
  window.addEventListener('scroll', animateStats, { passive: true });

  // ── Photo Upload Preview ────────────────────────────────────
  const photoZone = document.getElementById('photoZone');
  const qPhotos = document.getElementById('qPhotos');
  const photoPreviews = document.getElementById('photoPreviews');

  if (photoZone && qPhotos && photoPreviews) {
    // Click to open file dialog
    photoZone.addEventListener('click', e => {
      if (e.target !== qPhotos) qPhotos.click();
    });

    // Drag and drop
    photoZone.addEventListener('dragover', e => { e.preventDefault(); photoZone.classList.add('dragover'); });
    photoZone.addEventListener('dragleave', () => photoZone.classList.remove('dragover'));
    photoZone.addEventListener('drop', e => {
      e.preventDefault();
      photoZone.classList.remove('dragover');
      qPhotos.files = e.dataTransfer.files;
      handlePhotoPreview(e.dataTransfer.files);
    });

    qPhotos.addEventListener('change', () => handlePhotoPreview(qPhotos.files));
  }

  function handlePhotoPreview(files) {
    if (!photoPreviews) return;
    photoPreviews.innerHTML = '';
    Array.from(files).slice(0, 5).forEach(file => {
      if (!file.type.startsWith('image/')) return;
      const reader = new FileReader();
      reader.onload = e => {
        const div = document.createElement('div');
        div.className = 'preview-thumb';
        div.innerHTML = `<img src="${e.target.result}" alt="Preview" /><button type="button" class="preview-remove">&times;</button>`;
        div.querySelector('.preview-remove').addEventListener('click', ev => {
          ev.stopPropagation();
          div.remove();
        });
        photoPreviews.appendChild(div);
      };
      reader.readAsDataURL(file);
    });
  }

  // ── Quote Form — AJAX Submission ────────────────────────────
  const quoteForm = document.getElementById('quoteForm');
  if (quoteForm) {
    quoteForm.addEventListener('submit', async e => {
      e.preventDefault();

      // Basic validation
      const name = quoteForm.querySelector('#qName');
      const phone = quoteForm.querySelector('#qPhone');
      const zip = quoteForm.querySelector('#qZip');
      const service = quoteForm.querySelector('#qService');
      let valid = true;

      [name, phone, zip, service].forEach(field => {
        if (!field) return;
        const group = field.closest('.form-group');
        if (!field.value.trim()) {
          group?.classList.add('error');
          valid = false;
        } else {
          group?.classList.remove('error');
        }
      });

      if (!valid) return;

      const submitBtn = document.getElementById('quoteSubmitBtn');
      const btnText = submitBtn?.querySelector('.btn-text');
      const btnLoader = submitBtn?.querySelector('.btn-loader');

      if (btnText) btnText.style.display = 'none';
      if (btnLoader) btnLoader.style.display = '';
      if (submitBtn) submitBtn.disabled = true;

      const formData = new FormData(quoteForm);

      try {
        const res = await fetch('api/quote.php', { method: 'POST', body: formData });
        const data = await res.json();

        if (data.success) {
          const successEl = document.getElementById('formSuccess');
          if (successEl) {
            quoteForm.reset();
            // Hide all form fields
            quoteForm.querySelectorAll('.form-group, .form-header, .form-check-group, .form-disclaimer, #quoteSubmitBtn').forEach(el => el.style.display = 'none');
            successEl.style.display = '';
          }
        } else {
          alert(data.errors ? data.errors.join('\n') : 'Something went wrong. Please try again.');
        }
      } catch (err) {
        alert('Network error. Please try again or call us directly.');
      } finally {
        if (btnText) btnText.style.display = '';
        if (btnLoader) btnLoader.style.display = 'none';
        if (submitBtn) submitBtn.disabled = false;
      }
    });

    // Remove error state on input
    quoteForm.querySelectorAll('input, select, textarea').forEach(field => {
      field.addEventListener('input', () => {
        field.closest('.form-group')?.classList.remove('error');
      });
    });
  }

});
