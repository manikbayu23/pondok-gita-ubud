<?php
$pageTitle = 'Galeri';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../components/breadcrumb.php';

$data = [
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
    ],
];

$itemsPerPage = 2; // Jumlah item per halaman
$totalItems = count($data); // Total item
$totalPages = ceil($totalItems / $itemsPerPage); // Total halaman
$currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1; // Halaman aktif (default: 1)

// Validasi halaman aktif
if ($currentPage < 1) {
    $currentPage = 1;
} elseif ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}

// Hitung offset
$offset = ($currentPage - 1) * $itemsPerPage;

// Ambil data untuk halaman saat ini
$rows = array_slice($data, $offset, $itemsPerPage);

?>

<section class="ftco-section">
    <div class="container-fluid">
        <div class="row">
            <?php
            foreach ($rows as $key => $row) {
                ?>
                <div class="col-md-4 mb-4 ftco-animate">
                    <a href="gallery.html" class="gallery img d-flex align-items-center"
                        style="background-image: url(/pondok-gita-ubud/assets/user/images/bg-primary.jpg); ">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-search"></span>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <!-- Tombol Sebelumnya -->
                        <?php if ($currentPage > 1): ?>
                            <li><a href="?page=<?= $currentPage - 1; ?>">&lt;</a></li>
                        <?php else: ?>
                            <li class="disabled"><span>&lt;</span></li>
                        <?php endif; ?>

                        <!-- Halaman Pertama -->
                        <?php if ($currentPage > 3): ?>
                            <li><a href="?page=1">1</a></li>
                            <?php if ($currentPage > 4): ?>
                                <li><span>...</span></li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <!-- Nomor Halaman Utama -->
                        <?php
                        $start = max(1, $currentPage - 2);
                        $end = min($totalPages, $currentPage + 2);
                        for ($i = $start; $i <= $end; $i++): ?>
                            <li class="<?= $i === $currentPage ? 'active' : ''; ?>">
                                <a href="?page=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <!-- Halaman Terakhir -->
                        <?php if ($currentPage < $totalPages - 2): ?>
                            <?php if ($currentPage < $totalPages - 3): ?>
                                <li><span>...</span></li>
                            <?php endif; ?>
                            <li><a href="?page=<?= $totalPages; ?>"><?= $totalPages; ?></a></li>
                        <?php endif; ?>

                        <!-- Tombol Berikutnya -->
                        <?php if ($currentPage < $totalPages): ?>
                            <li><a href="?page=<?= $currentPage + 1; ?>">&gt;</a></li>
                        <?php else: ?>
                            <li class="disabled"><span>&gt;</span></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include __DIR__ . '/../layouts/footer.php';
?>