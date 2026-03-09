<?php
require_once __DIR__ . '/data/products.php';

$page_title  = 'Sabstores International — Curated Smartphones';
$active_page = 'home';

$all_products = get_all_products();
$hero_product = $all_products[0];                          // Orion Ultra S as hero
$featured     = [$all_products[0], $all_products[1], $all_products[2]]; // handpicked 3
$categories   = get_unique_categories();
$cat_counts   = array_count_values(array_column($all_products, 'category'));

require_once __DIR__ . '/components/header.php';
?>

<!-- ══════════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════════ -->
<section class="hero" aria-label="Featured product">
  <div class="hero-bg-number" aria-hidden="true">01</div>

  <div class="container hero-grid">

    <div class="hero-content">
      <p class="eyebrow eyebrow--accent hero-eyebrow">
        &#9679; New arrival — <?= date('Y') ?>
      </p>

      <h1 class="display-xl hero-title">
        Sabstores<br><em>International</em>
      </h1>

      <p class="hero-desc">
        <?= htmlspecialchars($hero_product['tagline']) ?>
        Titanium. Ceramic. A camera that sees what your eyes miss.
        The <?= htmlspecialchars($hero_product['name']) ?> sets a new standard.
      </p>

      <div class="hero-actions">
        <a href="product.php?slug=<?= urlencode($hero_product['slug']) ?>"
           class="btn btn-accent">
          Explore Now
          <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5"
               viewBox="0 0 24 24" aria-hidden="true">
            <path d="M5 12h14M12 5l7 7-7 7"/>
          </svg>
        </a>
        <a href="catalog.php" class="btn btn-outline">View All Phones</a>
      </div>

      <div class="hero-meta">
        <div class="hero-meta-item">
          <span class="display-md"><?= count($all_products) ?>000+</span>
          <small>Devices</small>
        </div>
        <div class="hero-meta-item">
          <span class="display-md">24h</span>
          <small>Dispatch</small>
        </div>
        <div class="hero-meta-item">
          <span class="display-md">1yr</span>
          <small>Warranty</small>
        </div>
      </div>
    </div>

    <div class="hero-img-wrap" aria-hidden="true">
      <div class="hero-img-glow"></div>
      <img src="<?= htmlspecialchars($hero_product['image_hero']) ?>"
           alt="<?= htmlspecialchars($hero_product['name']) ?>"
           width="500" height="500">
    </div>

  </div>
</section>

<!-- Marquee -->
<div class="marquee-strip" aria-hidden="true">
  <?php
  $items = [
    'Free Shipping Over ₦500,000',
    '30-Day Returns',
    'Certified Unlocked',
    '1-Year Warranty',
    'Secure Checkout',
    'Expert Support',
  ];
  $doubled = array_merge($items, $items);
  ?>
  <div class="marquee-track">
    <?php foreach ($doubled as $item): ?>
      <span><?= htmlspecialchars($item) ?></span>
      <span class="dot">&bull;</span>
    <?php endforeach; ?>
  </div>
</div>

<!-- ══════════════════════════════════════════════════════════
     FEATURED
══════════════════════════════════════════════════════════ -->
<section class="section" aria-labelledby="featured-heading">
  <div class="container">

    <div class="section-hd">
      <div class="section-hd-left">
        <p class="eyebrow">Handpicked</p>
        <h2 class="display-lg" id="featured-heading">Featured Phones</h2>
      </div>
      <a href="/catalog.php" class="btn btn-ghost">See All &rarr;</a>
    </div>

    <div class="product-grid">
      <?php foreach ($featured as $product): ?>
        <?php require __DIR__ . '/components/product-card.php'; ?>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ══════════════════════════════════════════════════════════
     PERKS
══════════════════════════════════════════════════════════ -->
<div class="perks-bar">
  <div class="container">
    <ul class="perks-list" role="list">
      <li class="perk">
        <span class="perk-icon" aria-hidden="true">✦</span>
        <div>
          <p class="perk-title">Free Shipping</p>
          <p class="perk-desc">On all orders over $75. Every time.</p>
        </div>
      </li>
      <li class="perk">
        <span class="perk-icon" aria-hidden="true">↺</span>
        <div>
          <p class="perk-title">30-Day Returns</p>
          <p class="perk-desc">Changed your mind? No questions asked.</p>
        </div>
      </li>
      <li class="perk">
        <span class="perk-icon" aria-hidden="true">◈</span>
        <div>
          <p class="perk-title">2-Year Warranty</p>
          <p class="perk-desc">Full coverage on every device we sell.</p>
        </div>
      </li>
      <li class="perk">
        <span class="perk-icon" aria-hidden="true">⬡</span>
        <div>
          <p class="perk-title">Expert Support</p>
          <p class="perk-desc">Real humans. Mon–Sat, 9am–8pm.</p>
        </div>
      </li>
    </ul>
  </div>
</div>

<!-- ══════════════════════════════════════════════════════════
     CATEGORIES
══════════════════════════════════════════════════════════ -->
<section class="section" aria-labelledby="cat-heading">
  <div class="container">

    <div class="section-hd">
      <div class="section-hd-left">
        <p class="eyebrow">Browse</p>
        <h2 class="display-lg" id="cat-heading">Shop by Type</h2>
      </div>
    </div>

    <?php
    $cat_meta = [
      'flagship'  => ['icon' => '◆', 'label' => 'Flagship'],
      'foldable'  => ['icon' => '⊡', 'label' => 'Foldable'],
      'mid-range' => ['icon' => '◇', 'label' => 'Mid-Range'],
      'rugged'    => ['icon' => '◉', 'label' => 'Rugged'],
      'budget'    => ['icon' => '○', 'label' => 'Budget'],
    ];
    ?>
    <div class="cat-grid">
      <?php foreach ($cat_meta as $slug => $meta): ?>
        <?php $count = $cat_counts[$slug] ?? 0; ?>
        <a href="/catalog.php?category=<?= urlencode($slug) ?>" class="cat-card">
          <div class="cat-icon" aria-hidden="true"><?= $meta['icon'] ?></div>
          <div class="cat-label"><?= $meta['label'] ?></div>
          <div class="cat-count"><?= $count ?> phone<?= $count !== 1 ? 's' : '' ?></div>
        </a>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<?php require_once __DIR__ . '/components/footer.php'; ?>
