function TheNavigator(){

    this.component = "Unknown browser";
    this.version = parseFloat(navigator.appVersion);

    var languagesq = new Object;
    var lang = "un";
    var platform = "Unknown platform";    
    var OS = "";
    var UA = navigator.userAgent;
    var ua = navigator.userAgent.toLowerCase();
    
    languagesq["un"] = "Unknown language";
    languagesq["cn"] = "Chinese (simp.) language";
    languagesq["cs"] = "Czech language";
    languagesq["da"] = "Danish language";
    languagesq["de"] = "German language";
    languagesq["el"] = "Greek language";
    languagesq["en"] = "English language";
    languagesq["es"] = "Spanish language";
    languagesq["fc"] = "French (Canada) language";
    languagesq["fi"] = "Finnish language";
    languagesq["fr"] = "French language";
    languagesq["hu"] = "Hungarian language";
    languagesq["it"] = "Italian language";
    languagesq["ja"] = "Japanese language";
    languagesq["ko"] = "Korean language";
    languagesq["nl"] = "Dutch language";
    languagesq["no"] = "Norwegian language";
    languagesq["pl"] = "Polish language";
    languagesq["pt"] = "Brazilian Portuguese language";
    languagesq["ru"] = "Russian language";
    languagesq["sv"] = "Swedish language";
    languagesq["tr"] = "Turkish language";
    languagesq["tw"] = "Chinese (trad.) language";
    languagesq["uk"] = "English (UK) language";
    languagesq["de-de"] = "German language"
    languagesq["en-gb"] = "English (UK) language";
    languagesq["en-us"] = "English language";
    languagesq["es-es"] = "Spanish language";
    languagesq["fr-fr"] = "French language";
    languagesq["ja-jp"] = "Japanese language";
    
    // Language
    if (((start = ua.indexOf("[")) > 0) && 
        ((end = ua.indexOf("]")) == (ua.indexOf("[") + 3))){
      language = ua.substring(start+1, end);
    } else if (navigator.language) {
      language = navigator.language.toLowerCase();
    } else if (navigator.userLanguage) {
      language = navigator.userLanguage.toLowerCase();
    }
    if (languagesq[language]) {
      lang = language;
    }
    
    // OS
    if (((ua.indexOf("ppc") > 0) && (ua.indexOf("mac") > 0))
        || (ua.indexOf("mac_power") > 0)) {
    //  if (ua.indexOf("os x")) {
    //    OS = "macosx";
    //  } else {
        OS = "macppc";
    //  }
    } else if ((ua.indexOf("linux 2.2") > 0)
    	   || (ua.indexOf("netscape6") && ua.indexOf("linux") > 0)) {
      OS = "linux2.2";
    } else if (ua.indexOf("win") > 0) {
      OS = "win32";
    }
    
    // Other info
    start = UA.indexOf('(') + 1;
    end = UA.indexOf(')');
    str = UA.substring(start, end);
    info = str.split('; ');
    
    if (ua.indexOf('msie') != -1) {
      platform = info[2];
      this.component = navigator.appName;
      str = info[1].substring(5, info[1].length);
      this.version = parseFloat(str);
    } else if ((start = ua.indexOf("netscape6")) > 0) {
      if (info[0].toLowerCase() == "windows") {
        platform = info[2];
      } else {
        platform = info[0] + " " + info[2];
      }
      this.component = "Netscape";
      this.version = ua.substring(start+10, ua.length);
      if ((start = this.version.indexOf("b")) > 0 ) {
        pr = this.version.substring(start+1,this.version.length);
        str = this.version.substring(0,this.version.indexOf("b"));
        this.version = str + " Preview Release " + pr;
      }
    } else {
      if(info[2]) {
        if (info[0].toLowerCase() == "windows") {
          platform = info[2];
        } else {
          platform = info[0] + " " + info[2];
        }
      } else {
        platform = info[0];
      }
      if (ua.indexOf("gecko") > 0) {
        this.component = "Mozilla";
      } else if (ua.indexOf("nav") > 0) {
        this.component = "Netscape Navigator";
      } else {
        this.component = "Netscape Communicator";
      }
    }
    // Some formatting
    if (platform.indexOf("NT") != -1)
    {
    	if (platform.indexOf("5.0") != -1)
    		platform = "Windows 2000";
    	else if (platform.indexOf("5.1") != -1)
    		platform = "Windows XP";
    }
    if (parseInt(this.version) == parseFloat(this.version)) {
      this.version = this.version + ".0";
    }
        
}