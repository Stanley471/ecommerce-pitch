<?php

/**
 * Header component.
 *
 * Expects these variables in calling scope:
 * @var string $page_title   — <title> tag content (required)
 * @var string $active_page  — 'home' | 'catalog' | '' (optional)
 */
$active_page = $active_page ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="CellVault — Curated flagship and mid-range smartphones.">
  <title><?= htmlspecialchars($page_title ?? 'CellVault') ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <header class="site-header" role="banner">
    <div class="container header-inner">

      <a href="/index.php" class="logo" aria-label="CellVault — home">
        Asap<em>Swap</em>
      </a>

      <nav class="header-nav" role="navigation" aria-label="Primary">
        <a href="index.php" class="<?= $active_page === 'home'    ? 'active' : '' ?>">Home</a>
        <a href="catalog.php" class="<?= $active_page === 'catalog'  ? 'active' : '' ?>">Phones</a>
        <a href="#" class="<?= $active_page === 'deals'    ? 'active' : '' ?>">Deals</a>
        <a href="#" class="<?= $active_page === 'about'    ? 'active' : '' ?>">About</a>
      </nav>

      <div class="header-right">
        <button class="cart-trigger" aria-label="Open cart, 0 items">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" aria-hidden="true">
            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <path d="M16 10a4 4 0 0 1-8 0" />
          </svg>
          Cart
          <span class="cart-pill" aria-live="polite">0</span>
        </button>

        <button class="nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
          <span></span><span></span><span></span>
        </button>
      </div>

    </div>
  </header>