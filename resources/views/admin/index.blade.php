<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{asset('css/admin-style.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<title>Admin Panel</title>
</head>

<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="/admin" class="brand">
			<img src="{{asset('/imgs/ts_logo.png')}}" alt="">
			<span class="text">Admin Panel</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard bx-burst'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>

			<li>
				<a href="/admin/cleaners">
					<i class='bx bx-location-plus bx-burst'></i>
					<span class="text">Cleaners</span>
				</a>
			</li>
			<li>
				<a href="/admin/users">
					<i class='bx bxs-group bx-burst'></i>
					<span class="text">Customers</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<form action="/logout" method="POST">
					@csrf
					<a href="/logout" class="logout" onclick="event.preventDefault(); this.closest('form').submit();"><i class='bx bxs-log-out-circle bx-burst'></i><span class="text">Log out</span></a>
				</form>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>

			<a href="/users/{{Auth::user()->id}}" class="profile">
				<img src="{{asset('/imgs/')}}/{{Auth::user()->profile_picture}}">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="/">Home</a>
						</li>
					</ul>
				</div>
			</div>
		@if(session()->has('success'))
    <div class="alert-success" role="alert">{{session()->get('success')}}</div>
    @endif

    @if(session()->has('danger'))
    <div class="alert-danger" role="alert">{{session()->get('danger')}}</div>
    @endif
    <!-- Handling flash messages end -->
			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check'></i>
					<span class="text">
						<h3>{{$ordersCount}}</h3>
						<p>Total Rents</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group'></i>
					<span class="text">
						<h3>{{$customersCount}}</h3>
						<p>Customers</p>
					</span>
				</li>

				<li>
					<i class='bx bxs-group'></i>
					<span class="text">
						<h3>{{$cleanersCount}}</h3>
						<p>Cleaners</p>
					</span>
				</li>
			</ul>
			<!------------------------------------>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>All Renting Orders</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>location</th>
								<th>Customer</th>
								<th>Date of Rent</th>
								<th>Cleaner</th>
								<th>From</th>
								<th>To</th>
								<th>Status</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr>
								<td>
									<p>{{$order->user->city}}</p>
								</td>
								<td>
									<p><a href="/users/{{$order->user->id}}">{{$order->user->name}}</a></p>
								</td>
								<td>{{$order->day}}</td>
								<td>
									<p><a href="/users/{{$order->cleaner->id}}">{{$order->cleaner->name}}</a></p>
								</td>
								<td>{{$order->from}}</td>
								<td>{{$order->to}}</td>
								@if($order->status == 0)
								<td><span class="status completed">pending</span></td>
								@elseif($order->status == 2)
								<td><span class="status completed">rejected</span></td>
								@else
								<td><span class="status completed">accepted</span></td>
								@endif
								<form action="/order/delete/{{$order->id}}" method="POST">
									@csrf
									<input type="hidden" name="_method" value="DELETE">

									<td><button type='submit'><i class='bx bxs-trash bx-tada bx-rotate-90'></i></button></td>
								</form>

							</tr>
							@endforeach
						</tbody>
					</table>
				</div>

			</div>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="{{asset('/js/admin_script.js')}}"></script>
</body>

</html>