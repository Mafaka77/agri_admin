import{u as q,T as V,r as n,o as v,b as x,d as l,e as t,w as m,f as h,g as o,i as y}from"./app-c4ff528f.js";const S={class:"row justify-center"},U={class:"col-xs-12 col-md-9 col-xl-7 q-pa-md",style:{"background-color":"white"}},z=l("div",{class:"q-pt-md text-lg"},"Animal Husbandry Details",-1),j={class:"q-gutter-x-md column"},A=["onSubmit"],B={class:"row justify-around q-mt-md"},C={class:"col-xs-12 col-md-5"},N={class:"col-xs-12 col-md-5"},T=l("div",null,"Sericulture Farm Details",-1),D={class:"row justify-around q-mt-md"},E={class:"col-xs-12 col-md-5"},F={class:"col-xs-12 col-md-5"},O={class:"row justify-around"},P={class:"col-xs-12 col-md-5"},R={class:"col-xs-12 col-md-5"},W={class:"row justify-center q-mt-md"},$=l("div",{style:{width:"15px"}},null,-1),I={__name:"EditFarmerSericulturePage",props:{farmers_id:Object,silkWorm:[],sericulture:[]},setup(c){const a=c,u=q(),e=V({farmers_id:a.sericulture.farmers_id,sericulture_id:a.sericulture.sericulture_id,location:a.sericulture.location,acres_or_hectares:"Acres",total_area:a.sericulture.total_area,size_of_rearing_unit:a.sericulture.size_of_rearing_unit,plantation_acres_or_hectares:"Acres",plantation_total_area:a.sericulture.plantation_total_area,silkworm_id:a.sericulture.silkworm}),f=()=>{e.transform(i=>({silkworm_ids:i.silkworm_id.map(r=>r.id),...i})).put(route("sericulture.update",a.sericulture.id),{onStart:()=>u.loading.show(),onSuccess:()=>{u.loading.hide(),u.notify({message:"Submitted Successfully",closeBtn:!0,icon:"check",iconColor:"blue"})},onError:i=>{u.loading.hide()}})};return(i,r)=>{const _=n("q-breadcrumbs-el"),g=n("q-breadcrumbs"),d=n("q-input"),b=n("q-item-section"),w=n("q-item"),k=n("q-select"),p=n("q-btn");return v(),x("div",S,[l("div",U,[t(g,null,{default:m(()=>[t(_,{icon:"home",onClick:r[0]||(r[0]=s=>i.$inertia.get(i.route("manage-farmer")))}),t(_,{label:"Sericulture",icon:"person"})]),_:1}),z,l("div",j,[l("form",{onSubmit:h(f,["prevent"]),method:"POST"},[l("div",B,[l("div",C,[t(d,{name:"full_name",standout:"",modelValue:o(e).sericulture_id,"onUpdate:modelValue":r[1]||(r[1]=s=>o(e).sericulture_id=s),error:!!o(e).errors.sericulture_id,"error-message":o(e).errors.sericulture_id,dense:"",filled:"",label:"Sericulture ID"},null,8,["modelValue","error","error-message"])]),l("div",N,[t(d,{name:"full_name",standout:"",modelValue:o(e).location,"onUpdate:modelValue":r[2]||(r[2]=s=>o(e).location=s),error:!!o(e).errors.location,"error-message":o(e).errors.location,dense:"",filled:"",label:"Location *"},null,8,["modelValue","error","error-message"])])]),T,l("div",D,[l("div",E,[t(d,{name:"full_name",filled:"",outlined:"",modelValue:o(e).total_area,"onUpdate:modelValue":r[3]||(r[3]=s=>o(e).total_area=s),error:!!o(e).errors.total_area,"error-message":o(e).errors.total_area,dense:"",label:"Total Farm Area *"},null,8,["modelValue","error","error-message"])]),l("div",F,[t(d,{name:"full_name",standout:"",modelValue:o(e).size_of_rearing_unit,"onUpdate:modelValue":r[4]||(r[4]=s=>o(e).size_of_rearing_unit=s),error:!!o(e).errors.size_of_rearing_unit,"error-message":o(e).errors.size_of_rearing_unit,dense:"",filled:"",label:"Size of Rearing Unit(in sqft) *"},null,8,["modelValue","error","error-message"])])]),l("div",O,[l("div",P,[t(k,{modelValue:o(e).silkworm_id,"onUpdate:modelValue":r[5]||(r[5]=s=>o(e).silkworm_id=s),error:!!o(e).errors.silkworm_id,"error-message":o(e).errors.silkworm_id,options:c.silkWorm,dense:"","option-label":"silkworm_name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:"Silkworms Reared",filled:"",outlined:""},{"no-option":m(()=>[t(w,null,{default:m(()=>[t(b,{class:"text-gresy"},{default:m(()=>[y(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),l("div",R,[t(d,{name:"full_name",filled:"",outlined:"",modelValue:o(e).plantation_total_area,"onUpdate:modelValue":r[6]||(r[6]=s=>o(e).plantation_total_area=s),error:!!o(e).errors.plantation_total_area,"error-message":o(e).errors.plantation_total_area,dense:"",label:"Area occupied by Silkworm feed plantation"},null,8,["modelValue","error","error-message"])])]),l("div",W,[t(p,{label:"Back",outline:"",dense:"",rounded:"",style:{color:"#2e6525",padding:"5px 40px 5px"},onClick:r[7]||(r[7]=s=>i.$inertia.get(i.route("manage-farmer")))}),$,t(p,{flat:"",rounded:"",label:"Update",type:"submit",style:{padding:"5px 30px 5px","background-color":"#2e6525",color:"white"}})])],40,A)])])])}}};export{I as default};