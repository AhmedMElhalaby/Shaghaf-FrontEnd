(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-d7fb2398"],{1123:function(e,t,n){},"6b77":function(e,t,n){"use strict";n.r(t);var i=n("f2bf");function a(e,t,n,a,o,r){return Object(i["t"])(),Object(i["d"])("form",{action:e.url+"/#/paymentStatus",class:"paymentWidgets","data-brands":"VISA MASTER AMEX"},null,8,["action"])}n("a15b");var o={data:function(){return{checkOutId:sessionStorage.getItem("payment_token")}},created:function(){(function(){var e=e||{};e.timestamp=(new Date).toUTCString(),e.minified=!0,e.apiVersion="1",e.ndc=sessionStorage.getItem("payment_token"),e.checkout={id:sessionStorage.getItem("payment_token"),amount:sessionStorage.getItem("amount"),currency:"SAR",paymentType:"DB",config:{brandConfig:{brands:["MASTER","PAYPAL","VISA"],overrideShopBrands:!1,activateBrands:!1},registrations:[],detectIp:!0,redShieldDeviceIdInMsdkActive:!1,cnpCofDefaultSi:!1,cnpUpdateEntireCartAndPayments:!1,overrideHolder:!1,threeDSecureV2Config:{visaThreeDV2:!1,masterThreeDV2:!1,amexThreeDV2:!1,bcmcThreeDV2:!1,dinersThreeDV2:!1,jcbThreeDV2:!1,cartebancaireThreeDV2:!1,dankortThreeDV2:!1},environmentConfig:{url:"https://test.oppwa.com",defaultPaymentMode:"INTEGRATOR_TEST",cacheVersion:"791790407db4b97af135600458b36839"},workflowSpecificConfig:{aliRiskConfig:{active:!1,aliRiskParameters:{clientAppName:"PAY.ON"}},kountConfig:{active:!1,merchantId:"620000",sessionId:"",baseUrl:"https://tst.kaptcha.com/"},cyberSourceRiskManagementConfig:{active:!1,merchantId:"",organizationId:"",collectDeviceId:!1,sessionId:"",srcUrl:""},iovationConfig:{active:!1,msdkActive:!1},affirmConfig:{active:!0,publicKey:"LSPX794KJH15TSZV"},forterConfig:{active:!1,siteId:"",sessionId:"002D06C78A5FD7ACCEBC515889FF5574.uat01-vm-tx02"},klarnaConfig:{redirectIfWidgetCloses:!0}},klarnaMerchantIds:["123456","129"],paypalRestConfig:{clientId:"ATpyeyrXd-zV-Zgqr51eo5es72xydmmjYJ-prXLOYLO2aDDG0xJb2S5JHkL-1N37Ejb-ih9LYSiVN2xC",merchantId:"35V2XSZLMCWBY"},customRedirectPageConfig:{customRedirectMessage:"You are being redirected. If this doesn`t happen, please",messageFontType:"",messageFontSize:"10",messageFontColor:"#000000",customHyperlinkText:"Click here to continue",hyperlinkFontType:"",hyperlinkFontSize:"10",hyperlinkFontColor:"#005ab6",backgroundColor:"#fdfefe",redirectMessageDelayed:"0",disableSpinner:"false",customSpinner:""},sendShippingBillingKlarnaClientSide:!1,merchant:{},createRegistration:!1,amazonpayConfig:{}},endpoint:"/payment",resourcePath:"/v1/checkouts/"+sessionStorage.getItem("payment_token")+"/payment"},window.wpwl=e;try{(function(e,t,n,i,a){i=e.createElement(t),a=e.getElementsByTagName(t)[0];var o=n.checkout.config.environmentConfig;i.src=[o.url,"/v",n.apiVersion,"/static/",o.cacheVersion,"/js/static",n.minified?".min":"",".js"].join(""),i.async=!0,a.parentNode.insertBefore(i,a)})(document,"script",e)}catch(t){console.log(t)}})()}};n("a0e4");o.render=a;t["default"]=o},a0e4:function(e,t,n){"use strict";n("1123")},a15b:function(e,t,n){"use strict";var i=n("23e7"),a=n("44ad"),o=n("fc6a"),r=n("a640"),c=[].join,s=a!=Object,d=r("join",",");i({target:"Array",proto:!0,forced:s||!d},{join:function(e){return c.call(o(this),void 0===e?",":e)}})},a640:function(e,t,n){"use strict";var i=n("d039");e.exports=function(e,t){var n=[][e];return!!n&&i((function(){n.call(null,t||function(){throw 1},1)}))}}}]);
//# sourceMappingURL=chunk-d7fb2398.184ac68e.js.map