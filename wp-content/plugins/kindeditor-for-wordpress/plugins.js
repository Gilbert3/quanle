KindEditor.lang({       wpmore : '插入分页符',	   blockquote : '引用'});KindEditor.plugin('wpmore', function(K) {	var editor = this, name = 'wpmore',        morestr = '<!--more-->';	// 点击图标时执行	editor.clickToolbar(name, function() {		var html = editor.html();		if(html.indexOf('!--more-->') > 0) {            var moreTip = K.dialog({                title: '提示',                width: 300,                body: "<p style='padding: 10px 15px;'>Already have &lt;!--more--&gt;.<br />(已经包含&lt;!--more--&gt; 标签.)</p>",                closeBtn: {                    name: '关闭',                    click: function(e) {                        moreTip.remove();                    }                }            });		} else {	    	editor.insertHtml(morestr);		}	});});KindEditor.plugin('blockquote', function(K) {	var editor = this, name = 'blockquote';	// 点击图标时执行	editor.clickToolbar(name, function() {			var dialog = K.dialog({			width : 302,			title : '引用',			body : "<textarea id='kebq' style='width: 300px;height: 100px;'></textarea>",			closeBtn : {                name : '关闭',                click : function(e) {                    dialog.remove();                }			},			yesBtn : {				name : '确定',				click : function(e) {					var ke_text = jQuery("#kebq").val();					var html = '<blockquote>' + ke_text + '</blockquote>';					editor.insertHtml(html);					dialog.remove();				}			},			noBtn : {				name : '取消',				click : function(e) {					dialog.remove();				}			}		});	});});