<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

if (!isset($_SESSION['user_id'])) {
	header("Location: " . APPURL . "");
}

 $booking = $conn->query("SELECT * FROM booking WHERE user_id = '$_SESSION[user_id]'");
 $booking->execute();

    $allBookings = $booking->fetchAll(PDO::FETCH_OBJ);

?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Your Bookings</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>">Home</a></span> <span>Your Bookings</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-booking">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="booking-list">
					<?php if (count($allBookings) > 0): ?>
						<table class="table">
							<thead class="thead-primary">
								<tr class="text-center">
									<th>First Name</th>
									<th>Last Name</th>
									<th>Time</th>
                                    <th>Date</th>
									<th>Phone</th>
									<th>Message</th>
                                    <th>Status</th>
									<th>Write Review</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($allBookings as $bookings): ?>
									<tr class="text-center">
										<td class="first_name"><?php echo $bookings->first_name; ?></a></td>

										<td class="last_name">
											<?php echo $bookings->last_name; ?>
										</td>

										<td class="time">
											<?php echo $bookings->time; ?>
										</td>
                                        <td class="date"><?php echo $bookings->date; ?>
                                        </td>

										<td class="phone"><?php echo $bookings->phone; ?>
                                        </td>
                                        <td class="message"><?php echo $bookings->message; ?>
                                        </td>
                                        <td class="status"><?php echo $bookings->status; ?>
                                        </td>
										<?php if($bookings->status == "Done"): ?>
										<td class="review">
											<a href="<?php echo APPURL; ?>/reviews/write-review.php" class="btn btn-primary">Write Review</a>
										</td>
										<?php endif; ?>
									</tr>
								<?php endforeach; ?>

							</tbody>
						</table>
					<?php else: ?>
						<h3 class="text-center">You do not have any bookings for now</h3>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php require "../includes/footer.php"; ?>