import {defineStore} from "pinia";
import {ref} from 'vue';
export const AdminStore=defineStore('AdminStore',{
    state:()=>({
        searchFarmerText:ref(''),
        tabs:ref('dashboard'),
        supervisorFilterBy:'',
        filterBy:'',
    }),
    getters:()=>{},
    actions:()=>{}
})
