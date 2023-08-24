<template>
    <div class="row justify-center">
        <div class="col-xs-12 col-md-9 col-xl-7">
            <div class="column">
                <div class="q-col-gutter-lg">
                    <div class="row justify-between q-col-gutter-sm">
                        <div class="col-xs-12 col-md-4">
                            <q-card flat bordered>
                                <q-card-section class="text-h4 text-bold" style="color: #cd9f27">{{totalFarmerRegistered}}</q-card-section>
                                <q-card-section class="text-h7">Total Farmers Registered</q-card-section>
                            </q-card>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="col-xs-12 col-md-4">
                                <q-card flat bordered>
                                    <q-card-section class="text-h4 text-bold" style="color: #cd9f27">{{totalEnumerators}}</q-card-section>
                                    <q-card-section  class=" text-h7">Total Enumerators </q-card-section>
                                </q-card>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="col-xs-12 col-md-4">
                                <q-card flat bordered>
                                    <q-card-section class="text-h4 text-bold" style="color: #424242">{{totalSupervisors}}</q-card-section>
                                    <q-card-section  class="text-h7">Total Supervisors</q-card-section>
                                </q-card>
                            </div>
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
    'totalFarmerRegistered':Object,
    'totalSupervisors':Object,
    'totalEnumerators':Object,
});
</script>

<style scoped>

</style>
