<?php

/**
 * Product data store.
 * Single source of truth — swap this function body for a PDO query when DB is ready.
 * All product objects share identical keys for predictable rendering.
 */
function get_all_products(): array
{
    return [
        [
            'id'          => 1,
            'slug'        => 'orion-ultra-s',
            'name'        => 'Samsung S26 Ultra',
            'tagline'     => 'Meet Galaxy S26 and S26+, our powerful AI phones, unified by a single corner radius that flows across every model and feels perfect in any hand.',
            'brand'       => 'Samsung',
            'price'       => 1799999.99,
            'old_price'   => 2000000.00,
            'badge'       => 'New Arrival',
            'badge_tone'  => 'warm',   // warm | cool | neutral
            'category'    => 'flagship',
            'in_stock'    => true,
            'stock_qty'   => 9,
            'rating'      => 4.9,
            'review_count'=> 847,
            'image_hero'  => '2s26.webp',
            'image_card'  => 's26.jpg',
            'gallery'     => [
                'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=900&q=85',
                'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=900&q=85',
                'https://images.unsplash.com/photo-1565849904461-04a58ad377e0?w=900&q=85',
            ],
            'colors'      => [
                ['name' => 'Obsidian',      'hex' => '#1C1C1E'],
                ['name' => 'Alpine White',  'hex' => '#F5F5F0'],
                ['name' => 'Deep Crimson',  'hex' => '#8B1A1A'],
            ],
            'storage'     => ['128GB', '256GB', '512GB'],
            'description' => 'The Orion Ultra S is not merely a phone — it is a declaration. Hand-polished titanium frame, a display that redefines what glass can do, and a computational photography system trained on one hundred million images. For those who will not compromise.',
            'specs'       => [
                'Display'    => '6.9″ ProMotion OLED, 2000 nits peak',
                'Chip'       => 'Orion A3 Bionic, 3nm architecture',
                'RAM'        => '16 GB LPDDR5X',
                'Camera'     => '200 MP + 48 MP periscope + 12 MP ultrawide',
                'Battery'    => '5200 mAh — 100W wired, 45W wireless',
                'Build'      => 'Grade 5 Titanium + Ceramic Shield',
                'Biometrics' => 'Under-display ultrasonic fingerprint + Face ID',
                'OS'         => 'OrionOS 3.0 (Android 15 based)',
                'Water'      => 'IP68 — 6 m for 30 min',
                'Dimensions' => '163.4 × 77.9 × 7.9 mm, 229 g',
            ],
            'highlights'  => [
                'Titanium aerospace-grade frame',
                'ProMotion 120Hz adaptive display',
                '10× optical zoom periscope lens',
                '100W HyperCharge — 0→100% in 25 min',
            ],
        ],
        [
            'id'          => 2,
            'slug'        => 'nova-flex-3',
            'name'        => 'iPhone 17 pro max',
            'tagline'     => 'Unfold a bigger world.',
            'brand'       => 'Apple',
            'price'       => 1700000.00,
            'old_price'   => null,
            'badge'       => 'New',
            'badge_tone'  => 'cool',
            'category'    => 'flagship',
            'in_stock'    => true,
            'stock_qty'   => 6,
            'rating'      => 4.7,
            'review_count'=> 312,
            'image_hero'  => 'iphone17.jpg',
            'image_card'  => 'iphone17.jpg',
            'gallery'     => [
                'https://images.unsplash.com/photo-1678911820864-e5c67e784978?w=900&q=85',
                'https://images.unsplash.com/photo-1601784551446-20c9e07cdbdb?w=900&q=85',
            ],
            'colors'      => [
                ['name' => 'Moonlit Silver', 'hex' => '#C0C0C8'],
                ['name' => 'Abyssal Black',  'hex' => '#121212'],
            ],
            'storage'     => ['256GB', '512GB'],
            'description' => 'Three generations in, the Nova Flex 3 has solved the foldable. The crease is gone. The hinge is silent. The inner display is indistinguishable from glass — because it is glass. Desktop-class multitasking in the pocket you already have.',
            'specs'       => [
                'Inner Display'  => '8.0″ Foldable AMOLED, 120Hz, crease-free',
                'Outer Display'  => '6.3″ AMOLED, 120Hz',
                'Chip'           => 'Snapdragon X Elite, 4nm',
                'RAM'            => '12 GB LPDDR5',
                'Camera'         => '50 MP + 12 MP + 10 MP telephoto',
                'Battery'        => '4500 mAh — 65W wired',
                'Hinge'          => 'Fluid Hinge v3, IPX8 rated',
                'OS'             => 'Android 15 + NovaFold UI',
                'Weight'         => '253 g (folded: 163 × 73 × 13 mm)',
                'Build'          => 'Armor Aluminum + Ultra-Thin Glass',
            ],
            'highlights'  => [
                'Crease-free UTG inner display',
                'Split-screen & taskbar multitasking',
                'IPX8 water resistance',
                'S-Pen slot included',
            ],
        ],
        [
            'id'          => 3,
            'slug'        => 'swift-5g-plus',
            'name'        => 'Redmi Note 15',
            'tagline'     => 'Every day, elevated.',
            'brand'       => 'Redmi',
            'price'       => 699000.00,
            'old_price'   => 750000.00,
            'badge'       => 'Best Value',
            'badge_tone'  => 'neutral',
            'category'    => 'mid-range',
            'in_stock'    => true,
            'stock_qty'   => 45,
            'rating'      => 4.9,
            'review_count'=> 2140,
            'image_hero'  => 'redmi.webp',
            'image_card'  => 'redmi.webp',
            'gallery'     => [
                'https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=900&q=85',
                'https://images.unsplash.com/photo-1580910051074-3eb694886505?w=900&q=85',
            ],
            'colors'      => [
                ['name' => 'Sage Mist',   'hex' => '#8BA888'],
                ['name' => 'Slate Blue',  'hex' => '#5B7FA6'],
                ['name' => 'Sand Dune',   'hex' => '#C4A882'],
            ],
            'storage'     => ['128GB', '256GB'],
            'description' => 'The Swift 5G+ delivers a flagship experience at a price that respects your intelligence. OLED display, all-day battery, and a camera that captures the moment — not a simulation of it.',
            'specs'       => [
                'Display'    => '6.6″ AMOLED, 90Hz, 1000 nits',
                'Chip'       => 'Dimensity 9200+',
                'RAM'        => '8 GB LPDDR5',
                'Camera'     => '108 MP + 13 MP ultrawide + 5 MP macro',
                'Battery'    => '4800 mAh — 67W fast charge',
                'Build'      => 'Gorilla Glass 5, aluminum frame',
                'OS'         => 'Android 15',
                'Water'      => 'IP54',
                'Weight'     => '195 g',
                'Dimensions' => '160.2 × 74.5 × 8.1 mm',
            ],
            'highlights'  => [
                '108 MP main sensor',
                '67W SuperCharge — full in 44 min',
                '4 years OS updates guaranteed',
                'In-display fingerprint sensor',
            ],
        ],
        [
            'id'          => 4,
            'slug'        => 'terrain-rugged-x',
            'name'        => 'Terrain Rugged X',
            'tagline'     => 'Built for where roads end.',
            'brand'       => 'Terrain',
            'price'       => 749.00,
            'old_price'   => null,
            'badge'       => 'MIL-STD-810H',
            'badge_tone'  => 'warm',
            'category'    => 'rugged',
            'in_stock'    => true,
            'stock_qty'   => 18,
            'rating'      => 4.6,
            'review_count'=> 489,
            'image_hero'  => 'https://images.unsplash.com/photo-1585060544812-6b45742d762f?w=900&q=85',
            'image_card'  => 'https://images.unsplash.com/photo-1585060544812-6b45742d762f?w=600&q=80',
            'gallery'     => [
                'https://images.unsplash.com/photo-1585060544812-6b45742d762f?w=900&q=85',
                'https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?w=900&q=85',
            ],
            'colors'      => [
                ['name' => 'Tactical Orange', 'hex' => '#D4601A'],
                ['name' => 'Ranger Green',    'hex' => '#3B4A3C'],
            ],
            'storage'     => ['256GB'],
            'description' => 'Drop it from two meters. Submerge it to three. Leave it in the desert heat. The Terrain Rugged X has a thermal rating from -40°C to 75°C, a built-in satellite communicator, and a battery that lasts two days.',
            'specs'       => [
                'Display'    => '6.6″ IPS LCD, 120Hz, glove-compatible',
                'Chip'       => 'Snapdragon 8 Gen 2',
                'RAM'        => '12 GB LPDDR5',
                'Camera'     => '64 MP + 20 MP night vision + thermal',
                'Battery'    => '7000 mAh — 33W charge + solar panel',
                'Protection' => 'MIL-STD-810H, IP69K',
                'Temp Range' => '-40°C to +75°C',
                'Extras'     => 'Satellite SOS, built-in compass, barometer',
                'Build'      => 'Polycarbonate armor + Gorilla Glass Victus',
                'Weight'     => '298 g',
            ],
            'highlights'  => [
                '7000 mAh with solar charging panel',
                'Satellite emergency SOS',
                'IP69K + MIL-STD-810H certified',
                'Thermal camera included',
            ],
        ],
        [
            'id'          => 5,
            'slug'        => 'lumix-cam-pro',
            'name'        => 'Lumix Cam Pro',
            'tagline'     => 'A camera. That happens to make calls.',
            'brand'       => 'Lumix',
            'price'       => 999.00,
            'old_price'   => 1199.00,
            'badge'       => 'Camera King',
            'badge_tone'  => 'cool',
            'category'    => 'flagship',
            'in_stock'    => true,
            'stock_qty'   => 22,
            'rating'      => 4.8,
            'review_count'=> 1056,
            'image_hero'  => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=900&q=85',
            'image_card'  => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=600&q=80',
            'gallery'     => [
                'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=900&q=85',
                'https://images.unsplash.com/photo-1567581935884-3349723552ca?w=900&q=85',
            ],
            'colors'      => [
                ['name' => 'Midnight Ink',  'hex' => '#2D2D3D'],
                ['name' => 'Pearl Cream',   'hex' => '#EDE8DC'],
            ],
            'storage'     => ['256GB', '512GB', '1TB'],
            'description' => 'Co-engineered with Leica. The Lumix Cam Pro houses a 1-inch sensor, five lenses, and optical image stabilization borrowed from cinema cameras. The result is images indistinguishable from those taken with a dedicated camera.',
            'specs'       => [
                'Main Sensor' => '1-inch, 200 MP, Leica optics',
                'Lenses'      => '5-lens system: 14mm to 230mm equiv.',
                'Display'     => '6.73″ LTPO OLED, 1-120Hz',
                'Chip'        => 'Snapdragon 8 Gen 3 for Mobile',
                'RAM'         => '16 GB LPDDR5X',
                'Video'       => '8K@30fps, 4K@120fps, Log profiles',
                'Battery'     => '4860 mAh — 90W wired, 50W wireless',
                'Stabilizer'  => '5-axis OIS, 8EV compensation',
                'Build'       => 'Nano-tech ceramic + titanium',
                'Water'       => 'IP68',
            ],
            'highlights'  => [
                '1-inch sensor co-developed with Leica',
                '8K video with Log color profiles',
                '5-axis optical stabilization',
                'Variable aperture f/1.4 – f/4.0',
            ],
        ],
        [
            'id'          => 6,
            'slug'        => 'entry-q-lite',
            'name'        => 'Entry Q Lite',
            'tagline'     => 'Smart. Simple. Yours.',
            'brand'       => 'Entry',
            'price'       => 189.00,
            'old_price'   => null,
            'badge'       => null,
            'badge_tone'  => 'neutral',
            'category'    => 'budget',
            'in_stock'    => true,
            'stock_qty'   => 80,
            'rating'      => 4.1,
            'review_count'=> 3882,
            'image_hero'  => 'https://images.unsplash.com/photo-1580910051074-3eb694886505?w=900&q=85',
            'image_card'  => 'https://images.unsplash.com/photo-1580910051074-3eb694886505?w=600&q=80',
            'gallery'     => [
                'https://images.unsplash.com/photo-1580910051074-3eb694886505?w=900&q=85',
            ],
            'colors'      => [
                ['name' => 'Lavender',   'hex' => '#9B89B4'],
                ['name' => 'Sky',        'hex' => '#7BB3D4'],
                ['name' => 'Charcoal',   'hex' => '#3E3E3E'],
                ['name' => 'Blush',      'hex' => '#E8A0A0'],
            ],
            'storage'     => ['64GB', '128GB'],
            'description' => 'Everything you need, nothing you don\'t. The Entry Q Lite delivers a fast Android experience, a reliable camera, and a 5000 mAh battery that outlasts the day — at a price that is simply fair.',
            'specs'       => [
                'Display'    => '6.5″ IPS LCD, 90Hz',
                'Chip'       => 'Dimensity 700, 5G',
                'RAM'        => '4 GB LPDDR4X',
                'Camera'     => '50 MP + 5 MP depth',
                'Battery'    => '5000 mAh — 18W charge',
                'Build'      => 'Polycarbonate',
                'OS'         => 'Android 15 Go Edition',
                'Water'      => 'IPX2 splash resistant',
                'Weight'     => '188 g',
                'Dimensions' => '164.0 × 75.8 × 8.9 mm',
            ],
            'highlights'  => [
                '5G connectivity at entry price',
                'All-day 5000 mAh battery',
                'Clean Android 15 Go experience',
                'Expandable storage via microSD',
            ],
        ],
    ];
}

