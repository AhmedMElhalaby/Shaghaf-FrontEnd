<template>
  <div class="wrapper">
    <div class="container">
      <section class="chats">
        <div class="row">
          <div class="col-lg-4">
            <div class="chat-r">
              <div v-for="(room,index) in Rooms" :key="index" class="col-lg-12 chat-cur" v-on:click.prevent="getUserId(room.User['id']);getRoomId(room.id);openChat(room.User['id']);refreshRoom(); fetchMessages(room.id)">
                <div class="row">
                  <div class="col-lg-3">
                    <img class="b-r-half circle-img" :src="(room.User)? room.User.avatar : '' " alt="">
                  </div>
                  <div class="col-lg-9 chat-p">
                    <h4>{{ room.User['name'] }}</h4>
                    <p>{{ room.latest_message }}</p>
                  </div>

                </div>
                <hr>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="chat-l">
              <div class="row">
                <div class="col-lg-12 chat-cur pb-5">
                  <div class="row">
                    <div class="col-lg-10 m-lang chat-p">
                      <img class="col-lg-2 b-r-half circle-img" :src="(chatRoom.User)? chatRoom.User.avatar : '' " alt="avatar">
                      <h4>{{ (chatRoom.User)? chatRoom.User.name : ''}}</h4>
                    </div>
                  </div>
                  <hr class="ml-0 mr-0">
                </div>
                <div class="col-lg-12">
                  <div class="col-lg-12 showMore">
                    <a class="paginate" @click="page++; showMoreMessages()"> عرض الرسائل السابقة </a>
                  </div>
                  <div class="col-lg-12" v-for="(message, index) in Messages" :key="index" :class="{'l-litter' :message.user_id === user_id , 'm-litter' : message.user_id !== user_id}">
                    <div class="col-lg-6 mb-3 ml-lang">
                      <p v-if="message.type === 1" class=" ch-messsage">{{ (message)?message.message: ''}}</p>
                      <img v-if="message.type === 3" :src="'http://18.194.157.202/'+ message.message" >
                      <audio controls v-if="message.type === 2">
                        <source :src="'http://18.194.157.202/' + message.message" type="audio/mpeg">
                        Your browser does not support the audio element.
                      </audio>
                      <p class="ch-messsage" v-show="message.type === 4">
                        <a :href="'http://18.194.157.202/'+message.message" :src="'http://18.194.157.202/'+message.message" style="overflow-wrap: anywhere">
                          {{ message.message }}</a>
                      </p>
                      <span>{{ message.created_at }}</span>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="ml-0 mr-0">
              <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-1 d-flex-chat p-0 chat-button" v-on:click.prevent="sendMessage()">
                  <button type="submit">
                    <i class="fas fa-paper-plane"></i>
                  </button>
                </div>
                <div class="col-lg-7 p-0">
                  <form>
                    <div class="write-m-chat">
                      <label style="display:none" for="typing"></label>
                      <textarea class="form-control" id="typing" rows="3" placeholder="كتابة رسالة" v-model="message" :v-modal="type = 1"></textarea>
                    </div>
                  </form>
                </div>
                <div class="col-lg-1 d-flex-chat upload-voice">
                  <a>
                    <i class="fas fa-microphone">
                      <audio-player></audio-player>
                    </i>
                  </a>
                </div>
                <div class="col-lg-1 d-flex-chat chat-upload-img">
                  <form>
                    <label for="file">
                      <i class="fas fa-images"></i>
                    </label>
                    <input id="file" style="display: none" type="file" ref="file" v-on:change="sendFile()"><br>
                    <img src="" style="display: none" height="200" alt="Image preview...">
                  </form>
                </div>
                <div class="col-lg-1"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import Pusher from 'pusher-js';
