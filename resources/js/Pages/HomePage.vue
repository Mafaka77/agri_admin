<template>
    <div class="row justify-center">
    <div class="col-md-9 col-xl-7">
        <div class="column">
            <div class="row justify-between q-col-gutter-sm">
                <div class="col-xs-12 col-md-4 text-center">
                    <q-card flat bordered>
                        <q-card-section class="text-h4 text-bold">{{unSubmitted}}</q-card-section>
                        <q-card-section class="text-h6">Unsubmitted Registration</q-card-section>
                    </q-card>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="col-xs-12 col-md-4 text-center">
                        <q-card flat bordered>
                            <q-card-section class="text-h4 text-bold">{{pendingApproval}}</q-card-section>
                            <q-card-section  class=" text-h6">Pending for Approval</q-card-section>
                        </q-card>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="col-xs-12 col-md-4 text-center">
                        <q-card flat bordered>
                            <q-card-section class="text-h4 text-bold">{{totalApproved}}</q-card-section>
                            <q-card-section  class="text-h6">Total Approved</q-card-section>
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
    'unSubmitted':Object,
    'pendingApproval':Object,
    'totalApproved':Object
});
const tabs=ref('dashboard');
</script>

<style scoped>

</style>
