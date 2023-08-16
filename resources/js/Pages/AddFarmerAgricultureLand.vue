<template>
    <div class="row justify-center">


    <div class="col-md-9 col-xl-7 q-pa-xl" style="background-color: white">
        <q-breadcrumbs>
            <q-breadcrumbs-el icon="home" @click="e=>$inertia.get(route('manage-farmer'))"/>
            <q-breadcrumbs-el  label="Farmer Details" icon="add_task"  @click="toFarmerDetails"/>
            <q-breadcrumbs-el label="Add Farm Land & Agriculture Details" icon="add_circle" />
        </q-breadcrumbs>
        <div class="q-pt-md text-lg">Farm Land & Agriculture Details</div>
        <div class="q-gutter-x-md column">
            <form @submit.prevent="submit" method="POST">
                <div class="row justify-around q-pt-md q-col-gutter-y-md">
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            name="full_name"
                            outlined
                            v-model="form.farmer_agri_id"
                            dense
                            label="Farmer ID(Provided by Central Govt)">

                        </q-input>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            name="full_name"
                            outlined
                            v-model="form.land_owner_name"
                            :error="!form.errors.land_owner_name===false"
                            :error-message="form.errors.land_owner_name"
                            dense
                            label="Land Owner Name *">

                        </q-input>
                    </div>
                </div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            name="farm_area"
                            outlined
                            v-model="form.area_of_land"
                            :error="!form.errors.area_of_land===false"
                            :error-message="form.errors.area_of_land"
                            dense
                            label="Total Farm Area in (Acres) *">
<!--                            <template v-slot:prepend>-->
<!--                                <q-select v-model="form.acres_or_hectares" :options="areaOptions"-->
<!--                                          dense-->
<!--                                          borderless-->
<!--                                          option-value="value"-->
<!--                                          option-label="label"-->
<!--                                          emit-value-->
<!--                                />-->
<!--                            </template>-->
                        </q-input>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <q-select v-model="form.land_holding_id" :error="!form.errors.land_holding_id === false"
                                  :error-message="form.errors.land_holding_id" :options="landHolding" dense emit-value
                                  fill-input  hide-selected map-options option-label="land_holding_name" option-value="id"
                                  placeholder="Select LandHolding *" outlined use-input>
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
                <div>Farm Location</div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-select v-model="form.district_id" :error="!form.errors.district_id === false"
                                  :error-message="form.errors.district_id" :options="district" dense emit-value
                                  fill-input  hide-selected map-options option-label="district_name" option-value="id"
                                  placeholder="Select District *" outlined use-input @update:model-value="getSubDivision" @update:modelValue="getBlock">
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
                        <q-select v-model="form.sub_division_id" :error="!form.errors.sub_division_id === false"
                                  :error-message="form.errors.sub_division_id" :options="subDivisionList" dense emit-value
                                  :disable="isSubDivisionDisabled"
                                  fill-input hide-selected map-options option-label="sub_division_name" option-value="id"
                                  placeholder="Select Sub Division *" outlined use-input>
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
                        <q-select v-model="form.block_id" :error="!form.errors.block_id === false" :disable="isBlockDisabled"
                                  :error-message="form.errors.block_id" :options="blockList" dense emit-value
                                  fill-input  hide-selected map-options option-label="block_name" option-value="id"
                                  placeholder="Select RD Block *" outlined use-input @update:model-value="getVillage">
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
                        <q-select v-model="form.village_id" :error="!form.errors.village_id === false"
                                  :error-message="form.errors.village_id" :options="villageList" dense emit-value
                                  fill-input  hide-selected map-options option-label="village_name" option-value="id"
                                  :disable="isVillageDisabled" placeholder="Select or Search Village *" outlined use-input>
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
                        <q-input
                            name="village_locality"
                            outlined
                            v-model="form.latitude"
                            :error="!form.errors.latitude===false"
                            :error-message="form.errors.latitude"
                            dense
                            label="Latitude *">

                        </q-input>

                    </div>
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            name="village_locality"
                            outlined
                            v-model="form.longitude"
                            :error="!form.errors.longitude===false"
                            :error-message="form.errors.longitude"
                            dense
                            label="Longitude *">

                        </q-input>
                    </div>
                </div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            name="village_locality"
                            outlined
                            v-model="form.altitude"
                            :error="!form.errors.altitude===false"
                            :error-message="form.errors.altitude"
                            dense
                            label="Altitude *">

                        </q-input>

                    </div>
                    <div class="col-xs-12 col-md-5">

                    </div>
                </div>
                <div>Landholding Documents with details(LSC/P.Patta/VC PASS)</div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-select v-model="form.ownership_type_id" :error="!form.errors.ownership_type_id === false"
                                  :error-message="form.errors.ownership_type_id" :options="ownership_type" dense emit-value
                                  fill-input  hide-selected map-options option-label="ownership_type_name" option-value="id"
                                  placeholder="Select Ownership Type *" outlined use-input >
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
                            name="landholding_document_number"
                            outlined
                            v-model="form.landholding_documents_number"
                            :error="!form.errors.landholding_documents_number===false"
                            :error-message="form.errors.landholding_documents_number"
                            dense
                            label="Landholding Documents Number(LSC/P.Patta/VC PASS)*">
                        </q-input>
                    </div>
                </div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                            <q-file
                                v-model="form.land_holding_file"
                                label="Upload Landholding Document *"
                                outlined
                                clearable
                                dense
                                max-file-size="5000"
                                @rejected="fileRejected"
                            >
                                <template v-slot:prepend>
                                    <q-icon name="attach_file" />
                                </template>
                            </q-file>
                    </div>
                    <div class="col-xs-12 col-md-5">
