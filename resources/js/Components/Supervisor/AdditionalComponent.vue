<template>
    <q-expansion-item label="Additional Details" expand-separator>
        <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
            <div class="col-xs-6 col-md-2">
                <div style="color: #588052">Ration Card Number</div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div>{{additional.ration_card_number}}</div>
            </div>
            <div class="col-xs-6 col-md-2">
                <div style="color: #588052">Ration Card Document</div>
            </div>
            <div class="col-xs-6 col-md-3">
                <a href="#" style="text-decoration: none" ><q-btn label="VIEW DOCUMENT" flat style="background-color:#2e6525" text-color="white" @click="openFile(additional.ration_card_path)"/></a>
            </div>
        </div>
<!--        SCHEME APPLIED-->
        <div class="row justify-start q-pa-md q-gutter-y-md q-gutter-y-md">
            <div class="col-xs-6 col-md-2">
                <div style="color: #588052">Schemes Applied</div>
            </div>
            <div class="col-xs-6 col-md-10">
                <div v-for="scheme in additional.scheme_applied">
                    <div>Scheme Name: {{scheme.scheme_name}}</div>
                <div>Availed: {{scheme.availed==1?'Yes':'No'}}</div>
                    <div>Amount: {{scheme.amount}}</div>
                </div>
            </div>
        </div>
<!--        KCC AVAILED-->
        <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
            <div class="col-xs-6 col-md-2">
                <div style="color: #588052">KCC Availed</div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div>{{additional.is_kcc_availed==1?'Yes':'No'}}</div>
            </div>
            <div class="col-xs-6 col-md-2">
            </div>
            <div class="col-xs-6 col-md-3">
            </div>
        </div>
        <div v-if="additional.is_kcc_availed===1">
            <div  class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">KCC Card No</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{additional.kcc_card_no}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">New/Renew</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{additional.kcc_renew_or_new}}</div>
                </div>
            </div>
            <div  class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Bank Name</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{additional.bank_name}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Branch Name</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{additional.branch_name}}</div>
                </div>
            </div>
            <div  class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Year of Amount Sanction</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{additional.year_of_amount_sanction}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Amount Sanction</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{additional.amount_sanction}}</div>
                </div>
            </div>
        </div>
<!--    DOCUMENTS-->
        <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">

            <div class="col-xs-6 col-md-2">
                <div style="color: #588052">Aadhaar Card</div>
            </div>
            <div class="col-xs-6 col-md-3">
                <a href="#" style="text-decoration: none" ><q-btn label="VIEW DOCUMENT" flat style="background-color:#2e6525" text-color="white" @click="openFile(additional.aadhaar_card_path)"/></a>
            </div>
            <div class="col-xs-6 col-md-2">

            </div>
            <div class="col-xs-6 col-md-3">

            </div>
        </div>
        <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">

            <div class="col-xs-6 col-md-2">
                <div style="color: #588052">Bank Passbook</div>
            </div>
            <div class="col-xs-6 col-md-3">
                <a href="#" style="text-decoration: none" ><q-btn label="VIEW DOCUMENT" flat style="background-color:#2e6525" text-color="white" @click="openFile(additional.bank_passbook_path)"/></a>
            </div>
            <div class="col-xs-6 col-md-2">

            </div>
            <div class="col-xs-6 col-md-3">

            </div>
        </div>
<!--        DETAILS-->
        <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">

            <div class="col-xs-6 col-md-2">
                <div style="color: #588052">Date of Collection</div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div>{{additional.date_of_data_collection}}</div>
            </div>
            <div class="col-xs-6 col-md-2">

            </div>
            <div class="col-xs-6 col-md-3">

            </div>
        </div>

        <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">

            <div class="col-xs-6 col-md-2">
                <div style="color: #588052">Remarks</div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div>{{additional.remarks}}</div>
            </div>
            <div class="col-xs-6 col-md-2">

            </div>
            <div class="col-xs-6 col-md-3">

            </div>
        </div>
    </q-expansion-item>
</template>

<script setup>
import {ref} from 'vue';
import {useQuasar} from "quasar";
import {router, useForm} from "@inertiajs/vue3";
const q=useQuasar();
const props=defineProps({
    'additional':Object,
});
const openFile=(file)=>{
    window.open('/storage/'+file,'_blank')
}
</script>

<style scoped>

</style>
