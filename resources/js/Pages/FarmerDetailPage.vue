<template>
    <div class="row justify-center">


    <div class="col-xs-12 col-md-9 col-xl-7 q-pa-md" style="background-color: white">
        <div class="row justify-between">
            <div class=" text-weight-medium" style="color: #2e6525">
                Farmer Details
            </div>
            <div class=" " style="color:#2e6525 ">
                <q-btn  size="12px"  flat dense icon="arrow_back" label="Back" @click="e=>$inertia.get(route('manage-farmer'))" />
            </div>
        </div>
        <div class="row justify-start">
            <div class="row col-4 justify-start">
                <div class="col-xs-12 col-md-3">
                    Basic Info:
                </div>
                <div v-if="basicInfo!=null" class="col-xs-12 col-md-1" style="color: green"> Complete</div>
                <div v-else class="col-xs-12 col-md-1">Incomplete</div>
            </div>
            <div class="row col-4 justify-start">
                <div class="col-xs-12 col-md-3">
                    Farm Info:
                </div>
                <div v-if="farmerAgriLandDetails.length===0" class="col-xs-12 col-md-1" style="color: red"> Incomplete</div>
                <div v-else class="col-xs-12 col-md-1" style="color: green">Complete</div>
            </div>
            <div class="row col-4 justify-start">
                <div class="col-xs-12 col-md-3">
                    Additional Info:{{}}
                </div>
                <div v-if="additionalDetails.length>0" class="col-xs-12 col-md-1" style="color: green"> Complete</div>
                <div v-else class="col-xs-12 col-md-1" style="color: red">Incomplete</div>
            </div>
        </div>
<!--      BASIC DETAILS-->
           <q-card class="basic-info-card q-mt-md" bordered flat style="border-color: #2e6525">
               <q-item>
                   <q-item-section avatar middle>
                       <div>Farmer Basic Details</div>
                   </q-item-section>
                   <q-item-section middle>
                       <q-item-label lines="1">
                           <span class="text-weight-medium">{{farmer.full_name}}</span>
                       </q-item-label>
                   </q-item-section>
                   <q-item-section middle side>
                       <div class="q-gutter-xs" style="color: #2e6525">
                           <q-btn class="text-weight-bold" size="12px" flat dense label="View" />
                       </div>
                   </q-item-section>
               </q-item>
           </q-card>
<!--        END-->
<!--        AGRICULTURE LAND DETAILS-->
        <div v-if="farmerAgriLandDetails.length>0">
            <q-separator  color="green" inset class="q-mt-md"/>
        </div>

        <div v-for="data in farmerAgriLandDetails">
            <q-card  class="basic-info-card q-mt-md" bordered flat style="border-color: #2e6525">
                <q-item>
                    <q-item-section avatar middle>
                        <div>Farm Land &  Agriculture</div>
                    </q-item-section>
                    <q-item-section middle>
                        <q-item-label lines="1">
                            <span class="text-weight-medium">{{data.district.district_name}}</span>
                        </q-item-label>
                    </q-item-section>
                    <q-item-section middle side>
                        <div class="q-gutter-xs" style="color: #2e6525">
                            <q-btn class="text-weight-bold" size="12px" flat dense label="View" @click="$inertia.get(route('farmer-agriculture-land.edit',data.id))"/>
                        </div>
                    </q-item-section>
                    <q-item-section middle side>
                        <div class="q-gutter-xs" style="color: #2e6525">
                            <q-btn class="text-weight-bold text-red" size="12px" flat dense icon="delete" @click="deleteAgriLand(data.id)"/>
                        </div>
                    </q-item-section>
                </q-item>
            </q-card>
        </div>

