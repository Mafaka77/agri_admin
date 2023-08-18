<template>
    <div v-for="fish in fisheries">
        <q-expansion-item label="Fisheries Details">
            <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Fisheries ID</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{fish.fisheries_id}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Location</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{fish.location}}</div>
                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Total Area</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{fish.total_area}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Total Ponds</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{fish.total_ponds}}</div>
                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Nursery Pond</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div>{{fish.nursery_ponds}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Rearing Ponds</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div>{{fish.rearing_ponds}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Grew Out Ponds</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div>{{fish.grew_out_ponds}}</div>
                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Type of Fish</div>
                </div>
                <div class="row col-xs-6 col-md-10">
                    <div v-for="fi in fish.fish">
                        <q-chip text-color="white" style="background-color:#588052 ">{{fi.fish_name}}</q-chip>
                    </div>
                </div>
                <div class="col-xs-6 col-md-2">

                </div>
                <div class="col-xs-6 col-md-3">

                </div>
            </div>
        </q-expansion-item>
    </div>
</template>

<script setup>
import {ref} from 'vue';
import {useQuasar} from "quasar";
import {router, useForm} from "@inertiajs/vue3";
const q=useQuasar();
const props=defineProps({
    'fisheries':Object,
});
</script>

<style scoped>

</style>
