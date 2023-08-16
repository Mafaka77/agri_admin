<template>
    <div class="row justify-center">
    <div class="col-md-9 col-xl-7 q-pa-md" style="background-color: white">
        <q-breadcrumbs>
            <q-breadcrumbs-el icon="home" @click="e=>$inertia.get(route('manage-farmer'))"/>
            <q-breadcrumbs-el  label="Farmer Details" icon="add_task"  @click="toFarmerDetails"/>
            <q-breadcrumbs-el label="Add Additional Farmer Details" icon="add_circle" />
        </q-breadcrumbs>
        <div class="q-pt-md text-lg">Additional Farmer Details</div>
        <div class="q-gutter-x-md column">
            <form @submit.prevent="submit" method="POST">
                <div>Ration Card Details</div>
                <div class="row justify-around q-pt-md">
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            name="ration_card_number"
                            outlined
                            v-model="form.ration_card_number"
                            :error="!form.errors.ration_card_number===false"
                            :error-message="form.errors.ration_card_number"
                            dense
                            label="Ration Card Number *">

                        </q-input>
                    </div>
                    <div class="col-xs-12 col-md-5">

                        <q-file
                            v-model="form.ration_card_file"
                            :error="!form.errors.ration_card_path===false"
                            :error-message="form.errors.ration_card_path"
                            label="Upload Ration Card(Below <3MB)"
                            color="green"
                            dense
                            outlined
                            counter
                            max-file-size="3145728"
                            @update:model-value="uploadRationFile"
                            @rejected="onFileRejected"
                        >
                            <template v-slot:prepend>
                                <q-icon name="attach_file" />
                            </template>
                        </q-file>
                    </div>
                </div>
                <div>Schemes Applied by Farmer</div>
                <div class="row q-pt-md justify-center">
                    <div class="col-xs-12 col-md-11">
                        <q-select v-model="form.scheme_id" :error="!form.errors.scheme_id === false"
                                  :error-message="form.errors.scheme_id" :options="schemes" dense
                                  option-label="scheme_name" option-value="scheme_name"  stack-label
                                  clearable
                                  label=" Scheme Name *" outlined color="green" >
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
                    <div class=" col-xs-12 col-md-11">
                        <q-btn
                            class="text-white"
                            rounded
                            label="Add Scheme"
                            style="background-color: #2e6525"
                            @click="addMore"
                        />
                    </div>
                </div>
                <template v-for="(scheme,index) in form.schemeApplied">
                    <div  class="row justify-around">
                        <div class="col-xs-12 col-md-5">
                            <q-field borderless>
                                <template v-slot:control>
                                    <div class="self-center no-outline" tabindex="0">{{ scheme.scheme }}</div>
                                </template>
                                <template v-slot:append>
                                    <q-btn
                                        dense
                                        flat
                                        @click="()=>form.schemeApplied.splice(index,1)"
                                        icon="delete"
                                        color="red"
                                    />
                                </template>
                            </q-field>
                        </div>
                        <div class="col-xs-12 col-md-5">
                            <div class="row justify-around">
                                <div class="col-xs-12 col-md-5">
                                    <q-select v-model="scheme.availed"  :options="avialedList" dense
                                              option-label="label" option-value="value"  stack-label
                                              label=" Availed *" outlined >
                                        <template v-slot:no-option>
                                            <q-item>
                                                <q-item-section class="text-gresy">
                                                    No results
                                                </q-item-section>
                                            </q-item>
                                        </template>
                                    </q-select>
                                </div>

                                <div   class="col-xs-12 col-md-5">
                                    <q-input
                                        name="benefit_amount"
                                        outlined
                                        v-model="scheme.amount"
                                        :error="!form.errors.ration_card_number===false"
                                        :error-message="form.errors.ration_card_number"
                                        dense
                                        label="Benefit Amt. (till date)">
                                    </q-input>
                                </div>
                            </div>

                        </div>

                    </div>
                </template>
                <div class="q-pb-md q-pt-md">Kisan Credit Card</div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <div class="row">
                            <div class="col-xs-6">
                                KCC Availed by Farmer
                            </div>
                            <div class="col-xs-6">
                                <q-option-group
                                    v-model="form.is_kcc_availed"
                                    :options="options"
                                    color="primary"
                                    inline
                                />
                            </div>
                        </div>


                    </div>
                    <div class="col-xs-12 col-md-5">

                    </div>
                </div>

                <div v-if="checkKCC==='Yes'">
                    <div>KCC Details</div>
                    <div class="row justify-around">
                        <div class="col-xs-12 col-md-5">
                            <q-input
                                outlined
                                v-model="form.kcc_card_no"
                                :error="!form.errors.kcc_card_no===false"
                                :error-message="form.errors.kcc_card_no"
                                dense
                                label="KCC Card Number ">
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-5">
                            <q-input
                                outlined
                                v-model="form.kcc_renew_or_new"
                                :error="!form.errors.kcc_renew_or_new===false"
                                :error-message="form.errors.kcc_renew_or_new"
                                dense
                                label="KCC Renew/New ">
                            </q-input>
                        </div>
                    </div>
                    <div class="row justify-around">
                        <div class="col-xs-12 col-md-5">
                            <q-input
                                outlined
                                v-model="form.bank_name"
                                :error="!form.errors.bank_name===false"
                                :error-message="form.errors.bank_name"
                                dense
                                label="Bank Name ">
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-5">
                            <q-input
                                outlined
                                v-model="form.branch_name"
                                :error="!form.errors.branch_name===false"
                                :error-message="form.errors.branch_name"
                                dense
                                label="Branch Name ">
                            </q-input>
                        </div>
                    </div>
                    <div class="row justify-around">
                        <div class="col-xs-12 col-md-5">
                            <q-input
                                outlined
                                v-model="form.year_of_amount_sanction"
                                :error="!form.errors.year_of_amount_sanction===false"
                                :error-message="form.errors.year_of_amount_sanction"
                                dense
                                label="Year of sanctioning the amount">
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-5">
                            <q-input
                                outlined
                                v-model="form.amount_sanction"
                                :error="!form.errors.amount_sanction===false"
                                :error-message="form.errors.amount_sanction"
                                dense
                                label="Amount Sanctioned(in Rs)">
                            </q-input>
                        </div>
                    </div>
                </div>
                <div v-else></div>

