<template>
    <!--            First-->
    <div>
        <q-expansion-item label="Basic Information" default-opened class="overflow-hidden" header-class="bg-black text-white">
            <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Full Name</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.full_name}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Date of Birth</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.dob}}</div>
                </div>
            </div>
            <!--            SECOND-->
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Relationship</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.relationship}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Relation Name</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.relationship_name}}</div>
                </div>
            </div>
            <!--                THIRD-->
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Aadhaar Card</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.aadhaar_no}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Aadhaar Verification</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.aadhaar_verify_type}}</div>
                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Farmer Category</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.farmer_category.f_category_name}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Qualification</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.education_qualification}}</div>
                </div>
            </div>
            <!--                FOURTH-->
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Main Income?</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.is_farming_main_income==1?'Yes':'No'}}</div>
                </div>
                <div class="col-xs-6 col-md-2">

                </div>
                <div class="col-xs-6 col-md-3">

                </div>
            </div>
            <!--                FIFTH-->
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Other Source</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.other_income==null?'N/A':props.basicInfo.other_income}}</div>
                </div>
                <div class="col-xs-6 col-md-2">

                </div>
                <div class="col-xs-6 col-md-3">

                </div>
            </div>
            <q-separator/>
            <!--                ADDRESS-->
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">District</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.district.district_name}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Sub-Division</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.sub_division.sub_division_name}}</div>
                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Block</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.block.block_name}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Village</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.village.village_name}}</div>
                </div>
            </div>
            <q-separator/>
<!--            BANK DETAILS-->
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Bank Name</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.farmer_bank_details.bank_name}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Account Number</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.farmer_bank_details.account_number}}</div>
                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Branch Name</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.farmer_bank_details.branch_name}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">IFSC Code</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{props.basicInfo.farmer_bank_details.ifsc_code}}</div>
                </div>
            </div>
        </q-expansion-item>
    </div>

</template>

<script setup>
import {ref} from 'vue';
import {useQuasar} from "quasar";
import {router, useForm} from "@inertiajs/vue3";
const q=useQuasar();
const props=defineProps({
    'basicInfo':Object,
});
</script>

<style scoped>

</style>
