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
                        <div style="color: #2e6525">{{district.district_name}}</div>

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

                    </template>
                    <template v-slot:top-right>
                        <div style="color: #2e6525">{{district.district_name}}</div>

                    </template>
                    <template v-slot:body-cell-actions="props">
                        <q-td :props="props">
                            <q-btn
                                dense
                                round
                                flat
                                @click="openFarmer(props.row.id)"
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
        </div>
    </div>

</template>

<script setup>
import {ref} from 'vue';
import {useQuasar} from "quasar";
import {router, useForm} from "@inertiajs/vue3";
const q=useQuasar();
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
    // { name: 'verification', align: 'center', label: 'Verification', field: row => row.verification, sortable: true},
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
});
</script>

<style scoped>

</style>