<!--        END-->
<!--        ADDITIONAL FARM DETAILS-->
        <div  v-if="additionalDetails.length>0">
            <q-separator color="green" inset class="q-mt-md"/>
        </div>

        <div v-for="data in additionalDetails">
            <q-card  class="basic-info-card q-mt-md" bordered flat style="border-color: #2e6525">
                <q-item>
                    <q-item-section avatar middle>
                        <div>Additional Details</div>
                    </q-item-section>
                    <q-item-section middle>
                        <q-item-label lines="1">
                            <span class="text-weight-medium">{{data.farmers.full_name}}</span>
                        </q-item-label>
                    </q-item-section>
                    <q-item-section middle side>
                        <div class="q-gutter-xs" style="color: #2e6525">
                            <q-btn class="text-weight-bold" size="12px" flat dense label="View" @click="$inertia.get(route('additional-farmer-details.edit',data.id))"/>
                        </div>
                    </q-item-section>
                    <q-item-section  side>
                        <div class="q-gutter-xs" style="color: #2e6525">
                            <q-btn class="text-weight-bold" size="12px" flat dense icon="delete" color="red" />
                        </div>
                    </q-item-section>
                </q-item>
            </q-card>
        </div>
<!--        END-->
<!--        HORTICULTURE DETAILS-->
        <div v-if="farmerLandWaterConservation.length>0">
            <q-separator color="green" inset class="q-mt-md"/>
        </div>

        <div v-for="data in farmerHortiDetails">
            <q-card  class="basic-info-card q-mt-md" bordered flat style="border-color: #2e6525">
                <q-item>
                    <q-item-section avatar middle>
                        <div>Horticulture Farm</div>
                    </q-item-section>
                    <q-item-section middle>
                        <q-item-label lines="1">
                            <span class="text-weight-medium">{{data.location}}</span>
                        </q-item-label>
                    </q-item-section>
                    <q-item-section middle side>
                        <div class="q-gutter-xs" style="color: #2e6525">
                            <q-btn class="text-weight-bold" size="12px" flat dense label="View" @click="$inertia.get(route('farmer-horticulture-land.edit',data.id))" />
                        </div>
                    </q-item-section>
                    <q-item-section middle side>
                    <div class="q-gutter-xs" style="color: #2e6525">
                        <q-btn class="text-weight-bold" size="12px" flat dense icon="delete" color="red" @click="deleteHorti(data.id)" />
                    </div>
                </q-item-section>
                </q-item>
            </q-card>
        </div>
<!--        END-->

<!--        LAND WATER CONSERVATION DETAILS-->
        <div v-if="farmerLandWaterConservation.length>0">
                    <q-separator color="green" inset class="q-mt-md"/>
        </div>

        <div v-for="data in farmerLandWaterConservation">
            <q-card  class="basic-info-card q-mt-md" bordered flat style="border-color: #2e6525">
                <q-item>
                    <q-item-section avatar middle>
                        <div>Land Resource & Water Conservation</div>
                    </q-item-section>
                    <q-item-section middle>
                        <q-item-label lines="1">
                            <span class="text-weight-medium">{{data.location}}</span>
                        </q-item-label>
                    </q-item-section>
                    <q-item-section middle side>
                        <div class="q-gutter-xs" style="color: #2e6525">
                            <q-btn class="text-weight-bold" size="12px" flat dense label="View" @click="$inertia.get(route('land-water-conservation.edit',data.id))" />
                        </div>
                    </q-item-section>
                    <q-item-section middle side>
                        <div class="q-gutter-xs" style="color: #2e6525">
                            <q-btn class="text-weight-bold" size="12px" flat dense icon="delete" color="red" @click="deleteLandWater(data.id)" />
                        </div>
                    </q-item-section>
                </q-item>
            </q-card>
        </div>
<!--        END-->

        <!--        FARMER FISHERIES-->
        <div v-if="farmerFish.length>0">
                    <q-separator color="green" inset class="q-mt-md"/>
        </div>

        <div v-for="data in farmerFish">
            <q-card  class="basic-info-card q-mt-md" bordered flat style="border-color: #2e6525">
                <q-item>
                    <q-item-section avatar middle>
                        <div>Fisheries</div>
                    </q-item-section>
                    <q-item-section middle>
                        <q-item-label lines="1">
                            <span class="text-weight-medium">{{data.location}}</span>
                        </q-item-label>
                    </q-item-section>
                    <q-item-section middle side>
                        <div class="q-gutter-xs" style="color: #2e6525">
                            <q-btn class="text-weight-bold" size="12px" flat dense label="View" @click="$inertia.get(route('fisheries.edit',data.id))" />
                        </div>
                    </q-item-section>
                    <q-item-section middle side>
                        <div class="q-gutter-xs" style="color: #2e6525">
                            <q-btn class="text-weight-bold" size="12px" flat dense icon="delete" color="red" @click="deleteFisheries(data.id)" />
                        </div>
                    </q-item-section>
                </q-item>
            </q-card>
        </div>
        <!--        END-->
