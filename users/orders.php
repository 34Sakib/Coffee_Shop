<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

if (!isset($_SESSION['user_id'])) {
	header("Location: " . APPURL . "");
}

 $orders = $conn->query("SELECT * FROM orders WHERE user_id = '$_SESSION[user_id]'");
 $orders->execute();

    $allOrders = $orders->fetchAll(PDO::FETCH_OBJ);

?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Your Orders</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>">Home</a></span> <span>Your Orders</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-orders">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="orders-list">
					<?php if (count($allOrders) > 0): ?>
						<table class="table">
							<thead class="thead-primary">
								<tr class="text-center">
									<th>First Name</th>
									<th>Last Name</th>
									<th>State</th>
                                    <th>Street Address</th>
                                    <th>Town</th>
									<th>Phone</th>
                                    <th>Status</th>
                                    <th>Total Price</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($allOrders as $order): ?>
									<tr class="text-center">
										<td class="first_name"><?php echo $order->first_name; ?></a></td>

										<td class="last_name">
											<?php echo $order->last_name; ?>
										</td>

										<td class="state">
											<?php echo $order->state; ?>
										</td>
                                        <td class="street_address"><?php echo $order->street_address; ?>
                                        </td>
                                        <td class="town"><?php echo $order->town; ?>
                                        </td>

										<td class="phone"><?php echo $order->phone; ?>
                                        </td>
                                        <td class="status"><?php echo $order->status; ?>
                                        </td>
                                        <td class="total_price"><?php echo $order->total_price; ?>
                                        </td>
									</tr>
								<?php endforeach; ?>

							</tbody>
						</table>
					<?php else: ?>
						<h3 class="text-center">You do not have any orders for now</h3>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php require "../includes/footer.php"; ?>