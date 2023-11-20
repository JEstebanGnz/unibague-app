import {defineStore} from 'pinia';
import {show_alert} from '@/function';
import axios from "axios";

export const useAuthStore = defineStore('auth',{
    state: () => ({ authUser:null, authToken:null}),
getters:{user:(state)=> state.authUser,
token:(state) => state.authToken},
actions:{
        async getToken(){
            await axios.get('/sanctum/csrf-cookie');

    },
    async login(form){
            await this.getToken();
            await axios.post('/api/auth/login',form).then(
                (res) =>{
                    this.authToken =res.data.token;
                    this.authUser = res.data.data;
                    this.router.push('/departments');
                }
            ).catch(
                (errors) => {
                    let desc = '';
                    errors.response.data.errors.map(
                        (e) => {desc = desc + ' '+e}
                    )
                    show_alert(desc,'error','');
                }
            )
    },
    async register(form){
        await this.getToken();
        await axios.post('/api/auth/register',form).then(
            (res) =>{
                show_alert(res.data.message, 'success','');
                setTimeout( ()=> this.router.push('/login'),2000);
            }
        ).catch(
            (errors) => {
                let desc = '';
                errors.response.data.errors.map(
                    (e) => {desc = desc + ' '+e}
                )
                show_alert(desc,'error','');
            }
        )
    },
    async logout(){
            await axios.get('/api/auth/logout',this.authToken);
            this.authUser =null;
            this.authToken =null;
            this.router.push('/login');
    }
},
    persist:true

});