<!DOCTYPE HTML>
<head>
<title>
View Camera Shots
</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>
html, body {margin: 0px}
body {font: 18px normal lucida sans, arial, sans-serif}
ul {padding: 0px; margin: 0px}
</style>
</head>
<body>
<style>
    /**
 * PgwSlideshow - Version 2.0
 *
 * Copyright 2014, Jonathan M. Piat
 * http://pgwjs.com - http://pagawa.com
 *
 * Released under the GNU GPLv3 license - http://opensource.org/licenses/gpl-3.0
 */
.pgwSlideshow{width:100%;background:#333;display:none}.pgwSlideshow a{color:#fff}.pgwSlideshow .ps-current{text-align:center;position:relative;min-height:150px;overflow:hidden}.pgwSlideshow .ps-current>ul>li{text-align:center;width:100%;z-index:1;opacity:0;display:block}.pgwSlideshow .ps-current>ul>li img{display:block;max-width:100%;margin:auto}.pgwSlideshow .ps-caption{background:rgba(0,0,0,0.5);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#99000000',endColorstr='#99000000');-ms-filter:"progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#99000000', endColorstr='#99000000')";text-align:left;font-size:1rem;color:#fff;position:absolute;left:0;bottom:0;width:100%;padding:10px;display:none}.pgwSlideshow .ps-caption span{padding:7px;display:inline-block}.pgwSlideshow .ps-list{border-top:1px solid #555;box-shadow:0 10px 10px -5px #333 inset;background:#555;overflow:hidden;position:relative}.pgwSlideshow .ps-list ul{position:relative;list-style:none;margin:0;padding:0;left:0}.pgwSlideshow .ps-list li{float:left}.pgwSlideshow .ps-list li .ps-item{display:block;margin:15px 8px;opacity:.6;filter:alpha(opacity=60)}.pgwSlideshow .ps-list li img{display:block;border:1px solid #777;width:80px;height:80px}.pgwSlideshow .ps-list li .ps-item.ps-selected{float:left;opacity:1;border:4px solid #fff;overflow:hidden}.pgwSlideshow .ps-list li .ps-item.ps-selected img{margin:-4px}.pgwSlideshow .ps-prevIcon{border-color:transparent #fff transparent;border-style:solid;border-width:10px 10px 10px 0;display:block}.pgwSlideshow .ps-nextIcon{border-color:transparent #fff transparent;border-style:solid;border-width:10px 0 10px 10px;display:block}.pgwSlideshow .ps-current .ps-prev{background:rgba(0,0,0,0.5);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#99000000',endColorstr='#99000000');-ms-filter:"progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#99000000', endColorstr='#99000000')";border:1px solid #777;border-left:0;border-radius:0 4px 4px 0;position:absolute;padding:20px 20px 20px 15px;left:0;top:45%;cursor:pointer}.pgwSlideshow .ps-current .ps-next{background:rgba(0,0,0,0.5);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#99000000',endColorstr='#99000000');-ms-filter:"progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#99000000', endColorstr='#99000000')";border:1px solid #777;border-right:0;border-radius:4px 0 0 4px;position:absolute;padding:20px 15px 20px 20px;right:0;top:45%;cursor:pointer}.pgwSlideshow .ps-list .ps-prev{background:rgba(0,0,0,0.5);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#bb000000',endColorstr='#bb000000');-ms-filter:"progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#bb000000', endColorstr='#bb000000')";border:1px solid #777;border-left:0;border-radius:0 4px 4px 0;padding:20px 15px 20px 12px;cursor:pointer;position:absolute;left:0;top:25px;z-index:1000;display:none}.pgwSlideshow .ps-list .ps-next{background:rgba(0,0,0,0.5);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#bb000000',endColorstr='#bb000000');-ms-filter:"progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#bb000000', endColorstr='#bb000000')";border:1px solid #777;border-right:0;border-radius:4px 0 0 4px;padding:20px 12px 20px 15px;cursor:pointer;position:absolute;right:0;top:25px;z-index:1000;display:none}.pgwSlideshow.narrow .ps-list li img{width:60px;height:60px}.pgwSlideshow.narrow .ps-current .ps-prev{padding:15px 15px 15px 12px;top:40%}.pgwSlideshow.narrow .ps-current .ps-next{padding:15px 12px 15px 15px;top:40%}.pgwSlideshow.narrow .ps-list .ps-prev{padding:15px 12px 15px 10px;top:20px}.pgwSlideshow.narrow .ps-list .ps-next{padding:15px 10px 15px 12px;top:20px}.pgwSlideshow.narrow .ps-caption{font-size:.8rem;padding:8px}
</style><style>
.pgwSlideshow li {margin: 0px}
</style><script language="javascript">
    /**
 * PgwSlideshow - Version 2.0
 *
 * Copyright 2014, Jonathan M. Piat
 * http://pgwjs.com - http://pagawa.com
 * 
 * Released under the GNU GPLv3 license - http://opensource.org/licenses/gpl-3.0
 */
(function(a){a.fn.pgwSlideshow=function(q){var i={mainClassName:"pgwSlideshow",transitionEffect:"sliding",displayList:true,displayControls:true,touchControls:true,autoSlide:false,beforeSlide:false,afterSlide:false,maxHeight:null,adaptiveDuration:200,transitionDuration:500,intervalDuration:3000};if(this.length==0){return this}else{if(this.length>1){this.each(function(){a(this).pgwSlideshow(q)});return this}}var j=this;j.plugin=this;j.config={};j.data=[];j.currentSlide=0;j.slideCount=0;j.resizeEvent=null;j.intervalEvent=null;j.touchFirstPosition=null;j.touchListLastPosition=false;j.window=a(window);var p=function(){j.config=a.extend({},i,q);g();if(j.config.displayList){b()}j.window.resize(function(){clearTimeout(j.resizeEvent);j.resizeEvent=setTimeout(function(){e();var r=j.plugin.find(".ps-current > ul > li.elt_"+j.currentSlide+" img").height();h(r);if(j.config.displayList){b();n()}},100)});if(j.config.autoSlide){k()}return true};var h=function(r,s){if(j.config.maxHeight){if(r+j.plugin.find(".ps-list").height()>j.config.maxHeight){r=j.config.maxHeight-j.plugin.find(".ps-list").height()}}if(typeof j.plugin.find(".ps-current").animate=="function"){j.plugin.find(".ps-current").stop().animate({height:r},j.config.adaptiveDuration,function(){if(j.config.maxHeight){j.plugin.find(".ps-current > ul > li img").css("max-height",r+"px")}})}else{j.plugin.find(".ps-current").css("height",r);if(j.config.maxHeight){j.plugin.find(".ps-current > ul > li img").css("max-height",r+"px")}}return true};var c=function(){var r=0;j.plugin.show();j.plugin.find(".ps-list > ul > li").show().each(function(){r+=a(this).width()});j.plugin.find(".ps-list > ul").width(r);return true};var e=function(){if(j.plugin.width()<=480){j.plugin.addClass("narrow").removeClass("wide")}else{j.plugin.addClass("wide").removeClass("narrow")}return true};var g=function(){j.plugin.removeClass("pgwSlideshow").removeClass(j.config.mainClassName);j.plugin.wrap('<div class="ps-list"></div>');j.plugin=j.plugin.parent();j.plugin.wrap('<div class="'+j.config.mainClassName+'"></div>');j.plugin=j.plugin.parent();j.plugin.prepend('<div class="ps-current"><ul></ul><span class="ps-caption"></span></div>');j.slideCount=j.plugin.find(".ps-list > ul > li").length;if(j.slideCount==0){throw new Error("pgwSlideshow - No slider item has been found");return false}if(j.slideCount>1){if(j.config.displayControls){j.plugin.find(".ps-current").prepend('<span class="ps-prev"><span class="ps-prevIcon"></span></span>');j.plugin.find(".ps-current").append('<span class="ps-next"><span class="ps-nextIcon"></span></span>');j.plugin.find(".ps-current .ps-prev").click(function(){j.previousSlide()});j.plugin.find(".ps-current .ps-next").click(function(){j.nextSlide()})}if(j.config.touchControls){j.plugin.find(".ps-current").on("touchstart",function(s){try{if(s.originalEvent.touches[0].clientX&&j.touchFirstPosition==null){j.touchFirstPosition=s.originalEvent.touches[0].clientX}}catch(s){j.touchFirstPosition=null}});j.plugin.find(".ps-current").on("touchmove",function(s){try{if(s.originalEvent.touches[0].clientX&&j.touchFirstPosition!=null){if(s.originalEvent.touches[0].clientX>(j.touchFirstPosition+50)){j.touchFirstPosition=null;j.previousSlide()}else{if(s.originalEvent.touches[0].clientX<(j.touchFirstPosition-50)){j.touchFirstPosition=null;j.nextSlide()}}}}catch(s){j.touchFirstPosition=null}});j.plugin.find(".ps-current").on("touchend",function(s){j.touchFirstPosition=null})}}var r=1;j.plugin.find(".ps-list > ul > li").each(function(){var t=d(a(this));t.id=r;j.data.push(t);a(this).addClass("elt_"+t.id);a(this).wrapInner('<span class="ps-item'+(r==1?" ps-selected":"")+'"></span>');var s=a('<li class="elt_'+r+'"></li>');if(t.image){s.html('<img src="'+t.image+'" alt="'+(t.title?t.title:"")+'">')}else{if(t.thumbnail){s.html('<img src="'+t.thumbnail+'" alt="'+(t.title?t.title:"")+'">')}}if(t.link){s.html('<a href="'+t.link+'"'+(t.linkTarget?' target="'+t.linkTarget+'"':"")+">"+s.html()+"</a>")}j.plugin.find(".ps-current > ul").append(s);a(this).css("cursor","pointer").click(function(u){u.preventDefault();l(t.id)});r++});if(j.config.displayList){c();j.plugin.find(".ps-list").prepend('<span class="ps-prev"><span class="ps-prevIcon"></span></span>');j.plugin.find(".ps-list").append('<span class="ps-next"><span class="ps-nextIcon"></span></span>');j.plugin.find(".ps-list").show()}else{j.plugin.find(".ps-list").hide()}if(j.config.autoSlide){j.plugin.on("mouseenter",function(){clearInterval(j.intervalEvent);j.intervalEvent=null}).on("mouseleave",function(){k()})}j.plugin.find(".ps-current > ul > li").hide();l(1);j.plugin.find(".ps-current > ul > li.elt_1 img").on("load",function(){e();var s=j.plugin.find(".ps-current > ul > li.elt_1 img").height();h(s)});e();j.plugin.show();return true};var d=function(x){var v={};var t=x.find("a").attr("href");if((typeof t!="undefined")&&(t!="")){v.link=t;var u=x.find("a").attr("target");if((typeof u!="undefined")&&(u!="")){v.linkTarget=u}}var s=x.find("img").attr("src");if((typeof s!="undefined")&&(s!="")){v.thumbnail=s}var y=x.find("img").attr("data-large-src");if((typeof y!="undefined")&&(y!="")){v.image=y}var r=x.find("img").attr("alt");if((typeof r!="undefined")&&(r!="")){v.title=r}var w=x.find("img").attr("data-description");if((typeof w!="undefined")&&(w!="")){v.description=w}return v};var m=function(r){var t="";if(r.title){t+="<b>"+r.title+"</b>"}if(r.description){if(t!=""){t+="<br>"}t+=r.description}if(t!=""){if(r.link){t='<a href="'+r.link+'"'+(r.linkTarget?' target="'+r.linkTarget+'"':"")+">"+t+"</a>"}if(typeof j.plugin.find(".ps-caption").fadeIn=="function"){j.plugin.find(".ps-caption").html(t);j.plugin.find(".ps-caption").fadeIn(j.config.transitionDuration/2)}else{j.plugin.find(".ps-caption").html(t);j.plugin.find(".ps-caption").show()}}j.plugin.find(".ps-list > ul > li .ps-item").removeClass("ps-selected");j.plugin.find(".ps-list > ul > li.elt_"+r.id+" .ps-item").addClass("ps-selected");if(j.config.displayList){b();n()}if(j.config.displayControls){if(typeof j.plugin.find(".ps-current > .ps-prev").fadeIn=="function"){j.plugin.find(".ps-current > .ps-prev, .ps-current > .ps-next").fadeIn(j.config.transitionDuration/2)}else{j.plugin.find(".ps-current > .ps-prev, .ps-current > .ps-next").show()}}if(typeof j.config.afterSlide=="function"){j.config.afterSlide(r.id)}var s=j.plugin.find(".ps-current .elt_"+r.id+" img").height();h(s,true);return true};var f=function(u){var t=j.plugin.find(".ps-current > ul");t.find("li").not(".elt_"+j.currentSlide).not(".elt_"+u.id).each(function(){if(typeof a(this).stop=="function"){a(this).stop()}a(this).css("position","").css("z-index",1).hide()});if(j.currentSlide>0){var r=t.find(".elt_"+j.currentSlide);if(typeof r.animate!="function"){r.animate=function(v,w,x){r.css(v);if(x){x()}}}if(typeof r.stop=="function"){r.stop()}r.css("position","absolute").animate({opacity:0},j.config.transitionDuration,function(){r.css("position","").css("z-index",1).hide()})}j.currentSlide=u.id;var s=t.find(".elt_"+u.id);if(typeof s.animate!="function"){s.animate=function(v,w,x){s.css(v);if(x){x()}}}if(typeof s.stop=="function"){s.stop()}s.css("position","absolute").show().animate({opacity:1},j.config.transitionDuration,function(){s.css("position","").css("z-index",2).css("display","block");m(u)});return true};var o=function(v,y){var u=j.plugin.find(".ps-current > ul");if(typeof y=="undefined"){y="left"}if(j.currentSlide==0){u.find(".elt_1").css({position:"",left:"",opacity:1,"z-index":2}).show();j.plugin.find(".ps-list > li.elt_1").css("opacity","1");m(v)}else{if(j.transitionInProgress){return false}j.transitionInProgress=true;var x=u.width();if(y=="left"){var r=-x;var w=x}else{var r=x;var w=-x}var s=u.find(".elt_"+j.currentSlide);if(typeof s.animate!="function"){s.animate=function(z,A,B){s.css(z);if(B){B()}}}s.css("position","absolute").animate({left:r},j.config.transitionDuration,function(){s.css("position","").css("z-index",1).css("left","").css("opacity",0).hide()});var t=u.find(".elt_"+v.id);if(typeof t.animate!="function"){t.animate=function(z,A,B){t.css(z);if(B){B()}}}t.css("position","absolute").css("left",w).css("opacity",1).show().animate({left:0},j.config.transitionDuration,function(){t.css("position","").css("left","").css("z-index",2).show();j.transitionInProgress=false;m(v)})}j.currentSlide=v.id;return true};var l=function(r,t,u){if(r==j.currentSlide){return false}var s=j.data[r-1];if(typeof s=="undefined"){throw new Error("pgwSlideshow - The element "+r+" is undefined");return false}if(typeof u=="undefined"){u="left"}if(typeof j.config.beforeSlide=="function"){j.config.beforeSlide(r)}if(typeof j.plugin.find(".ps-caption").fadeOut=="function"){j.plugin.find(".ps-caption, .ps-prev, .ps-next").fadeOut(j.config.transitionDuration/2)}else{j.plugin.find(".ps-caption, .ps-prev, .ps-next").hide()}if(j.config.transitionEffect=="sliding"){o(s,u)}else{f(s)}if(typeof t!="undefined"&&j.config.autoSlide){k()}return true};var k=function(){clearInterval(j.intervalEvent);if(j.slideCount>1&&j.config.autoSlide){j.intervalEvent=setInterval(function(){if(j.currentSlide+1<=j.slideCount){var r=j.currentSlide+1}else{var r=1}l(r)},j.config.intervalDuration)}return true};var b=function(){if(!j.config.displayList){return false}c();var w=j.plugin.find(".ps-list");var u=w.width();var r=j.plugin.find(".ps-list > ul");var v=r.width();if(v>u){r.css("margin","0 45px");var t=parseInt(r.css("margin-left"));var s=parseInt(r.css("margin-right"));u-=(t+s);w.find(".ps-prev").show().unbind("click").click(function(){var y=parseInt(r.css("left"));var x=y+u;if(y==0){x=-(v-u)}else{if(x>0){x=0}}if(typeof r.animate=="function"){r.animate({left:x},j.config.transitionDuration)}else{r.css("left",x)}});w.find(".ps-next").show().unbind("click").click(function(){var y=parseInt(r.css("left"));var x=y-u;var z=-(v-u);if(y==z){x=0}else{if(x<z){x=z}}if(typeof r.animate=="function"){r.animate({left:x},j.config.transitionDuration)}else{r.css("left",x)}});if(j.config.touchControls){j.plugin.find(".ps-list > ul").on("touchmove",function(C){try{if(C.originalEvent.touches[0].clientX){var G=(j.touchListLastPosition==false?0:j.touchListLastPosition);nbPixels=(j.touchListLastPosition==false?1:Math.abs(G-C.originalEvent.touches[0].clientX));j.touchListLastPosition=C.originalEvent.touches[0].clientX;var x="";if(G>C.originalEvent.touches[0].clientX){x="left"}else{if(G<C.originalEvent.touches[0].clientX){x="right"}}}var F=parseInt(r.css("left"));if(x=="left"){var E=w.width();var D=r.width();var z=parseInt(r.css("margin-left"));var B=parseInt(r.css("margin-right"));E-=(z+B);var A=-(D-E);var y=F-nbPixels;if(y>A){r.css("left",y)}}else{if(x=="right"){var y=F+nbPixels;if(y<0){r.css("left",y)}else{r.css("left",0)}}}}catch(C){j.touchListLastPosition=false}});j.plugin.find(".ps-list > ul").on("touchend",function(x){j.touchListLastPosition=false})}}else{var t=parseInt((u-v)/2);r.css("left",0).css("margin-left",t);w.find(".ps-prev").hide();w.find(".ps-next").hide();j.plugin.find(".ps-list > ul").unbind("touchstart touchmove touchend")}return true};var n=function(){var A=j.plugin.find(".ps-list").width();var y=j.plugin.find(".ps-list > ul");var z=y.width();var t=parseInt(y.css("margin-left"));var x=parseInt(y.css("margin-right"));A-=(t+x);var w=Math.abs(parseInt(y.css("left")));var r=w+A;var u=j.plugin.find(".ps-list .ps-selected").position().left;var s=u+j.plugin.find(".ps-list .ps-selected").width();if((u<w)||(s>r)||(z>A&&r>s)){var v=-(z-A);if(-u<v){y.css("left",v)}else{y.css("left",-u)}}return true};j.startSlide=function(){j.config.autoSlide=true;k();return true};j.stopSlide=function(){j.config.autoSlide=false;clearInterval(j.intervalEvent);return true};j.getCurrentSlide=function(){return j.currentSlide};j.getSlideCount=function(){return j.slideCount};j.displaySlide=function(r){l(r,true);return true};j.nextSlide=function(){if(j.currentSlide+1<=j.slideCount){var r=j.currentSlide+1}else{var r=1}l(r,true,"left");return true};j.previousSlide=function(){if(j.currentSlide-1>=1){var r=j.currentSlide-1}else{var r=j.slideCount}l(r,true,"right");return true};j.destroy=function(r){clearInterval(j.intervalEvent);if(typeof r!="undefined"){j.plugin.find(".ps-list > ul > li").each(function(){a(this).attr("style",null).removeClass().unbind("click");a(this).html(a(this).find("span").html())});j.plugin.find(".ps-current").remove();j.plugin.find(".ps-list").find(".ps-prev, .ps-next").remove();j.plugin.find(".ps-list > ul").addClass(j.config.mainClassName).attr("style","");j.plugin.find(".ps-list > ul").unwrap().unwrap();j.hide()}else{j.parent().parent().remove()}j.plugin=null;j.data=[];j.config={};j.currentSlide=0;j.slideCount=0;j.resizeEvent=null;j.intervalEvent=null;j.touchFirstPosition=null;j.window=null;return true};j.reload=function(r){j.destroy(true);j=this;j.plugin=this;j.window=a(window);j.plugin.show();j.config=a.extend({},i,r);g();j.window.resize(function(){clearTimeout(j.resizeEvent);j.resizeEvent=setTimeout(function(){e();var s=j.plugin.find(".ps-current > ul > li.elt_"+j.currentSlide+" img").css("max-height","").height();h(s);if(j.config.displayList){b();n()}},100)});if(j.config.autoSlide){k()}return true};p();return this}})(window.Zepto||window.jQuery)
</script><?php 
/*
-the [xxx] facebook page owns an app called "[xxx].com" that has access to the page
-app was created by josh at freshed.com and when added to [xxx]'s biz page via app id the biz page "owned" the app
-going to the app page in the business page app area, the app id and the app secret are viewable
-to get the access token, go to https://graph.facebook.com/oauth/access_token?client_id=121331235167394&client_secret=441f86e534de605eff91b2a7f2f9040f&grant_type=client_credentials
-this access token is then used for any graph api http calls, such as getting posts, or photos from albums
-to get photos, use https://graph.facebook.com/v2.10/{album_id}/photos?fields=place,picture,images,name,link,id&access_token=121331235167394|kgiieRGgagIj5lnE4mMHAoJYd_s
-in this case, the album_id (default) is 676452572552513. Because the app is associated with the eatonvance biz page, the app has full access to the data
-first in the images array will be highest quality photo
-for the album name, go to https://graph.facebook.com/v2.10/{album_id}?access_token={token}
-full photos object spec is athttps://developers.facebook.com/docs/graph-api/reference/photo
*/

class social_fetch
{
	static $api_config = array(
		"facebook" => array("templates" => array("url" => "https://graph.facebook.com/v2.10/-Xalbum_idX-/photos?fields=place,picture,images,name,link,id&access_token=-Xaccess_tokenX-"), "access_token" => "121331235167394|kgiieRGgagIj5lnE4mMHAoJYd_s"),
		"instagram" => array("url" => "https://instagram.com"), //addl example
		"wansview" => array("templates" => array("url" => "http://www.freshed.com/bucket/wansview/slideshow.php?cam=-XcameraX-&title=-XtitleX-"))
	); //templates get populated after data is set
	
	function __construct($init_parameter) {
		if(!empty($init_parameter) && isset(self::$api_config[$init_parameter])){foreach(self::$api_config[$init_parameter] as $k=>$var){$this->$k = $var;}} //if an api_config is set up for the initialization param then move it over to data		
		else {echo "Incorrect or no API type specified.";}
    }
	
	private function template_fill($key){return preg_replace_callback('/-X([A-Z0-9_]*)X-/i', function($v){return $this->$v[1];}, $this->templates[$key]);} //replace -XvarX- with correlating $this->data["key"] in $template["key"]
	private function create_url(){return str_replace(" ", "%20", $this->template_fill("url"));} //populates url
	
	public function return_json($tempfile)
	{
		$curl = curl_init();
		$storefile = dirname(__FILE__) . "/" . $tempfile . ".json"; //where to save json data
		curl_setopt($curl, CURLOPT_URL, $this->create_url());     
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);    
		curl_setopt($curl, CURLOPT_TIMEOUT, 40);
		$json_return = curl_exec($curl);
		if($json_return === false){$json_return = curl_exec($curl);} //give it another shot
		if($json_return === false){sleep(5);$json_return = curl_exec($curl);} //give it another shot after 5 seconds
		if($json_return === false) //if still not working then grab data in json stored locally
		{
			$json_return = @json_decode(file_get_contents($storefile));
			if(empty($json_return)){echo 'Curl error: ' . curl_error($curl);} //if no data stored then echo an error
		}
		else //this means json data was returned so make a copy
		{
			file_put_contents($storefile."tmp", $json_return, LOCK_EX); //save as temp with tmp at end of filename
			rename($storefile."tmp", $storefile); //rename without tmp at end of filename
		}
		curl_close($curl);

		$json_array = @json_decode($json_return);
		return $json_array;
	}
	
	public function file_get_json()
	{
		die($this->create_url());
		return file_get_contents($this->create_url());
	}
}

