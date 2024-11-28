"use strict";(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[110],{41071:(t,e,s)=>{function i(){return(i=Object.assign?Object.assign.bind():function(t){for(var e=1;e<arguments.length;e++){var s=arguments[e];for(var i in s)Object.prototype.hasOwnProperty.call(s,i)&&(t[i]=s[i])}return t}).apply(this,arguments)}function l(t,e,s){return Math.max(t,Math.min(e,s))}s.d(e,{A:()=>a});class r{advance(t){var e,s,i,r;if(!this.isRunning)return;let o=!1;if(this.lerp)this.value=(s=this.value,i=this.to,(1-(r=1-Math.exp(-60*this.lerp*t)))*s+r*i),Math.round(this.value)===this.to&&(this.value=this.to,o=!0);else{this.currentTime+=t;let e=l(0,this.currentTime/this.duration,1),s=(o=e>=1)?1:this.easing(e);this.value=this.from+(this.to-this.from)*s}null==(e=this.onUpdate)||e.call(this,this.value,o),o&&this.stop()}stop(){this.isRunning=!1}fromTo(t,e,{lerp:s=.1,duration:i=1,easing:l=t=>t,onStart:r,onUpdate:o}){this.from=this.value=t,this.to=e,this.lerp=s,this.duration=i,this.easing=l,this.currentTime=0,this.isRunning=!0,null==r||r(),this.onUpdate=o}}class o{constructor({wrapper:t,content:e,autoResize:s=!0}={}){if(this.resize=()=>{this.onWrapperResize(),this.onContentResize()},this.onWrapperResize=()=>{this.wrapper===window?(this.width=window.innerWidth,this.height=window.innerHeight):(this.width=this.wrapper.clientWidth,this.height=this.wrapper.clientHeight)},this.onContentResize=()=>{this.scrollHeight=this.content.scrollHeight,this.scrollWidth=this.content.scrollWidth},this.wrapper=t,this.content=e,s){let t=function(t,e){let s;return function(){let e=arguments,i=this;clearTimeout(s),s=setTimeout(function(){t.apply(i,e)},250)}}(this.resize);this.wrapper!==window&&(this.wrapperResizeObserver=new ResizeObserver(t),this.wrapperResizeObserver.observe(this.wrapper)),this.contentResizeObserver=new ResizeObserver(t),this.contentResizeObserver.observe(this.content)}this.resize()}destroy(){var t,e;null==(t=this.wrapperResizeObserver)||t.disconnect(),null==(e=this.contentResizeObserver)||e.disconnect()}get limit(){return{x:this.scrollWidth-this.width,y:this.scrollHeight-this.height}}}class n{constructor(){this.events={}}emit(t,...e){let s=this.events[t]||[];for(let t=0,i=s.length;t<i;t++)s[t](...e)}on(t,e){var s;return(null==(s=this.events[t])?void 0:s.push(e))||(this.events[t]=[e]),()=>{var s;this.events[t]=null==(s=this.events[t])?void 0:s.filter(t=>e!==t)}}off(t,e){var s;this.events[t]=null==(s=this.events[t])?void 0:s.filter(t=>e!==t)}destroy(){this.events={}}}class h{constructor(t,{wheelMultiplier:e=1,touchMultiplier:s=2,normalizeWheel:i=!1}){this.onTouchStart=t=>{let{clientX:e,clientY:s}=t.targetTouches?t.targetTouches[0]:t;this.touchStart.x=e,this.touchStart.y=s,this.lastDelta={x:0,y:0}},this.onTouchMove=t=>{let{clientX:e,clientY:s}=t.targetTouches?t.targetTouches[0]:t,i=-(e-this.touchStart.x)*this.touchMultiplier,l=-(s-this.touchStart.y)*this.touchMultiplier;this.touchStart.x=e,this.touchStart.y=s,this.lastDelta={x:i,y:l},this.emitter.emit("scroll",{deltaX:i,deltaY:l,event:t})},this.onTouchEnd=t=>{this.emitter.emit("scroll",{deltaX:this.lastDelta.x,deltaY:this.lastDelta.y,event:t})},this.onWheel=t=>{let{deltaX:e,deltaY:s}=t;this.normalizeWheel&&(e=l(-100,e,100),s=l(-100,s,100)),e*=this.wheelMultiplier,s*=this.wheelMultiplier,this.emitter.emit("scroll",{deltaX:e,deltaY:s,event:t})},this.element=t,this.wheelMultiplier=e,this.touchMultiplier=s,this.normalizeWheel=i,this.touchStart={x:null,y:null},this.emitter=new n,this.element.addEventListener("wheel",this.onWheel,{passive:!1}),this.element.addEventListener("touchstart",this.onTouchStart,{passive:!1}),this.element.addEventListener("touchmove",this.onTouchMove,{passive:!1}),this.element.addEventListener("touchend",this.onTouchEnd,{passive:!1})}on(t,e){return this.emitter.on(t,e)}destroy(){this.emitter.destroy(),this.element.removeEventListener("wheel",this.onWheel,{passive:!1}),this.element.removeEventListener("touchstart",this.onTouchStart,{passive:!1}),this.element.removeEventListener("touchmove",this.onTouchMove,{passive:!1}),this.element.removeEventListener("touchend",this.onTouchEnd,{passive:!1})}}class a{constructor({wrapper:t=window,content:e=document.documentElement,wheelEventsTarget:s=t,eventsTarget:l=s,smoothWheel:a=!0,smoothTouch:c=!1,syncTouch:d=!1,syncTouchLerp:u=.1,__iosNoInertiaSyncTouchLerp:m=.4,touchInertiaMultiplier:p=35,duration:v,easing:g=t=>Math.min(1,1.001-Math.pow(2,-10*t)),lerp:f=!v&&.1,infinite:S=!1,orientation:b="vertical",gestureOrientation:E="vertical",touchMultiplier:w=1,wheelMultiplier:I=1,normalizeWheel:O=!1,autoResize:_=!0}={}){this.onVirtualScroll=({deltaX:t,deltaY:e,event:s})=>{if(s.ctrlKey)return;let l=s.type.includes("touch"),r=s.type.includes("wheel");if("both"===this.options.gestureOrientation&&0===t&&0===e||"vertical"===this.options.gestureOrientation&&0===e||"horizontal"===this.options.gestureOrientation&&0===t||l&&"vertical"===this.options.gestureOrientation&&0===this.scroll&&!this.options.infinite&&e<=0)return;let o=s.composedPath();if((o=o.slice(0,o.indexOf(this.rootElement))).find(t=>{var e;return(null==t.hasAttribute?void 0:t.hasAttribute("data-lenis-prevent"))||l&&(null==t.hasAttribute?void 0:t.hasAttribute("data-lenis-prevent-touch"))||r&&(null==t.hasAttribute?void 0:t.hasAttribute("data-lenis-prevent-wheel"))||(null==(e=t.classList)?void 0:e.contains("lenis"))}))return;if(this.isStopped||this.isLocked)return void s.preventDefault();if(this.isSmooth=(this.options.smoothTouch||this.options.syncTouch)&&l||this.options.smoothWheel&&r,!this.isSmooth)return this.isScrolling=!1,void this.animate.stop();s.preventDefault();let n=e;"both"===this.options.gestureOrientation?n=Math.abs(e)>Math.abs(t)?e:t:"horizontal"===this.options.gestureOrientation&&(n=t);let h=l&&this.options.syncTouch,a=l&&"touchend"===s.type&&Math.abs(n)>1;a&&(n=this.velocity*this.options.touchInertiaMultiplier),this.scrollTo(this.targetScroll+n,i({programmatic:!1},h&&{lerp:a?this.syncTouchLerp:this.options.__iosNoInertiaSyncTouchLerp}))},this.onNativeScroll=()=>{if(!this.__preventNextScrollEvent&&!this.isScrolling){let t=this.animatedScroll;this.animatedScroll=this.targetScroll=this.actualScroll,this.velocity=0,this.direction=Math.sign(this.animatedScroll-t),this.emit()}},window.lenisVersion="1.0.29",t!==document.documentElement&&t!==document.body||(t=window),this.options={wrapper:t,content:e,wheelEventsTarget:s,eventsTarget:l,smoothWheel:a,smoothTouch:c,syncTouch:d,syncTouchLerp:u,__iosNoInertiaSyncTouchLerp:m,touchInertiaMultiplier:p,duration:v,easing:g,lerp:f,infinite:S,gestureOrientation:E,orientation:b,touchMultiplier:w,wheelMultiplier:I,normalizeWheel:O,autoResize:_},this.animate=new r,this.emitter=new n,this.dimensions=new o({wrapper:t,content:e,autoResize:_}),this.toggleClass("lenis",!0),this.velocity=0,this.isLocked=!1,this.isStopped=!1,this.isSmooth=d||a||c,this.isScrolling=!1,this.targetScroll=this.animatedScroll=this.actualScroll,this.options.wrapper.addEventListener("scroll",this.onNativeScroll,{passive:!1}),this.virtualScroll=new h(l,{touchMultiplier:w,wheelMultiplier:I,normalizeWheel:O}),this.virtualScroll.on("scroll",this.onVirtualScroll)}destroy(){this.emitter.destroy(),this.options.wrapper.removeEventListener("scroll",this.onNativeScroll,{passive:!1}),this.virtualScroll.destroy(),this.dimensions.destroy(),this.toggleClass("lenis",!1),this.toggleClass("lenis-smooth",!1),this.toggleClass("lenis-scrolling",!1),this.toggleClass("lenis-stopped",!1),this.toggleClass("lenis-locked",!1)}on(t,e){return this.emitter.on(t,e)}off(t,e){return this.emitter.off(t,e)}setScroll(t){this.isHorizontal?this.rootElement.scrollLeft=t:this.rootElement.scrollTop=t}resize(){this.dimensions.resize()}emit(){this.emitter.emit("scroll",this)}reset(){this.isLocked=!1,this.isScrolling=!1,this.animatedScroll=this.targetScroll=this.actualScroll,this.velocity=0,this.animate.stop()}start(){this.isStopped=!1,this.reset()}stop(){this.isStopped=!0,this.animate.stop(),this.reset()}raf(t){let e=t-(this.time||t);this.time=t,this.animate.advance(.001*e)}scrollTo(t,{offset:e=0,immediate:s=!1,lock:i=!1,duration:r=this.options.duration,easing:o=this.options.easing,lerp:n=!r&&this.options.lerp,onComplete:h=null,force:a=!1,programmatic:c=!0}={}){if(!this.isStopped&&!this.isLocked||a){if(["top","left","start"].includes(t))t=0;else if(["bottom","right","end"].includes(t))t=this.limit;else{var d;let s;if("string"==typeof t?s=document.querySelector(t):null!=(d=t)&&d.nodeType&&(s=t),s){if(this.options.wrapper!==window){let t=this.options.wrapper.getBoundingClientRect();e-=this.isHorizontal?t.left:t.top}let i=s.getBoundingClientRect();t=(this.isHorizontal?i.left:i.top)+this.animatedScroll}}if("number"==typeof t){if(t+=e,t=Math.round(t),this.options.infinite?c&&(this.targetScroll=this.animatedScroll=this.scroll):t=l(0,t,this.limit),s)return this.animatedScroll=this.targetScroll=t,this.setScroll(this.scroll),this.reset(),void(null==h||h(this));if(!c){if(t===this.targetScroll)return;this.targetScroll=t}this.animate.fromTo(this.animatedScroll,t,{duration:r,easing:o,lerp:n,onStart:()=>{i&&(this.isLocked=!0),this.isScrolling=!0},onUpdate:(t,e)=>{this.isScrolling=!0,this.velocity=t-this.animatedScroll,this.direction=Math.sign(this.velocity),this.animatedScroll=t,this.setScroll(this.scroll),c&&(this.targetScroll=t),e||this.emit(),e&&(this.reset(),this.emit(),null==h||h(this),this.__preventNextScrollEvent=!0,requestAnimationFrame(()=>{delete this.__preventNextScrollEvent}))}})}}}get rootElement(){return this.options.wrapper===window?document.documentElement:this.options.wrapper}get limit(){return this.dimensions.limit[this.isHorizontal?"x":"y"]}get isHorizontal(){return"horizontal"===this.options.orientation}get actualScroll(){return this.isHorizontal?this.rootElement.scrollLeft:this.rootElement.scrollTop}get scroll(){var t;return this.options.infinite?(this.animatedScroll%(t=this.limit)+t)%t:this.animatedScroll}get progress(){return 0===this.limit?1:this.scroll/this.limit}get isSmooth(){return this.__isSmooth}set isSmooth(t){this.__isSmooth!==t&&(this.__isSmooth=t,this.toggleClass("lenis-smooth",t))}get isScrolling(){return this.__isScrolling}set isScrolling(t){this.__isScrolling!==t&&(this.__isScrolling=t,this.toggleClass("lenis-scrolling",t))}get isStopped(){return this.__isStopped}set isStopped(t){this.__isStopped!==t&&(this.__isStopped=t,this.toggleClass("lenis-stopped",t))}get isLocked(){return this.__isLocked}set isLocked(t){this.__isLocked!==t&&(this.__isLocked=t,this.toggleClass("lenis-locked",t))}get className(){let t="lenis";return this.isStopped&&(t+=" lenis-stopped"),this.isLocked&&(t+=" lenis-locked"),this.isScrolling&&(t+=" lenis-scrolling"),this.isSmooth&&(t+=" lenis-smooth"),t}toggleClass(t,e){this.rootElement.classList.toggle(t,e),this.emitter.emit("className change",this)}}},69110:(t,e,s)=>{s.r(e),s.d(e,{default:()=>u});var i=s(41071);function l(){return(l=Object.assign?Object.assign.bind():function(t){for(var e=1;e<arguments.length;e++){var s=arguments[e];for(var i in s)Object.prototype.hasOwnProperty.call(s,i)&&(t[i]=s[i])}return t}).apply(this,arguments)}class r{constructor({scrollElements:t,rootMargin:e="-1px -1px -1px -1px",IORaf:s}){this.scrollElements=void 0,this.rootMargin=void 0,this.IORaf=void 0,this.observer=void 0,this.scrollElements=t,this.rootMargin=e,this.IORaf=s,this._init()}_init(){for(let t of(this.observer=new IntersectionObserver(t=>{t.forEach(t=>{let e=this.scrollElements.find(e=>e.$el===t.target);t.isIntersecting?(e&&(e.isAlreadyIntersected=!0),this._setInview(t)):e&&e.isAlreadyIntersected&&this._setOutOfView(t)})},{rootMargin:this.rootMargin}),this.scrollElements))this.observe(t.$el)}destroy(){this.observer.disconnect()}observe(t){t&&this.observer.observe(t)}unobserve(t){t&&this.observer.unobserve(t)}_setInview(t){let e=this.scrollElements.find(e=>e.$el===t.target);this.IORaf&&(null==e||e.setInteractivityOn()),this.IORaf||null==e||e.setInview()}_setOutOfView(t){let e=this.scrollElements.find(e=>e.$el===t.target);this.IORaf&&(null==e||e.setInteractivityOff()),this.IORaf||null==e||e.setOutOfView(),null!=e&&e.attributes.scrollRepeat||this.IORaf||this.unobserve(t.target)}}function o(t,e){return t.reduce((t,s)=>Math.abs(s-e)<Math.abs(t-e)?s:t)}class n{constructor({$el:t,id:e,modularInstance:s,subscribeElementUpdateFn:i,unsubscribeElementUpdateFn:l,needRaf:r,scrollOrientation:o}){var n,h,a,c,d;this.$el=void 0,this.id=void 0,this.needRaf=void 0,this.attributes=void 0,this.scrollOrientation=void 0,this.isAlreadyIntersected=void 0,this.intersection=void 0,this.metrics=void 0,this.currentScroll=void 0,this.translateValue=void 0,this.progress=void 0,this.lastProgress=void 0,this.modularInstance=void 0,this.progressModularModules=void 0,this.isInview=void 0,this.isInteractive=void 0,this.isInFold=void 0,this.isFirstResize=void 0,this.subscribeElementUpdateFn=void 0,this.unsubscribeElementUpdateFn=void 0,this.$el=t,this.id=e,this.needRaf=r,this.scrollOrientation=o,this.modularInstance=s,this.subscribeElementUpdateFn=i,this.unsubscribeElementUpdateFn=l,this.attributes={scrollClass:null!=(n=this.$el.dataset.scrollClass)?n:"is-inview",scrollOffset:null!=(h=this.$el.dataset.scrollOffset)?h:"0,0",scrollPosition:null!=(a=this.$el.dataset.scrollPosition)?a:"start,end",scrollModuleProgress:null!=this.$el.dataset.scrollModuleProgress,scrollCssProgress:null!=this.$el.dataset.scrollCssProgress,scrollEventProgress:null!=(c=this.$el.dataset.scrollEventProgress)?c:null,scrollSpeed:null!=this.$el.dataset.scrollSpeed?parseFloat(this.$el.dataset.scrollSpeed):null,scrollRepeat:null!=this.$el.dataset.scrollRepeat,scrollCall:null!=(d=this.$el.dataset.scrollCall)?d:null,scrollCallSelf:null!=this.$el.dataset.scrollCallSelf,scrollIgnoreFold:null!=this.$el.dataset.scrollIgnoreFold,scrollEnableTouchSpeed:null!=this.$el.dataset.scrollEnableTouchSpeed},this.intersection={start:0,end:0},this.metrics={offsetStart:0,offsetEnd:0,bcr:{}},this.currentScroll="vertical"===this.scrollOrientation?window.scrollY:window.scrollX,this.translateValue=0,this.progress=0,this.lastProgress=null,this.progressModularModules=[],this.isInview=!1,this.isInteractive=!1,this.isAlreadyIntersected=!1,this.isInFold=!1,this.isFirstResize=!0,this._init()}_init(){this.needRaf&&(this.modularInstance&&this.attributes.scrollModuleProgress&&this._getProgressModularModules(),this._resize())}onResize({currentScroll:t}){this.currentScroll=t,this._resize()}onRender({currentScroll:t,smooth:e}){let s="vertical"===this.scrollOrientation?window.innerHeight:window.innerWidth;if(this.currentScroll=t,this._computeProgress(),this.attributes.scrollSpeed&&!isNaN(this.attributes.scrollSpeed)){if(this.attributes.scrollEnableTouchSpeed||e){if(this.isInFold){let t=Math.max(0,this.progress);this.translateValue=-(t*s*this.attributes.scrollSpeed*1)}else{let t=-1+((this.progress-0)/1*2||0);this.translateValue=-(t*s*this.attributes.scrollSpeed*1)}this.$el.style.transform="vertical"===this.scrollOrientation?`translate3d(0, ${this.translateValue}px, 0)`:`translate3d(${this.translateValue}px, 0, 0)`}else this.translateValue&&(this.$el.style.transform="translate3d(0, 0, 0)"),this.translateValue=0}}setInview(){if(this.isInview)return;this.isInview=!0,this.$el.classList.add(this.attributes.scrollClass);let t=this._getScrollCallFrom();this.attributes.scrollCall&&this._dispatchCall("enter",t)}setOutOfView(){if(!this.isInview||!this.attributes.scrollRepeat)return;this.isInview=!1,this.$el.classList.remove(this.attributes.scrollClass);let t=this._getScrollCallFrom();this.attributes.scrollCall&&this._dispatchCall("leave",t)}setInteractivityOn(){this.isInteractive||(this.isInteractive=!0,this.subscribeElementUpdateFn(this))}setInteractivityOff(){this.isInteractive&&(this.isInteractive=!1,this.unsubscribeElementUpdateFn(this),null!=this.lastProgress&&this._computeProgress(o([0,1],this.lastProgress)))}_resize(){this.metrics.bcr=this.$el.getBoundingClientRect(),this._computeMetrics(),this._computeIntersection(),this.isFirstResize&&(this.isFirstResize=!1,this.isInFold&&this.setInview())}_computeMetrics(){let{top:t,left:e,height:s,width:i}=this.metrics.bcr,l="vertical"===this.scrollOrientation?window.innerHeight:window.innerWidth,r="vertical"===this.scrollOrientation?s:i;this.metrics.offsetStart=this.currentScroll+("vertical"===this.scrollOrientation?t:e)-this.translateValue,this.metrics.offsetEnd=this.metrics.offsetStart+r,this.isInFold=this.metrics.offsetStart<l&&!this.attributes.scrollIgnoreFold}_computeIntersection(){let t="vertical"===this.scrollOrientation?window.innerHeight:window.innerWidth,e="vertical"===this.scrollOrientation?this.metrics.bcr.height:this.metrics.bcr.width,s=this.attributes.scrollOffset.split(","),i=null!=s[0]?s[0].trim():"0",l=null!=s[1]?s[1].trim():"0",r=this.attributes.scrollPosition.split(","),o=null!=r[0]?r[0].trim():"start",n=null!=r[1]?r[1].trim():"end",h=i.includes("%")?t*parseInt(i.replace("%","").trim())*.01:parseInt(i),a=l.includes("%")?t*parseInt(l.replace("%","").trim())*.01:parseInt(l);switch(this.isInFold&&(o="fold"),o){case"start":default:this.intersection.start=this.metrics.offsetStart-t+h;break;case"middle":this.intersection.start=this.metrics.offsetStart-t+h+.5*e;break;case"end":this.intersection.start=this.metrics.offsetStart-t+h+e;break;case"fold":this.intersection.start=0}switch(n){case"start":this.intersection.end=this.metrics.offsetStart-a;break;case"middle":this.intersection.end=this.metrics.offsetStart-a+.5*e;break;default:this.intersection.end=this.metrics.offsetStart-a+e}if(this.intersection.end<=this.intersection.start)switch(n){case"start":default:this.intersection.end=this.intersection.start+1;break;case"middle":this.intersection.end=this.intersection.start+.5*e;break;case"end":this.intersection.end=this.intersection.start+e}}_computeProgress(t){var e,s,i;let l=null!=t?t:(s=this.intersection.start,i=this.intersection.end,(e=0+((this.currentScroll-s)/(i-s)*1||0))<0)?0:e>1?1:e;if(this.progress=l,l!=this.lastProgress){if(this.lastProgress=l,this.attributes.scrollCssProgress&&this._setCssProgress(l),this.attributes.scrollEventProgress&&this._setCustomEventProgress(l),this.attributes.scrollModuleProgress)for(let t of this.progressModularModules)this.modularInstance&&this.modularInstance.call("onScrollProgress",l,t.moduleName,t.moduleId);l>0&&l<1&&this.setInview(),0===l&&this.setOutOfView(),1===l&&this.setOutOfView()}}_setCssProgress(t=0){this.$el.style.setProperty("--progress",t.toString())}_setCustomEventProgress(t=0){let e=this.attributes.scrollEventProgress;if(!e)return;let s=new CustomEvent(e,{detail:{target:this.$el,progress:t}});window.dispatchEvent(s)}_getProgressModularModules(){if(!this.modularInstance)return;let t=Object.keys(this.$el.dataset).filter(t=>t.includes("module")),e=Object.entries(this.modularInstance.modules);if(t.length)for(let s of t){let t=this.$el.dataset[s];if(!t)return;for(let s of e){let[e,i]=s;t in i&&this.progressModularModules.push({moduleName:e,moduleId:t})}}}_getScrollCallFrom(){let t=o([this.intersection.start,this.intersection.end],this.currentScroll);return this.intersection.start===t?"start":"end"}_dispatchCall(t,e){var s,i;let l=null==(s=this.attributes.scrollCall)?void 0:s.split(","),r=null==(i=this.attributes)?void 0:i.scrollCallSelf;if(l&&l.length>1){let s;let[i,o,n]=l;s=r?this.$el.dataset[`module${o.trim()}`]:n,this.modularInstance&&this.modularInstance.call(i.trim(),{target:this.$el,way:t,from:e},o.trim(),null==s?void 0:s.trim())}else if(l){let[s]=l,i=new CustomEvent(s,{detail:{target:this.$el,way:t,from:e}});window.dispatchEvent(i)}}}let h=["scrollOffset","scrollPosition","scrollModuleProgress","scrollCssProgress","scrollEventProgress","scrollSpeed"];class a{constructor({$el:t,modularInstance:e,triggerRootMargin:s,rafRootMargin:i,scrollOrientation:l}){this.$scrollContainer=void 0,this.modularInstance=void 0,this.triggerRootMargin=void 0,this.rafRootMargin=void 0,this.scrollElements=void 0,this.triggeredScrollElements=void 0,this.RAFScrollElements=void 0,this.scrollElementsToUpdate=void 0,this.IOTriggerInstance=void 0,this.IORafInstance=void 0,this.scrollOrientation=void 0,t?(this.$scrollContainer=t,this.modularInstance=e,this.scrollOrientation=l,this.triggerRootMargin=null!=s?s:"-1px -1px -1px -1px",this.rafRootMargin=null!=i?i:"100% 100% 100% 100%",this.scrollElements=[],this.triggeredScrollElements=[],this.RAFScrollElements=[],this.scrollElementsToUpdate=[],this._init()):console.error("Please provide a DOM Element as scrollContainer")}_init(){let t=Array.from(this.$scrollContainer.querySelectorAll("[data-scroll]"));this._subscribeScrollElements(t),this.IOTriggerInstance=new r({scrollElements:[...this.triggeredScrollElements],rootMargin:this.triggerRootMargin,IORaf:!1}),this.IORafInstance=new r({scrollElements:[...this.RAFScrollElements],rootMargin:this.rafRootMargin,IORaf:!0})}destroy(){this.IOTriggerInstance.destroy(),this.IORafInstance.destroy(),this._unsubscribeAllScrollElements()}onResize({currentScroll:t}){for(let e of this.RAFScrollElements)e.onResize({currentScroll:t})}onRender({currentScroll:t,smooth:e}){for(let s of this.scrollElementsToUpdate)s.onRender({currentScroll:t,smooth:e})}removeScrollElements(t){let e=t.querySelectorAll("[data-scroll]");if(e.length){for(let t=0;t<this.triggeredScrollElements.length;t++){let s=this.triggeredScrollElements[t];Array.from(e).indexOf(s.$el)>-1&&(this.IOTriggerInstance.unobserve(s.$el),this.triggeredScrollElements.splice(t,1))}for(let t=0;t<this.RAFScrollElements.length;t++){let s=this.RAFScrollElements[t];Array.from(e).indexOf(s.$el)>-1&&(this.IORafInstance.unobserve(s.$el),this.RAFScrollElements.splice(t,1))}e.forEach(t=>{let e=this.scrollElementsToUpdate.find(e=>e.$el===t),s=this.scrollElements.find(e=>e.$el===t);e&&this._unsubscribeElementUpdate(e),s&&(this.scrollElements=this.scrollElements.filter(t=>t.id!=s.id))})}}addScrollElements(t){let e=t.querySelectorAll("[data-scroll]"),s=[];this.scrollElements.forEach(t=>{s.push(t.id)});let i=Math.max(...s)+1,l=Array.from(e);this._subscribeScrollElements(l,i,!0)}_subscribeScrollElements(t,e=0,s=!1){for(let i=0;i<t.length;i++){let l=t[i],r=this._checkRafNeeded(l),o=new n({$el:l,id:e+i,scrollOrientation:this.scrollOrientation,modularInstance:this.modularInstance,subscribeElementUpdateFn:this._subscribeElementUpdate.bind(this),unsubscribeElementUpdateFn:this._unsubscribeElementUpdate.bind(this),needRaf:r});this.scrollElements.push(o),r?(this.RAFScrollElements.push(o),s&&(this.IORafInstance.scrollElements.push(o),this.IORafInstance.observe(o.$el))):(this.triggeredScrollElements.push(o),s&&(this.IOTriggerInstance.scrollElements.push(o),this.IOTriggerInstance.observe(o.$el)))}}_unsubscribeAllScrollElements(){this.scrollElements=[],this.RAFScrollElements=[],this.triggeredScrollElements=[],this.scrollElementsToUpdate=[]}_subscribeElementUpdate(t){this.scrollElementsToUpdate.push(t)}_unsubscribeElementUpdate(t){this.scrollElementsToUpdate=this.scrollElementsToUpdate.filter(e=>e.id!=t.id)}_checkRafNeeded(t){let e=[...h],s=t=>{e=e.filter(e=>e!=t)};if(t.dataset.scrollOffset){if("0,0"!=t.dataset.scrollOffset.split(",").map(t=>t.replace("%","").trim()).join(","))return!0;s("scrollOffset")}else s("scrollOffset");if(t.dataset.scrollPosition){if("top,bottom"!=t.dataset.scrollPosition.trim())return!0;s("scrollPosition")}else s("scrollPosition");if(t.dataset.scrollSpeed&&!isNaN(parseFloat(t.dataset.scrollSpeed)))return!0;for(let i of(s("scrollSpeed"),e))if(i in t.dataset)return!0;return!1}}class c{constructor({resizeElements:t,resizeCallback:e=()=>{}}){this.$resizeElements=void 0,this.isFirstObserve=void 0,this.observer=void 0,this.resizeCallback=void 0,this.$resizeElements=t,this.resizeCallback=e,this.isFirstObserve=!0,this._init()}_init(){for(let t of(this.observer=new ResizeObserver(t=>{var e;this.isFirstObserve||null==(e=this.resizeCallback)||e.call(this),this.isFirstObserve=!1}),this.$resizeElements))this.observer.observe(t)}destroy(){this.observer.disconnect()}}let d={wrapper:window,content:document.documentElement,eventsTarget:window,lerp:.1,duration:.75,orientation:"vertical",gestureOrientation:"vertical",smoothWheel:!0,smoothTouch:!1,syncTouch:!1,syncTouchLerp:.1,touchInertiaMultiplier:35,wheelMultiplier:1,touchMultiplier:2,normalizeWheel:!1,autoResize:!0,easing:t=>Math.min(1,1.001-Math.pow(2,-10*t))};class u{constructor({lenisOptions:t={},modularInstance:e,triggerRootMargin:s,rafRootMargin:i,autoResize:r=!0,autoStart:o=!0,scrollCallback:n=()=>{},initCustomTicker:h,destroyCustomTicker:a}={}){this.rafPlaying=void 0,this.lenisInstance=void 0,this.coreInstance=void 0,this.lenisOptions=void 0,this.modularInstance=void 0,this.triggerRootMargin=void 0,this.rafRootMargin=void 0,this.rafInstance=void 0,this.autoResize=void 0,this.autoStart=void 0,this.ROInstance=void 0,this.initCustomTicker=void 0,this.destroyCustomTicker=void 0,this._onRenderBind=void 0,this._onResizeBind=void 0,this._onScrollToBind=void 0,this.lenisOptions=l({},d,t),Object.assign(this,{lenisOptions:t,modularInstance:e,triggerRootMargin:s,rafRootMargin:i,autoResize:r,autoStart:o,scrollCallback:n,initCustomTicker:h,destroyCustomTicker:a}),this._onRenderBind=this._onRender.bind(this),this._onScrollToBind=this._onScrollTo.bind(this),this._onResizeBind=this._onResize.bind(this),this.rafPlaying=!1,this._init()}_init(){var t;this.lenisInstance=new i.A({wrapper:this.lenisOptions.wrapper,content:this.lenisOptions.content,eventsTarget:this.lenisOptions.eventsTarget,lerp:this.lenisOptions.lerp,duration:this.lenisOptions.duration,orientation:this.lenisOptions.orientation,gestureOrientation:this.lenisOptions.gestureOrientation,smoothWheel:this.lenisOptions.smoothWheel,smoothTouch:this.lenisOptions.smoothTouch,syncTouch:this.lenisOptions.syncTouch,syncTouchLerp:this.lenisOptions.syncTouchLerp,touchInertiaMultiplier:this.lenisOptions.touchInertiaMultiplier,wheelMultiplier:this.lenisOptions.wheelMultiplier,touchMultiplier:this.lenisOptions.touchMultiplier,normalizeWheel:this.lenisOptions.normalizeWheel,easing:this.lenisOptions.easing}),null==(t=this.lenisInstance)||t.on("scroll",this.scrollCallback),document.documentElement.setAttribute("data-scroll-orientation",this.lenisInstance.options.orientation),requestAnimationFrame(()=>{this.coreInstance=new a({$el:this.lenisInstance.rootElement,modularInstance:this.modularInstance,triggerRootMargin:this.triggerRootMargin,rafRootMargin:this.rafRootMargin,scrollOrientation:this.lenisInstance.options.orientation}),this._bindEvents(),this.initCustomTicker&&!this.destroyCustomTicker?console.warn("initCustomTicker callback is declared, but destroyCustomTicker is not. Please pay attention. It could cause trouble."):!this.initCustomTicker&&this.destroyCustomTicker&&console.warn("destroyCustomTicker callback is declared, but initCustomTicker is not. Please pay attention. It could cause trouble."),this.autoStart&&this.start()})}destroy(){var t;this.stop(),this._unbindEvents(),this.lenisInstance.destroy(),null==(t=this.coreInstance)||t.destroy(),requestAnimationFrame(()=>{var t;null==(t=this.coreInstance)||t.destroy()})}_bindEvents(){this._bindScrollToEvents(),this.autoResize&&("ResizeObserver"in window?this.ROInstance=new c({resizeElements:[document.body],resizeCallback:this._onResizeBind}):window.addEventListener("resize",this._onResizeBind))}_unbindEvents(){this._unbindScrollToEvents(),this.autoResize&&("ResizeObserver"in window?this.ROInstance&&this.ROInstance.destroy():window.removeEventListener("resize",this._onResizeBind))}_bindScrollToEvents(t){let e=t||this.lenisInstance.rootElement,s=null==e?void 0:e.querySelectorAll("[data-scroll-to]");(null==s?void 0:s.length)&&s.forEach(t=>{t.addEventListener("click",this._onScrollToBind,!1)})}_unbindScrollToEvents(t){let e=t||this.lenisInstance.rootElement,s=null==e?void 0:e.querySelectorAll("[data-scroll-to]");(null==s?void 0:s.length)&&s.forEach(t=>{t.removeEventListener("click",this._onScrollToBind,!1)})}_onResize(){requestAnimationFrame(()=>{var t;null==(t=this.coreInstance)||t.onResize({currentScroll:this.lenisInstance.scroll})})}_onRender(){var t,e;null==(t=this.lenisInstance)||t.raf(Date.now()),null==(e=this.coreInstance)||e.onRender({currentScroll:this.lenisInstance.scroll,smooth:this.lenisInstance.isSmooth})}_onScrollTo(t){var e;t.preventDefault();let s=null!=(e=t.currentTarget)?e:null;if(!s)return;let i=s.getAttribute("data-scroll-to-href")||s.getAttribute("href"),l=s.getAttribute("data-scroll-to-offset")||0,r=s.getAttribute("data-scroll-to-duration")||this.lenisOptions.duration||d.duration;i&&this.scrollTo(i,{offset:"string"==typeof l?parseInt(l):l,duration:"string"==typeof r?parseInt(r):r})}start(){var t;this.rafPlaying||(null==(t=this.lenisInstance)||t.start(),this.rafPlaying=!0,this.initCustomTicker?this.initCustomTicker(this._onRenderBind):this._raf())}stop(){var t;this.rafPlaying&&(null==(t=this.lenisInstance)||t.stop(),this.rafPlaying=!1,this.destroyCustomTicker?this.destroyCustomTicker(this._onRenderBind):this.rafInstance&&cancelAnimationFrame(this.rafInstance))}removeScrollElements(t){var e;t?(this._unbindScrollToEvents(t),null==(e=this.coreInstance)||e.removeScrollElements(t)):console.error("Please provide a DOM Element as $oldContainer")}addScrollElements(t){var e;t?(null==(e=this.coreInstance)||e.addScrollElements(t),requestAnimationFrame(()=>{this._bindScrollToEvents(t)})):console.error("Please provide a DOM Element as $newContainer")}resize(){this._onResizeBind()}scrollTo(t,e){var s;null==(s=this.lenisInstance)||s.scrollTo(t,{offset:null==e?void 0:e.offset,lerp:null==e?void 0:e.lerp,duration:null==e?void 0:e.duration,immediate:null==e?void 0:e.immediate,lock:null==e?void 0:e.lock,force:null==e?void 0:e.force,easing:null==e?void 0:e.easing,onComplete:null==e?void 0:e.onComplete})}_raf(){this._onRenderBind(),this.rafInstance=requestAnimationFrame(()=>this._raf())}}}}]);