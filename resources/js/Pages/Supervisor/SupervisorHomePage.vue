<template>
    <div class="row justify-center">
        <div class="col-xs-12 col-md-9 col-xl-7 ">
            <div class="column">
                <div class="q-col-gutter-lg">
                    <div class="row justify-between q-col-gutter-sm">
                        <div class="col-xs-12 col-md-4">
                            <q-card flat bordered>
                                <q-card-section class="text-h4 text-bold" style="color: #cd9f27">{{pendingCounts}}</q-card-section>
                                <q-card-section class="text-h7">Pending for Approval</q-card-section>
                            </q-card>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="col-xs-12 col-md-4">
                                <q-card flat bordered>
                                    <q-card-section class="text-h4 text-bold" style="color: #cd9f27">{{totalFarmersDistrictWise}}</q-card-section>
                                    <q-card-section  class=" text-h7">Total Farmers in {{district.district_name}} </q-card-section>
                                </q-card>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="col-xs-12 col-md-4">
                                <q-card flat bordered>
                                    <q-card-section class="text-h4 text-bold" style="color: #424242">{{totalFarmers}}</q-card-section>
                                    <q-card-section  class="text-h7">Total Farmers Registered</q-card-section>
                                </q-card>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--        TABLE-->
            <div class="q-col-gutter-y-md">
                <q-table
                    :table-header-style="{ backgroundColor: '#302e2a' }"
                    table-header-class="text-white"
                    flat bordered
                    title="Farmers"
                    :rows="pendingList"
                    :columns="columns"
                    row-key="status"
                    :pagination="initialPagination"
                >
                    <template v-slot:top-left>
                        <div>Pending for Approval</div>

                    </template>
                    <template v-slot:top-right>
                        <div style="color: #2e6525">{{district[0].district_name}}</div>

                    </template>
                    <template v-slot:body-cell-actions="props">
                        <q-td :props="props">
                            <q-btn
                                dense
                                round
                                flat
                                @click="$inertia.get(route('supervisor-approval-index',props.row.id))"
                                label="OPEN"
                                style="color: #2e6525"
                            ></q-btn>
                        </q-td>
                    </template>
                    <template v-slot:body-cell-verification="props">
                        <q-td :props="props">
                            <div v-if="props.value==='Submitted'">
                                <q-badge class="q-pa-sm"  style="background-color: #cd9f27" :label="props.value"/>
                            </div>
                            <div v-else>
                                <q-badge class="q-pa-sm" style="background-color: #2e6525"  :label="props.value"/>
                            </div>
                        </q-td>
                    </template>

                </q-table>
            </div>
            ENUMERATOR TABLE
            <div class="q-col-gutter-y-md">
                <q-table
                    :table-header-style="{ backgroundColor: '#302e2a' }"
                    table-header-class="text-white"
                    flat bordered
                    title="Farmers"
                    :rows="enumeratorList"
                    :columns="enumeratorColumn"
                    row-key="status"
                    :pagination="initialPagination"
                >
                    <template v-slot:top-left>
                        <div>Enumerators({{enumeratorList.length}})</div>
                        <div style="color: #2e6525">({{district[0].district_name}})</div>

                    </template>
                    <template v-slot:top-right>
                        <div class="column">
                            <q-btn
                                label="Add Enumerator"
                                flat
                                color="white"
                                style="background-color: green"
                                @click="openAddModal"
                            />

                        </div>

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
                    <template v-slot:body-cell-verification="props">
                        <q-td :props="props">
                            <div v-if="props.value==='Submitted'">
                                <q-badge class="q-pa-sm"  style="background-color: #cd9f27" :label="props.value"/>
                            </div>
                            <div v-else>
                                <q-badge class="q-pa-sm" style="background-color: #2e6525"  :label="props.value"/>
                            </div>
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
                                            name="mobile"
                                            standout
                                            v-model="form.mobile"
                                            :error="!form.errors.mobile===false"
                                            :error-message="form.errors.mobile"
                                            dense
                                            placeholder="Mobile">
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
                                                  disable
                                                  :error-message="form.errors.district_id" :options="district" dense emit-value
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
                                                  disable
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
    </div>

</template>

<script setup>
import {ref} from 'vue';
import {useQuasar} from "quasar";
import {router, useForm} from "@inertiajs/vue3";
const q=useQuasar();
const modal=ref(false);
const isEdit=ref(false);
const columns = [
    {
        name: 'farmer_id',
        required: true,
        label: 'Farmer ID',
        align: 'left',
        field: row => row.farmer_id,
        sortable: true
    },
    { name: 'full_name', align: 'center', label: 'Farmer Name', field: 'full_name', sortable: true },
    { name: 'verification', align: 'center', label: 'Verification', field: row => row.verification, sortable: true},
    { name: 'enumerator', align: 'center', label: 'Enumerator', field: row => row.user.name, sortable: true},
    {name: 'actions', align: 'right', field: 'id'}
]
const enumeratorColumn = [
    {
        name: 'enumerator',
        required: true,
        label: 'Enumerator',
        align: 'left',
        field: row => row.name,
        sortable: true
    },
    { name: 'mobile', align: 'center', label: 'Mobile', field: 'mobile', sortable: true },
    { name: 'email', align: 'center', label: 'Email', field: row => row.email, sortable: true},
    // { name: 'enumerator', align: 'center', label: 'Enumerator', field: row => row.user.name, sortable: true},
    {name: 'actions', align: 'right', field: 'id'}
]
const props=defineProps({
    'pendingCounts':Object,
    'totalFarmersDistrictWise':Object,
    'totalFarmers':Object,
    'district':Object,
    'pendingList':[],
    'enumeratorList':[],
    'roleList':[]
});

const form=useForm({
    id:0,
    name:'',
    email:'',
    mobile:'',
    password:'',
    district_id:0,
    roles_id:0,

});
const openAddModal=()=>{
    modal.value=true;
    isEdit.value=false;
    form.district_id=props.district[0].id;
    form.roles_id=props.roleList[0].id;
}
const submit=()=>{
    form.post(route('create-enumerator'),{
        onStart:()=>q.loading.show(),
        onSuccess:()=>{
            q.loading.hide();
            q.notify({
                message:'User created',
            });
        },
        onError:(error)=>{
            q.loading.hide();
            const err=error.message;
          q.notify({
              message:err,
          });
        },
        onFinish:()=>q.loading.hide()
    });
}
const openEditModal=(data)=>{
    modal.value=true;
    isEdit.value=true;
    form.id=data.id;
    form.name=data.name;
    form.email=data.email;
    form.mobile=data.mobile;
    form.password=data.password;
    form.roles_id=data.roles_id;
    form.district_id=data.district_id;
}

</script>

<style scoped>

</style>
