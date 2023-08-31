<template>
    <div class="row justify-center">
        <div class="col-xs-12 col-md-9 col-xl-7 q-pa-md" style="background-color: white">
            <div class=" " style="color:#2e6525 ">
                <q-btn  size="12px"  flat dense icon="arrow_back" label="Back" @click="e=>$inertia.get(route('farmer-details',form.farmers_id))" />
            </div>
            <div class="q-pt-md text-lg">Animal Husbandry Details</div>
            <div class="q-gutter-x-md column">
                <form @submit.prevent="submit" method="POST">
                    <div class="row justify-around q-mt-md">
                        <div class="col-xs-12 col-md-5">
                            <q-input
                                name="full_name"
                                outlined
                                v-model="form.husbandry_id"
                                :error="!form.errors.husbandry_id===false"
                                :error-message="form.errors.husbandry_id"
                                dense

                                label="Husbandry ID">
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
                    <div class="row justify-around">
                        <div class="col-xs-12 col-md-5">
                            <q-select v-model="form.livestock_id" :error="!form.errors.livestock_id=== false"
                                      :error-message="form.errors.livestock_id" :options="livestock" dense
                                      option-label="livestock_name" option-value="id" multiple use-chips stack-label
                                      label="Livestock *"  outlined  >
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
                            <q-select v-model="form.type_of_breed" :error="!form.errors.type_of_breed=== false"
                                      :error-message="form.errors.type_of_breed" :options="typeOfBreed" dense
                                      option-label="name" option-value="id" multiple use-chips stack-label
                                      label="Type of breed *"  outlined  >
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
                        <q-select v-model="form.type_of_farm" :error="!form.errors.type_of_farm=== false"
                                  :error-message="form.errors.type_of_farm" :options="typeOfFarm" dense
                                  option-label="name" option-value="id" multiple use-chips stack-label
                                  label="Type of Farm "  outlined  >
                            <template v-slot:no-option>
                                <q-item>
                                    <q-item-section class="text-gresy">
                                        No results
                                    </q-item-section>
                                </q-item>
                            </template>
                        </q-select>
                    </div>
                        <div class="col-xs-12 col-md-5"></div>
                    </div>
                    <div class="row justify-around q-mt-md">
                        <div class="col-xs-12 col-md-2">
                            <q-input
                                min="0"
                                type="number"
                                outlined
                                v-model="form.adult_male"
                                :error="!form.errors.adult_male===false"
                                :error-message="form.errors.adult_male"
                                lazy-rules
                                :rules="[(val) => val>=0 || 'Invalid Number']"
                                dense

                                label="Adult Male ">
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-2">
                            <q-input
                                min="0"
                                type="number"
                                outlined
                                v-model="form.adult_female"
                                :error="!form.errors.adult_female===false"
                                :error-message="form.errors.adult_female"
                                :rules="[(val) => val>=0 || 'Invalid ID Number']"
                                dense

                                label="Adult Female">
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-2">
                            <q-input
                                min="0"
                                type="number"
                                outlined
                                v-model="form.young_stock"
                                :error="!form.errors.young_stock===false"
                                :error-message="form.errors.young_stock"
                                :rules="[(val) => val>=0 || 'Invalid ID Number']"
                                dense

                                label="Youngstock">
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-2">
                            <q-input
                                type="number"
                                readonly
                                outlined
                                v-model="form.total"
                                :error="!form.errors.total===false"
                                :error-message="form.errors.total"
                                dense

                                label="Total">
                            </q-input>
                        </div>
                    </div>
                    <div class="q-pt-md text-lg">Poultry Details</div>
                    <div class="row justify-around">
                        <div class="col-xs-12 col-md-5">
                            <q-select v-model="form.type_of_poultry_farm" :error="!form.errors.type_of_poultry_farm=== false"
                                      :error-message="form.errors.type_of_poultry_farm" :options="poultryFarm" dense
                                      option-label="name" option-value="id" multiple use-chips stack-label
                                      label="Type of Poultry Farm*"  outlined  >
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
                            <q-select v-model="form.type_of_poultry_breed" :error="!form.errors.type_of_poultry_breed=== false"
                                      :error-message="form.errors.type_of_poultry_breed" :options="poultryBreed" dense
                                      option-label="name" option-value="id" multiple use-chips stack-label
                                      label="Type of Poultry Breed *"  outlined  >
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
                    <div class="row justify-around q-mt-md">
                        <div class="col-xs-12 col-md-5">
                            <q-input
                                mask="#"
                                fill-mask="0"
                                reverse-fill-mask
                                outlined
                                v-model="form.no_of_poultry"
                                :error="!form.errors.no_of_poultry===false"
                                :error-message="form.errors.no_of_poultry"
                                dense

                                label="No of Poultry *">
                            </q-input>
                        </div>
                        <div class="col-xs-12 col-md-5"></div>
                    </div>
                    <div class="row justify-center q-mt-md">
                        <q-btn
                            label="Back"
                            outline
                            dense
                            rounded
                            style="color:#2e6525;padding: 5px 40px 5px"
                            @click="e=>$inertia.get(route('farmer-details',props.farmers))"
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
    farmers_id:props.farmers,
    husbandry_id:'',
    location:'',
    livestock_id:[],
    type_of_breed:[],
    type_of_farm:[],
    adult_male:0,
    adult_female:0,
    young_stock:0,
    total:0,
    type_of_poultry_farm:[],
    type_of_poultry_breed:[],
    no_of_poultry:'',
});

const props=defineProps({
    'typeOfBreed':[],
    'typeOfFarm':[],
    'poultryBreed':[],
    'poultryFarm':[],
    'livestock':[],
    'farmers':Object
})
const total=computed(e=>parseInt(form.adult_male)+parseInt(form.adult_female)+parseInt(form.young_stock));
form.total=total;

const submit=()=>{
    form.transform(data=>({
        livestock_ids:data.livestock_id.map(e=>e.id),
        type_of_breeds:data.type_of_breed.map(e=>e.id),
        type_of_farms:data.type_of_farm.map(e=>e.id),
        type_of_poultry_farms:data.type_of_poultry_farm.map(e=>e.id),
        type_of_poultry_breeds:data.type_of_poultry_breed.map(e=>e.id),
        ...data
    })).post(route('animal-husbandry.store'),{
        onStart:()=>q.loading.show(),
        onSuccess:()=>{
            q.loading.hide();
        },
        onError:()=>{
            q.loading.hide();
        }
    });
}
</script>

<style scoped>

</style>
