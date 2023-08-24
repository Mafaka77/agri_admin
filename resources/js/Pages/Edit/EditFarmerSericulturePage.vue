<template>
    <div class="row justify-center">
    <div class="col-xs-12 col-md-9 col-xl-7 q-pa-md" style="background-color: white">
        <q-breadcrumbs>
            <q-breadcrumbs-el icon="home" @click="e=>$inertia.get(route('manage-farmer'))"/>
            <q-breadcrumbs-el label="Sericulture" icon="person" />
        </q-breadcrumbs>
        <div class="q-pt-md text-lg">Animal Husbandry Details</div>
        <div class="q-gutter-x-md column">
            <form @submit.prevent="submit" method="POST">
                <div class="row justify-around q-mt-md">
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            name="full_name"
                            standout
                            v-model="form.sericulture_id"
                            :error="!form.errors.sericulture_id===false"
                            :error-message="form.errors.sericulture_id"
                            dense
                            filled
                            label="Sericulture ID">
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
                </div>
                <div>Sericulture Farm Details</div>
                <div class="row justify-around q-mt-md">
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            name="full_name"
                            filled
                            outlined
                            v-model="form.total_area"
                            :error="!form.errors.total_area===false"
                            :error-message="form.errors.total_area"
                            dense
                            label="Total Farm Area *">
                        </q-input>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            name="full_name"
                            standout
                            v-model="form.size_of_rearing_unit"
                            :error="!form.errors.size_of_rearing_unit===false"
                            :error-message="form.errors.size_of_rearing_unit"
                            dense
                            filled
                            label="Size of Rearing Unit(in sqft) *">
                        </q-input>
                    </div>
                </div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-select v-model="form.silkworm_id" :error="!form.errors.silkworm_id=== false"
                                  :error-message="form.errors.silkworm_id" :options="silkWorm" dense
                                  option-label="silkworm_name" option-value="id" multiple use-chips stack-label
                                  label="Silkworms Reared" filled outlined  >
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
                            filled
                            outlined
                            v-model="form.plantation_total_area"
                            :error="!form.errors.plantation_total_area===false"
                            :error-message="form.errors.plantation_total_area"
                            dense
                            label="Area occupied by Silkworm feed plantation">
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
const form=useForm({
    farmers_id:props.sericulture.farmers_id,
    sericulture_id:props.sericulture.sericulture_id,
    location:props.sericulture.location,
    acres_or_hectares:'Acres',
    total_area:props.sericulture.total_area,
    size_of_rearing_unit:props.sericulture.size_of_rearing_unit,
    plantation_acres_or_hectares:'Acres',
    plantation_total_area:props.sericulture.plantation_total_area,
    silkworm_id:props.sericulture.silkworm,
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
    'farmers_id':Object,
    'silkWorm':[],
    'sericulture':[],
});
const submit=()=>{
    form.transform(data=>({
        silkworm_ids:data.silkworm_id.map(e=>e.id),
        ...data
    })).put(route('sericulture.update',props.sericulture.id),{
        onStart:()=>q.loading.show(),
        onSuccess:()=>{
            q.loading.hide();
            q.notify({
                message:'Submitted Successfully',
                closeBtn:true,
                icon:'check',
                iconColor:'blue'
            })
        },
        onError:(err)=>{
            q.loading.hide()
        }
    })
}
</script>

<style scoped>

</style>
