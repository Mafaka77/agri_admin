<template>
    <div class=" container row ">
        <div class="col-xs-12 col-md-12">
        <q-table
            flat bordered
            title="User Controls"
            :rows="userList"
            :columns="columns"
            row-key="name"
            :pagination="initialPagination"
        >
            <template v-slot:top-right>
                <q-btn
                    outline
                    rounded
                    label="Add User"
                    dense
                    flat
                    class="text-white q-px-lg q-mx-lg"
                    style="background-color:#2e6525 "
                    @click="openAddModal"
                />
            </template>
            <template v-slot:body-cell-actions="props">
                <q-td :props="props">
                    <q-btn
                        dense
                        round
                        flat
                        @click="openEditModal(props.row)"
                        icon="edit"
                        style="color: #2e6525"
                    ></q-btn>
                    <q-btn
                        dense
                        round
                        flat
                        color="red"
                        @click="deleteLivestock(props.row.id)"
                        icon="delete"
                    ></q-btn>
                </q-td>
            </template>
        </q-table>
        <q-dialog v-model="modal">
            <q-card>
                <q-toolbar>
                    <q-toolbar-title><span class="text-weight-bold"> User</span></q-toolbar-title>
                    <q-btn flat round dense icon="close" v-close-popup/>
                </q-toolbar>
                <q-card-section>
                    <form @submit.prevent="submit" method="POST">
                        <div class="q-pa-sm">
                            <div class="q-gutter-x-md column" >
                                <q-input
                                    name="name"
                                    standout
                                    v-model="form.name"
                                    :error="!form.errors.name===false"
                                    :error-message="form.errors.name"
                                    dense
                                    placeholder="Name *">

                                </q-input>
                                <q-input
                                    name="email"
                                    standout
                                    v-model="form.email"
                                    :error="!form.errors.email===false"
                                    :error-message="form.errors.email"
                                    dense
                                    placeholder="Email *">
                                </q-input>
                                <q-input
                                    name="password"
                                    standout
                                    v-model="form.password"
                                    :error="!form.errors.password===false"
                                    :error-message="form.errors.password"
                                    dense
                                    placeholder="Password *">
                                </q-input>
                                <q-select v-model="form.district_id" :error="!form.errors.district_id === false"
                                          :error-message="form.errors.district_id" :options="districtList" dense emit-value
                                          fill-input filled hide-selected map-options option-label="district_name" option-value="id"
                                          placeholder="Select District *" standout use-input>
                                    <template v-slot:prepend>
                                        <q-icon name="book" />
                                    </template>
                                    <template v-slot:no-option>
                                        <q-item>
                                            <q-item-section class="text-gresy">
                                                No results
                                            </q-item-section>
                                        </q-item>
                                    </template>
                                </q-select>
                                <q-select v-model="form.roles_id" :error="!form.errors.roles_id === false"
                                          :error-message="form.errors.roles_id" :options="roleList" dense emit-value
                                          fill-input filled hide-selected map-options option-label="name" option-value="id"
                                          placeholder="Select Role *" standout use-input>
                                    <template v-slot:prepend>
                                        <q-icon name="book" />
                                    </template>
                                    <template v-slot:no-option>
                                        <q-item>
                                            <q-item-section class="text-gresy">
                                                No results
                                            </q-item-section>
                                        </q-item>
                                    </template>
                                </q-select>
                                <q-btn label="Submit" dense color="black" type="submit"
                                       :disable="form.processing"/>
                            </div>
                        </div>
                    </form>
                </q-card-section>
            </q-card>

        </q-dialog>
        </div>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import {useQuasar} from "quasar";
import {router, useForm} from "@inertiajs/vue3";

const q=useQuasar();
const props=defineProps({
    'users':[],
    'districts':[],
    'roles':[],
});
const userList=props.users;
const districtList=props.districts;
const roleList=props.roles;
const isEdit=ref(false);
const modal=ref(false);
const columns = [
    // {name: 'id', align: 'left', label: 'ID', field: 'id'},
    {name: 'user_name', align: 'left', label: 'User Name', field: 'name'},
    {name: 'email', align: 'left', label: 'Email', field: 'email'},
    {name: 'role_name', align: 'left', label: 'Role Name', field: (e)=>e.roles.name},
    {name: 'district_name', align: 'left', label: 'District Name', field: (e)=>e.district.district_name},
    {name: 'actions', align: 'right', label: 'Actions', field: 'id'}
]
const form=useForm({
    id:0,
    name:'',
    email:'',
    password:'',
    roles_id:0,
    district_id:0,
});
const openAddModal=()=>{
    form.reset()
    modal.value=true;
    isEdit.value=false;
}
const openEditModal=(data)=>{
    isEdit.value=true;
    modal.value=true;
    form.id=data.id;
    form.livestock_name=data.livestock_name;
}
const submit=()=>{
    if(isEdit.value===false){
        form.post(route('manage-user.store'),{
            onStart:()=>q.loading.show(),
            onSuccess:()=>{
                form.reset();
                userList.value=props.users
                q.notify({
                    message:'User created',
                    icon:'check',
                    iconColor:'blue',
                    closeBtn:true
                })
            },
            onError:(error)=>{
                console.log(error);
                q.notify({
                    message:error.message,
                    icon:'warning',
                    iconColor:'red',
                    closeBtn:true
                })
            },
            onFinish:()=>q.loading.hide(),
            preserveState:false,
        })
    }else{
        form.put(route('livestock.update',form.id),{
            onStart: () => q.loading.show(),
            onSuccess: () => {
                modal.value = false
                q.notify({
                    message: 'Livestock updated',
                    closeBtn: true,
                    icon: 'check',
                    iconColor: 'blue'
                });
                q.loading.hide()
            },
            onFinish: () => q.loading.hide(),
            preserveState:false
        })
    }
}
const deleteLivestock=(id)=>{
    q.dialog({
        title:'Confirm Delete',
        message:'Are you sure?',
        cancel:'No',
    }).onOk(()=>{
        router.delete(route('manage-user.destroy',id),
            {
                onStart:()=>q.loading.show({message:'Deleting....'}),
                onSuccess:()=>{
                    q.notify({
                        icon:'check',
                        message:'User deleted',
                        closeBtn:true,
                    })
                    q.loading.hide();
                },
                onFinish:()=>q.loading.hide(),
                preserveState: false,
            })
    })
}
</script>

<style scoped>

</style>
