import{Q as N,a as h}from"./QBreadcrumbs-10beed98.js";import{u as q,T as R,c as Y,o as c,a as m,b as s,d as l,w as d,e as P,f as o,Q as i,g as _,F as M,r as K,h as T,i as u,j as k,k as y,l as V,t as I,m as O,O as E,C as z}from"./app-8a2b0dee.js";import{Q as b}from"./QFile-eaed5c75.js";import{Q as w,a as $}from"./QSelect-897cd908.js";import{Q as L,a as G}from"./QPopupProxy-0a91b38f.js";import"./QChip-2f6640b7.js";const H={class:"row justify-center"},J={class:"col-xs-12 col-md-9 col-xl-7 q-pa-md",style:{"background-color":"white"}},W=s("div",{class:"q-pt-md text-lg"},"Additional Farmer Details",-1),X={class:"q-gutter-x-md column"},Z=["onSubmit"],ee=s("div",null,"Ration Card Details",-1),oe={class:"row justify-around q-pt-md"},ae={class:"col-xs-12 col-md-5"},se={class:"col-xs-12 col-md-5"},re=s("div",null,"Schemes Applied by Farmer",-1),le={class:"row q-pt-md justify-center"},te={class:"col-xs-12 col-md-11"},de={class:"row justify-around"},ne={class:"col-xs-12 col-md-11"},ie={class:"row justify-around"},ce={class:"col-xs-12 col-md-5"},me={class:"self-center no-outline",tabindex:"0"},_e={class:"col-xs-12 col-md-5"},ue={class:"row justify-around"},pe={class:"col-xs-12 col-md-5"},fe={class:"col-xs-12 col-md-5"},he=s("div",{class:"q-pb-md q-pt-md"},"Kisan Credit Card",-1),be={class:"row justify-around"},ge={class:"col-xs-12 col-md-5"},ve={class:"row"},ke=s("div",{class:"col-xs-6"}," KCC Availed by Farmer ",-1),ye={class:"col-xs-6"},Ve=s("div",{class:"col-xs-12 col-md-5"},null,-1),we={key:0},xe=s("div",null,"KCC Details",-1),Ce={class:"row justify-around"},Ue={class:"col-xs-12 col-md-5"},De={class:"col-xs-12 col-md-5"},Fe={class:"row justify-around"},je={class:"col-xs-12 col-md-5"},Qe={class:"col-xs-12 col-md-5"},Se={class:"row justify-around"},Ae={class:"col-xs-12 col-md-5"},Be={class:"col-xs-12 col-md-5"},Ne={key:1},qe=s("div",{class:"q-pb-md"},"Supporting Documents",-1),Re={class:"row justify-around"},Ye={class:"col-xs-12 col-md-5"},Pe={class:"col-xs-12 col-md-5"},Me=s("div",{class:"q-pt-md q-pb-md"},"Enumerator Details",-1),Ke={class:"row justify-around"},Te={class:"col-xs-12 col-md-5"},Ie={class:"row items-center justify-end"},Oe={class:"col-xs-12 col-md-5"},Ee={class:"row justify-center q-mt-md"},ze=s("div",{style:{width:"15px"}},null,-1),Xe={__name:"AddAdditionalFarmerDetailPage",props:{farmer_id:Object,schemes:[]},setup(g){const v=g,t=q(),e=R({farmers_id:v.farmer_id,ration_card_number:"",ration_card_path:"",ration_card_file:"",scheme_id:"",schemeApplied:[],is_kcc_availed:"No",kcc_card_no:"",kcc_renew_or_new:"",bank_name:"",branch_name:"",year_of_amount_sanction:"",amount_sanction:"",aadhaar_card_path:"",aadhaar_card_file:"",bank_passbook_path:"",bank_passbook_file:"",verifier_name:"",date_of_data_collection:"",designation:"",place:"",remarks:""}),x=["Yes","No"],C=[{label:"Yes",value:"Yes"},{label:"No",value:"No"}],U=()=>{e.scheme_id===""?t.notify({message:"Please select Scheme Applied"}):e.schemeApplied.push({schemes_id:e.scheme_id.id,scheme:e.scheme_id.scheme_name,availed:"Yes",amount:""})},D=()=>{E.get(route("farmer-details",v.farmerId))},F=Y(n=>e.is_kcc_availed),j=()=>{e.post(route("additional-farmer-details.store"),{onStart:()=>{t.loading.show()},onSuccess:()=>{t.loading.hide(),t.notify({message:"Submitted Successfully"})},onError:()=>{t.loading.hide()}})},Q=n=>{const a=new FormData;a.append("ration_card_document",e.ration_card_file),t.loading.show({message:"File uploading......"}),axios.post(route("upload-ration-card"),a,{headers:{"Content-Type":"multipart/form-data"}}).then(r=>{t.loading.hide(),e.ration_card_path=r.data.data,console.log(e.ration_card_path),t.notify({type:"positive",message:"File Uploaded Successfully"})}).catch(r=>{t.notify({type:"negative",message:r})})},S=()=>{const n=new FormData;n.append("aadhaar_card_document",e.aadhaar_card_file),t.loading.show({message:"File uploading......"}),axios.post(route("upload-aadhaar-card"),n,{headers:{"Content-Type":"multipart/form-data"}}).then(a=>{t.loading.hide(),e.aadhaar_card_path=a.data.data,t.notify({type:"positive",message:"File Uploaded Successfully"})}).catch(a=>{console.log(a),t.notify({type:"negative",message:a})})},A=()=>{const n=new FormData;n.append("bank_passbook_document",e.bank_passbook_file),t.loading.show({message:"File uploading......"}),axios.post(route("upload-bank-passbook"),n,{headers:{"Content-Type":"multipart/form-data"}}).then(a=>{t.loading.hide(),e.bank_passbook_path=a.data.data,t.notify({type:"positive",message:"File Uploaded Successfully"})}).catch(a=>{console.log(a),t.notify({type:"negative",message:a})})},p=n=>{t.notify({type:"negative",message:`${n.length} file(s) did not pass validation constraints`})};return(n,a)=>(c(),m("div",H,[s("div",J,[l(N,null,{default:d(()=>[l(h,{icon:"home",onClick:a[0]||(a[0]=r=>n.$inertia.get(n.route("manage-farmer")))}),l(h,{label:"Farmer Details",icon:"add_task",onClick:D}),l(h,{label:"Add Additional Farmer Details",icon:"add_circle"})]),_:1}),W,s("div",X,[s("form",{onSubmit:P(j,["prevent"]),method:"POST"},[ee,s("div",oe,[s("div",ae,[l(i,{name:"ration_card_number",outlined:"",modelValue:o(e).ration_card_number,"onUpdate:modelValue":a[1]||(a[1]=r=>o(e).ration_card_number=r),error:!!o(e).errors.ration_card_number,"error-message":o(e).errors.ration_card_number,dense:"",label:"Ration Card Number *"},null,8,["modelValue","error","error-message"])]),s("div",se,[l(b,{modelValue:o(e).ration_card_file,"onUpdate:modelValue":[a[2]||(a[2]=r=>o(e).ration_card_file=r),Q],error:!!o(e).errors.ration_card_path,"error-message":o(e).errors.ration_card_path,label:"Upload Ration Card(Below <3MB)",color:"green",dense:"",outlined:"",counter:"","max-file-size":"3145728",onRejected:p},{prepend:d(()=>[l(u,{name:"attach_file"})]),_:1},8,["modelValue","error","error-message"])])]),re,s("div",le,[s("div",te,[l(w,{modelValue:o(e).scheme_id,"onUpdate:modelValue":a[3]||(a[3]=r=>o(e).scheme_id=r),error:!!o(e).errors.scheme_id,"error-message":o(e).errors.scheme_id,options:g.schemes,dense:"","option-label":"scheme_name","option-value":"scheme_name","stack-label":"",clearable:"",label:" Scheme Name *",outlined:"",color:"green"},{"no-option":d(()=>[l(k,null,{default:d(()=>[l(y,{class:"text-gresy"},{default:d(()=>[V(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])])]),s("div",de,[s("div",ne,[l(_,{class:"text-white",rounded:"",label:"Add Scheme",style:{"background-color":"#2e6525"},onClick:U})])]),(c(!0),m(M,null,K(o(e).schemeApplied,(r,B)=>(c(),m("div",ie,[s("div",ce,[l($,{borderless:""},{control:d(()=>[s("div",me,I(r.scheme),1)]),append:d(()=>[l(_,{dense:"",flat:"",onClick:()=>o(e).schemeApplied.splice(B,1),icon:"delete",color:"red"},null,8,["onClick"])]),_:2},1024)]),s("div",_e,[s("div",ue,[s("div",pe,[l(w,{modelValue:r.availed,"onUpdate:modelValue":f=>r.availed=f,options:x,dense:"","option-label":"label","option-value":"value","stack-label":"",label:" Availed *",outlined:""},{"no-option":d(()=>[l(k,null,{default:d(()=>[l(y,{class:"text-gresy"},{default:d(()=>[V(" No results ")]),_:1})]),_:1})]),_:2},1032,["modelValue","onUpdate:modelValue"])]),s("div",fe,[l(i,{name:"benefit_amount",outlined:"",modelValue:r.amount,"onUpdate:modelValue":f=>r.amount=f,error:!!o(e).errors.ration_card_number,"error-message":o(e).errors.ration_card_number,dense:"",label:"Benefit Amt. (till date)"},null,8,["modelValue","onUpdate:modelValue","error","error-message"])])])])]))),256)),he,s("div",be,[s("div",ge,[s("div",ve,[ke,s("div",ye,[l(T,{modelValue:o(e).is_kcc_availed,"onUpdate:modelValue":a[4]||(a[4]=r=>o(e).is_kcc_availed=r),options:C,color:"primary",inline:""},null,8,["modelValue"])])])]),Ve]),F.value==="Yes"?(c(),m("div",we,[xe,s("div",Ce,[s("div",Ue,[l(i,{outlined:"",modelValue:o(e).kcc_card_no,"onUpdate:modelValue":a[5]||(a[5]=r=>o(e).kcc_card_no=r),error:!!o(e).errors.kcc_card_no,"error-message":o(e).errors.kcc_card_no,dense:"",label:"KCC Card Number "},null,8,["modelValue","error","error-message"])]),s("div",De,[l(i,{outlined:"",modelValue:o(e).kcc_renew_or_new,"onUpdate:modelValue":a[6]||(a[6]=r=>o(e).kcc_renew_or_new=r),error:!!o(e).errors.kcc_renew_or_new,"error-message":o(e).errors.kcc_renew_or_new,dense:"",label:"KCC Renew/New "},null,8,["modelValue","error","error-message"])])]),s("div",Fe,[s("div",je,[l(i,{outlined:"",modelValue:o(e).bank_name,"onUpdate:modelValue":a[7]||(a[7]=r=>o(e).bank_name=r),error:!!o(e).errors.bank_name,"error-message":o(e).errors.bank_name,dense:"",label:"Bank Name "},null,8,["modelValue","error","error-message"])]),s("div",Qe,[l(i,{outlined:"",modelValue:o(e).branch_name,"onUpdate:modelValue":a[8]||(a[8]=r=>o(e).branch_name=r),error:!!o(e).errors.branch_name,"error-message":o(e).errors.branch_name,dense:"",label:"Branch Name "},null,8,["modelValue","error","error-message"])])]),s("div",Se,[s("div",Ae,[l(i,{outlined:"",modelValue:o(e).year_of_amount_sanction,"onUpdate:modelValue":a[9]||(a[9]=r=>o(e).year_of_amount_sanction=r),error:!!o(e).errors.year_of_amount_sanction,"error-message":o(e).errors.year_of_amount_sanction,dense:"",label:"Year of sanctioning the amount"},null,8,["modelValue","error","error-message"])]),s("div",Be,[l(i,{outlined:"",modelValue:o(e).amount_sanction,"onUpdate:modelValue":a[10]||(a[10]=r=>o(e).amount_sanction=r),error:!!o(e).errors.amount_sanction,"error-message":o(e).errors.amount_sanction,dense:"",label:"Amount Sanctioned(in Rs)"},null,8,["modelValue","error","error-message"])])])])):(c(),m("div",Ne)),qe,s("div",Re,[s("div",Ye,[l(b,{modelValue:o(e).aadhaar_card_file,"onUpdate:modelValue":[a[11]||(a[11]=r=>o(e).aadhaar_card_file=r),S],error:!!o(e).errors.aadhaar_card_path,"error-message":o(e).errors.aadhaar_card_path,label:"Upload Aadhaar Card (Below <3Mb)",color:"green",dense:"",outlined:"",counter:"","max-file-size":"3145728",onRejected:p},{prepend:d(()=>[l(u,{name:"attach_file"})]),_:1},8,["modelValue","error","error-message"])]),s("div",Pe,[l(b,{modelValue:o(e).bank_passbook_file,"onUpdate:modelValue":[a[12]||(a[12]=r=>o(e).bank_passbook_file=r),A],error:!!o(e).errors.bank_passbook_path,"error-message":o(e).errors.bank_passbook_path,label:"Upload Bank Passbook (Below <3Mb)",color:"green",dense:"",counter:"",outlined:"","max-file-size":"3145728",onRejected:p},{prepend:d(()=>[l(u,{name:"attach_file"})]),_:1},8,["modelValue","error","error-message"])])]),Me,s("div",Ke,[s("div",Te,[l(i,{readonly:"",clearable:"",modelValue:o(e).date_of_data_collection,"onUpdate:modelValue":a[14]||(a[14]=r=>o(e).date_of_data_collection=r),dense:"",rules:["date"],label:"Date of Data Collection *",outlined:"",color:"green",error:!!o(e).errors.date_of_data_collection,"error-message":o(e).errors.date_of_data_collection},{append:d(()=>[l(u,{name:"event",class:"cursor-pointer"},{default:d(()=>[l(L,{cover:"","transition-show":"scale","transition-hide":"scale"},{default:d(()=>[l(G,{mask:"DD-MM-YYYY",modelValue:o(e).date_of_data_collection,"onUpdate:modelValue":a[13]||(a[13]=r=>o(e).date_of_data_collection=r),minimal:""},{default:d(()=>[s("div",Ie,[O(l(_,{label:"Close",color:"primary",flat:""},null,512),[[z]])])]),_:1},8,["modelValue"])]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message"])]),s("div",Oe,[l(i,{type:"textarea",color:"green",outlined:"",modelValue:o(e).remarks,"onUpdate:modelValue":a[15]||(a[15]=r=>o(e).remarks=r),error:!!o(e).errors.remarks,"error-message":o(e).errors.remarks,dense:"",label:"Remarks *"},null,8,["modelValue","error","error-message"])])]),s("div",Ee,[l(_,{label:"Back",outline:"",dense:"",rounded:"",style:{color:"#2e6525",padding:"5px 40px 5px"},onClick:a[16]||(a[16]=r=>n.$inertia.get(n.route("manage-farmer")))}),ze,l(_,{flat:"",rounded:"",label:"Confirm",type:"submit",style:{padding:"5px 30px 5px","background-color":"#2e6525",color:"white"}})])],40,Z)])])]))}};export{Xe as default};
