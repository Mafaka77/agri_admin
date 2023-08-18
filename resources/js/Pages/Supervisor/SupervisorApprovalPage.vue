<template>
    <div class="row justify-center">
        <div class="col-md-9 col-xl-7 q-pa-xl" style="background-color: white">
<!--        BASIC INFORMATION-->
            <BasicInfoComponent :basic-info="basicInfo"/>
            <AgriLandComponent :agri-land="agriLand"/>
            <AdditionalComponent :additional="additional"/>
            <HorticultureComponent :horticulture="horticulture"/>
            <LandWaterComponent :land-water="landWater"/>
            <FisheriesComponent :fisheries="fisheries"/>
            <HusbandryComponent :husbandry="husbandry"/>
            <SericultureComponent :sericulture="sericulture"/>
            <q-separator/>
            <div class="row justify-center q-gutter-md q-pt-md">
<!--                <div class="col-xs-12 col-md-1">-->
<!--                    <q-btn outline label="BACK" style="color: #588052"/>-->
<!--                </div>-->
                <div class="col-xs-6 col-md-1">
                    <q-btn outline label="REJECT" style="color: red" @click="rejectDialog(basicInfo.id)"/>
                </div>
                <div class="col-xs-6 col-md-1">
                    <q-btn flat text-color="white" label="APPROVE" style="background-color: #588052" @click="basicInfo.verification==='Approved'?openDialog(): approve(basicInfo.id)"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import {useQuasar} from "quasar";
import {router, useForm} from "@inertiajs/vue3";
import BasicInfoComponent from "@/Components/Supervisor/BasicInfoComponent.vue";
import AgriLandComponent from "@/Components/Supervisor/AgriLandComponent.vue";
import AdditionalComponent from "@/Components/Supervisor/AdditionalComponent.vue";
import HorticultureComponent from "@/Components/Supervisor/HorticultureComponent.vue";
import LandWaterComponent from "@/Components/Supervisor/LandWaterComponent.vue";
import FisheriesComponent from "@/Components/Supervisor/FisheriesComponent.vue";
import HusbandryComponent from "@/Components/Supervisor/HusbandryComponent.vue";
import SericultureComponent from "@/Components/Supervisor/SericultureComponent.vue";
const q=useQuasar();
const props=defineProps({
    'basicInfo':Object,
    'agriLand':[],
    'additional':Object,
    'horticulture':[],
    'landWater':[],
    'fisheries':[],
    'husbandry':[],
    'sericulture':[],
});
const rejectionNote=ref('');
const approve=(id)=>{
    q.dialog({
        dark: true,
        title: 'Confirm',
        message: 'Approve Farmer?',
        cancel: true,
        persistent: true
    }).onOk(() => {
        // console.log('>>>> OK')
    }).onOk(() => {
        router.get(route('approve-farmer',id),{},{
            onStart:q.loading.show(),
            onSuccess:()=>{
                q.loading.hide();
                q.notify({
                    message:'Farmer Approved',
                    closeBtn:true,
                    icon:'check',
                    iconColor:'blue'
                })
            },
            onError:()=>{
                q.loading.hide();
                q.notify({
                    message:'Error Occured',
                    closeBtn:true,
                    icon:'warning',
                    iconColor:'red'
                })
            }
        });
    }).onCancel(() => {
        // console.log('>>>> Cancel')
    }).onDismiss(() => {
        // console.log('I am triggered on both OK and Cancel')
    })

}
const rejectDialog=(id)=>{
    q.dialog({
        dark: true,
        title: 'Rejection',
        message: 'Rejection Reason',
        prompt: {
            model: rejectionNote,
            type: 'text' // optional
        },
        cancel: true,
        persistent: true
    }).onOk(data => {
        router.get(route('reject-farmer',id),{
            'data':rejectionNote.value
        },{
            onStart:()=>q.loading.show(),
            onSuccess:()=>{
                q.loading.hide();
                q.notify({
                    message:'Farmer Rejected',
                    closeBtn:true,
                    icon:'warning',
                    iconColor:'red'
                })
            },
            onError:()=>{
                q.loading.hide();
                q.notify({
                    message:'Error Occured',
                    closeBtn:true,
                    icon:'warning',
                    iconColor:'red'
                })
            },
            preserveState:false,
        })
    }).onCancel(() => {
        // console.log('>>>> Cancel')
    }).onDismiss(() => {
        // console.log('I am triggered on both OK and Cancel')
    })
}
const openDialog=()=>{
       q.notify({
           message:'Farmer already Approved',
           icon:'check',
           iconColor:'green',
           closeBtn:true
       })
}
</script>

<style scoped>

</style>
