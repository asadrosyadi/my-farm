<?php
$min = 0;
$mid = 0;
$max = 0;
$min2 = 0;
$mid2 = 0;
$max2 = 0;
$min3 = 0;
$mid3 = 0;
$max3 = 0;
$min4 = 0;
$mid4 = 0;
$max4 = 0;
$min5 = 0;
$mid5 = 0;
$max5 = 0;
$min6 = 0;
$mid6 = 0;
$max6 = 0;
$min7 = 0;
$mid7 = 0;
$max7 = 0;
$min8 = 0;
$mid8 = 0;
$max8 = 0;
$min9 = 0;
$mid9 = 0;
$max9 = 0;
$min10 = 0;
$mid10 = 0;
$max10 = 0;
?>
<div class="page-breadcrumb">
	<div class="row">
		<div class="col-7 align-self-center">
		</div>
		<div class="col-5 align-self-center">
		</div>
	</div>
</div>
<h2 class="card-title">
	<left>&nbsp; &nbsp; &nbsp; Fuzzy Rule</left>
</h2>

<div class="container-fluid">
	<!-- ============================================================== -->
	<!-- Start Page Content -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<center>
						<h3 class="card-title">Aquaponic</h3>
					</center>
					<h5 class="card-title">Temperature</h5>
					<?php
					echo form_open_multipart('historydevice/edit', 'role="form" class="form-horizontal"');
					?>
					<?php foreach ($rule as $r) { ?>
						<?php
						$min += $r->min;
						$mid += $r->mid;
						$max += $r->max;
						?>
						<div class="row">
							<input type="number" name="id" value="<?php echo $r->id ?>" class="form-control" hidden>
							<div class="col-3">
								<div class="form-group">
									<label class="control-label col-xs-3">Temperature Min</label>
									<div class="col-xs-9">
										<input type="number" name="min" value="<?php echo $r->min ?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									<label class="control-label col-xs-3">Temperature Mid</label>
									<div class="col-xs-9">
										<input type="number" name="mid" value="<?php echo $r->mid ?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									<label class="control-label col-xs-3">Temperature Max</label>
									<div class="col-xs-9">
										<input type="number" name="max" value="<?php echo $r->max ?>" class="form-control">
									</div>
								</div>
							</div>
						<?php } ?>
						<div class="col-3">
							<div class="form-group">
								</br>
								<button type="submit" name="submit" class="btn btn-danger text-center" style="margin-top:7px; width:100%;">Submit</button>
							</div>
						</div>
						</div>
						</form>


						<h5 class="card-title">PH</h5>
						<?php
						echo form_open_multipart('historydevice/edit2', 'role="form" class="form-horizontal"');
						?>
						<?php foreach ($rule2 as $r) { ?>
							<?php
							$min2 += $r->min;
							$mid2 += $r->mid;
							$max2 += $r->max;
							?>
							<div class="row">
								<input type="number" name="id" value="<?php echo $r->id ?>" class="form-control" hidden>
								<div class="col-3">
									<div class="form-group">
										<label class="control-label col-xs-3">PH Min</label>
										<div class="col-xs-9">
											<input type="number" name="min" value="<?php echo $r->min ?>" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label class="control-label col-xs-3">PH Mid</label>
										<div class="col-xs-9">
											<input type="number" name="mid" value="<?php echo $r->mid ?>" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label class="control-label col-xs-3">PH Max</label>
										<div class="col-xs-9">
											<input type="number" name="max" value="<?php echo $r->max ?>" class="form-control">
										</div>
									</div>
								</div>
							<?php } ?>
							<div class="col-3">
								<div class="form-group">
									</br>
									<button type="submit" name="submit" class="btn btn-danger text-center" style="margin-top:7px; width:100%;">Submit</button>
								</div>
							</div>
							</div>
							</form>


							<h5 class="card-title">Light Intensity</h5>
							<?php
							echo form_open_multipart('historydevice/edit3', 'role="form" class="form-horizontal"');
							?>
							<?php foreach ($rule3 as $r) { ?>
								<?php
								$min3 += $r->min;
								$mid3 += $r->mid;
								$max3 += $r->max;
								?>
								<div class="row">
									<input type="number" name="id" value="<?php echo $r->id ?>" class="form-control" hidden>
									<div class="col-3">
										<div class="form-group">
											<label class="control-label col-xs-3">Light Min</label>
											<div class="col-xs-9">
												<input type="number" name="min" value="<?php echo $r->min ?>" class="form-control">
											</div>
										</div>
									</div>
									<div class="col-3">
										<div class="form-group">
											<label class="control-label col-xs-3">Light Mid</label>
											<div class="col-xs-9">
												<input type="number" name="mid" value="<?php echo $r->mid ?>" class="form-control">
											</div>
										</div>
									</div>
									<div class="col-3">
										<div class="form-group">
											<label class="control-label col-xs-3">Light Max</label>
											<div class="col-xs-9">
												<input type="number" name="max" value="<?php echo $r->max ?>" class="form-control">
											</div>
										</div>
									</div>
								<?php } ?>
								<div class="col-3">
									<div class="form-group">
										</br>
										<button type="submit" name="submit" class="btn btn-danger text-center" style="margin-top:7px; width:100%;">Submit</button>
									</div>
								</div>
								</div>
								</form>


								<h5 class="card-title">Moisture</h5>
								<?php
								echo form_open_multipart('historydevice/edit4', 'role="form" class="form-horizontal"');
								?>
								<?php foreach ($rule4 as $r) { ?>
									<?php
									$min4 += $r->min;
									$mid4 += $r->mid;
									$max4 += $r->max;
									?>
									<div class="row">
										<input type="number" name="id" value="<?php echo $r->id ?>" class="form-control" hidden>
										<div class="col-3">
											<div class="form-group">
												<label class="control-label col-xs-3">Moisture Min</label>
												<div class="col-xs-9">
													<input type="number" name="min" value="<?php echo $r->min ?>" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label class="control-label col-xs-3">Moisture Mid</label>
												<div class="col-xs-9">
													<input type="number" name="mid" value="<?php echo $r->mid ?>" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label class="control-label col-xs-3">Moisture Max</label>
												<div class="col-xs-9">
													<input type="number" name="max" value="<?php echo $r->max ?>" class="form-control">
												</div>
											</div>
										</div>
									<?php } ?>
									<div class="col-3">
										<div class="form-group">
											</br>
											<button type="submit" name="submit" class="btn btn-danger text-center" style="margin-top:7px; width:100%;">Submit</button>
										</div>
									</div>
									</div>
									</form>


									<h5 class="card-title">Co2</h5>
									<?php
									echo form_open_multipart('historydevice/edit5', 'role="form" class="form-horizontal"');
									?>
									<?php foreach ($rule5 as $r) { ?>
										<?php
										$min5 += $r->min;
										$mid5 += $r->mid;
										$max5 += $r->max;
										?>
										<div class="row">
											<input type="number" name="id" value="<?php echo $r->id ?>" class="form-control" hidden>
											<div class="col-3">
												<div class="form-group">
													<label class="control-label col-xs-3">Co2 Min</label>
													<div class="col-xs-9">
														<input type="number" name="min" value="<?php echo $r->min ?>" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label class="control-label col-xs-3">Co2 Mid</label>
													<div class="col-xs-9">
														<input type="number" name="mid" value="<?php echo $r->mid ?>" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label class="control-label col-xs-3">Co2 Max</label>
													<div class="col-xs-9">
														<input type="number" name="max" value="<?php echo $r->max ?>" class="form-control">
													</div>
												</div>
											</div>
										<?php } ?>
										<div class="col-3">
											<div class="form-group">
												</br>
												<button type="submit" name="submit" class="btn btn-danger text-center" style="margin-top:7px; width:100%;">Submit</button>
											</div>
										</div>
										</div>
										</form>

				</div>
			</div>
		</div>
	</div>

	<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
		<center> </center>
	</h1>
	<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
		<center> </center>
	</h1>
	<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
		<center> </center>
	</h1>
	<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
		<center> </center>
	</h1>
	<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
		<center> </center>
	</h1>
	<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
		<center> </center>
	</h1>
	<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
		<center> </center>
	</h1>
	<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
		<center> </center>
	</h1>
	<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
		<center> </center>
	</h1>
	<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
		<center> </center>
	</h1>
	<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
		<center> </center>
	</h1>
	<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
		<center> </center>
	</h1>


	<div class="container-fluid">
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<center>
							<h3 class="card-title">Aquarium</h3>
						</center>
						<h5 class="card-title">Temperature</h5>
						<?php
						echo form_open_multipart('historydevice/edit6', 'role="form" class="form-horizontal"');
						?>
						<?php foreach ($rule6 as $r) { ?>
							<?php
							$min6 += $r->min;
							$mid6 += $r->mid;
							$max6 += $r->max;
							?>
							<div class="row">
								<input type="number" name="id" value="<?php echo $r->id ?>" class="form-control" hidden>
								<div class="col-3">
									<div class="form-group">
										<label class="control-label col-xs-3">Temperature Min</label>
										<div class="col-xs-9">
											<input type="number" name="min" value="<?php echo $r->min ?>" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label class="control-label col-xs-3">Temperature Mid</label>
										<div class="col-xs-9">
											<input type="number" name="mid" value="<?php echo $r->mid ?>" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label class="control-label col-xs-3">Temperature Max</label>
										<div class="col-xs-9">
											<input type="number" name="max" value="<?php echo $r->max ?>" class="form-control">
										</div>
									</div>
								</div>
							<?php } ?>
							<div class="col-3">
								<div class="form-group">
									</br>
									<button type="submit" name="submit" class="btn btn-danger text-center" style="margin-top:7px; width:100%;">Submit</button>
								</div>
							</div>
							</div>
							</form>

							<h5 class="card-title">PH</h5>
							<?php
							echo form_open_multipart('historydevice/edit7', 'role="form" class="form-horizontal"');
							?>
							<?php foreach ($rule7 as $r) { ?>
								<?php
								$min7 += $r->min;
								$mid7 += $r->mid;
								$max7 += $r->max;
								?>
								<div class="row">
									<input type="number" name="id" value="<?php echo $r->id ?>" class="form-control" hidden>
									<div class="col-3">
										<div class="form-group">
											<label class="control-label col-xs-3">PH Min</label>
											<div class="col-xs-9">
												<input type="number" name="min" value="<?php echo $r->min ?>" class="form-control">
											</div>
										</div>
									</div>
									<div class="col-3">
										<div class="form-group">
											<label class="control-label col-xs-3">PH Mid</label>
											<div class="col-xs-9">
												<input type="number" name="mid" value="<?php echo $r->mid ?>" class="form-control">
											</div>
										</div>
									</div>
									<div class="col-3">
										<div class="form-group">
											<label class="control-label col-xs-3">PH Max</label>
											<div class="col-xs-9">
												<input type="number" name="max" value="<?php echo $r->max ?>" class="form-control">
											</div>
										</div>
									</div>
								<?php } ?>
								<div class="col-3">
									<div class="form-group">
										</br>
										<button type="submit" name="submit" class="btn btn-danger text-center" style="margin-top:7px; width:100%;">Submit</button>
									</div>
								</div>
								</div>
								</form>


								<h5 class="card-title">Oksigen</h5>
								<?php
								echo form_open_multipart('historydevice/edit8', 'role="form" class="form-horizontal"');
								?>
								<?php foreach ($rule8 as $r) { ?>
									<?php
									$min8 += $r->min;
									$mid8 += $r->mid;
									$max8 += $r->max;
									?>
									<div class="row">
										<input type="number" name="id" value="<?php echo $r->id ?>" class="form-control" hidden>
										<div class="col-3">
											<div class="form-group">
												<label class="control-label col-xs-3">Oksigen Min</label>
												<div class="col-xs-9">
													<input type="number" name="min" value="<?php echo $r->min ?>" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label class="control-label col-xs-3">Oksigen Mid</label>
												<div class="col-xs-9">
													<input type="number" name="mid" value="<?php echo $r->mid ?>" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label class="control-label col-xs-3">Oksigen Max</label>
												<div class="col-xs-9">
													<input type="number" name="max" value="<?php echo $r->max ?>" class="form-control">
												</div>
											</div>
										</div>
									<?php } ?>
									<div class="col-3">
										<div class="form-group">
											</br>
											<button type="submit" name="submit" class="btn btn-danger text-center" style="margin-top:7px; width:100%;">Submit</button>
										</div>
									</div>
									</div>
									</form>

									<h5 class="card-title">Amoniak</h5>
									<?php
									echo form_open_multipart('historydevice/edit9', 'role="form" class="form-horizontal"');
									?>
									<?php foreach ($rule9 as $r) { ?>
										<?php
										$min9 += $r->min;
										$mid9 += $r->mid;
										$max9 += $r->max;
										?>
										<div class="row">
											<input type="number" name="id" value="<?php echo $r->id ?>" class="form-control" hidden>
											<div class="col-3">
												<div class="form-group">
													<label class="control-label col-xs-3">Amoniak Min</label>
													<div class="col-xs-9">
														<input type="text" name="min" value="<?php echo $r->min ?>" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label class="control-label col-xs-3">Amoniak Mid</label>
													<div class="col-xs-9">
														<input type="text" name="mid" value="<?php echo $r->mid ?>" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label class="control-label col-xs-3">Amoniak Max</label>
													<div class="col-xs-9">
														<input type="text" name="max" value="<?php echo $r->max ?>" class="form-control">
													</div>
												</div>
											</div>
										<?php } ?>
										<div class="col-3">
											<div class="form-group">
												</br>
												<button type="submit" name="submit" class="btn btn-danger text-center" style="margin-top:7px; width:100%;">Submit</button>
											</div>
										</div>
										</div>
										</form>

					</div>
				</div>
			</div>
		</div>
		<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
			<center> </center>
		</h1>
		<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
			<center> </center>
		</h1>
		<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
			<center> </center>
		</h1>
		<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
			<center> </center>
		</h1>
		<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
			<center> </center>
		</h1>
		<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
			<center> </center>
		</h1>
		<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
			<center> </center>
		</h1>
		<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
			<center> </center>
		</h1>
		<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
			<center> </center>
		</h1>
		<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
			<center> </center>
		</h1>
		<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
			<center> </center>
		</h1>
		<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
			<center> </center>
		</h1>

		<div class="row">
			<div class="col-11">
				<div class="card">
					<div class="card-body">
						<center>
							<h3 class="card-title">Rule Monitoring</h3>
						</center>
						<?php
						echo form_open_multipart('historydevice/edit10', 'role="form" class="form-horizontal"');
						?>
						<?php foreach ($sortby2 as $r) { ?>
							<?php
							$min10 += $r->sortby;
							?>
							<div class="row">
								<center>
									<input type="number" name="id" value="<?php echo $r->id ?>" class="form-control" hidden>
									<div class="col-9">
										<div class="form-group">
											<label class="control-label col-xs-6">Short By:</label>
											<div class="col-xs-11">
												<select class="form-select" aria-label="min" name="min">
													<option type="number" name="min" class="form-control" value="100">Day </option>
													<option type="number" name="min" class="form-control" value="300">3 Day</option>
													<option type="number" name="min" class="form-control" value="700">Week</option>
													<option type="number" name="min" class="form-control" value="2800">Month</option>
												</select>
											</div>
										</div>
								</center>
								</h1>
								<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
									<center> </center>
								</h1>
								<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
									<center> </center>
								</h1>
								<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
									<center> </center>
								</h1>
								<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
									<center> </center>
								</h1>
								<div class="form-group">
									<label class="control-label col-xs-6">Result</label>
									<div class="col-xs-11">
										<?php
										if ($r->sortby == 100) { ?>
											<h5> Day </h5>
										<?php } else if ($r->sortby == 300) { ?>
											<h5> 3 Day </h5>
										<?php } else if ($r->sortby == 700) { ?>
											<h5>Week </h5>
										<?php } else { ?>
											<h5> Month </h5>
										<?php } ?>
									</div>
								</div>

							<?php } ?>
							<div class="col-2">
								<div class="form-group">
									</br>
									<button type="submit" name="submit" class="btn btn-danger text-center" style="margin-top:7px; width:100%;">Submit</button>
								</div>
							</div>
							</div>
							</form>
					</div>
					<center>
						<?= anchor('historydevice/', '<button type="button" class="btn btn-success text-center">Back to Monitoring Device</button>'); ?>
					</center>
				</div>
			</div>
			<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
				<center> </center>
			</h1>
			<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
				<center> </center>
			</h1>
			<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
				<center> </center>
			</h1>
			<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
				<center> </center>
			</h1>
			<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
				<center> </center>
			</h1>
			<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
				<center> </center>
			</h1>
			<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
				<center> </center>
			</h1>
			<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
				<center> </center>
			</h1>
			<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
				<center> </center>
			</h1>
			<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
				<center> </center>
			</h1>
			<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
				<center> </center>
			</h1>
			<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
				<center> </center>
			</h1>
		</div>
	</div>
</div>