<template>
  <add_ticket></add_ticket>
  <div class="wrapper">
    <div class="container">
      <div class="financial-operations sevice-user orders orders-2 add-orders">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">الشكاوي والإقتراحات</li>
          </ol>
        </nav>
        <!-- start navs section -->
        <div class="row">
          <div class="col-lg-10"></div>

          <div class="col-lg-2">
            <button type="submit" class="btn" data-toggle="modal" data-target="#add_ticket"  aria-label="Close" data-dismiss="modal">اضافة تذكرة جديدة</button>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 p-balance">
              <div class="balance balance-op row" v-for="(ticket, index) in Tickets" :key="index">
                <div class="col-lg-10">
                  <span>  {{ ticket['title'] }} : <span>{{ ticket['status_str'] }}</span></span>
                  <p class="balance-op-p">{{ ticket['message'] }} </p>
                </div>
                <div class="col-lg-2 balance-op-link">
                  <router-link ref="link" v-on:click="getTicketId(ticket['id'])" to="/tickets/show" style="cursor: pointer" ><i class="fas fa-chevron-left"></i></router-link>
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
                    <button type="button" class="page-link" v-if="page !== 1" @click="page--; fetchTickets()"> Previous </button>
                  </li>
                  <li class="page-item">
                    <button type="button" class="page-link" v-for="(pageNumber, index) in pages.slice(page-1, page+5)" :key="index" @click="page = pageNumber; fetchTickets()"> {{pageNumber}} </button>
                  </li>
                  <li class="page-item">
                    <button type="button" @click="page++; fetchTickets()" v-if="page < pages.length" class="page-link"> Next </button>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="col-lg-4"></div>
          </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import add_ticket from "@/components/modals/add_ticket";
import url from '../../main';
export default {
  name: 'tickets',
  components:{
    add_ticket,
  },
  data(){
    return{
      Tickets:[],
      page: 1,
      perPage: 5,
      pages: [],
    }
  },
  created() {
    this.fetchTickets();
  },
  methods:{
    fetchTickets(){
      try {
        const token = sessionStorage.getItem('access_token_1');
        axios.get(url+'/api/tickets',
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
                this.Tickets = res.data['Tickets'];
                console.log(res.data);
              } else {
                console.log(this.Tickets);
              }
            })
            .catch(e => {
              console.log(e);
            })
      }catch (e){
        console.log(e);
      }
    },
    setPages () {
      this.pages = [];
      let numberOfPages = Math.ceil(this.Tickets.length / this.perPage);
      for (let index = 1; index <= numberOfPages; index++) {
        this.pages.push(index);
      }
    },
    paginate (Tickets) {
      let page = this.page;
      let perPage = this.perPage;
      let from = (page * perPage) - perPage;
      let to = (page * perPage);
      return  Tickets.slice(from, to);
    },
    getTicketId(ticket_id){
      sessionStorage.setItem('ticket_id', ticket_id);
    }
  },
  computed: {
    displayedPosts () {
      return this.paginate(this.Tickets);
    }
  },
  watch: {
    Tickets () {
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
