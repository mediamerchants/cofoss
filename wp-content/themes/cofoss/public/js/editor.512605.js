(self.webpackChunk_roots_bud_sage_sage=self.webpackChunk_roots_bud_sage_sage||[]).push([[189],{"./styles/editor.scss":()=>{},"./scripts/filters sync recursive .*\\.filter\\..*$":(e,t,s)=>{var r={"./button.filter.js":"./scripts/filters/button.filter.js"};function o(e){var t=i(e);return s(t)}function i(e){if(!s.o(r,e)){var t=new Error("Cannot find module '"+e+"'");throw t.code="MODULE_NOT_FOUND",t}return r[e]}o.keys=function(){return Object.keys(r)},o.resolve=i,e.exports=o,o.id="./scripts/filters sync recursive .*\\.filter\\..*$"},"./scripts/editor.js":(e,t,s)=>{"use strict";var r={};s.r(r),s.d(r,{register:()=>n,unregister:()=>c});class o{store={};get(e){return this.store[e]}has(e){return void 0!==this.store[e]}is(e,t){return this.store[e]===t}set(e,t){this.store[e]=t}}window.wp.data;var i=window.wp.hooks;const n=({callback:e,hook:t,name:s})=>{(0,i.hasFilter)(t,s)&&c({hook:t,name:s}),(0,i.addFilter)(t,s,e)},c=({hook:e,name:t})=>(0,i.removeFilter)(e,t);(({accept:e,after:t,api:s,before:r,getContext:i})=>{const n=new o,c=()=>{const e=[];r&&r();const o=i();return o?.keys().forEach((t=>{const r=o(t),i=r.default??r;n.is(t,i)||(n.has(t)&&s.unregister(n.get(t)),s.register(i),e.push(i),n.set(t,i))})),t&&t(e),o},{id:a}=c();e(a,c)})({accept:(e,t)=>{},api:r,getContext:()=>s("./scripts/filters sync recursive .*\\.filter\\..*$")})},"./scripts/filters/button.filter.js":(e,t,s)=>{"use strict";s.r(t),s.d(t,{callback:()=>i,hook:()=>r,name:()=>o});const r="blocks.registerBlockType",o="sage/button";function i(e,t){return"core/button"!==t?e:{...e,styles:[{label:"Outline",name:"outline"}]}}}},e=>{var t=t=>e(e.s=t);t("./scripts/editor.js"),t("./styles/editor.scss")}]);