import{q as T,s as z,d as O,x as Y,y as X,o as U,e as H,a as m,z as x,f as Z,t as I,n as q,b as J,u as j}from"./app-58547c80.js";/*!
 * qrcode.vue v3.4.1
 * A Vue.js component to generate QRCode.
 * © 2017-2023 @scopewu(https://github.com/scopewu)
 * MIT License.
 */var y=function(){return y=Object.assign||function(h){for(var u,l=1,c=arguments.length;l<c;l++){u=arguments[l];for(var d in u)Object.prototype.hasOwnProperty.call(u,d)&&(h[d]=u[d])}return h},y.apply(this,arguments)};var N;(function(i){var h=function(){function n(e,t,r,o){if(this.version=e,this.errorCorrectionLevel=t,this.modules=[],this.isFunction=[],e<n.MIN_VERSION||e>n.MAX_VERSION)throw new RangeError("Version value out of range");if(o<-1||o>7)throw new RangeError("Mask value out of range");this.size=e*4+17;for(var a=[],s=0;s<this.size;s++)a.push(!1);for(var s=0;s<this.size;s++)this.modules.push(a.slice()),this.isFunction.push(a.slice());this.drawFunctionPatterns();var f=this.addEccAndInterleave(r);if(this.drawCodewords(f),o==-1)for(var v=1e9,s=0;s<8;s++){this.applyMask(s),this.drawFormatBits(s);var E=this.getPenaltyScore();E<v&&(o=s,v=E),this.applyMask(s)}c(0<=o&&o<=7),this.mask=o,this.applyMask(o),this.drawFormatBits(o),this.isFunction=[]}return n.encodeText=function(e,t){var r=i.QrSegment.makeSegments(e);return n.encodeSegments(r,t)},n.encodeBinary=function(e,t){var r=i.QrSegment.makeBytes(e);return n.encodeSegments([r],t)},n.encodeSegments=function(e,t,r,o,a,s){if(r===void 0&&(r=1),o===void 0&&(o=40),a===void 0&&(a=-1),s===void 0&&(s=!0),!(n.MIN_VERSION<=r&&r<=o&&o<=n.MAX_VERSION)||a<-1||a>7)throw new RangeError("Invalid value");var f,v;for(f=r;;f++){var E=n.getNumDataCodewords(f,t)*8,C=d.getTotalBits(e,f);if(C<=E){v=C;break}if(f>=o)throw new RangeError("Data too long")}for(var w=0,p=[n.Ecc.MEDIUM,n.Ecc.QUARTILE,n.Ecc.HIGH];w<p.length;w++){var M=p[w];s&&v<=n.getNumDataCodewords(f,M)*8&&(t=M)}for(var g=[],R=0,S=e;R<S.length;R++){var A=S[R];u(A.mode.modeBits,4,g),u(A.numChars,A.mode.numCharCountBits(f),g);for(var b=0,_=A.getData();b<_.length;b++){var $=_[b];g.push($)}}c(g.length==v);var L=n.getNumDataCodewords(f,t)*8;c(g.length<=L),u(0,Math.min(4,L-g.length),g),u(0,(8-g.length%8)%8,g),c(g.length%8==0);for(var Q=236;g.length<L;Q^=253)u(Q,8,g);for(var B=[];B.length*8<g.length;)B.push(0);return g.forEach(function(W,k){return B[k>>>3]|=W<<7-(k&7)}),new n(f,t,B,a)},n.prototype.getModule=function(e,t){return 0<=e&&e<this.size&&0<=t&&t<this.size&&this.modules[t][e]},n.prototype.getModules=function(){return this.modules},n.prototype.drawFunctionPatterns=function(){for(var e=0;e<this.size;e++)this.setFunctionModule(6,e,e%2==0),this.setFunctionModule(e,6,e%2==0);this.drawFinderPattern(3,3),this.drawFinderPattern(this.size-4,3),this.drawFinderPattern(3,this.size-4);for(var t=this.getAlignmentPatternPositions(),r=t.length,e=0;e<r;e++)for(var o=0;o<r;o++)e==0&&o==0||e==0&&o==r-1||e==r-1&&o==0||this.drawAlignmentPattern(t[e],t[o]);this.drawFormatBits(0),this.drawVersion()},n.prototype.drawFormatBits=function(e){for(var t=this.errorCorrectionLevel.formatBits<<3|e,r=t,o=0;o<10;o++)r=r<<1^(r>>>9)*1335;var a=(t<<10|r)^21522;c(a>>>15==0);for(var o=0;o<=5;o++)this.setFunctionModule(8,o,l(a,o));this.setFunctionModule(8,7,l(a,6)),this.setFunctionModule(8,8,l(a,7)),this.setFunctionModule(7,8,l(a,8));for(var o=9;o<15;o++)this.setFunctionModule(14-o,8,l(a,o));for(var o=0;o<8;o++)this.setFunctionModule(this.size-1-o,8,l(a,o));for(var o=8;o<15;o++)this.setFunctionModule(8,this.size-15+o,l(a,o));this.setFunctionModule(8,this.size-8,!0)},n.prototype.drawVersion=function(){if(!(this.version<7)){for(var e=this.version,t=0;t<12;t++)e=e<<1^(e>>>11)*7973;var r=this.version<<12|e;c(r>>>18==0);for(var t=0;t<18;t++){var o=l(r,t),a=this.size-11+t%3,s=Math.floor(t/3);this.setFunctionModule(a,s,o),this.setFunctionModule(s,a,o)}}},n.prototype.drawFinderPattern=function(e,t){for(var r=-4;r<=4;r++)for(var o=-4;o<=4;o++){var a=Math.max(Math.abs(o),Math.abs(r)),s=e+o,f=t+r;0<=s&&s<this.size&&0<=f&&f<this.size&&this.setFunctionModule(s,f,a!=2&&a!=4)}},n.prototype.drawAlignmentPattern=function(e,t){for(var r=-2;r<=2;r++)for(var o=-2;o<=2;o++)this.setFunctionModule(e+o,t+r,Math.max(Math.abs(o),Math.abs(r))!=1)},n.prototype.setFunctionModule=function(e,t,r){this.modules[t][e]=r,this.isFunction[t][e]=!0},n.prototype.addEccAndInterleave=function(e){var t=this.version,r=this.errorCorrectionLevel;if(e.length!=n.getNumDataCodewords(t,r))throw new RangeError("Invalid argument");for(var o=n.NUM_ERROR_CORRECTION_BLOCKS[r.ordinal][t],a=n.ECC_CODEWORDS_PER_BLOCK[r.ordinal][t],s=Math.floor(n.getNumRawDataModules(t)/8),f=o-s%o,v=Math.floor(s/o),E=[],C=n.reedSolomonComputeDivisor(a),w=0,p=0;w<o;w++){var M=e.slice(p,p+v-a+(w<f?0:1));p+=M.length;var g=n.reedSolomonComputeRemainder(M,C);w<f&&M.push(0),E.push(M.concat(g))}for(var R=[],S=function(A){E.forEach(function(b,_){(A!=v-a||_>=f)&&R.push(b[A])})},w=0;w<E[0].length;w++)S(w);return c(R.length==s),R},n.prototype.drawCodewords=function(e){if(e.length!=Math.floor(n.getNumRawDataModules(this.version)/8))throw new RangeError("Invalid argument");for(var t=0,r=this.size-1;r>=1;r-=2){r==6&&(r=5);for(var o=0;o<this.size;o++)for(var a=0;a<2;a++){var s=r-a,f=(r+1&2)==0,v=f?this.size-1-o:o;!this.isFunction[v][s]&&t<e.length*8&&(this.modules[v][s]=l(e[t>>>3],7-(t&7)),t++)}}c(t==e.length*8)},n.prototype.applyMask=function(e){if(e<0||e>7)throw new RangeError("Mask value out of range");for(var t=0;t<this.size;t++)for(var r=0;r<this.size;r++){var o=void 0;switch(e){case 0:o=(r+t)%2==0;break;case 1:o=t%2==0;break;case 2:o=r%3==0;break;case 3:o=(r+t)%3==0;break;case 4:o=(Math.floor(r/3)+Math.floor(t/2))%2==0;break;case 5:o=r*t%2+r*t%3==0;break;case 6:o=(r*t%2+r*t%3)%2==0;break;case 7:o=((r+t)%2+r*t%3)%2==0;break;default:throw new Error("Unreachable")}!this.isFunction[t][r]&&o&&(this.modules[t][r]=!this.modules[t][r])}},n.prototype.getPenaltyScore=function(){for(var e=0,t=0;t<this.size;t++){for(var r=!1,o=0,a=[0,0,0,0,0,0,0],s=0;s<this.size;s++)this.modules[t][s]==r?(o++,o==5?e+=n.PENALTY_N1:o>5&&e++):(this.finderPenaltyAddHistory(o,a),r||(e+=this.finderPenaltyCountPatterns(a)*n.PENALTY_N3),r=this.modules[t][s],o=1);e+=this.finderPenaltyTerminateAndCount(r,o,a)*n.PENALTY_N3}for(var s=0;s<this.size;s++){for(var r=!1,f=0,a=[0,0,0,0,0,0,0],t=0;t<this.size;t++)this.modules[t][s]==r?(f++,f==5?e+=n.PENALTY_N1:f>5&&e++):(this.finderPenaltyAddHistory(f,a),r||(e+=this.finderPenaltyCountPatterns(a)*n.PENALTY_N3),r=this.modules[t][s],f=1);e+=this.finderPenaltyTerminateAndCount(r,f,a)*n.PENALTY_N3}for(var t=0;t<this.size-1;t++)for(var s=0;s<this.size-1;s++){var v=this.modules[t][s];v==this.modules[t][s+1]&&v==this.modules[t+1][s]&&v==this.modules[t+1][s+1]&&(e+=n.PENALTY_N2)}for(var E=0,C=0,w=this.modules;C<w.length;C++){var p=w[C];E=p.reduce(function(R,S){return R+(S?1:0)},E)}var M=this.size*this.size,g=Math.ceil(Math.abs(E*20-M*10)/M)-1;return c(0<=g&&g<=9),e+=g*n.PENALTY_N4,c(0<=e&&e<=2568888),e},n.prototype.getAlignmentPatternPositions=function(){if(this.version==1)return[];for(var e=Math.floor(this.version/7)+2,t=this.version==32?26:Math.ceil((this.version*4+4)/(e*2-2))*2,r=[6],o=this.size-7;r.length<e;o-=t)r.splice(1,0,o);return r},n.getNumRawDataModules=function(e){if(e<n.MIN_VERSION||e>n.MAX_VERSION)throw new RangeError("Version number out of range");var t=(16*e+128)*e+64;if(e>=2){var r=Math.floor(e/7)+2;t-=(25*r-10)*r-55,e>=7&&(t-=36)}return c(208<=t&&t<=29648),t},n.getNumDataCodewords=function(e,t){return Math.floor(n.getNumRawDataModules(e)/8)-n.ECC_CODEWORDS_PER_BLOCK[t.ordinal][e]*n.NUM_ERROR_CORRECTION_BLOCKS[t.ordinal][e]},n.reedSolomonComputeDivisor=function(e){if(e<1||e>255)throw new RangeError("Degree out of range");for(var t=[],r=0;r<e-1;r++)t.push(0);t.push(1);for(var o=1,r=0;r<e;r++){for(var a=0;a<t.length;a++)t[a]=n.reedSolomonMultiply(t[a],o),a+1<t.length&&(t[a]^=t[a+1]);o=n.reedSolomonMultiply(o,2)}return t},n.reedSolomonComputeRemainder=function(e,t){for(var r=t.map(function(v){return 0}),o=function(v){var E=v^r.shift();r.push(0),t.forEach(function(C,w){return r[w]^=n.reedSolomonMultiply(C,E)})},a=0,s=e;a<s.length;a++){var f=s[a];o(f)}return r},n.reedSolomonMultiply=function(e,t){if(e>>>8||t>>>8)throw new RangeError("Byte out of range");for(var r=0,o=7;o>=0;o--)r=r<<1^(r>>>7)*285,r^=(t>>>o&1)*e;return c(r>>>8==0),r},n.prototype.finderPenaltyCountPatterns=function(e){var t=e[1];c(t<=this.size*3);var r=t>0&&e[2]==t&&e[3]==t*3&&e[4]==t&&e[5]==t;return(r&&e[0]>=t*4&&e[6]>=t?1:0)+(r&&e[6]>=t*4&&e[0]>=t?1:0)},n.prototype.finderPenaltyTerminateAndCount=function(e,t,r){return e&&(this.finderPenaltyAddHistory(t,r),t=0),t+=this.size,this.finderPenaltyAddHistory(t,r),this.finderPenaltyCountPatterns(r)},n.prototype.finderPenaltyAddHistory=function(e,t){t[0]==0&&(e+=this.size),t.pop(),t.unshift(e)},n.MIN_VERSION=1,n.MAX_VERSION=40,n.PENALTY_N1=3,n.PENALTY_N2=3,n.PENALTY_N3=40,n.PENALTY_N4=10,n.ECC_CODEWORDS_PER_BLOCK=[[-1,7,10,15,20,26,18,20,24,30,18,20,24,26,30,22,24,28,30,28,28,28,28,30,30,26,28,30,30,30,30,30,30,30,30,30,30,30,30,30,30],[-1,10,16,26,18,24,16,18,22,22,26,30,22,22,24,24,28,28,26,26,26,26,28,28,28,28,28,28,28,28,28,28,28,28,28,28,28,28,28,28,28],[-1,13,22,18,26,18,24,18,22,20,24,28,26,24,20,30,24,28,28,26,30,28,30,30,30,30,28,30,30,30,30,30,30,30,30,30,30,30,30,30,30],[-1,17,28,22,16,22,28,26,26,24,28,24,28,22,24,24,30,28,28,26,28,30,24,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30]],n.NUM_ERROR_CORRECTION_BLOCKS=[[-1,1,1,1,1,1,2,2,2,2,4,4,4,4,4,6,6,6,6,7,8,8,9,9,10,12,12,12,13,14,15,16,17,18,19,19,20,21,22,24,25],[-1,1,1,1,2,2,4,4,4,5,5,5,8,9,9,10,10,11,13,14,16,17,17,18,20,21,23,25,26,28,29,31,33,35,37,38,40,43,45,47,49],[-1,1,1,2,2,4,4,6,6,8,8,8,10,12,16,12,17,16,18,21,20,23,23,25,27,29,34,34,35,38,40,43,45,48,51,53,56,59,62,65,68],[-1,1,1,2,4,4,4,5,6,8,8,11,11,16,16,18,16,19,21,25,25,25,34,30,32,35,37,40,42,45,48,51,54,57,60,63,66,70,74,77,81]],n}();i.QrCode=h;function u(n,e,t){if(e<0||e>31||n>>>e)throw new RangeError("Value out of range");for(var r=e-1;r>=0;r--)t.push(n>>>r&1)}function l(n,e){return(n>>>e&1)!=0}function c(n){if(!n)throw new Error("Assertion error")}var d=function(){function n(e,t,r){if(this.mode=e,this.numChars=t,this.bitData=r,t<0)throw new RangeError("Invalid argument");this.bitData=r.slice()}return n.makeBytes=function(e){for(var t=[],r=0,o=e;r<o.length;r++){var a=o[r];u(a,8,t)}return new n(n.Mode.BYTE,e.length,t)},n.makeNumeric=function(e){if(!n.isNumeric(e))throw new RangeError("String contains non-numeric characters");for(var t=[],r=0;r<e.length;){var o=Math.min(e.length-r,3);u(parseInt(e.substring(r,r+o),10),o*3+1,t),r+=o}return new n(n.Mode.NUMERIC,e.length,t)},n.makeAlphanumeric=function(e){if(!n.isAlphanumeric(e))throw new RangeError("String contains unencodable characters in alphanumeric mode");var t=[],r;for(r=0;r+2<=e.length;r+=2){var o=n.ALPHANUMERIC_CHARSET.indexOf(e.charAt(r))*45;o+=n.ALPHANUMERIC_CHARSET.indexOf(e.charAt(r+1)),u(o,11,t)}return r<e.length&&u(n.ALPHANUMERIC_CHARSET.indexOf(e.charAt(r)),6,t),new n(n.Mode.ALPHANUMERIC,e.length,t)},n.makeSegments=function(e){return e==""?[]:n.isNumeric(e)?[n.makeNumeric(e)]:n.isAlphanumeric(e)?[n.makeAlphanumeric(e)]:[n.makeBytes(n.toUtf8ByteArray(e))]},n.makeEci=function(e){var t=[];if(e<0)throw new RangeError("ECI assignment value out of range");if(e<128)u(e,8,t);else if(e<16384)u(2,2,t),u(e,14,t);else if(e<1e6)u(6,3,t),u(e,21,t);else throw new RangeError("ECI assignment value out of range");return new n(n.Mode.ECI,0,t)},n.isNumeric=function(e){return n.NUMERIC_REGEX.test(e)},n.isAlphanumeric=function(e){return n.ALPHANUMERIC_REGEX.test(e)},n.prototype.getData=function(){return this.bitData.slice()},n.getTotalBits=function(e,t){for(var r=0,o=0,a=e;o<a.length;o++){var s=a[o],f=s.mode.numCharCountBits(t);if(s.numChars>=1<<f)return 1/0;r+=4+f+s.bitData.length}return r},n.toUtf8ByteArray=function(e){e=encodeURI(e);for(var t=[],r=0;r<e.length;r++)e.charAt(r)!="%"?t.push(e.charCodeAt(r)):(t.push(parseInt(e.substring(r+1,r+3),16)),r+=2);return t},n.NUMERIC_REGEX=/^[0-9]*$/,n.ALPHANUMERIC_REGEX=/^[A-Z0-9 $%*+.\/:-]*$/,n.ALPHANUMERIC_CHARSET="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ $%*+-./:",n}();i.QrSegment=d})(N||(N={}));(function(i){(function(h){var u=function(){function l(c,d){this.ordinal=c,this.formatBits=d}return l.LOW=new l(0,1),l.MEDIUM=new l(1,0),l.QUARTILE=new l(2,3),l.HIGH=new l(3,2),l}();h.Ecc=u})(i.QrCode||(i.QrCode={}))})(N||(N={}));(function(i){(function(h){var u=function(){function l(c,d){this.modeBits=c,this.numBitsCharCount=d}return l.prototype.numCharCountBits=function(c){return this.numBitsCharCount[Math.floor((c+7)/17)]},l.NUMERIC=new l(1,[10,12,14]),l.ALPHANUMERIC=new l(2,[9,11,13]),l.BYTE=new l(4,[8,16,16]),l.KANJI=new l(8,[8,10,12]),l.ECI=new l(7,[0,0,0]),l}();h.Mode=u})(i.QrSegment||(i.QrSegment={}))})(N||(N={}));var P=N,G="H",D={L:P.QrCode.Ecc.LOW,M:P.QrCode.Ecc.MEDIUM,Q:P.QrCode.Ecc.QUARTILE,H:P.QrCode.Ecc.HIGH},ee=function(){try{new Path2D().addPath(new Path2D)}catch{return!1}return!0}();function K(i){return i in D}function V(i,h){h===void 0&&(h=0);var u=[];return i.forEach(function(l,c){var d=null;l.forEach(function(n,e){if(!n&&d!==null){u.push("M".concat(d+h," ").concat(c+h,"h").concat(e-d,"v1H").concat(d+h,"z")),d=null;return}if(e===l.length-1){if(!n)return;d===null?u.push("M".concat(e+h,",").concat(c+h," h1v1H").concat(e+h,"z")):u.push("M".concat(d+h,",").concat(c+h," h").concat(e+1-d,"v1H").concat(d+h,"z"));return}n&&d===null&&(d=e)})}),u.join("")}var F={value:{type:String,required:!0,default:""},size:{type:Number,default:100},level:{type:String,default:G,validator:function(i){return K(i)}},background:{type:String,default:"#fff"},foreground:{type:String,default:"#000"},margin:{type:Number,required:!1,default:0}},te=y(y({},F),{renderAs:{type:String,required:!1,default:"canvas",validator:function(i){return["canvas","svg"].indexOf(i)>-1}}}),re=T({name:"QRCodeSvg",props:F,setup:function(i){var h=O(0),u=O(""),l=function(){var c=i.value,d=i.level,n=i.margin,e=P.QrCode.encodeText(c,D[d]).getModules();h.value=e.length+n*2,u.value=V(e,n)};return l(),Y(l),function(){return z("svg",{width:i.size,height:i.size,"shape-rendering":"crispEdges",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 ".concat(h.value," ").concat(h.value)},[z("path",{fill:i.background,d:"M0,0 h".concat(h.value,"v").concat(h.value,"H0z")}),z("path",{fill:i.foreground,d:u.value})])}}}),ne=T({name:"QRCodeCanvas",props:F,setup:function(i){var h=O(null),u=function(){var l=i.value,c=i.level,d=i.size,n=i.margin,e=i.background,t=i.foreground,r=h.value;if(r){var o=r.getContext("2d");if(o){var a=P.QrCode.encodeText(l,D[c]).getModules(),s=a.length+n*2,f=window.devicePixelRatio||1,v=d/s*f;r.height=r.width=d*f,o.scale(v,v),o.fillStyle=e,o.fillRect(0,0,s,s),o.fillStyle=t,ee?o.fill(new Path2D(V(a,n))):a.forEach(function(E,C){E.forEach(function(w,p){w&&o.fillRect(p+n,C+n,1,1)})})}}};return X(u),Y(u),function(){return z("canvas",{ref:h,style:{width:"".concat(i.size,"px"),height:"".concat(i.size,"px")}})}}}),oe=T({name:"Qrcode",render:function(){var i=this.$props,h=i.renderAs,u=i.value,l=i.size,c=i.margin,d=i.level,n=i.background,e=i.foreground,t=l>>>0,r=c>>>0,o=K(d)?d:G;return z(h==="svg"?re:ne,{value:u,size:t,margin:r,level:o,background:n,foreground:e})},props:te});const ae="/build/assets/logoUnibague-d31ce9fd.png";const ie={class:"w-full h-full md:w-1/3 xl:w-2/6 flex flex-col md:h-full mx-auto bg-unibague-blue bg-opacity-3 rounded-xl mb-2 relative md:shadow-2xl"},se=m("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"w-6 h-6 text-white"},[m("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"})],-1),le=[se],ue={class:"flex justify-center items-center w-full mt-2"},fe=["src"],ce=m("svg",{"data-name":"Layer 1",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 1200 120",preserveAspectRatio:"none"},[m("path",{d:"M0,0V7.23C0,65.52,268.63,112.77,600,112.77S1200,65.52,1200,7.23V0Z",class:"shape-fill"})],-1),he={class:"absolute inset-0 flex flex-col text-center"},de={class:"text-white text-xl font-bold capitalize"},ve={class:"text-white text-lg font-light"},ge=["innerHTML"],me={class:"capitalize"},we={class:"bottom-0 pb-4 relative w-full flex flex-col items-center"},Ee={class:"mb-5 mx-auto"},Ce=["src"],pe=190,Re={__name:"Carnet",props:{image:String,name:String,user:String,role:String,identification:String,primaryInfo:String||Array,secondaryInfo:String|Array,color:String,qrCode:String,showChangeButton:Boolean},emits:["cambiarCarnet"],setup(i,{emit:h}){const u=i;return(l,c)=>(U(),H("div",ie,[m("div",null,[m("div",{class:"relative flex",style:x({background:i.color})},[i.showChangeButton?(U(),H("button",{key:0,class:"absolute top-5 left-7",onClick:c[0]||(c[0]=d=>l.$emit("cambiarCarnet"))},le)):Z("",!0),m("div",ue,[m("img",{class:"rounded-full w-2/5 md:w-2/5 md:h-4/5 h-5/6 border-white border-solid border-2 bg-white",src:u.image,alt:""},null,8,fe)])],4),m("div",{class:"custom-shape-divider-top-1695396892 relative flex",style:x({fill:i.color})},[ce,m("div",he,[m("h3",de,I(i.name),1),m("h3",ve,I(i.user),1)])],4)]),m("div",{class:q(["px-12 lg:my-4 my-4 flex flex-col h-32 mx-auto font-bold text-lg xl:text-2xl justify-between text-center",{"my-4":i.role==="Funcionario"}])},[m("h2",null,I(i.role),1),m("h2",null,I(i.identification),1),m("h2",{class:"capitalize",innerHTML:i.primaryInfo},null,8,ge),m("h2",me,I(i.secondaryInfo),1)],2),m("div",we,[m("div",Ee,[J(oe,{value:i.qrCode,size:pe,level:"Q"},null,8,["value"])]),m("img",{src:j(ae),alt:"",class:"w-3/6 xl:w-3/6"},null,8,Ce)])]))}};export{Re as default};
