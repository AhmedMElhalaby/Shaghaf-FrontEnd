<template>
  <collection_request></collection_request>
  <deposit></deposit>
  <div class="wrapper">
    <div class="container">
      <div class="financial-operations">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">عملياتي المالية</li>
          </ol>
        </nav>
        <!-- start navs section -->
        <div class="row d-flex justify-content-center">
          <div class="modal-tab col-3">
            <ul class="nav nav-pills mb-3 list-con row" id="pills-tab" role="tablist">
              <li class="nav-item col-6">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" v-on:click.prevent="fetchBalance()">رصيدي</a>
              </li>
              <li class="nav-item col-6">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#transaction" role="tab" aria-controls="pills-profile" aria-selected="false" v-on:click.prevent="fetchTransaction()">عملياتي المالية</a>
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
                      <p>{{ Balance['AvailableBalance'] }}</p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="balance">
                      <h5>الرصيد المعلق</h5>
                      <p>{{ Balance['HeldBalance'] }}</p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="balance">
                      <h5>الرصيد الكلي</h5>
                      <p>{{ Balance['TotalBalance'] }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2"></div>
            </div>
            <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-2">
                <button type="submit" class="btn" data-toggle="modal" data-target="#exampleModalCenter-11"  aria-label="Close" data-dismiss="modal">طلب تحصيل</button>
              </div>
              <div class="col-lg-2">
                <button type="submit" class="btn" data-toggle="modal" data-target="#deposit"  aria-label="Close" data-dismiss="modal">ايداع</button>
              </div>
              <div class="col-lg-4"></div>
            </div>
          </div>

          <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
              <div class="col-lg-3"></div>
              <div class="col-lg-6 p-balance">
                <div class="balance balance-op row" v-for="(transaction, index) in Transactions" :key="index">
                  <div class="col-lg-10">
                    <i class="fas fa-arrow-down"></i>
                    <span>  {{ transaction['value'] }} ريال سعودي</span>
                    <p class="balance-op-p">{{ transaction['type_str'] }} : <span>{{ transaction['status_str'] }}</span></p>
                  </div>
                  <div class="col-lg-2 balance-op-link">
                    <a><i class="fas fa-chevron-left"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3"></div>
            </div>
            <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-4">
                <nav aria-label="Page financial example">
                  <ul class="pagination">
                    <li class="page-item">
                      <button type="button" class="page-link" v-if="page !== 1" @click="page--; fetchTransaction()"> Previous </button>
                    </li>
                    <li class="page-item">
                      <button type="button" class="page-link" v-for="(pageNumber, index) in pages.slice(page-1, page+5)" :key="index" @click="page = pageNumber; fetchTransaction()"> {{pageNumber}} </button>
                    </li>
                    <li class="page-item">
                      <button type="button" @click="page++; fetchTransaction()" v-if="page < pages.length" class="page-link"> Next </button>
                    </li>
                  </ul>
                </nav>
              </div>
              <div class="col-lg-4"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import collection_request from "@/components/modals/collection_request";
import axios from "axios";
import deposit from "@/components/modals/deposit";
import url from '../../main';
export default {
  name: 'financial',
  components:{
    collection_request,
    deposit,
  },
  data(){
    return{
      Balance:[],
      Transactions:[],
      page: 1,
      perPage: 5,
      pages: [],
    }
  },
  created() {
    this.fetchBalance();
    this.fetchTransaction();
  },
  methods:{
    fetchBalance(){
      try {
        const token = sessionStorage.getItem('access_token_1');
        axios.get(url+'/api/transactions/my_balance',
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar'
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.Balance = res.data['Balance'];
              } else {
                console.log();
              }
            })
            .catch(e => {
              console.log(e);
            })
      }catch (e){
        console.log(e);
      }
    },
    fetchTransaction(){
      try {

        const token = sessionStorage.getItem('access_token_1');
        axios.get(url+'/api/transactions',
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar'
              },
              params: {
                page: this.page,
                per_page: 10
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.Transactions = res.data['Transactions'];
              }else {
                console.log();
              }
            })
            .catch(e => {
              console.log(e);
            })
      }catch (e) {
        console.log(e);
      }
    },
    setPages () {
      this.pages = [];
      let numberOfPages = Math.ceil(this.Transactions.length / this.perPage);
      for (let index = 1; index <= numberOfPages; index++) {
        this.pages.push(index);
      }
    },
    paginate (Transactions) {
      let page = this.page;
      let perPage = this.perPage;
      let from = (page * perPage) - perPage;
      let to = (page * perPage);
      return  Transactions.slice(from, to);
    },
  },
  computed: {
    displayedPosts () {
      return this.paginate(this.Transactions);
    }
  },
  watch: {
    Transactions () {
      this.setPages();
    }
  },
  filters: {
    trimWords(value){
      return value.split(" ").splice(0,20).join(" ") + '...';
    }
  }
}
</script>
<style>
button.page-link {
  display: inline-block;
}
button.page-link {
  font-size: 14px;
  color: black;
  font-weight: 500;
}
.offset{
  width: 500px !important;
  margin: 20px auto;
}
</style>