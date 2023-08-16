<template>
    <div class="row justify-center">


    <div class="col-md-9 col-xl-7">
        <div class="q-gutter-x-md column">
            <div class="row justify-between q-col-gutter-sm">
                <div class="col-xs-12 col-md-4 text-center">
                    <q-card flat bordered>
                        <q-card-section class="text-h6">Total Farmers</q-card-section>
                        <q-card-section class="text-h4 text-bold">{{farmerCounts}}</q-card-section>
                    </q-card>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="col-xs-12 col-md-4 text-center">
                        <q-card flat bordered>
                            <q-card-section  class=" text-h6">Total District</q-card-section>
                            <q-card-section class="text-h4 text-bold">{{districtCounts}}</q-card-section>
                        </q-card>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="col-xs-12 col-md-4 text-center">
                        <q-card flat bordered>
                            <q-card-section  class="text-h6">Total Village</q-card-section>
                            <q-card-section class="text-h4 text-bold">{{villageCounts}}</q-card-section>
                        </q-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import {useQuasar} from "quasar";
import {router, useForm} from "@inertiajs/vue3";
const q=useQuasar();

const props=defineProps({
    'farmerCounts':Object,
    'villageCounts':Object,
    'districtCounts':Object
});
</script>

<style scoped>

</style>
