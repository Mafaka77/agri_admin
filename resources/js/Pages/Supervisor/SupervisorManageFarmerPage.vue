<template>
    <div class="container row">
        <div class="col-xs-12 col-md-12 " style="background-color: white">
        <q-table
            :table-header-style="{ backgroundColor: '#302e2a' }"
            table-header-class="text-white"
            flat
            bordered
            title="Farmers"
            :rows="farmerList"
            :columns="columns"
            @request="tableData"
            :rows-per-page-options="[2,5,7,15,30,50]"
            v-model:pagination="pagination"
        >
            <template v-slot:top-left>
                <div class="column q-gutter-md">
                    <div class="row">Farmer List for &nbsp
                    <div class="text-bold">{{district.district_name}}</div>
                    </div>̵
                    <div>
                        <q-input
                            outlined
                            debounce="300"
                            dense
                            label="Search by Name"
                            @keyup.enter.prevent="searchData(store.searchFarmerText)"
                            v-model="store.searchFarmerText"
                            clearable
                            @clear="searchData('')"

                        >
                            <template v-slot:append>
                                <q-avatar>
                                    <q-icon name="search"/>
                                </q-avatar>
                            </template>
                        </q-input>
                    </div>
                </div>

            </template>
            <template v-slot:top-right>
                <div style="color: #2e6525">
                    <div class="column q-gutter-y-md">
                        <q-select
                            v-model="store.supervisorFilterBy"
                            outlined
                            dense
                            emit-value
                            fill-input  hide-selected map-options option-label="label" option-value="value"
                            placeholder="Filter by Verification"
                            color="green" use-input
                            :options="filters"
                            @update:model-value="filterData(store.searchFarmerText)"
                        >
                            <template v-slot:after>
                                <div v-if="store.supervisorFilterBy!=''">
                                    <q-btn icon="clear"
                                           flat
                                           dense
                                           @click="clearFilter(store.searchFarmerText)"
                                    />
                                </div>

                            </template>
                        </q-select>

                    </div>
                </div>

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
                        <q-badge class="q-pa-sm"  style="background-color:#f8f2e1;color: #cd9f27" :label="props.value"/>
                    </div>
                    <div v-else-if="props.value==='Pending'">
                        <q-badge class="q-pa-sm" style="background-color: darkgrey"  :label="props.value"/>
                    </div>
                    <div v-else-if="props.value==='Approved'">
                        <q-badge class="q-pa-sm" style="background-color: #59964f"  :label="props.value"/>
                    </div>
                    <div v-else>
                        <q-badge class="q-pa-sm" style="background-color: #ffe8e8;color: red"  :label="props.value"/>
                    </div>
                </q-td>
            </template>

        </q-table>
        </div>
    ̵</div>
</template>

<script setup>
import {ref} from 'vue';
import {useQuasar} from "quasar";
import {router, useForm} from "@inertiajs/vue3";
import {AdminStore} from "@/Store/AdminStore.js";
const q=useQuasar();
const store=AdminStore();

const props=defineProps({
    'farmers':[],
    'district':Object
});
const pagination = ref({
    page: props.farmers.current_page,
    rowsPerPage: props.farmers.per_page,
    rowsNumber: props.farmers.total,
})
const farmerList=ref(props.farmers.data);
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
const filters=[
    {label:"Pending",value:'Pending'},
    {label:"Submitted",value:'Submitted'},
    {label:"Approved",value:'Approved'},
    {label:"Rejected",value:'Rejected'},
]
function tableData(props) {
    const {page, rowsPerPage,} = props.pagination;
    router.get(route('manage-farmer'), {
        per_page: rowsPerPage,
        page: page,
    }, {})
}
const searchData=(searchText)=> {
    router.get(route('manage-farmer'), {
        search: searchText,
        per_page: 10,
        page: 1,
    }, {
        onStart: () => q.loading.show(),
        onSuccess: () => q.loading.hide(),
        onFinish: () => q.loading.hide(),
        onError: () => q.loading.hide(),

    })
}
const filterData=(searchText)=> {
    router.get(route('manage-farmer'), {
        search: searchText,
        per_page: 10,
        page: 1,
        filterBy:store.supervisorFilterBy,
    }, {
        onStart: () => q.loading.show(),
        onSuccess: () => q.loading.hide(),
        onFinish: () => q.loading.hide(),
        onError: () => q.loading.hide(),

    })
}
const clearFilter=(searchText)=> {
    store.supervisorFilterBy='';
    router.get(route('manage-farmer'), {
        search: searchText,
        per_page: 10,
        page: 1,
        filterBy:store.supervisorFilterBy,
    }, {
        onStart: () => q.loading.show(),
        onSuccess: () => q.loading.hide(),
        onFinish: () => q.loading.hide(),
        onError: () => q.loading.hide(),

    })
}
</script>

<style scoped>

</style>
