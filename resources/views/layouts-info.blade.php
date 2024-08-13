<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>{{$title}}</title>
        <link href="/ad/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="/public/css/modal.css  ">
        <link rel="short icon" href="/logo.jpg">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body style="background-color: #F3F5F7">
    <div class="container mt-5 d-block">
        <div class="container-fluid w-75">
            <div class="card" >
                <div class="card-body">
                    <x-flash-message></x-flash-message>
                    @yield('changePassword')
                    @yield('profile')
                    @yield('editProfile')
                    @yield('forgotPassword')
                    @yield('applyForm')
                    @yield('listCV')
                    @yield('detailJob')
                    @yield('showVerify')
                    @yield('verifyEmail')
                </div>
            </div>
        </div>
    </div>
</body>
</html>