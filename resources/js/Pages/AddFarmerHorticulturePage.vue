<template>
    <div class="row justify-center">
    <div class="col-md-9 col-xl-7 q-pa-md" style="background-color: white">
        <q-breadcrumbs>
            <q-breadcrumbs-el icon="home" @click="e=>$inertia.get(route('manage-farmer'))"/>
            <q-breadcrumbs-el  label="Farmer Details" icon="add_task"  @click="toFarmerDetails"/>
            <q-breadcrumbs-el label="Horticulture Sector" icon="list" />
        </q-breadcrumbs>
        <div class="q-pt-md text-lg">Horticulture Farm Details</div>
        <div class="q-gutter-x-md column">
            <form @submit.prevent="submit" method="POST">
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            outlined
                            v-model="form.farmer_horticulture_id"
                            :error="!form.errors.farmer_horticulture_id===false"
                            :error-message="form.errors.farmer_horticulture_id"
                            dense
                            label="Farmer Horticulture ID *">
                        </q-input>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            name="location"
                            outlined
                            v-model="form.location"
                            :error="!form.errors.location===false"
                            :error-message="form.errors.location"
                            dense
                            label="Location *">
                        </q-input>
                    </div>
                </div>

<!--                CROPS DETAILS-->
                <div>Crop Details</div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-select v-model="form.kharif_crops_id" :error="!form.errors.kharif_crops_id === false"
                                  :error-message="form.errors.kharif_crops_id" :options="kharifCrops" dense
                                  option-label="kharif_crops_name" option-value="id" multiple use-chips stack-label
                                  label=" Crops Grown(Kharif)"  outlined >
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
                            name="full_name"
                            outlined
                            v-model="form.kharif_total_area"
                            :error="!form.errors.kharif_total_area===false"
                            :error-message="form.errors.kharif_total_area"
                            dense
                            label="Total Area Sown(Kharif) *">
<!--                            <template v-slot:prepend>-->
<!--                                <q-select v-model="form.kharif_acres_or_hectares" :options="areaOptions" label="Area" dense borderless option-value="value" option-label="label" emit-value/>-->
<!--                            </template>-->
                        </q-input>
                    </div>
                </div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-select v-model="form.rabi_crops_id" :error="!form.errors.rabi_crops_id === false"
                                  :error-message="form.errors.rabi_crops_id" :options="rabiCrops" dense
                                  option-label="rabi_crops_name" option-value="id" multiple use-chips stack-label
                                  label=" Crops Grown(Rabi)" outlined  >
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
                            name="full_name"
                            outlined
                            v-model="form.rabi_total_area"
                            :error="!form.errors.rabi_total_area===false"
                            :error-message="form.errors.rabi_total_area"
                            dense
                            label="Total Area Sown(Rabi)">
<!--                            <template v-slot:prepend>-->
<!--                                <q-select v-model="form.rabi_acres_or_hectares" :options="areaOptions" label="Area" dense borderless option-value="value" option-label="label" emit-value/>-->
<!--                            </template>-->
                        </q-input>
                    </div>
                </div>
<!--                ORCHARDS AND PLANTATION-->
                <div>Orchards and Plantation Details</div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-select v-model="form.orchards_id" :error="!form.errors.orchards_id === false"
                                  :error-message="form.errors.orchards_id" :options="orchards" dense
                                  option-label="orchards_name" option-value="id" multiple use-chips stack-label
                                  label=" Orchards" outlined  >
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
                        <q-select v-model="form.plantation_id" :error="!form.errors.plantation_id === false"
                                  :error-message="form.errors.plantation_id" :options="plantation" dense
                                  option-label="plantation_name" option-value="id" multiple use-chips stack-label
                                  label=" Plantation" outlined  >
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
<!--                GREEN HOUSE PANTATION-->
                <div>Greenhouse/Protected Cultivation</div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-select v-model="form.green_house_id" :error="!form.errors.green_house_id === false"
                                  :error-message="form.errors.green_house_id" :options="greenHouse" dense
                                  option-label="name" option-value="id" multiple use-chips stack-label
                                  label="Plants Grown" outlined  >
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
                            outlined
                            v-model="form.total_greenhouse_area"
                            :error="!form.errors.total_greenhouse_area===false"
                            :error-message="form.errors.total_greenhouse_area"
                            dense
                            label="Total Greenhouse Area">
                            <!--                            <template v-slot:prepend>-->
                            <!--                                <q-select v-model="form.rabi_acres_or_hectares" :options="areaOptions" label="Area" dense borderless option-value="value" option-label="label" emit-value/>-->
                            <!--                            </template>-->
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
    farmer_horticulture_id:'',
    location:'',
    kharif_crops_id:[],
    kharif_total_area:'',
    kharif_acres_or_hectares:'Acres',
    rabi_crops_id:[],
    rabi_total_area:'',
    rabi_acres_or_hectares:'Acres',
    orchards_id:[],
    plantation_id:[],
    green_house_id:[],
    total_greenhouse_area:'',
});
const props=defineProps({
    'farmer_id':Object,
    'kharifCrops':[],
    'rabiCrops':[],
    'orchards':[],
    'plantation':[],
    'greenHouse':[],
})
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

const submit=()=>{
    form.transform(data=>({
        kharif_crop_ids:data.kharif_crops_id.map(e=>e.id),
        rabi_crop_ids:data.rabi_crops_id.map(e=>e.id),
        orchard_ids:data.orchards_id.map(e=>e.id),
        plantation_ids:data.plantation_id.map(e=>e.id),
        greenhouse_ids:data.green_house_id.map(e=>e.id),
            ...data
    })).post(route('farmer-horticulture-land.store'),{
                onStart:()=>q.loading.show(),
                onFinish:()=>{
                    q.loading.hide();
                    q.notify({
                        message:'Successfully Added'
                    })
                },
                onError:(err)=>{
                    q.loading.hide();
                    q.notify({
                        message:'Error Occured'
                    });
                }
    });
}
</script>

<style scoped>

</style>
