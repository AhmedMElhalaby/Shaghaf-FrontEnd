<template>
    <section class="contact-us" id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 for-ltr">
                    <h5 class="text-right"><span class="text-con">تواصل معنا</span><span class="text-c"></span></h5>
                    <img class="fw-img login100-pic js-tilt" v-tilt data-tilt src="../../../assets/img/contact-us.svg" alt="">
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
                                    <button type="submit" class="btn"><img src="../../../assets/img/mail-send.svg" alt=""> ارسال</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-1 login100-pic js-tilt" data-tilt><img src="../../../assets/img/test-1.svg" alt=""></div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
}
</script>
