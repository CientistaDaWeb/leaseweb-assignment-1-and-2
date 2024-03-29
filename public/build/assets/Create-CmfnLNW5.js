import{Z as x,i as h,r as i,o as s,f as n,a as l,b as o,w as a,d as m,e as v,F as f,l as c,t as _}from"./app-DgPWu283.js";import{L as w}from"./Layout-Bf2ZegyR.js";import{L as V,T as L}from"./LoadingButton-BXgd0Mr5.js";import{S}from"./SelectInput-Bm3Av8bM.js";import{_ as C}from"./_plugin-vue_export-helper-DlAUqK2U.js";/* empty css            */import"./Icon-Dakr8WTa.js";import"./Logo-HB5MViY6.js";import"./Dropdown-e0af9Wzh.js";import"./popper-BQBsAJpH.js";import"./FlashMessages-QiDrnY8u.js";import"./v4-D8aEg3BZ.js";const k={components:{Head:x,Link:h,LoadingButton:V,TextInput:L,SelectInput:S},layout:w,remember:"form",props:{types:Array,sizes:Array},data(){return{form:this.$inertia.form({name:null})}},methods:{store(){this.form.post("/memories")}}},z={class:"mb-8 text-3xl font-bold"},B=o("span",{class:"text-indigo-400 font-medium"},"/",-1),M={class:"max-w-3xl bg-white rounded-md shadow overflow-hidden"},T={class:"flex flex-wrap -mb-8 -mr-6 p-8"},H=o("option",{value:null},"Please Select One",-1),N={value:"{{ type }}"},A=o("option",{value:null},"Please Select One",-1),F=["value"],I={class:"flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100"};function O(P,r,d,U,t,p){const y=i("Head"),b=i("Link"),u=i("select-input"),g=i("loading-button");return s(),n("div",null,[l(y,{title:"Create Memory"}),o("h1",z,[l(b,{class:"text-indigo-400 hover:text-indigo-600",href:"/memories"},{default:a(()=>[m("Memories")]),_:1}),B,m(" Create ")]),o("div",M,[o("form",{onSubmit:r[2]||(r[2]=v((...e)=>p.store&&p.store(...e),["prevent"]))},[o("div",T,[l(u,{modelValue:t.form.type,"onUpdate:modelValue":r[0]||(r[0]=e=>t.form.type=e),error:t.form.errors.type,class:"pb-8 pr-6 w-full lg:w-1/2",label:"Type"},{default:a(()=>[H,(s(!0),n(f,null,c(d.types,e=>(s(),n("option",N,_(e),1))),256))]),_:1},8,["modelValue","error"]),l(u,{modelValue:t.form.size,"onUpdate:modelValue":r[1]||(r[1]=e=>t.form.size=e),error:t.form.errors.size,class:"pb-8 pr-6 w-full lg:w-1/2",label:"Size"},{default:a(()=>[A,(s(!0),n(f,null,c(d.sizes,e=>(s(),n("option",{value:e},_(e),9,F))),256))]),_:1},8,["modelValue","error"])]),o("div",I,[l(g,{loading:t.form.processing,class:"btn-indigo",type:"submit"},{default:a(()=>[m("Create Memory")]),_:1},8,["loading"])])],32)])])}const Y=C(k,[["render",O]]);export{Y as default};
