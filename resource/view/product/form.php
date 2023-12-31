<!DOCTYPE html>
<html lang="en">
<head>

    <?php include "resource/view/layout/portion/head.php" ?>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include "resource/view/layout/portion/navbar.php"; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include "resource/view/layout/portion/aside.php"; ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <?php include "resource/view/layout/portion/header.php"; ?>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Basic form</h4>
                        <p class="card-description"> Basic form elements </p>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="img[]" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                          </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">City</label>
                                <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Textarea</label>
                                <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<?php include "resource/view/layout/portion/footer.php";?>
<?php include "resource/view/layout/portion/js.php"; ?>
</body>
</html>
