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
                        <li class="breadcrumb-item active" aria-current="page">الطلبات</li>
                    </ol>
                </nav>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="acount-sitting">
                       <div class="acount-sitting-com">
                        <div class="sitting-h sitting-h-b">
                            <h5>بيانات الحساب</h5>
                        </div>
                        <div class="siting-body">
                           <div class="edit-c"><a href=""><i class="fas fa-pen"></i></a></div>
                            <div class="form-group">
                                <label for="formGroupExampleInput"><i class="fas fa-user"></i> الاسم كاملا</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="محمد خالد بن الحمدان" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <i class="fas fa-phone-alt"></i> رقم الجوال</label>

                                <div class="row w-100 phone-n">
                                    <input class="form-control mr-sm-2 search-t col-lg" type="number" placeholder="1234567890" disabled aria-label="Search">
                                    <select disabled class="form-control form-group btn btn-outline my-2 my-sm-0 search-b col-lg-2" id="exampleFormControlSelect1">
                                        <option>(+966)</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><i class="fas fa-envelope"></i> البريد الالكتروني</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com" disabled>
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
  <a href="" data-toggle="modal" data-target="#exampleModalCenter-1"  aria-label="Close" data-dismiss="modal">هل نسيت كلمة المرور؟</a>
                    </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">

                </div>
            </div>
        </div>
    </div>
    <?php include('layout/footer.php') ?>
    <!-- Java script lib-->
    <?php include('layout/script.php') ?>
</body>

</html>
