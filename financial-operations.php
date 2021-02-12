<!DOCTYPE html>
<html>

<head>
    <title>الطلبات</title><!-- site title-->
    <?php include('layout/style.php') ?>
</head>

<body>
    <?php include('layout/header-login.php') ?>
    <?php include('modals/collection-request.php') ?>
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
                                                    <!-- start navs section -->
                                                    <div class="row d-flex justify-content-center">
                                    <div class="modal-tab col-3">
                            <ul class="nav nav-pills mb-3 list-con row" id="pills-tab" role="tablist">
                                <li class="nav-item col-6">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">رصيدي</a>
                                </li>
                                <li class="nav-item col-6">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">عملياتي المالية</a>
                                </li>
                            </ul>
                            </div>
                            </div>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
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
                <div class="row">
                   <div class="col-lg-5"></div>
                    <div class="col-lg-2"> <button type="submit" class="btn" data-toggle="modal" data-target="#exampleModalCenter-11"  aria-label="Close" data-dismiss="modal">طلب تحصيل</button></div>
                    <div class="col-lg-5"></div>
                </div>
                                </div>
                
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="row">
                    <div class="col-lg-3"></div>
                     <div class="col-lg-6 p-balance">
                     <div class="balance balance-op row">
                        <div class="col-lg-10">
                         <i class="fas fa-arrow-down"></i>
                         <span>  ريال سعودي  44.50</span>
                         <p class="balance-op-p">تم الدفع : <span>ايداع</span></p>
                         </div>
                         <div class="col-lg-2 balance-op-link">
                             <a href=""><i class="fas fa-chevron-left"></i></a>
                         </div>
                     </div>
                     <div class="balance balance-op row">
                        <div class="col-lg-10">
                         <i class="fas fa-arrow-down"></i>
                         <span>  ريال سعودي  44.50</span>
                         <p class="balance-op-p">تم الدفع : <span>ايداع</span></p>
                         </div>
                         <div class="col-lg-2 balance-op-link">
                             <a href=""><i class="fas fa-chevron-left"></i></a>
                         </div>
                     </div>
                     <div class="balance balance-op row">
                        <div class="col-lg-10">
                         <i class="fas fa-arrow-down"></i>
                         <span>  ريال سعودي  44.50</span>
                         <p class="balance-op-p">تم الدفع : <span>ايداع</span></p>
                         </div>
                         <div class="col-lg-2 balance-op-link">
                             <a href=""><i class="fas fa-chevron-left"></i></a>
                         </div>
                     </div>
                     <div class="balance balance-op row">
                        <div class="col-lg-10">
                         <i class="fas fa-arrow-down"></i>
                         <span>  ريال سعودي  44.50</span>
                         <p class="balance-op-p">تم الدفع : <span>ايداع</span></p>
                         </div>
                         <div class="col-lg-2 balance-op-link">
                             <a href=""><i class="fas fa-chevron-left"></i></a>
                         </div>
                     </div>
                     <div class="balance balance-op row">
                        <div class="col-lg-10">
                         <i class="fas fa-arrow-down"></i>
                         <span>  ريال سعودي  44.50</span>
                         <p class="balance-op-p">تم الدفع : <span>ايداع</span></p>
                         </div>
                         <div class="col-lg-2 balance-op-link">
                             <a href=""><i class="fas fa-chevron-left"></i></a>
                         </div>
                     </div>
                     <div class="balance balance-op row">
                        <div class="col-lg-10">
                         <i class="fas fa-arrow-down"></i>
                         <span>  ريال سعودي  44.50</span>
                         <p class="balance-op-p">تم الدفع : <span>ايداع</span></p>
                         </div>
                         <div class="col-lg-2 balance-op-link">
                             <a href=""><i class="fas fa-chevron-left"></i></a>
                         </div>
                     </div>                     
                     </div>
                     <div class="col-lg-3"></div>   
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
