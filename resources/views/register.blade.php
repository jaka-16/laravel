<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container"><br>
        <div class="col-md-4 col-md-offset-4">
            <h2 class="text-center"><b>Register Form</b></h3>
            <hr>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('create_user') }}" method="post">
            @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="" id="togglePass">
                </div>
                <div class="form-group">
                    <label>Password Confirm</label>
                    <input type="password" name="password_confirm" class="form-control" placeholder="Password" required="" id="togglePass2">
                </div>
                    <!-- An element to toggle between password visibility -->
                <div class="form-group">
                    <input type="checkbox" id="btnPassword">Show Password 
                </div>
                <button class="btn btn-success pull-right" type="submit">Submit</button>
                <hr>
            </form>
        </div>
    </div>
    <script>
        const ipnElement = document.querySelector('#togglePass')
        const ipnElement2 = document.querySelector('#togglePass2')
        const btnElement = document.querySelector('#btnPassword')

        // step 2
        btnElement.addEventListener('click', function() {

        // step 3
        const currentType = ipnElement.getAttribute('type')
        const currentType2 = ipnElement2.getAttribute('type')

        // step 4
        ipnElement.setAttribute('type',currentType === 'password' ? 'text' : 'password')
        ipnElement2.setAttribute('type',currentType2 === 'password' ? 'text' : 'password')
   })

    </script>
</body>
</html>