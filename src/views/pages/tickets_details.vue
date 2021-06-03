<template>
  <add_ticket></add_ticket>
  <div class="wrapper">
    <div class="container">
      <div class="financial-operations sevice-user orders orders-2 add-orders">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item" aria-current="page">الشكاوي والإقتراحات</li>
            <li class="breadcrumb-item active" aria-current="page">تفاصيل التذكرة</li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-12">
            <div class="chat-l">
              <div class="row">
                 <div class="col-lg-12">
                   <div class="col-lg-12 m-litter">
                    <div class="col-lg-6 mb-3 ml-lang">
                      <p class=" ch-messsage">{{ Ticket.message}}</p>
                      <span>{{ Ticket.created_at }}</span>
                    </div>
                  </div>
                   <div class="col-lg-12" v-for="(reply, index) in Replies" :key="index" :class="{'l-litter' : (reply.sender_type == 2) , 'm-litter' : (reply.sender_type != 2)}">
                    <div class="col-lg-6 mb-3"  :class="{'mr-lang' : (reply.sender_type == 2) , 'ml-lang' : (reply.sender_type != 2)}">
                      <p class=" ch-messsage">{{ reply.response}}</p>
                      <span>{{ reply.created_at }}</span>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="ml-0 mr-0">
              <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-1 d-flex-chat p-0 chat-button" v-on:click.prevent="sendReply()">
                  <button type="submit">
                    <i class="fas fa-paper-plane"></i>
                  </button>
                </div>
                <div class="col-lg-10 p-0">
                  <form>
                    <div class="write-m-chat">
                      <label style="display:none" for="typing"></label>
                      <textarea class="form-control" id="typing" rows="3" placeholder="كتابة رد" v-model="response"></textarea>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  </div>
</template>
<script>
import axios from "axios";
import add_ticket from "@/components/modals/add_ticket";
import url from '../../main';
import Swal from "sweetalert2";
export default {
  name: 'tickets_details',
  components:{
    add_ticket,
  },
  data(){
    return{
      Replies:[],
      Ticket: null,
      response: '',
      ticket_id: null,
      perPage: 5,
      pages: [],
    }
  },
  created() {
    this.fetchTicket();
  },
  methods:{
    fetchTicket(){
      try {
        this.ticket_id = sessionStorage.getItem('ticket_id');
        const token = sessionStorage.getItem('access_token_1');
        axios.get(url+'/api/tickets/show',
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar'
              },
              params: {
                ticket_id: this.ticket_id,
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.Ticket = res.data['Ticket'];
                this.Replies = this.Ticket['TicketResponses']
                console.log(res.data);
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
    sendReply(){
      try {
        const token = sessionStorage.getItem('access_token_1');
        axios.post(url+'/api/tickets/response',
            {
              ticket_id: this.ticket_id,
              response: this.response,
            },
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.response = '';
                Swal.fire(
                    res.data['status']['status'],
                    'تم الحفظ بنجاح',
                    'success'
                );
                this.fetchTicket();
              } else {
                Swal.fire(
                    res.data['status']['status'],
                    'خطأ في البيانات المدخلة',
                    'error'
                );
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