<!--                        <q-file-->
<!--                            v-model="form.land_holding_file_2"-->
<!--                            label="Upload Landholding Document"-->
<!--                            filled-->
<!--                            clearable-->
<!--                            dense-->
<!--                        />-->
                    </div>
                </div>
                <div class="q-pt-md">Irrigation & Machinery Details</div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-select v-model="form.irrigation_infrastructures" :error="!form.errors.irrigation_infrastructures=== false"
                                  :error-message="form.errors.irrigation_infrastructures" :options="irrigation" dense
                                  option-label="irrigation_infrastructures_name" option-value="id" multiple use-chips stack-label
                                  label=" Select Irrigation Infrastructure" outlined >
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
                        <div>
                            <q-input
                                outlined
                                v-model="form. other_irrigation_infrastructure"
                                :error="!form.errors. other_irrigation_infrastructure===false"
                                :error-message="form.errors. other_irrigation_infrastructure"
                                dense
                                label="Others(If Any)">
                            </q-input>
                        </div>

                    </div>

                </div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-select v-model="form.farm_equipments" :error="!form.errors.farm_equipments === false"
                                  :error-message="form.errors.farm_equipments" :options="equipment" dense
                                  option-label="equipment_name" option-value="id" multiple use-chips stack-label
                                  label=" Farm Machinery/Equiments" outlined  >
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

                            outlined
                            v-model="form. other_farm_equipment"
                            :error="!form.errors. other_farm_equipment===false"
                            :error-message="form.errors. other_farm_equipment"
                            dense
                            label="Others(If Any)">
                        </q-input>
                    </div>

                </div>
                <div>Crop Details</div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-select v-model="form.kharif_crops" :error="!form.errors.kharif_crops=== false"
                                  :error-message="form.errors.kharif_crops" :options="kharifCrops" dense
                                  option-label="kharif_crops_name" option-value="id" multiple use-chips stack-label
                                  label=" Crops Grown(Kharif)" outlined  >
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
                            outlined
                            v-model="form.kharif_total_area"
                            :error="!form.errors.kharif_total_area===false"
                            :error-message="form.errors.kharif_total_area"
                            dense
                            label="Total Farm Area (Kharif)">
<!--                            <template v-slot:prepend>-->
<!--                                <q-select v-model="form.kharif_acres_or_hectares" :options="areaOptions" label="Area" dense borderless option-value="value" option-label="label" emit-value/>-->
<!--                            </template>-->
                        </q-input>
                    </div>
                </div>
<!--                RabiCROPS-->
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-select v-model="form.rabi_crops" :error="!form.errors.rabi_crops === false"
                                  :error-message="form.errors.rabi_crops" :options="rabiCrops" dense
                                  option-label="rabi_crops_name" option-value="id" multiple use-chips stack-label
                                  label=" Crops Grown(Rabi)" outlined  >
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
                            outlined
                            v-model="form.rabi_total_area"
                            :error="!form.errors.rabi_total_area===false"
                            :error-message="form.errors.rabi_total_area"
                            dense
                            label="Total Farm Area (Rabi)">
