<template>
    <div class="q-pl-xl q-pr-xl">
        <div class="row">
        </div>

            <q-table
                flat bordered
                title="Districts"
                :rows="distictList"
                :columns="columns"
                row-key="name"
                :pagination="initialPagination"
            >
                <template v-slot:top-right>
                    <q-btn
                        outline
                        rounded
                        label="Add District"
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
    </div>
</template>

<script setup>
import {ref} from 'vue';
import {useQuasar} from "quasar";
import {useForm} from "@inertiajs/vue3";

const q=useQuasar();
const props=defineProps({
    'districts':[]
});
const form=useForm({
    id:0,
    district_code:'',
    district_name:''
});

const distictList=ref(props.districts);
const columns = [
    {name: 'id', align: 'left', label: 'STUDENT ID', field: 'id'},
   {name: 'district_code', align: 'left', label: 'District Code', field: 'district_code'},
    {name: 'district_name', align: 'left', label: 'District Name', field: 'district_name'},
    {name: 'actions', align: 'right', label: 'Actions', field: 'id'}
]


const deleteDistrict=(id)=>{
    q.dialog({
        title:'Confirm Delete',
        message:'Are you sure?',
        cancel:'No',
    }).onOk(()=>{
        console.log(id)
    })
}
const openEditModal=(data)=>{
console.log(data.id);
}
</script>

<style scoped>

</style>
