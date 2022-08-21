<body>
	<div class="content-wrap">
		<div class="main">
			<div class="container-fluid">

				<!-- /# row -->
				<section id="main-content">

					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-title d-flex justify-content-between">
									<h4>Import CSV Data Mahasiswa</h4>
									<a class="text-info" href="<?= base_url('tambah_mahasiswa') ?>">Tambah Mahasiswa</a>
								</div>
								<div class="card-body">
									<form action="<?= base_url('tambah_mahasiswa/import_csv/proses') ?>" method="POST" enctype="multipart/form-data">
										<div class="mt-4">
											<div class="custom-file mb-3">
												<input accept="text/csv" type="file" class="custom-file-input" id="customFile" name="filename">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
										</div>
										<button class="btn btn-primary">Import</button>
									</form>
								</div>
							</div>
						</div>
						<!-- /# column -->

					</div>
					<!-- /# row -->


					<div class="row">
						<div class="col-lg-12">

						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
