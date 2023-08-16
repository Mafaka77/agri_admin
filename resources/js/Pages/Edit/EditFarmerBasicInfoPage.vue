<template>
    <div class="row justify-center">
    <div class="col-md-9 col-xl-7 q-pa-md" style="background-color: white">
        <div class="text-lg">Edit Farmer Basic Details</div>
        <div class="q-gutter-x-md column q-pt-md">
            <form @submit.prevent="submit" method="POST">
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            name="full_name"
                            outlined color="green"
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
                            readonly
                            :rules="['date']"
                            label="Date of Birth *"
                            outlined color="green"

                            :error="!form.errors.dob===false"
                            :error-message="form.errors.dob"
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
                        <q-select  v-model="form.caste_id" :error="!form.errors.caste_id === false"
                                  :error-message="form.errors.caste_id" :options="caste" dense emit-value
                                  fill-input  hide-selected map-options option-label="caste" option-value="id"
                                  placeholder="Select Caste *" outlined color="green" use-input>
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
                                  placeholder="Select Gender *" outlined color="green" use-input>

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
                                  placeholder="Select Relationship *" outlined color="green" use-input>

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
                            outlined color="green"
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
                            outlined color="green"
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
                                  placeholder="Aadhaar Verification Type *" outlined color="green" use-input>

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
                            outlined color="green"
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
                            outlined color="green"
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
                                  placeholder="Farmer Category *" outlined color="green" use-input >
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
                            outlined color="green"
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
                            outlined color="green"
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
                                  placeholder="Select District *" outlined color="green" use-input @update:model-value="getSubDivision" @update:modelValue="getBlock">
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
                                  placeholder="Select Sub Division *" outlined color="green" use-input>
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
                                  :model-value="setBlockModel"  @input-value="setBlockInput"
                                  :disable="isBlockDisabled" placeholder="Select RD Block *" outlined color="green" use-input @update:model-value="getVillage">
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
                                  :disable="isVillageDisabled" placeholder="Select or Search Village *" outlined color="green" use-input @update:model-value="assignVillageLGD">
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
                    <div class="col-xs-12 col-md-5 row">
                        Village LGD:
                        <div class="text-weight-bold">{{form.village_lgd_code}}</div>
                    </div>
                </div>
                <div class="q-mb-sm">
                    Bank Details
                </div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            name="bank_name"
                            outlined color="green"
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
                            outlined color="green"
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
                            outlined color="green"
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
                            outlined color="green"
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
                        label="Update"
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
const setVillageModel=ref(props.basicInfo.village.village_name);
const setBlockModel=ref(props.basicInfo.block.block_name)
    const form=useForm({
        id:props.basicInfo.id,
        full_name:props.basicInfo.full_name,
        dob:props.basicInfo.dob,
        farmer_category_id:props.basicInfo.farmer_category_id,
        gender_id:props.basicInfo.gender_id,
        relationship:props.basicInfo.relationship,
        relationship_name:props.basicInfo.relationship_name,
        phone_no:props.basicInfo.phone_no,
        voter_no:props.basicInfo.voter_no,
        education_qualification:props.basicInfo.education_qualification,
        district_id:props.basicInfo.district_id,
        sub_division_id:props.basicInfo.sub_division_id,
        block_id:props.basicInfo.block_id,
        village_id:props.basicInfo.village_id,
        other_income:props.basicInfo.other_income,
        is_farming_main_income:props.basicInfo.is_farming_main_income===1?'Yes':'No',
        caste_id:props.basicInfo.caste_id,
        aadhaar_no:props.basicInfo.aadhaar_no,
        aadhaar_verify_type:props.basicInfo.aadhaar_verify_type,
        bank_name:props.basicInfo.farmer_bank_details.bank_name,
        account_number:props.basicInfo.farmer_bank_details.account_number,
        branch_name:props.basicInfo.farmer_bank_details.branch_name,
        ifsc_code:props.basicInfo.farmer_bank_details.ifsc_code,
        state_lgd_code:'15',
        village_lgd_code:props.basicInfo.village_lgd_code,


    });
const props=defineProps({
    'basicInfo':Object,
    'gender':[],
    'districts':[],
    'caste':[],
    'category':[],
})
const relations=[
    {label:'Fathers Name',value:'Father Name'},
    {label:'Wife Name',value:'Wife Name'},
    {label:'Husband Name',value:'Husband Name'},
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
const setBlockInput=(val)=>{
    setBlockModel.value=val;
}

const assignVillageLGD=(e)=>{
    console.log(e);
    axios.get(route('get-village-lgd',e)).then((res)=>{
        const {data}=res.data;
        form.village_lgd_code=data.village_lgd_code;
    });
}
const submit=(data)=>{
    form.put(route('farmer-basic-info.update',form.id),{
        onStart:()=>q.loading.show(),
        onSuccess:()=>{
            q.loading.hide();
            q.notify({
                message:'Update Successful',
                closeBtn:true,
                icon:'check',
                iconColor:'blue'
            })
        },
        onError:(err)=>{
            q.loading.hide();
            q.notify({
                message:'Error Occured! Try Again',
                closeBtn:true,
                icon:'warning',
                iconColor:'red'
            })
        }
    });
}
</script>

<style scoped>

</style>
