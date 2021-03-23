<!DOCTYPE html>
<html>

<head>
    <title>خدماتنا</title><!-- site title-->
    <?php include('layout/style.php') ?>
</head>

<body>
    <?php include('layout/header-login.php') ?>
    <?php include('modals/confirm-order.php') ?>
    <!-- start wrapper -->
    <div class="wrapper">
        <div class="container">
            <div class="sevice-user">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">عملية الدفع</li>
                    </ol>
                </nav>
                <section class="payment">
                    <div>
                        <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6 payMethod">
                                                <h3 class="text-center">عملية الدفع</h3>
                        <form>
                                                                    <div class="form-group">
                                                                    <label for="exampleInputEmail1">رقم العملية</label>
                                            <input type="text" id="exampleInputEmail1" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">رقم العملية</label>
                                            <input  id="exampleInputEmail1" type="text" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">رقم العملية</label>
                                            <input id="exampleInputEmail1" type="text" class="form-control" placeholder="">
                                        </div>
                                        <button type="submit" class="btn text-center"> الذهاب للمحفظة</button>
                        </form>
                        </div>
                        <div class="col-lg-3"></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php include('layout/footer.php') ?>
    <!-- Java script lib-->
    <?php include('layout/script.php') ?>
</body>

</html>