<!--ANIMAL HUSBANDRY-->
        <div v-if="animalHusbandry.length>0">
            <q-separator color="green" inset class="q-mt-md"/>
        </div>

        <div v-for="data in animalHusbandry">
            <q-card  class="basic-info-card q-mt-md" bordered flat style="border-color: #2e6525">
                <q-item>
                    <q-item-section avatar middle>
                        <div>Animal Husbandry</div>
                    </q-item-section>
                    <q-item-section middle>
                        <q-item-label lines="1">
                            <span class="text-weight-medium">{{data.location}}</span>
                        </q-item-label>
                    </q-item-section>
                    <q-item-section middle side>
                        <div class="q-gutter-xs" style="color: #2e6525">
                            <q-btn class="text-weight-bold" size="12px" flat dense label="View" @click="$inertia.get(route('animal-husbandry.edit',data.id))"/>
                        </div>
                    </q-item-section>
                    <q-item-section middle side>
                        <div class="q-gutter-xs" style="color: #2e6525">
                            <q-btn class="text-weight-bold" size="12px" flat dense icon="delete" color="red" @click="deleteHusbandry(data.id)"/>
                        </div>
                    </q-item-section>
                </q-item>
            </q-card>
        </div>
<!--        END-->
<!--        SERICULTURE-->
        <div v-if="farmerSericulture.length>0">
            <q-separator color="green" inset class="q-mt-md"/>
        </div>

        <div v-for="data in farmerSericulture">
            <q-card  class="basic-info-card q-mt-md" bordered flat style="border-color: #2e6525">
                <q-item>
                    <q-item-section avatar middle>
                        <div>Sericulture</div>
                    </q-item-section>
                    <q-item-section middle>
                        <q-item-label lines="1">
                            <span class="text-weight-medium">{{data.location}}</span>
                        </q-item-label>
                    </q-item-section>
                    <q-item-section middle side>
                        <div class="q-gutter-xs" style="color: #2e6525">
                            <q-btn class="text-weight-bold" size="12px" flat dense label="View" @click="$inertia.get(route('sericulture.edit',data.id))"/>
                        </div>
                    </q-item-section>
                    <q-item-section middle side>
                        <div class="q-gutter-xs" style="color: #2e6525">
                            <q-btn class="text-weight-bold" size="12px" flat dense icon="delete" color="red" @click="deleteSericulture(data.id)"/>
                        </div>
                    </q-item-section>
                </q-item>
            </q-card>
        </div>
