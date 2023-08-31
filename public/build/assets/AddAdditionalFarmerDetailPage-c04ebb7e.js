import{u as Q,T as N,c as B,o as m,a as _,b as a,d as l,e as o,Q as c,w as q,f as i,g as d,F as R,r as Y,h as P,i as u,j as v,k,l as y,t as M,m as K,C as T}from"./app-56650a3d.js";import{Q as h}from"./QFile-57599330.js";import{Q as V,a as z}from"./QSelect-9eee4e1f.js";import{Q as I,a as E}from"./QPopupProxy-517d8d83.js";import"./QChip-8aedfb60.js";const O={class:"row justify-center"},$={class:"col-xs-12 col-md-9 col-xl-7 q-pa-md",style:{"background-color":"white"}},L={class:"",style:{color:"#2e6525"}},G=a("div",{class:"q-pt-md text-lg"},"Additional Farmer Details",-1),H={class:"q-gutter-x-md column"},J=["onSubmit"],W=a("div",null,"Ration Card Details",-1),X={class:"row justify-around q-pt-md"},Z={class:"col-xs-12 col-md-5"},ee={class:"col-xs-12 col-md-5"},oe=a("div",null,"Schemes Applied by Farmer",-1),ae={class:"row q-pt-md justify-center"},se={class:"col-xs-12 col-md-11"},re={class:"row justify-around"},le={class:"col-xs-12 col-md-11"},te={class:"row justify-around"},de={class:"col-xs-12 col-md-5"},ne={class:"self-center no-outline",tabindex:"0"},ie={class:"col-xs-12 col-md-5"},ce={class:"row justify-around"},me={class:"col-xs-12 col-md-5"},_e={class:"col-xs-12 col-md-5"},ue=a("div",{class:"q-pb-md q-pt-md"},"Kisan Credit Card",-1),pe={class:"row justify-around"},fe={class:"col-xs-12 col-md-5"},he={class:"row"},be=a("div",{class:"col-xs-6"}," KCC Availed by Farmer ",-1),ge={class:"col-xs-6"},ve=a("div",{class:"col-xs-12 col-md-5"},null,-1),ke={key:0},ye=a("div",null,"KCC Details",-1),Ve={class:"row justify-around"},we={class:"col-xs-12 col-md-5"},xe={class:"col-xs-12 col-md-5"},Ce={class:"row justify-around"},Ue={class:"col-xs-12 col-md-5"},je={class:"col-xs-12 col-md-5"},De={class:"row justify-around"},Fe={class:"col-xs-12 col-md-5"},Se={class:"col-xs-12 col-md-5"},Ae={key:1},Qe=a("div",{class:"q-pb-md"},"Supporting Documents",-1),Ne={class:"row justify-around"},Be={class:"col-xs-12 col-md-5"},qe={class:"col-xs-12 col-md-5"},Re=a("div",{class:"q-pt-md q-pb-md"},"Enumerator Details",-1),Ye={class:"row justify-around"},Pe={class:"col-xs-12 col-md-5"},Me={class:"row items-center justify-end"},Ke={class:"col-xs-12 col-md-5"},Te={class:"row justify-center q-mt-md"},ze=a("div",{style:{width:"15px"}},null,-1),Ge={__name:"AddAdditionalFarmerDetailPage",props:{farmer_id:Object,schemes:[]},setup(b){const g=b,t=Q(),e=N({farmers_id:g.farmer_id,ration_card_number:"",ration_card_path:"",ration_card_file:"",scheme_id:"",schemeApplied:[],is_kcc_availed:"No",kcc_card_no:"",kcc_renew_or_new:"",bank_name:"",branch_name:"",year_of_amount_sanction:"",amount_sanction:"",aadhaar_card_path:"",aadhaar_card_file:"",bank_passbook_path:"",bank_passbook_file:"",verifier_name:"",date_of_data_collection:"",designation:"",place:"",remarks:""}),w=["Yes","No"],x=[{label:"Yes",value:"Yes"},{label:"No",value:"No"}],C=()=>{e.scheme_id===""?t.notify({message:"Please select Scheme Applied"}):e.schemeApplied.push({schemes_id:e.scheme_id.id,scheme:e.scheme_id.scheme_name,availed:"Yes",amount:""})},U=B(n=>e.is_kcc_availed),j=()=>{e.post(route("additional-farmer-details.store"),{onStart:()=>{t.loading.show()},onSuccess:()=>{t.loading.hide(),t.notify({message:"Submitted Successfully"})},onError:()=>{t.loading.hide()}})},D=n=>{const s=new FormData;s.append("ration_card_document",e.ration_card_file),t.loading.show({message:"File uploading......"}),axios.post(route("upload-ration-card"),s,{headers:{"Content-Type":"multipart/form-data"}}).then(r=>{t.loading.hide(),e.ration_card_path=r.data.data,console.log(e.ration_card_path),t.notify({type:"positive",message:"File Uploaded Successfully"})}).catch(r=>{t.notify({type:"negative",message:r})})},F=()=>{const n=new FormData;n.append("aadhaar_card_document",e.aadhaar_card_file),t.loading.show({message:"File uploading......"}),axios.post(route("upload-aadhaar-card"),n,{headers:{"Content-Type":"multipart/form-data"}}).then(s=>{t.loading.hide(),e.aadhaar_card_path=s.data.data,t.notify({type:"positive",message:"File Uploaded Successfully"})}).catch(s=>{console.log(s),t.notify({type:"negative",message:s})})},S=()=>{const n=new FormData;n.append("bank_passbook_document",e.bank_passbook_file),t.loading.show({message:"File uploading......"}),axios.post(route("upload-bank-passbook"),n,{headers:{"Content-Type":"multipart/form-data"}}).then(s=>{t.loading.hide(),e.bank_passbook_path=s.data.data,t.notify({type:"positive",message:"File Uploaded Successfully"})}).catch(s=>{console.log(s),t.notify({type:"negative",message:s})})},p=n=>{t.notify({type:"negative",message:`${n.length} file(s) did not pass validation constraints`})};return(n,s)=>(m(),_("div",O,[a("div",$,[a("div",L,[l(c,{size:"12px",flat:"",dense:"",icon:"arrow_back",label:"Back",onClick:s[0]||(s[0]=r=>n.$inertia.get(n.route("farmer-details",o(e).farmers_id)))})]),G,a("div",H,[a("form",{onSubmit:q(j,["prevent"]),method:"POST"},[W,a("div",X,[a("div",Z,[l(i,{name:"ration_card_number",outlined:"",modelValue:o(e).ration_card_number,"onUpdate:modelValue":s[1]||(s[1]=r=>o(e).ration_card_number=r),error:!!o(e).errors.ration_card_number,"error-message":o(e).errors.ration_card_number,dense:"",label:"Ration Card Number *"},null,8,["modelValue","error","error-message"])]),a("div",ee,[l(h,{modelValue:o(e).ration_card_file,"onUpdate:modelValue":[s[2]||(s[2]=r=>o(e).ration_card_file=r),D],error:!!o(e).errors.ration_card_path,"error-message":o(e).errors.ration_card_path,label:"Upload Ration Card(Below <3MB)",color:"green",dense:"",outlined:"",counter:"","max-file-size":"3145728",onRejected:p},{prepend:d(()=>[l(u,{name:"attach_file"})]),_:1},8,["modelValue","error","error-message"])])]),oe,a("div",ae,[a("div",se,[l(V,{modelValue:o(e).scheme_id,"onUpdate:modelValue":s[3]||(s[3]=r=>o(e).scheme_id=r),error:!!o(e).errors.scheme_id,"error-message":o(e).errors.scheme_id,options:b.schemes,dense:"","option-label":"scheme_name","option-value":"scheme_name","stack-label":"",clearable:"",label:" Scheme Name *",outlined:"",color:"green"},{"no-option":d(()=>[l(v,null,{default:d(()=>[l(k,{class:"text-gresy"},{default:d(()=>[y(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])])]),a("div",re,[a("div",le,[l(c,{class:"text-white",rounded:"",label:"Add Scheme",style:{"background-color":"#2e6525"},onClick:C})])]),(m(!0),_(R,null,Y(o(e).schemeApplied,(r,A)=>(m(),_("div",te,[a("div",de,[l(z,{borderless:""},{control:d(()=>[a("div",ne,M(r.scheme),1)]),append:d(()=>[l(c,{dense:"",flat:"",onClick:()=>o(e).schemeApplied.splice(A,1),icon:"delete",color:"red"},null,8,["onClick"])]),_:2},1024)]),a("div",ie,[a("div",ce,[a("div",me,[l(V,{modelValue:r.availed,"onUpdate:modelValue":f=>r.availed=f,options:w,dense:"","option-label":"label","option-value":"value","stack-label":"",label:" Availed *",outlined:""},{"no-option":d(()=>[l(v,null,{default:d(()=>[l(k,{class:"text-gresy"},{default:d(()=>[y(" No results ")]),_:1})]),_:1})]),_:2},1032,["modelValue","onUpdate:modelValue"])]),a("div",_e,[l(i,{name:"benefit_amount",outlined:"",modelValue:r.amount,"onUpdate:modelValue":f=>r.amount=f,error:!!o(e).errors.ration_card_number,"error-message":o(e).errors.ration_card_number,dense:"",label:"Benefit Amt. (till date)"},null,8,["modelValue","onUpdate:modelValue","error","error-message"])])])])]))),256)),ue,a("div",pe,[a("div",fe,[a("div",he,[be,a("div",ge,[l(P,{modelValue:o(e).is_kcc_availed,"onUpdate:modelValue":s[4]||(s[4]=r=>o(e).is_kcc_availed=r),options:x,color:"primary",inline:""},null,8,["modelValue"])])])]),ve]),U.value==="Yes"?(m(),_("div",ke,[ye,a("div",Ve,[a("div",we,[l(i,{outlined:"",modelValue:o(e).kcc_card_no,"onUpdate:modelValue":s[5]||(s[5]=r=>o(e).kcc_card_no=r),error:!!o(e).errors.kcc_card_no,"error-message":o(e).errors.kcc_card_no,dense:"",label:"KCC Card Number "},null,8,["modelValue","error","error-message"])]),a("div",xe,[l(i,{outlined:"",modelValue:o(e).kcc_renew_or_new,"onUpdate:modelValue":s[6]||(s[6]=r=>o(e).kcc_renew_or_new=r),error:!!o(e).errors.kcc_renew_or_new,"error-message":o(e).errors.kcc_renew_or_new,dense:"",label:"KCC Renew/New "},null,8,["modelValue","error","error-message"])])]),a("div",Ce,[a("div",Ue,[l(i,{outlined:"",modelValue:o(e).bank_name,"onUpdate:modelValue":s[7]||(s[7]=r=>o(e).bank_name=r),error:!!o(e).errors.bank_name,"error-message":o(e).errors.bank_name,dense:"",label:"Bank Name "},null,8,["modelValue","error","error-message"])]),a("div",je,[l(i,{outlined:"",modelValue:o(e).branch_name,"onUpdate:modelValue":s[8]||(s[8]=r=>o(e).branch_name=r),error:!!o(e).errors.branch_name,"error-message":o(e).errors.branch_name,dense:"",label:"Branch Name "},null,8,["modelValue","error","error-message"])])]),a("div",De,[a("div",Fe,[l(i,{outlined:"",modelValue:o(e).year_of_amount_sanction,"onUpdate:modelValue":s[9]||(s[9]=r=>o(e).year_of_amount_sanction=r),error:!!o(e).errors.year_of_amount_sanction,"error-message":o(e).errors.year_of_amount_sanction,dense:"",label:"Year of sanctioning the amount"},null,8,["modelValue","error","error-message"])]),a("div",Se,[l(i,{outlined:"",modelValue:o(e).amount_sanction,"onUpdate:modelValue":s[10]||(s[10]=r=>o(e).amount_sanction=r),error:!!o(e).errors.amount_sanction,"error-message":o(e).errors.amount_sanction,dense:"",label:"Amount Sanctioned(in Rs)"},null,8,["modelValue","error","error-message"])])])])):(m(),_("div",Ae)),Qe,a("div",Ne,[a("div",Be,[l(h,{modelValue:o(e).aadhaar_card_file,"onUpdate:modelValue":[s[11]||(s[11]=r=>o(e).aadhaar_card_file=r),F],error:!!o(e).errors.aadhaar_card_path,"error-message":o(e).errors.aadhaar_card_path,label:"Upload Aadhaar Card (Below <3Mb)",color:"green",dense:"",outlined:"",counter:"","max-file-size":"3145728",onRejected:p},{prepend:d(()=>[l(u,{name:"attach_file"})]),_:1},8,["modelValue","error","error-message"])]),a("div",qe,[l(h,{modelValue:o(e).bank_passbook_file,"onUpdate:modelValue":[s[12]||(s[12]=r=>o(e).bank_passbook_file=r),S],error:!!o(e).errors.bank_passbook_path,"error-message":o(e).errors.bank_passbook_path,label:"Upload Bank Passbook (Below <3Mb)",color:"green",dense:"",counter:"",outlined:"","max-file-size":"3145728",onRejected:p},{prepend:d(()=>[l(u,{name:"attach_file"})]),_:1},8,["modelValue","error","error-message"])])]),Re,a("div",Ye,[a("div",Pe,[l(i,{readonly:"",clearable:"",modelValue:o(e).date_of_data_collection,"onUpdate:modelValue":s[14]||(s[14]=r=>o(e).date_of_data_collection=r),dense:"",rules:["date"],label:"Date of Data Collection *",outlined:"",color:"green",error:!!o(e).errors.date_of_data_collection,"error-message":o(e).errors.date_of_data_collection},{append:d(()=>[l(u,{name:"event",class:"cursor-pointer"},{default:d(()=>[l(I,{cover:"","transition-show":"scale","transition-hide":"scale"},{default:d(()=>[l(E,{mask:"DD-MM-YYYY",modelValue:o(e).date_of_data_collection,"onUpdate:modelValue":s[13]||(s[13]=r=>o(e).date_of_data_collection=r),minimal:""},{default:d(()=>[a("div",Me,[K(l(c,{label:"Close",color:"primary",flat:""},null,512),[[T]])])]),_:1},8,["modelValue"])]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message"])]),a("div",Ke,[l(i,{type:"textarea",color:"green",outlined:"",modelValue:o(e).remarks,"onUpdate:modelValue":s[15]||(s[15]=r=>o(e).remarks=r),error:!!o(e).errors.remarks,"error-message":o(e).errors.remarks,dense:"",label:"Remarks *"},null,8,["modelValue","error","error-message"])])]),a("div",Te,[l(c,{label:"Back",outline:"",dense:"",rounded:"",style:{color:"#2e6525",padding:"5px 40px 5px"},onClick:s[16]||(s[16]=r=>n.$inertia.get(n.route("farmer_details",g.farmer_id)))}),ze,l(c,{flat:"",rounded:"",label:"Confirm",type:"submit",style:{padding:"5px 30px 5px","background-color":"#2e6525",color:"white"}})])],40,J)])])]))}};export{Ge as default};
