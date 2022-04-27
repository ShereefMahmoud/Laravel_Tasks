
<!doctype html>
<html lang="en">

<head>
    <title>Post</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .all {
            /*background-color: lightblue;*/
            background-image: linear-gradient(to right, lightblue, azure);
        }

        .box {
            width: 50%;
            height: 65vh;
            margin: 25vh  auto ;
            /*background-color:azure;*/
            background-image: linear-gradient(to left, lightblue, azure);
            border-radius: 20px;
        }


        .box div {
            margin: 15px 20px;
        }

        .box button {
            margin-left: 45%;
        }

        .reg_header {
            text-align: center;
            padding-top: 10px;
            margin-bottom: 5px;
        }
    </style>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<!-- container -->
<div class="container">


    <div class="page-header">
        <h1>Read Users </h1>

        <br>

        {{ 'Welcome , '. auth('admin')->user()->name}}

      <p>

        {{   session()->get('Message')   }}
        <br>

      </p>


    </div>

    <a href="{{ url('/admin/create') }}">+ Admins</a>   ||    <a href="{{ url('logout') }}">LogOut</a>

    <table class='table table-hover table-responsive table-bordered'>
        <!-- creating our table heading -->
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>action</th>
        </tr>

        @php
            $i=0
        @endphp
        @foreach ($data as $key => $value)


        <tr>
               <td>{{ ++$i }}</td>
               <td>{{ $value->name }}</td>
               <td>{{ $value->email }}</td>
            <td>

                <a href='{{ url('admin/delete/'.$value->id) }}' class='btn btn-danger m-r-1em'>Delete</a>

                <a href='{{ url('admin/edit/'.$value->id) }}' class='btn btn-primary m-r-1em'>Edit</a>
            </td>
        </tr>

        @endforeach
        <!-- end table -->
    </table>

</div>
<!-- end .container --





    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>
