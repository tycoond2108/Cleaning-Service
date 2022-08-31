<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cleaners</title>
  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{asset('css/users.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>


  <section id="content">
    <main>
      <div class="head-title">
        <div class="left">
          <h1>All Cleaners</h1>
          <ul class="breadcrumb">
            <li>
              <a href="/admin">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
              <a href="/">Home</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>

            <li>
              <a class="active" href="/admin/users">Users</a>
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
      <!---------------->
      <div class="table-data">
        <div class="order">
          <div class="head">
            <h3>Cleaners</h3>
          </div>
          <table>
            <thead>
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Joining date</th>
                <th>delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($cleaners as $cleaner)
              <tr>
                <td>
                  <img src="{{asset('/imgs/')}}/{{$cleaner->profile_picture}}">
                  <p>{{$cleaner->name}}</p>
                </td>
                <td>@ <a href="/users/{{$cleaner->id}}">{{$cleaner->username}}</a></td>
                <td>{{$cleaner->email}}</td>
                <td>{{$cleaner->created_at}}</td>
                <td>
                  <form action="/users/delete/{{$cleaner->id}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">

                <td><button type='submit'><i class='bx bxs-trash bx-tada bx-rotate-90'></i></button></td>
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>

  </section>
  </main>
</body>

</html>