<!--                SUPPORTING DOCUMENTS-->

                <div class="q-pb-md">Supporting Documents</div>

                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-file
                            v-model="form.aadhaar_card_file"
                            :error="!form.errors.aadhaar_card_path===false"
                            :error-message="form.errors.aadhaar_card_path"
                            label="Upload Aadhaar Card (Below <3Mb)"
                            color="green"
                            dense
                            outlined
                            counter
                            max-file-size="3145728"
                            @update:model-value="uploadAadhaar"
                            @rejected="onFileRejected"
                        >
                            <template v-slot:prepend>
                                <q-icon name="attach_file" />
                            </template>
                        </q-file>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <q-file
                            v-model="form.bank_passbook_file"
                            :error="!form.errors.bank_passbook_path===false"
                            :error-message="form.errors.bank_passbook_path"
                            label="Upload Bank Passbook (Below <3Mb)"
                            color="green"
                            dense
                            counter
                            outlined
                            max-file-size="3145728"
                            @update:model-value="uploadPassbook"
                            @rejected="onFileRejected"
                        >
                            <template v-slot:prepend>
                                <q-icon name="attach_file" />
                            </template>
                        </q-file>
                    </div>
                </div>
<!--                ENUMERATOR DETAILS-->

            <div class="q-pt-md q-pb-md">Enumerator Details</div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            readonly
                            clearable
                            v-model="form.date_of_data_collection"
                            dense
                            :rules="['date']"
                            label="Date of Data Collection *"
                            outlined
                            color="green"
                            :error="!form.errors.date_of_data_collection===false"
                            :error-message="form.errors.date_of_data_collection"
                        >
                            <template v-slot:append>
                                <q-icon name="event" class="cursor-pointer">
                                    <q-popup-proxy cover transition-show="scale" transition-hide="scale">
                                        <q-date
                                            mask="DD-MM-YYYY"
                                            v-model="form.date_of_data_collection"
                                            minimal
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
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            type="textarea"
                            color="green"
                            outlined
                            v-model="form.remarks"
                            :error="!form.errors.remarks===false"
                            :error-message="form.errors.remarks"
                            dense
                            label="Remarks *">
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
                    <!--                <q-btn-->
                    <!--                    @click="e=>$inertia.get(route('farmer-details'))"-->
                    <!--                    flat-->
                    <!--                    rounded-->
                    <!--                    label="Confirm"-->
                    <!--                    style="padding: 5px 30px 5px;background-color: #2e6525;color: white;"-->
                    <!--                />-->
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
const form=useForm({
    farmers_id:props.farmer_id,
    ration_card_number:'',
    ration_card_path:'',
    ration_card_file:'',
    scheme_id:'',
    schemeApplied:[],
    is_kcc_availed:'No',
    kcc_card_no:'',
    kcc_renew_or_new:'',
    bank_name:'',
    branch_name:'',
    year_of_amount_sanction:'',
    amount_sanction:'',
    aadhaar_card_path:'',
    aadhaar_card_file:'',
    bank_passbook_path:'',
    bank_passbook_file:'',
    verifier_name:'',
    date_of_data_collection:'',
    designation:'',
    place:'',
    remarks:'',
});
const props=defineProps({
    'farmer_id':Object,
    'schemes':[],
});
const avialedList=[
    'Yes','No'
]
const options=[
    {
        label:'Yes',
        value:'Yes'
    },
    {
        label:'No',
        value:'No'
    }
]
const addMore=()=>{
    if(form.scheme_id===''){
        q.notify({
            message:'Please select Scheme Applied'
        })
    }else{
        form.schemeApplied.push({
            schemes_id:form.scheme_id.id,
            scheme:form.scheme_id.scheme_name,
            availed:'Yes',
            amount:''
        })
    }
}
const toFarmerDetails=()=>{
    router.get(route('farmer-details',props.farmerId));
}
const checkKCC=computed((e)=>form.is_kcc_availed);

