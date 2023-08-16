<template>
    <div class="q-pl-xl q-pr-xl">
        <div class="row">
        </div>

        <q-table
            flat bordered
            title="Rabi Crops"
            :rows="rabiList"
            :columns="columns"
            row-key="name"
            :pagination="initialPagination"
        >
            <template v-slot:top-right>
                <q-btn
                    outline
                    rounded
                    label="Add Rabi Crops"
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
                        @click="deleteDistrict(props.row.id)"
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
                                    v-model="form.rabi_crops_name"
                                    :error="!form.errors.rabi_crops_name===false"
                                    :error-message="form.errors.rabi_crops_name"
                                    dense
                                    placeholder="Rabi Crops Name *">
                                    <template v-slot:prepend>
                                        <q-icon name="add" />
                                    </template>
                                </q-input>
                                <q-input
                                    name="name"
                                    standout
                                    v-model="form.rabi_crops_code"
                                    :error="!form.errors.rabi_crops_code===false"
                                    :error-message="form.errors.rabi_crops_code"
                                    dense
                                    placeholder="Rabi Crops Code">
                                    <template v-slot:prepend>
                                        <q-icon name="code" />
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
    'rabiCrops':[]
});
const rabiList=ref(props.rabiCrops);
const columns = [
    {name: 'id', align: 'left', label: 'ID', field: 'id'},
    {name: 'rabi_crops_name', align: 'left', label: 'Rabi Crop Name', field: 'rabi_crops_name'},
    {name: 'rabi_crops_code', align: 'left', label: 'Rabi Crop Code', field: 'rabi_crops_code'},
    {name: 'actions', align: 'right', label: 'Actions', field: 'id'}
]
const modal=ref(false);
const isEdit=ref(false);
const form=useForm({
    id:0,
    rabi_crops_name:'',
    rabi_crops_code:'',
});
const submit=()=>{
    if(isEdit.value===false){
        form.post(route('rabi-crops.store'),{
            onStart:()=>q.loading.show(),
            onSuccess:()=>{
                form.reset();
               rabiList.value=props.rabiCrops
                q.notify({
                    message:'Rabi Crop created',
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
        });
    }else{
        form.put(route('rabi-crops.update',form.id),{
            onStart: () => q.loading.show(),
            onSuccess: () => {
                modal.value = false
                q.notify({
                    message: 'Rabi crops updated',
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
const deleteDistrict=(id)=>{
    q.dialog({
        title:'Confirm Delete',
        message:'Are you sure?',
        cancel:'No',
    }).onOk(()=>{
        router.delete(route('rabi-crops.destroy',id),
            {
                onStart:()=>q.loading.show({message:'Deleting....'}),
                onSuccess:()=>{
                    q.notify({
                        message:'Rabi Crops deleted',
                        closeBtn:true,
                    })
                    q.loading.hide();
                },
                onFinish:()=>q.loading.hide(),
                preserveState: false,
            })
    })
}
const openAddModal=()=>{
    modal.value=true;
    isEdit.value=false;
}
const openEditModal=(data)=>{
    modal.value=true;
    isEdit.value=true;
    form.id=data.id;
    form.rabi_crops_name=data.rabi_crops_name;
    form.rabi_crops_code=data.rabi_crops_code;

}

</script>

<style scoped>

</style>
