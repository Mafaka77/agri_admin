import{u as P,n as x,T as D,o as b,a as g,b as r,d as e,g as o,q as _,l as n,z as j,s as u,t as c,Q as f,B,D as O,m as A,w as M,f as v,e as a,i as Q,j as C,k as S,C as I}from"./app-b764e775.js";import{Q as q,a as h}from"./QTable-d8fc04f2.js";import{Q as y}from"./QBadge-c707a172.js";import{Q as E}from"./QSelect-248de9c9.js";import"./QChip-93923360.js";const R={class:"row justify-center"},$={class:"col-xs-12 col-md-9 col-xl-7"},W={class:"column"},z={class:"q-col-gutter-lg"},H={class:"row justify-between q-col-gutter-sm"},G={class:"col-xs-12 col-md-4"},J={class:"col-xs-12 col-md-4"},K={class:"col-xs-12 col-md-4"},X={class:"col-xs-12 col-md-4"},Y={class:"col-xs-12 col-md-4"},Z={class:"q-col-gutter-y-md"},ee=r("div",null,"Pending for Approval",-1),le={style:{color:"#2e6525"}},oe={key:0},te={key:1},se={class:"q-col-gutter-y-md"},ae={style:{color:"#2e6525"}},re={class:"column"},ie={key:0},de={key:1},ne=r("span",{class:"text-weight-bold"}," User",-1),ue=["onSubmit"],ce={class:"q-pa-sm"},me={class:"q-gutter-x-md column"},ve={__name:"SupervisorHomePage",props:{pendingCounts:Object,totalFarmersDistrictWise:Object,totalFarmers:Object,district:Object,pendingList:[],enumeratorList:[],roleList:[]},setup(d){const w=d,m=P(),p=x(!1),k=x(!1),T=[{name:"farmer_id",required:!0,label:"Farmer ID",align:"left",field:s=>s.farmer_id,sortable:!0},{name:"full_name",align:"center",label:"Farmer Name",field:"full_name",sortable:!0},{name:"verification",align:"center",label:"Verification",field:s=>s.verification,sortable:!0},{name:"enumerator",align:"center",label:"Enumerator",field:s=>s.user.name,sortable:!0},{name:"actions",align:"right",field:"id"}],F=[{name:"enumerator",required:!0,label:"Enumerator",align:"left",field:s=>s.name,sortable:!0},{name:"mobile",align:"center",label:"Mobile",field:"mobile",sortable:!0},{name:"email",align:"center",label:"Email",field:s=>s.email,sortable:!0},{name:"actions",align:"right",field:"id"}],l=D({id:0,name:"",email:"",mobile:"",password:"",district_id:0,roles_id:0}),L=()=>{p.value=!0,k.value=!1,l.district_id=w.district[0].id,l.roles_id=w.roleList[0].id},U=()=>{l.post(route("create-enumerator"),{onStart:()=>m.loading.show(),onSuccess:()=>{m.loading.hide(),m.notify({message:"User created"})},onError:s=>{m.loading.hide();const i=s.message;m.notify({message:i})},onFinish:()=>m.loading.hide()})},N=s=>{p.value=!0,k.value=!0,l.id=s.id,l.name=s.name,l.email=s.email,l.mobile=s.mobile,l.password=s.password,l.roles_id=s.roles_id,l.district_id=s.district_id};return(s,i)=>(b(),g("div",R,[r("div",$,[r("div",W,[r("div",z,[r("div",H,[r("div",G,[e(_,{flat:"",bordered:""},{default:o(()=>[e(u,{class:"text-h4 text-bold",style:{color:"#cd9f27"}},{default:o(()=>[n(c(d.pendingCounts),1)]),_:1}),e(u,{class:"text-h7"},{default:o(()=>[n("Pending for Approval")]),_:1})]),_:1})]),r("div",J,[r("div",K,[e(_,{flat:"",bordered:""},{default:o(()=>[e(u,{class:"text-h4 text-bold",style:{color:"#cd9f27"}},{default:o(()=>[n(c(d.totalFarmersDistrictWise),1)]),_:1}),e(u,{class:"text-h7"},{default:o(()=>[n("Total Farmers in "+c(d.district.district_name),1)]),_:1})]),_:1})])]),r("div",X,[r("div",Y,[e(_,{flat:"",bordered:""},{default:o(()=>[e(u,{class:"text-h4 text-bold",style:{color:"#424242"}},{default:o(()=>[n(c(d.totalFarmers),1)]),_:1}),e(u,{class:"text-h7"},{default:o(()=>[n("Total Farmers Registered")]),_:1})]),_:1})])])])])]),r("div",Z,[e(q,{"table-header-style":{backgroundColor:"#302e2a"},"table-header-class":"text-white",flat:"",bordered:"",title:"Farmers",rows:d.pendingList,columns:T,"row-key":"status",pagination:s.initialPagination},{"top-left":o(()=>[ee]),"top-right":o(()=>[r("div",le,c(d.district[0].district_name),1)]),"body-cell-actions":o(t=>[e(h,{props:t},{default:o(()=>[e(f,{dense:"",round:"",flat:"",onClick:V=>s.$inertia.get(s.route("supervisor-approval-index",t.row.id)),label:"OPEN",style:{color:"#2e6525"}},null,8,["onClick"])]),_:2},1032,["props"])]),"body-cell-verification":o(t=>[e(h,{props:t},{default:o(()=>[t.value==="Submitted"?(b(),g("div",oe,[e(y,{class:"q-pa-sm",style:{"background-color":"#cd9f27"},label:t.value},null,8,["label"])])):(b(),g("div",te,[e(y,{class:"q-pa-sm",style:{"background-color":"#2e6525"},label:t.value},null,8,["label"])]))]),_:2},1032,["props"])]),_:1},8,["rows","pagination"])]),n(" ENUMERATOR TABLE "),r("div",se,[e(q,{"table-header-style":{backgroundColor:"#302e2a"},"table-header-class":"text-white",flat:"",bordered:"",title:"Farmers",rows:d.enumeratorList,columns:F,"row-key":"status",pagination:s.initialPagination},{"top-left":o(()=>[r("div",null,"Enumerators("+c(d.enumeratorList.length)+")",1),r("div",ae,"("+c(d.district[0].district_name)+")",1)]),"top-right":o(()=>[r("div",re,[e(f,{label:"Add Enumerator",flat:"",color:"white",style:{"background-color":"green"},onClick:L})])]),"body-cell-actions":o(t=>[e(h,{props:t},{default:o(()=>[e(f,{dense:"",round:"",flat:"",onClick:V=>N(t.row),icon:"edit",style:{color:"#2e6525"}},null,8,["onClick"]),e(f,{dense:"",round:"",flat:"",color:"red",onClick:V=>s.deleteLivestock(t.row.id),icon:"delete"},null,8,["onClick"])]),_:2},1032,["props"])]),"body-cell-verification":o(t=>[e(h,{props:t},{default:o(()=>[t.value==="Submitted"?(b(),g("div",ie,[e(y,{class:"q-pa-sm",style:{"background-color":"#cd9f27"},label:t.value},null,8,["label"])])):(b(),g("div",de,[e(y,{class:"q-pa-sm",style:{"background-color":"#2e6525"},label:t.value},null,8,["label"])]))]),_:2},1032,["props"])]),_:1},8,["rows","pagination"]),e(j,{modelValue:p.value,"onUpdate:modelValue":i[6]||(i[6]=t=>p.value=t)},{default:o(()=>[e(_,null,{default:o(()=>[e(B,null,{default:o(()=>[e(O,null,{default:o(()=>[ne]),_:1}),A(e(f,{flat:"",round:"",dense:"",icon:"close"},null,512),[[I]])]),_:1}),e(u,null,{default:o(()=>[r("form",{onSubmit:M(U,["prevent"]),method:"POST"},[r("div",ce,[r("div",me,[e(v,{name:"name",standout:"",modelValue:a(l).name,"onUpdate:modelValue":i[0]||(i[0]=t=>a(l).name=t),error:!!a(l).errors.name,"error-message":a(l).errors.name,dense:"",placeholder:"Name *"},null,8,["modelValue","error","error-message"]),e(v,{name:"email",standout:"",modelValue:a(l).email,"onUpdate:modelValue":i[1]||(i[1]=t=>a(l).email=t),error:!!a(l).errors.email,"error-message":a(l).errors.email,dense:"",placeholder:"Email *"},null,8,["modelValue","error","error-message"]),e(v,{name:"mobile",standout:"",modelValue:a(l).mobile,"onUpdate:modelValue":i[2]||(i[2]=t=>a(l).mobile=t),error:!!a(l).errors.mobile,"error-message":a(l).errors.mobile,dense:"",placeholder:"Mobile"},null,8,["modelValue","error","error-message"]),e(v,{name:"password",standout:"",modelValue:a(l).password,"onUpdate:modelValue":i[3]||(i[3]=t=>a(l).password=t),error:!!a(l).errors.password,"error-message":a(l).errors.password,dense:"",placeholder:"Password *"},null,8,["modelValue","error","error-message"]),e(E,{modelValue:a(l).district_id,"onUpdate:modelValue":i[4]||(i[4]=t=>a(l).district_id=t),error:!!a(l).errors.district_id,disable:"","error-message":a(l).errors.district_id,options:d.district,dense:"","emit-value":"","fill-input":"",filled:"","hide-selected":"","map-options":"","option-label":"district_name","option-value":"id",placeholder:"Select District *",standout:"","use-input":""},{prepend:o(()=>[e(Q,{name:"book"})]),"no-option":o(()=>[e(C,null,{default:o(()=>[e(S,{class:"text-gresy"},{default:o(()=>[n(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"]),e(E,{modelValue:a(l).roles_id,"onUpdate:modelValue":i[5]||(i[5]=t=>a(l).roles_id=t),error:!!a(l).errors.roles_id,disable:"","error-message":a(l).errors.roles_id,options:d.roleList,dense:"","emit-value":"","fill-input":"",filled:"","hide-selected":"","map-options":"","option-label":"name","option-value":"id",placeholder:"Select Role *",standout:"","use-input":""},{prepend:o(()=>[e(Q,{name:"book"})]),"no-option":o(()=>[e(C,null,{default:o(()=>[e(S,{class:"text-gresy"},{default:o(()=>[n(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"]),e(f,{label:"Submit",dense:"",color:"black",type:"submit",disable:a(l).processing},null,8,["disable"])])])],40,ue)]),_:1})]),_:1})]),_:1},8,["modelValue"])])])]))}};export{ve as default};