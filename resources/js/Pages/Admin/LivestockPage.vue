<template>
    <div class="q-pl-xl q-pr-xl">
        <div class="row">
        </div>

        <q-table
            flat bordered
            title="Livestock"
            :rows="livestockList"
            :columns="columns"
            row-key="name"
            :pagination="initialPagination"
        >
            <template v-slot:top-right>
                <q-btn
                    outline
                    rounded
                    label="Add Livestock"
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
                    <q-toolbar-title><span class="text-weight-bold"> Kharif Crops</span></q-toolbar-title>
                    <q-btn flat round dense icon="close" v-close-popup/>
                </q-toolbar>
                <q-card-section>
                    <form @submit.prevent="submit" method="POST">
                        <div class="q-pa-md">
                            <div class="q-gutter-x-md column" >
                                <q-input
                                    name="name"
                                    standout
                                    v-model="form.livestock_name"
                                    :error="!form.errors.livestock_name===false"
                                    :error-message="form.errors.livestock_name"
                                    dense
                                    placeholder="Livestock Name *">
                                    <template v-slot:prepend>
                                        <q-icon name="add" />
                                    </template>
                                </q-input>
                                <q-btn label="Submit" dense color="black" type="submit"
                                       :disable="form.processing"/>
                            </div>
                        </div>
                    </form>
                </q-card-section>
            </q-card>

        </q-dialog>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import {useQuasar} from "quasar";
import {router, useForm} from "@inertiajs/vue3";

const q=useQuasar();
const props=defineProps({
    'livestock':[]
});
const livestockList=ref(props.livestock);
const isEdit=ref(false);
const modal=ref(false);
const columns = [
    {name: 'id', align: 'left', label: 'ID', field: 'id'},
    {name: 'livestock_name', align: 'left', label: 'Livestock Name', field: 'livestock_name'},
    {name: 'actions', align: 'right', label: 'Actions', field: 'id'}
]
const form=useForm({
    id:0,
    livestock_name:'',
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
        form.post(route('livestock.store'),{
            onStart:()=>q.loading.show(),
            onSuccess:()=>{
                form.reset();
                livestockList.value=props.livestock
                q.notify({
                    message:'Livestock created',
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
            onFinish:()=>q.loading.hide()
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
        router.delete(route('livestock.destroy',id),
            {
                onStart:()=>q.loading.show({message:'Deleting....'}),
                onSuccess:()=>{
                    q.notify({
                        message:'Livestock deleted',
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
