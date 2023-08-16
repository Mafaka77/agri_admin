<template>
    <div class="row justify-center">
    <div class="col-md-9 col-xl-12 q-pa-md" style="background-color: white">
        <q-breadcrumbs>
            <q-breadcrumbs-el icon="home" @click="e=>$inertia.get(route('manage-farmer'))"/>
            <q-breadcrumbs-el  label="Farmer Details" icon="add_task"  @click="toFarmerDetails"/>
            <q-breadcrumbs-el label="Edit Farm Land & Agriculture Details" icon="edit" />
        </q-breadcrumbs>
        <div class="q-pt-md text-lg">Farm Land & Agriculture Details</div>
        <div class="q-gutter-x-md column">
            <form @submit.prevent="submit" method="POST">
                <div class="row justify-around q-pt-md">
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            name="full_name"
                            outlined color="green"
                            v-model="form.farmer_agri_id"
                            :error="!form.errors.farmer_agri_id===false"
                            :error-message="form.errors.farmer_agri_id"
                            dense
                            label="Farmer ID(Provided by Central Govt) *">

                        </q-input>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <q-input
                            disable
                            name="full_name"
                            outlined color="green"
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
                            name="full_name"
                            outlined color="green"
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
                                  placeholder="Select LandHolding *" outlined color="green"  use-input>
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
                                  placeholder="Select District *" outlined color="green"  use-input @update:model-value="getSubDivision" @update:modelValue="getBlock">
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
                                  :disable="isSubDivisionDisabled" :model-value="setSubDivisionModel" @input-value="setSubDivisionInput"
                                  fill-input  hide-selected map-options option-label="sub_division_name" option-value="id"
                                  placeholder="Select Sub Division *" outlined color="green"  use-input>
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
                        <q-select v-model="form.block_id" :error="!form.errors.block_id === false"
                                  :error-message="form.errors.block_id" :options="blockList" dense emit-value
                                  fill-input  hide-selected map-options option-label="block_name" option-value="id"
                                  :model-value="setBlockModel"  @input-value="setBlockInput"
                                  :disable="isBlockDisabled" placeholder="Select RD Block *" outlined color="green"  use-input @update:model-value="getVillage">
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
                                  @filter="filterVillage" @input-value="setVillageInput" :model-value="setVillageModel"
                                  :disable="isVillageDisabled" placeholder="Select or Search Village *" outlined color="green"  use-input @update:model-value="assignVillageLGD">
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
                            outlined color="green"
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
                            outlined color="green"
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
                            outlined color="green"
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
                                  placeholder="Select Ownership Type *" outlined color="green"  use-input >
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
                            outlined color="green"
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
                            :display-value="form.land_holding_file"
                            v-model="form.land_holding_file"
                            :error="!form.errors.land_holding_file===false"
                            :error-message="form.errors.land_holding_file"
                            label="Upload Land Document (Below <3Mb)"

                            dense
                            counter
                            outlined
                            max-file-size="3145728"
                            @update:model-value="uploadFile"
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
                        <!--                            -->
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
                                  label=" Select Irrigation Infrastructure *" outlined color="green"  >
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
                                outlined color="green"
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
                                  label=" Farm Machinery/Equiments *" outlined color="green"   >
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

                            outlined color="green"
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
                                  label=" Crops Grown(Kharif) *" outlined color="green"   >
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
                            outlined color="green"
                            v-model="form.kharif_total_area"
                            :error="!form.errors.kharif_total_area===false"
                            :error-message="form.errors.kharif_total_area"
                            dense
                            label="Total Farm Area in (Acres) *">
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
                                  label=" Crops Grown(Rabi)*" outlined color="green"   >
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
                            outlined color="green"
                            v-model="form.rabi_total_area"
                            :error="!form.errors.rabi_total_area===false"
                            :error-message="form.errors.rabi_total_area"
                            dense
                            label="Total Farm Area in (Acres) *">
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
const allVillageList=ref([]);
const setBlockModel=ref(props.landDetails.block.block_name)
const setVillageModel=ref(props.landDetails.village.village_name);
const setSubDivisionModel=ref(props.landDetails.sub_division.sub_division_name);
const form=useForm({
    farmers_id:props.landDetails.farmers_id,
    farmer_agri_id:props.landDetails.farmer_agri_id,
    land_owner_name:props.landDetails.land_owner_name,
    area_of_land:props.landDetails.area_of_land,
    acres_or_hectares:'Acres',
    latitude:props.landDetails.latitude,
    longitude:props.landDetails.longitude,
    altitude:props.landDetails.altitude,
    district_id:props.landDetails.district_id,
    sub_division_id:props.landDetails.sub_division_id,
    block_id:props.landDetails.block_id,
    village_id:props.landDetails.village_id,
    ownership_type_id:props.landDetails.ownership_type_id,
    landholding_documents_number:props.landDetails.landholding_documents_number,
    land_holding_file:props.landDetails.land_holding_file,
    irrigation_infrastructures:props.landDetails.irrigation_infrastructures,
    other_irrigation_infrastructure:props.landDetails.other_irrigation_infrastructure,
    farm_equipments:props.landDetails.farm_equipments,
    other_farm_equipment:props.landDetails.other_farm_equipment,
    kharif_crops:props.landDetails.kharif_crops,
    kharif_acres_or_hectares:'Acres',
    kharif_total_area:props.landDetails.kharif_total_area,
    rabi_crops:props.landDetails.rabi_crops,
    rabi_acres_or_hectares:'Acres',
    rabi_total_area:props.landDetails.rabi_total_area,
    land_holding_id:props.landDetails.land_holding_id,



});
const props=defineProps({
    'landDetails':Object,
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
        ...data})).put(route('farmer-agriculture-land.update',props.landDetails.id),{
        onStart:()=>{
            q.loading.show();
        },
        onSuccess:()=>{
            q.loading.hide();
            q.notify({
                message:'Farmer Agriculture Land Updated',
                closeBtn:true,
            })
        }
    })
}
const filterVillage=(val, update, abort)=>{
    update(()=>{
        const needle = val.toLocaleLowerCase();
        const initial = ref([]);
        initial.value = [...allVillageList.value]
        villageList.value=initial.value.filter(v => v.village_name.toLowerCase().indexOf(needle) > -1);
    })
}
const setVillageInput=(val)=>{
    setVillageModel.value=val;
}
const setBlockInput=(val)=>{
    setBlockModel.value=val;
}
const setSubDivisionInput=(val)=>{
    setSubDivisionModel.value=val;
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
const uploadFile=(files)=>{
    const formData = new FormData()
    formData.append('land_holding_file',form.land_holding_file );
    q.loading.show({
        message:'File uploading......'
    });
    axios.post(route('upload-land-holding-file'), formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then((response) => {
        q.loading.hide();
        form.land_holding_file=response.data.data;
        console.log(form.land_holding_file);
        q.notify({
            type: 'positive',
            message: `File Uploaded Successfully`
        })

    }).catch((ex)=>{
        q.notify({
            type: 'negative',
            message: ex
        })
    });

}
</script>

<style scoped>

</style>