<!--                            <template v-slot:prepend>-->
<!--                                <q-select v-model="form.rabi_acres_or_hectares" :options="areaOptions" label="Area" dense borderless option-value="value" option-label="label" emit-value/>-->
<!--                            </template>-->
                        </q-input>
                    </div>
                </div>
                <div class="row justify-around">
                    <div class="col-xs-12 col-md-5">
                        <q-select v-model="form.oil_palm_plantation" :error="!form.errors.oil_palm_plantation === false"
                                  :error-message="form.errors.oil_palm_plantation" :options="isOilPalm" dense
                                  option-label="label" option-value="value"
                                  label="Oil Palm Plantation" outlined  >
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
                            :disable="form.oil_palm_plantation==='No'"
                            outlined
                            v-model="form.oil_palm_area"
                            :error="!form.errors.oil_palm_area===false"
                            :error-message="form.errors.oil_palm_area"
                            dense
                            label="Oil Palm Area Sown">
                            <!--                            <template v-slot:prepend>-->
                            <!--                                <q-select v-model="form.rabi_acres_or_hectares" :options="areaOptions" label="Area" dense borderless option-value="value" option-label="label" emit-value/>-->
                            <!--                            </template>-->
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
                        @click="toFarmerDetails"
                    />
                    <div style="width: 15px"/>
                    <!--                <q-btn-->
                    <!--                    @click="e=>$inertia.get(route('farmer-details'))"-->
                    <!--                    flat-->
                    <!--                    rounded-->
                    <!--                    label="Confirm"-->
                    <!--                    style="padding: 5px 30px 5px;background-color: #2e6525;color: white;"-->
                    <!--                />-->
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
const isSubDivisionDisabled=ref(true);
const isBlockDisabled=ref(true);
const isVillageDisabled=ref(true);
const subDivisionList=ref([]);
const blockList=ref([]);
const villageList=ref([]);
const allVillageList=ref([])
const form=useForm({
    farmers_id:props.farmerId,
    farmer_agri_id:'',
    land_owner_name:'',
    area_of_land:'',
    acres_or_hectares:'Acres',
    latitude:'',
    longitude:'',
    altitude:'',
    district_id:'',
    sub_division_id:'',
    block_id:'',
    village_id:'',
    ownership_type_id:'',
    landholding_documents_number:'',
    land_holding_file:null,
    irrigation_infrastructures:[],
    other_irrigation_infrastructure:'',
    farm_equipments:[],
    other_farm_equipment:'',
    kharif_crops:[],
    kharif_acres_or_hectares:'Acres',
    kharif_total_area:'',
    rabi_crops:[],
    rabi_acres_or_hectares:'Acres',
    rabi_total_area:'',
    land_holding_id:'',
    oil_palm_plantation:'No',
    oil_palm_area:''



});
const props=defineProps({
    'farmerId':Object,
    'farmerName':Object,
    'district':[],
    'ownership_type':[],
    'irrigation':[],
    'equipment':[],
    'kharifCrops':[],
    'rabiCrops':[],
    'landHolding':[],
});
const getSubDivision=(e)=>{
    axios.get(route('get-sub-division',e)).then((res)=>{
        const {data}=res.data;
        isSubDivisionDisabled.value=false;
        isBlockDisabled.value=false;
        subDivisionList.value=data;
        form.sub_division_id='';
    });
}
const getBlock=(e)=>{
    axios.get(route('get-block',e)).then((res)=>{
        const {data}=res.data;
        isSubDivisionDisabled.value=false;
        blockList.value=data;
        form.block_id='';
        form.village_id='';
    });
}
const isOilPalm=[
    'Yes','No'
]
const areaOptions=[
    {
        label:'Acres',
        value:'Acres'
    },
    // {
    //     label: 'Hectares',
    //     value: 'Hectares'
    // }
];
const getVillage=(e)=>{
    axios.get(route('get-village',e)).then((res)=>{
        const {data}=res.data;
        isSubDivisionDisabled.value=false;
        isBlockDisabled.value=false;
        isVillageDisabled.value=false;
        villageList.value=data;
        allVillageList.value=data;
    });
}
const submit=()=>{
    form.transform(data=>({irrigation_infrastructure_ids:data.irrigation_infrastructures.map(item=>item.id),
        farm_equipment_ids:data.farm_equipments.map(item=>item.id),
        kharif_crop_ids:data.kharif_crops.map(item=>item.id),
        rabi_crop_ids:data.rabi_crops.map(item=>item.id),
        ...data})).post(route('farmer-agriculture-land.store'),{
            onStart:()=>{
                q.loading.show();
            },
        onSuccess:()=>{
                q.loading.hide();
                q.notify({
                    message:'Farmer Agriculture Land Submitted',
                    closeBtn:true,
                })
        },
        onError:(data)=>{
                console.log(data)
                q.loading.hide();
                q.notify({
                    message:data.message,
                    closeBtn:true,
                    icon:'warning',
                    iconColor:'red'
                });
        },onFinish:()=>{
                q.loading.hide();
        }
    })
}
const fileRejected=(message)=>{
    q.notify({
        type: 'negative',
        message: `${message.length} file(s) did not pass validation constraints`
    })
}
const toFarmerDetails=()=>{
        router.get(route('farmer-details',props.farmerId));
}
</script>

<style scoped>

</style>
