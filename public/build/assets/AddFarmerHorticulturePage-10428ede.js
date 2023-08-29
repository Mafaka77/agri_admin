import{Q as v,a as f}from"./QBreadcrumbs-9064dd34.js";import{u as V,T as x,o as y,a as w,b as a,d as s,w as t,e as C,f as r,Q as u,g,O as Q,j as _,k as m,l as c}from"./app-34262ca5.js";import{Q as p}from"./QSelect-7255cc28.js";import"./QChip-022a315d.js";const S={class:"row justify-center"},U={class:"col-xs-12 col-md-9 col-xl-7 q-pa-md",style:{"background-color":"white"}},j=a("div",{class:"q-pt-md text-lg"},"Horticulture Farm Details",-1),N={class:"q-gutter-x-md column"},A=["onSubmit"],B={class:"row justify-around"},O={class:"col-xs-12 col-md-5"},D={class:"col-xs-12 col-md-5"},F=a("div",null,"Crop Details",-1),H={class:"row justify-around"},P={class:"col-xs-12 col-md-5"},T={class:"col-xs-12 col-md-5"},q={class:"row justify-around"},G={class:"col-xs-12 col-md-5"},E={class:"col-xs-12 col-md-5"},I=a("div",null,"Orchards and Plantation Details",-1),K={class:"row justify-around"},R={class:"col-xs-12 col-md-5"},L={class:"col-xs-12 col-md-5"},M=a("div",null,"Greenhouse/Protected Cultivation",-1),$={class:"row justify-around"},z={class:"col-xs-12 col-md-5"},J={class:"col-xs-12 col-md-5"},W={class:"row justify-center q-mt-md"},X=a("div",{style:{width:"15px"}},null,-1),oe={__name:"AddFarmerHorticulturePage",props:{farmer_id:Object,kharifCrops:[],rabiCrops:[],orchards:[],plantation:[],greenHouse:[]},setup(d){const h=d,n=V(),e=x({farmers_id:h.farmer_id,farmer_horticulture_id:"",location:"",kharif_crops_id:[],kharif_total_area:"",kharif_acres_or_hectares:"Acres",rabi_crops_id:[],rabi_total_area:"",rabi_acres_or_hectares:"Acres",orchards_id:[],plantation_id:[],green_house_id:[],total_greenhouse_area:""}),b=()=>{e.transform(i=>({kharif_crop_ids:i.kharif_crops_id.map(o=>o.id),rabi_crop_ids:i.rabi_crops_id.map(o=>o.id),orchard_ids:i.orchards_id.map(o=>o.id),plantation_ids:i.plantation_id.map(o=>o.id),greenhouse_ids:i.green_house_id.map(o=>o.id),...i})).post(route("farmer-horticulture-land.store"),{onStart:()=>n.loading.show(),onFinish:()=>{n.loading.hide(),n.notify({message:"Successfully Added"})},onError:i=>{n.loading.hide(),n.notify({message:"Error Occured"})}})},k=()=>{Q.get(route("farmer-details",h.farmer_id))};return(i,o)=>(y(),w("div",S,[a("div",U,[s(v,null,{default:t(()=>[s(f,{icon:"home",onClick:o[0]||(o[0]=l=>i.$inertia.get(i.route("manage-farmer")))}),s(f,{label:"Farmer Details",icon:"add_task",onClick:i.toFarmerDetails},null,8,["onClick"]),s(f,{label:"Horticulture Sector",icon:"list"})]),_:1}),j,a("div",N,[a("form",{onSubmit:C(b,["prevent"]),method:"POST"},[a("div",B,[a("div",O,[s(u,{outlined:"",modelValue:r(e).farmer_horticulture_id,"onUpdate:modelValue":o[1]||(o[1]=l=>r(e).farmer_horticulture_id=l),error:!!r(e).errors.farmer_horticulture_id,"error-message":r(e).errors.farmer_horticulture_id,dense:"",label:"Farmer Horticulture ID"},null,8,["modelValue","error","error-message"])]),a("div",D,[s(u,{name:"location",outlined:"",modelValue:r(e).location,"onUpdate:modelValue":o[2]||(o[2]=l=>r(e).location=l),error:!!r(e).errors.location,"error-message":r(e).errors.location,dense:"",label:"Location *"},null,8,["modelValue","error","error-message"])])]),F,a("div",H,[a("div",P,[s(p,{modelValue:r(e).kharif_crops_id,"onUpdate:modelValue":o[3]||(o[3]=l=>r(e).kharif_crops_id=l),error:!!r(e).errors.kharif_crops_id,"error-message":r(e).errors.kharif_crops_id,options:d.kharifCrops,dense:"","option-label":"kharif_crops_name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:" Crops Grown(Kharif)",outlined:""},{"no-option":t(()=>[s(_,null,{default:t(()=>[s(m,{class:"text-gresy"},{default:t(()=>[c(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),a("div",T,[s(u,{mask:"#.#","fill-mask":"0","reverse-fill-mask":"",name:"full_name",outlined:"",modelValue:r(e).kharif_total_area,"onUpdate:modelValue":o[4]||(o[4]=l=>r(e).kharif_total_area=l),error:!!r(e).errors.kharif_total_area,"error-message":r(e).errors.kharif_total_area,dense:"",label:"Total Area Sown(Kharif) *"},null,8,["modelValue","error","error-message"])])]),a("div",q,[a("div",G,[s(p,{modelValue:r(e).rabi_crops_id,"onUpdate:modelValue":o[5]||(o[5]=l=>r(e).rabi_crops_id=l),error:!!r(e).errors.rabi_crops_id,"error-message":r(e).errors.rabi_crops_id,options:d.rabiCrops,dense:"","option-label":"rabi_crops_name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:" Crops Grown(Rabi)",outlined:""},{"no-option":t(()=>[s(_,null,{default:t(()=>[s(m,{class:"text-gresy"},{default:t(()=>[c(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),a("div",E,[s(u,{mask:"#.#","fill-mask":"0","reverse-fill-mask":"",name:"full_name",outlined:"",modelValue:r(e).rabi_total_area,"onUpdate:modelValue":o[6]||(o[6]=l=>r(e).rabi_total_area=l),error:!!r(e).errors.rabi_total_area,"error-message":r(e).errors.rabi_total_area,dense:"",label:"Total Area Sown(Rabi)"},null,8,["modelValue","error","error-message"])])]),I,a("div",K,[a("div",R,[s(p,{modelValue:r(e).orchards_id,"onUpdate:modelValue":o[7]||(o[7]=l=>r(e).orchards_id=l),error:!!r(e).errors.orchards_id,"error-message":r(e).errors.orchards_id,options:d.orchards,dense:"","option-label":"orchards_name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:" Orchards",outlined:""},{"no-option":t(()=>[s(_,null,{default:t(()=>[s(m,{class:"text-gresy"},{default:t(()=>[c(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),a("div",L,[s(p,{modelValue:r(e).plantation_id,"onUpdate:modelValue":o[8]||(o[8]=l=>r(e).plantation_id=l),error:!!r(e).errors.plantation_id,"error-message":r(e).errors.plantation_id,options:d.plantation,dense:"","option-label":"plantation_name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:" Plantation",outlined:""},{"no-option":t(()=>[s(_,null,{default:t(()=>[s(m,{class:"text-gresy"},{default:t(()=>[c(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])])]),M,a("div",$,[a("div",z,[s(p,{modelValue:r(e).green_house_id,"onUpdate:modelValue":o[9]||(o[9]=l=>r(e).green_house_id=l),error:!!r(e).errors.green_house_id,"error-message":r(e).errors.green_house_id,options:d.greenHouse,dense:"","option-label":"name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:"Plants Grown",outlined:""},{"no-option":t(()=>[s(_,null,{default:t(()=>[s(m,{class:"text-gresy"},{default:t(()=>[c(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),a("div",J,[s(u,{mask:"#.#","fill-mask":"0","reverse-fill-mask":"",outlined:"",modelValue:r(e).total_greenhouse_area,"onUpdate:modelValue":o[10]||(o[10]=l=>r(e).total_greenhouse_area=l),error:!!r(e).errors.total_greenhouse_area,"error-message":r(e).errors.total_greenhouse_area,dense:"",label:"Total Greenhouse Area"},null,8,["modelValue","error","error-message"])])]),a("div",W,[s(g,{label:"Back",outline:"",dense:"",rounded:"",style:{color:"#2e6525",padding:"5px 40px 5px"},onClick:k}),X,s(g,{flat:"",rounded:"",label:"Confirm",type:"submit",style:{padding:"5px 30px 5px","background-color":"#2e6525",color:"white"}})])],40,A)])])]))}};export{oe as default};