<template>
  <form :action="url+'/#/paymentStatus'" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>
</template>
<script>

export default {
  data(){
    return{
      url: 'https://passionplatforms.com'
    }
  },
  created() {
    (function(){
      let wpwl = wpwl || {};

      // timestamp
      wpwl.timestamp = new Date().toUTCString();

      // paymentWidgets.js request
      wpwl.minified = true;

      // environment
      wpwl.apiVersion = "1";

      // ndc
      wpwl.ndc = sessionStorage.getItem('payment_token');

      // checkout
      wpwl.checkout = {"id":sessionStorage.getItem('payment_token'),"amount": sessionStorage.getItem('amount'),"currency":"SAR","paymentType":"DB","config":{"brandConfig":{"brands":["MASTER","PAYPAL","VISA"],"overrideShopBrands":false,"activateBrands":false},"registrations":[],"detectIp":true,"redShieldDeviceIdInMsdkActive":false,"cnpCofDefaultSi":false,"cnpUpdateEntireCartAndPayments":false,"overrideHolder":false,"threeDSecureV2Config":{"visaThreeDV2":false,"masterThreeDV2":false,"amexThreeDV2":false,"bcmcThreeDV2":false,"dinersThreeDV2":false,"jcbThreeDV2":false,"cartebancaireThreeDV2":false,"dankortThreeDV2":false},"environmentConfig":{"url":"https://live.oppwa.com","defaultPaymentMode":"INTEGRATOR_TEST","cacheVersion":"791790407db4b97af135600458b36839"},"workflowSpecificConfig":{"aliRiskConfig":{"active":false,"aliRiskParameters":{"clientAppName":"PAY.ON"}},"kountConfig":{"active":false,"merchantId":"620000","sessionId":"","baseUrl":"https://tst.kaptcha.com/"},"cyberSourceRiskManagementConfig":{"active":false,"merchantId":"","organizationId":"","collectDeviceId":false,"sessionId":"","srcUrl":""},"iovationConfig":{"active":false,"msdkActive":false},"affirmConfig":{"active":true,"publicKey":"LSPX794KJH15TSZV"},"forterConfig":{"active":false,"siteId":"","sessionId":"002D06C78A5FD7ACCEBC515889FF5574.uat01-vm-tx02"},"klarnaConfig":{"redirectIfWidgetCloses":true}},"klarnaMerchantIds":["123456","129"],"paypalRestConfig":{"clientId":"ATpyeyrXd-zV-Zgqr51eo5es72xydmmjYJ-prXLOYLO2aDDG0xJb2S5JHkL-1N37Ejb-ih9LYSiVN2xC","merchantId":"35V2XSZLMCWBY"},"customRedirectPageConfig":{"customRedirectMessage":"You are being redirected. If this doesn`t happen, please","messageFontType":"","messageFontSize":"10","messageFontColor":"#000000","customHyperlinkText":"Click here to continue","hyperlinkFontType":"","hyperlinkFontSize":"10","hyperlinkFontColor":"#005ab6","backgroundColor":"#fdfefe","redirectMessageDelayed":"0","disableSpinner":"false","customSpinner":""},"sendShippingBillingKlarnaClientSide":false,"merchant":{},"createRegistration":false,"amazonpayConfig":{}},"endpoint":"/payment","resourcePath":"/v1/checkouts/"+sessionStorage.getItem('payment_token')+"/payment"};

      // expose wpwl to global
      window.wpwl = wpwl;

      // load static files async

      (function (d, t, w, s, j) {
            s = d.createElement(t);
            j = d.getElementsByTagName(t)[1];
            let e = w.checkout.config.environmentConfig;
            s.src = [e.url, "/v", w.apiVersion, "/static/", e.cacheVersion, "/js/static", w.minified ? ".min" : "", ".js"].join("");
            s.async = true;
            if (j.parentNode){
              j.parentNode.insertBefore(s,j);
            }else {
              console.log('error');
            }
          }(document, "script", wpwl)
      );

    }());
  },
}

</script>
<style>
.wpwl-container{
  padding: 20px;
  background-color: white;
}
</style>



