import{u as k,T as h,c as q,r as i,o as w,b as N,d as t,e as s,w as a,f as U,g as o,i as f}from"./app-c4ff528f.js";const j={class:"row justify-center"},B={class:"col-xs-12 col-md-9 col-xl-7 q-pa-xl",style:{"background-color":"white"}},F=t("div",{class:"q-pt-md text-lg"},"Animal Husbandry Details",-1),I={class:"q-gutter-x-md column"},T=["onSubmit"],O={class:"row justify-around q-mt-md"},A={class:"col-xs-12 col-md-5"},C={class:"col-xs-12 col-md-5"},D={class:"row justify-around"},P={class:"col-xs-12 col-md-5"},S={class:"col-xs-12 col-md-5"},H={class:"row justify-around"},E={class:"col-xs-12 col-md-5"},L=t("div",{class:"col-xs-12 col-md-5"},null,-1),M={class:"row justify-around q-mt-md"},$={class:"col-xs-12 col-md-2"},z={class:"col-xs-12 col-md-2"},Q={class:"col-xs-12 col-md-2"},Y={class:"col-xs-12 col-md-2"},G=t("div",{class:"q-pt-md text-lg"},"Poultry Details",-1),J={class:"row justify-around"},K={class:"col-xs-12 col-md-5"},R={class:"col-xs-12 col-md-5"},W={class:"row justify-around q-mt-md"},X={class:"col-xs-12 col-md-5"},Z=t("div",{class:"col-xs-12 col-md-5"},null,-1),ee={class:"row justify-center q-mt-md"},oe=t("div",{style:{width:"15px"}},null,-1),re={__name:"AddFarmerAnimalHusbandry",props:{typeOfBreed:[],typeOfFarm:[],poultryBreed:[],poultryFarm:[],livestock:[],farmers:Object},setup(u){const g=u,c=k(),e=h({farmers_id:g.farmers,husbandry_id:"",location:"",livestock_id:[],type_of_breed:[],type_of_farm:[],adult_male:0,adult_female:0,young_stock:0,total:0,type_of_poultry_farm:[],type_of_poultry_breed:[],no_of_poultry:""}),v=q(d=>parseInt(e.adult_male)+parseInt(e.adult_female)+parseInt(e.young_stock));e.total=v;const V=()=>{e.transform(d=>({livestock_ids:d.livestock_id.map(l=>l.id),type_of_breeds:d.type_of_breed.map(l=>l.id),type_of_farms:d.type_of_farm.map(l=>l.id),type_of_poultry_farms:d.type_of_poultry_farm.map(l=>l.id),type_of_poultry_breeds:d.type_of_poultry_breed.map(l=>l.id),...d})).post(route("animal-husbandry.store"),{onStart:()=>c.loading.show(),onSuccess:()=>{c.loading.hide()},onError:()=>{c.loading.hide()}})};return(d,l)=>{const y=i("q-breadcrumbs-el"),x=i("q-breadcrumbs"),n=i("q-input"),m=i("q-item-section"),_=i("q-item"),p=i("q-select"),b=i("q-btn");return w(),N("div",j,[t("div",B,[s(x,null,{default:a(()=>[s(y,{icon:"home",onClick:l[0]||(l[0]=r=>d.$inertia.get(d.route("manage-farmer")))}),s(y,{label:"Fisheries",icon:"person"})]),_:1}),F,t("div",I,[t("form",{onSubmit:U(V,["prevent"]),method:"POST"},[t("div",O,[t("div",A,[s(n,{name:"full_name",standout:"",modelValue:o(e).husbandry_id,"onUpdate:modelValue":l[1]||(l[1]=r=>o(e).husbandry_id=r),error:!!o(e).errors.husbandry_id,"error-message":o(e).errors.husbandry_id,dense:"",filled:"",label:"Husbandry ID *"},null,8,["modelValue","error","error-message"])]),t("div",C,[s(n,{name:"full_name",standout:"",modelValue:o(e).location,"onUpdate:modelValue":l[2]||(l[2]=r=>o(e).location=r),error:!!o(e).errors.location,"error-message":o(e).errors.location,dense:"",filled:"",label:"Location *"},null,8,["modelValue","error","error-message"])])]),t("div",D,[t("div",P,[s(p,{modelValue:o(e).livestock_id,"onUpdate:modelValue":l[3]||(l[3]=r=>o(e).livestock_id=r),error:!!o(e).errors.livestock_id,"error-message":o(e).errors.livestock_id,options:u.livestock,dense:"","option-label":"livestock_name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:"Livestock *",filled:"",outlined:""},{"no-option":a(()=>[s(_,null,{default:a(()=>[s(m,{class:"text-gresy"},{default:a(()=>[f(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),t("div",S,[s(p,{modelValue:o(e).type_of_breed,"onUpdate:modelValue":l[4]||(l[4]=r=>o(e).type_of_breed=r),error:!!o(e).errors.type_of_breed,"error-message":o(e).errors.type_of_breed,options:u.typeOfBreed,dense:"","option-label":"name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:"Type of breed *",filled:"",outlined:""},{"no-option":a(()=>[s(_,null,{default:a(()=>[s(m,{class:"text-gresy"},{default:a(()=>[f(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])])]),t("div",H,[t("div",E,[s(p,{modelValue:o(e).type_of_farm,"onUpdate:modelValue":l[5]||(l[5]=r=>o(e).type_of_farm=r),error:!!o(e).errors.type_of_farm,"error-message":o(e).errors.type_of_farm,options:u.typeOfFarm,dense:"","option-label":"name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:"Type of Farm ",filled:"",outlined:""},{"no-option":a(()=>[s(_,null,{default:a(()=>[s(m,{class:"text-gresy"},{default:a(()=>[f(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),L]),t("div",M,[t("div",$,[s(n,{min:"0",type:"number",outlined:"",modelValue:o(e).adult_male,"onUpdate:modelValue":l[6]||(l[6]=r=>o(e).adult_male=r),error:!!o(e).errors.adult_male,"error-message":o(e).errors.adult_male,"lazy-rules":"",rules:[r=>r>=0||"Invalid Number"],dense:"",filled:"",label:"Adult Male "},null,8,["modelValue","error","error-message","rules"])]),t("div",z,[s(n,{min:"0",type:"number",outlined:"",modelValue:o(e).adult_female,"onUpdate:modelValue":l[7]||(l[7]=r=>o(e).adult_female=r),error:!!o(e).errors.adult_female,"error-message":o(e).errors.adult_female,rules:[r=>r>=0||"Invalid ID Number"],dense:"",filled:"",label:"Adult Female"},null,8,["modelValue","error","error-message","rules"])]),t("div",Q,[s(n,{min:"0",type:"number",outlined:"",modelValue:o(e).young_stock,"onUpdate:modelValue":l[8]||(l[8]=r=>o(e).young_stock=r),error:!!o(e).errors.young_stock,"error-message":o(e).errors.young_stock,rules:[r=>r>=0||"Invalid ID Number"],dense:"",filled:"",label:"Youngstock"},null,8,["modelValue","error","error-message","rules"])]),t("div",Y,[s(n,{type:"number",readonly:"",outlined:"",modelValue:o(e).total,"onUpdate:modelValue":l[9]||(l[9]=r=>o(e).total=r),error:!!o(e).errors.total,"error-message":o(e).errors.total,dense:"",filled:"",label:"Total"},null,8,["modelValue","error","error-message"])])]),G,t("div",J,[t("div",K,[s(p,{modelValue:o(e).type_of_poultry_farm,"onUpdate:modelValue":l[10]||(l[10]=r=>o(e).type_of_poultry_farm=r),error:!!o(e).errors.type_of_poultry_farm,"error-message":o(e).errors.type_of_poultry_farm,options:u.poultryFarm,dense:"","option-label":"name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:"Type of Poultry Farm*",filled:"",outlined:""},{"no-option":a(()=>[s(_,null,{default:a(()=>[s(m,{class:"text-gresy"},{default:a(()=>[f(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),t("div",R,[s(p,{modelValue:o(e).type_of_poultry_breed,"onUpdate:modelValue":l[11]||(l[11]=r=>o(e).type_of_poultry_breed=r),error:!!o(e).errors.type_of_poultry_breed,"error-message":o(e).errors.type_of_poultry_breed,options:u.poultryBreed,dense:"","option-label":"name","option-value":"id",multiple:"","use-chips":"","stack-label":"",label:"Type of Poultry Breed *",filled:"",outlined:""},{"no-option":a(()=>[s(_,null,{default:a(()=>[s(m,{class:"text-gresy"},{default:a(()=>[f(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])])]),t("div",W,[t("div",X,[s(n,{outlined:"",modelValue:o(e).no_of_poultry,"onUpdate:modelValue":l[12]||(l[12]=r=>o(e).no_of_poultry=r),error:!!o(e).errors.no_of_poultry,"error-message":o(e).errors.no_of_poultry,dense:"",filled:"",label:"No of Poultry *"},null,8,["modelValue","error","error-message"])]),Z]),t("div",ee,[s(b,{label:"Back",outline:"",dense:"",rounded:"",style:{color:"#2e6525",padding:"5px 40px 5px"},onClick:l[13]||(l[13]=r=>d.$inertia.get(d.route("manage-farmer")))}),oe,s(b,{flat:"",rounded:"",label:"Confirm",type:"submit",style:{padding:"5px 30px 5px","background-color":"#2e6525",color:"white"}})])],40,T)])])])}}};export{re as default};