import{Z as u,i as x,r as i,o,f as n,a as s,b as e,w as r,F as b,l as g,g as d,d as m,t as h,c as _}from"./app-C-GaPJtV.js";import{I as k}from"./Icon-Du1o5-gs.js";import{P as w,t as y,p as v,m as L}from"./Pagination-D1N7dXk8.js";import{L as B}from"./Layout-ay5aFoPW.js";import{_ as N}from"./_plugin-vue_export-helper-DlAUqK2U.js";/* empty css            */import"./Logo-jAQlM2iT.js";import"./Dropdown-BuZhKcDs.js";import"./popper-BQBsAJpH.js";import"./FlashMessages-CtTDOf6h.js";const V={components:{Head:u,Icon:k,Link:x,Pagination:w},layout:B,props:{memories:Object},data(){return{form:{}}},watch:{form:{deep:!0,handler:y(function(){this.$inertia.get("/memories",v(this.form),{preserveState:!0})},150)}},methods:{reset(){this.form=L(this.form,()=>null)}}},$=e("h1",{class:"mb-8 text-3xl font-bold"},"Memories",-1),C={class:"flex items-center justify-between mb-6"},H=e("span",null,"Create",-1),I=e("span",{class:"hidden md:inline"}," Memory",-1),M={class:"bg-white rounded-md shadow overflow-x-auto"},S={class:"w-full whitespace-nowrap"},j=e("thead",null,[e("tr",{class:"text-left font-bold"},[e("th",{class:"pb-4 pt-6 px-6"},"Type"),e("th",{class:"pb-4 pt-6 px-6"},"Size")])],-1),z={class:"border-t"},F={class:"border-t"},P={class:"w-px border-t"},T={key:0},D=e("td",{class:"px-6 py-4 border-t",colspan:"4"},"No memories found.",-1),E=[D];function O(Z,q,l,A,G,J){const p=i("Head"),a=i("Link"),c=i("icon"),f=i("pagination");return o(),n("div",null,[s(p,{title:"Memories"}),$,e("div",C,[s(a,{class:"btn-indigo",href:"/memories/create"},{default:r(()=>[H,I]),_:1})]),e("div",M,[e("table",S,[j,e("tbody",null,[(o(!0),n(b,null,g(l.memories.data,t=>(o(),n("tr",{key:t.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[e("td",z,[s(a,{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/memories/${t.id}/edit`},{default:r(()=>[m(h(t.type)+" ",1),t.deleted_at?(o(),_(c,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):d("",!0)]),_:2},1032,["href"])]),e("td",F,[s(a,{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/memories/${t.id}/edit`},{default:r(()=>[m(h(t.size)+" ",1),t.deleted_at?(o(),_(c,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):d("",!0)]),_:2},1032,["href"])]),e("td",P,[s(a,{class:"flex items-center px-4",href:`/memories/${t.id}/edit`,tabindex:"-1"},{default:r(()=>[s(c,{name:"cheveron-right",class:"block w-6 h-6 fill-gray-400"})]),_:2},1032,["href"])])]))),128)),l.memories.data.length===0?(o(),n("tr",T,E)):d("",!0)])])]),s(f,{class:"mt-6",links:l.memories.links},null,8,["links"])])}const oe=N(V,[["render",O]]);export{oe as default};