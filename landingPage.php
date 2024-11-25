<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>

    <!-- style css -->
    <link rel="stylesheet" href="css/landingPage.css">

    <!-- Feathers Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Logo Icon -->
    <link rel="icon" href="img/logoGarbage100.png">

</head>

<body>

    <nav id="navbar">
        <img src="img/logo.png" alt="">
        <div class="navbarNav">
            <a href="#home">Home</a>
            <a href="#service">Service</a>
            <a href="#contact">Contact</a>

        </div>
        <a href="/presentasikaryainr/loginPage.php" class="loginButton">Login</a>
    </nav>

    <section class="homePage" id="home">
        <div class="homePageText">
            <h1>LAYANAN SISTEM PENGANGKUTAN SAMPAH</h1>
            <p>Pembuangan sampah anda menjadi lebih mudah dan ramah lingkungan.<br> Percayakan pembuangan sampah anda
                kepada kami </p>
            <button>Login Sekarang</button>
            <button>Selengkapnya</button>
        </div>
        <img src="img/gambar4.png" alt="">
    </section>

    <a href="" id="scrollToTop"><i data-feather="arrow-up" onclick="scrollToTop()"></i></a>

    <section class="servicePage" id="service">
        <h1>Service</h1>
        <div class="serviceWeOffer">
            <div class="serviceWeOffering">
                <i data-feather="calendar"></i>
                <h3>Penentuan jadwal Pengangkutan</h3>
                <p>Pengaturan jadwal penjemputan sampah sendiri.</p>
            </div>
            <div class="serviceWeOffering">
                <i data-feather="bar-chart"></i>
                <h3>Monitoring Pengangkutan Sampah</h3>
                <p>Proses pengambilan sampah yang terkontrol</p>
            </div>
            <div class="serviceWeOffering">
                <i data-feather="credit-card"></i>
                <h3>Angkut terlebih dahulu lalu Pembayaran</h3>
                <p>Pembayar tagihan secara adil sesuai berat sampah yang dihasilkan.</p>
            </div>
        </div>
    </section>

    <section class="joinUs" id="join">
        <img src="img/gambar3.png" alt="">
        <div class="joinUsSub">
            <h1>Mau sampahmu diangkut juga? <br>Buruan Login <span>AngkutNGAB</span></h1>
            <a href="/presentasikaryainr/loginPage.php">Login Sekarang?</a>
        </div>
    </section>


    <section class="benefit">
        <h4>Keuntungan menggunakan<br> <span>AngkutNGAB</span></h4>
        <div class="subBenefit">
            <ul>
                <li>
                    <div class="benefitWeOffer">
                        <i data-feather="database"></i>
                        <div>
                            <h5>Professional</h5>
                            <p>Pelayanan yang cepat, mudah dihubungi dan kepastian jadwal angkut sampah.</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="benefitWeOffer">
                        <i data-feather="shield"></i>
                        <div>
                            <h5>Trustworthy</h5>
                            <p>Sampah anda ditimbang oleh transporter dan bisa di monitor melalui aplikasi.</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="benefitWeOffer">
                        <i data-feather="cloud"></i>
                        <div>
                            <h5>Nature Friendly</h5>
                            <p>Sampah anda kami olah menjadi produk yang benilai tinggi.</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <footer>
        <h1>Hubungi Kami</h1>
        <div class="contact" id="contact">
            <div class="footerContact">
                <ul>
                    <li>
                        <p><i data-feather="phone"></i>(00-2100) 200030</p>
                    </li>
                    <li>
                        <p><i data-feather="mail"></i>email@gmail.com</p>
                    </li>
                    <li>
                        <p><i data-feather="map-pin"></i>Jl. Veteran Utara</p>
                    </li>
                </ul>
            </div>
            <div class="footerSosmed">
                <ul>
                    <li><a href=""><i data-feather="instagram"></i>Instagram</a></li>
                    <li><a href=""><i data-feather="facebook"></i>Facebook</a></li>
                    <li><a href=""><i data-feather="youtube"></i>Youtube</a></li>
                </ul>
            </div>
        </div>
        <p>Copyright &copy; 2023 AngkutNGAB. All rights reserved.</p>
    </footer>
    <script>
        feather.replace();
    </script>
    <script>
        window.addEventListener("scroll", function (e) {
            let nav = document.getElementById("navbar");
            nav.classList.toggle("sticky", window.scrollY > 0);
            console.log(window.scrollY);
        })

        let autoScroll = document.getElementById("scrollToTop");
        window.addEventListener("scroll", function (e) {
            if (window.scrollY > 450) {
                autoScroll.style.display = "block";
                autoScroll.classList.add()
            } else {
                autoScroll.style.display = "none";
            }
        })

        autoScroll.addEventListener("click", function (e) {
            window.scrollTo(0, 0);
            window.style.scrollBehavior = "smooth";
        })
    </script>
</body>

</html>