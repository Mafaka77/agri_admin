import{u as _,T as f,o as g,a as w,b as s,e as x,d as l,f as o,Q as d,w as i,g as m,j as b,k as v,l as V}from"./app-ecd1ccd6.js";import{Q as h}from"./QSelect-cce58fe2.js";import"./QChip-11c19431.js";const y={class:"row justify-center"},S={class:"col-xs-12 col-md-9 col-xl-7 q-pa-xl",style:{"background-color":"white"}},k=s("div",{class:"q-pt-md text-lg"},"Land Resource, Soil & Water Conservation Details",-1),C={class:"q-gutter-x-md column"},Q=["onSubmit"],B={class:"row justify-around q-mt-md"},q={class:"col-xs-12 col-md-5"},I={class:"col-xs-12 col-md-5"},j={class:"col-xs-12 col-md-5"},N={class:"col-xs-12 col-md-5"},A={class:"row justify-center q-mt-md"},O=s("div",{style:{width:"15px"}},null,-1),L={__name:"AddFarmerLandWaterConservation",props:{landCrops:[],farmerId:Object},setup(c){const u=c,n=_(),e=f({farmers_id:u.farmerId,owner_id:"",location:"",crops_id:[],total_area:"",crops_acres_or_hectares:"Acres"}),p=()=>{e.transform(a=>({crop_ids:a.crops_id.map(r=>r.id),...a})).post(route("land-water-conservation.store"),{onStart:()=>{n.loading.show()},onSuccess:()=>{n.loading.hide(),n.notify({message:"Successfully Submitted",closeBtn:!0})},onError:a=>{n.loading.hide(),n.notify({message:"Error Occured!",closeBtn:!0})}})};return(a,r)=>(g(),w("div",y,[s("div",S,[k,s("div",C,[s("form",{onSubmit:x(p,["prevent"]),method:"POST"},[s("div",B,[s("div",q,[l(d,{name:"full_name",standout:"",modelValue:o(e).owner_id,"onUpdate:modelValue":r[0]||(r[0]=t=>o(e).owner_id=t),error:!!o(e).errors.owner_id,"error-message":o(e).errors.owner_id,dense:"",filled:"",label:"Owner ID No *"},null,8,["modelValue","error","error-message"])]),s("div",I,[l(d,{name:"full_name",standout:"",modelValue:o(e).location,"onUpdate:modelValue":r[1]||(r[1]=t=>o(e).location=t),error:!!o(e).errors.location,"error-message":o(e).errors.location,dense:"",filled:"",label:"Location *"},null,8,["modelValue","error","error-message"])]),s("div",j,[l(h,{modelValue:o(e).crops_id,"onUpdate:modelValue":r[2]||(r[2]=t=>o(e).crops_id=t),error:!!o(e).errors.crops_id,"error-message":o(e).errors.crops_id,options:c.landCrops,dense:"","option-label":"crop_name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:" Crops Grown*",filled:"",outlined:""},{"no-option":i(()=>[l(b,null,{default:i(()=>[l(v,{class:"text-gresy"},{default:i(()=>[V(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),s("div",N,[l(d,{type:"number",name:"full_name",filled:"",outlined:"",modelValue:o(e).total_area,"onUpdate:modelValue":r[3]||(r[3]=t=>o(e).total_area=t),error:!!o(e).errors.total_area,"error-message":o(e).errors.total_area,dense:"",label:"Total Area Sown (Acres) *"},null,8,["modelValue","error","error-message"])])]),s("div",A,[l(m,{label:"Back",outline:"",dense:"",rounded:"",style:{color:"#2e6525",padding:"5px 40px 5px"},onClick:r[4]||(r[4]=t=>a.$inertia.get(a.route("manage-farmer")))}),O,l(m,{flat:"",rounded:"",label:"Confirm",type:"submit",style:{padding:"5px 30px 5px","background-color":"#2e6525",color:"white"}})])],40,Q)])])]))}};export{L as default};
