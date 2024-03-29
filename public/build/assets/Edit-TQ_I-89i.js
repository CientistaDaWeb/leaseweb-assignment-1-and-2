import{Z as v,i as w,r as n,o as s,f as i,a as l,b as r,w as a,d as u,t as p,c as V,g as f,e as k,F as y,l as _}from"./app-DgPWu283.js";import{I as z}from"./Icon-Dakr8WTa.js";import{L}from"./Layout-Bf2ZegyR.js";import{L as S,T}from"./LoadingButton-BXgd0Mr5.js";import{T as B}from"./TrashedMessage-gFuMMqRw.js";import{S as M}from"./SelectInput-Bm3Av8bM.js";import{_ as A}from"./_plugin-vue_export-helper-DlAUqK2U.js";/* empty css            */import"./Logo-HB5MViY6.js";import"./Dropdown-e0af9Wzh.js";import"./popper-BQBsAJpH.js";import"./FlashMessages-QiDrnY8u.js";import"./v4-D8aEg3BZ.js";const C={components:{SelectInput:M,Head:v,Icon:z,Link:w,LoadingButton:S,TextInput:T,TrashedMessage:B},layout:L,props:{memory:Object,sizes:Array,types:Array},remember:"form",data(){return{form:this.$inertia.form({type:this.memory.type,size:this.memory.size})}},methods:{update(){this.form.put(`/memories/${this.memory.id}`)},destroy(){confirm("Are you sure you want to delete this memory?")&&this.$inertia.delete(`/memories/${this.memory.id}`)},restore(){confirm("Are you sure you want to restore this memory?")&&this.$inertia.put(`/memories/${this.memory.id}/restore`)}}},I={class:"mb-8 text-3xl font-bold"},N=r("span",{class:"text-indigo-400 font-medium"},"/",-1),H={class:"max-w-3xl bg-white rounded-md shadow overflow-hidden"},O={class:"flex flex-wrap -mb-8 -mr-6 p-8"},U=r("option",{value:null},"Please Select One",-1),D=["value"],E=r("option",{value:null,selected:""},"Please Select One",-1),F=["value"],P={class:"flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100"};function R(j,o,d,Z,t,m){const h=n("Head"),b=n("Link"),g=n("trashed-message"),c=n("select-input"),x=n("loading-button");return s(),i("div",null,[l(h,{title:t.form.size},null,8,["title"]),r("h1",I,[l(b,{class:"text-indigo-400 hover:text-indigo-600",href:"/memories"},{default:a(()=>[u("Memories")]),_:1}),N,u(" "+p(t.form.name),1)]),d.memory.deleted_at?(s(),V(g,{key:0,class:"mb-6",onRestore:m.restore},{default:a(()=>[u(" This memory has been deleted. ")]),_:1},8,["onRestore"])):f("",!0),r("div",H,[r("form",{onSubmit:o[3]||(o[3]=k((...e)=>m.update&&m.update(...e),["prevent"]))},[r("div",O,[l(c,{modelValue:t.form.type,"onUpdate:modelValue":o[0]||(o[0]=e=>t.form.type=e),error:t.form.errors.type,class:"pb-8 pr-6 w-full lg:w-1/2",label:"Type"},{default:a(()=>[U,(s(!0),i(y,null,_(d.types,e=>(s(),i("option",{value:e},p(e),9,D))),256))]),_:1},8,["modelValue","error"]),l(c,{modelValue:t.form.size,"onUpdate:modelValue":o[1]||(o[1]=e=>t.form.size=e),error:t.form.errors.size,class:"pb-8 pr-6 w-full lg:w-1/2",label:"Size"},{default:a(()=>[E,(s(!0),i(y,null,_(d.sizes,e=>(s(),i("option",{value:e},p(e),9,F))),256))]),_:1},8,["modelValue","error"])]),r("div",P,[d.memory.deleted_at?f("",!0):(s(),i("button",{key:0,class:"text-red-600 hover:underline",tabindex:"-1",type:"button",onClick:o[2]||(o[2]=(...e)=>m.destroy&&m.destroy(...e))},"Delete Memory ")),l(x,{loading:t.form.processing,class:"btn-indigo ml-auto",type:"submit"},{default:a(()=>[u("Update Memory ")]),_:1},8,["loading"])])],32)])])}const se=A(C,[["render",R]]);export{se as default};