// ── Lookup helpers ─────────────────────────────────────────────────────────

function get_product_by_slug(string $slug): ?array
{
    foreach (get_all_products() as $p) {
        if ($p['slug'] === $slug) return $p;
    }
    return null;
}

function get_products_by_category(string $cat): array
{
    return array_values(
        array_filter(get_all_products(), fn($p) => $p['category'] === $cat)
    );
}

function get_unique_categories(): array
{
    return array_values(
        array_unique(array_column(get_all_products(), 'category'))
    );
}

function get_unique_brands(): array
{
    return array_values(
        array_unique(array_column(get_all_products(), 'brand'))
    );
}

// ── Presentation helpers ───────────────────────────────────────────────────

function fmt_price(float $price): string
{
    return '₦' . number_format($price, 2);
}

function discount_pct(float $now, float $was): int
{
    return (int) round((($was - $now) / $was) * 100);
}

function star_markup(float $rating): string
{
    $out   = '';
    $full  = (int) $rating;
    $frac  = $rating - $full;
    $empty = 5 - $full - ($frac >= 0.5 ? 1 : 0);

    $out .= str_repeat('<span class="star star--full">★</span>', $full);
    if ($frac >= 0.5) $out .= '<span class="star star--half">★</span>';
    $out .= str_repeat('<span class="star star--empty">☆</span>', $empty);

    return $out;
}

function badge_class(string $tone): string
{
    return match ($tone) {
        'warm'    => 'badge badge--warm',
        'cool'    => 'badge badge--cool',
        default   => 'badge badge--neutral',
    };
}
