<?php

$produk = [
    [
        "nama" => "Monitor 24 Inch",
        "kategori" => "MONITOR",
        "harga" => 1800000,
        "stok" => 4
    ],
    [
        "nama" => "Laptop Productivity",
        "kategori" => "LAPTOP",
        "harga" => 8500000,
        "stok" => 3
    ],
    [
        "nama" => "Keyboard Mechanical",
        "kategori" => "KEYBOARD",
        "harga" => 850000,
        "stok" => 7
    ],
    [
        "nama" => "Mouse Wireless",
        "kategori" => "MOUSE",
        "harga" => 450000,
        "stok" => 10
    ],
    [
        "nama" => "Headset Gaming",
        "kategori" => "HEADSET",
        "harga" => 1250000,
        "stok" => 0
    ],
    [
        "nama" => "Webcam Full HD",
        "kategori" => "WEBCAM",
        "harga" => 1100000,
        "stok" => 5
    ]
];

$totalProduk = count($produk);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header class="navbar">
    <div class="navbar-container">
        <div class="logo">Cia Store</div>

        <nav>
            <a href="#home">Home</a>
            <a href="#products">Products</a>
            <a href="#about">About</a>
        </nav>
    </div>
</header>

<section class="hero" id="home">
    <div class="hero-content">
        <p class="hero-small">CIA STORE</p>
        <h1>Simple Tech Store.</h1>
        <p class="hero-description">
            Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.
        </p>
        <a href="#products" class="hero-button">Lihat Produk</a>
    </div>
</section>

<section class="products-section" id="products">
    <div class="products-header">
        <div>
            <p class="section-label">OUR PRODUCTS</p>
            <h2>Katalog Produk</h2>
        </div>

        <div class="total-product">
            Total Produk: <?= $totalProduk ?>
        </div>
    </div>

    <div class="product-grid">

        <?php foreach ($produk as $item): ?>

            <?php
            $diskon = $item["harga"] >= 1000000 ? 10 : 0;
            $hargaDiskon = $item["harga"] - ($item["harga"] * $diskon / 100);
            ?>

            <article class="product-card">
                <div class="product-card-content">

                    <div class="product-category">
                        <?= $item["kategori"] ?>

                        <?php if ($diskon > 0): ?>
                            <span class="discount-label">
                                DISKON <?= $diskon ?>%
                            </span>
                        <?php endif; ?>
                    </div>

                    <h3><?= $item["nama"] ?></h3>

                    <div class="price">
                        <?php if ($diskon > 0): ?>
                            <div class="old-price">
                                Rp<?= number_format($item["harga"], 0, ",", ".") ?>
                            </div>

                            <div class="new-price">
                                Rp<?= number_format($hargaDiskon, 0, ",", ".") ?>
                            </div>
                        <?php else: ?>
                            <div class="new-price">
                                Rp<?= number_format($item["harga"], 0, ",", ".") ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="divider"></div>

                    <div class="stock">
                        <span>Stok: <?= $item["stok"] ?></span>

                        <?php if ($item["stok"] > 0): ?>
                            <span class="available">Tersedia</span>
                        <?php else: ?>
                            <span class="sold-out">Stok Habis</span>
                        <?php endif; ?>
                    </div>

                    <?php if ($item["stok"] > 0): ?>
                        <button class="buy-button">Beli Sekarang</button>
                    <?php else: ?>
                        <button class="buy-button disabled" disabled>
                            Stok Habis
                        </button>
                    <?php endif; ?>

                </div>
            </article>

        <?php endforeach; ?>

    </div>
</section>

<section class="about" id="about">
    <p class="section-label">ABOUT US</p>
    <h2>Cia Store</h2>
    <p>Toko sederhana yang menyediakan berbagai perangkat dan aksesoris teknologi.</p>
</section>

<footer>
    <p>&copy; <?= date("Y") ?> Cia Store</p>
</footer>

</body>
</html>