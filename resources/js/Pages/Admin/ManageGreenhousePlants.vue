<template>
    <div class="row justify-center">
        <div class="col-xs-12 col-md-9 col-xl-7">
            <q-table
                flat bordered
                title="Manage Greenhouse Plants"
                :rows="plants"
                :columns="columns"
                row-key="name"
                :pagination="initialPagination"
            >
                <template v-slot:top-right>
                    <q-btn
                        outline
                        rounded
                        label="Add Plant"
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
                            @click="deleteDialog(props.row.id)"
                            icon="delete"
                        ></q-btn>
                    </q-td>
                </template>
            </q-table>
            <q-dialog v-model="modal">
                <q-card>
                    <q-toolbar>
                        <q-toolbar-title><span class="text-weight-bold">Greenhouse Plant</span></q-toolbar-title>
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
                                        placeholder="Plant Name *">

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
    </div>
</template>
<script setup>
import {ref} from 'vue';
import {useQuasar} from "quasar";
import {router, useForm} from "@inertiajs/vue3";

const q=useQuasar();
const props=defineProps({
    'plants':[],
});
const userList=props.users;
const districtList=props.districts;
const roleList=props.roles;
const isEdit=ref(false);
const modal=ref(false);
const columns = [
    // {name: 'id', align: 'left', label: 'ID', field: 'id'},
    {name: 'Plant Name', align: 'left', label: 'Plant Name', field: 'name'},
    {name: 'actions', align: 'right', label: 'Actions', field: 'id'}
]
const form=useForm({
    id:0,
    name:''
});
const openAddModal=()=>{
    modal.value=true;
    isEdit.value=false;
}
const submit=()=>{
    if(isEdit.value===false){
        form.post(route('manage-greenhouse-plants.store'),{
            onStart:()=>q.loading.show(),
            onSuccess:()=>{
                q.loading.hide();
                q.notify({
                    message:'Successfully Added'
                })
            },
            onError:()=>{
                q.loading.hide();
                q.notify({
                    message:'Error Try Again'
                })
            }
        });
    }else{
        form.put(route('manage-greenhouse-plants.update',form.id),{
            onStart:()=>q.loading.show(),
            onSuccess:()=>{
                q.loading.hide();
                q.notify({
                    message:'Updated'
                })
            },
            onError:()=>{
                q.loading.hide();
                q.notify({
                    message:'Error Try Again'
                })
            }
        })
    }
}
const openEditModal=(data)=>{
    modal.value=true;
    isEdit.value=true;
    form.id=data.id;
    form.name=data.name;
}
const deleteDialog=(id)=>{
    q.dialog({
        title: 'Confirm Delete',
        message: 'Are you sure?',
        ok: 'Yes',
        cancel: 'No'
    }).onOk(() => {
        router.delete(route('manage-greenhouse-plants.destroy', id), {
            onStart: () => q.loading.show({ message: 'Deleting....' }),
            onFinish: () => q.loading.hide(),
            onSuccess: () => q.loading.hide(),
            onError: () => q.loading.hide(),
            preserveState: false,
        })
    }).onCancel(() => {
    })
}
</script>

<style scoped>

</style>