<!--        END-->
<!--        ADD  BUTTON-->
        <div class="q-pt-md">
            <q-btn
                @click="e=>{

                    router.get(route('to-farmer-agriculture-land',props.farmer_id))
                }"
                class="text-white"
                label="ADD FARM & AGRICULTURE"
                icon="add"
                style="background-color:#2e6525 "
            >
                <q-badge v-if="farmerAgriLandDetails.length===0" color="red" rounded floating>
                </q-badge>
                <q-badge v-else color="blue" rounded floating>
                    <q-icon name="verified"  size="12px"/>
                </q-badge>
            </q-btn>
        </div>
        <div class="q-pt-md">
            <q-btn
                :disable="additionalDetails.length===1"
                @click="e=>{
                    router.get(route('to-additional-farmer-details',props.farmer_id))
                }"
                class="text-white"
                label="ADDITIONAL FARM DETAILS"
                icon="add"
                style="background-color:#2e6525 "
            >
                <q-badge v-if="additionalDetails.length===0" color="red" rounded floating>
                </q-badge>
                <q-badge v-else color="blue" rounded floating>
                    <q-icon name="verified"  size="12px"/>
                </q-badge>
            </q-btn>
        </div>
        <div class="q-pt-md">
            <q-btn
                @click="e=>{
                    router.get(route('farmer-horticulture-land',props.farmer_id))
                }"
                outline
                label="ADD HORTICULTURE"
                icon="add"
                style="color:#2e6525 "
            >
                <q-badge v-if="farmerHortiDetails.length>=1" color="blue" rounded floating>
                    <q-icon name="verified"  size="12px"/>
                </q-badge>
            </q-btn>
        </div>
        <div class="q-pt-md">
            <q-btn
                @click="e=>{
                    router.get(route('to-land-water-conservation',props.farmer_id))
                }"
                outline
                label="ADD LAND RESOURCE & WATER CONSERVATION"
                icon="add"
                style="color:#2e6525 "
            >
                <q-badge v-if="farmerLandWaterConservation.length>=1" color="blue" rounded floating>
                    <q-icon name="verified"  size="12px"/>
                </q-badge>
            </q-btn>
        </div>
        <div class="q-pt-md">
            <q-btn
                @click="e=>{
                    router.get(route('to-fisheries',props.farmer_id))
                }"
                outline
                label="ADD FISH POND"
                icon="add"
                style="color:#2e6525 "
            >
                <q-badge v-if="farmerFish.length>=1" color="blue" rounded floating>
                    <q-icon name="verified"  size="12px"/>
                </q-badge>
            </q-btn>
        </div>
        <div class="q-pt-md">
            <q-btn
                @click="e=>{
                    router.get(route('to-animal-husbandry',props.farmer_id))
                }"
                outline
                label="ADD ANIMAL HUSBANDRY"
                icon="add"
                style="color:#2e6525 "

            >
                <q-badge v-if="animalHusbandry.length>=1" color="blue" rounded floating>
                    <q-icon name="verified"  size="12px"/>
                </q-badge>
            </q-btn>
        </div>
        <div class="q-pt-md">
            <q-btn
                @click="e=>{
                    router.get(route('to-sericulture',props.farmer_id))
                }"
                outline
                label="ADD SERICULTURE"
                icon="add"
                style="color:#2e6525 "
            >
                <q-badge v-if="farmerSericulture.length>=1" color="blue" rounded floating>
                    <q-icon name="verified"  size="12px"/>
                </q-badge>
            </q-btn>
        </div>
        <div v-if="farmer.verification==='Rejected'" class="q-pt-md">
            <q-card style="background: #f1f1f1;border-color: red" flat bordered >
                <q-card-section class="q-gutter-sm">
                    <div class="text-red">Rejection Note:</div>
                    <div>{{farmer.rejection_note}}</div>
                </q-card-section>

            </q-card>

        </div>
        <div class="q-pt-md">
            <q-card style="background: #f1f1f1" flat>
                <q-card-section class="q-gutter-sm">
                    <div>If all sections are complete you can mark this Registration for Supervisor Approval</div>
                    <div class="row">
                        <div>
                            <q-checkbox v-model="isSubmitted" disable/>
                        </div>
                        <q-btn label="SUBMIT FOR APPROVAL" text-color="white" style="background-color: #2e6525" flat @click="farmer.verification==='Submitted'?openDialog():farmer.verification==='Approved'?openDialog(): approveDialog(farmer_id)"/>
                    </div>

                </q-card-section>

            </q-card>

        </div>
        <!--        END-->
    </div>
    </div>
</template>

