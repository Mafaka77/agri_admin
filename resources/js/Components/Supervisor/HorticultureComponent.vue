<template>
    <div v-for="horti in horticulture">
        <q-expansion-item label="Horticulture Details" expand-separator>
            <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                            <div class="col-xs-6 col-md-2">
                                <div style="color: #588052">Horticulture ID</div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <div>{{horti.farmer_horticulture_id}}</div>
                            </div>
                            <div class="col-xs-6 col-md-2">
                                <div style="color: #588052">Location</div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <div>{{horti.location}}</div>
                            </div>
            </div>
<!--            KHARIF-->
            <div class="row justify-start q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Crops Grown (Kharif)</div>
                </div>
                <div class="row col-xs-6 col-md-3">
                    <div v-for="kharif in horti.farmer_horti_kharif_crops">
                        <q-chip text-color="white" style="background-color:#588052">{{kharif.kharif_crops_name}}</q-chip>
                    </div>

                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Area Sown(Kharif)</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{horti.kharif_total_area}} Acres</div>
                </div>
                <div class="col-xs-6 col-md-2">

                </div>
                <div class="col-xs-6 col-md-3">
                </div>
            </div>
<!--            RABI-->
            <div class="row justify-start q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Crops Grown (Rabi)</div>
                </div>
                <div class="row col-xs-6 col-md-3">
                    <div v-for="kharif in horti.farmer_horti_rabi_crops">
                        <q-chip text-color="white" style="background-color:#588052">{{kharif.rabi_crops_name}}</q-chip>
                    </div>

                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Area Sown(Rabi)</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{horti.rabi_total_area}} Acres</div>
                </div>
                <div class="col-xs-6 col-md-2">

                </div>
                <div class="col-xs-6 col-md-3">
                </div>
            </div>
<!--            ORCHARDS GROWN-->
            <div class="row justify-start q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Orchards Grown</div>
                </div>
                <div class="row col-xs-6 col-md-3">
                    <div v-for="orchard in horti.farmer_orchids">
                        <q-chip text-color="white" style="background-color:#588052">{{orchard.orchards_name}}</q-chip>
                    </div>

                </div>
            </div>
<!--            PLANTATION -->
            <div class="row justify-start q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Plantation Grown</div>
                </div>
                <div class="row col-xs-6 col-md-3">
                    <div v-for="plantation in horti.farmer_plantation">
                        <q-chip text-color="white" style="background-color:#588052">{{plantation.plantation_name}}</q-chip>
                    </div>

                </div>
            </div>
<!--            GREEN HOUSE PLANTS-->
            <div class="row justify-start q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Green House Grown</div>
                </div>
                <div class="row col-xs-6 col-md-3">
                    <div v-for="greenhouse in horti.green_house_plants">
                        <q-chip text-color="white" style="background-color:#588052">{{greenhouse.name}}</q-chip>
                    </div>

                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Area (Green House)</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{horti.total_greenhouse_area==null?'N/A':horti.total_greenhouse_area}} {{horti.total_greenhouse_area==null?'': Acres }}</div>
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
    'horticulture':Object,
});
</script>

<style scoped>

</style>
