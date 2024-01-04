<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?=$this->session->flashdata('info_login');?>
    <h1 align="center">Welcome</h1><?=$this->session->userdata('id');?>
    <div class="container">
        Nama : <?=$this->session->userdata('nama');?> <br>
        Username : <?=$this->session->userdata('username');?> <br>
        Id : <?=$this->session->userdata('id');?> <br>
        <a href="<?=base_url('auth/logout');?>" class="btn btn-primary">logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>