<template>
    <div class="q-pl-xl q-pr-xl">
        <div class="row">
        </div>

        <q-table
            flat bordered
            title="Sub-Division"
            :rows="subDivisionList"
            :columns="columns"
            row-key="name"
            :pagination="initialPagination"
        >
            <template v-slot:top-right>
                <q-btn
                    @click="openAddModal"
                    outline
                    rounded
                    label="Add Sub Division"
                    dense
                    flat
                    class="text-white q-px-lg q-mx-lg"
                    style="background-color:#2e6525 "
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
                    <q-toolbar-title><span class="text-weight-bold"> Sub Division</span></q-toolbar-title>
                    <q-btn flat round dense icon="close" v-close-popup/>
                </q-toolbar>
                <q-card-section>
                    <form @submit.prevent="submit" method="POST">
                        <div class="q-pa-md">
                            <div class="q-gutter-x-md column" style="width: 400px">
                                <q-input
                                    name="sub_division_name"
                                    standout
                                    v-model="form.sub_division_name"
                                    :error="!form.errors.sub_division_name===false"
                                    :error-message="form.errors.sub_division_name"
                                    dense
                                    placeholder="Sub Division Name *">
                                    <template v-slot:prepend>
                                        <q-icon name="add" />
                                    </template>
                                </q-input>
                                <q-select v-model="form.district_id" :error="!form.errors.district_id === false"
                                          :error-message="form.errors.district_id" :options="distictList" dense emit-value
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
const modal=ref(false);
const isEdit=ref(false);
const props=defineProps({
    'district':[],
    'sub_division':[]
});
const form=useForm({
    id:0,
    sub_division_name:'',
    district_id:''
});

const distictList=ref(props.district);
const subDivisionList=ref(props.sub_division);
const columns = [
    {name: 'id', align: 'left', label: 'ID', field: 'id'},
    {name: 'sub_division_name', align: 'left', label: 'Sub Division Name', field: 'sub_division_name'},
    {name: 'district_id', align: 'left', label: 'District Name', field:e=>e.district.district_name},
    {name: 'actions', align: 'right', label: 'Actions', field: 'id'}
]


const deleteDistrict=(id)=>{
    q.dialog({
        title:'Confirm Delete',
        message:'Are you sure?',
        cancel:'No',
    }).onOk(()=>{
        router.delete(route('sub-division.destroy',id),
            {
                onStart:()=>q.loading.show({message:'Deleting....'}),
                onSuccess:()=>{
                    q.notify({
                        message:'Sub Division deleted',
                        closeBtn:true,
                    })
                    q.loading.hide();
                },
                onFinish:()=>q.loading.hide(),
                preserveState: false,
            })
    })
}
const openEditModal=(data)=>{
    form.sub_division_name=data.sub_division_name;
    form.district_id=data.district_id;
    form.id=data.id;
    modal.value=true;
    isEdit.value=true;

}
const openAddModal=()=>{
    modal.value=true;
    isEdit.value=false;
}
const submit=()=>{
    if(isEdit.value===false){
        form.post(route('sub-division.store'),{
            onStart:()=>q.loading.show(),
            onSuccess:()=>{
                form.reset();
                subDivisionList.value=props.sub_division
                q.notify({
                    message:'Sub-Divisions created',
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
        form.put(route('sub-division.update',form.id),{
            onStart: () => q.loading.show(),
            onSuccess: () => {
                modal.value = false
                q.notify({
                    message: 'Sub Division updated',
                    closeBtn: true,
                    icon: 'check',
                    iconColor: 'blue'
                });
                q.loading.hide()
            },
            onError:(error)=>{
                console.log(error);
            },
            onFinish: () => q.loading.hide(),
            preserveState:false
        })
    }


}
</script>

<style scoped>

</style>
