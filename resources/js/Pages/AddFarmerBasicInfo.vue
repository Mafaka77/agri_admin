<template>
    <div class="row justify-center">
    <div class="col-md-9 col-xl-7 q-pa-xl" style="background-color: white">
        <div class=" " style="color:#2e6525 ">
            <q-btn  size="12px"  flat dense icon="arrow_back" label="Back" @click="e=>$inertia.get(route('manage-farmer'))" />
        </div>
        <div class="q-pt-md text-lg">Farmer Basic Details</div>
        <div class="q-gutter-x-md column">
            <form @submit.prevent="submit" method="POST">
            <div class="row justify-around">
                <div class="col-xs-12 col-md-5">
                    <q-input
                        name="full_name"
                        outlined
                        color="green"
                        v-model="form.full_name"
                        :error="!form.errors.full_name===false"
                        :error-message="form.errors.full_name"
                        dense
                        label="Full Name *">
                    </q-input>
                </div>
                <div class="col-xs-12 col-md-5">
                    <q-input
                            clearable
                             v-model="form.dob"
                             dense
                             :rules="['date']"
                             label="Date of Birth *"
                             outlined
                            color="green"
                    >
                        <template v-slot:append>
                            <q-icon name="event" class="cursor-pointer">
                                <q-popup-proxy cover transition-show="scale" transition-hide="scale">
                                    <q-date
                                        mask="DD-MM-YYYY"
                                        v-model="form.dob"
                                        minimal
                                        default-year-month="1990/01"
                                    >
                                        <div class="row items-center justify-end">
                                            <q-btn v-close-popup label="Close" color="primary" flat />
                                        </div>
                                    </q-date>
                                </q-popup-proxy>
                            </q-icon>
                        </template>
                    </q-input>
                </div>

            </div>
            <div class="row justify-around">
                <div class="col-xs-12 col-md-5">
                    <q-select v-model="form.caste_id" :error="!form.errors.caste_id === false"
                              :error-message="form.errors.caste_id" :options="caste" dense emit-value
                              fill-input  hide-selected map-options option-label="caste" option-value="id"
                              placeholder="Select Caste *" outlined
                              color="green" use-input>
                        <template v-slot:no-option>
                            <q-item>
                                <q-item-section class="text-gresy">
                                    No results
                                </q-item-section>
                            </q-item>
                        </template>
                    </q-select>
                </div>
                <div class="col-xs-12 col-md-5">
                    <q-select v-model="form.gender_id" :error="!form.errors.gender_id === false"
                              :error-message="form.errors.gender_id" :options="gender" dense emit-value
                              fill-input  hide-selected map-options option-label="gender_name" option-value="id"
                              placeholder="Select Gender *" outlined
                              color="green" use-input>

                        <template v-slot:no-option>
                            <q-item>
                                <q-item-section class="text-gresy">
                                    No results
                                </q-item-section>
                            </q-item>
                        </template>
                    </q-select>
                </div>
            </div>
            <div class="row justify-around">
                <div class="col-xs-12 col-md-5">
                    <q-select v-model="form.relationship" :error="!form.errors.relationship === false"
                              :error-message="form.errors.relationship" :options="relations" dense emit-value
                              fill-input  hide-selected map-options option-label="label" option-value="value"
                              placeholder="Select Relationship *" outlined
                              color="green" use-input>

                        <template v-slot:no-option>
                            <q-item>
                                <q-item-section class="text-gresy">
                                    No results
                                </q-item-section>
                            </q-item>
                        </template>
                    </q-select>
                </div>
                <div class="col-xs-12 col-md-5">

                    <q-input
                        name="fathers_name"
                        outlined
                        color="green"

                        v-model="form.relationship_name"
                        :error="!form.errors.relationship_name===false"
                        :error-message="form.errors.relationship_name"
                        dense
                        label="Father/Wife/Husband's Name *">

                    </q-input>
                </div>
            </div>
            <div class="row justify-around">
                <div class="col-xs-12 col-md-5">
                    <q-input
                        name="aadhaar_card"
                        outlined
                        color="green"

                        v-model="form.aadhaar_no"
                        :error="!form.errors.aadhaar_no===false"
                        :error-message="form.errors.aadhaar_no"
                        dense
                        label="Aadhaar Card *">

                    </q-input>

                </div>
                <div class="col-xs-12 col-md-5">
                    <q-select v-model="form.aadhaar_verify_type" :error="!form.errors.aadhaar_verify_type === false"
                              :error-message="form.errors.aadhaar_verify_type" :options="aadhaar_verify_type" dense emit-value
                              fill-input  hide-selected map-options option-label="label" option-value="value"
                              placeholder="Aadhaar Verification Type *" outlined
                              color="green" use-input>

                        <template v-slot:no-option>
                            <q-item>
                                <q-item-section class="text-gresy">
                                    No results
                                </q-item-section>
                            </q-item>
                        </template>
                    </q-select>

                </div>
            </div>
            <div class="row justify-around">
                <div class="col-xs-12 col-md-5">
                    <q-input
                        name="phone_number"

                        outlined
                        color="green"
                        v-model="form.phone_no"
                        :error="!form.errors.phone_no===false"
                        :error-message="form.errors.phone_no"
                        dense
                        label="Phone Number *">

                    </q-input>
                </div>
                <div class="col-xs-12 col-md-5">
                    <q-input
                        name="phone_number"
                        outlined
                        color="green"
                        v-model="form.voter_no"
                        :error="!form.errors.voter_no===false"
                        :error-message="form.errors.voter_no"
                        dense
                        label="Voter ID *">

                    </q-input>
                </div>
            </div>
            <div class="row justify-around">
                <div class="col-xs-12 col-md-5">
                    <q-select v-model="form.farmer_category_id" :error="!form.errors.farmer_category_id === false"
                              :error-message="form.errors.farmer_category_id" :options="category" dense emit-value
                              fill-input  hide-selected map-options option-label="f_category_name" option-value="id"
                              placeholder="Farmer Category *" outlined
                              color="green" use-input >
                        <template v-slot:no-option>
                            <q-item>
                                <q-item-section class="text-gresy">
                                    No results
                                </q-item-section>
                            </q-item>
                        </template>
                    </q-select>
                </div>
                <div class="col-xs-12 col-md-5">
                    <q-input
                        name="education_qualification"
                        outlined
                        color="green"
                        v-model="form.education_qualification"
                        :error="!form.errors.education_qualification===false"
                        :error-message="form.errors.education_qualification"
                        dense
                        label="Highest Qualification *">

                    </q-input>
                </div>
            </div>
            <div class="row justify-around income">
                <div class="col-xs-12 col-md-5">
                    Is Farming the main source of income?
                    <q-option-group
                        name="is_farming_main_income"
                        v-model="form.is_farming_main_income"
                        :options="options"
                        color="primary"
                        inline
                    />
                </div>

                    <div v-if="onChangeCheck==='No'" class="col-xs-12 col-md-5">
                        <q-input
                            name="occupation"
                            outlined
                            color="green"
                            v-model="form.other_income"
                            :error="!form.errors.other_income===false"
                            :error-message="form.errors.other_income"
                            dense
                            label='If "No" other source of income'>
                        </q-input>
                    </div>
                <div v-else class="col-xs-12 col-md-5">

                </div>
                </div>

