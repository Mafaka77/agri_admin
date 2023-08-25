import{Q as V,a as f}from"./QBreadcrumbs-580468de.js";import{u as k,T as v,o as x,a as y,b as a,d as s,w as t,e as w,f as r,Q as u,g as h,j as _,k as m,l as c}from"./app-4d64c5bc.js";import{Q as p}from"./QSelect-d09f5d60.js";import"./QChip-4a5e7891.js";const C={class:"row justify-center"},Q={class:"col-xs-12 col-md-9 col-xl-7 q-pa-md",style:{"background-color":"white"}},S=a("div",{class:"q-pt-md text-lg"},"Horticulture Farm Details",-1),U={class:"q-gutter-x-md column"},j=["onSubmit"],N={class:"row justify-around"},A={class:"col-xs-12 col-md-5"},B={class:"col-xs-12 col-md-5"},D=a("div",null,"Crop Details",-1),F={class:"row justify-around"},H={class:"col-xs-12 col-md-5"},P={class:"col-xs-12 col-md-5"},T={class:"row justify-around"},q={class:"col-xs-12 col-md-5"},G={class:"col-xs-12 col-md-5"},O=a("div",null,"Orchards and Plantation Details",-1),E={class:"row justify-around"},I={class:"col-xs-12 col-md-5"},K={class:"col-xs-12 col-md-5"},R=a("div",null,"Greenhouse/Protected Cultivation",-1),$={class:"row justify-around"},L={class:"col-xs-12 col-md-5"},M={class:"col-xs-12 col-md-5"},z={class:"row justify-center q-mt-md"},J=a("div",{style:{width:"15px"}},null,-1),ee={__name:"AddFarmerHorticulturePage",props:{farmer_id:Object,kharifCrops:[],rabiCrops:[],orchards:[],plantation:[],greenHouse:[]},setup(d){const g=d,n=k(),e=v({farmers_id:g.farmer_id,farmer_horticulture_id:"",location:"",kharif_crops_id:[],kharif_total_area:"",kharif_acres_or_hectares:"Acres",rabi_crops_id:[],rabi_total_area:"",rabi_acres_or_hectares:"Acres",orchards_id:[],plantation_id:[],green_house_id:[],total_greenhouse_area:""}),b=()=>{e.transform(i=>({kharif_crop_ids:i.kharif_crops_id.map(o=>o.id),rabi_crop_ids:i.rabi_crops_id.map(o=>o.id),orchard_ids:i.orchards_id.map(o=>o.id),plantation_ids:i.plantation_id.map(o=>o.id),greenhouse_ids:i.green_house_id.map(o=>o.id),...i})).post(route("farmer-horticulture-land.store"),{onStart:()=>n.loading.show(),onFinish:()=>{n.loading.hide(),n.notify({message:"Successfully Added"})},onError:i=>{n.loading.hide(),n.notify({message:"Error Occured"})}})};return(i,o)=>(x(),y("div",C,[a("div",Q,[s(V,null,{default:t(()=>[s(f,{icon:"home",onClick:o[0]||(o[0]=l=>i.$inertia.get(i.route("manage-farmer")))}),s(f,{label:"Farmer Details",icon:"add_task",onClick:i.toFarmerDetails},null,8,["onClick"]),s(f,{label:"Horticulture Sector",icon:"list"})]),_:1}),S,a("div",U,[a("form",{onSubmit:w(b,["prevent"]),method:"POST"},[a("div",N,[a("div",A,[s(u,{outlined:"",modelValue:r(e).farmer_horticulture_id,"onUpdate:modelValue":o[1]||(o[1]=l=>r(e).farmer_horticulture_id=l),error:!!r(e).errors.farmer_horticulture_id,"error-message":r(e).errors.farmer_horticulture_id,dense:"",label:"Farmer Horticulture ID *"},null,8,["modelValue","error","error-message"])]),a("div",B,[s(u,{name:"location",outlined:"",modelValue:r(e).location,"onUpdate:modelValue":o[2]||(o[2]=l=>r(e).location=l),error:!!r(e).errors.location,"error-message":r(e).errors.location,dense:"",label:"Location *"},null,8,["modelValue","error","error-message"])])]),D,a("div",F,[a("div",H,[s(p,{modelValue:r(e).kharif_crops_id,"onUpdate:modelValue":o[3]||(o[3]=l=>r(e).kharif_crops_id=l),error:!!r(e).errors.kharif_crops_id,"error-message":r(e).errors.kharif_crops_id,options:d.kharifCrops,dense:"","option-label":"kharif_crops_name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:" Crops Grown(Kharif)",outlined:""},{"no-option":t(()=>[s(_,null,{default:t(()=>[s(m,{class:"text-gresy"},{default:t(()=>[c(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),a("div",P,[s(u,{name:"full_name",outlined:"",modelValue:r(e).kharif_total_area,"onUpdate:modelValue":o[4]||(o[4]=l=>r(e).kharif_total_area=l),error:!!r(e).errors.kharif_total_area,"error-message":r(e).errors.kharif_total_area,dense:"",label:"Total Area Sown(Kharif) *"},null,8,["modelValue","error","error-message"])])]),a("div",T,[a("div",q,[s(p,{modelValue:r(e).rabi_crops_id,"onUpdate:modelValue":o[5]||(o[5]=l=>r(e).rabi_crops_id=l),error:!!r(e).errors.rabi_crops_id,"error-message":r(e).errors.rabi_crops_id,options:d.rabiCrops,dense:"","option-label":"rabi_crops_name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:" Crops Grown(Rabi)",outlined:""},{"no-option":t(()=>[s(_,null,{default:t(()=>[s(m,{class:"text-gresy"},{default:t(()=>[c(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),a("div",G,[s(u,{name:"full_name",outlined:"",modelValue:r(e).rabi_total_area,"onUpdate:modelValue":o[6]||(o[6]=l=>r(e).rabi_total_area=l),error:!!r(e).errors.rabi_total_area,"error-message":r(e).errors.rabi_total_area,dense:"",label:"Total Area Sown(Rabi)"},null,8,["modelValue","error","error-message"])])]),O,a("div",E,[a("div",I,[s(p,{modelValue:r(e).orchards_id,"onUpdate:modelValue":o[7]||(o[7]=l=>r(e).orchards_id=l),error:!!r(e).errors.orchards_id,"error-message":r(e).errors.orchards_id,options:d.orchards,dense:"","option-label":"orchards_name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:" Orchards",outlined:""},{"no-option":t(()=>[s(_,null,{default:t(()=>[s(m,{class:"text-gresy"},{default:t(()=>[c(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),a("div",K,[s(p,{modelValue:r(e).plantation_id,"onUpdate:modelValue":o[8]||(o[8]=l=>r(e).plantation_id=l),error:!!r(e).errors.plantation_id,"error-message":r(e).errors.plantation_id,options:d.plantation,dense:"","option-label":"plantation_name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:" Plantation",outlined:""},{"no-option":t(()=>[s(_,null,{default:t(()=>[s(m,{class:"text-gresy"},{default:t(()=>[c(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])])]),R,a("div",$,[a("div",L,[s(p,{modelValue:r(e).green_house_id,"onUpdate:modelValue":o[9]||(o[9]=l=>r(e).green_house_id=l),error:!!r(e).errors.green_house_id,"error-message":r(e).errors.green_house_id,options:d.greenHouse,dense:"","option-label":"name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:"Plants Grown",outlined:""},{"no-option":t(()=>[s(_,null,{default:t(()=>[s(m,{class:"text-gresy"},{default:t(()=>[c(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),a("div",M,[s(u,{outlined:"",modelValue:r(e).total_greenhouse_area,"onUpdate:modelValue":o[10]||(o[10]=l=>r(e).total_greenhouse_area=l),error:!!r(e).errors.total_greenhouse_area,"error-message":r(e).errors.total_greenhouse_area,dense:"",label:"Total Greenhouse Area"},null,8,["modelValue","error","error-message"])])]),a("div",z,[s(h,{label:"Back",outline:"",dense:"",rounded:"",style:{color:"#2e6525",padding:"5px 40px 5px"},onClick:o[11]||(o[11]=l=>i.$inertia.get(i.route("manage-farmer")))}),J,s(h,{flat:"",rounded:"",label:"Confirm",type:"submit",style:{padding:"5px 30px 5px","background-color":"#2e6525",color:"white"}})])],40,j)])])]))}};export{ee as default};