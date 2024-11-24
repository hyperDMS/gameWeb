<?php
// Mảng chứa các game theo thể loại
$games = [
    'anime' => [
        [
            'icon_game' => 'anime_icon.png',
            'display_image' => 'anime_game1.jpg',
            'name' => 'Anime Game 1',
            'genre' => 'Anime',
            'rating' => 4.6,
            'size' => '1.5 GB'
        ],
        [
            'icon_game' => 'anime_icon.png',
            'display_image' => 'anime_game2.jpg',
            'name' => 'Anime Game 2',
            'genre' => 'Anime',
            'rating' => 4.2,
            'size' => '800 MB'
        ],
        // Thêm các game anime khác ở đây
    ],
    'hololive' => [
        [
            'icon_game' => 'hololive_icon.png',
            'display_image' => 'hololive_game1.jpg',
            'name' => 'Hololive Game 1',
            'genre' => 'Hololive',
            'rating' => 4.7,
            'size' => '2.0 GB'
        ],
        [
            'icon_game' => 'hololive_icon.png',
            'display_image' => 'hololive_game2.jpg',
            'name' => 'Hololive Game 2',
            'genre' => 'Hololive',
            'rating' => 4.3,
            'size' => '1.2 GB'
        ],
        // Thêm các game Hololive khác ở đây
    ],
    'pixel' => [
        [
            'icon_game' => 'pixel_icon.png',
            'display_image' => 'pixel_game1.jpg',
            'name' => 'Pixel Game 1',
            'genre' => 'Pixel',
            'rating' => 4.5,
            'size' => '500 MB'
        ],
        [
            'icon_game' => 'pixel_icon.png',
            'display_image' => 'pixel_game2.jpg',
            'name' => 'Pixel Game 2',
            'genre' => 'Pixel',
            'rating' => 4.1,
            'size' => '700 MB'
        ],
        // Thêm các game Pixel khác ở đây
    ],
    'roleplay' => [
        [
            'icon_game' => 'roleplay_icon.png',
            'display_image' => 'roleplay_game1.jpg',
            'name' => 'Roleplay Game 1',
            'genre' => 'Roleplay',
            'rating' => 5.0,
            'size' => '3.5 GB'
        ],
        [
            'icon_game' => 'roleplay_icon.png',
            'display_image' => 'roleplay_game2.jpg',
            'name' => 'Roleplay Game 2',
            'genre' => 'Roleplay',
            'rating' => 4.8,
            'size' => '4.0 GB'
        ],
        // Thêm các game nhập vai khác ở đây
    ]
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa Hàng Trò Chơi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="section">
            <h2 class="section-title">Trò Chơi Anime</h2>
            <div class="game-container">
                <?php foreach ($games['anime'] as $game): ?>
                    <div class="game-item">
                        <img src="<?= $game['icon_game'] ?>" alt="Game Icon" class="icon">
                        <img src="<?= $game['display_image'] ?>" alt="Game Display" class="display">
                        <div class="game-name"><?= $game['name'] ?></div>
                        <div class="game-genre"><?= $game['genre'] ?></div>
                        <div class="game-rating">Đánh giá: <?= $game['rating'] ?>/5</div>
                        <div class="game-size">Dung lượng: <?= $game['size'] ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="arrow">
                <img src="arrow_left.jpg" alt="Left Arrow">
            </div>
            <div class="arrow">
                <img src="arrow_right.jpg" alt="Right Arrow">
            </div>
        </div>

        <!-- Các phần mục khác (Sự kiện, Hololive, Pixel, Nhập vai) có thể làm tương tự như mục trên -->

    </div>
</body>
</html>
