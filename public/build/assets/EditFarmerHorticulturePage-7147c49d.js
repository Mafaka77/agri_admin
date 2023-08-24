import{u as v,T as x,r as d,o as y,b as q,d as s,e as a,w as l,f as w,g as o,i as f}from"./app-4496f01d.js";const D={class:"row justify-center"},C={class:"col-md-9 col-xl-7 q-pa-md",style:{"background-color":"white"}},U=s("div",{class:"q-pt-md text-lg"},"Horticulture Farm Details",-1),j={class:"q-gutter-x-md column"},N=["onSubmit"],S={class:"row justify-around"},F={class:"col-xs-12 col-md-5"},H={class:"col-xs-12 col-md-5"},O=s("div",null,"Crop Details",-1),P={class:"row justify-around"},T={class:"col-xs-12 col-md-5"},A={class:"col-xs-12 col-md-5"},G={class:"row justify-around"},B={class:"col-xs-12 col-md-5"},E={class:"col-xs-12 col-md-5"},K=s("div",null,"Orchards and Plantation Details",-1),R={class:"row justify-around"},$={class:"col-xs-12 col-md-5"},I={class:"col-xs-12 col-md-5"},L=s("div",null,"Greenhouse/Protected Cultivation",-1),M={class:"row justify-around"},Q={class:"col-xs-12 col-md-5"},z={class:"col-xs-12 col-md-5"},J={class:"row justify-center q-mt-md"},W=s("div",{style:{width:"15px"}},null,-1),Y={__name:"EditFarmerHorticulturePage",props:{hortiData:Object,farmer_id:Object,kharifCrops:[],rabiCrops:[],orchards:[],plantation:[],greenHouse:[]},setup(_){const n=_,u=v(),e=x({id:n.hortiData.id,farmers_id:n.hortiData.farmers_id,farmer_horticulture_id:n.hortiData.farmer_horticulture_id,location:n.hortiData.location,kharif_crops_id:n.hortiData.farmer_horti_kharif_crops,kharif_total_area:n.hortiData.kharif_total_area,kharif_acres_or_hectares:"Acres",rabi_crops_id:n.hortiData.farmer_horti_rabi_crops,rabi_total_area:n.hortiData.rabi_total_area,rabi_acres_or_hectares:"Acres",orchards_id:n.hortiData.farmer_orchids,plantation_id:n.hortiData.farmer_plantation,green_house_id:n.hortiData.green_house_plants,total_greenhouse_area:n.hortiData.total_greenhouse_area}),k=()=>{e.transform(i=>({kharif_crop_ids:i.kharif_crops_id.map(r=>r.id),rabi_crop_ids:i.rabi_crops_id.map(r=>r.id),orchard_ids:i.orchards_id.map(r=>r.id),plantation_ids:i.plantation_id.map(r=>r.id),greenhouse_ids:i.green_house_id.map(r=>r.id),...i})).put(route("farmer-horticulture-land.update",e.id),{onStart:()=>u.loading.show(),onFinish:()=>{u.loading.hide(),u.notify({message:"Successfully Updated"})},onError:i=>{u.loading.hide(),u.notify({message:"Error Occured"})}})};return(i,r)=>{const b=d("q-breadcrumbs-el"),V=d("q-breadcrumbs"),c=d("q-input"),m=d("q-item-section"),p=d("q-item"),h=d("q-select"),g=d("q-btn");return y(),q("div",D,[s("div",C,[a(V,null,{default:l(()=>[a(b,{icon:"home",onClick:r[0]||(r[0]=t=>i.$inertia.get(i.route("manage-farmer")))}),a(b,{label:"Farmer Details",icon:"add_task",onClick:i.toFarmerDetails},null,8,["onClick"]),a(b,{label:"Horticulture Sector",icon:"list"})]),_:1}),U,s("div",j,[s("form",{onSubmit:w(k,["prevent"]),method:"POST"},[s("div",S,[s("div",F,[a(c,{outlined:"",modelValue:o(e).farmer_horticulture_id,"onUpdate:modelValue":r[1]||(r[1]=t=>o(e).farmer_horticulture_id=t),error:!!o(e).errors.farmer_horticulture_id,"error-message":o(e).errors.farmer_horticulture_id,dense:"",label:"Farmer Horticulture ID *"},null,8,["modelValue","error","error-message"])]),s("div",H,[a(c,{name:"location",outlined:"",modelValue:o(e).location,"onUpdate:modelValue":r[2]||(r[2]=t=>o(e).location=t),error:!!o(e).errors.location,"error-message":o(e).errors.location,dense:"",label:"Location *"},null,8,["modelValue","error","error-message"])])]),O,s("div",P,[s("div",T,[a(h,{modelValue:o(e).kharif_crops_id,"onUpdate:modelValue":r[3]||(r[3]=t=>o(e).kharif_crops_id=t),error:!!o(e).errors.kharif_crops_id,"error-message":o(e).errors.kharif_crops_id,options:_.kharifCrops,dense:"","option-label":"kharif_crops_name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:" Crops Grown(Kharif)",outlined:""},{"no-option":l(()=>[a(p,null,{default:l(()=>[a(m,{class:"text-gresy"},{default:l(()=>[f(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),s("div",A,[a(c,{name:"full_name",outlined:"",modelValue:o(e).kharif_total_area,"onUpdate:modelValue":r[4]||(r[4]=t=>o(e).kharif_total_area=t),error:!!o(e).errors.kharif_total_area,"error-message":o(e).errors.kharif_total_area,dense:"",label:"Total Area Sown(Kharif) *"},null,8,["modelValue","error","error-message"])])]),s("div",G,[s("div",B,[a(h,{modelValue:o(e).rabi_crops_id,"onUpdate:modelValue":r[5]||(r[5]=t=>o(e).rabi_crops_id=t),error:!!o(e).errors.rabi_crops_id,"error-message":o(e).errors.rabi_crops_id,options:_.rabiCrops,dense:"","option-label":"rabi_crops_name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:" Crops Grown(Rabi)",outlined:""},{"no-option":l(()=>[a(p,null,{default:l(()=>[a(m,{class:"text-gresy"},{default:l(()=>[f(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),s("div",E,[a(c,{name:"full_name",outlined:"",modelValue:o(e).rabi_total_area,"onUpdate:modelValue":r[6]||(r[6]=t=>o(e).rabi_total_area=t),error:!!o(e).errors.rabi_total_area,"error-message":o(e).errors.rabi_total_area,dense:"",label:"Total Area Sown(Rabi)"},null,8,["modelValue","error","error-message"])])]),K,s("div",R,[s("div",$,[a(h,{modelValue:o(e).orchards_id,"onUpdate:modelValue":r[7]||(r[7]=t=>o(e).orchards_id=t),error:!!o(e).errors.orchards_id,"error-message":o(e).errors.orchards_id,options:_.orchards,dense:"","option-label":"orchards_name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:" Orchards",outlined:""},{"no-option":l(()=>[a(p,null,{default:l(()=>[a(m,{class:"text-gresy"},{default:l(()=>[f(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),s("div",I,[a(h,{modelValue:o(e).plantation_id,"onUpdate:modelValue":r[8]||(r[8]=t=>o(e).plantation_id=t),error:!!o(e).errors.plantation_id,"error-message":o(e).errors.plantation_id,options:_.plantation,dense:"","option-label":"plantation_name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:" Plantation",outlined:""},{"no-option":l(()=>[a(p,null,{default:l(()=>[a(m,{class:"text-gresy"},{default:l(()=>[f(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])])]),L,s("div",M,[s("div",Q,[a(h,{modelValue:o(e).green_house_id,"onUpdate:modelValue":r[9]||(r[9]=t=>o(e).green_house_id=t),error:!!o(e).errors.green_house_id,"error-message":o(e).errors.green_house_id,options:_.greenHouse,dense:"","option-label":"name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:"Plants Grown",outlined:""},{"no-option":l(()=>[a(p,null,{default:l(()=>[a(m,{class:"text-gresy"},{default:l(()=>[f(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),s("div",z,[a(c,{outlined:"",modelValue:o(e).total_greenhouse_area,"onUpdate:modelValue":r[10]||(r[10]=t=>o(e).total_greenhouse_area=t),error:!!o(e).errors.total_greenhouse_area,"error-message":o(e).errors.total_greenhouse_area,dense:"",label:"Total Greenhouse Area"},null,8,["modelValue","error","error-message"])])]),s("div",J,[a(g,{label:"Back",outline:"",dense:"",rounded:"",style:{color:"#2e6525",padding:"5px 40px 5px"},onClick:r[11]||(r[11]=t=>i.$inertia.get(i.route("manage-farmer")))}),W,a(g,{flat:"",rounded:"",label:"Confirm",type:"submit",style:{padding:"5px 30px 5px","background-color":"#2e6525",color:"white"}})])],40,N)])])])}}};export{Y as default};
