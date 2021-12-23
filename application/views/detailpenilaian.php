<div class="page">
	<div class="page-content">
		<div class="panel">
			<header class="panel-heading">
				<div class="panel-actions"></div>
			</header>
			<div class="panel-body container-fluid">
				<form method="POST" action="<?php echo base_url('Penilaian/nilai');?>">
					<input type="hidden" value="<?php echo $dt['id_penilaian']?>" name="id_penilaian" class="form-control" required="required">
					<div class="row row-lg" style="margin-top: 3%;">
						<div class="col-md-6">
							<h4 class="example-title">Attitude</h4>
							<div class="input-group">
								<input type="text" value="<?php echo $dt['attitude']?>" name="attitude" class="form-control"required="required" <?php echo $disabled ?> >
								<span class="input-group-addon">
									<span class="icon fa-percent"></span>
								</span>
							</div>
						</div>
						<div class="col-md-6">
							<h4 class="example-title">Kehadiran</h4>
							<div class="input-group">
								<input type="text" value="<?php echo $dt['kehadiran']?>" name="kehadiran" class="form-control"required="required" <?php echo $disabled ?>>
								<span class="input-group-addon">
									<span class="icon fa-percent"></span>
								</span>
							</div>
						</div>
						<div class="col-md-6" style="margin-top: 3%;">
							<h4 class="example-title">Skill</h4>
							<div class="input-group">
								<input type="text" value="<?php echo $dt['skill']?>" name="skill" class="form-control"required="required" <?php echo $disabled ?>>
								<span class="input-group-addon">
									<span class="icon fa-percent"></span>
								</span>
							</div>
						</div>
						<div class="col-md-6" style="margin-top: 3%;">
							<h4 class="example-title">Project Solved</h4>
							<div class="input-group">
								<input type="text" value="<?php echo $dt['project_solved']?>" name="project_solved" class="form-control"required="required" <?php echo $disabled ?>>
								<span class="input-group-addon">
									<span class="icon fa-percent"></span>
								</span>
							</div>
						</div>
					</div>
					<?php if($disabled == ''){?>
						<button type="submit" class="btn btn-block btn-success waves-effect waves-classic col-md-1" style="margin-top: 3%">Nilai</button>
					<?php }?>
				</form>
			</div>
		</div>
	</div>
</div>