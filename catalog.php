<?php
require_once __DIR__ . '/data/products.php';

$page_title  = 'All Phones — CellVault';
$active_page = 'catalog';

$all_products = get_all_products();
$categories   = get_unique_categories();
$brands       = get_unique_brands();

require_once __DIR__ . '/components/header.php';
?>

<!-- ══════════════════════════════════════════
     PAGE BANNER
══════════════════════════════════════════ -->
<div class="page-banner">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="/index.php">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">›</span>
      <span aria-current="page">Phones</span>
    </nav>
    <h1 class="display-lg">All Smartphones</h1>
  </div>
</div>

<!-- ══════════════════════════════════════════
     CATALOG LAYOUT
══════════════════════════════════════════ -->
<div class="container">
  <div class="catalog-layout">

    <!-- ── Sidebar Filters ── -->
    <aside class="filter-sidebar" aria-label="Filter products">
      <p class="filter-title">Filters</p>

      <div class="filter-group">
        <p class="filter-group-label">Category</p>
        <?php foreach ($categories as $cat): ?>
          <label class="filter-item">
            <input type="checkbox" value="<?= htmlspecialchars($cat) ?>">
            <?= htmlspecialchars(ucwords(str_replace('-', ' ', $cat))) ?>
          </label>
        <?php endforeach; ?>
      </div>

      <div class="filter-group">
        <p class="filter-group-label">Brand</p>
        <?php foreach ($brands as $brand): ?>
          <label class="filter-item">
            <input type="checkbox" value="<?= htmlspecialchars(strtolower($brand)) ?>">
            <?= htmlspecialchars($brand) ?>
          </label>
        <?php endforeach; ?>
      </div>

      <div class="filter-group">
        <p class="filter-group-label">Price Range</p>
        <?php
        $price_ranges = [
          'under-400'  => 'Under $400',
          '400-800'    => '$400 – $800',
          '800-1200'   => '$800 – $1,200',
          'above-1200' => 'Above $1,200',
        ];
        foreach ($price_ranges as $val => $label): ?>
          <label class="filter-item">
            <input type="checkbox" value="<?= $val ?>">
            <?= $label ?>
          </label>
        <?php endforeach; ?>
      </div>
    </aside>

    <!-- ── Product Listing ── -->
    <div class="catalog-main">

      <div class="toolbar">
        <p class="result-count"><?= count($all_products) ?> products</p>
        <select class="sort-select" aria-label="Sort products by">
          <option value="default">Sort: Featured</option>
          <option value="price-asc">Price: Low → High</option>
          <option value="price-desc">Price: High → Low</option>
          <option value="rating">Highest Rated</option>
        </select>
      </div>

      <div class="product-grid">
        <?php foreach ($all_products as $product): ?>
          <?php require __DIR__ . '/components/product-card.php'; ?>
        <?php endforeach; ?>
      </div>

    </div>
  </div><!-- /.catalog-layout -->
</div><!-- /.container -->

<?php require_once __DIR__ . '/components/footer.php'; ?>
