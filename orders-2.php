<!DOCTYPE html>
<html>

<head>
    <title>الطلبات</title><!-- site title-->
    <?php include('layout/style.php') ?>
</head>

<body>
    <?php include('layout/header-login.php') ?>
    <!-- start wrapper -->
    <div class="wrapper">
        <div class="container">
            <div class="sevice-user orders orders-2 add-orders">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">الطلبات</li>
                    </ol>
                </nav>
                <div class="row justify-content-center">
                    <div class="pro-ser col-3">
                        <!-- start navs section -->
                        <div class="col-lg most-l">
                            <a href="javascript:;" class="active">الطلبات الحالية</a>
                            <a href="javascript:;">الطلبات السابقة</a>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-3">
                        <div class="card pro-ser-card" onclick="location.href='orders-details.php';">
                            <img class="card-img-top" src="lib/img/product-1.svg" alt="Card image cap">
                            <div class="card-body">
                                <h6 class="card-title">لوحة دفنشي</h6>
                                <p class="card-text">تصميم فيلا على برنامج اليستريتور خلال 3 أيام بجودة عالية</p>
                                <hr>
                                <ul>
                                    <li>بيوت</li>
                                    <li>منازل</li>
                                    <li>تشطيب</li>
                                </ul>
                                <div class="row bg-h">
                                    <div class="col-lg-6"><span class="count count-pr">300 ر.س</span></div>
                                    <div class="col-lg-6">
                                        <span class="count">عدد الخدمة : 4</span>
                                    </div>
                                </div>
                                
                                    <div class="color-1">
                                        <button type="submit" class="btn" data-toggle="modal" data-target="#exampleModalCenter-9" aria-label="Close" data-dismiss="modal"> تم التقييم  </button>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="col-lg-3">
                        <div class="card pro-ser-card" onclick="location.href='orders-details.php';">
                            <img class="card-img-top" src="lib/img/product-1.svg" alt="Card image cap">
                            <div class="card-body">
                                <h6 class="card-title">لوحة دفنشي</h6>
                                <p class="card-text">تصميم فيلا على برنامج اليستريتور خلال 3 أيام بجودة عالية</p>
                                <hr>
                                <ul>
                                    <li>بيوت</li>
                                    <li>منازل</li>
                                    <li>تشطيب</li>
                                </ul>
                                <div class="row bg-h">
                                    <div class="col-lg-6"><span class="count count-pr">300 ر.س</span></div>
                                    <div class="col-lg-6">
                                        <span class="count">عدد الخدمة : 4</span>
                                    </div>
                                </div>
                                
                                    <div class="color-2">
                                        <button type="submit" class="btn" data-toggle="modal" data-target="#exampleModalCenter-9" aria-label="Close" data-dismiss="modal"> تم تاكيد الحجز   </button>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="col-lg-3">
                        <div class="card pro-ser-card" onclick="location.href='orders-details.php';">
                            <img class="card-img-top" src="lib/img/product-1.svg" alt="Card image cap">
                            <div class="card-body">
                                <h6 class="card-title">لوحة دفنشي</h6>
                                <p class="card-text">تصميم فيلا على برنامج اليستريتور خلال 3 أيام بجودة عالية</p>
                                <hr>
                                <ul>
                                    <li>بيوت</li>
                                    <li>منازل</li>
                                    <li>تشطيب</li>
                                </ul>
                                <div class="row bg-h">
                                    <div class="col-lg-6"><span class="count count-pr">300 ر.س</span></div>
                                    <div class="col-lg-6">
                                        <span class="count">عدد الخدمة : 4</span>
                                    </div>
                                </div>
                                
                                    <div class="color-3">
                                        <button type="submit" class="btn" data-toggle="modal" data-target="#exampleModalCenter-9" aria-label="Close" data-dismiss="modal"> طلب مقبول  </button>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="col-lg-3">
                        <div class="card pro-ser-card" onclick="location.href='orders-details.php';">
                            <img class="card-img-top" src="lib/img/product-1.svg" alt="Card image cap">
                            <div class="card-body">
                                <h6 class="card-title">لوحة دفنشي</h6>
                                <p class="card-text">تصميم فيلا على برنامج اليستريتور خلال 3 أيام بجودة عالية</p>
                                <hr>
                                <ul>
                                    <li>بيوت</li>
                                    <li>منازل</li>
                                    <li>تشطيب</li>
                                </ul>
                                <div class="row bg-h">
                                    <div class="col-lg-6"><span class="count count-pr">300 ر.س</span></div>
                                    <div class="col-lg-6">
                                        <span class="count">عدد الخدمة : 4</span>
                                    </div>
                                </div>
                                
                                    <div class="color-4">
                                        <button type="submit" class="btn" data-toggle="modal" data-target="#exampleModalCenter-9" aria-label="Close" data-dismiss="modal"> طلب جديد   </button>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('layout/footer.php') ?>
    <!-- Java script lib-->
    <?php include('layout/script.php') ?>
</body>

</html>
