<template>
    <div v-for="agri in agriLand">
        <q-expansion-item label="Agriculture Land Details">
            <div class="row justify-between q-pa-md q-gutter-y-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Agri Farmer ID</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{agri.farmer_agri_id}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Land Owner</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{agri.land_owner_name}}</div>
                </div>
            </div>
            <!--            SECOND-->
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Total Farm Area</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{agri.area_of_land}} Acres</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Land Holding</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{agri.land_holding.land_holding_name}}</div>
                </div>
            </div>
            <!--                THIRD-->
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">District</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{agri.district.district_name}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Sub Division</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{agri.sub_division.sub_division_name}}</div>
                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Block</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{agri.block.block_name}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Village</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{agri.village.village_name}}</div>
                </div>
            </div>
            <q-separator/>
<!--            OWNERSHIP-->
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Ownership Type</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{agri.ownership_type.ownership_type_name}}</div>
                </div>
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Document No.</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{agri.landholding_documents_number}}</div>
                </div>
            </div>
            <!--                FIFTH-->
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Ownership Documents</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <q-btn label="VIEW DOCUMENT" flat color="white" style="background-color:#588052 "></q-btn>
                </div>
                <div class="col-xs-6 col-md-2">

                </div>
                <div class="col-xs-6 col-md-3">
                </div>
            </div>
            <q-separator/>
            <div class="row justify-start q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Irrigation Infrasctructure</div>
                </div>
                <div class="row col-xs-6 col-md-9">
                    <div v-for="infras in agri.irrigation_infrastructures">
                        <q-chip style="background-color: #588052" text-color="white">
                            {{infras.irrigation_infrastructures_name}}
                        </q-chip>
                    </div>
                </div>
            </div>
            <div class="row justify-start q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Farm Machinery</div>
                </div>
                <div class="row col-xs-6 col-md-9">
                    <div v-for="equip in agri.farm_equipments">
                        <q-chip style="background-color: #588052" text-color="white">
                            {{equip.equipment_name}}
                        </q-chip>
                    </div>
                </div>
            </div>
            <div class="row justify-start q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Crops Grown(Kharif)</div>
                </div>
                <div class="row col-xs-6 col-md-9">
                    <div v-for="kharif in agri.kharif_crops">
                        <q-chip style="background-color: #588052" text-color="white">
                            {{kharif.kharif_crops_name}}
                        </q-chip>
                    </div>
                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Area Sown(Kharif)</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{agri.kharif_total_area}} Acres</div>
                </div>
                <div class="col-xs-6 col-md-2">

                </div>
                <div class="col-xs-6 col-md-3">
                </div>
            </div>
            <div class="row justify-start q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Crops Grown(Rabi)</div>
                </div>
                <div class="row col-xs-6 col-md-9">
                    <div v-for="rabi in agri.rabi_crops">
                        <q-chip style="background-color: #588052" text-color="white">
                            {{rabi.rabi_crops_name}}
                        </q-chip>
                    </div>
                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Area Sown(Rabi)</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{agri.rabi_total_area}} Acres</div>
                </div>
                <div class="col-xs-6 col-md-2">

                </div>
                <div class="col-xs-6 col-md-3">
                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Oil Palm Plantation</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{agri.oil_palm_plantation==1?'Yes':'No'}}</div>
                </div>
                <div class="col-xs-6 col-md-2">

                </div>
                <div class="col-xs-6 col-md-3">
                </div>
            </div>
            <div class="row justify-between q-pa-md q-gutter-y-md">
                <div class="col-xs-6 col-md-2">
                    <div style="color: #588052">Oil Palm Area Sown</div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div>{{agri.oil_palm_area==null?'N/A':agri.oil_palm_area}}{{ agri.oil_palm_area == null ? '' : Acres }}</div>
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
    'agriLand':Object,
});
</script>

<style scoped>

</style>