<script setup>
import {computed, ref} from 'vue';
import {router, useForm} from "@inertiajs/vue3";
import {useQuasar} from "quasar";
const q=useQuasar();
const props=defineProps({
    'animalHusbandry':[],
    'farmerFish':[],
    'additionalDetails':[],
    'farmerHortiDetails':[],
    'farmerLandWaterConservation':[],
    'farmerSericulture':[],
    'farmDetails':[],
    'farmInfo':Object,
    'basicInfo':Object,
    'farmer_id':Object,
    'farmer':Object
})
const isSubmitted=ref(props.farmer.verification === 'Submitted'||props.farmer.verification==='Approved')
console.log(isSubmitted.value);
const farmerAgriLandDetails=props.farmDetails;
const deleteAgriLand=(id)=>{
    q.dialog({
        title: 'Confirm Delete',
        message: 'Are you sure?',
        ok: 'Yes',
        cancel: 'No'
    }).onOk(() => {
        router.delete(route('farmer-agriculture-land.destroy', id), {
            onStart: () => q.loading.show({ message: 'Deleting....' }),
            onFinish: () => q.loading.hide(),
            onSuccess: () => q.loading.hide(),
            onError: () => q.loading.hide(),
            preserveState: false,
        })
    }).onCancel(() => {
    })
}
const deleteHorti=(id)=>{
    q.dialog({
        title: 'Confirm Delete',
        message: 'Are you sure?',
        ok: 'Yes',
        cancel: 'No'
    }).onOk(() => {
        router.delete(route('farmer-horticulture-land.destroy', id), {
            onStart: () => q.loading.show({ message: 'Deleting....' }),
            onFinish: () => q.loading.hide(),
            onSuccess: () => q.loading.hide(),
            onError: () => q.loading.hide(),
            preserveState: false,
        })
    }).onCancel(() => {
    })
}
const deleteLandWater=(id)=>{
    q.dialog({
        title: 'Confirm Delete',
        message: 'Are you sure?',
        ok: 'Yes',
        cancel: 'No'
    }).onOk(() => {
        router.delete(route('land-water-conservation.destroy', id), {
            onStart: () => q.loading.show({ message: 'Deleting....' }),
            onFinish: () => q.loading.hide(),
            onSuccess: () => q.loading.hide(),
            onError: () => q.loading.hide(),
            preserveState: false,
        })
    }).onCancel(() => {
    })
}
const deleteFisheries=(id)=>{
    q.dialog({
        title: 'Confirm Delete',
        message: 'Are you sure?',
        ok: 'Yes',
        cancel: 'No'
    }).onOk(() => {
        router.delete(route('fisheries.destroy', id), {
            onStart: () => q.loading.show({ message: 'Deleting....' }),
            onFinish: () => q.loading.hide(),
            onSuccess: () => q.loading.hide(),
            onError: () => q.loading.hide(),
            preserveState: false,
        })
    }).onCancel(() => {
    })
}
const deleteHusbandry=(id)=>{
    q.dialog({
        title: 'Confirm Delete',
        message: 'Are you sure?',
        ok: 'Yes',
        cancel: 'No'
    }).onOk(() => {
        router.delete(route('animal-husbandry.destroy', id), {
            onStart: () => q.loading.show({ message: 'Deleting....' }),
            onFinish: () => q.loading.hide(),
            onSuccess: () => q.loading.hide(),
            onError: () => q.loading.hide(),
            preserveState: false,
        })
    }).onCancel(() => {
    })
}
const deleteSericulture=(id)=>{
    q.dialog({
        title: 'Confirm Delete',
        message: 'Are you sure?',
        ok: 'Yes',
        cancel: 'No'
    }).onOk(() => {
        router.delete(route('sericulture.destroy', id), {
            onStart: () => q.loading.show({ message: 'Deleting....' }),
            onFinish: () => q.loading.hide(),
            onSuccess: () => q.loading.hide(),
            onError: () => q.loading.hide(),
            preserveState: false,
        })
    }).onCancel(() => {
    })
}
const approveDialog=(id)=>{
    q.dialog({
        title: 'Submit for Approval',
        message: 'Are you sure?',
        ok: 'Yes',
        cancel: 'No'
    }).onOk(() => {
        router.get(route('send-for-approval', id), {
            onStart: () => q.loading.show(),
            onFinish: () =>{
                q.loading.hide();
            },
            onSuccess: () =>{
                q.loading.hide();
                q.notify({
                    message:'Success',
                    icon:'check',
                    iconColor:'blue',
                    closeBtn:true
                });
            } ,
            onError: () => q.loading.hide(),
            preserveState: false,
        })
    }).onCancel(() => {
    })
}
const openDialog=()=>{
    q.notify({
        message:'Farmer already submitted',
        icon:'warning',
        iconColor:'red',
        closeBtn:true,
    })
}
</script>

<style scoped lang="sass">
.basic-info-card
    max-width: 100%

</style>
