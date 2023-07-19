<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?= base_url('css/mdb.min.css'); ?>" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?= base_url('css/style.min.css'); ?>" rel="stylesheet">
    <style type="text/css">
        html,
        body,
        header,
        .carousel {
            height: 60vh;
        }

        @media (max-width: 740px) {

            html,
            body,
            header,
            .carousel {
                height: 100vh;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {

            html,
            body,
            header,
            .carousel {
                height: 100vh;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
                <strong class="blue-text">CoFun</strong>
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link waves-effect" href="/beranda">Beranda
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="#" target="_blank">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="#produk" target="#produk">Produk</a>
                    </li>
                </ul>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <a href="/invoice" class="nav-link waves-effect">
                            <span class="badge red z-depth-1 mr-1"> <?=$jumlah_invoice?></span>
                            <span class="clearfix d-none d-sm-inline-block"> Invoice </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/invoice" class="nav-link waves-effect">
                            <span class="badge red z-depth-1 mr-1"> <?=$jumlah_voucher?> </span>
                            <span class="clearfix d-none d-sm-inline-block"> Voucher</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="dark-grey-text">Selamat datang <?= session()->get('username'); ?> &#128522; </a>
                    </li>
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <!--Main layout-->
    <main class="mt-5 pt-4">
        <div class="container wow fadeIn" style="visibility: visible; animation-name: fadeIn;">

            <!-- Heading -->
            <h2 class="my-5 h2 text-center">Invoice & Voucher</h2>

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Invoice anda</span>
                        <span class="badge badge-secondary badge-pill"><?=$jumlah_invoice?></span>
                    </h4>

                    <!--Card-->
                    <div class="card"><ul class="list-group mb-3 z-depth-1">
                        <?php $totalInvoice=0;?>
                        <?php foreach($invoices as $invoice):?>
                            <?php $totalInvoice+=$invoice['total_invoice'];?>

                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">ID Inovice: <?=$invoice['id_invoice']?></h6>
                                    <small class="text-muted">Tanggal: <?=$invoice['tgl_invoice']?></small>
                                </div>
                                <span class="text-muted">Rp <?=number_format($invoice['total_invoice'], 0, ",", ".")?></span>
                            </li>
                            <?php endforeach; ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (Rupiah)</span>
                            <strong>Rp <?= number_format($totalInvoice, 0, ",", ".")?></strong>
                        </li>
                    </ul>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-4">

                    <!-- Heading -->
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Voucher anda</span>
                        <span class="badge badge-secondary badge-pill"><?=$jumlah_voucher?></span>
                    </h4>

                    <!-- Cart -->
                    <ul class="list-group mb-3 z-depth-1">
                    <?php $totalVoucher=0;?>
                        <?php foreach($vouchers as $voucher):?>
                            <?php $totalVoucher+=$voucher['nilai_voucher'];?>

                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Kode Voucher: <?=$voucher['kode_voucher']?></h6>
                                    <small class="text-muted">Tanggal Expired: <?=$voucher['tgl_expired']?></small>
                                </div>
                                <span class="text-muted">Rp <?=number_format($voucher['nilai_voucher'], 0, ",", ".")?></span>
                            </li>
                            <?php endforeach; ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (Rupiah)</span>
                            <strong>Rp <?= number_format($totalVoucher, 0, ",", ".")?></strong>
                        </li>
                    </ul>
                    <!-- Cart -->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="page-footer text-center font-small mt-4 wow fadeIn">



        <hr class="my-4">

        <!-- Social icons -->
        <div class="pb-4">
            <a href="https://www.facebook.com/mdbootstrap" target="_blank">
                <i class="fab fa-facebook-f mr-3"></i>
            </a>

            <a href="https://twitter.com/MDBootstrap" target="_blank">
                <i class="fab fa-twitter mr-3"></i>
            </a>

            <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
                <i class="fab fa-youtube mr-3"></i>
            </a>

            <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
                <i class="fab fa-google-plus-g mr-3"></i>
            </a>

            <a href="https://dribbble.com/mdbootstrap" target="_blank">
                <i class="fab fa-dribbble mr-3"></i>
            </a>

            <a href="https://pinterest.com/mdbootstrap" target="_blank">
                <i class="fab fa-pinterest mr-3"></i>
            </a>

            <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
                <i class="fab fa-github mr-3"></i>
            </a>

            <a href="http://codepen.io/mdbootstrap/" target="_blank">
                <i class="fab fa-codepen mr-3"></i>
            </a>
        </div>
        <!-- Social icons -->

        <!--Copyright-->
        <div class="footer-copyright py-3">
            © 2023 Copyright:
            <a href="" target="_blank"> CoFun </a>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="<?= base_url('js/jquery-3.4.1.min.js'); ?>"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?= base_url('js/popper.min.js'); ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?= base_url('js/bootstrap.min.js'); ?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?= base_url('js/mdb.min.js'); ?>"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
        $(document).ready(function() {
            var harga_produk_span = document.getElementById('span-harga-produk')
            const harga_produk_awal = document.getElementById('span-harga-produk').textContent
            var quantity_input_awal = parseInt(document.getElementById('input-kuantitas').value)
            $('#input-kuantitas').change(function() {
                var quantity_input_update = parseInt($(this).val());
                if (quantity_input_update >= quantity_input_awal) {
                    var harga_produk = harga_produk_awal
                    var harga_produk_to_string = (harga_produk.toString())
                    var harga_produk_to_int = parseInt(harga_produk_to_string.replace(/\./g, ''), 10)
                    var total = harga_produk_to_int * parseInt(quantity_input_update)
                    harga_produk_span.textContent = total.toLocaleString("id-ID");
                }

            });
        });
    </script>
</body>

</html>