<!--            ADDRESS STARTS-------------------------------------------------->
            <div class="q-pb-sm">
                Address
            </div>
            <div class="row justify-around">
                <div class="col-xs-12 col-md-5">
                    <q-select v-model="form.district_id" :error="!form.errors.district_id === false"
                              :error-message="form.errors.district_id" :options="districts" dense emit-value
                              fill-input  hide-selected map-options option-label="district_name" option-value="id"
                              placeholder="Select District *" outlined
                              color="green" use-input @update:model-value="getSubDivision" @update:modelValue="getBlock">
                        <template v-slot:no-option>
                            <q-item>
                                <q-item-section class="text-gresy">
                                    No results
                                </q-item-section>
                            </q-item>
                        </template>
                    </q-select>

                </div>
                <div class="col-xs-12 col-md-5">
                    <q-select v-model="form.sub_division_id" :error="!form.errors.sub_division_id === false"
                              :error-message="form.errors.sub_division_id" :options="subDivisionList" dense emit-value
                              :disable="isSubDivisionDisabled"
                              fill-input  hide-selected map-options option-label="sub_division_name" option-value="id"
                              placeholder="Select Sub Division *" outlined
                              color="green" use-input>
                        <template v-slot:no-option>
                            <q-item>
                                <q-item-section class="text-gresy">
                                    No results
                                </q-item-section>
                            </q-item>
                        </template>
                    </q-select>

                </div>
            </div>
            <div class="row justify-around">
                <div class="col-xs-12 col-md-5">
                    <q-select v-model="form.block_id" :error="!form.errors.block_id === false"
                              :error-message="form.errors.block_id" :options="blockList" dense emit-value
                              fill-input  hide-selected map-options option-label="block_name" option-value="id"
                              :disable="isBlockDisabled" placeholder="Select RD Block *" outlined
                              color="green" use-input @update:model-value="getVillage">
                        <template v-slot:no-option>
                            <q-item>
                                <q-item-section class="text-gresy">
                                    No results
                                </q-item-section>
                            </q-item>
                        </template>
                    </q-select>

                </div>
                <div class="col-xs-12 col-md-5">
                    <q-select v-model="form.village_id" :error="!form.errors.village_id === false"
                              :error-message="form.errors.village_id" :options="villageList" dense emit-value
                              fill-input  hide-selected map-options option-label="village_name" option-value="id"
                              @filter="filterVillage" @input-value="setVillageInput" :model-value="setVillageModel"
                              :disable="isVillageDisabled" placeholder="Select or Search Village *" outlined
                              color="green" use-input @update:model-value="assignVillageLGD">
                        <template v-slot:no-option>
                            <q-item>
                                <q-item-section class="text-gresy">
                                    No results
                                </q-item-section>
                            </q-item>
                        </template>
                    </q-select>
                </div>
            </div>

            <div class="row justify-around">
                <div class="col-xs-12 col-md-5">
                    <div class="row">
                        State LGD:
                        <div class="text-weight-bold">15</div>
                    </div>

                </div>
                <div class="col-xs-12 col-md-5">
                        Village LGD:{{form.village_lgd_code}}
                </div>
            </div>
            <div class="q-mb-sm">
                Bank Details
            </div>
            <div class="row justify-around">
                <div class="col-xs-12 col-md-5">
                    <q-input
                        name="bank_name"
                        outlined
                        color="green"
                        v-model="form.bank_name"
                        :error="!form.errors.bank_name===false"
                        :error-message="form.errors.bank_name"
                        dense
                        label="Bank Name *">

                    </q-input>

                </div>
                <div class="col-xs-12 col-md-5">
                    <q-input
                        name="account_number"
                        outlined
                        color="green"
                        v-model="form.account_number"
                        :error="!form.errors.account_number===false"
                        :error-message="form.errors.account_number"
                        dense
                        label="Account Number *">

                    </q-input>
                </div>
            </div>
            <div class="row justify-around">
                <div class="col-xs-12 col-md-5">
                    <q-input
                        name="branch_name"
                        outlined
                        color="green"
                        v-model="form.branch_name"
                        :error="!form.errors.branch_name===false"
                        :error-message="form.errors.branch_name"
                        dense
                        label="Branch Name *">

                    </q-input>

                </div>
                <div class="col-xs-12 col-md-5">
                    <q-input
                        name="ifsc_code"
                        outlined
                        color="green"
                        v-model="form.ifsc_code"
                        :error="!form.errors.ifsc_code===false"
                        :error-message="form.errors.ifsc_code"
                        dense
                        label="IFSC Code *">

                    </q-input>
                </div>
            </div>
            <div class="row justify-center q-mt-md">
                <q-btn
                    label="Back"
                    outline
                    dense
                    rounded
                    style="color:#2e6525;padding: 5px 40px 5px"
                    @click="e=>$inertia.get(route('manage-farmer'))"
                />
                <div style="width: 15px"/>
                <q-btn
                    flat
                    rounded
                    label="Confirm"
                    type="submit"
                    style="padding: 5px 30px 5px;background-color: #2e6525;color: white;"
                />
            </div>
        </form>
        </div>
    </div>
    </div>
