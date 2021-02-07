<!DOCTYPE html>
<html>

<head>
    <title>الصفحة الرئيسية</title><!-- site title-->
    <?php include('layout/style.php') ?>
</head>

<body>
    <?php include('layout/header.php') ?>
    <!-- start wrapper -->
    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-body">
                                    <!-- start navs section -->
                                    <div class="modal-tab">
                            <ul class="nav nav-pills mb-3 list-con col-lg row" id="pills-tab" role="tablist">
                                <li class="nav-item col-6">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">تسجيل الدخول</a>
                                </li>
                                <li class="nav-item col-6">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"> إنشاء حساب</a>
                                </li>
                            </ul>
                            </div>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
               <form>                     
  <div class="form-group">
    <label for="exampleInputEmail1"> <i class="fas fa-phone-alt"></i> رقم الجوال</label>
 
                                <div class="row w-100 phone-n">
                              <input class="form-control mr-sm-2 search-t col-lg" type="number" placeholder="ادخال رقم الجوال" aria-label="Search">
    <select class="form-control form-group btn btn-outline my-2 my-sm-0 search-b col-lg-2" id="exampleFormControlSelect1">
      <option>(+966)</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
                              </div> </div>
    <div class="form-group">
    <label for="exampleInputPassword1"> <i class="fas fa-lock"></i> كلمة المرور</label>
    <input type="password" class="form-control" id="inputPassword" placeholder="ادخل كلمة المرور">
  </div>
  <a href="" data-toggle="modal" data-target="#exampleModalCenter-1"  aria-label="Close" data-dismiss="modal">هل نسيت كلمة المرور؟</a>
   <div class="tab-button">
        <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
   </div>
   <div class="tab-a"> <span> لا تملك حساب؟</span> <a href="">أنشئ حسابك الآن!</a></div>
  </form>
<!--
<form action="#" class="needs-validation was-validated" novalidate>
  <div class="form-group ml-2 mt-2">

    <input type="tel" id="phone" required="required">
    <div class="invalid-feedback">
      You must enter a valid mobile number
    </div>
  </div>
  
<div class="form-group mt-2">
  <button id="save" class="btn btn-primary waves-effect waves-button-input" type="submit">Test submit</button>
</div>
  
</form>  
-->
                                    
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                   
                                    <form class="form">
                                    <div class="radio-chose">
                                    <label for="radio-one" class="r-ch1"><i class="far fa-user-circle"></i> نوع التسجيل</label>
	<div class="switch-field r-ch2">
		<input type="radio" id="radio-one" name="switch-one" value="yes" checked/>
		<label for="radio-one"><i class="fas fa-check-circle"></i> عميل شغف</label>
		<input type="radio" id="radio-two" name="switch-one" value="no" />
		<label for="radio-two"><i class="fas fa-check-circle"></i> شريك شغف</label>
                                        </div>
                                        </div>
                                           <div class="form-group">
    <label for="formGroupExampleInput"><i class="fas fa-user"></i> الاسم كاملا</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ادخال الاسم كاملا">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> <i class="fas fa-phone-alt"></i> رقم الجوال</label>
 
                                <div class="row w-100 phone-n">
                              <input class="form-control mr-sm-2 search-t col-lg" type="number" placeholder="ادخال رقم الجوال" aria-label="Search">
    <select class="form-control form-group btn btn-outline my-2 my-sm-0 search-b col-lg-2" id="exampleFormControlSelect1">
      <option>(+966)</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
                              </div> </div>
     <div class="form-group">
    <label for="exampleInputEmail1"><i class="fas fa-envelope"></i> البريد الالكتروني</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ادخال البريد الالكتروني">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1"> <i class="fas fa-lock"></i> كلمة المرور</label>
    <input type="password" class="form-control" id="inputPassword" placeholder="ادخل كلمة المرور">
  </div>
 <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        أوافق على سياسة الخصوصية 
      </label>
    </div>
  </div>
                                          <div class="tab-button">
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter-2"  aria-label="Close" data-dismiss="modal">إنشاء حساب</button>
   </div>
                                       <div class="tab-a"> <span> هل لديك حساب بالفعل؟</span> <a href="">تسجيل دخول</a></div>
                                        </form>
                                </div>
                            </div>
      </div>
    </div>
  </div>
