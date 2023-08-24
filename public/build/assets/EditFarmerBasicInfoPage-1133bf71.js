import{u as T,n as c,T as H,c as W,o as V,a as y,b as s,e as R,d as r,f as o,Q as d,w as i,l as u,h as $,t as z,g as x,i as J,m as K,j as m,k as _,C as X}from"./app-8a2b0dee.js";import{Q as Z,a as ee}from"./QPopupProxy-0a91b38f.js";import{Q as f}from"./QSelect-897cd908.js";import"./QChip-2f6640b7.js";const oe={class:"row justify-center"},le={class:"col-md-9 col-xl-7 q-pa-md",style:{"background-color":"white"}},ae=s("div",{class:"text-lg"},"Edit Farmer Basic Details",-1),se={class:"q-gutter-x-md column q-pt-md"},re=["onSubmit"],ie={class:"row justify-around"},ne={class:"col-xs-12 col-md-5"},te={class:"col-xs-12 col-md-5"},de={class:"row items-center justify-end"},ue={class:"row justify-around"},ce={class:"col-xs-12 col-md-5"},me={class:"col-xs-12 col-md-5"},_e={class:"row justify-around"},fe={class:"col-xs-12 col-md-5"},pe={class:"col-xs-12 col-md-5"},ge={class:"row justify-around"},ve={class:"col-xs-12 col-md-5"},be={class:"col-xs-12 col-md-5"},he={class:"row justify-around"},Ve={class:"col-xs-12 col-md-5"},ye={class:"col-xs-12 col-md-5"},xe={class:"row justify-around"},ke={class:"col-xs-12 col-md-5"},Ie={class:"col-xs-12 col-md-5"},we={class:"row justify-around income"},Ne={class:"col-xs-12 col-md-5"},Ue={key:0,class:"col-xs-12 col-md-5"},Se={key:1,class:"col-xs-12 col-md-5"},De=s("div",{class:"q-pb-sm"}," Address ",-1),Be={class:"row justify-around"},je={class:"col-xs-12 col-md-5"},Ce={class:"col-xs-12 col-md-5"},qe={class:"row justify-around"},Qe={class:"col-xs-12 col-md-5"},Fe={class:"col-xs-12 col-md-5"},Le={class:"row justify-around"},Pe=s("div",{class:"col-xs-12 col-md-5"},[s("div",{class:"row"},[u(" State LGD: "),s("div",{class:"text-weight-bold"},"15")])],-1),Oe={class:"col-xs-12 col-md-5 row"},Ye={class:"text-weight-bold"},Ae=s("div",{class:"q-mb-sm"}," Bank Details ",-1),Ee={class:"row justify-around"},Ge={class:"col-xs-12 col-md-5"},Me={class:"col-xs-12 col-md-5"},Te={class:"row justify-around"},He={class:"col-xs-12 col-md-5"},We={class:"col-xs-12 col-md-5"},Re={class:"row justify-center q-mt-md"},$e=s("div",{style:{width:"15px"}},null,-1),Ze={__name:"EditFarmerBasicInfoPage",props:{basicInfo:Object,gender:[],districts:[],caste:[],category:[]},setup(p){const n=p,g=T(),v=c(!0),b=c(!0),k=c(!0),I=c([]),w=c([]),h=c([]),N=c([]),U=c(n.basicInfo.village.village_name),S=c(n.basicInfo.block.block_name),e=H({id:n.basicInfo.id,full_name:n.basicInfo.full_name,dob:n.basicInfo.dob,farmer_category_id:n.basicInfo.farmer_category_id,gender_id:n.basicInfo.gender_id,relationship:n.basicInfo.relationship,relationship_name:n.basicInfo.relationship_name,phone_no:n.basicInfo.phone_no,voter_no:n.basicInfo.voter_no,education_qualification:n.basicInfo.education_qualification,district_id:n.basicInfo.district_id,sub_division_id:n.basicInfo.sub_division_id,block_id:n.basicInfo.block_id,village_id:n.basicInfo.village_id,other_income:n.basicInfo.other_income,is_farming_main_income:n.basicInfo.is_farming_main_income===1?"Yes":"No",caste_id:n.basicInfo.caste_id,aadhaar_no:n.basicInfo.aadhaar_no,aadhaar_verify_type:n.basicInfo.aadhaar_verify_type,bank_name:n.basicInfo.farmer_bank_details.bank_name,account_number:n.basicInfo.farmer_bank_details.account_number,branch_name:n.basicInfo.farmer_bank_details.branch_name,ifsc_code:n.basicInfo.farmer_bank_details.ifsc_code,state_lgd_code:"15",village_lgd_code:n.basicInfo.village_lgd_code}),B=[{label:"Fathers Name",value:"Father Name"},{label:"Wife Name",value:"Wife Name"},{label:"Husband Name",value:"Husband Name"}],j=[{label:"Yes",value:"Yes"},{label:"No",value:"No"}],C=[{label:"Physical Verified",value:"Physically Verified"},{label:"Online Verified",value:"Online Verified"}],q=W(()=>e.is_farming_main_income),Q=t=>{axios.get(route("get-sub-division",t)).then(l=>{const{data:a}=l.data;v.value=!1,I.value=a,e.sub_division_id=""})},F=t=>{axios.get(route("get-block",t)).then(l=>{const{data:a}=l.data;v.value=!1,b.value=!1,w.value=a,e.block_id=""})},L=t=>{axios.get(route("get-village",t)).then(l=>{const{data:a}=l.data;v.value=!1,b.value=!1,k.value=!1,h.value=a,N.value=a,e.village_id=""})},P=(t,l,a)=>{l(()=>{const G=t.toLocaleLowerCase(),D=c([]);D.value=[...N.value],h.value=D.value.filter(M=>M.village_name.toLowerCase().indexOf(G)>-1)})},O=t=>{U.value=t},Y=t=>{S.value=t},A=t=>{console.log(t),axios.get(route("get-village-lgd",t)).then(l=>{const{data:a}=l.data;e.village_lgd_code=a.village_lgd_code})},E=t=>{e.put(route("farmer-basic-info.update",e.id),{onStart:()=>g.loading.show(),onSuccess:()=>{g.loading.hide(),g.notify({message:"Update Successful",closeBtn:!0,icon:"check",iconColor:"blue"})},onError:l=>{g.loading.hide(),g.notify({message:"Error Occured! Try Again",closeBtn:!0,icon:"warning",iconColor:"red"})}})};return(t,l)=>(V(),y("div",oe,[s("div",le,[ae,s("div",se,[s("form",{onSubmit:R(E,["prevent"]),method:"POST"},[s("div",ie,[s("div",ne,[r(d,{name:"full_name",outlined:"",color:"green",modelValue:o(e).full_name,"onUpdate:modelValue":l[0]||(l[0]=a=>o(e).full_name=a),error:!!o(e).errors.full_name,"error-message":o(e).errors.full_name,dense:"",label:"Full Name *"},null,8,["modelValue","error","error-message"])]),s("div",te,[r(d,{clearable:"",modelValue:o(e).dob,"onUpdate:modelValue":l[2]||(l[2]=a=>o(e).dob=a),dense:"",readonly:"",rules:["date"],label:"Date of Birth *",outlined:"",color:"green",error:!!o(e).errors.dob,"error-message":o(e).errors.dob},{append:i(()=>[r(J,{name:"event",class:"cursor-pointer"},{default:i(()=>[r(Z,{cover:"","transition-show":"scale","transition-hide":"scale"},{default:i(()=>[r(ee,{mask:"DD-MM-YYYY",modelValue:o(e).dob,"onUpdate:modelValue":l[1]||(l[1]=a=>o(e).dob=a),minimal:"","default-year-month":"1990/01"},{default:i(()=>[s("div",de,[K(r(x,{label:"Close",color:"primary",flat:""},null,512),[[X]])])]),_:1},8,["modelValue"])]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message"])])]),s("div",ue,[s("div",ce,[r(f,{modelValue:o(e).caste_id,"onUpdate:modelValue":l[3]||(l[3]=a=>o(e).caste_id=a),error:!!o(e).errors.caste_id,"error-message":o(e).errors.caste_id,options:p.caste,dense:"","emit-value":"","fill-input":"","hide-selected":"","map-options":"","option-label":"caste","option-value":"id",placeholder:"Select Caste *",outlined:"",color:"green","use-input":""},{"no-option":i(()=>[r(m,null,{default:i(()=>[r(_,{class:"text-gresy"},{default:i(()=>[u(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),s("div",me,[r(f,{modelValue:o(e).gender_id,"onUpdate:modelValue":l[4]||(l[4]=a=>o(e).gender_id=a),error:!!o(e).errors.gender_id,"error-message":o(e).errors.gender_id,options:p.gender,dense:"","emit-value":"","fill-input":"","hide-selected":"","map-options":"","option-label":"gender_name","option-value":"id",placeholder:"Select Gender *",outlined:"",color:"green","use-input":""},{"no-option":i(()=>[r(m,null,{default:i(()=>[r(_,{class:"text-gresy"},{default:i(()=>[u(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])])]),s("div",_e,[s("div",fe,[r(f,{modelValue:o(e).relationship,"onUpdate:modelValue":l[5]||(l[5]=a=>o(e).relationship=a),error:!!o(e).errors.relationship,"error-message":o(e).errors.relationship,options:B,dense:"","emit-value":"","fill-input":"","hide-selected":"","map-options":"","option-label":"label","option-value":"value",placeholder:"Select Relationship *",outlined:"",color:"green","use-input":""},{"no-option":i(()=>[r(m,null,{default:i(()=>[r(_,{class:"text-gresy"},{default:i(()=>[u(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message"])]),s("div",pe,[r(d,{name:"fathers_name",outlined:"",color:"green",modelValue:o(e).relationship_name,"onUpdate:modelValue":l[6]||(l[6]=a=>o(e).relationship_name=a),error:!!o(e).errors.relationship_name,"error-message":o(e).errors.relationship_name,dense:"",label:"Father/Wife/Husband's Name *"},null,8,["modelValue","error","error-message"])])]),s("div",ge,[s("div",ve,[r(d,{name:"aadhaar_card",outlined:"",color:"green",modelValue:o(e).aadhaar_no,"onUpdate:modelValue":l[7]||(l[7]=a=>o(e).aadhaar_no=a),error:!!o(e).errors.aadhaar_no,"error-message":o(e).errors.aadhaar_no,dense:"",label:"Aadhaar Card *"},null,8,["modelValue","error","error-message"])]),s("div",be,[r(f,{modelValue:o(e).aadhaar_verify_type,"onUpdate:modelValue":l[8]||(l[8]=a=>o(e).aadhaar_verify_type=a),error:!!o(e).errors.aadhaar_verify_type,"error-message":o(e).errors.aadhaar_verify_type,options:C,dense:"","emit-value":"","fill-input":"","hide-selected":"","map-options":"","option-label":"label","option-value":"value",placeholder:"Aadhaar Verification Type *",outlined:"",color:"green","use-input":""},{"no-option":i(()=>[r(m,null,{default:i(()=>[r(_,{class:"text-gresy"},{default:i(()=>[u(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message"])])]),s("div",he,[s("div",Ve,[r(d,{name:"phone_number",outlined:"",color:"green",modelValue:o(e).phone_no,"onUpdate:modelValue":l[9]||(l[9]=a=>o(e).phone_no=a),error:!!o(e).errors.phone_no,"error-message":o(e).errors.phone_no,dense:"",label:"Phone Number *"},null,8,["modelValue","error","error-message"])]),s("div",ye,[r(d,{name:"phone_number",outlined:"",color:"green",modelValue:o(e).voter_no,"onUpdate:modelValue":l[10]||(l[10]=a=>o(e).voter_no=a),error:!!o(e).errors.voter_no,"error-message":o(e).errors.voter_no,dense:"",label:"Voter ID *"},null,8,["modelValue","error","error-message"])])]),s("div",xe,[s("div",ke,[r(f,{modelValue:o(e).farmer_category_id,"onUpdate:modelValue":l[11]||(l[11]=a=>o(e).farmer_category_id=a),error:!!o(e).errors.farmer_category_id,"error-message":o(e).errors.farmer_category_id,options:p.category,dense:"","emit-value":"","fill-input":"","hide-selected":"","map-options":"","option-label":"f_category_name","option-value":"id",placeholder:"Farmer Category *",outlined:"",color:"green","use-input":""},{"no-option":i(()=>[r(m,null,{default:i(()=>[r(_,{class:"text-gresy"},{default:i(()=>[u(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),s("div",Ie,[r(d,{name:"education_qualification",outlined:"",color:"green",modelValue:o(e).education_qualification,"onUpdate:modelValue":l[12]||(l[12]=a=>o(e).education_qualification=a),error:!!o(e).errors.education_qualification,"error-message":o(e).errors.education_qualification,dense:"",label:"Highest Qualification *"},null,8,["modelValue","error","error-message"])])]),s("div",we,[s("div",Ne,[u(" Is Farming the main source of income? "),r($,{name:"is_farming_main_income",modelValue:o(e).is_farming_main_income,"onUpdate:modelValue":l[13]||(l[13]=a=>o(e).is_farming_main_income=a),options:j,color:"primary",inline:""},null,8,["modelValue"])]),q.value==="No"?(V(),y("div",Ue,[r(d,{name:"occupation",outlined:"",color:"green",modelValue:o(e).other_income,"onUpdate:modelValue":l[14]||(l[14]=a=>o(e).other_income=a),error:!!o(e).errors.other_income,"error-message":o(e).errors.other_income,dense:"",label:'If "No" other source of income'},null,8,["modelValue","error","error-message"])])):(V(),y("div",Se))]),De,s("div",Be,[s("div",je,[r(f,{modelValue:o(e).district_id,"onUpdate:modelValue":[l[15]||(l[15]=a=>o(e).district_id=a),Q,F],error:!!o(e).errors.district_id,"error-message":o(e).errors.district_id,options:p.districts,dense:"","emit-value":"","fill-input":"","hide-selected":"","map-options":"","option-label":"district_name","option-value":"id",placeholder:"Select District *",outlined:"",color:"green","use-input":""},{"no-option":i(()=>[r(m,null,{default:i(()=>[r(_,{class:"text-gresy"},{default:i(()=>[u(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"])]),s("div",Ce,[r(f,{modelValue:o(e).sub_division_id,"onUpdate:modelValue":l[16]||(l[16]=a=>o(e).sub_division_id=a),error:!!o(e).errors.sub_division_id,"error-message":o(e).errors.sub_division_id,options:I.value,dense:"","emit-value":"",disable:v.value,"fill-input":"","hide-selected":"","map-options":"","option-label":"sub_division_name","option-value":"id",placeholder:"Select Sub Division *",outlined:"",color:"green","use-input":""},{"no-option":i(()=>[r(m,null,{default:i(()=>[r(_,{class:"text-gresy"},{default:i(()=>[u(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options","disable"])])]),s("div",qe,[s("div",Qe,[r(f,{modelValue:o(e).block_id,"onUpdate:modelValue":[l[17]||(l[17]=a=>o(e).block_id=a),L],error:!!o(e).errors.block_id,"error-message":o(e).errors.block_id,options:w.value,dense:"","emit-value":"","fill-input":"","hide-selected":"","map-options":"","option-label":"block_name","option-value":"id","model-value":S.value,onInputValue:Y,disable:b.value,placeholder:"Select RD Block *",outlined:"",color:"green","use-input":""},{"no-option":i(()=>[r(m,null,{default:i(()=>[r(_,{class:"text-gresy"},{default:i(()=>[u(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options","model-value","disable"])]),s("div",Fe,[r(f,{modelValue:o(e).village_id,"onUpdate:modelValue":[l[18]||(l[18]=a=>o(e).village_id=a),A],error:!!o(e).errors.village_id,"error-message":o(e).errors.village_id,options:h.value,dense:"","emit-value":"","fill-input":"","hide-selected":"","map-options":"","option-label":"village_name","option-value":"id",onFilter:P,onInputValue:O,"model-value":U.value,disable:k.value,placeholder:"Select or Search Village *",outlined:"",color:"green","use-input":""},{"no-option":i(()=>[r(m,null,{default:i(()=>[r(_,{class:"text-gresy"},{default:i(()=>[u(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options","model-value","disable"])])]),s("div",Le,[Pe,s("div",Oe,[u(" Village LGD: "),s("div",Ye,z(o(e).village_lgd_code),1)])]),Ae,s("div",Ee,[s("div",Ge,[r(d,{name:"bank_name",outlined:"",color:"green",modelValue:o(e).bank_name,"onUpdate:modelValue":l[19]||(l[19]=a=>o(e).bank_name=a),error:!!o(e).errors.bank_name,"error-message":o(e).errors.bank_name,dense:"",label:"Bank Name *"},null,8,["modelValue","error","error-message"])]),s("div",Me,[r(d,{name:"account_number",outlined:"",color:"green",modelValue:o(e).account_number,"onUpdate:modelValue":l[20]||(l[20]=a=>o(e).account_number=a),error:!!o(e).errors.account_number,"error-message":o(e).errors.account_number,dense:"",label:"Account Number *"},null,8,["modelValue","error","error-message"])])]),s("div",Te,[s("div",He,[r(d,{name:"branch_name",outlined:"",color:"green",modelValue:o(e).branch_name,"onUpdate:modelValue":l[21]||(l[21]=a=>o(e).branch_name=a),error:!!o(e).errors.branch_name,"error-message":o(e).errors.branch_name,dense:"",label:"Branch Name *"},null,8,["modelValue","error","error-message"])]),s("div",We,[r(d,{name:"ifsc_code",outlined:"",color:"green",modelValue:o(e).ifsc_code,"onUpdate:modelValue":l[22]||(l[22]=a=>o(e).ifsc_code=a),error:!!o(e).errors.ifsc_code,"error-message":o(e).errors.ifsc_code,dense:"",label:"IFSC Code *"},null,8,["modelValue","error","error-message"])])]),s("div",Re,[r(x,{label:"Back",outline:"",dense:"",rounded:"",style:{color:"#2e6525",padding:"5px 40px 5px"},onClick:l[23]||(l[23]=a=>t.$inertia.get(t.route("manage-farmer")))}),$e,r(x,{flat:"",rounded:"",label:"Update",type:"submit",style:{padding:"5px 30px 5px","background-color":"#2e6525",color:"white"}})])],40,re)])])]))}};export{Ze as default};
