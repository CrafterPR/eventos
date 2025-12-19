(globalThis.TURBOPACK||(globalThis.TURBOPACK=[])).push(["object"==typeof document?document.currentScript:void 0,7982,e=>{"use strict";let t,r;var n,o=e.i(91788);let a={data:""},i=/(?:([\u0080-\uFFFF\w-%@]+) *:? *([^{;]+?);|([^;}{]*?) *{)|(}\s*)/g,s=/\/\*[^]*?\*\/|  +/g,l=/\n+/g,c=(e,t)=>{let r="",n="",o="";for(let a in e){let i=e[a];"@"==a[0]?"i"==a[1]?r=a+" "+i+";":n+="f"==a[1]?c(i,a):a+"{"+c(i,"k"==a[1]?"":t)+"}":"object"==typeof i?n+=c(i,t?t.replace(/([^,])+/g,e=>a.replace(/([^,]*:\S+\([^)]*\))|([^,])+/g,t=>/&/.test(t)?t.replace(/&/g,e):e?e+" "+t:t)):a):null!=i&&(a=/^--/.test(a)?a:a.replace(/[A-Z]/g,"-$&").toLowerCase(),o+=c.p?c.p(a,i):a+":"+i+";")}return r+(t&&o?t+"{"+o+"}":o)+n},u={},d=e=>{if("object"==typeof e){let t="";for(let r in e)t+=r+d(e[r]);return t}return e};function f(e){let t,r,n=this||{},o=e.call?e(n.p):e;return((e,t,r,n,o)=>{var a;let f=d(e),p=u[f]||(u[f]=(e=>{let t=0,r=11;for(;t<e.length;)r=101*r+e.charCodeAt(t++)>>>0;return"go"+r})(f));if(!u[p]){let t=f!==e?e:(e=>{let t,r,n=[{}];for(;t=i.exec(e.replace(s,""));)t[4]?n.shift():t[3]?(r=t[3].replace(l," ").trim(),n.unshift(n[0][r]=n[0][r]||{})):n[0][t[1]]=t[2].replace(l," ").trim();return n[0]})(e);u[p]=c(o?{["@keyframes "+p]:t}:t,r?"":"."+p)}let m=r&&u.g?u.g:null;return r&&(u.g=u[p]),a=u[p],m?t.data=t.data.replace(m,a):-1===t.data.indexOf(a)&&(t.data=n?a+t.data:t.data+a),p})(o.unshift?o.raw?(t=[].slice.call(arguments,1),r=n.p,o.reduce((e,n,o)=>{let a=t[o];if(a&&a.call){let e=a(r),t=e&&e.props&&e.props.className||/^go/.test(e)&&e;a=t?"."+t:e&&"object"==typeof e?e.props?"":c(e,""):!1===e?"":e}return e+n+(null==a?"":a)},"")):o.reduce((e,t)=>Object.assign(e,t&&t.call?t(n.p):t),{}):o,(e=>{if("object"==typeof window){let t=(e?e.querySelector("#_goober"):window._goober)||Object.assign(document.createElement("style"),{innerHTML:" ",id:"_goober"});return t.nonce=window.__nonce__,t.parentNode||(e||document.head).appendChild(t),t.firstChild}return e||a})(n.target),n.g,n.o,n.k)}f.bind({g:1});let p,m,g,y=f.bind({k:1});function h(e,t){let r=this||{};return function(){let n=arguments;function o(a,i){let s=Object.assign({},a),l=s.className||o.className;r.p=Object.assign({theme:m&&m()},s),r.o=/ *go\d+/.test(l),s.className=f.apply(r,n)+(l?" "+l:""),t&&(s.ref=i);let c=e;return e[0]&&(c=s.as||e,delete s.as),g&&c[0]&&g(s),p(c,s)}return t?t(o):o}}var b=(e,t)=>"function"==typeof e?e(t):e,v=(t=0,()=>(++t).toString()),x=()=>{if(void 0===r&&"u">typeof window){let e=matchMedia("(prefers-reduced-motion: reduce)");r=!e||e.matches}return r},w="default",_=(e,t)=>{let{toastLimit:r}=e.settings;switch(t.type){case 0:return{...e,toasts:[t.toast,...e.toasts].slice(0,r)};case 1:return{...e,toasts:e.toasts.map(e=>e.id===t.toast.id?{...e,...t.toast}:e)};case 2:let{toast:n}=t;return _(e,{type:+!!e.toasts.find(e=>e.id===n.id),toast:n});case 3:let{toastId:o}=t;return{...e,toasts:e.toasts.map(e=>e.id===o||void 0===o?{...e,dismissed:!0,visible:!1}:e)};case 4:return void 0===t.toastId?{...e,toasts:[]}:{...e,toasts:e.toasts.filter(e=>e.id!==t.toastId)};case 5:return{...e,pausedAt:t.time};case 6:let a=t.time-(e.pausedAt||0);return{...e,pausedAt:void 0,toasts:e.toasts.map(e=>({...e,pauseDuration:e.pauseDuration+a}))}}},j=[],E={toasts:[],pausedAt:void 0,settings:{toastLimit:20}},O={},S=(e,t=w)=>{O[t]=_(O[t]||E,e),j.forEach(([e,r])=>{e===t&&r(O[t])})},N=e=>Object.keys(O).forEach(t=>S(e,t)),P=(e=w)=>t=>{S(t,e)},C={blank:4e3,error:4e3,success:2e3,loading:1/0,custom:4e3},A=e=>(t,r)=>{let n,o=((e,t="blank",r)=>({createdAt:Date.now(),visible:!0,dismissed:!1,type:t,ariaProps:{role:"status","aria-live":"polite"},message:e,pauseDuration:0,...r,id:(null==r?void 0:r.id)||v()}))(t,e,r);return P(o.toasterId||(n=o.id,Object.keys(O).find(e=>O[e].toasts.some(e=>e.id===n))))({type:2,toast:o}),o.id},T=(e,t)=>A("blank")(e,t);T.error=A("error"),T.success=A("success"),T.loading=A("loading"),T.custom=A("custom"),T.dismiss=(e,t)=>{let r={type:3,toastId:e};t?P(t)(r):N(r)},T.dismissAll=e=>T.dismiss(void 0,e),T.remove=(e,t)=>{let r={type:4,toastId:e};t?P(t)(r):N(r)},T.removeAll=e=>T.remove(void 0,e),T.promise=(e,t,r)=>{let n=T.loading(t.loading,{...r,...null==r?void 0:r.loading});return"function"==typeof e&&(e=e()),e.then(e=>{let o=t.success?b(t.success,e):void 0;return o?T.success(o,{id:n,...r,...null==r?void 0:r.success}):T.dismiss(n),e}).catch(e=>{let o=t.error?b(t.error,e):void 0;o?T.error(o,{id:n,...r,...null==r?void 0:r.error}):T.dismiss(n)}),e};var k=1e3,L=y`
from {
  transform: scale(0) rotate(45deg);
	opacity: 0;
}
to {
 transform: scale(1) rotate(45deg);
  opacity: 1;
}`,I=y`
from {
  transform: scale(0);
  opacity: 0;
}
to {
  transform: scale(1);
  opacity: 1;
}`,D=y`
from {
  transform: scale(0) rotate(90deg);
	opacity: 0;
}
to {
  transform: scale(1) rotate(90deg);
	opacity: 1;
}`,R=h("div")`
  width: 20px;
  opacity: 0;
  height: 20px;
  border-radius: 10px;
  background: ${e=>e.primary||"#ff4b4b"};
  position: relative;
  transform: rotate(45deg);

  animation: ${L} 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275)
    forwards;
  animation-delay: 100ms;

  &:after,
  &:before {
    content: '';
    animation: ${I} 0.15s ease-out forwards;
    animation-delay: 150ms;
    position: absolute;
    border-radius: 3px;
    opacity: 0;
    background: ${e=>e.secondary||"#fff"};
    bottom: 9px;
    left: 4px;
    height: 2px;
    width: 12px;
  }

  &:before {
    animation: ${D} 0.15s ease-out forwards;
    animation-delay: 180ms;
    transform: rotate(90deg);
  }
`,M=y`
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
`,$=h("div")`
  width: 12px;
  height: 12px;
  box-sizing: border-box;
  border: 2px solid;
  border-radius: 100%;
  border-color: ${e=>e.secondary||"#e0e0e0"};
  border-right-color: ${e=>e.primary||"#616161"};
  animation: ${M} 1s linear infinite;
`,z=y`
from {
  transform: scale(0) rotate(45deg);
	opacity: 0;
}
to {
  transform: scale(1) rotate(45deg);
	opacity: 1;
}`,U=y`
0% {
	height: 0;
	width: 0;
	opacity: 0;
}
40% {
  height: 0;
	width: 6px;
	opacity: 1;
}
100% {
  opacity: 1;
  height: 10px;
}`,F=h("div")`
  width: 20px;
  opacity: 0;
  height: 20px;
  border-radius: 10px;
  background: ${e=>e.primary||"#61d345"};
  position: relative;
  transform: rotate(45deg);

  animation: ${z} 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275)
    forwards;
  animation-delay: 100ms;
  &:after {
    content: '';
    box-sizing: border-box;
    animation: ${U} 0.2s ease-out forwards;
    opacity: 0;
    animation-delay: 200ms;
    position: absolute;
    border-right: 2px solid;
    border-bottom: 2px solid;
    border-color: ${e=>e.secondary||"#fff"};
    bottom: 6px;
    left: 6px;
    height: 10px;
    width: 6px;
  }
`,H=h("div")`
  position: absolute;
`,q=h("div")`
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  min-width: 20px;
  min-height: 20px;
`,B=y`
from {
  transform: scale(0.6);
  opacity: 0.4;
}
to {
  transform: scale(1);
  opacity: 1;
}`,G=h("div")`
  position: relative;
  transform: scale(0.6);
  opacity: 0.4;
  min-width: 20px;
  animation: ${B} 0.3s 0.12s cubic-bezier(0.175, 0.885, 0.32, 1.275)
    forwards;
`,K=({toast:e})=>{let{icon:t,type:r,iconTheme:n}=e;return void 0!==t?"string"==typeof t?o.createElement(G,null,t):t:"blank"===r?null:o.createElement(q,null,o.createElement($,{...n}),"loading"!==r&&o.createElement(H,null,"error"===r?o.createElement(R,{...n}):o.createElement(F,{...n})))},V=h("div")`
  display: flex;
  align-items: center;
  background: #fff;
  color: #363636;
  line-height: 1.3;
  will-change: transform;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1), 0 3px 3px rgba(0, 0, 0, 0.05);
  max-width: 350px;
  pointer-events: auto;
  padding: 8px 10px;
  border-radius: 8px;
`,W=h("div")`
  display: flex;
  justify-content: center;
  margin: 4px 10px;
  color: inherit;
  flex: 1 1 auto;
  white-space: pre-line;
`,Y=o.memo(({toast:e,position:t,style:r,children:n})=>{let a=e.height?((e,t)=>{let r=e.includes("top")?1:-1,[n,o]=x()?["0%{opacity:0;} 100%{opacity:1;}","0%{opacity:1;} 100%{opacity:0;}"]:[`
0% {transform: translate3d(0,${-200*r}%,0) scale(.6); opacity:.5;}
100% {transform: translate3d(0,0,0) scale(1); opacity:1;}
`,`
0% {transform: translate3d(0,0,-1px) scale(1); opacity:1;}
100% {transform: translate3d(0,${-150*r}%,-1px) scale(.6); opacity:0;}
`];return{animation:t?`${y(n)} 0.35s cubic-bezier(.21,1.02,.73,1) forwards`:`${y(o)} 0.4s forwards cubic-bezier(.06,.71,.55,1)`}})(e.position||t||"top-center",e.visible):{opacity:0},i=o.createElement(K,{toast:e}),s=o.createElement(W,{...e.ariaProps},b(e.message,e));return o.createElement(V,{className:e.className,style:{...a,...r,...e.style}},"function"==typeof n?n({icon:i,message:s}):o.createElement(o.Fragment,null,i,s))});n=o.createElement,c.p=void 0,p=n,m=void 0,g=void 0;var Z=({id:e,className:t,style:r,onHeightUpdate:n,children:a})=>{let i=o.useCallback(t=>{if(t){let r=()=>{n(e,t.getBoundingClientRect().height)};r(),new MutationObserver(r).observe(t,{subtree:!0,childList:!0,characterData:!0})}},[e,n]);return o.createElement("div",{ref:i,className:t,style:r},a)},J=f`
  z-index: 9999;
  > * {
    pointer-events: auto;
  }
`,X=({reverseOrder:e,position:t="top-center",toastOptions:r,gutter:n,children:a,toasterId:i,containerStyle:s,containerClassName:l})=>{let{toasts:c,handlers:u}=((e,t="default")=>{let{toasts:r,pausedAt:n}=((e={},t=w)=>{let[r,n]=(0,o.useState)(O[t]||E),a=(0,o.useRef)(O[t]);(0,o.useEffect)(()=>(a.current!==O[t]&&n(O[t]),j.push([t,n]),()=>{let e=j.findIndex(([e])=>e===t);e>-1&&j.splice(e,1)}),[t]);let i=r.toasts.map(t=>{var r,n,o;return{...e,...e[t.type],...t,removeDelay:t.removeDelay||(null==(r=e[t.type])?void 0:r.removeDelay)||(null==e?void 0:e.removeDelay),duration:t.duration||(null==(n=e[t.type])?void 0:n.duration)||(null==e?void 0:e.duration)||C[t.type],style:{...e.style,...null==(o=e[t.type])?void 0:o.style,...t.style}}});return{...r,toasts:i}})(e,t),a=(0,o.useRef)(new Map).current,i=(0,o.useCallback)((e,t=k)=>{if(a.has(e))return;let r=setTimeout(()=>{a.delete(e),s({type:4,toastId:e})},t);a.set(e,r)},[]);(0,o.useEffect)(()=>{if(n)return;let e=Date.now(),o=r.map(r=>{if(r.duration===1/0)return;let n=(r.duration||0)+r.pauseDuration-(e-r.createdAt);if(n<0){r.visible&&T.dismiss(r.id);return}return setTimeout(()=>T.dismiss(r.id,t),n)});return()=>{o.forEach(e=>e&&clearTimeout(e))}},[r,n,t]);let s=(0,o.useCallback)(P(t),[t]),l=(0,o.useCallback)(()=>{s({type:5,time:Date.now()})},[s]),c=(0,o.useCallback)((e,t)=>{s({type:1,toast:{id:e,height:t}})},[s]),u=(0,o.useCallback)(()=>{n&&s({type:6,time:Date.now()})},[n,s]),d=(0,o.useCallback)((e,t)=>{let{reverseOrder:n=!1,gutter:o=8,defaultPosition:a}=t||{},i=r.filter(t=>(t.position||a)===(e.position||a)&&t.height),s=i.findIndex(t=>t.id===e.id),l=i.filter((e,t)=>t<s&&e.visible).length;return i.filter(e=>e.visible).slice(...n?[l+1]:[0,l]).reduce((e,t)=>e+(t.height||0)+o,0)},[r]);return(0,o.useEffect)(()=>{r.forEach(e=>{if(e.dismissed)i(e.id,e.removeDelay);else{let t=a.get(e.id);t&&(clearTimeout(t),a.delete(e.id))}})},[r,i]),{toasts:r,handlers:{updateHeight:c,startPause:l,endPause:u,calculateOffset:d}}})(r,i);return o.createElement("div",{"data-rht-toaster":i||"",style:{position:"fixed",zIndex:9999,top:16,left:16,right:16,bottom:16,pointerEvents:"none",...s},className:l,onMouseEnter:u.startPause,onMouseLeave:u.endPause},c.map(r=>{let i,s,l=r.position||t,c=u.calculateOffset(r,{reverseOrder:e,gutter:n,defaultPosition:t}),d=(i=l.includes("top"),s=l.includes("center")?{justifyContent:"center"}:l.includes("right")?{justifyContent:"flex-end"}:{},{left:0,right:0,display:"flex",position:"absolute",transition:x()?void 0:"all 230ms cubic-bezier(.21,1.02,.73,1)",transform:`translateY(${c*(i?1:-1)}px)`,...i?{top:0}:{bottom:0},...s});return o.createElement(Z,{id:r.id,key:r.id,onHeightUpdate:u.updateHeight,className:r.visible?J:"",style:d},"custom"===r.type?b(r.message,r):a?a(r):o.createElement(Y,{toast:r,position:l}))}))};e.s(["Toaster",()=>X,"default",()=>T,"toast",()=>T],7982)},69486,e=>{"use strict";var t=e.i(91398),r=e.i(91788),n=e.i(82771),o=e.i(7982);let a=({icon:e,label:r,onClick:o,mode:a="light",className:i="",children:s})=>(0,t.jsxs)("div",{className:"relative group",children:[(0,t.jsx)("button",{onClick:o,className:`p-2 rounded-full focus:outline-none ${"dark"===a?"hover:bg-gray-700":"hover:bg-sky-50"} ${i}`,"aria-label":r,children:s||(0,t.jsx)(n.Icon,{icon:e,className:"h-5 w-5"})}),(0,t.jsx)("div",{className:`
          absolute top-full left-1/2 -translate-x-1/2 mt-2 w-max
          bg-white text-xs py-2 px-3 rounded-full shadow-lg
          opacity-0 group-hover:opacity-100 translate-y-1 group-hover:translate-y-0
          transition-all duration-200 ease-in-out
          ${"dark"===a?"text-gray-200":"text-gray-900"}
          before:content-[''] before:absolute before:-top-1.5 before:left-1/2
          before:-translate-x-1/2 before:border-4 before:border-transparent before:border-b-white
        `,children:r})]});e.s(["default",0,({mode:e})=>{let i=(0,r.useRef)(null),s=(0,r.useRef)(null),l=(0,r.useRef)(!0),c=(0,r.useRef)(null),u=[{name:"English",flag:"flag:us-1x1",code:"en"},{name:"French",flag:"flag:fr-1x1",code:"fr"},{name:"Swahili",flag:"flag:ke-1x1",code:"sw"},{name:"Arabic",flag:"flag:sa-1x1",code:"ar"},{name:"Hausa",flag:"flag:ng-1x1",code:"ha"}],d={en:"Translated to English",fr:"Traduit en Français",sw:"Umetafsiriwa kwa Kiswahili",ar:"تمت الترجمة إلى العربية",ha:"An fassara zuwa Hausa"},[f,p]=(0,r.useState)("English"),[m,g]=(0,r.useState)(!1),[y,h]=(0,r.useState)(!1),[b,v]=(0,r.useState)(!1),[x,w]=(0,r.useState)(!1);return(0,r.useEffect)(()=>{p((()=>{let e=window.localStorage.getItem("selectedLanguage");if(e)return e;let t=window.navigator.language.toLowerCase(),r=u.find(e=>t.startsWith(e.code)),n=r?r.name:"English";return window.localStorage.setItem("selectedLanguage",n),n})())},[]),(0,r.useEffect)(()=>{if(window.google&&window.google.translate)return void w(!0);if(document.querySelector('script[src="//translate.google.com/translate_a/element.js"]')){window.googleTranslateElementInit||(window.googleTranslateElementInit=()=>w(!0));return}let e=document.createElement("script");e.src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit",e.async=!0,e.onerror=()=>{console.error("Failed to load translation script"),o.default.error("Failed to load translation service"),v(!0)},window.googleTranslateElementInit=()=>{try{w(!0)}catch(e){console.error("Script initialization error:",e)}},document.body.appendChild(e)},[]),(0,r.useEffect)(()=>{if(x)try{if(window.__paanGoogleTranslateInitialized){let e=document.querySelector(".goog-te-combo");e&&(s.current=e,h(!0));return}window.__paanGoogleTranslateInitialized=!0;let e=c.current?.id||"google_translate_element";new window.google.translate.TranslateElement({pageLanguage:"en",includedLanguages:u.map(e=>e.code).join(","),layout:window.google.translate.TranslateElement.InlineLayout.HORIZONTAL,autoDisplay:!1},e);let t=()=>{let e=document.querySelector(".goog-te-combo");return!!e&&(s.current=e,h(!0),!0)};if(!t()){let e=new MutationObserver(()=>{t()&&e.disconnect()});e.observe(document.body,{childList:!0,subtree:!0}),setTimeout(()=>e.disconnect(),15e3)}}catch(e){console.error("Widget initialization error:",e),o.default.error("Translation service initialization failed"),v(!0)}},[x]),(0,r.useEffect)(()=>{if(s.current)return;let e=new MutationObserver(()=>{let t=c.current?.querySelector("select");t&&(s.current=t,h(!0),e.disconnect())});c.current&&e.observe(c.current,{childList:!0,subtree:!0});let t=setTimeout(()=>e.disconnect(),15e3);return()=>{e.disconnect(),clearTimeout(t)}},[c.current]),(0,r.useEffect)(()=>{let e=u.find(e=>e.name===f);if(e&&s.current)try{s.current.value=e.code;let t=new Event("change");s.current.dispatchEvent(t),l.current?l.current=!1:o.default.success(d[e.code])}catch(e){console.error("Error applying language:",e)}},[f]),(0,r.useEffect)(()=>{let e=e=>{i.current&&!i.current.contains(e.target)&&g(!1)};return document.addEventListener("mousedown",e),()=>document.removeEventListener("mousedown",e)},[]),(0,r.useEffect)(()=>{let e=document.createElement("style");return e.textContent=`
      .goog-te-banner-frame { display: none !important; }
      #goog-gt-tt { display: none !important; }
      .goog-te-gadget { font-size: 0 !important; }
      .goog-te-menu-value span:first-child { display: none; }
      .goog-te-menu-frame { box-shadow: none !important; }
      body { top: 0 !important; }
    `,document.head.appendChild(e),()=>{document.head.contains(e)&&document.head.removeChild(e)}},[]),(0,t.jsxs)("div",{className:"relative",ref:i,children:[(0,t.jsx)("div",{id:"google_translate_element",ref:c,style:{position:"absolute",height:"0",overflow:"hidden",top:"-9999px",left:"-9999px"}}),(0,t.jsx)(a,{label:"Change Language",mode:e,onClick:()=>g(!m),className:"bg-white/50",children:(0,t.jsx)(n.Icon,{icon:u.find(e=>e.name===f)?.flag||u[0].flag,className:"h-5 w-5 rounded-lg "})}),m&&(0,t.jsx)("div",{className:`absolute right-0 mt-2 w-48 rounded-lg shadow-lg z-10 ${"dark"===e?"bg-gray-800 text-white":"bg-white text-[#231812]"}`,children:u.map(e=>(0,t.jsxs)("button",{onClick:()=>{p(e.name),window.localStorage.setItem("selectedLanguage",e.name),g(!1),b&&o.default.success(d[e.code])},className:`flex items-center w-full px-4 py-2 text-left hover:bg-opacity-10 hover:bg-gray-500 ${f===e.name?"bg-opacity-5 bg-gray-500":""}`,children:[(0,t.jsx)(n.Icon,{icon:e.flag,className:"h-5 w-5 mr-2"}),e.name]},e.name))})]})}],69486)},3828,(e,t,r)=>{t.exports=e.r(26990)},15125,(e,t,r)=>{"use strict";Object.defineProperty(r,"__esModule",{value:!0});var n={VALID_LOADERS:function(){return a},imageConfigDefault:function(){return i}};for(var o in n)Object.defineProperty(r,o,{enumerable:!0,get:n[o]});let a=["default","imgix","cloudinary","akamai","custom"],i={deviceSizes:[640,750,828,1080,1200,1920,2048,3840],imageSizes:[32,48,64,96,128,256,384],path:"/_next/image",loader:"default",loaderFile:"",domains:[],disableStaticImages:!1,minimumCacheTTL:14400,formats:["image/webp"],maximumRedirects:3,dangerouslyAllowLocalIP:!1,dangerouslyAllowSVG:!1,contentSecurityPolicy:"script-src 'none'; frame-src 'none'; sandbox;",contentDispositionType:"attachment",localPatterns:void 0,remotePatterns:[],qualities:[75],unoptimized:!1}},13521,(e,t,r)=>{"use strict";Object.defineProperty(r,"__esModule",{value:!0}),Object.defineProperty(r,"ImageConfigContext",{enumerable:!0,get:function(){return a}});let n=e.r(41705)._(e.r(91788)),o=e.r(15125),a=n.default.createContext(o.imageConfigDefault)},89129,(e,t,r)=>{"use strict";Object.defineProperty(r,"__esModule",{value:!0});var n={DecodeError:function(){return h},MiddlewareNotFoundError:function(){return w},MissingStaticPage:function(){return x},NormalizeError:function(){return b},PageNotFoundError:function(){return v},SP:function(){return g},ST:function(){return y},WEB_VITALS:function(){return a},execOnce:function(){return i},getDisplayName:function(){return d},getLocationOrigin:function(){return c},getURL:function(){return u},isAbsoluteUrl:function(){return l},isResSent:function(){return f},loadGetInitialProps:function(){return m},normalizeRepeatedSlashes:function(){return p},stringifyError:function(){return _}};for(var o in n)Object.defineProperty(r,o,{enumerable:!0,get:n[o]});let a=["CLS","FCP","FID","INP","LCP","TTFB"];function i(e){let t,r=!1;return(...n)=>(r||(r=!0,t=e(...n)),t)}let s=/^[a-zA-Z][a-zA-Z\d+\-.]*?:/,l=e=>s.test(e);function c(){let{protocol:e,hostname:t,port:r}=window.location;return`${e}//${t}${r?":"+r:""}`}function u(){let{href:e}=window.location,t=c();return e.substring(t.length)}function d(e){return"string"==typeof e?e:e.displayName||e.name||"Unknown"}function f(e){return e.finished||e.headersSent}function p(e){let t=e.split("?");return t[0].replace(/\\/g,"/").replace(/\/\/+/g,"/")+(t[1]?`?${t.slice(1).join("?")}`:"")}async function m(e,t){let r=t.res||t.ctx&&t.ctx.res;if(!e.getInitialProps)return t.ctx&&t.Component?{pageProps:await m(t.Component,t.ctx)}:{};let n=await e.getInitialProps(t);if(r&&f(r))return n;if(!n)throw Object.defineProperty(Error(`"${d(e)}.getInitialProps()" should resolve to an object. But found "${n}" instead.`),"__NEXT_ERROR_CODE",{value:"E394",enumerable:!1,configurable:!0});return n}let g="undefined"!=typeof performance,y=g&&["mark","measure","getEntriesByName"].every(e=>"function"==typeof performance[e]);class h extends Error{}class b extends Error{}class v extends Error{constructor(e){super(),this.code="ENOENT",this.name="PageNotFoundError",this.message=`Cannot find module for page: ${e}`}}class x extends Error{constructor(e,t){super(),this.message=`Failed to load static file for page: ${e} ${t}`}}class w extends Error{constructor(){super(),this.code="ENOENT",this.message="Cannot find the middleware module"}}function _(e){return JSON.stringify({message:e.message,stack:e.stack})}},17431,(e,t,r)=>{"use strict";var n=e.r(91788);function o(e){var t="https://react.dev/errors/"+e;if(1<arguments.length){t+="?args[]="+encodeURIComponent(arguments[1]);for(var r=2;r<arguments.length;r++)t+="&args[]="+encodeURIComponent(arguments[r])}return"Minified React error #"+e+"; visit "+t+" for the full message or use the non-minified dev environment for full errors and additional helpful warnings."}function a(){}var i={d:{f:a,r:function(){throw Error(o(522))},D:a,C:a,L:a,m:a,X:a,S:a,M:a},p:0,findDOMNode:null},s=Symbol.for("react.portal"),l=n.__CLIENT_INTERNALS_DO_NOT_USE_OR_WARN_USERS_THEY_CANNOT_UPGRADE;function c(e,t){return"font"===e?"":"string"==typeof t?"use-credentials"===t?t:"":void 0}r.__DOM_INTERNALS_DO_NOT_USE_OR_WARN_USERS_THEY_CANNOT_UPGRADE=i,r.createPortal=function(e,t){var r=2<arguments.length&&void 0!==arguments[2]?arguments[2]:null;if(!t||1!==t.nodeType&&9!==t.nodeType&&11!==t.nodeType)throw Error(o(299));return function(e,t,r){var n=3<arguments.length&&void 0!==arguments[3]?arguments[3]:null;return{$$typeof:s,key:null==n?null:""+n,children:e,containerInfo:t,implementation:r}}(e,t,null,r)},r.flushSync=function(e){var t=l.T,r=i.p;try{if(l.T=null,i.p=2,e)return e()}finally{l.T=t,i.p=r,i.d.f()}},r.preconnect=function(e,t){"string"==typeof e&&(t=t?"string"==typeof(t=t.crossOrigin)?"use-credentials"===t?t:"":void 0:null,i.d.C(e,t))},r.prefetchDNS=function(e){"string"==typeof e&&i.d.D(e)},r.preinit=function(e,t){if("string"==typeof e&&t&&"string"==typeof t.as){var r=t.as,n=c(r,t.crossOrigin),o="string"==typeof t.integrity?t.integrity:void 0,a="string"==typeof t.fetchPriority?t.fetchPriority:void 0;"style"===r?i.d.S(e,"string"==typeof t.precedence?t.precedence:void 0,{crossOrigin:n,integrity:o,fetchPriority:a}):"script"===r&&i.d.X(e,{crossOrigin:n,integrity:o,fetchPriority:a,nonce:"string"==typeof t.nonce?t.nonce:void 0})}},r.preinitModule=function(e,t){if("string"==typeof e)if("object"==typeof t&&null!==t){if(null==t.as||"script"===t.as){var r=c(t.as,t.crossOrigin);i.d.M(e,{crossOrigin:r,integrity:"string"==typeof t.integrity?t.integrity:void 0,nonce:"string"==typeof t.nonce?t.nonce:void 0})}}else null==t&&i.d.M(e)},r.preload=function(e,t){if("string"==typeof e&&"object"==typeof t&&null!==t&&"string"==typeof t.as){var r=t.as,n=c(r,t.crossOrigin);i.d.L(e,r,{crossOrigin:n,integrity:"string"==typeof t.integrity?t.integrity:void 0,nonce:"string"==typeof t.nonce?t.nonce:void 0,type:"string"==typeof t.type?t.type:void 0,fetchPriority:"string"==typeof t.fetchPriority?t.fetchPriority:void 0,referrerPolicy:"string"==typeof t.referrerPolicy?t.referrerPolicy:void 0,imageSrcSet:"string"==typeof t.imageSrcSet?t.imageSrcSet:void 0,imageSizes:"string"==typeof t.imageSizes?t.imageSizes:void 0,media:"string"==typeof t.media?t.media:void 0})}},r.preloadModule=function(e,t){if("string"==typeof e)if(t){var r=c(t.as,t.crossOrigin);i.d.m(e,{as:"string"==typeof t.as&&"script"!==t.as?t.as:void 0,crossOrigin:r,integrity:"string"==typeof t.integrity?t.integrity:void 0})}else i.d.m(e)},r.requestFormReset=function(e){i.d.r(e)},r.unstable_batchedUpdates=function(e,t){return e(t)},r.useFormState=function(e,t,r){return l.H.useFormState(e,t,r)},r.useFormStatus=function(){return l.H.useHostTransitionStatus()},r.version="19.2.1"},30943,(e,t,r)=>{"use strict";!function e(){if("undefined"!=typeof __REACT_DEVTOOLS_GLOBAL_HOOK__&&"function"==typeof __REACT_DEVTOOLS_GLOBAL_HOOK__.checkDCE)try{__REACT_DEVTOOLS_GLOBAL_HOOK__.checkDCE(e)}catch(e){console.error(e)}}(),t.exports=e.r(17431)},25479,(e,t,r)=>{"use strict";Object.defineProperty(r,"__esModule",{value:!0}),Object.defineProperty(r,"RouterContext",{enumerable:!0,get:function(){return n}});let n=e.r(41705)._(e.r(91788)).default.createContext(null)},71914,(e,t,r)=>{"use strict";Object.defineProperty(r,"__esModule",{value:!0}),Object.defineProperty(r,"useIntersection",{enumerable:!0,get:function(){return l}});let n=e.r(91788),o=e.r(99604),a="function"==typeof IntersectionObserver,i=new Map,s=[];function l({rootRef:e,rootMargin:t,disabled:r}){let l=r||!a,[c,u]=(0,n.useState)(!1),d=(0,n.useRef)(null),f=(0,n.useCallback)(e=>{d.current=e},[]);return(0,n.useEffect)(()=>{if(a){if(l||c)return;let r=d.current;if(r&&r.tagName)return function(e,t,r){let{id:n,observer:o,elements:a}=function(e){let t,r={root:e.root||null,margin:e.rootMargin||""},n=s.find(e=>e.root===r.root&&e.margin===r.margin);if(n&&(t=i.get(n)))return t;let o=new Map;return t={id:r,observer:new IntersectionObserver(e=>{e.forEach(e=>{let t=o.get(e.target),r=e.isIntersecting||e.intersectionRatio>0;t&&r&&t(r)})},e),elements:o},s.push(r),i.set(r,t),t}(r);return a.set(e,t),o.observe(e),function(){if(a.delete(e),o.unobserve(e),0===a.size){o.disconnect(),i.delete(n);let e=s.findIndex(e=>e.root===n.root&&e.margin===n.margin);e>-1&&s.splice(e,1)}}}(r,e=>e&&u(e),{root:e?.current,rootMargin:t})}else if(!c){let e=(0,o.requestIdleCallback)(()=>u(!0));return()=>(0,o.cancelIdleCallback)(e)}},[l,t,e,c,d.current]),[f,c,(0,n.useCallback)(()=>{u(!1)},[])]}("function"==typeof r.default||"object"==typeof r.default&&null!==r.default)&&void 0===r.default.__esModule&&(Object.defineProperty(r.default,"__esModule",{value:!0}),Object.assign(r.default,r),t.exports=r.default)},54471,(e,t,r)=>{"use strict";function n(e,t,r,n){return!1}Object.defineProperty(r,"__esModule",{value:!0}),Object.defineProperty(r,"getDomainLocale",{enumerable:!0,get:function(){return n}}),e.r(70090),("function"==typeof r.default||"object"==typeof r.default&&null!==r.default)&&void 0===r.default.__esModule&&(Object.defineProperty(r.default,"__esModule",{value:!0}),Object.assign(r.default,r),t.exports=r.default)},48735,(e,t,r)=>{"use strict";Object.defineProperty(r,"__esModule",{value:!0}),Object.defineProperty(r,"errorOnce",{enumerable:!0,get:function(){return n}});let n=e=>{}},39149,(e,t,r)=>{"use strict";Object.defineProperty(r,"__esModule",{value:!0});var n={default:function(){return E},useLinkStatus:function(){return j}};for(var o in n)Object.defineProperty(r,o,{enumerable:!0,get:n[o]});let a=e.r(52456),i=e.r(91398),s=a._(e.r(91788)),l=e.r(60472),c=e.r(71112),u=e.r(28169),d=e.r(89129),f=e.r(14862),p=e.r(25479),m=e.r(71914),g=e.r(54471),y=e.r(44113),h=e.r(63230);e.r(48735);let b=new Set;function v(e,t,r,n){if("undefined"!=typeof window&&(0,c.isLocalURL)(t)){if(!n.bypassPrefetchedCheck){let o=t+"%"+r+"%"+(void 0!==n.locale?n.locale:"locale"in e?e.locale:void 0);if(b.has(o))return;b.add(o)}e.prefetch(t,r,n).catch(e=>{})}}function x(e){return"string"==typeof e?e:(0,u.formatUrl)(e)}let w=s.default.forwardRef(function(e,t){let r,n,{href:o,as:a,children:u,prefetch:b=null,passHref:w,replace:_,shallow:j,scroll:E,locale:O,onClick:S,onNavigate:N,onMouseEnter:P,onTouchStart:C,legacyBehavior:A=!1,...T}=e;r=u,A&&("string"==typeof r||"number"==typeof r)&&(r=(0,i.jsx)("a",{children:r}));let k=s.default.useContext(p.RouterContext),L=!1!==b,{href:I,as:D}=s.default.useMemo(()=>{if(!k){let e=x(o);return{href:e,as:a?x(a):e}}let[e,t]=(0,l.resolveHref)(k,o,!0);return{href:e,as:a?(0,l.resolveHref)(k,a):t||e}},[k,o,a]),R=s.default.useRef(I),M=s.default.useRef(D);A&&(n=s.default.Children.only(r));let $=A?n&&"object"==typeof n&&n.ref:t,[z,U,F]=(0,m.useIntersection)({rootMargin:"200px"}),H=s.default.useCallback(e=>{(M.current!==D||R.current!==I)&&(F(),M.current=D,R.current=I),z(e)},[D,I,F,z]),q=(0,h.useMergedRef)(H,$);s.default.useEffect(()=>{!k||U&&L&&v(k,I,D,{locale:O})},[D,I,U,O,L,k?.locale,k]);let B={ref:q,onClick(e){A||"function"!=typeof S||S(e),A&&n.props&&"function"==typeof n.props.onClick&&n.props.onClick(e),!k||e.defaultPrevented||function(e,t,r,n,o,a,i,s,l){let u,{nodeName:d}=e.currentTarget;if(!("A"===d.toUpperCase()&&((u=e.currentTarget.getAttribute("target"))&&"_self"!==u||e.metaKey||e.ctrlKey||e.shiftKey||e.altKey||e.nativeEvent&&2===e.nativeEvent.which)||e.currentTarget.hasAttribute("download"))){if(!(0,c.isLocalURL)(r)){o&&(e.preventDefault(),location.replace(r));return}e.preventDefault(),(()=>{if(l){let e=!1;if(l({preventDefault:()=>{e=!0}}),e)return}let e=i??!0;"beforePopState"in t?t[o?"replace":"push"](r,n,{shallow:a,locale:s,scroll:e}):t[o?"replace":"push"](n||r,{scroll:e})})()}}(e,k,I,D,_,j,E,O,N)},onMouseEnter(e){A||"function"!=typeof P||P(e),A&&n.props&&"function"==typeof n.props.onMouseEnter&&n.props.onMouseEnter(e),k&&v(k,I,D,{locale:O,priority:!0,bypassPrefetchedCheck:!0})},onTouchStart:function(e){A||"function"!=typeof C||C(e),A&&n.props&&"function"==typeof n.props.onTouchStart&&n.props.onTouchStart(e),k&&v(k,I,D,{locale:O,priority:!0,bypassPrefetchedCheck:!0})}};if((0,d.isAbsoluteUrl)(D))B.href=D;else if(!A||w||"a"===n.type&&!("href"in n.props)){let e=void 0!==O?O:k?.locale;B.href=k?.isLocaleDomain&&(0,g.getDomainLocale)(D,e,k?.locales,k?.domainLocales)||(0,y.addBasePath)((0,f.addLocale)(D,e,k?.defaultLocale))}return A?s.default.cloneElement(n,B):(0,i.jsx)("a",{...T,...B,children:r})}),_=(0,s.createContext)({pending:!1}),j=()=>(0,s.useContext)(_),E=w;("function"==typeof r.default||"object"==typeof r.default&&null!==r.default)&&void 0===r.default.__esModule&&(Object.defineProperty(r.default,"__esModule",{value:!0}),Object.assign(r.default,r),t.exports=r.default)},41158,(e,t,r)=>{t.exports=e.r(39149)},90915,e=>{"use strict";var t=e.i(91398),r=e.i(91788);e.s(["default",0,()=>{let[e,n]=(0,r.useState)({name:"",email:""}),[o,a]=(0,r.useState)({}),[i,s]=(0,r.useState)(!1),l=e=>{let{name:t,value:r}=e.target;n(e=>({...e,[t]:r})),a(e=>({...e,[t]:""}))},c=async t=>{let r;t.preventDefault();let o=(r={},e.name.trim()||(r.name="Name is required"),e.email.trim()?/\S+@\S+\.\S+/.test(e.email)||(r.email="Email is invalid"):r.email="Email is required",r);if(Object.keys(o).length>0)return void a(o);s(!0);try{console.log("Submitting newsletter subscription:",{name:e.name,email:e.email});let t=await fetch("/api/subscribe-newsletter",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({name:e.name,email:e.email})}),r=await t.json();console.log("API response:",{status:t.status,data:r}),t.ok?setTimeout(()=>{n({name:"",email:""}),s(!1)},500):s(!1)}catch(e){console.error("Submission error:",e),s(!1)}};return(0,t.jsx)("div",{className:"text-white rounded-lg relative overflow-hidden",children:(0,t.jsxs)("div",{className:"relative z-0",children:[(0,t.jsx)("h3",{className:"text-2xl font-normal mb-4",children:"Sign up for our newsletter"}),(0,t.jsx)("p",{className:"text-gray-200 font-normal mb-6",children:"Stay connected. Get insights, trend reports, and event invites delivered to your inbox."}),(0,t.jsx)("form",{onSubmit:c,className:"space-y-4",children:(0,t.jsxs)("div",{className:"flex flex-col sm:flex-row gap-4",children:[(0,t.jsxs)("div",{className:"flex-1",children:[(0,t.jsx)("input",{type:"text",name:"name",value:e.name,onChange:l,placeholder:"Your Name",disabled:i,className:`w-full border-b border-gray-400 bg-transparent text-white placeholder-gray-400 focus:outline-none focus:border-white transition-colors duration-300 ${o.name?"border-red-500":""} ${i?"opacity-50":""}`,required:!0}),o.name&&(0,t.jsx)("p",{className:"text-red-500 text-sm mt-1",children:o.name})]}),(0,t.jsxs)("div",{className:"flex-1",children:[(0,t.jsx)("input",{type:"email",name:"email",value:e.email,onChange:l,placeholder:"yourmail@email.com",disabled:i,className:`w-full border-b border-gray-400 bg-transparent text-white placeholder-gray-400 focus:outline-none focus:border-white transition-colors duration-300 ${o.email?"border-red-500":""} ${i?"opacity-50":""}`,required:!0}),o.email&&(0,t.jsx)("p",{className:"text-red-500 text-sm mt-1",children:o.email})]}),(0,t.jsx)("button",{type:"submit",disabled:i,className:`bg-[#F25849] text-white px-8 py-3 rounded-full font-medium text-sm transition duration-300 ${i?"opacity-50 cursor-not-allowed":"hover:bg-[#D6473C]"}`,children:i?"Subscribing...":"Subscribe"})]})})]})})}])},84396,e=>{"use strict";var t=e.i(91398),r=e.i(58678),n=e.i(3828);e.s(["default",0,({title:e="Pan-African Agency Network (PAAN)",description:o="Discover the Pan-African Agency Network (PAAN), a dynamic alliance of creative and tech agencies across Africa and the diaspora. Join us to unlock global opportunities, access exclusive resources, and collaborate with top talent to redefine Africa's creative and technological footprint. Explore our membership tiers, services, and upcoming events today!",keywords:a="Pan-African Agency Network, PAAN, African agencies, creative network, tech network, collaboration, innovation, global influence",image:i="https://ik.imagekit.io/nkmvdjnna/PAAN/paan-logo.jpg?updatedAt=1757522406296",noindex:s=!1,imageWidth:l=1200,imageHeight:c=630,ogTitle:u,ogDescription:d,ogImage:f,twitterCard:p,twitterTitle:m,twitterDescription:g,twitterImage:y,canonicalUrl:h})=>{let b=(0,n.useRouter)(),v=h||`https://paan.africa${"/"===b.asPath?"":b.asPath.split("?")[0]}`;return(0,t.jsxs)(r.default,{children:[(0,t.jsx)("title",{children:e}),(0,t.jsx)("meta",{name:"description",content:o}),(0,t.jsx)("meta",{name:"keywords",content:a}),(0,t.jsx)("meta",{name:"author",content:"Pan-African Agency Network (PAAN)"}),(0,t.jsx)("meta",{name:"robots",content:s?"noindex":"index, follow"}),(0,t.jsx)("meta",{charSet:"UTF-8"})," ",(0,t.jsx)("meta",{name:"viewport",content:"width=device-width, initial-scale=1.0"}),(0,t.jsx)("link",{rel:"canonical",href:v}),(0,t.jsx)("meta",{property:"og:title",content:u||e}),(0,t.jsx)("meta",{property:"og:description",content:d||o}),(0,t.jsx)("meta",{property:"og:type",content:"website"}),(0,t.jsx)("meta",{property:"og:url",content:v}),(0,t.jsx)("meta",{property:"og:image",content:f||i}),(0,t.jsx)("meta",{property:"og:image:secure_url",content:f||i}),(0,t.jsx)("meta",{property:"og:image:width",content:l.toString()}),(0,t.jsx)("meta",{property:"og:image:height",content:c.toString()}),(0,t.jsx)("meta",{property:"og:image:alt",content:e}),(0,t.jsx)("meta",{property:"og:site_name",content:"Pan-African Agency Network (PAAN)"}),(0,t.jsx)("meta",{property:"og:locale",content:"en_US"}),(0,t.jsx)("meta",{property:"og:updated_time",content:new Date().toISOString()}),(0,t.jsx)("meta",{name:"twitter:card",content:p||"summary_large_image"}),(0,t.jsx)("meta",{name:"twitter:title",content:m||e}),(0,t.jsx)("meta",{name:"twitter:description",content:g||o}),(0,t.jsx)("meta",{name:"twitter:image",content:y||i}),(0,t.jsx)("meta",{name:"twitter:image:alt",content:e}),(0,t.jsx)("meta",{name:"twitter:site",content:"@paan_network"}),(0,t.jsx)("meta",{name:"twitter:creator",content:"@paan_network"}),(0,t.jsx)("meta",{name:"twitter:domain",content:"paan.africa"})]})}])}]);