<?php
require_once __DIR__ . '/data/products.php';

// Resolve product — 404 if not found
$slug    = filter_input(INPUT_GET, 'slug', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
$product = $slug ? get_product_by_slug($slug) : null;

if (!$product) {
  http_response_code(404);
  $page_title  = '404 — Not Found';
  $active_page = '';
  require_once __DIR__ . '/components/header.php';
?>
  <div class="container" style="text-align:center;padding:10rem 0;">
    <p class="eyebrow">Error 404</p>
    <h1 class="display-lg" style="margin:1rem 0 2rem;">Page not found.</h1>
    <a href="/catalog.php" class="btn btn-accent">Back to Phones</a>
  </div>
<?php
  require_once __DIR__ . '/components/footer.php';
  exit;
}

// Pre-compute values used in markup
$savings  = $product['old_price'] ? discount_pct($product['price'], $product['old_price']) : null;
$low_stock = $product['stock_qty'] <= 8;

// Related products: same category, excluding current, max 3
$related = array_slice(
  array_values(
    array_filter(
      get_products_by_category($product['category']),
      fn($p) => $p['id'] !== $product['id']
    )
  ),
  0,
  3
);

$page_title  = $product['name'] . ' — CellVault';
$active_page = 'catalog';

require_once __DIR__ . '/components/header.php';
?>

<!-- ══════════════════════════════════════════
     BREADCRUMB BANNER
══════════════════════════════════════════ -->
<div class="page-banner">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/index.php">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">›</span>
      <a href="/catalog.php">Phones</a>
      <span class="breadcrumb-sep" aria-hidden="true">›</span>
      <span aria-current="page"><?= htmlspecialchars($product['name']) ?></span>
    </nav>
    <h1 class="display-lg"><?= htmlspecialchars($product['name']) ?></h1>
  </div>
</div>

<!-- ══════════════════════════════════════════
     PRODUCT DETAIL
══════════════════════════════════════════ -->
<div class="container">
  <div class="product-detail">

    <!-- ── Gallery ── -->
    <div class="product-gallery">
      <div class="gallery-main">
        <img class="gallery-main-img"
          src="<?= htmlspecialchars($product['gallery'][0]) ?>"
          alt="<?= htmlspecialchars($product['name']) ?> — main image"
          width="800" height="800"
          style="transition: opacity 0.2s ease;">
      </div>

      <?php if (count($product['gallery']) > 1): ?>
        <div class="gallery-thumbs" role="list" aria-label="Product images">
          <?php foreach ($product['gallery'] as $idx => $img): ?>
            <button class="thumb <?= $idx === 0 ? 'active' : '' ?>"
              data-src="<?= htmlspecialchars($img) ?>"
              aria-label="View image <?= $idx + 1 ?>"
              role="listitem">
              <img src="<?= htmlspecialchars($img) ?>"
                alt=""
                loading="lazy"
                width="72" height="72">
            </button>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- ── Info Panel ── -->
    <div class="product-info">

      <p class="info-brand"><?= htmlspecialchars($product['brand']) ?></p>

      <h2 class="display-md info-name"><?= htmlspecialchars($product['name']) ?></h2>

      <p class="info-tagline">"<?= htmlspecialchars($product['tagline']) ?>"</p>

      <div class="info-rating"
        aria-label="Rating: <?= $product['rating'] ?> out of 5, <?= number_format($product['review_count']) ?> reviews">
        <span class="stars"><?= star_markup($product['rating']) ?></span>
        <strong><?= number_format($product['rating'], 1) ?></strong>
        <span class="text-muted">(<?= number_format($product['review_count']) ?> reviews)</span>
        <?php if ($product['badge']): ?>
          &nbsp;<span class="<?= badge_class($product['badge_tone']) ?>">
            <?= htmlspecialchars($product['badge']) ?>
          </span>
        <?php endif; ?>
      </div>

      <!-- Pricing -->
      <div class="info-pricing">
        <span class="info-price-now"><?= fmt_price($product['price']) ?></span>
        <?php if ($product['old_price']): ?>
          <span class="info-price-was"><?= fmt_price($product['old_price']) ?></span>
          <span class="info-price-save">Save <?= $savings ?>%</span>
        <?php endif; ?>
      </div>

      <!-- Color Picker -->
      <?php if (!empty($product['colors'])): ?>
        <div class="option-section">
          <p class="option-label">
            Color &mdash;
            <span class="selected-value" id="selected-color">
              <?= htmlspecialchars($product['colors'][0]['name']) ?>
            </span>
          </p>
          <div class="color-swatches">
            <?php foreach ($product['colors'] as $idx => $color): ?>
              <button class="color-btn <?= $idx === 0 ? 'active' : '' ?>"
                data-color-name="<?= htmlspecialchars($color['name']) ?>"
                aria-label="Color: <?= htmlspecialchars($color['name']) ?>">
                <span class="color-dot"
                  style="background:<?= htmlspecialchars($color['hex']) ?>;
                             outline: 1.5px solid rgba(255,255,255,0.15);
                             outline-offset: 1px;">
                </span>
                <?= htmlspecialchars($color['name']) ?>
              </button>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <!-- Storage Picker -->
      <?php if (!empty($product['storage'])): ?>
        <div class="option-section">
          <p class="option-label">
            Storage &mdash;
            <span class="selected-value" id="selected-storage">
              <?= htmlspecialchars($product['storage'][0]) ?>
            </span>
          </p>
          <div class="storage-btns">
            <?php foreach ($product['storage'] as $idx => $tier): ?>
              <button class="storage-btn <?= $idx === 0 ? 'active' : '' ?>"
                aria-label="Storage: <?= htmlspecialchars($tier) ?>">
                <?= htmlspecialchars($tier) ?>
              </button>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <!-- Stock -->
      <div class="stock-indicator">
        <span class="stock-dot <?= $low_stock ? 'stock-dot--low' : '' ?>"
          aria-hidden="true"></span>
        <?php if ($low_stock): ?>
          <span><strong><?= $product['stock_qty'] ?> left</strong> — order soon</span>
        <?php else: ?>
          <span>In stock — ships within 24h</span>
        <?php endif; ?>
      </div>

      <!-- CTA -->
      <div class="purchase-row">
        <button class="btn btn-accent"
          data-add-cart="<?= htmlspecialchars($product['name']) ?>"
          aria-label="Add <?= htmlspecialchars($product['name']) ?> to cart">
          <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" aria-hidden="true">
            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <path d="M16 10a4 4 0 0 1-8 0" />
          </svg>
          Add to Cart — <?= fmt_price($product['price'], "NGN") ?>
        </button>
        <button class="wishlist-btn" aria-label="Add to wishlist">♡</button>
      </div>

      <!-- Description -->
      <p class="info-desc"><?= htmlspecialchars($product['description']) ?></p>

      <!-- Key highlights -->
      <?php if (!empty($product['highlights'])): ?>
        <ul class="highlights" aria-label="Key highlights">
          <?php foreach ($product['highlights'] as $hl): ?>
            <li class="highlight"><?= htmlspecialchars($hl) ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

    </div><!-- /product-info -->
  </div><!-- /product-detail -->

  <!-- ══════════════════════════════════════════
       SPECIFICATIONS
  ══════════════════════════════════════════ -->
  <?php if (!empty($product['specs'])): ?>
    <div class="specs-section">
      <h2 class="display-md" id="specs-heading">Specifications</h2>
      <table class="specs-table" aria-labelledby="specs-heading">
        <tbody>
          <?php foreach ($product['specs'] as $key => $value): ?>
            <tr>
              <th scope="row"><?= htmlspecialchars($key) ?></th>
              <td><?= htmlspecialchars($value) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>

  <!-- ══════════════════════════════════════════
       RELATED PRODUCTS
  ══════════════════════════════════════════ -->
  <?php if (!empty($related)): ?>
    <section class="section" aria-labelledby="related-heading" style="padding-top:1rem;">
      <div class="section-hd">
        <div class="section-hd-left">
          <p class="eyebrow">Same category</p>
          <h2 class="display-lg" id="related-heading">You May Also Like</h2>
        </div>
        <a href="/catalog.php" class="btn btn-ghost">Browse All &rarr;</a>
      </div>

      <div class="product-grid">
        <?php foreach ($related as $product): ?>
          <?php require __DIR__ . '/components/product-card.php'; ?>
        <?php endforeach; ?>
      </div>
    </section>
  <?php endif; ?>

</div><!-- /container -->

<?php require_once __DIR__ . '/components/footer.php'; ?>