<!DOCTYPE html>
<html>

<head>
    <title>حسابي</title><!-- site title-->
    <?php include('layout/style.php') ?>
</head>

<body>
    <?php include('layout/header-login.php') ?>
    <?php include('modals/change-password-2.php') ?>
    <?php include('modals/change-sitting-2.php') ?>
    <!-- start wrapper -->
    <div class="wrapper">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">حسابي</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="acount-sitting acount-sitting-2">
                        <div class="acount-sitting-com">
                            <div class="sitting-h sitting-h-b">
                                <h5>بيانات الحساب</h5>
                            </div>
                            <div class="siting-body">
                                <div class="edit-c"><a href="" data-toggle="modal" data-target="#exampleModalCenter-5" aria-label="Close" data-dismiss="modal"><i class="fas fa-pen"></i></a></div>
                                <div class="acount-user-img">
                                    <img src="lib/img/user-img.svg" alt="">
                                    <span><i class="fas fa-plus-circle"></i></span>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"><i class="fas fa-user"></i> نبذة شخصة</label>
                                        <textarea disabled class="form-control" id="exampleFormControlTextarea1" rows="3">عبدالله جرغون بكالوريوس تصميم عملت في العديد من الشركات وحصلت على العديد من المشاريع واعمل اعمل الان كفريلانسر عبر منصات العمل الحرمن الشركات وحصلت على العديد
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput"><i class="fas fa-user"></i> الاسم كاملا</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="محمد خالد بن الحمدان" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> <i class="fas fa-phone-alt"></i> رقم الجوال</label>

                                    <div class="row w-100 phone-n">
                                        <input class="form-control mr-sm-2 search-t col-lg" type="number" placeholder="1234567890" disabled aria-label="Search">
                                        <span class="flag-img">(+966) <img src="lib/img/saudi-arabia.svg" alt=""></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fas fa-envelope"></i> البريد الالكتروني</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><i class="fas fa-map-marker-alt"></i> الموقع</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="المملكة العربية السعودية - المدينة المنورة - شارع الملك عبد الله" disabled>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                    <label for="formGroupExampleInput"> رقم الايبان</label>
                                    <input type="number" class="form-control" id="formGroupExampleInput" placeholder="6497971641610302" disabled>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="exampleFormControlSelect1"> الجنس</label>
                                    <select disabled class="form-control" id="exampleFormControlSelect1">
                                        <option value="">ذكر</option>
                                        <option value="">أنثى</option>
                                    </select>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                   <div class="Identity">
                                      <h6>صورة الهوية الوطنية</h6>
                                       <img src="lib/img/Identity.svg" alt="">
                                   </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="acount-sitting-com">
                            <div class="sitting-h">
                                <h5>معلومات الأمن</h5>
                            </div>
                            <div class="siting-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> <i class="fas fa-lock"></i> كلمة المرور</label>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="***********************" disabled>
                                </div>
                                <a href="" data-toggle="modal" data-target="#exampleModalCenter-6" aria-label="Close" data-dismiss="modal">هل تريد تغيير كلمة المرور؟</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        </div>
    </div>
    <?php include('layout/footer.php') ?>
    <!-- Java script lib-->
    <?php include('layout/script.php') ?>
</body>

</html>
