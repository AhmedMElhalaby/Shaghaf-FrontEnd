<!DOCTYPE html>
<html>

<head>
    <title>حسابي</title><!-- site title-->
    <?php include('layout/style.php') ?>
</head>

<body>
    <?php include('layout/header-login.php') ?>
    <!-- start wrapper -->
    <div class="wrapper">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">الطلبات</a></li>
                    <li class="breadcrumb-item"><a href="#">الطلبات الحالية</a></li>
                    <li class="breadcrumb-item"><a href="#">تفاصيل الطلب</a></li>
                    <li class="breadcrumb-item active" aria-current="page">لوحة دفنشي (عبد الله جرغون)</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="orders-details orders-details-2">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="card pro-ser-card">
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
                                            <div class="col-lg-5"><span class="count count-pr">300 ر.س</span></div>
                                            <div class="col-lg-2"></div>
                                            <div class="col-lg-5">
                                                <span class="count">عدد الخدمة : 4</span>
                                            </div>
                                        </div>
                                        <div class="m-name">
                                            <span class="count">المنفذ</span>
                                            <p>عبدالله جرغون</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="midd-line"></div>
                            </div>
                            <div class="col-lg-5">
                                <div class="t-d">
                                    <span><img src="lib/img/clock.svg" alt=""> 23:11PM</span>
                                    <span><img src="lib/img/calendar.svg" alt=""> 2020/07/31</span>
                                </div>
                                <div class="order-state">
                                    <div class="order-header">
                                        <h5>حالة الطلب</h5>
                                    </div>
                                    <div class="order-content t-d">
                                        <div class="doted-bor">
                                            <span> إنشاء الطلب</span>
                                            <p>23:13-2020/07/30</p>
                                            <span> الغاء الطلب</span>
                                            <p>23:13-2020/07/30</p>
                                        <div class="time-line">
                                           <div class="">
                                            <i class="fas fa-check-circle"></i>
                                            </div>
                                            <span class="test-border"></span>
                                            <div class="">
                                            <i class="fas fa-check-circle"></i>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="total-price t-d">
                                    <p>السعر الاجمالي</p>
                                    <span> 1500 ر.س </span>
                                </div>
                                                         <div class="row">
                                                                                                                    <div class="tab-button col-lg-6">
                       <button type="submit" class="btn color-y">قبول الطلب</button>
                   </div>
                                                                                                               <div class="tab-button col-lg-6">
                       <button type="submit" class="btn">الغاء الطلب</button>
                   </div>
                                                         </div>
   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1">

                </div>
            </div>
        </div>
    </div>
    <?php include('layout/footer.php') ?>
    <!-- Java script lib-->
    <?php include('layout/script.php') ?>
</body>

</html>
