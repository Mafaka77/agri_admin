<template>
    <div class="row justify-center">
        <div class="col-md-9 col-xl-7 q-pa-xl" style="background-color: white">
            <q-breadcrumbs>
                <q-breadcrumbs-el icon="home" @click="e=>$inertia.get(route('manage-farmer'))"/>
                <q-breadcrumbs-el label="Fisheries" icon="person" />
            </q-breadcrumbs>
            <div class="q-pt-md text-lg">Farmer Fisheries Details</div>
            <div class="q-gutter-x-md column">
                <form @submit.prevent="submit" method="POST">
                    <div class="row justify-around q-mt-md">
                        <div class="col-xs-12 col-md-5">
                            <q-input
                                name="full_name"
                                standout
                                v-model="form.fisheries_id"
                                :error="!form.errors.fisheries_id===false"
                                :error-message="form.errors.fisheries_id"
                                dense
                                filled
                                label="Owner ID No *">
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
                    <div>Fish Pond Details</div>
                    <div class="row justify-around q-mt-md">
                        <div class="col-xs-12 col-md-2">
                            <q-input
                                min="0"
                                type="number"
                                outlined
                                v-model="form.nursery_ponds"
                                :error="!form.errors.nursery_ponds===false"
                                :error-message="form.errors.nursery_ponds"
                                lazy-rules
                                :rules="[(val) => val>=0 || 'Invalid Number']"
                                dense
                                filled
                                label="Nursery Pond">
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-2">
                            <q-input
                                min="0"
                                type="number"
                                outlined
                                v-model="form.rearing_ponds"
                                :error="!form.errors.rearing_ponds===false"
                                :error-message="form.errors.rearing_ponds"
                                :rules="[(val) => val>=0 || 'Invalid ID Number']"
                                dense
                                filled
                                label="Rearing Pond">
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-2">
                            <q-input
                                min="0"
                                type="number"
                                outlined
                                v-model="form.grew_out_ponds"
                                :error="!form.errors.grew_out_ponds===false"
                                :error-message="form.errors.grew_out_ponds"
                                :rules="[(val) => val>=0 || 'Invalid ID Number']"
                                dense
                                filled
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
                                filled
                                label="Total No of Pond">
                            </q-input>
                        </div>
                    </div>
                    <div class="row justify-around">
                        <div class="col-xs-12 col-md-5">
                            <q-input
                                name="full_name"
                                filled
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
                                      label="Type of Fish Cultured *" filled outlined  >
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
                                      :error-message="form.errors.fish_hatchery" :options="fishHatchery" dense
                                      option-label="label" option-value="value"
                                      label=" Fish Hatchery" filled outlined  >
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

const form=useForm({
    farmers_id:props.fisherieData.farmers_id,
    fisheries_id:props.fisherieData.id,
    location:props.fisherieData.location,
    nursery_ponds: props.fisherieData.nursery_ponds,
    rearing_ponds:props.fisherieData.rearing_ponds,
    grew_out_ponds:props.fisherieData.grew_out_ponds,
    total_ponds:props.fisherieData.total_ponds,
    fish_cultured_id:props.fisherieData.fish,
    fish_hatchery:props.fisherieData.fish_hatchery,
    acres_or_hectares:'Acres',
    total_area:props.fisherieData.total_area,
});
const props=defineProps({
    'fish':[],
    'farmers_id':Object,
    'fisherieData':Object

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
const total=computed(e=>parseInt(form.grew_out_ponds)+parseInt(form.rearing_ponds)+parseInt(form.nursery_ponds));
form.total_ponds=total;


const submit=()=>{
    form.transform(data=>({
        fish_cultured_ids:data.fish_cultured_id.map(e=>e.id),
        ...data
    })).put(route('fisheries.update',props.fisherieData.id),{
        onStart:()=>q.loading.show(),
        onFinish:()=>{
            q.loading.hide();
            q.notify({
                message:'Successfully Update'
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
