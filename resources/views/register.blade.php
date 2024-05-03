<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Create Post Form -->
    <div class="container">
        <div class="row">
            <div class="col-mid-4">
            @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
                <form id="registrationForm" action="{{ url('/postForm') }}" method="post" class="form-group">
                    <br>
                    <input class="form-control" type="name" id="fullName" name="full_name" placeholder="full name" required ><br>
                    <input class="form-control" type="name" id="userName" name="user_name" placeholder="user name" required><br>
                    <input class="form-control" type="date" id="birthdate" name="birthdate" required><br>
                    <input class="form-control" type="tel" id="phone" name="phone" placeholder="phone num" required><br>
                    <input class="form-control" type="text" id="address" name="address" placeholder="address" required><br>
                    <input class="form-control" type="password" id="password" name="password" placeholder="password" required><br>
                    <input class="form-control" type="password" id="confirmPassword" name="password_confirmation" placeholder="Confirm Password" required><br>
                    <input class="form-control" type="file" id="userImage" name="user_image" required><br>
                    <input class="form-control" type="email" id="email" name="email" placeholder="email" required><br>
                    <input type="submit" value="register" class="btn btn-success">
                <!-- to make sure 2n el bymla el form bny2adm 3ady msh boot -->
                @csrf
                </form>
            </div>
        </div>
    </div>

</body>
</html>
