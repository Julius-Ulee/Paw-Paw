<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("customer/layouts/_head"); ?>

<body>

	<!-- Navigation -->
 	<?php $this->load->view("customer/layouts/_navbar"); ?>
	<!-- Page Content -->

	<!-- alert -->
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

	<div class="container mt-3">

		<div class="row">

			<!-- /.col-lg-3 -->

			<div class="col-lg-12">

				<section class="hero">
					<div class="container">
						<div class="row gy-4">
							<div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
								<h5>The Best Grooming and Pet Shop in Paw-Paw</h5><br>
								<h2 class="font-weight-bold">Healthy pets have a strong soul</h2>
								<p>Kami dengan bangga menyediakan berbagai produk dan layanan untuk memenuhi kebutuhan hewan peliharaan Anda. Dengan pengalaman bertahun-tahun dalam industri ini, kami berkomitmen untuk memberikan kualitas terbaik untuk kebahagiaan dan kesehatan hewan kesayangan Anda.</p>
								<div>
									<a href="<?= base_url("produk")?>" class="btn btn-primary px-4 text-white shadow text-uppercase">Get Started</a>
									<a href="https://facebook.com">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" height="16" width="10" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg></a>
									<a href="https://twitter.com">&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></a>
									<a href="https://instagram.com">&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></a>
									<a href="https://pinterest.com">&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" height="16" width="15.5" viewBox="0 0 496 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3 .8-3.4 5-20.3 6.9-28.1 .6-2.5 .3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"/></svg></a>
								</div>
							</div>
							<div class="col-lg-6 order-1 order-lg-2 hero-img">
								<img src="<?= base_url("assets/customer/img/cat.png")?>" class="img-fluid animated" alt="">
							</div>
						</div>
					</div>
				</section>

				<section>
					<div class="container">
						<div class="row align-items-center mt-5">
							<div class="col-md-5 col-lg-6 order-md-1 order-0"><img class="w-50"  src="<?= base_url("assets/customer/img/cloth.webp")?>" alt="" /></div>
							<div class="col-md-7 col-lg-6 pe-lg-4 pe-xl-7">
								<div class="d-flex align-items-start"><svg data-aos="fade-up" class="me-4" xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0h12.6c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7V448c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64V197.7l-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0h12.6z"/></svg>
									<div class="flex-1">
										<h2 data-aos="fade-up">Clothing Collections 2030</h2>
										<p data-aos="fade-up" class="text-muted mb-4">Paw-Paw petshop hadir untuk memberikan pengalaman yang luar biasa bagi hewan peliharaan Anda. Setiap pakaian di koleksi ini adalah karya seni fashion yang mencerminkan keanggunan dan eksklusivitas. Kami menggabungkan desain yang trendi dengan kenyamanan tertinggi untuk memberikan gaya hidup yang mewah untuk sahabat berbulu Anda.</p>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="container">
						<div class="row align-items-center mt-5">
							<div class="col-md-5 col-lg-6 order-md-0 order-1"><img class="w-50" src="<?= base_url("assets/customer/img/Accessories.webp")?>" alt="" /></div>
							<div class="col-md-7 col-lg-6 pe-lg-4 pe-xl-7">
								<div class="d-flex align-items-start"><svg data-aos="fade-up" class="me-4" xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M64 416L168.6 180.7c15.3-34.4 40.3-63.5 72-83.7l146.9-94c3-1.9 6.5-2.9 10-2.9C407.7 0 416 8.3 416 18.6v1.6c0 2.6-.5 5.1-1.4 7.5L354.8 176.9c-1.9 4.7-2.8 9.7-2.8 14.7c0 5.5 1.2 11 3.4 16.1L448 416H240.9l11.8-35.4 40.4-13.5c6.5-2.2 10.9-8.3 10.9-15.2s-4.4-13-10.9-15.2l-40.4-13.5-13.5-40.4C237 276.4 230.9 272 224 272s-13 4.4-15.2 10.9l-13.5 40.4-40.4 13.5C148.4 339 144 345.1 144 352s4.4 13 10.9 15.2l40.4 13.5L207.1 416H64zM279.6 141.5c-1.1-3.3-4.1-5.5-7.6-5.5s-6.5 2.2-7.6 5.5l-6.7 20.2-20.2 6.7c-3.3 1.1-5.5 4.1-5.5 7.6s2.2 6.5 5.5 7.6l20.2 6.7 6.7 20.2c1.1 3.3 4.1 5.5 7.6 5.5s6.5-2.2 7.6-5.5l6.7-20.2 20.2-6.7c3.3-1.1 5.5-4.1 5.5-7.6s-2.2-6.5-5.5-7.6l-20.2-6.7-6.7-20.2zM32 448H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>
									<div class="flex-1">
										<h2 data-aos="fade-up">Accessories</h2>
										<p data-aos="fade-up" class="text-muted mb-4">Paw-Paw Petshop Accessories menghadirkan koleksi aksesoris eksklusif yang akan mengangkat penampilan hewan peliharaan Anda menjadi tingkat berikutnya. Setiap aksesoris dipilih dengan cermat untuk memberikan sentuhan elegan dan gaya yang tak tertandingi, membuktikan bahwa gaya tidak hanya untuk manusia, tetapi juga untuk sahabat setia berempat kaki Anda.</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="container">
						<div class="row align-items-center mt-5">
							<div class="col-md-5 col-lg-6 order-md-1 order-0"><img class="w-50" src="<?= base_url("assets/customer/img/sepatu.webp")?>" alt="" /></div>
							<div class="col-md-7 col-lg-6 pe-lg-4 pe-xl-7">
								<div class="d-flex align-items-start"><svg data-aos="fade-up" class="me-4" xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M416 0C352.3 0 256 32 256 32V160c48 0 76 16 104 32s56 32 104 32c56.4 0 176-16 176-96S512 0 416 0zM128 96c0 35.3 28.7 64 64 64h32V32H192c-35.3 0-64 28.7-64 64zM288 512c96 0 224-48 224-128s-119.6-96-176-96c-48 0-76 16-104 32s-56 32-104 32V480s96.3 32 160 32zM0 416c0 35.3 28.7 64 64 64H96V352H64c-35.3 0-64 28.7-64 64z"/></svg>
									<div class="flex-1">
										<h2 data-aos="fade-up">Shoes Spring 2030</h2>
										<p data-aos="fade-up" class="text-muted mb-4">Sepertinya Anda mencari informasi tentang sepatu atau produk sepatu untuk hewan peliharaan dari Paw Paw Petshop pada musim semi tahun 2030. Meskipun tren sepatu biasanya terkait dengan manusia, kita dapat membayangkan produk atau perlengkapan yang unik untuk hewan peliharaan yang bisa relevan dengan musim tersebut.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section style="margin-top: 8%;" id="about" class="about">
				<div class="container">

					<div class="row justify-content-between">
					<div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
						<img src="<?= base_url("assets/customer/img/pet food-bro.png")?>" class="img-fluid" alt="" data-aos="zoom-in">
					</div>
					<div class="col-lg-6 pt-5 pt-lg-0">
						<h3 class="font-weight-bold" data-aos="fade-up">About Paw-Paw Corporation</h3>
						<p data-aos="fade-up" data-aos-delay="100">
						Sampai dengan pembaruan pengetahuan saya pada Januari 2022, saya tidak memiliki informasi spesifik tentang perusahaan yang bernama "Paw-Paw Corporation." Kemungkinan itu adalah perusahaan fiksi atau belum begitu dikenal, atau mungkin juga telah menjadi dikenal setelah pembaruan terakhir saya. Jika Paw-Paw Corporation adalah perusahaan nyata atau merupakan perkembangan baru, saya sarankan untuk memeriksa sumber-sumber terbaru dan terpercaya seperti situs web resmi perusahaan, direktori bisnis, atau artikel berita terbaru untuk informasi yang paling mutakhir.
						</p>
						<div class="row">
						<div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
							<img src="<?= base_url("assets/customer/img/pet-care.png")?>" height="50px" alt="">
							<h4 class="font-weight-bold">Manufacturing and Supply Chain</h4>
							<p>Paw Paw Petshop Manufaktur mencakup proses pembuatan dan pengembangan produk-produk khusus untuk hewan peliharaan, seperti makanan, mainan, dan aksesori.</p>
						</div>
						<div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
							<img src="<?= base_url("assets/customer/img/pet-taxi.png")?>" height="50px" alt="">
							<h4 class="font-weight-bold">Our Expert Says</h4>
							<p>"Sebagai ahli di industri hewan peliharaan, saya terkesan dengan dedikasi Paw Paw Petshop terhadap kualitas dan inovasi. Fokus mereka pada manufaktur produk khusus untuk hewan peliharaan, ditambah dengan praktik berkelanjutan, mencerminkan komitmen terhadap kesejahteraan teman-teman berbulu kita. Integrasi teknologi canggih dalam proses manufaktur dan rantai pasokan menempatkan Paw Paw Petshop sebagai pemain yang progresif dalam pasar perawatan hewan peliharaan. Perhatian mereka terhadap keamanan produk, kualitas, dan kepuasan pelanggan menetapkan standar yang patut diacungi jempol dalam industri ini."</p>
						</div>
						</div>
					</div>
					</div>

				</div>
				</section>

				<!-- <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<img class="d-block img-fluid" src="<?= base_url("assets/customer/img/slider/slider-01.jpg") ?>" alt="First slide" style="width: 100%; height: 350px; object-fit: cover; object-position: center;">
						</div>
						<div class="carousel-item">
							<img class="d-block img-fluid" src="<?= base_url("assets/customer/img/slider/slider-02.jpg") ?>" alt="Second slide" style="width: 100%; height: 350px; object-fit: cover; object-position: center;">
						</div>
						<div class="carousel-item">
							<img class="d-block img-fluid" src="<?= base_url("assets/customer/img/slider/slider-03.jpg") ?>" alt="Third slide" style="width: 100%; height: 350px; object-fit: cover; object-position: center;">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div> -->

				<section class="some-products py-5">
					<div class="section-title">
						<h4 class="font-weight-bold">Product</h2>
						<p class="small text-muted">Check out our beautifull product</p>
					</div>
					<hr>

					<?php if ($products) : ?>
						<div class="row">
							<?php foreach ($products as $product) : ?>
								<div class="col-lg-4 col-md-6 mb-4">
									<div class="card h-100 shadow border-10">
										<a href="<?= base_url("produk/" . $product["slug"]) ?>"><img class="card-img-top" src="<?= base_url("assets/uploads/items/" . $product["images"]) ?>" style="height: 180px; object-fit: cover; object-position: center;"></a>
										<div class="card-body" style="background-color: #F5F5DC;">
											<h5 class="card-title">
												<a href="<?= base_url("produk/" . $product["slug"]) ?>" class="text-primary"><?= $product["name"] ?></a>
											</h5>
											<h6><span class="text-warning font-weight-bold">Rp. <?= number_format($product["price"]) ?></span>
											<span class="col-md-6 float-right text-muted">Stok : <?= $product["stock"] ?> Unit</span></h6>
										</div>
										<div class="card-footer border-top-0 bg-primary">
											<div class="action text-center">
												<a href="<?= base_url("tambah-keranjang/" . $product["item_id"]) ?>" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#ffffff" d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg> Add to Cart</a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						<!-- /.row -->
						<div class="text-center mb-5">
							<a href="<?= base_url("produk") ?>">Lihat semua produk</a>
						</div>
					<?php else : ?>
						<div class="alert alert-danger">
							Maaf, belum ada produk tersedia untuk saat ini.
						</div>
					<?php endif; ?>
				</section>

			</div>
			<!-- /.col-lg-9 -->

		</div>
		<!-- /.row -->

	</div>
	<!-- /.container -->

	<!-- Footer -->
	<?php $this->load->view("customer/layouts/_footer"); ?>

	<?php $this->load->view("customer/layouts/_scripts"); ?>
	<script>
		const flashData = $('.flash-data').data('flashdata');
		if (flashData) {
			Swal.fire({
				title: 'Yeaayy!!!',
				text: 'Item berhasil ' + flashData,
				icon: 'success'
			});
		}
	</script>

</body>

</html>
