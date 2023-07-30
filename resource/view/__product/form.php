<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<div class="main">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link disabled">Disabled</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <?php if(count(error())>0): ?>
            <div class="col-md-12">
                <div class="alert">
                    <?php foreach (error() as $error ): ?>
                    <div class="alert alert-danger"><?php echo $error ?></div>
                    <?php endforeach ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-md-12">
                <form method="post" action="http://localhost:9000/<?php // echo $data["action"]; ?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> <?php // if(isset($data["product"]->name)){ echo $data["product"]->name;} else{ ?> <?php //} ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Category ID</label>
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option >Kategori seç</option>
                            <?php //foreach ($data["category"] as $category): ?>
                                <option  value="<?php // echo $category->category_id; ?> name"
                                    <?php // if(isset($data["product"])) {
                                       // if ($category->category_id == $data["product"]->category_id) {echo "selected";}}?>>
                                    <?php // echo $category->name; ?></option>
                            <?php // endforeach;  ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Brand ID</label>
                        <select class="form-select" name="brand_id"  aria-label="Default select example">
                            <option>test</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" name="email"  value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" name="password"  value="" class="form-control" id="Password" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="confirmed_password" class="form-label">Password Again</label>
                        <input type="password" name="confirmed_password"  value="" class="form-control" id="confirmed_password" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Phone</label>
                        <input type="number" name="phone" value="<--<?php // if(isset($data["product"]->price)) { echo $data["product"]->price ; } else { ?>     <?php // } ?>" class="form-control"  class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" href="http://localhost:9000/<?php // echo $data["action"]; ?>" class="btn btn-primary" >Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>