</div>
   <div class="modal fade" id="exampleModalCenter-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-header">
            <p>نسيت كلمة المرور</p>
        </div>
        <div class="modal-body secound-m">
            <div class="model-img login100-pic js-tilt" data-tilt><img src="lib/img/forget-password.svg" alt=""></div>
                    <span>سوف نساعدك استعادة كلمة المرور الخاصة بك</span>
 <div class="form-group">
    <label for="exampleInputEmail1"> <i class="fas fa-phone-alt"></i> رقم الجوال</label>
 
                                <div class="row w-100 phone-n">
                              <input class="form-control mr-sm-2 search-t col-lg" type="number" placeholder="ادخال رقم الجوال" aria-label="Search">
    <select class="form-control form-group btn btn-outline my-2 my-sm-0 search-b col-lg-2" id="exampleFormControlSelect1">
      <option>(+966)</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
                              </div> </div>
                                                 <div class="tab-button">
        <button type="submit" class="btn btn-primary">تأكيد</button>
   </div>
       <div class="tab-a"></div>
        </div>
      </div>
      </div>
      </div>
   
      <div class="modal fade" id="exampleModalCenter-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-header">
            <p>تأكيد رقم الهاتف</p>
        </div>
        <div class="modal-body secound-m">
            <div class="model-img login100-pic js-tilt" data-tilt><img src="lib/img/verification-code.svg" alt=""></div>
                    <span>يرجى إدخال الرمز المرسل الى رقم الجوال 1234567890</span>
<div class="v-code-main">
  <div class="vcode" id="vcode">
    <input type="phone" class="vcode-input" maxlength="1" id="vcode1">
    <input type="phone" class="vcode-input" maxlength="1">
    <input type="phone" class="vcode-input" maxlength="1">
    <input type="phone" class="vcode-input" maxlength="1">
  </div>
