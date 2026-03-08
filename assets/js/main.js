/* CellVault — main.js
   Only purposeful interactivity. No dependencies. */

// ── Mobile nav ───────────────────────────────────────────────────────────
(function navToggle() {
  const btn = document.querySelector('.nav-toggle');
  const nav = document.querySelector('.header-nav');
  if (!btn || !nav) return;

  btn.addEventListener('click', () => {
    const open = nav.classList.toggle('open');
    btn.setAttribute('aria-expanded', open);
  });
})();

// ── Gallery thumbnail swap ───────────────────────────────────────────────
(function gallery() {
  const mainImg = document.querySelector('.gallery-main-img');
  const thumbs  = document.querySelectorAll('.thumb');
  if (!mainImg || !thumbs.length) return;

  thumbs.forEach(thumb => {
    thumb.addEventListener('click', () => {
      mainImg.style.opacity = '0';
      setTimeout(() => {
        mainImg.src          = thumb.dataset.src;
        mainImg.style.opacity = '1';
      }, 160);
      thumbs.forEach(t => t.classList.remove('active'));
      thumb.classList.add('active');
    });
  });
})();

// ── Color swatch picker ──────────────────────────────────────────────────
(function colorPicker() {
  const btns = document.querySelectorAll('.color-btn');
  const disp = document.getElementById('selected-color');
  if (!btns.length) return;

  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      btns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      if (disp) disp.textContent = btn.dataset.colorName;
    });
  });
})();

// ── Storage option selector ──────────────────────────────────────────────
(function storagePicker() {
  const btns = document.querySelectorAll('.storage-btn');
  const disp = document.getElementById('selected-storage');
  if (!btns.length) return;

  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      btns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      if (disp) disp.textContent = btn.textContent.trim();
    });
  });
})();

// ── Toast notification ───────────────────────────────────────────────────
function toast(message) {
  let el = document.querySelector('.toast');
  if (!el) {
    el = document.createElement('div');
    el.className = 'toast';
    el.innerHTML = '<span class="toast-check">✓</span><span class="toast-msg"></span>';
    document.body.appendChild(el);
  }
  el.querySelector('.toast-msg').textContent = message;
  el.classList.add('show');
  clearTimeout(el._t);
  el._t = setTimeout(() => el.classList.remove('show'), 3200);
}

// ── Add to cart delegation ───────────────────────────────────────────────
document.addEventListener('click', e => {
  const btn = e.target.closest('[data-add-cart]');
  if (!btn) return;
  toast(`"${btn.dataset.addCart}" added to cart`);
  const pill = document.querySelector('.cart-pill');
  if (pill) pill.textContent = String((parseInt(pill.textContent, 10) || 0) + 1);
});

// ── Catalog: client-side category filter ────────────────────────────────
(function catalogFilter() {
  const checkboxes = document.querySelectorAll('.filter-item input[type="checkbox"]');
  const cards      = document.querySelectorAll('[data-category]');
  const countEl    = document.querySelector('.result-count');
  if (!checkboxes.length || !cards.length) return;

  function applyFilter() {
    const selected = [...checkboxes].filter(c => c.checked).map(c => c.value);
    let count = 0;
    cards.forEach(card => {
      const show = selected.length === 0 || selected.includes(card.dataset.category);
      card.style.display = show ? '' : 'none';
      if (show) count++;
    });
    if (countEl) countEl.textContent = `${count} product${count !== 1 ? 's' : ''}`;
  }

  checkboxes.forEach(cb => cb.addEventListener('change', applyFilter));
})();

// ── Catalog: client-side sort ────────────────────────────────────────────
(function catalogSort() {
  const select = document.querySelector('.sort-select');
  const grid   = document.querySelector('.product-grid');
  if (!select || !grid) return;

  select.addEventListener('change', () => {
    const items = [...grid.querySelectorAll('[data-price]')];
    items.sort((a, b) => {
      const pa = parseFloat(a.dataset.price);
      const pb = parseFloat(b.dataset.price);
      const ra = parseFloat(a.dataset.rating);
      const rb = parseFloat(b.dataset.rating);
      if (select.value === 'price-asc')  return pa - pb;
      if (select.value === 'price-desc') return pb - pa;
      if (select.value === 'rating')     return rb - ra;
      return 0;
    });
    items.forEach(i => grid.appendChild(i));
  });
})();
