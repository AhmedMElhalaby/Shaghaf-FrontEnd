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
            <div class="sevice-user financial-operations orders">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">عملياتي المالية</li>
                    </ol>
                </nav>
                <div class="row justify-content-center">
                    <div class="pro-ser col-3">
                        <!-- start navs section -->
                        <div class="col-lg most-l">
                            <a href="javascript:;" class="active">رصيدي</a>
                            <a href="javascript:;">عملياتي المالية</a>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-2"></div>
                     <div class="col-lg-8 p-0">
                     <div class="row p-balance">            
                <div class="col-lg-4">
                    <div class="balance">
                        <h5>الرصيد المتاح</h5>
                        <p>1500.00 ر.س</p>
                    </div>
                </div>                 
                <div class="col-lg-4">
                                        <div class="balance">
                        <h5>الرصيد المعلق</h5>
                        <p>900.00 ر.س</p>
                    </div>
                </div>                 
                <div class="col-lg-4">
                                        <div class="balance">
                        <h5>الرصيد الكلي</h5>
                        <p>93300.00 ر.س</p>
                    </div>
                </div> 
                    </div>                
                     </div>
                     <div class="col-lg-2"></div>   
                </div>
            </div>
        </div>
    </div>
    <?php include('layout/footer.php') ?>
    <!-- Java script lib-->
    <?php include('layout/script.php') ?>
</body>

</html>