import {mapState} from "vuex";
import url from '../../main';
export default {
  name : 'chats',
  data(){
    return{
      Rooms:[],
      Messages:[],
      chatRoom:[],
      room_id: '',
      message:'',
      type : '',
      file :'',
      pusher : null,
      channel :null,
      chat_room_id: sessionStorage.getItem('room_id'),
      user_id:'',
      page: 1,
      perPage: 5,
      pages: [],
    }
  },
  computed:{
    ...mapState({
    }),
    displayedPosts () {
      return this.paginate(this.Messages);
    }
  },
  created() {
    this.fetchRooms();
    this.fetchMessages();
    /********** Pusher *************/
    try {
      Pusher.logToConsole = true;
      let pusher = new Pusher('da99af9260d89f306342', {
        cluster: 'ap1'
      });
      let that = this;
      this.channel = pusher.subscribe("chat_room." + this.chat_room_id + ".new_message");
      this.channel.bind('CreateMessageEvent', function(data) {
        that.Messages.push(data.message);
      });
    }catch (e){
      console.log(e);
    }
  },
  methods: {
    fetchRooms() {
      try {
        const token = sessionStorage.getItem('access_token_1');
        axios.get(url + '/api/chats/rooms',
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              },
              params: {
                per_page: 10
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.Rooms = res.data['ChatRooms'];
              } else {
                console.log();
              }
            })
            .catch(e => {
              console.log(e);
            })
      } catch (e) {
        console.log(e);
      }
    },
    openChat(user_id) {
      try {
        const user_type = sessionStorage.getItem('user_type');
        if (user_type === '1') {
          this.user_id = sessionStorage.getItem('freelancer_id');
        } else {
          this.user_id = sessionStorage.getItem('customer_id');
        }
        const token = sessionStorage.getItem('access_token_1');
        axios.post(url + '/api/chats/rooms/create',
            {
              user_id: user_id,
            },
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.chatRoom = res.data['ChatRoom'];
              } else {
                console.log();
              }
            })
            .catch(e => {
              console.log(e);
            })
      } catch (e) {
        console.log(e);
      }
    },
    getMessage(data) {
      this.Messages.push(data);
    },
    fetchMessages() {
      try {
        console.log(this.room_id);
        const token = sessionStorage.getItem('access_token_1');
        axios.get(url + '/api/chats/rooms/messages',
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              },
              params: {
                chat_room_id: sessionStorage.getItem('room_id'),
                page: this.page,
                per_page: 5
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                this.Messages = res.data['ChatRoomMessages'].reverse();
                // res.data['ChatRoomMessages'].forEach(message=>this.Messages.push(message)).unshift();
              } else {
                console.log();
              }
            })
            .catch(e => {
              console.log(e);
            })
      } catch (e) {
        console.log(e);
      }
    },
    sendMessage() {
      try {
        const token = sessionStorage.getItem('access_token_1');
        axios.post(url + '/api/chats/rooms/messages/create',
            {
              'chat_room_id': sessionStorage.getItem('room_id'),
              'type': this.type,
              'message': this.message,
            },
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                console.log();
              } else {
                console.log();
              }
            })
            .catch(e => {
              console.log(e);
            })
      } catch (e) {
        console.log(e);
      }
    },
    sendFile() {
      try {
        let file = this.$refs.file.files[0];
        let formData = new FormData();
        formData.append('message', file);
        console.log(file);
        if (file.type === "image/png") {
          this.type = 3;
          console.log(this.type);
        } else {
          this.type = 4;
          console.log(this.type);
        }
        formData.append('type', this.type);
        formData.append('chat_room_id', sessionStorage.getItem('room_id'));
        const token = sessionStorage.getItem('access_token_1');
        axios.post(url + '/api/chats/rooms/messages/create',
            formData,
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                console.log();
              } else {
                console.log();
              }
            })
            .catch(e => {
              console.log(e);
            })
      } catch (e) {
        console.log(e)
      }
    },
    previewFile() {
      try {
        const preview = document.querySelector('img');
        const file = document.querySelector('input[type=file]').files[0];
        const reader = new FileReader();
        reader.addEventListener("load", function () {
          // convert image file to base64 string
          preview.src = reader.result;
        }, false);
        if (file) {
          reader.readAsDataURL(file);
        }
        const token = sessionStorage.getItem('access_token_1');
        axios.post(url + '/api/chats/rooms/messages/create',
            {
              'chat_room_id': this.room_id,
              'type': this.type,
              'message': file,
            },
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                console.log();
              } else {
                console.log();
              }
            })
            .catch(e => {
              console.log(e);
            })
      } catch (e) {
        console.log(e);
      }
    },
    getUserId(user_id) {
      sessionStorage.setItem('user_id', user_id);
    },
    getRoomId(room_id) {
      sessionStorage.setItem('room_id', room_id);
    },
    setPages() {
      this.pages = [];
      let numberOfPages = Math.ceil(this.Messages.length / this.perPage);
      for (let index = 1; index <= numberOfPages; index++) {
        this.pages.push(index);
      }
    },
    paginate(Messages) {
      let page = this.page;
      let perPage = this.perPage;
      let from = (page * perPage) - perPage;
      let to = (page * perPage);
      return Messages.slice(from, to);
    },
    showMoreMessages() {
      try {
        console.log(this.room_id);
        const token = sessionStorage.getItem('access_token_1');
        axios.get(url + '/api/chats/rooms/messages',
            {
              headers: {
                'Authorization': 'Bearer ' + token,
                'X-localization': 'ar',
              },
              params: {
                chat_room_id: sessionStorage.getItem('room_id'),
                page: this.page,
                per_page: 5
              }
            })
            .then(res => {
              if (res.data['status']['status'] === "success") {
                //this.Messages = [];
                res.data['ChatRoomMessages'].forEach(message => this.Messages.unshift(message));
              } else {
                console.log();
              }
            })
            .catch(e => {
              console.log(e);
            })
      } catch (e) {
        console.log(e);
      }
    },
    refreshRoom(){
      this.Messages=[];
      this.page = 1;
    }
  },
  watch: {
    Messages () {
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
.showMore{
  margin-bottom: 20px;
}
a.paginate:hover{
  text-decoration: underline;
}
.circle-img{
  width: 50px;
  height: 50px;
}
</style>