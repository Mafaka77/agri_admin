<template>
    <div class="row justify-center">
    <div class="col-xs-12 col-md-9 col-xl-7">
        <q-table
            flat bordered
            title="Farmers"
            :rows="farmerList"
            :columns="columns"
            row-key="status"
            @request="tableData"
            :rows-per-page-options="[2,5,7,15]"
            v-model:pagination="pagination"
        >
            <template v-slot:top-left>
                <div class="column q-gutter-md">
                    <div class="row">Farmer List</div>̵
                    <div>
                        <q-input
                            outlined̵̵
                            debounce="300"
                            dense
                            label="Search"
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
                <q-btn
                    @click="e=>$inertia.get(route('farmer-basic-info.index'))"
                    outline
                    rounded
                    label="Add Farmer"
                    dense
                    flat
                    class="text-white q-px-lg q-mx-lg"
                    style="background-color:#2e6525 "
                />

            </template>
            <template v-slot:body-cell-actions="props">
                <q-td :props="props">
                       <q-btn v-if="$page.props.auth.user.roles_id===2"
                           dense
                           flat
                           @click="openFarmer(props.row.id)"
                           label="VIEW"
                           style="color: #2e6525"
                       ></q-btn>

                        <q-btn
                            v-else
                            dense
                            round
                            flat
                            @click="openFarmer(props.row.id)"
                            label="OPEN"
                            style="color: #2e6525"
                        ></q-btn>

                    <q-btn
                        dense
                        round
                        flat
                        style="color: #2e6525"
                        icon="more_vert"
                    >
                        <q-menu fit anchor="bottom left" self="top left">
                            <q-item clickable @click="$inertia.get(route('farmer-basic-info.edit',props.row.id))">
                                <q-item-section>View/Edit</q-item-section>
                            </q-item>
                            <q-item clickable @click="deleteFarmer(props.row.id)">
                                <q-item-section style="color: red">Delete</q-item-section>
                            </q-item>
                        </q-menu>
                    </q-btn>
                </q-td>
            </template>
            <template v-slot:body-cell-status="props">
                <q-td :props="props">
                    <div v-if="props.value==='Incomplete'">
                        <q-badge class="q-pa-sm"  color="grey" :label="props.value"/>
                    </div>
                    <div v-else>
                        <q-badge class="q-pa-sm" style="background-color: #2e6525"  :label="props.value"/>
                    </div>
                </q-td>
            </template>
            <template v-slot:body-cell-verification="props">
                <q-td :props="props">
                    <div v-if="props.value==='Submitted'">
                        <q-badge class="q-pa-sm"  style="background-color: #cd9f27" :label="props.value"/>
                    </div>
                    <div v-else-if="props.value==='Pending'">
                        <q-badge class="q-pa-sm" style="background-color: darkgrey"  :label="props.value"/>
                    </div>
                    <div v-else-if="props.value==='Approved'">
                        <q-badge class="q-pa-sm" style="background-color: #59964f"  :label="props.value"/>
                    </div>
                    <div v-else>
                        <q-badge class="q-pa-sm" style="background-color: red"  :label="props.value"/>
                    </div>
                </q-td>
            </template>
        </q-table>
    </div>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import {useQuasar} from "quasar";
import {router, useForm} from "@inertiajs/vue3";
import {AdminStore} from "@/Store/AdminStore.js";
const q=useQuasar();
const store=AdminStore();
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
    { name: 'phone_no', align: 'center', label: 'Phone No.', field: 'phone_no', sortable: true },
    { name: 'district', label: 'District', field: row => row.district.district_name },
    { name: 'status', align: 'center', label: 'Status', field: row => row.status, sortable: true},
    { name: 'verification', align: 'center', label: 'Verification', field: row => row.verification, sortable: true},
    {name: 'actions', align: 'right', field: 'id'}
]

const props=defineProps({
        'farmers':[]
})
const farmerList=ref(props.farmers.data);
const openFarmer=(id)=>{
    router.get(route('open-clicked',id),{})
}
const deleteFarmer=(id)=>{
    q.dialog({
        title: 'Confirm Delete',
        message: 'Are you sure?',
        ok: 'Yes',
        cancel: 'No'
    }).onOk(() => {
        router.delete(route('farmer-basic-info.destroy', id), {
            onStart: () => q.loading.show({ message: 'Deleting....' }),
            onFinish: () => q.loading.hide(),
            onSuccess: () => q.loading.hide(),
            onError: () => q.loading.hide(),
            preserveState: false,
        })
    }).onCancel(() => {
    })
}
function tableData(props) {
    const {page, rowsPerPage,} = props.pagination;
    router.get(route('manage-farmer'), {
        per_page: rowsPerPage,
        page: page,
    }, {})
}
const pagination = ref({
    page: props.farmers.current_page,
    rowsPerPage: props.farmers.per_page,
    rowsNumber: props.farmers.total,
})
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
</script>
<style>
.my-table-details {
    font-size: 0.85em;
    font-style: italic;
    max-width: 200px;
    white-space: normal;
    color: #555;
    margin-top: 4px;
}
</style>