class facebook_slideshow extends social_fetch
{
	function __construct($album_id){parent::__construct("facebook"); $this->slideshow($album_id);} //initialize parent with facebook template
	public function slideshow($album_id="")
	{
		if(!empty($album_id))
		{
			$this->album_id=$album_id;
			$photos = array();
			$return_data = $this->return_json($this->album_id);
			
			foreach($return_data as $new_photo)
			{
				foreach($new_photo as $data_obj)
				{
					if(isset($data_obj->picture))
					{
						//echo sprintf("<pre>%s</pre>", print_r($data_obj, true));
						$caption_alt = isset($data_obj->place)?(isset($data_obj->place->name)?$data_obj->place->name:"").(isset($data_obj->place->location)?(isset($data_obj->place->location->city)?", ".$data_obj->place->location->city:"").(isset($data_obj->place->location->state)?", ".$data_obj->place->location->state:""):""):"";
						$photos[] = array("photo_original" => reset($data_obj->images)->source, "thumb" => $data_obj->picture, "caption_alt" => $caption_alt, "caption_desc" => "");
					}
				}
			}

			$photos_output = implode("\n", array_map(function($v){return '<li><img src="' . $v["thumb"] . '" alt="' . addslashes($v["caption_alt"]) . '" data-description="' . addslashes($v["caption_desc"]) . '" data-large-src="' . $v["photo_original"] . '"></li>';}, $photos));
			echo !empty($photos_output)?"<div class='carousel'><div class='carousel-container'><div class='carousel-image'><ul class='pgwSlideshow' id='pgwSlideshow_" . $this->album_id . "'>" . $photos_output . "</ul></div></div></div><script>\$(document).ready(function(){\$('#pgwSlideshow_" . $this->album_id . "').pgwSlideshow();});</script>":"";
		} else {echo "no album id specified.";}
	}
	
