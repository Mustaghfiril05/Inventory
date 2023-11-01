/*
 Highcharts Stock JS v10.2.0 (2022-07-05)

 Indicator series type for Highcharts Stock

 (c) 2010-2021 Karol Kolodziej

 License: www.highcharts.com/license
*/
(function(a){"object"===typeof module&&module.exports?(a["default"]=a,module.exports=a):"function"===typeof define&&define.amd?define("highcharts/indicators/klinger",["highcharts","highcharts/modules/stock"],function(k){a(k);a.Highcharts=k;return a}):a("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(a){function k(a,h,g,k){a.hasOwnProperty(h)||(a[h]=k.apply(null,g),"function"===typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:h,module:a[h]}})))}
a=a?a._modules:{};k(a,"Stock/Indicators/MultipleLinesComposition.js",[a["Core/Series/SeriesRegistry.js"],a["Core/Utilities.js"]],function(a,h){var g=a.seriesTypes.sma.prototype,k=h.defined,m=h.error,q=h.merge,l;(function(a){function h(c){return"plot"+c.charAt(0).toUpperCase()+c.slice(1)}function l(c,b){var d=[];(c.pointArrayMap||[]).forEach(function(c){c!==b&&d.push(h(c))});return d}function p(){var c=this,b=c.linesApiNames,d=c.areaLinesNames,f=c.points,a=c.options,v=c.graph,e={options:{gapSize:a.gapSize}},
t=[],n=l(c,c.pointValKey),r=f.length,u;n.forEach(function(c,b){for(t[b]=[];r--;)u=f[r],t[b].push({x:u.x,plotX:u.plotX,plotY:u[c],isNull:!k(u[c])});r=f.length});if(c.userOptions.fillColor&&d.length){var p=n.indexOf(h(d[0]));p=t[p];d=1===d.length?f:t[n.indexOf(h(d[1]))];n=c.color;c.points=d;c.nextPoints=p;c.color=c.userOptions.fillColor;c.options=q(f,e);c.graph=c.area;c.fillGraph=!0;g.drawGraph.call(c);c.area=c.graph;delete c.nextPoints;delete c.fillGraph;c.color=n}b.forEach(function(b,d){t[d]?(c.points=
t[d],a[b]?c.options=q(a[b].styles,e):m('Error: "There is no '+b+' in DOCS options declared. Check if linesApiNames are consistent with your DOCS line names."'),c.graph=c["graph"+b],g.drawGraph.call(c),c["graph"+b]=c.graph):m('Error: "'+b+" doesn't have equivalent in pointArrayMap. To many elements in linesApiNames relative to pointArrayMap.\"")});c.points=f;c.options=a;c.graph=v;g.drawGraph.call(c)}function r(c){var b,d=[];c=c||this.points;if(this.fillGraph&&this.nextPoints){if((b=g.getGraphPath.call(this,
this.nextPoints))&&b.length){b[0][0]="L";d=g.getGraphPath.call(this,c);b=b.slice(0,d.length);for(var f=b.length-1;0<=f;f--)d.push(b[f])}}else d=g.getGraphPath.apply(this,arguments);return d}function e(b){var c=[];(this.pointArrayMap||[]).forEach(function(d){c.push(b[d])});return c}function b(){var b=this,d=this.pointArrayMap,f=[],a;f=l(this);g.translate.apply(this,arguments);this.points.forEach(function(c){d.forEach(function(d,v){a=c[d];b.dataModify&&(a=b.dataModify.modifyValue(a));null!==a&&(c[f[v]]=
b.yAxis.toPixels(a,!0))})})}var d=[],f=["bottomLine"],v=["top","bottom"],t=["top"];a.compose=function(c){if(-1===d.indexOf(c)){d.push(c);var a=c.prototype;a.linesApiNames=a.linesApiNames||f.slice();a.pointArrayMap=a.pointArrayMap||v.slice();a.pointValKey=a.pointValKey||"top";a.areaLinesNames=a.areaLinesNames||t.slice();a.drawGraph=p;a.getGraphPath=r;a.toYData=e;a.translate=b}return c}})(l||(l={}));return l});k(a,"Stock/Indicators/Klinger/KlingerIndicator.js",[a["Stock/Indicators/MultipleLinesComposition.js"],
a["Core/Series/SeriesRegistry.js"],a["Core/Utilities.js"]],function(a,h,g){var k=this&&this.__extends||function(){var a=function(e,b){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(b,a){b.__proto__=a}||function(b,a){for(var d in a)a.hasOwnProperty(d)&&(b[d]=a[d])};return a(e,b)};return function(e,b){function d(){this.constructor=e}a(e,b);e.prototype=null===b?Object.create(b):(d.prototype=b.prototype,new d)}}(),m=h.seriesTypes,q=m.sma,l=m.ema,p=g.correctFloat,w=g.error;m=g.extend;
var x=g.isArray,y=g.merge;g=function(a){function e(){var b=null!==a&&a.apply(this,arguments)||this;b.data=void 0;b.points=void 0;b.options=void 0;b.volumeSeries=void 0;return b}k(e,a);e.prototype.calculateTrend=function(b,a){return b[a][1]+b[a][2]+b[a][3]>b[a-1][1]+b[a-1][2]+b[a-1][3]?1:-1};e.prototype.isValidData=function(b){var a=this.chart,f=this.options,e=this.linkedParent;b=x(b)&&4===b.length;(a=this.volumeSeries||(this.volumeSeries=a.get(f.params.volumeSeriesID)))||w("Series "+f.params.volumeSeriesID+
" not found! Check `volumeSeriesID`.",!0,e.chart);return!(![e,a].every(function(b){return b&&b.xData&&b.xData.length>=f.params.slowAvgPeriod})||!b)};e.prototype.getCM=function(b,a,f,e,g){return p(a+(f===e?b:g))};e.prototype.getDM=function(b,a){return p(b-a)};e.prototype.getVolumeForce=function(b){var a=[],f=1;var e=0;var g=b[0][1]-b[0][2];var c=0;for(f;f<b.length;f++){var h=this.calculateTrend(b,f);var k=this.getDM(b[f][1],b[f][2]);e=this.getCM(e,k,h,c,g);c=this.volumeSeries.yData[f]*h*Math.abs(2*
(k/e-1))*100;a.push([c]);c=h;g=k}return a};e.prototype.getEMA=function(a,d,f,e,g,c,h){return l.prototype.calculateEma(h||[],a,"undefined"===typeof c?1:c,e,d,"undefined"===typeof g?-1:g,f)};e.prototype.getSMA=function(a,d,f){return l.prototype.accumulatePeriodPoints(a,d,f)/a};e.prototype.getValues=function(a,d){var b=[],e=a.xData;a=a.yData;var g=[],c=[],h=[],k,l=0,m=0,q=void 0,r=void 0,z=null;if(this.isValidData(a[0])){var n=this.getVolumeForce(a),w=this.getSMA(d.fastAvgPeriod,0,n),u=this.getSMA(d.slowAvgPeriod,
0,n),x=2/(d.fastAvgPeriod+1),y=2/(d.slowAvgPeriod+1);for(l;l<a.length;l++)l>=d.fastAvgPeriod&&(q=m=this.getEMA(n,q,w,x,0,l,e)[1]),l>=d.slowAvgPeriod&&(r=k=this.getEMA(n,r,u,y,0,l,e)[1],k=p(m-k),h.push(k),h.length>=d.signalPeriod&&(z=h.slice(-d.signalPeriod).reduce(function(a,b){return a+b})/d.signalPeriod),b.push([e[l],k,z]),g.push(e[l]),c.push([k,z]));return{values:b,xData:g,yData:c}}};e.defaultOptions=y(q.defaultOptions,{params:{fastAvgPeriod:34,slowAvgPeriod:55,signalPeriod:13,volumeSeriesID:"volume"},
signalLine:{styles:{lineWidth:1,lineColor:"#ff0000"}},dataGrouping:{approximation:"averages"},tooltip:{pointFormat:'<span style="color: {point.color}">\u25cf</span><b> {series.name}</b><br/><span style="color: {point.color}">Klinger</span>: {point.y}<br/><span style="color: {point.series.options.signalLine.styles.lineColor}">Signal</span>: {point.signal}<br/>'}});return e}(q);m(g.prototype,{areaLinesNames:[],linesApiNames:["signalLine"],nameBase:"Klinger",nameComponents:["fastAvgPeriod","slowAvgPeriod"],
pointArrayMap:["y","signal"],parallelArrays:["x","y","signal"],pointValKey:"y"});a.compose(g);h.registerSeriesType("klinger",g);"";return g});k(a,"masters/indicators/klinger.src.js",[],function(){})});
//# sourceMappingURL=klinger.js.map