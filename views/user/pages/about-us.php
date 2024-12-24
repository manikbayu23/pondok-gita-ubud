<?php
$pageTitle = 'About Us';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../components/breadcrumb.php';
?>

<section class="ftco-about d-md-flex mb-3">
    <div class="one-half img" style="background-image: url(/pondok-gita-ubud/assets/user/images/bg-primary.jpg);"></div>
    <div class="one-half ftco-animate">
        <div class="overlap">
            <div class="heading-section ftco-animate ">
                <h2 class="mb-4">Pondok Gita Ubud</h2>
            </div>
            <div>
                <p>Pondok Gita Ubud, didirikan pada tahun 2023 oleh Ibu Ni Wayan Sukerti, menawarkan akomodasi nyaman
                    dan terjangkau di Jl. Yudistira Timur, Peliatan, Ubud. Dengan empat kamar berfasilitas lengkap,
                    seperti AC, kamar mandi modern, serta akses WiFi gratis, kami menjadi pilihan ideal bagi wisatawan
                    dengan anggaran terbatas. Kami juga menyediakan balkon dan teras untuk bersantai, serta parkir
                    pribadi gratis bagi para tamu. <br>
                    Terletak hanya 2,2 km dari Monkey Forest Ubud, 2,7 km dari Goa Gajah, dan 3,6 km dari Ubud Palace,
                    Pondok Gita Ubud menghadirkan lokasi strategis untuk menikmati keindahan Ubud. Nikmati pengalaman
                    menginap yang menyenangkan sambil merasakan pesona keindahan alam dan budaya khas Ubud, yang sangat
                    disukai oleh pasangan, dengan lokasi yang dinilai sempurna untuk perjalanan dua orang.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-menu">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Ulasan</h2>
            </div>
        </div>
        <div class="owl-carousel owl-theme">
            <?php
            for ($i = 0; $i < 10; $i++) {
                ?>
                <div class="item">
                    <div class="testimony">
                        <blockquote>
                            <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic life One day however a small.&rdquo;</p>
                        </blockquote>
                        <div class="author d-flex mt-4">
                            <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                    Designer</span></div>
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
ob_start();
?>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 2500,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
</script>
<?php
$scripts = ob_get_clean();
?>
<?php
include __DIR__ . '/../layouts/footer.php';
?>