	static function show($album_id){$show = new facebook_slideshow($album_id);}
}

//facebook_slideshow::show("676452572552513"); //for facebook slideshow

class wansview_slideshow extends social_fetch{
	function __construct($camera, $title){parent::__construct("wansview"); $this->slideshow($camera,$title);} //call a wansview slideshow with a cam name
	public function slideshow($camera_name="",$title)
	{
		if(!empty($camera_name)){
			$this->camera=$camera_name;
			$this->title=empty($title)?"Camera":$title;
			$photos = array();
			$return_data = $this->return_json($this->camera);
			
			foreach($return_data as $new_photo){$photos[] = array("src"=>$new_photo->src, "caption"=>$new_photo->caption, "title"=>$new_photo->title);}

			$photos_output = implode("\n", array_map(function($v){return '<li><img src="' . $v["src"] . '" alt="' . addslashes($v["title"]) . '" data-description="' . addslashes($v["caption"]) . '" data-large-src="' . $v["src"] . '"></li>';}, $photos));
			echo !empty($photos_output)?"<div class='carousel'><div class='carousel-container'><div class='carousel-image'><ul class='pgwSlideshow' id='pgwSlideshow_" . $this->camera . "'>" . $photos_output . "</ul></div></div></div><script>\$(document).ready(function(){\$('#pgwSlideshow_" . $this->camera . "').pgwSlideshow();});</script>":"";
		} else {echo "no camera specified.";}
	}
	