</div>
                                                 <div class="tab-button">
        <button type="submit" class="btn btn-primary">تأكيد</button>
   </div>
      <div class="tab-a"> <span>لم يتم ارسال الكود</span> <a href="">اعادة الارسال</a></div>
        </div>
      </div>
      </div>
      </div>
    <div class="wrapper">
        <div class="first-s">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="container">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="lib/img/1.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="lib/img/1.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="lib/img/1.png" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="lib/img/1.png" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="lib/img/1.png" alt="Third slide">
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="arow-s-l arow-s" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="arow-s-r arow-s" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                    <span class="sr-only">Next</span>
                </a>
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                    <li data-target="#carouselExampleControls" data-slide-to="2"></li>
                    <li data-target="#carouselExampleControls" data-slide-to="3"></li>
                    <li data-target="#carouselExampleControls" data-slide-to="4"></li>
                </ol>
            </div>
        </div>
        <section class="about-us" id="about-us">
            <div class="container">
                <h5 class="text-right"><span class="text-con"> من نحن </span><span class="text-c"></span></h5>
            </div>
            <div class="row w-100">
                <div class="col-lg-7 about-p">
                    <p>هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة . هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة . هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .</p>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <img class="login100-pic js-tilt" data-tilt src="lib/img/about-us.svg" alt="">
                </div>
                <div class="col-lg-1"></div>
            </div>

        </section>

        <section class="our-serve" id="our-serve">
            <div class="test login100-pic js-tilt" data-tilt >
                <img src="lib/img/test.svg" alt="">
            </div>
            <div class="container">
                <h5 class="text-right"><span class="text-con"> خدماتنا </span><span class="text-c"></span></h5>
                <div class="row">
                    <div class="col-lg-3 login100-pic js-tilt" data-tilt>
                        <div class="service" onclick="location.href='#';">
                            <img src="lib/img/s-1.svg" alt="">
                            <p>التصميم الجرافيكي</p>
                        </div>
                    </div>
                    <div class="col-lg-3 login100-pic js-tilt" data-tilt>
                        <div class="service" onclick="location.href='#';">
                            <img src="lib/img/s-2.svg" alt="">
                            <p>الموشن جرافيك</p>
                        </div>
                    </div>
                    <div class="col-lg-3 login100-pic js-tilt" data-tilt>
                        <div class="service" onclick="location.href='#';">
                            <img src="lib/img/s-3.svg" alt="">
                            <p>التعليق الصوتي</p>
                        </div>
                    </div>
                    <div class="col-lg-3 login100-pic js-tilt" data-tilt>
                        <div class="service" onclick="location.href='#';">
                            <img src="lib/img/s-4.svg" alt="">
                            <p>الترجمة</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="most-wanted" id="most-wanted">
            <div class="shape">
                <div class="co-p">
                    <div class="m-w-top container">
                        <div class="row">
                            <div class="col-lg-4">
                                <h5 class="text-right"><span class="text-con"> الاكثر طلبا </span><span class="text-c-y"></span></h5>
                            </div>
                             
                            <div class="col-lg most-l" id="myAnchor">
                                <a href="#" class="active">الكل</a>
                                <a href="#">التصميم الجرافيكي</a>
                                <a href="#">الموشن جرافيك</a>
                                <a href="#">الترجمة</a>
                                <a href="#">التعليق الصوتي</a>
                            </div>
                        </div>
                    </div>
                            <div id="carouselExampleControls-1" class="carousel slide" data-ride="carousel">
                                <div class="container">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                                                                          
                                                    <div class="card" onclick="location.href='#';">
                                                       <div class="img-o-h">
                                                        <div class="order-card-img">
                                                            <img class="card-img-top" src="lib/img/m-1.svg" alt="Card image cap">
                                                        </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4>عبدالله جرغون</h4>
                                                            <p class="card-text">مصمم جرافيك</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i> الرياض</span></div>
                                                                <div class="col-3 p-0"><span><i class="fas fa-user"></i> شخصي</span></div>
                                                                <div class="col-lg-2"></div>
                                                                <div class="col-4 star">
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="card" onclick="location.href='#';">
                                                       <div class="img-o-h">
                                                        <div class="order-card-img">
                                                            <img class="card-img-top" src="lib/img/m-2.svg" alt="Card image cap">
                                                        </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4>عبدالله جرغون</h4>
                                                            <p class="card-text">مصمم جرافيك</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i> الرياض</span></div>
                                                                <div class="col-3 p-0"><span><i class="fas fa-user"></i> شخصي</span></div>
                                                                <div class="col-lg-2"></div>
                                                                <div class="col-4 star">
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="card" onclick="location.href='#';">
                                                       <div class="img-o-h">
                                                        <div class="order-card-img">
                                                            <img class="card-img-top" src="lib/img/m-3.svg" alt="Card image cap">
                                                        </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4>عبدالله جرغون</h4>
                                                            <p class="card-text">مصمم جرافيك</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i> الرياض</span></div>
                                                                <div class="col-3 p-0"><span><i class="fas fa-user"></i> شخصي</span></div>
                                                                <div class="col-lg-2"></div>
                                                                <div class="col-4 star">
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="card" onclick="location.href='#';">
                                                       <div class="img-o-h">
                                                        <div class="order-card-img">
                                                            <img class="card-img-top" src="lib/img/m-4.svg" alt="Card image cap">
                                                        </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4>عبدالله جرغون</h4>
                                                            <p class="card-text">مصمم جرافيك</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i> الرياض</span></div>
                                                                <div class="col-3 p-0"><span><i class="fas fa-user"></i> شخصي</span></div>
                                                                <div class="col-lg-2"></div>
                                                                <div class="col-4 star">
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="card" onclick="location.href='#';">
                                                       <div class="img-o-h">
                                                        <div class="order-card-img">
                                                            <img class="card-img-top" src="lib/img/m-1.svg" alt="Card image cap">
                                                        </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4>عبدالله جرغون</h4>
                                                            <p class="card-text">مصمم جرافيك</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i> الرياض</span></div>
                                                                <div class="col-3 p-0"><span><i class="fas fa-user"></i> شخصي</span></div>
                                                                <div class="col-lg-2"></div>
                                                                <div class="col-4 star">
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="card" onclick="location.href='#';">
                                                       <div class="img-o-h">
                                                        <div class="order-card-img">
                                                            <img class="card-img-top" src="lib/img/m-2.svg" alt="Card image cap">
                                                        </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4>عبدالله جرغون</h4>
                                                            <p class="card-text">مصمم جرافيك</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i> الرياض</span></div>
                                                                <div class="col-3 p-0"><span><i class="fas fa-user"></i> شخصي</span></div>
                                                                <div class="col-lg-2"></div>
                                                                <div class="col-4 star">
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="card" onclick="location.href='#';">
                                                       <div class="img-o-h">
                                                        <div class="order-card-img">
                                                            <img class="card-img-top" src="lib/img/m-3.svg" alt="Card image cap">
                                                        </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4>عبدالله جرغون</h4>
                                                            <p class="card-text">مصمم جرافيك</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i> الرياض</span></div>
                                                                <div class="col-3 p-0"><span><i class="fas fa-user"></i> شخصي</span></div>
                                                                <div class="col-lg-2"></div>
                                                                <div class="col-4 star">
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="card" onclick="location.href='#';">
                                                       <div class="img-o-h">
                                                        <div class="order-card-img">
                                                            <img class="card-img-top" src="lib/img/m-4.svg" alt="Card image cap">
                                                        </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4>عبدالله جرغون</h4>
                                                            <p class="card-text">مصمم جرافيك</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i> الرياض</span></div>
                                                                <div class="col-3 p-0"><span><i class="fas fa-user"></i> شخصي</span></div>
                                                                <div class="col-lg-2"></div>
                                                                <div class="col-4 star">
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="card" onclick="location.href='#';">
                                                       <div class="img-o-h">
                                                        <div class="order-card-img">
                                                            <img class="card-img-top" src="lib/img/m-1.svg" alt="Card image cap">
                                                        </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4>عبدالله جرغون</h4>
                                                            <p class="card-text">مصمم جرافيك</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i> الرياض</span></div>
                                                                <div class="col-3 p-0"><span><i class="fas fa-user"></i> شخصي</span></div>
                                                                <div class="col-lg-2"></div>
                                                                <div class="col-4 star">
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="card" onclick="location.href='#';">
                                                       <div class="img-o-h">
                                                        <div class="order-card-img">
                                                            <img class="card-img-top" src="lib/img/m-2.svg" alt="Card image cap">
                                                        </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4>عبدالله جرغون</h4>
                                                            <p class="card-text">مصمم جرافيك</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i> الرياض</span></div>
                                                                <div class="col-3 p-0"><span><i class="fas fa-user"></i> شخصي</span></div>
                                                                <div class="col-lg-2"></div>
                                                                <div class="col-4 star">
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="card" onclick="location.href='#';">
                                                       <div class="img-o-h">
                                                        <div class="order-card-img">
                                                            <img class="card-img-top" src="lib/img/m-3.svg" alt="Card image cap">
                                                        </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4>عبدالله جرغون</h4>
                                                            <p class="card-text">مصمم جرافيك</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i> الرياض</span></div>
                                                                <div class="col-3 p-0"><span><i class="fas fa-user"></i> شخصي</span></div>
                                                                <div class="col-lg-2"></div>
                                                                <div class="col-4 star">
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="card" onclick="location.href='#';"s>
                                                       <div class="img-o-h">
                                                        <div class="order-card-img">
                                                            <img class="card-img-top" src="lib/img/m-4.svg" alt="Card image cap">
                                                        </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h4>عبدالله جرغون</h4>
                                                            <p class="card-text">مصمم جرافيك</p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="row">
                                                                <div class="col-3 p-0"><span><i class="fas fa-map-marker-alt"></i> الرياض</span></div>
                                                                <div class="col-3 p-0"><span><i class="fas fa-user"></i> شخصي</span></div>
                                                                <div class="col-lg-2"></div>
                                                                <div class="col-4 star">
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       

                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls-1" role="button" data-slide="prev">
                                    <span class="arow-s-l arow-s" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls-1" role="button" data-slide="next">
                                    <span class="arow-s-r arow-s" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                </div>
            </div>
        </section>
        
       
        <section class="said-about-us" id="said-about-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h5 class="text-right"><span class="text-con"> قالوا عنا </span><span class="text-c"></span></h5>
                        <p>عرض بعض مراجعات الزبائن في التعامل من منصة شغف</p>
                        <div class="row">
                            <div class="col-lg-11 o-h">
                                <div id="carouselExampleControls-3" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <div class="col-lg-4 text-center">
                                                    <div class="b-sh">
                                                        <div class="said-img">
                                                            <img src="lib/img/said-1.svg" alt="">
                                                        </div>
                                                        <h4>Salah Khattab</h4>
                                                        <p>من أجمل المواقع لشراء البطاقات من أجمل المواقع لطلب المشاريع بكل</p>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 text-center">
                                                    <div class="b-sh">
                                                        <div class="said-img">
                                                            <img src="lib/img/said-2.svg" alt="">
                                                        </div>
                                                        <h4>Salah Khattab</h4>
                                                        <p>من أجمل المواقع لشراء البطاقات من أجمل المواقع لطلب المشاريع بكل</p>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 text-center">
                                                    <div class="b-sh">
                                                        <div class="said-img">
                                                            <img src="lib/img/said-3.svg" alt="">
                                                        </div>
                                                        <h4>Salah Khattab</h4>
                                                        <p>من أجمل المواقع لشراء البطاقات من أجمل المواقع لطلب المشاريع بكل</p>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-lg-4 text-center">
                                                    <div class="b-sh">
                                                        <div class="said-img">
                                                            <img src="lib/img/said-1.svg" alt="">
                                                        </div>
                                                        <h4>Salah Khattab</h4>
                                                        <p>من أجمل المواقع لشراء البطاقات من أجمل المواقع لطلب المشاريع بكل</p>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 text-center">
                                                    <div class="b-sh">
                                                        <div class="said-img">
                                                            <img src="lib/img/said-2.svg" alt="">
                                                        </div>
                                                        <h4>Salah Khattab</h4>
                                                        <p>من أجمل المواقع لشراء البطاقات من أجمل المواقع لطلب المشاريع بكل</p>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 text-center">
                                                    <div class="b-sh">
                                                        <div class="said-img">
                                                            <img src="lib/img/said-3.svg" alt="">
                                                        </div>
                                                        <h4>Salah Khattab</h4>
                                                        <p>من أجمل المواقع لشراء البطاقات من أجمل المواقع لطلب المشاريع بكل</p>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-lg-4 text-center">
                                                    <div class="b-sh">
                                                        <div class="said-img">
                                                            <img src="lib/img/said-1.svg" alt="">
                                                        </div>
                                                        <h4>Salah Khattab</h4>
                                                        <p>من أجمل المواقع لشراء البطاقات من أجمل المواقع لطلب المشاريع بكل</p>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 text-center">
                                                    <div class="b-sh">
                                                        <div class="said-img">
                                                            <img src="lib/img/said-2.svg" alt="">
                                                        </div>
                                                        <h4>Salah Khattab</h4>
                                                        <p>من أجمل المواقع لشراء البطاقات من أجمل المواقع لطلب المشاريع بكل</p>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 text-center">
                                                    <div class="b-sh">
                                                        <div class="said-img">
                                                            <img src="lib/img/said-3.svg" alt="">
                                                        </div>
                                                        <h4>Salah Khattab</h4>
                                                        <p>من أجمل المواقع لشراء البطاقات من أجمل المواقع لطلب المشاريع بكل</p>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-lg-4 text-center">
                                                    <div class="b-sh">
                                                        <div class="said-img">
                                                            <img src="lib/img/said-1.svg" alt="">
                                                        </div>
                                                        <h4>Salah Khattab</h4>
                                                        <p>من أجمل المواقع لشراء البطاقات من أجمل المواقع لطلب المشاريع بكل</p>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 text-center">
                                                    <div class="b-sh">
                                                        <div class="said-img">
                                                            <img src="lib/img/said-2.svg" alt="">
                                                        </div>
                                                        <h4>Salah Khattab</h4>
                                                        <p>من أجمل المواقع لشراء البطاقات من أجمل المواقع لطلب المشاريع بكل</p>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 text-center">
                                                    <div class="b-sh">
                                                        <div class="said-img">
                                                            <img src="lib/img/said-3.svg" alt="">
                                                        </div>
                                                        <h4>Salah Khattab</h4>
                                                        <p>من أجمل المواقع لشراء البطاقات من أجمل المواقع لطلب المشاريع بكل</p>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-lg-4 text-center">
                                                    <div class="b-sh">
                                                        <div class="said-img">
                                                            <img src="lib/img/said-1.svg" alt="">
                                                        </div>
                                                        <h4>Salah Khattab</h4>
                                                        <p>من أجمل المواقع لشراء البطاقات من أجمل المواقع لطلب المشاريع بكل</p>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 text-center">
                                                    <div class="b-sh">
                                                        <div class="said-img">
                                                            <img src="lib/img/said-2.svg" alt="">
                                                        </div>
                                                        <h4>Salah Khattab</h4>
                                                        <p>من أجمل المواقع لشراء البطاقات من أجمل المواقع لطلب المشاريع بكل</p>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 text-center">
                                                    <div class="b-sh">
                                                        <div class="said-img">
                                                            <img src="lib/img/said-3.svg" alt="">
                                                        </div>
                                                        <h4>Salah Khattab</h4>
                                                        <p>من أجمل المواقع لشراء البطاقات من أجمل المواقع لطلب المشاريع بكل</p>
                                                        <div class="star">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-1">
                                <a class="carousel-control-prev" href="#carouselExampleControls-3" role="button" data-slide="prev">
                                    <span class="arow-s-l arow-s" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls-3" role="button" data-slide="next">
                                    <span class="arow-s-r arow-s" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 login100-pic js-tilt" data-tilt><img class="w-100" src="lib/img/said-about.svg" alt=""></div>
                </div>
            </div>
        </section>
        <section class="our-goals" id="our-goals">
            <div class="shape">
                <div class="container">
                    <div class="co-p">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="text-right"><span class="text-con"> اهدافنا </span><span class="text-c-y"></span></h5>
                                <ul>
                                    <li>
                                        <p><span></span> دعم أصحاب وثيقة العمل الحر من وزارة الموارد البشرية والتنمية الاجتماعية</p>
                                    </li>
                                    <li>
                                        <p><span></span> تقديم عدة خيارات للخدمات المقدمة للعملاء بأسعار مميزة</p>
                                    </li>
                                    <li>
                                        <p><span></span> توفير منصة متكاملة لتقديم خدمات شركاء الشغف</p>
                                    </li>
                                    <li>
                                        <p><span></span> تسهيل التواصل بين شركاء وعملاء منصة شغف</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-4 login100-pic js-tilt" data-tilt>
                                <img class="fw-img" src="lib/img/our-goals-1.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-us" id="contact-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h5 class="text-right"><span class="text-con">تواصل معنا</span><span class="text-c"></span></h5>
                        <img class="fw-img login100-pic js-tilt" data-tilt src="lib/img/contact-us.svg" alt="">
                    </div>
                    <div class="col-lg-4 contact-us-f-t">
                        <div class="contact-us-f">
                            <span>عندك سؤال ؟</span>
                            <h2>تواصل معنا</h2>
                            <form>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="اسمك">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="البريد الاكتروني">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="الموضوع">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="نص الرسالة" id="exampleFormControlTextarea1" rows="4"></textarea>
                                        </div>
                                        <button type="submit" class="btn"><img src="lib/img/mail-send.svg" alt=""> ارسال</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-1 login100-pic js-tilt" data-tilt><img src="lib/img/test-1.svg" alt=""></div>
                </div>
            </div>
        </section>
    </div>
    <?php include('layout/footer.php') ?>
    <!-- Java script lib-->
    <?php include('layout/script.php') ?>
</body>

</html>
