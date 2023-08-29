import{u as Q,A as q,n as p,o as s,a as n,b as o,d as r,w as l,l as b,O as v,Q as F,s as x,f as m,v as P,i as V,g as N,e as T}from"./app-34262ca5.js";import{Q as A,a as _}from"./QTable-5368c94e.js";import{Q as c}from"./QBadge-d2f9760b.js";import"./QSelect-7255cc28.js";import"./QChip-022a315d.js";const B={class:"row justify-center"},C={class:"col-xs-12 col-md-9 col-xl-7",style:{"background-color":"white"}},S={class:"q-col-gutter-y-md"},E={class:"column q-gutter-md"},O=o("div",{class:"row"},"Farmer List for   ",-1),$=o("div",{style:{color:"#2e6525"}},null,-1),D={key:0},I={key:1},j={key:2},K={key:3},H={__name:"AdminManageFarmerPage",props:{farmers:[],district:Object},setup(h){const i=h,d=Q(),u=q(),f=p({page:i.farmers.current_page,rowsPerPage:i.farmers.per_page,rowsNumber:i.farmers.total}),y=p(i.farmers.data),w=[{name:"farmer_id",required:!0,label:"Farmer ID",align:"left",field:a=>a.farmer_id,sortable:!0},{name:"full_name",align:"center",label:"Farmer Name",field:"full_name",sortable:!0},{name:"verification",align:"center",label:"Verification",field:a=>a.verification,sortable:!0},{name:"enumerator",align:"center",label:"Enumerator",field:a=>a.user.name,sortable:!0},{name:"actions",align:"right",field:"id"}];function k(a){const{page:t,rowsPerPage:e}=a.pagination;v.get(route("manage-farmer"),{per_page:e,page:t},{})}const g=a=>{v.get(route("manage-farmer"),{search:a,per_page:10,page:1},{onStart:()=>d.loading.show(),onSuccess:()=>d.loading.hide(),onFinish:()=>d.loading.hide(),onError:()=>d.loading.hide()})};return(a,t)=>(s(),n("div",B,[o("div",C,[o("div",S,[r(A,{"table-header-style":{backgroundColor:"#302e2a"},"table-header-class":"text-white",flat:"",bordered:"",title:"Farmers",rows:y.value,columns:w,onRequest:k,"rows-per-page-options":[2,5,7,15,30,50],pagination:f.value,"onUpdate:pagination":t[3]||(t[3]=e=>f.value=e)},{"top-left":l(()=>[o("div",E,[O,b("̵ "),o("div",null,[r(F,{outlined̵̵:"",debounce:"300",dense:"",label:"Search",onKeyup:t[0]||(t[0]=x(T(e=>g(m(u).searchFarmerText),["prevent"]),["enter"])),modelValue:m(u).searchFarmerText,"onUpdate:modelValue":t[1]||(t[1]=e=>m(u).searchFarmerText=e),clearable:"",onClear:t[2]||(t[2]=e=>g(""))},{append:l(()=>[r(P,null,{default:l(()=>[r(V,{name:"search"})]),_:1})]),_:1},8,["modelValue"])])])]),"top-right":l(()=>[$]),"body-cell-actions":l(e=>[r(_,{props:e},{default:l(()=>[r(N,{dense:"",round:"",flat:"",onClick:L=>a.$inertia.get(a.route("admin-view-farmer-details",e.row.id)),label:"OPEN",style:{color:"#2e6525"}},null,8,["onClick"])]),_:2},1032,["props"])]),"body-cell-verification":l(e=>[r(_,{props:e},{default:l(()=>[e.value==="Submitted"?(s(),n("div",D,[r(c,{class:"q-pa-sm",style:{"background-color":"#f8f2e1",color:"#cd9f27"},label:e.value},null,8,["label"])])):e.value==="Pending"?(s(),n("div",I,[r(c,{class:"q-pa-sm",style:{"background-color":"darkgrey"},label:e.value},null,8,["label"])])):e.value==="Approved"?(s(),n("div",j,[r(c,{class:"q-pa-sm",style:{"background-color":"#59964f"},label:e.value},null,8,["label"])])):(s(),n("div",K,[r(c,{class:"q-pa-sm",style:{"background-color":"#ffe8e8",color:"red"},label:e.value},null,8,["label"])]))]),_:2},1032,["props"])]),_:1},8,["rows","pagination"])])]),b(" ̵")]))}};export{H as default};
