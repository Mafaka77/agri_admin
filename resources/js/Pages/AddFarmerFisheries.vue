<template>
    <div class="row justify-center">
        <div class="col-xs-12 col-md-9 col-xl-7 q-pa-xl" style="background-color: white">
<!--            <q-breadcrumbs>-->
<!--                <q-breadcrumbs-el icon="home" @click="e=>$inertia.get(route('manage-farmer'))"/>-->
<!--                <q-breadcrumbs-el label="Fisheries" icon="person" />-->
<!--            </q-breadcrumbs>-->
            <div class=" " style="color:#2e6525 ">
                <q-btn  size="12px"  flat dense icon="arrow_back" label="Back" @click="e=>$inertia.get(route('farmer-details',form.farmers_id))" />
            </div>
            <div class="q-pt-md text-lg">Farmer Fisheries Details</div>
            <div class="q-gutter-x-md column">
                <form @submit.prevent="submit" method="POST">
                    <div class="row justify-around q-mt-md">

                        <div class="col-xs-12 col-md-5">
                            <q-input
                                name="full_name"
                                outlined
                                v-model="form.fisheries_id"
                                :error="!form.errors.fisheries_id===false"
                                :error-message="form.errors.fisheries_id"
                                dense
                                label="Owner ID No ">
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-5">
                            <q-input
                                name="full_name"
                                outlined
                                v-model="form.location"
                                :error="!form.errors.location===false"
                                :error-message="form.errors.location"
                                dense
                                label="Location *">
                            </q-input>
                        </div>
                    </div>
                    <div>Fish Pond Details</div>
                    <div class="row justify-around q-gutter-y-md q-mt-md">
                        <div class="col-xs-12 col-md-2">
                            <q-input
                                min="0"
                                type="number"
                                outlined
                                v-model="form.nursery_ponds"
                                dense
                                label="Nursery Pond">
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-2">
                            <q-input
                                min="0"
                                type="number"
                                outlined
                                v-model="form.rearing_ponds"
                                dense
                                label="Rearing Pond">
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-2">
                            <q-input
                                min="0"
                                type="number"
                                outlined
                                v-model="form.grew_out_ponds"
                                dense
                                label="Grow out Pond">
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-2">
                            <q-input
                                type="number"
                                readonly
                                outlined
                                v-model="form.total_ponds"
                                :error="!form.errors.total_ponds===false"
                                :error-message="form.errors.total_ponds"
                                dense
                                label="Total No of Pond">
                            </q-input>
                        </div>
                    </div>
                    <div class="row justify-around">
                        <div class="col-xs-12 col-md-5">
                            <q-input
                                mask="#.#"
                                fill-mask="0"
                                reverse-fill-mask
                                outlined
                                v-model="form.total_area"
                                :error="!form.errors.total_area===false"
                                :error-message="form.errors.total_area"
                                dense
                                label="Total Area Sown *">
<!--                                <template v-slot:prepend>-->
<!--                                    <q-select v-model="form.acres_or_hectares" :options="areaOptions" label="Area" dense borderless option-value="value" option-label="label" emit-value/>-->
<!--                                </template>-->
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-5">

                        </div>
                    </div>
                    <div class="row justify-around">
                        <div class="col-xs-12 col-md-5">
                            <q-select v-model="form.fish_cultured_id" :error="!form.errors.fish_cultured_id=== false"
                                      :error-message="form.errors.fish_cultured_id" :options="fish" dense
                                      option-label="fish_name" option-value="id" multiple use-chips stack-label
                                      label="Type of Fish Cultured *"  outlined  >
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
                            <q-select v-model="form.fish_hatchery" :error="!form.errors.fish_hatchery=== false"
                                      :error-message="form.errors.fish_hatchery" :options="fishHatchery" dense emit-value
                                      fill-input
                                      option-label="label" option-value="value"
                                      label=" Fish Hatchery" outlined  >
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
                    <div class="row justify-center q-mt-md">
                        <q-btn
                            label="Back"
                            outline
                            dense
                            rounded
                            style="color:#2e6525;padding: 5px 40px 5px"
                            @click="e=>$inertia.get(route('farmer-details',props.farmers_id))"
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
    farmers_id:props.farmers_id,
    fisheries_id:'',
    location:'',
    nursery_ponds:0,
    rearing_ponds:0,
    grew_out_ponds:0,
    total_ponds:0,
    fish_cultured_id:[],
    fish_hatchery:'',
    acres_or_hectares:'Acres',
    total_area:''
});
const props=defineProps({
    'fish':[],
    'farmers_id':Object
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
const fishHatchery=[
    {
        label:'Cemented',
        value:'Cemented'
    },
    {
        label: 'FRP Hatchery',
        value: 'FRP Hatchery'
    }
];
let total=computed(e=>parseInt(form.grew_out_ponds)+parseInt(form.rearing_ponds)+parseInt(form.nursery_ponds));
form.total_ponds=total;


const submit=()=>{
    form.transform(data=>({
        fish_cultured_ids:data.fish_cultured_id.map(e=>e.id),
            ...data
    })).post(route('fisheries.store'),{
        onStart:()=>q.loading.show(),
        onFinish:()=>{
            q.loading.hide();
            q.notify({
                message:'Successfully Submitted'
            })
        },
        onError:(err)=>{
            q.loading.hide();
            q.notify({
                message:'Error Occured!!'
            })
        }
    });
}
</script>

<style scoped>

</style>
