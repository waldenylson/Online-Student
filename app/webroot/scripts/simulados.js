function getq(ele){
	var p=ele.parentNode;
	var idx=0;
	while(p.className!="question"&&idx<30){
		p=p.parentNode;
		idx++;
	}
	if(idx>=30){
		return null;
	}else{
		return p;
	}
}
var isSf=false;
var isC=false;
function setup(){
	var agt=navigator.userAgent.toLowerCase();
	var isIP=(agt.indexOf("iphone")>-1);
	isIE=(agt.indexOf("msie")!=-1&&agt.indexOf("opera")==-1) && agt.indexOf("msie 9") == -1;
	if(isIE){
		try{document.execCommand("BackgroundImageCache",false,true);}catch(err){}
	}
	var divs=document.getElementsByTagName("div");
	for(var i=0;i<divs.length;i++){
		if(divs[i].className.indexOf("hover")>=0){
			divs[i].onmouseover=function(){this.className=this.className.replace(/hover/gi,"ruled");return false;}
			divs[i].onmouseout=function(){this.className=this.className.replace(/ruled/gi,"hover");return false;}
		}
	}
	var inputs=document.getElementsByTagName("input");
	var label,img,inputID;
	for(var i=0;i<inputs.length;i++){
		switch(inputs[i].type){
			case "checkbox":
				label=document.getElementById("l"+inputs[i].id);
				if(inputs[i].checked){
					label.className=label.className.replace("cb_off","cb_on");
				}
				if(isIE)label.style.position="relative";
				inputs[i].onclick=function(){cbtoggle(this);}
				inputs[i].onfocus=function(){focus(this);}
				inputs[i].onblur=function(){blur(this);}
				if(isIE){//IE! ignores images in labels.
					img=label.getElementsByTagName("img")[0];
					img.onclick=function(){this.parentNode.click();}
				}
				break;
			case "radio":
				label=document.getElementById("l"+inputs[i].id);
				if(inputs[i].checked){
					label.className=label.className.replace("rb_off","rb_on");
					inputs[i].history=true;
				}else{
					inputs[i].history=false;
				}
				if(isIE)label.style.position="relative";
				inputs[i].onclick=function(){rbtoggle(this);}
				inputs[i].onfocus=function(){focus(this);}
				inputs[i].onblur=function(){blur(this);}
				if(isIE){//IE! ignores images in labels.
					img=label.getElementsByTagName("img")[0];
					img.onclick=function(){this.parentNode.click();}
				}
				break;
			case "text":
				if(inputs[i].className.indexOf("other")>-1){
					creatediv(inputs[i]);
				}
				if(isIP&&inputs[i].className.indexOf("open")>-1){inputs[i].setAttribute("size","0");}
				inputs[i].onclick=function(){this.focus();}//hack to fix broken blur event on webkit browsers
				break;
            case "submit":
            case "hidden":
				break;
			default:
				inputs[i].click(function(){this.focus();});//hack to fix broken blur event on webkit browsers
				break;
		}
	}
	inputs=document.getElementsByTagName("textarea");
	for(var i=0;i<inputs.length;i++){
		if(inputs[i].className.indexOf("other")>-1){
			creatediv(inputs[i]);
		}
		if(isIP&&inputs[i].className.indexOf("open")>-1){inputs[i].setAttribute("cols","0");}
	}
	safari();
}
function focus(input){
	if(input){
		var label=document.getElementById("l"+input.id);
		label.parentNode.className=label.parentNode.className+" selected";
		// this doesn't seem to work from css on firefox
		label.parentNode.style.border = "1px dotted black";
		label.parentNode.style.margin = "-1px";
    }
}
function blur(input){
	var label=document.getElementById("l"+input.id);
	label.parentNode.className=label.parentNode.className.replace(/\s(selected)/gi,"");
	// this doesn't seem to work from css on firefox
	label.parentNode.style.border = "";
	label.parentNode.style.margin = "";
}
function cbtoggle(input){
	input.focus();//hack to fix broken blur event on webkit browsers
	var label=document.getElementById("l"+input.id);
	label.className="cb_"+((input.checked)?"on":"off")+" selected";
	if(input.other){
		var other=document.getElementById(input.other);
		if(input.isOther&&input.checked){
			other.disabled=false;
		}else if(other.value==""){
			other.disabled=true;
		}
	}
}
function rbtoggle(input){
	input.focus();//hack to fix broken blur event on webkit browsers
	if(input.history==true){
		input.checked=false;
		input.history=false;
	}else{
		input.history=true;
	}
	var group=new Array();
	var inputs=getq(input).getElementsByTagName("input");
	for(var i=0;i<inputs.length;i++){
		if(inputs[i].name==input.name){
			group.push(inputs[i]);
		}
    }
	if(input.className.indexOf("col")>-1){
		inputs=input.parentNode.parentNode.parentNode.getElementsByTagName("input");
		for(var i=0;i<inputs.length;i++){
			if(inputs[i].name!=input.name){
				group.push(inputs[i]);
				if(input.checked){
					inputs[i].checked=false;
				}
			}
		}
	}
	var label;
	for(var i=0;i<group.length;i++){
		label=document.getElementById("l"+group[i].id);
		label.className="rb_"+((group[i].checked)?"on":"off");
		label.parentNode.className=label.parentNode.className.replace(/\s(selected)/gi,"");
		if(group[i].id==input.id){
		    label.parentNode.className=label.parentNode.className+" selected";
		}else{
		    group[i].history=false;
		}
	}
	if(input.other){
		var other=document.getElementById(input.other);
		if(input.isOther>-1&&input.checked){
			other.disabled=false;
		}else{
			other.disabled=true;
		}
	}
}
function onesubmit(element,delay){
	var tagname=element.tagName.toLowerCase();
	delay=(delay)?delay:1500;
	if(tagname=="a"){
		var href=element.href;
		var click=element.onclick;
		setTimeout(function(){element.href="javascript:void(0);";element.onclick=null;},0);
		setTimeout(function(){element.href=href;element.onclick=click;},delay);
	}else if(tagname=="input"){
		var click=element.onclick;
		setTimeout(function(){element.disabled=true;element.onclick=null;},0);
		setTimeout(function(){element.disabled=false;element.onclick=click;},delay);
	}
}
function safari(){
	var ua=navigator.userAgent.toLowerCase();
	if(ua.indexOf("safari/")>-1){
		if(ua.indexOf("chrome")==-1){
			isSf=true;
			if(ua.indexOf("version/")==-1){
				var labels=document.getElementsByTagName("label");
				for(var i=0;i<labels.length;i++){
					labels[i].onclick=function(){var input=document.getElementById(this.getAttribute("for"));if(input)input.click();}
				}
			}
		}else{isC=true;}
	}
}
function creatediv(text){
	text.style.position="relative";
	var div=document.createElement("div");
	div.style.position="absolute";
	div.style.left=text.offsetLeft+"px";
	div.style.top=text.offsetTop+"px";
	div.style.width=text.offsetWidth+"px";
	div.style.height=text.offsetHeight+"px";
	div.style.zIndex=100;
	div.id="___"+text.id;
	div.onclick=function(){this.style.display="none";toggleother(this.id.replace("___",""));}
	text.onblur=function(){var div=document.getElementById("___"+this.id);if(div)div.style.display="";}
	var other=getother(text);
	if(other){
		switch(other.type){
			case "radio":
			case "checkbox":
				if(other.checked){
					text.disabled=false;
				}
				break;
			case "select-one":
				if(other.selectedIndex==other.options.length-1){
					text.disabled=false;
				}
				break;
		}
	}
	document.body.appendChild(div);
}
function getother(text){
	var el=null;
	var q=getq(text);
	var inputs=q.getElementsByTagName("input");
	for(var i=0;i<inputs.length;i++){
		switch(inputs[i].type){
			case "radio":
			case "checkbox":
				el=inputs[i];
				el.other=text.id;
				break;
		}
	}
	if(el)el.isOther=true;
	inputs=q.getElementsByTagName("select");
	if(inputs.length>0){
		inputs[0].other=text.id;
		inputs[0].onchange=function(){selectother(this);}
		inputs[0].onkeyup=function(){selectother(this);}
		el=inputs[0];
	}
	return el;
}
function selectother(sel){
	var other=document.getElementById(sel.other);
	if(sel.selectedIndex==sel.options.length-1){
		other.disabled=false;
	}else{
		other.disabled=true;
	}
}
function toggleother(id){
	var input=document.getElementById(id);
	var other=getother(input);
	if(other){
		switch(other.type){
			case "radio":
			case "checkbox":
				if(!other.checked)other.click();
				other.parentNode.className=other.parentNode.className.replace(/\s(selected)/gi,"");
				break;
			case "select-one":
				other.selectedIndex=other.options.length-1;
				break;
		}
	}
	input.disabled=false;
	if(input.value.length==0&&(isC||isSf)){input.value=" ";}
	input.focus();
}
