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
$tampil = 0;
$hasil11 = 0;
$hasil12 = 0;
$hasil13 = 0;
$hasil14 = 0;
$hasil15 = 0;
$hasil21 = 0;
$hasil22 = 0;
$hasil23 = 0;
$hasil24 = 0;
$akuaponik = 0;
$akuarium = 0;
?>

<?php foreach ($sortby2 as $r) { ?>
	<?php
	$tampil += $r->sortby;
	?>
<?php } ?>

<div class="page-breadcrumb">
	<div class="row">
		<div class="col-7 align-self-center">
		</div>
		<div class="col-5 align-self-center">
		</div>
	</div>
</div>
<h2 class="card-title">
	<left>&nbsp; &nbsp; &nbsp; Monitoring Prediction </left>
</h2>
<center>
	<h4 class="card-title"> Dynamic Average for "<?php
													if ($r->sortby == 100) { ?>
		Day
	<?php } else if ($r->sortby == 300) { ?>
		3 Day
	<?php } else if ($r->sortby == 700) { ?>
		>Week
	<?php } else { ?>
		Month
	<?php } ?>
	"</h4>
</center>
<div class="row">
	<div class="col-6">
		<div class="card">
			<div class="card-body">
				<div class="form-group" style="text-align:Left;">

					<h5 class="card-title"> Aquaponic</h5>

					<?php $jumtot = 0;
					foreach ($data as $x) { //untuk menampilkan variabel data yang di angkut dari controller
						$jumtot += $x->suhu_tanaman;
					}
					$jumdat = $this->db->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit($tampil)->get()->num_rows(); ?>
					<p>Temperature : <?php echo number_format((float)$jumtot / $jumdat, 2, '.', '') ?> (Category:

						<?php $jumhas = $jumtot / $jumdat ?>
						<?php $n1 = $jumhas ?>
						<?php foreach ($rule as $r) { ?>
							<?php
							$min += $r->min;
							$mid += $r->mid;
							$max += $r->max;
							?>

							<?php
							$hasilmin = 0;
							$hasilmid = 0;
							$hasilmax = 0;
							//Fuzifikasi Nilai Min
							if ($jumhas <= $min) {
								$hasilmin += 1;
							} else if ($min <= $jumhas && $jumhas <= $mid) {
								$hasilmin += ($mid - $jumhas) / 2;
							} else {
								$hasilmin += 0;
							}
							//Fuzifikasi Nilai Mid
							if ($jumhas <= $min) {
								$hasilmid += 0;
							} else if ($min <= $jumhas && $jumhas <= $mid) {
								$hasilmid += ($jumhas - $min) / 2;
							} else if ($mid <= $jumhas && $jumhas <= $max) {
								$hasilmid += ($max - $jumhas) / 2;
							} else {
								$hasilmid += 0;
							}
							//Fuzifikasi Nilai Max
							if ($max <= $jumhas) {
								$hasilmax += 1;
							} else if ($mid <= $jumhas && $jumhas <= $max) {
								$hasilmax += ($jumhas - $mid) / 2;
							} else {
								$hasilmax += 0;
							}
							?>
							<?php $hmin1 = $hasilmin ?>
							<?php $hamid1 = $hasilmid ?>
							<?php $hmax1 = $hasilmax ?>
							<?php
							if ($hasilmin > $hasilmid) {
							?>
								<td> Warning!!! </td>
							<?php } else if ($hasilmid > $hasilmax) { ?>
								<td> Good </td>
							<?php } else { ?>
								<td> Warning!!! </td>
							<?php }
							?>
							) => Fuzifikasi Cool = <?php echo number_format((float)$hasilmin, 2, '.', '') ?>, Normal = <?php echo number_format((float)$hasilmid, 2, '.', '') ?>, Hot = <?php echo number_format((float)$hasilmax, 2, '.', '') ?>
					</p>
				<?php } ?>



				<?php $jumtot = 0;
				foreach ($data as $x) { //untuk menampilkan variabel data yang di angkut dari controller
					$jumtot += $x->PH_tanaman;
				}
				$jumdat = $this->db->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit($tampil)->get()->num_rows(); ?>
				<p>PH : <?php echo number_format((float)$jumtot / $jumdat, 2, '.', '') ?> (Category:

					<?php $jumhas = $jumtot / $jumdat ?>
					<?php $n2 = $jumhas ?>
					<?php foreach ($rule2 as $r) { ?>
						<?php
						$min2 += $r->min;
						$mid2 += $r->mid;
						$max2 += $r->max;
						?>
						<?php
						$hasilmin = 0;
						$hasilmid = 0;
						$hasilmax = 0;
						//Fuzifikasi Nilai Min
						if ($jumhas <= $min2) {
							$hasilmin += 1;
						} else if ($min2 <= $jumhas && $jumhas <= $mid2) {
							$hasilmin += ($mid2 - $jumhas) / 2;
						} else {
							$hasilmin += 0;
						}
						//Fuzifikasi Nilai Mid
						if ($jumhas <= $min2) {
							$hasilmid += 0;
						} else if ($min2 <= $jumhas && $jumhas <= $mid2) {
							$hasilmid += ($jumhas - $min2) / 2;
						} else if ($mid2 <= $jumhas && $jumhas <= $max2) {
							$hasilmid += ($max2 - $jumhas) / 2;
						} else {
							$hasilmid += 0;
						}
						//Fuzifikasi Nilai Max
						if ($max2 <= $jumhas) {
							$hasilmax += 1;
						} else if ($mid2 <= $jumhas && $jumhas <= $max2) {
							$hasilmax += ($jumhas - $mid2) / 2;
						} else {
							$hasilmax += 0;
						}
						?>
						<?php $hmin2 = $hasilmin ?>
						<?php $hamid2 = $hasilmid ?>
						<?php $hmax2 = $hasilmax ?>
						<?php
						if ($hasilmin > $hasilmid) {
						?>
							<td> Warning!!! </td>
						<?php } else if ($hasilmid > $hasilmax) { ?>
							<td> Good </td>
						<?php } else { ?>
							<td> Warning!!! </td>
						<?php }
						?>
						) => Fuzifikasi Acid = <?php echo number_format((float)$hasilmin, 2, '.', '') ?>, Netral = <?php echo number_format((float)$hasilmid, 2, '.', '') ?>, Base = <?php echo number_format((float)$hasilmax, 2, '.', '') ?>
				</p>
			<?php } ?>

			<?php $jumtot = 0;
			foreach ($data as $x) { //untuk menampilkan variabel data yang di angkut dari controller
				$jumtot += $x->intentitascahaya_tanaman2;
			}
			$jumdat = $this->db->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit($tampil)->get()->num_rows(); ?>
			<p>Light Intensity : <?php echo number_format((float)$jumtot / $jumdat, 2, '.', '') ?> (Category:

				<?php $jumhas = $jumtot / $jumdat ?>
				<?php $n3 = $jumhas ?>
				<?php foreach ($rule3 as $r) { ?>
					<?php
					$min3 += $r->min;
					$mid3 += $r->mid;
					$max3 += $r->max;
					?>
					<?php
					$hasilmin = 0;
					$hasilmid = 0;
					$hasilmax = 0;
					//Fuzifikasi Nilai Min
					if ($jumhas <= $min3) {
						$hasilmin += 1;
					} else if ($min3 <= $jumhas && $jumhas <= $mid3) {
						$hasilmin += ($mid3 - $jumhas) / 15;
					} else {
						$hasilmin += 0;
					}
					//Fuzifikasi Nilai Mid
					if ($jumhas <= $min3) {
						$hasilmid += 0;
					} else if ($min3 <= $jumhas && $jumhas <= $mid3) {
						$hasilmid += ($jumhas - $min3) / 15;
					} else if ($mid3 <= $jumhas && $jumhas <= $max3) {
						$hasilmid += ($max3 - $jumhas) / 15;
					} else {
						$hasilmid += 0;
					}
					//Fuzifikasi Nilai Max
					if ($max3 <= $jumhas) {
						$hasilmax += 1;
					} else if ($mid3 <= $jumhas && $jumhas <= $max3) {
						$hasilmax += ($jumhas - $mid3) / 15;
					} else {
						$hasilmax += 0;
					}
					?>
					<?php $hmin3 = $hasilmin ?>
					<?php $hamid3 = $hasilmid ?>
					<?php $hmax3 = $hasilmax ?>
					<?php
					if ($hasilmin > $hasilmid) {
					?>
						<td> Warning!!! </td>
					<?php } else if ($hasilmid > $hasilmax) { ?>
						<td> Warning!!! </td>
					<?php } else { ?>
						<td> Good </td>
					<?php }
					?>
					) => Fuzifikasi Dark = <?php echo number_format((float)$hasilmin, 2, '.', '') ?>, Normal = <?php echo number_format((float)$hasilmid, 2, '.', '') ?>, Glow = <?php echo number_format((float)$hasilmax, 2, '.', '') ?>
			</p>
		<?php } ?>

		<?php $jumtot = 0;
		foreach ($data as $x) { //untuk menampilkan variabel data yang di angkut dari controller
			$jumtot += $x->kelembapan_tanaman2;
		}
		$jumdat = $this->db->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit($tampil)->get()->num_rows(); ?>
		<p>Moisture : <?php echo number_format((float)$jumtot / $jumdat, 2, '.', '') ?> (Category:

			<?php $jumhas = $jumtot / $jumdat ?>
			<?php $n4 = $jumhas ?>
			<?php foreach ($rule4 as $r) { ?>
				<?php
				$min4 += $r->min;
				$mid4 += $r->mid;
				$max4 += $r->max;
				?>
				<?php
				$hasilmin = 0;
				$hasilmid = 0;
				$hasilmax = 0;
				//Fuzifikasi Nilai Min
				if ($jumhas <= $min4) {
					$hasilmin += 1;
				} else if ($min4 <= $jumhas && $jumhas <= $mid4) {
					$hasilmin += ($mid4 - $jumhas) / 15;
				} else {
					$hasilmin += 0;
				}
				//Fuzifikasi Nilai Mid
				if ($jumhas <= $min4) {
					$hasilmid += 0;
				} else if ($min4 <= $jumhas && $jumhas <= $mid4) {
					$hasilmid += ($jumhas - $min4) / 15;
				} else if ($mid4 <= $jumhas && $jumhas <= $max4) {
					$hasilmid += ($max4 - $jumhas) / 15;
				} else {
					$hasilmid += 0;
				}
				//Fuzifikasi Nilai Max
				if ($max4 <= $jumhas) {
					$hasilmax += 1;
				} else if ($mid4 <= $jumhas && $jumhas <= $max4) {
					$hasilmax += ($jumhas - $mid4) / 15;
				} else {
					$hasilmax += 0;
				}
				?>
				<?php $hmin4 = $hasilmin ?>
				<?php $hamid4 = $hasilmid ?>
				<?php $hmax4 = $hasilmax ?>
				<?php
				if ($hasilmin > $hasilmid) {
				?>
					<td> Good </td>
				<?php } else if ($hasilmid > $hasilmax) { ?>
					<td> Warning!!! </td>
				<?php } else { ?>
					<td> Warning!!! </td>
				<?php }
				?>
				) => Fuzifikasi Dry = <?php echo number_format((float)$hasilmin, 2, '.', '') ?>, Normal = <?php echo number_format((float)$hasilmid, 2, '.', '') ?>, Float = <?php echo number_format((float)$hasilmax, 2, '.', '') ?>
		</p>
	<?php } ?>

	<?php $jumtot = 0;
	foreach ($data as $x) { //untuk menampilkan variabel data yang di angkut dari controller
		$jumtot += $x->co2_tanaman;
	}
	$jumdat = $this->db->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit($tampil)->get()->num_rows(); ?>
	<p>Co2 : <?php echo number_format((float)$jumtot / $jumdat, 2, '.', '') ?> (Category:

		<?php $jumhas = $jumtot / $jumdat ?>
		<?php $n5 = $jumhas ?>
		<?php foreach ($rule5 as $r) { ?>
			<?php
			$min5 += $r->min;
			$mid5 += $r->mid;
			$max5 += $r->max;
			?>
			<?php
			$hasilmin = 0;
			$hasilmid = 0;
			$hasilmax = 0;
			//Fuzifikasi Nilai Min
			if ($jumhas <= $min5) {
				$hasilmin += 1;
			} else if ($min5 <= $jumhas && $jumhas <= $mid5) {
				$hasilmin += ($mid5 - $jumhas) / 2500;
			} else {
				$hasilmin += 0;
			}
			//Fuzifikasi Nilai Mid
			if ($jumhas <= $min5) {
				$hasilmid += 0;
			} else if ($min5 <= $jumhas && $jumhas <= $mid5) {
				$hasilmid += ($jumhas - $min5) / 2500;
			} else if ($mid5 <= $jumhas && $jumhas <= $max5) {
				$hasilmid += ($max5 - $jumhas) / 2500;
			} else {
				$hasilmid += 0;
			}
			//Fuzifikasi Nilai Max
			if ($max5 <= $jumhas) {
				$hasilmax += 1;
			} else if ($mid5 <= $jumhas && $jumhas <= $max5) {
				$hasilmax += ($jumhas - $mid5) / 2500;
			} else {
				$hasilmax += 0;
			}
			?>
			<?php $hmin5 = $hasilmin ?>
			<?php $hamid5 = $hasilmid ?>
			<?php $hmax5 = $hasilmax ?>
			<?php
			if ($hasilmin > $hasilmid) {
			?>
				<td> Warning!!! </td>
			<?php } else if ($hasilmid > $hasilmax) { ?>
				<td> Good </td>
			<?php } else { ?>
				<td> Warning!!! </td>
			<?php }
			?>
			) => Fuzifikasi Less = <?php echo number_format((float)$hasilmin, 2, '.', '') ?>, Normal = <?php echo number_format((float)$hasilmid, 2, '.', '') ?>, More = <?php echo number_format((float)$hasilmax, 2, '.', '') ?>
	</p>
<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card">
			<div class="card-body">
				<div class="form-group" style="text-align:Left;">
					<h5 class="card-title"> Aquarium</h5>

					<?php $jumtot = 0;
					foreach ($data as $x) { //untuk menampilkan variabel data yang di angkut dari controller
						$jumtot += $x->suhu_akuarium;
					}
					$jumdat = $this->db->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit($tampil)->get()->num_rows(); ?>
					<p>Temperature : <?php echo number_format((float)$jumtot / $jumdat, 2, '.', '') ?> (Category:

						<?php $jumhas = $jumtot / $jumdat ?>
						<?php $n6 = $jumhas ?>
						<?php foreach ($rule6 as $r) { ?>
							<?php
							$min6 += $r->min;
							$mid6 += $r->mid;
							$max6 += $r->max;
							?>
							<?php
							$hasilmin = 0;
							$hasilmid = 0;
							$hasilmax = 0;
							//Fuzifikasi Nilai Min
							if ($jumhas <= $min6) {
								$hasilmin += 1;
							} else if ($min6 <= $jumhas && $jumhas <= $mid6) {
								$hasilmin += ($mid6 - $jumhas) / 2;
							} else {
								$hasilmin += 0;
							}
							//Fuzifikasi Nilai Mid
							if ($jumhas <= $min6) {
								$hasilmid += 0;
							} else if ($min6 <= $jumhas && $jumhas <= $mid6) {
								$hasilmid += ($jumhas - $min6) / 2;
							} else if ($mid6 <= $jumhas && $jumhas <= $max6) {
								$hasilmid += ($max6 - $jumhas) / 2;
							} else {
								$hasilmid += 0;
							}
							//Fuzifikasi Nilai Max
							if ($max6 <= $jumhas) {
								$hasilmax += 1;
							} else if ($mid6 <= $jumhas && $jumhas <= $max6) {
								$hasilmax += ($jumhas - $mid6) / 2;
							} else {
								$hasilmax += 0;
							}
							?>
							<?php $hmin6 = $hasilmin ?>
							<?php $hamid6 = $hasilmid ?>
							<?php $hmax6 = $hasilmax ?>
							<?php
							if ($hasilmin > $hasilmid) {
							?>
								<td> Warning!!! </td>
							<?php } else if ($hasilmid > $hasilmax) { ?>
								<td> Good </td>
							<?php } else { ?>
								<td> Warning!!! </td>
							<?php }
							?>
							) => Fuzifikasi Cool = <?php echo number_format((float)$hasilmin, 2, '.', '') ?>, Normal = <?php echo number_format((float)$hasilmid, 2, '.', '') ?>, Hot = <?php echo number_format((float)$hasilmax, 2, '.', '') ?>
					</p>
				<?php } ?>

				<?php $jumtot = 0;
				foreach ($data as $x) { //untuk menampilkan variabel data yang di angkut dari controller
					$jumtot += $x->PH_akuarium;
				}
				$jumdat = $this->db->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit($tampil)->get()->num_rows(); ?>
				<p>PH : <?php echo number_format((float)$jumtot / $jumdat, 2, '.', '') ?> (Category:

					<?php $jumhas = $jumtot / $jumdat ?>
					<?php $n7 = $jumhas ?>
					<?php foreach ($rule7 as $r) { ?>
						<?php
						$min7 += $r->min;
						$mid7 += $r->mid;
						$max7 += $r->max;
						?>
						<?php
						$hasilmin = 0;
						$hasilmid = 0;
						$hasilmax = 0;
						//Fuzifikasi Nilai Min
						if ($jumhas <= $min7) {
							$hasilmin += 1;
						} else if ($min7 <= $jumhas && $jumhas <= $mid7) {
							$hasilmin += ($mid7 - $jumhas) / 2;
						} else {
							$hasilmin += 0;
						}
						//Fuzifikasi Nilai Mid
						if ($jumhas <= $min7) {
							$hasilmid += 0;
						} else if ($min7 <= $jumhas && $jumhas <= $mid7) {
							$hasilmid += ($jumhas - $min7) / 2;
						} else if ($mid7 <= $jumhas && $jumhas <= $max7) {
							$hasilmid += ($max7 - $jumhas) / 2;
						} else {
							$hasilmid += 0;
						}
						//Fuzifikasi Nilai Max
						if ($max7 <= $jumhas) {
							$hasilmax += 1;
						} else if ($mid7 <= $jumhas && $jumhas <= $max7) {
							$hasilmax += ($jumhas - $mid7) / 2;
						} else {
							$hasilmax += 0;
						}
						?>
						<?php $hmin7 = $hasilmin ?>
						<?php $hamid7 = $hasilmid ?>
						<?php $hmax7 = $hasilmax ?>
						<?php
						if ($hasilmin > $hasilmid) {
						?>
							<td> Warning!!! </td>
						<?php } else if ($hasilmid > $hasilmax) { ?>
							<td> Good </td>
						<?php } else { ?>
							<td> Warning!!! </td>
						<?php }
						?>
						) => Fuzifikasi Acid = <?php echo number_format((float)$hasilmin, 2, '.', '') ?>, Netral = <?php echo number_format((float)$hasilmid, 2, '.', '') ?>, Base = <?php echo number_format((float)$hasilmax, 2, '.', '') ?>
				</p>
			<?php } ?>


			<?php $jumtot = 0;
			foreach ($data as $x) { //untuk menampilkan variabel data yang di angkut dari controller
				$jumtot += $x->oksigen_akuarium;
			}
			$jumdat = $this->db->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit($tampil)->get()->num_rows(); ?>
			<p>Oksigen : <?php echo number_format((float)$jumtot / $jumdat, 2, '.', '') ?> (Category:

				<?php $jumhas = $jumtot / $jumdat ?>
				<?php $n8 = $jumhas ?>
				<?php foreach ($rule8 as $r) { ?>
					<?php
					$min8 += $r->min;
					$mid8 += $r->mid;
					$max8 += $r->max;
					?>
					<?php
					$hasilmin = 0;
					$hasilmid = 0;
					$hasilmax = 0;
					//Fuzifikasi Nilai Min
					if ($jumhas <= $min8) {
						$hasilmin += 1;
					} else if ($min8 <= $jumhas && $jumhas <= $mid8) {
						$hasilmin += ($mid8 - $jumhas) / 2;
					} else {
						$hasilmin += 0;
					}
					//Fuzifikasi Nilai Mid
					if ($jumhas <= $min8) {
						$hasilmid += 0;
					} else if ($min8 <= $jumhas && $jumhas <= $mid8) {
						$hasilmid += ($jumhas - $min8) / 2;
					} else if ($mid8 <= $jumhas && $jumhas <= $max8) {
						$hasilmid += ($max8 - $jumhas) / 2;
					} else {
						$hasilmid += 0;
					}
					//Fuzifikasi Nilai Max
					if ($max8 <= $jumhas) {
						$hasilmax += 1;
					} else if ($mid8 <= $jumhas && $jumhas <= $max8) {
						$hasilmax += ($jumhas - $mid8) / 2;
					} else {
						$hasilmax += 0;
					}
					?>
					<?php $hmin8 = $hasilmin ?>
					<?php $hamid8 = $hasilmid ?>
					<?php $hmax8 = $hasilmax ?>
					<?php
					if ($hasilmin > $hasilmid) {
					?>
						<td> Warning!!! </td>
					<?php } else if ($hasilmid > $hasilmax) { ?>
						<td> Good </td>
					<?php } else { ?>
						<td> Warning!!! </td>
					<?php }
					?>
					) => Fuzifikasi Less = <?php echo number_format((float)$hasilmin, 2, '.', '') ?>, Normal = <?php echo number_format((float)$hasilmid, 2, '.', '') ?>, More = <?php echo number_format((float)$hasilmax, 2, '.', '') ?>
			</p>
		<?php } ?>

		<?php $jumtot = 0;
		foreach ($data as $x) { //untuk menampilkan variabel data yang di angkut dari controller
			$jumtot += $x->amoniak_akuarium;
		}
		$jumdat = $this->db->from('datasensor')->where('id_user', $this->uri->segment(3), 'DESC')->limit($tampil)->get()->num_rows(); ?>
		<p>Amoniak : <?php echo number_format((float)$jumtot / $jumdat, 4, '.', '') ?> (Category:

			<?php $jumhas = $jumtot / $jumdat ?>
			<?php $n9 = $jumhas ?>
			<?php foreach ($rule9 as $r) { ?>
				<?php
				$min9 += $r->min;
				$mid9 += $r->mid;
				$max9 += $r->max;
				?>
				<?php
				$hasilmin = 0;
				$hasilmid = 0;
				$hasilmax = 0;
				//Fuzifikasi Nilai Min
				if ($jumhas <= $min9) {
					$hasilmin += 1;
				} else if ($min9 <= $jumhas && $jumhas <= $mid9) {
					$hasilmin += ($mid9 - $jumhas) / 0.012;
				} else {
					$hasilmin += 0;
				}
				//Fuzifikasi Nilai Mid
				if ($jumhas <= $min9) {
					$hasilmid += 0;
				} else if ($min9 <= $jumhas && $jumhas <= $mid9) {
					$hasilmid += ($jumhas - $min9) / 0.012;
				} else if ($mid9 <= $jumhas && $jumhas <= $max9) {
					$hasilmid += ($max9 - $jumhas) / 0.012;
				} else {
					$hasilmid += 0;
				}
				//Fuzifikasi Nilai Max
				if ($max9 <= $jumhas) {
					$hasilmax += 1;
				} else if ($mid9 <= $jumhas && $jumhas <= $max9) {
					$hasilmax += ($jumhas - $mid9) / 0.012;
				} else {
					$hasilmax += 0;
				}
				?>
				<?php $hmin9 = $hasilmin ?>
				<?php $hamid9 = $hasilmid ?>
				<?php $hmax9 = $hasilmax ?>
				<?php
				if ($hasilmin > $hasilmid) {
				?>
					<td> Good </td>
				<?php } else if ($hasilmid > $hasilmax) { ?>
					<td> Warning!!! </td>
				<?php } else { ?>
					<td> Warning!!! </td>
				<?php }
				?>
				) => Fuzifikasi Less = <?php echo number_format((float)$hasilmin, 4, '.', '') ?>, Normal = <?php echo number_format((float)$hasilmid, 4, '.', '') ?>, More = <?php echo number_format((float)$hasilmax, 4, '.', '') ?>
		</p>
	<?php } ?>

				</div>
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
	<center>
		<h1 class="card-title"> Aquaponic</h1>
	</center>
	<div class="row">
		<div class="col-1">
			<div class="card">
			</div>
		</div>

		<div class="col-2">
			<div class="card">
				<div class="card-body">
					<div class="form-group" style="text-align:center;">
						</br>
						<h4 class="card-title">Temperature</h4>
						<input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="40" data-fgColor="#cc0000" data-angleOffset="-125" data-angleArc="250" data-rotation=clockwise data-displayPrevious=true value="<?php echo $n1 ?>" />
					</div>
					<center>
						<?php
						if ($hmin1 > $hamid1) {
						?>
							<h4> Warning!!! </h4>
							<?php $hasil11 = 0 ?>
						<?php } else if ($hamid1 > $hmax1) { ?>
							<h4> Good </h4>
							<?php $hasil11 = 1 ?>
						<?php } else { ?>
							<h4> Warning!!! </h4>
							<?php $hasil11 = 0 ?>
						<?php }
						?>
					</center>
				</div>
			</div>
		</div>

		<div class="col-2">
			<div class="card">
				<div class="card-body">
					<div class="form-group" style="text-align:center;">
						</br>
						<h4 class="card-title">PH</h4>
						<input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="14" data-fgColor="#0000cc" data-angleOffset="-125" data-angleArc="250" data-rotation=clockwise data-displayPrevious=true value="<?php echo $n2 ?>" />
					</div>
					<center>
						<?php
						if ($hmin2 > $hamid2) {
						?>
							<h4> Warning!!! </h4>
							<?php $hasil12 = 0 ?>
						<?php } else if ($hamid2 > $hmax2) { ?>
							<h4> Good </h4>
							<?php $hasil12 = 1 ?>
						<?php } else { ?>
							<h4> Warning!!! </h4>
							<?php $hasil12 = 0 ?>
						<?php }
						?>
					</center>
				</div>
			</div>
		</div>
		<div class="col-2">
			<div class="card">
				<div class="card-body">
					<div class="form-group" style="text-align:center;">
						</br>
						<h4 class="card-title">Light Intensity</h4>
						<input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="100" data-fgColor="#009186" data-angleOffset="-125" data-angleArc="250" data-rotation=clockwise data-displayPrevious=true value="<?php echo $n3 ?>" />
					</div>
					<center>
						<?php
						if ($hmin3 > $hamid3) {
						?>
							<h4> Warning!!! </h4>
							<?php $hasil13 = 0 ?>
						<?php } else if ($hamid3 > $hmax3) { ?>
							<h4> Warning!!! </h4>
							<?php $hasil13 = 0 ?>
						<?php } else { ?>
							<h4> Good </h4>
							<?php $hasil13 = 1 ?>
						<?php }
						?>
					</center>
				</div>
			</div>
		</div>

		<div class="col-2">
			<div class="card">
				<div class="card-body">
					<div class="form-group" style="text-align:center;">
						</br>
						<h4 class="card-title">Moisture</h4>
						<input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="100" data-fgColor="#1f4f16" data-angleOffset="-125" data-angleArc="250" data-rotation=clockwise data-displayPrevious=true value="<?php echo $n4 ?>" />
					</div>
					<center>
						<?php
						if ($hmin4 > $hamid4) {
						?>
							<h4> Good </h4>
							<?php $hasil14 = 1 ?>
						<?php } else if ($hamid4 > $hmax4) { ?>
							<h4> Warning!!! </h4>
							<?php $hasil14 = 0 ?>
						<?php } else { ?>
							<h4> Warning!!! </h4>
							<?php $hasil14 = 0 ?>
						<?php }
						?>
					</center>
				</div>
			</div>
		</div>

		<div class="col-2">
			<div class="card">
				<div class="card-body">
					<div class="form-group" style="text-align:center;">
						</br>
						<h4 class="card-title">Co2</h4>
						<input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="5000" data-fgColor="#6e713e" data-angleOffset="-125" data-angleArc="250" data-rotation=clockwise data-displayPrevious=true value="<?php echo $n5 ?>" />
					</div>
					<center>
						<?php
						if ($hmin5 > $hamid5) {
						?>
							<h4> Warning!!! </h4>
							<?php $hasil15 = 0 ?>
						<?php } else if ($hamid5 > $hmax5) { ?>
							<h4> Good </h4>
							<?php $hasil15 = 1 ?>
						<?php } else { ?>
							<h4> Warning!!! </h4>
							<?php $hasil15 = 0 ?>
						<?php }
						?>
					</center>
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
		<center>
			<?php
			if ($hasil11 == 0 || $hasil12 == 0 || $hasil13 == 0 || $hasil14 == 0 || $hasil15 == 0) { ?>
				<h3> Bayes Conclusion : Danger </h3>
				<?php $terarium = 0 ?>
			<?php } else { ?>
				<h3> Bayes Conclusion : Safe</h3>
				<?php $terarium = 1 ?>
			<?php }
			?>
		</center>


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

			<center>
				<h1 class="card-title"> Akuarium</h1>
			</center>
			<div class="row">
				<div class="col-2">
					<div class="card">
					</div>
				</div>

				<div class="col-2">
					<div class="card">
						<div class="card-body">
							<div class="form-group" style="text-align:center;">
								</br>
								<h4 class="card-title">Temperature</h4>
								<input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="40" data-fgColor="#cc0000" data-angleOffset="-125" data-angleArc="250" data-rotation=clockwise data-displayPrevious=true value="<?php echo $n6 ?>" />
							</div>
							<center>
								<?php
								if ($hmin6 > $hamid6) {
								?>
									<h4> Warning!!! </h4>
									<?php $hasil21 = 0 ?>
								<?php } else if ($hamid6 > $hmax6) { ?>
									<h4> Good </h4>
									<?php $hasil21 = 1 ?>
								<?php } else { ?>
									<h4> Warning!!! </h4>
									<?php $hasil21 = 0 ?>
								<?php }
								?>
							</center>
						</div>
					</div>
				</div>

				<div class="col-2">
					<div class="card">
						<div class="card-body">
							<div class="form-group" style="text-align:center;">
								</br>
								<h4 class="card-title">PH</h4>
								<input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="14" data-fgColor="#0000cc" data-angleOffset="-125" data-angleArc="250" data-rotation=clockwise data-displayPrevious=true value="<?php echo $n7 ?>" />
							</div>
							<center>
								<?php
								if ($hmin7 > $hamid7) {
								?>
									<h4> Warning!!! </h4>
									<?php $hasil22 = 0 ?>
								<?php } else if ($hamid7 > $hmax7) { ?>
									<h4> Good </h4>
									<?php $hasil22 = 1 ?>
								<?php } else { ?>
									<h4> Warning!!! </h4>
									<?php $hasil22 = 0 ?>
								<?php }
								?>
							</center>
						</div>
					</div>
				</div>
				<div class="col-2">
					<div class="card">
						<div class="card-body">
							<div class="form-group" style="text-align:center;">
								</br>
								<h4 class="card-title">Oksigen</h4>
								<input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="10" data-fgColor="#9900cc" data-angleOffset="-125" data-angleArc="250" data-rotation=clockwise data-displayPrevious=true value="<?php echo $n8 ?>" />
							</div>
							<center>
								<?php
								if ($hmin8 > $hamid8) {
								?>
									<h4> Warning!!! </h4>
									<?php $hasil23 = 0 ?>
								<?php } else if ($hamid8 > $hmax8) { ?>
									<h4> Good </h4>
									<?php $hasil23 = 1 ?>
								<?php } else { ?>
									<h4> Warning!!! </h4>
									<?php $hasil23 = 0 ?>
								<?php }
								?>
							</center>
						</div>
					</div>
				</div>

				<div class="col-2">
					<div class="card">
						<div class="card-body">
							<div class="form-group" style="text-align:center;">
								</br>
								<h4 class="card-title">Amoniak</h4>
								<input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="1" data-fgColor="#98c682" data-angleOffset="-125" data-angleArc="250" data-rotation=clockwise data-displayPrevious=true value="<?php echo $n9 ?>" />
							</div>
							<center>
								<?php
								if ($hmin9 > $hamid9) {
								?>
									<h4> Good </h4>
									<?php $hasil24 = 1 ?>
								<?php } else if ($hamid9 > $hmax9) { ?>
									<h4> Warning!!! </h4>
									<?php $hasil24 = 0 ?>
								<?php } else { ?>
									<h4> Warning!!! </h4>
									<?php $hasil24 = 0 ?>
								<?php }
								?>
							</center>
						</div>
					</div>
				</div>

				</center>
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
				<center>
					<?php
					if ($hasil21 == 0 || $hasil22 == 0 || $hasil23 == 0 || $hasil24 == 0) { ?>
						<h3> Bayes Conclusion : Danger </h3>
						<?php $akuaponik = 0 ?>
					<?php } else { ?>
						<h3> Bayes Conclusion : Safe</h3>
						<?php $akuaponik = 1 ?>
					<?php }
					?>
				</center>
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


					<center>
						<h2> Bayes Overall Conclusion :

							<?php
							if ($akuaponik == 1 && $terarium == 1) { ?>
								Safe
							<?php } else { ?>
								Danger
						</h2>
					<?php }
					?>
					</center>
					<center>
						<?= anchor('historydevice/', '<button type="button" class="btn btn-success text-center">Back to Monitoring Device</button>'); ?>
					</center>

					<script type="text/javascript">
						$(document).ready(function() {
							$('#datatable').DataTable({
								dom: 'Bfrtip',
								buttons: [
									'copy', 'excel', 'pdf', 'csv'
								]
							});
						});
					</script>

					<script>
						$(function() {
							$('[data-plugin="knob"]').knob();
						});
					</script>
					<meta http-equiv="refresh" content="5">