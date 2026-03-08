<?php
/**
 * Product Card Component
 *
 * Expects $product array in calling scope.
 * Include via: <?php require __DIR__ . '/../components/product-card.php'; ?>
 */
require_once __DIR__ . '/../data/products.php';

$pct = $product['old_price']
    ? discount_pct($product['price'], $product['old_price'])
    : null;
?>

<article class="product-card reveal"
         data-category="<?= htmlspecialchars($product['category']) ?>"
         data-price="<?= $product['price'] ?>"
         data-rating="<?= $product['rating'] ?>">

  <?php /* ── Image ── */ ?>
  <a href="/product.php?slug=<?= urlencode($product['slug']) ?>"
     class="card-img-wrap"
     aria-label="View <?= htmlspecialchars($product['name']) ?>">
    <img src="<?= htmlspecialchars($product['image_card']) ?>"
         alt="<?= htmlspecialchars($product['name']) ?>"
         loading="lazy"
         width="600" height="450">

    <?php if ($product['badge']): ?>
      <span class="card-badge">
        <span class="<?= badge_class($product['badge_tone']) ?>">
          <?= htmlspecialchars($product['badge']) ?>
        </span>
      </span>
    <?php endif; ?>

    <button class="card-wishlist" aria-label="Wishlist <?= htmlspecialchars($product['name']) ?>">
      ♡
    </button>
  </a>

  <?php /* ── Body ── */ ?>
  <div class="card-body">
    <span class="card-brand"><?= htmlspecialchars($product['brand']) ?></span>

    <h3 class="card-name">
      <a href="/product.php?slug=<?= urlencode($product['slug']) ?>">
        <?= htmlspecialchars($product['name']) ?>
      </a>
    </h3>

    <p class="card-tagline"><?= htmlspecialchars($product['tagline']) ?></p>

    <div class="card-rating" aria-label="Rating <?= $product['rating'] ?> out of 5">
      <span class="stars"><?= star_markup($product['rating']) ?></span>
      <span><?= number_format($product['rating'], 1) ?></span>
      <span class="rating-count">(<?= number_format($product['review_count']) ?>)</span>
    </div>
  </div>

  <?php /* ── Footer ── */ ?>
  <div class="card-footer">
    <div class="price-stack">
      <span class="price-now"><?= fmt_price($product['price']) ?></span>
      <?php if ($product['old_price']): ?>
        <span class="price-was"><?= fmt_price($product['old_price']) ?></span>
        <span class="price-save">-<?= $pct ?>% off</span>
      <?php endif; ?>
    </div>

    <button class="btn btn-primary"
            data-add-cart="<?= htmlspecialchars($product['name']) ?>"
            aria-label="Add <?= htmlspecialchars($product['name']) ?> to cart">
      Add
    </button>
  </div>

</article>