const submit=()=>{

    form.post(route('additional-farmer-details.store'),{
        onStart:()=>{
            q.loading.show();
        },
        onSuccess:()=>{
            q.loading.hide();
            q.notify({
                message:'Submitted Successfully'
            });
        },
        onError:()=>{
            q.loading.hide();
        }
    })
}
const uploadRationFile=(files)=>{
    const formData = new FormData()
    formData.append('ration_card_document',form.ration_card_file );
    q.loading.show({
        message:'File uploading......'
    });
    axios.post(route('upload-ration-card'), formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then((response) => {
        q.loading.hide();
        form.ration_card_path=response.data.data;
        console.log(form.ration_card_path)
        q.notify({
            type: 'positive',
            message: `File Uploaded Successfully`
        })
    }).catch((ex)=>{
        q.notify({
            type: 'negative',
            message: ex
        })
    });
}
const uploadAadhaar=()=>{
    const formData = new FormData()
    formData.append('aadhaar_card_document',form.aadhaar_card_file);
    q.loading.show({
        message:'File uploading......'
    });
    axios.post(route('upload-aadhaar-card'), formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then((response) => {
        q.loading.hide();
        form.aadhaar_card_path=response.data.data;
        q.notify({
            type: 'positive',
            message: `File Uploaded Successfully`
        })
    }).catch((ex)=>{
        console.log(ex);
        q.notify({
            type: 'negative',
            message: ex
        })
    });
}
const uploadPassbook=()=>{
    const formData = new FormData()
    formData.append('bank_passbook_document',form.bank_passbook_file);
    q.loading.show({
        message:'File uploading......'
    });
    axios.post(route('upload-bank-passbook'), formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then((response) => {
        q.loading.hide();
        form.bank_passbook_path=response.data.data;
        q.notify({
            type: 'positive',
            message: `File Uploaded Successfully`
        })
    }).catch((ex)=>{
        console.log(ex);
        q.notify({
            type: 'negative',
            message: ex
        })
    });
}
const onFileRejected=(message)=>{
    q.notify({
        type: 'negative',
        message: `${message.length} file(s) did not pass validation constraints`
    })
}
</script>

<style scoped>

</style>
