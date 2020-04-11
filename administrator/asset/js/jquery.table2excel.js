(function(f,d,a,h){var e="table2excel",g={exclude:".noExl",name:"Table2Excel"};function c(j,i){this.element=j;this.settings=f.extend({},g,i);this._defaults=g;this._name=e;this.init()}c.prototype={init:function(){var j=this;var i='<meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">';j.template={head:'<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">'+i+"<head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets>",sheet:{head:"<x:ExcelWorksheet><x:Name>",tail:"</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet>"},mid:"</x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body>",table:{head:"<table>",tail:"</table>"},foot:"</body></html>"};j.tableRows=[];f(j.element).each(function(k,m){var l="";f(m).find("tr").not(j.settings.exclude).each(function(n,p){l+="<tr>"+f(p).html()+"</tr>"});j.tableRows.push(l)});j.tableToExcel(j.tableRows,j.settings.name,j.settings.sheetName)},tableToExcel:function(r,j,k){var o=this,m="",n,p,q;o.uri="data:application/vnd.ms-excel;base64,";o.base64=function(i){return d.btoa(unescape(encodeURIComponent(i)))};o.format=function(i,t){return i.replace(/{(\w+)}/g,function(s,u){return t[u]})};k=typeof k==="undefined"?"Sheet":k;o.ctx={worksheet:j||"Worksheet",table:r,sheetName:k};m=o.template.head;if(f.isArray(r)){for(n in r){m+=o.template.sheet.head+k+n+o.template.sheet.tail}}m+=o.template.mid;if(f.isArray(r)){for(n in r){m+=o.template.table.head+"{table"+n+"}"+o.template.table.tail}}m+=o.template.foot;for(n in r){o.ctx["table"+n]=r[n]}delete o.ctx.table;if(typeof msie!=="undefined"&&msie>0||!!navigator.userAgent.match(/Trident.*rv\:11\./)){if(typeof Blob!=="undefined"){m=[m];var l=new Blob(m,{type:"text/html"});d.navigator.msSaveBlob(l,b(o.settings))}else{txtArea1.document.open("text/html","replace");txtArea1.document.write(o.format(m,o.ctx));txtArea1.document.close();txtArea1.focus();sa=txtArea1.document.execCommand("SaveAs",true,b(o.settings))}}else{p=o.uri+o.base64(o.format(m,o.ctx));q=a.createElement("a");q.download=b(o.settings);q.href=p;a.body.appendChild(q);q.click();a.body.removeChild(q)}return true}};function b(i){return(i.filename?i.filename:"table2excel")+(i.fileext?i.fileext:".xls")}f.fn[e]=function(i){var j=this;j.each(function(){if(!f.data(j,"plugin_"+e)){f.data(j,"plugin_"+e,new c(this,i))}});return j}})(jQuery,window,document);