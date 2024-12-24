<?php
$pageTitle = 'Fasilitas';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../components/breadcrumb.php';

$rows = [
    [
        'name' => 'Free WiFi',
        'description' => 'Tetap terhubung selama menginap dengan akses WiFi gratis di seluruh area Pondok Gita Ubud',
        'icon' => '',
    ],
    [
        'name' => 'Free Parking',
        'description' => 'Nikmati kenyamanan parkir pribadi tanpa biaya tambahan selama menginap.',
        'icon' => '',
    ],
    [
        'name' => 'Non-smoking rooms',
        'description' => 'Semua kamar didesain sebagai area bebas rokok untuk menjaga kenyamanan dan kesehatan tamu.',
        'icon' => '',
    ],
    [
        'name' => 'Air Conditioning (AC)',
        'description' => 'Setiap kamar dilengkapi dengan AC untuk memastikan kenyamanan Anda selama berada di Pondok Gita Ubud.',
        'icon' => '',
    ],
    [
        'name' => 'Garden',
        'description' => 'Bersantai di taman kami yang asri, tempat yang sempurna untuk menikmati suasana tenang khas Ubud.',
        'icon' => '',
    ],
    [
        'name' => 'Terrace',
        'description' => 'Setiap kamar memiliki akses ke teras pribadi, ideal untuk menikmati pemandangan sekitar atau bersantai di sore hari.',
        'icon' => '',
    ]
];

?>

<section class="ftco-section ">
    <div class="container">
        <div class="row">
            <?php
            foreach ($rows as $key => $row) {
                ?>
                <div class="col-md-6 ftco-animate">
                    <div class="media d-flex block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5 mr-3">
                            <span class="flaticon-choices"></span>
                        </div>
                        <div class="media-body text-white">
                            <h3 class="heading text-white"><?= $row['name'] ?></h3>
                            <p><?= $row['description'] ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>


<?php
include __DIR__ . '/../layouts/footer.php';
?>