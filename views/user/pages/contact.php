<?php
$pageTitle = 'Kontak';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../components/breadcrumb.php';

?>
<section class="ftco-counter " data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <a href="https://wa.me/6289668638094?text=Hello%20Pondok%20Gita%20Ubud..." target="_blank"
                                class="text">
                                <div class="icon"><span class="icon-whatsapp"></span></div>
                                <span>+62 896 6863 8094</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <a href="mailto:pondokgita_ubud@yahoo.com?subject=Questions&body=Hello%20Pondok%20Gita%20Ubud..."
                                target="_blank" class="text">
                                <div class="icon"><span> <i class="icon-envelope"></i></span></div>
                                <span>pondokgita_ubud@yahoo.com</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="icon-map-marker"></span></div>
                                <span>Jl. Yudistira Timur, Peliatan, Ubud. </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row block-9">
            <div class="col-md-6 ftco-animate">
                <form id="form-review" class="contact-form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="country" placeholder="Country" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea id="" cols="30" rows="7" name="message" class="form-control" placeholder="Message"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary py-3 px-5">Send</button>
                    </div>
                </form>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4 contact-info ftco-animate">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.712247458582!2d115.2693312!3d-8.5272925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23d000594b14d%3A0xfbc31a05976cc7b6!2sPondok%20Gita!5e0!3m2!1sid!2sid!4v1734819414598!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>
    </div>
</section>

<?php
ob_start();
?>
<script>
    $('#form-review').submit(function (e) {
        e.preventDefault();

        const form = $(this);

        $.ajax({
            method: 'POST',
            url: '/pondok-gita-ubud/review',
            data: form.serialize(),
            dataType: 'json',
            success: function (response) {
                alert('success');
            }, error: function (error) {
                alert('error');
            }
        });

    });
</script>
<?php
$scripts = ob_get_clean();
?>

<?php
include __DIR__ . '/../layouts/footer.php';
?>