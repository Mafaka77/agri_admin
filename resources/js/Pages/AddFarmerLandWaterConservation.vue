<template>
    <div class="row justify-center">
        <div class="col-xs-12 col-md-9 col-xl-7 q-pa-xl" style="background-color: white">
            <div class=" " style="color:#2e6525 ">
                <q-btn  size="12px"  flat dense icon="arrow_back" label="Back" @click="e=>$inertia.get(route('farmer-details',form.farmers_id))" />
            </div>
            <div class="q-pt-md text-lg">Land Resource, Soil & Water Conservation Details</div>
            <div class="q-gutter-x-md column">
                <form @submit.prevent="submit" method="POST">
                    <div class="row justify-around q-mt-md">
                        <div class="col-xs-12 col-md-5">
                            <q-input
                                name="full_name"
                                standout
                                v-model="form.owner_id"
                                :error="!form.errors.owner_id===false"
                                :error-message="form.errors.owner_id"
                                dense
                                filled
                                label="Owner ID No">
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-5">
                            <q-input
                                name="full_name"
                                standout
                                v-model="form.location"
                                :error="!form.errors.location===false"
                                :error-message="form.errors.location"
                                dense
                                filled
                                label="Location *">
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-5">
                            <q-select v-model="form.crops_id" :error="!form.errors.crops_id=== false"
                                      :error-message="form.errors.crops_id" :options="landCrops" dense
                                      option-label="crop_name" option-value="id" multiple use-chips stack-label
                                      label=" Crops Grown*" filled outlined  >
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
                                mask="#.#"
                                fill-mask="0"
                                reverse-fill-mask
                                name="full_name"
                                filled
                                outlined
                                v-model="form.total_area"
                                :error="!form.errors.total_area===false"
                                :error-message="form.errors.total_area"
                                dense
                                label="Total Area Sown (Acres) *">
<!--                                <template v-slot:prepend>-->
<!--                                    <q-select v-model="form.crops_acres_or_hectares" :options="areaOptions" label="Area" dense borderless option-value="value" option-label="label" emit-value/>-->
<!--                                </template>-->
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
                            @click="e=>$inertia.get(route('farmer-details',props.farmerId))"
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


const form=useForm({
    farmers_id:props.farmerId,
    owner_id:'',
    location:'',
    crops_id:[],
    total_area:'',
    crops_acres_or_hectares:'Acres',
});
const areaOptions=[
    {
        label:'Acres',
        value:'Acres'
    },
    {
        label: 'Hectares',
        value: 'Hectares'
    }
];
const props=defineProps({
    'landCrops':[],
    'farmerId':Object,
});
const submit=()=>{
    form.transform(data=>({
        crop_ids:data.crops_id.map(e=>e.id),...data
    })).post(route('land-water-conservation.store'),{
        onStart:()=>{
            q.loading.show();
        },
        onSuccess:()=>{
            q.loading.hide();
            q.notify({
                message:'Successfully Submitted',
                closeBtn:true,
            })
        },
        onError:(err)=>{
            q.loading.hide();
            q.notify({
                message:'Error Occured!',
                closeBtn:true,
            })
        },
        onFinish:()=>{
            q.loading.hide();
        }
    });
}
</script>


<style scoped>

</style>
