<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
   <div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col mt-4 pt-4">
            <div class="card">
                <div class="card-header">Login form</div>
                <div class="card-body">
                     <?=$this->session->flashdata('info_register');?>
                    <form method="POST" action="">
                        <input type="text" name="username" class="form-control mb-3" placeholder="username" required>
                        <input type="password" name="password" class="form-control mb-3" placeholder="password" required>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="<?=base_url("auth/register");?>" class="btn btn-primary">Daftar</a>
                    </form> 
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>