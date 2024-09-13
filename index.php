<?php
session_start();
include('includes/header.php'); ?>

<div class="py-5">
        <div class="container">
                <div class="row justify-content-center">
                        <div class="col-md-12">
                                <?php
                                if (isset($_SESSION['message'])) 
                                {
                                ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                <?php
                                        unset($_SESSION['message']);
                                }
                                ?>
                                <h1>Hello, world!</h1>
                                <button class="btn btn-primary">Testing</button>
                        </div>
                </div>
        </div>
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->

<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php include('includes/footer.php'); ?>