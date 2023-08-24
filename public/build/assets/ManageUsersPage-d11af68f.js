import{u as T,k as h,T as j,r as a,a as R,o as $,b as Q,d as m,e as s,w as t,g as o,j as z,f as G,i as w,O as H}from"./app-4496f01d.js";const I={class:"row justify-center"},J={class:"col-md-9 col-xl-7"},K=m("span",{class:"text-weight-bold"}," User",-1),W=["onSubmit"],X={class:"q-pa-sm"},Y={class:"q-gutter-x-md column"},ee={__name:"ManageUsersPage",props:{users:[],districts:[],roles:[]},setup(k){const u=k,n=T(),f=u.users,V=u.districts,S=u.roles,p=h(!1),d=h(!1),y=[{name:"user_name",align:"left",label:"User Name",field:"name"},{name:"email",align:"left",label:"Email",field:"email"},{name:"role_name",align:"left",label:"Role Name",field:r=>r.roles.name},{name:"district_name",align:"left",label:"District Name",field:r=>r.district.district_name},{name:"actions",align:"right",label:"Actions",field:"id"}],e=j({id:0,name:"",email:"",password:"",roles_id:0,district_id:0}),U=()=>{e.reset(),d.value=!0,p.value=!1},C=r=>{p.value=!0,d.value=!0,e.id=r.id,e.livestock_name=r.livestock_name},x=()=>{p.value===!1?e.post(route("manage-user.store"),{onStart:()=>n.loading.show(),onSuccess:()=>{e.reset(),f.value=u.users,n.notify({message:"User created",icon:"check",iconColor:"blue",closeBtn:!0})},onError:r=>{console.log(r),n.notify({message:r.message,icon:"warning",iconColor:"red",closeBtn:!0})},onFinish:()=>n.loading.hide(),preserveState:!1}):e.put(route("livestock.update",e.id),{onStart:()=>n.loading.show(),onSuccess:()=>{d.value=!1,n.notify({message:"Livestock updated",closeBtn:!0,icon:"check",iconColor:"blue"}),n.loading.hide()},onFinish:()=>n.loading.hide(),preserveState:!1})},N=r=>{n.dialog({title:"Confirm Delete",message:"Are you sure?",cancel:"No"}).onOk(()=>{H.delete(route("manage-user.destroy",r),{onStart:()=>n.loading.show({message:"Deleting...."}),onSuccess:()=>{n.notify({icon:"check",message:"User deleted",closeBtn:!0}),n.loading.hide()},onFinish:()=>n.loading.hide(),preserveState:!1})})};return(r,i)=>{const c=a("q-btn"),B=a("q-td"),D=a("q-table"),E=a("q-toolbar-title"),L=a("q-toolbar"),_=a("q-input"),g=a("q-icon"),b=a("q-item-section"),v=a("q-item"),q=a("q-select"),A=a("q-card-section"),M=a("q-card"),O=a("q-dialog"),P=R("close-popup");return $(),Q("div",I,[m("div",J,[s(D,{flat:"",bordered:"",title:"User Controls",rows:o(f),columns:y,"row-key":"name",pagination:r.initialPagination},{"top-right":t(()=>[s(c,{outline:"",rounded:"",label:"Add User",dense:"",flat:"",class:"text-white q-px-lg q-mx-lg",style:{"background-color":"#2e6525"},onClick:U})]),"body-cell-actions":t(l=>[s(B,{props:l},{default:t(()=>[s(c,{dense:"",round:"",flat:"",onClick:F=>C(l.row),icon:"edit",style:{color:"#2e6525"}},null,8,["onClick"]),s(c,{dense:"",round:"",flat:"",color:"red",onClick:F=>N(l.row.id),icon:"delete"},null,8,["onClick"])]),_:2},1032,["props"])]),_:1},8,["rows","pagination"]),s(O,{modelValue:d.value,"onUpdate:modelValue":i[5]||(i[5]=l=>d.value=l)},{default:t(()=>[s(M,null,{default:t(()=>[s(L,null,{default:t(()=>[s(E,null,{default:t(()=>[K]),_:1}),z(s(c,{flat:"",round:"",dense:"",icon:"close"},null,512),[[P]])]),_:1}),s(A,null,{default:t(()=>[m("form",{onSubmit:G(x,["prevent"]),method:"POST"},[m("div",X,[m("div",Y,[s(_,{name:"name",standout:"",modelValue:o(e).name,"onUpdate:modelValue":i[0]||(i[0]=l=>o(e).name=l),error:!!o(e).errors.name,"error-message":o(e).errors.name,dense:"",placeholder:"Name *"},null,8,["modelValue","error","error-message"]),s(_,{name:"email",standout:"",modelValue:o(e).email,"onUpdate:modelValue":i[1]||(i[1]=l=>o(e).email=l),error:!!o(e).errors.email,"error-message":o(e).errors.email,dense:"",placeholder:"Email *"},null,8,["modelValue","error","error-message"]),s(_,{name:"password",standout:"",modelValue:o(e).password,"onUpdate:modelValue":i[2]||(i[2]=l=>o(e).password=l),error:!!o(e).errors.password,"error-message":o(e).errors.password,dense:"",placeholder:"Password *"},null,8,["modelValue","error","error-message"]),s(q,{modelValue:o(e).district_id,"onUpdate:modelValue":i[3]||(i[3]=l=>o(e).district_id=l),error:!!o(e).errors.district_id,"error-message":o(e).errors.district_id,options:o(V),dense:"","emit-value":"","fill-input":"",filled:"","hide-selected":"","map-options":"","option-label":"district_name","option-value":"id",placeholder:"Select District *",standout:"","use-input":""},{prepend:t(()=>[s(g,{name:"book"})]),"no-option":t(()=>[s(v,null,{default:t(()=>[s(b,{class:"text-gresy"},{default:t(()=>[w(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"]),s(q,{modelValue:o(e).roles_id,"onUpdate:modelValue":i[4]||(i[4]=l=>o(e).roles_id=l),error:!!o(e).errors.roles_id,"error-message":o(e).errors.roles_id,options:o(S),dense:"","emit-value":"","fill-input":"",filled:"","hide-selected":"","map-options":"","option-label":"name","option-value":"id",placeholder:"Select Role *",standout:"","use-input":""},{prepend:t(()=>[s(g,{name:"book"})]),"no-option":t(()=>[s(v,null,{default:t(()=>[s(b,{class:"text-gresy"},{default:t(()=>[w(" No results ")]),_:1})]),_:1})]),_:1},8,["modelValue","error","error-message","options"]),s(c,{label:"Submit",dense:"",color:"black",type:"submit",disable:o(e).processing},null,8,["disable"])])])],40,W)]),_:1})]),_:1})]),_:1},8,["modelValue"])])])}}};export{ee as default};