</template>

<script setup>
import {computed, ref} from 'vue';
import {router, useForm} from "@inertiajs/vue3";
import {useQuasar} from "quasar";
const q=useQuasar();

const isSubDivisionDisabled=ref(true);
const isBlockDisabled=ref(true);
const isVillageDisabled=ref(true);
const subDivisionList=ref([]);
const blockList=ref([]);
const villageList=ref([]);
const allVillageList=ref([]);
const setVillageModel=ref(null);
const form=useForm({
    id:0,
    full_name:'',
    dob:'',
    farmer_category_id:'',
    gender_id:'',
    relationship:'',
    relationship_name:'',
    phone_no:'',
    voter_no:'',
    education_qualification:'',
    district_id:'',
    sub_division_id:'',
    block_id:'',
    village_id:'',
    other_income:'',
    is_farming_main_income:'Yes',
    caste_id:'',
    aadhaar_no:'',
    aadhaar_verify_type:'',
    bank_name:'',
    account_number:'',
    branch_name:'',
    ifsc_code:'',
    ration_card_number:'',
    ration_card_file:'',
    state_lgd_code:'15',
    village_lgd_code:'',


});
const props=defineProps({
    'gender':[],
    'districts':[],
    'caste':[],
    'category':[],

});
const relations=[
    {label:"Father's Name",value:'Father Name'},
    {label:"Wife's Name",value:'Wife Name'},
    {label:"Husband's Name",value:'Husband Name'},
]
const options=[
    {
        label:'Yes',
        value:'Yes'
    },
    {
        label: 'No',
        value: 'No'
    }
]
const aadhaar_verify_type=[
    {
        label:'Physical Verified',
        value:'Physically Verified'
    },
    {
        label: 'Online Verified',
        value: 'Online Verified'
    }
];

