<?php $this->load->view('_partials/head'); ?>
<?php $this->load->view('_partials/header'); ?>
<?php $this->load->view('_partials/sidebar'); ?>
<head>
	<title>Edit Project Manager</title>
</head>
<body>

	<section role="main" class="content-body">
					<header class="page-header">
						<h2>Form Validation</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>Validation</span></li>
							</ol>
					
							<a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-lg-12">
							<form id="form" action="<?php base_url('c_pm/edit') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
							<input type="hidden" name="id" value="<?php echo $projek_manajer->id_pm?>;" />
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
										</div>

										<h2 class="panel-title">Form Edit UI Desainer</h2>
										<p class="panel-subtitle">
											Basic validation will display a label with the error after the form control.
										</p>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label">Full Name <span class="required">*</span></label>
											<div class="col-sm-9">
												<?php echo form_error('nama_pm'); ?>
												<input <?php echo form_error('nama_pm') ? 'is-invalid':'' ?> type="text" name="nama_pm" class="form-control" placeholder="eg.: John Doe" value="<?php echo $projek_manajer->nama_pm; ?>" required/>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="textareaAutosize">Deskripsi</label>
												<div class="col-md-6">
													<?php //echo form_error('deskripsi'); ?>
													<input <?php echo form_error('deskripsi') ? 'is-invalid':'' ?> type="text" class="form-control" placeholder="skills,etc" name="deskripsi" rows="3" value="<?php echo $projek_manajer->deskripsi; ?>" />
												</div>
										</div>
										
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<input id="click-to-close-success" class="mt-sm mb-sm btn btn-primary" type="submit" name="edit" value="Edit" />

												<a href="<?php echo site_url('c_pm'); ?>"><button type="button" class="btn btn-default">Batal</button></a>
											</div>
										</div>
									</footer>
								</section>
							</form>
						</div>
					</div>

	<br>
	<!-- <script type="text/javascript">
	unction( $ ) {

	'use strict';
	$('#click-to-close-success').click(function() {
		var notice = new PNotify({
			title: 'Data berhasil ditambah',
			text: '',
			type: 'success',
			addclass: 'click-2-close',
			hide: false,
			buttons: {
				closer: false,
				sticker: false
			}
		});

		notice.get().click(function() {
			notice.remove();
		});
	});
	}).apply( this, [ jQuery ]);
	</script> -->
</body>
<?php $this->load->view('_partials/footer'); ?>
</html>