	static function show($camera_name,$title){$show = new wansview_slideshow($camera_name,$title);}
}

$cameras = array("wicklesfront"=>"Wickford Front", "wicklesback"=>"Wickford Back");

$output = "<div class='nav'><ul>";
foreach($cameras as $k=>$v){$output .= "<li><a href='" . $_SERVER["PHP_SELF"] . "?camera=" . $k . "' " . (isset($_GET["camera"]) && $_GET["camera"] == $k?"class='active'":"") . ">" . $v . "</a></li>";}
$output .= "</ul></div>";

if(isset($_GET["camera"]) && isset($cameras[$_GET["camera"]])){wansview_slideshow::show($_GET["camera"],$cameras[$_GET["camera"]]);} //for security cam slideshow

echo $output;

?>
<div style='text-align: center; padding: 1em; padding-top: 2em; clear: both; color: #999999; font-size: .6em; text-transform: uppercase'>
This project is on GitHub at <a href="https://github.com/jlipinski3/phpslideshow">github.com/jlipinski3/phpslideshow</a>.
</div>
<style>
a {color: inherit}
a:hover {text-decoration: none}
.nav {}
.nav ul {list-style: none; position: relative; margin: 0px 5px 0px 5px; width: calc(100% - 10px)}
.nav ul li {float: left; display: block; right: 50%; width: calc(50% - 10px); border: 5px solid #ffffff; margin-top: 5px; margin-bottom: 5px}
.nav ul li a {padding: 20px; color: #ffffff; text-transform: uppercase; width: calc(100% - 40px); text-align: center; display: inline-block; vertical-align: middle; text-decoration: none; background: #03396c}
.nav ul li a.active {background: #005b96; font-weight: bold}
.nav ul li a:hover {background: #6497b1}

@media all and (max-width: 1024px) and (orientation: portrait), all and (max-width:768px) {
	body {font-size: 250%}
	.nav ul {margin: 5px}
	.nav ul li {float: none; width: calc(100% - 10px); line-height: 110%; margin: 0px}
}
</style>
</body>
</html>