const onChangeCheck=computed(()=>form.is_farming_main_income);

const getSubDivision=(e)=>{
    axios.get(route('get-sub-division',e)).then((res)=>{
        const {data}=res.data;
        isSubDivisionDisabled.value=false;
        subDivisionList.value=data;
        form.sub_division_id='';
    });
}
const getBlock=(e)=>{
    axios.get(route('get-block',e)).then((res)=>{
        const {data}=res.data;
        isSubDivisionDisabled.value=false;
        isBlockDisabled.value=false;
        blockList.value=data;
        form.block_id='';
    });
}
const getVillage=(e)=>{
    axios.get(route('get-village',e)).then((res)=>{
        const {data}=res.data;
        isSubDivisionDisabled.value=false;
        isBlockDisabled.value=false;
        isVillageDisabled.value=false;
        villageList.value=data;
        allVillageList.value=data;
        form.village_id='';
    });
}
const filterVillage=(val, update, abort)=>{
    update(()=>{
        const needle = val.toLocaleLowerCase();
        const initial = ref([]);
        initial.value = [...allVillageList.value]
        villageList.value=initial.value.filter(v => v.village_name.toLowerCase().indexOf(needle) > -1);
    })
}
const setVillageInput=(val)=>{
    setVillageModel.value=val;
}
const assignVillageLGD=(e)=>{
    console.log(e);
    axios.get(route('get-village-lgd',e)).then((res)=>{
        const {data}=res.data;
        form.village_lgd_code=data.village_lgd_code;
    });
}
const submit=()=>{
    form.post(route('farmer-basic-info.store'),{
        onStart:()=>{
            q.loading.show();
        },
        onSuccess:(data)=>{
            q.loading.hide();
            q.notify({
                message:'Farmers Successfully Created'
            })
        },
        onError:(err)=>{
            q.loading.hide();
            q.notify({
                message:err.message,
                icon:'warning',
                iconColor:'red',
                closeBtn:true
            })
        }
    });
}

</script>

<style>

@media only screen and (min-width: 480px){
    .income {
        height: 70px;
    }/* CSS that should be displayed if width is equal to or less than 991px goes here */
}


</style>
