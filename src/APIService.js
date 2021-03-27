
import axios from 'axios';
const API_URL = 'https://app.passionplatforms.com';
export class APIService{

    constructor(){
    }
    register() {
        const url = `${API_URL}/api/auth/register`;
        return axios.get(url).then(response => response.data['User']);
    }
    login(){
        const url = `${API_URL}/api/auth/login`;
        return axios.post(url, {
            headers:{
                'X-localization': 'ar',
            },
            params:{
                'mobile': this.mobile,
                'password': this.password,
            }
        }).then(res=>{
                if(res.data['status']['status']== "success"){
                    this.User = res.data['User'];
                    console.log(res.data['status']['status']);
                }else {
                    console.log('error');
                }
        }).catch(e => {
                this.errors.push(e);
            });
    }
}
