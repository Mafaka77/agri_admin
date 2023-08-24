import {defineStore} from "pinia";
import {ref} from 'vue';
export const AdminStore=defineStore('AdminStore',{
    state:()=>({
        searchFarmerText:ref('')
    }),
    getters:()=>{},
    actions:()=>{}
})
