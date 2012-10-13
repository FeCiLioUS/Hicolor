<style type="text/css">
{literal}
.registContent { bordder: 1px #999 solid; padding: 10px;}
.registContent .NotFoundData { color: #bd0000; font-size: 14px; text-align: center; font-weight: bold; line-height: 50px; letter-spacing: 2px;}
.registContent li { border-bottom: 1px #666 solid; width: 100%; display: inline-block; margin-top:20px; padding-bottom: 20px;}
.registContent li:first-child { margin-top:0px;}
.registContent li.last{border-bottom: none;}
.registContent li .completeTitle { color: #666666; text-decoration: underline; font-size: 12px; line-height:54px; margin-left:15px; letter-spacing: 3px;}
.registContent li .completeTitle.regist { color: #996600;}
.registContent li .registContentDetail { color: #666666; font-family: Times New Roman,Times,serif; font-size: 12px; letter-spacing: 3px; line-height: 20px;}
.registContent li .registContentDetail li{ border: none; margin: 0px; padding: 0px; text-align: center;}
.registContent li .registContentDetail li .policy{font-size:9pt;width:560;height:255px; margin: 0 auto;}
#registTable{ border: 1px #999 solid;}
.registContent li .registContentDetail li .contents {
    color: #666666;
    font-family: "Times New Roman",Times,serif;
    font-size: 11px;
    letter-spacing: 3px;
    line-height: 17px;
}
.registContent li .registContentDetail li .style40 {
    color: #CC0000;
    font-family: "Times New Roman",Times,serif;
    font-size: 11px;
    font-variant: normal;
    letter-spacing: 4px;
    line-height: 20px;
}
.registContent li .registContentDetail li .comfirmCode{
	clear: both;
	float: left;
}
.registContent li .registContentDetail li .invoiceTYpe{
	font-family: "Times New Roman",Times,serif;
    font-size: 11px;    
    letter-spacing: 4px;
	width: 174px;
	height: 22px;
	line-height: 22px;
}
.registContent li .registContentDetail li .securityImage{
	width:100px;
	height: 70px;
}
.registFooter {clear:both; width: 100%; text-align:center; margin-top: 25px; }
.registFooter .footerTop{ background: url('../images/Aarrowhand_b1.jpg') no-repeat center top; height: 23px;}
.registFooter .footerBottom{ background: url('../images/Aarrowhand_b2.jpg') no-repeat center top; height: 23px;}
.registFooter .subCateSelection{ margin: 0 auto; display: inline-block; float: none; height:30px; padding-top:7px;}
.registFooter .subCateSelection .reset,
.registFooter .subCateSelection .submit{ font-size:9pt;width:50;height:22px; }
{/literal}
</style>
<script>
{literal}
$(".navigationMenu .memberCenter").addClass("selected");
{/literal}
</script>
<div class="title">
	<img src="../images/arrie_tile_member.jpg" width="153" height="27">
</div>
<form action="regist_action.php" method="post" name="pers_data">
	<ul class="registContent">
		<li>
			<span class="listIcon"></span><img src="../images/sub_number_0.jpg" class="listIconSN" /><img src="../images/sub_number_3.jpg" class="listIconSN" />
			<span class="completeTitle regist">填寫基本資料(紅色字部份必填)</span>
			<ul class="registContentDetail">
				<li>
					<table id="registTable" width="100%" height="261" border="0" cellpadding="0" cellspacing="3">
						<tr valign="middle" bgcolor="#D9D9D9" class="contents">
							<td width="13%" height="35" bgcolor="#D9D9D9">
								<div align="center" class="style40">姓 　 名</div>
							</td>
							<td width="35%" height="35" valign="middle" bgcolor="#E6E6E6">
								<div align="center">
									<input type="text" name="M_NAME" style="font-size:12px;width:170px;height:17px;" value="{$M_NAME}">
								</div>
							</td>
							<td width="16%" height="35" valign="middle" bgcolor="#D9D9D9">
								<div align="center" class="style41">E-mail</div>
							</td>
							<td width="36%" height="35" valign="middle" bgcolor="#E6E6E6">
								<div align="center">
									<input type="text" name="EMAIL" style="font-size:12px;width:170px;height:17px;" value="{$EMAIL}">
								</div>
							</td>
						</tr>
						<tr valign="middle" bgcolor="#D9D9D9" class="contents">
							<td height="35">
								<div align="center" class="style40">聯絡電話</div>
							</td>
							<td height="35" bgcolor="#E6E6E6">
								<div align="center">
									<input type="text" name="PHONE" style="font-size:12px;width:170px;height:17px;" value="{$PHONE}">
								</div>
							</td>
							<td height="35" bgcolor="#D9D9D9">
								<div align="center" class="style40">行動電話</div>
							</td>
							<td height="35" bgcolor="#E6E6E6">
								<div align="center">
									<input type="text" name="MOBILE" style="font-size:12px;width:170px;height:17px;" value="{$MOBILE}">
								</div>
							</td>
						</tr>
						<tr valign="middle" bgcolor="#D9D9D9" class="contents">
							<td height="35">
								<div align="center" class="style40">送貨地址</div>
							</td>
							<td height="35" colspan="3" bgcolor="#E6E6E6">
								<div align="left">
									<input name="address" type="text" style="font-size:12px;margin-left:22px;width:499px;height:17px;" size="25"  value="{$address}">
								</div>
							</td>
						</tr>
						<tr valign="middle" bgcolor="#D9D9D9" class="contents">
							<td height="35">
								<div align="center">公司名稱</div>
							</td>
							<td height="35" bgcolor="#E6E6E6">
								<div align="center">
									<span class="table_tab">
										<input type="text" name="comany_nm" style="font-size:12px;width:170px;height:17px;" value="{$comany_nm}">
									</span>
								</div>
							</td>
							<td height="35" bgcolor="#D9D9D9">
								<div align="center">統一編號</div>
							</td>
							<td height="35" bgcolor="#E6E6E6">
								<div align="center">
									<span class="table_tab">
										<input type="text" name="RECEIPT_SN" style="font-size:12px;width:170px;height:17px;" value="{$RECEIPT_SN}">
									</span>
								</div>
							</td>
						</tr>
						<tr valign="middle" bgcolor="#D9D9D9" class="contents">
							<td height="35">
								<div align="center">發票抬頭</div>
							</td>
							<td height="35" bgcolor="#E6E6E6">
								<div align="center">
									<input type="text" name="RECEIPT_TITLE" style="font-size:12px;width:170px;height:17px;" value="{$RECEIPT_TITLE}">
								</div>
							</td>
							<td height="35" bgcolor="#D9D9D9">
								<div align="center" class="style40">發票種類</div>
							</td>
							<td height="35" bgcolor="#E6E6E6">
								<div align="center">
									{html_options name="RECEIPT_TYPE" class="invoiceTYpe" options=$RECEIPT_TYPE_OPTIONS selected=$RECEIPT_TYPE_SELECTED}
								</div>
							</td>
						</tr>
						<tr valign="middle" bgcolor="#D9D9D9" class="contents">
							<td height="65">
								<div align="center" class="style40">發票地址</div>
							</td>
							<td height="40" colspan="3" bgcolor="#E6E6E6">
								<div align="center">
									<table width="100%" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td width="2%">&nbsp;</td>
											<td width="5%">
												<div align="left">													
													<input name="RECEIPT_addressr" id="RECEIPT_addressr_1" type="radio" value="0" {if $RECEIPT_addressr == "" || $RECEIPT_addressr == 0}checked{/if}>
												</div>						
											</td>
											<td width="93%" class="contents">
												<div align="left"><label for="RECEIPT_addressr_1">同送貨地址</label></div>
											</td>
										</tr>
										<tr>
											<td>&nbsp;</td>
											<td>
												<div align="left">
													<input name="RECEIPT_addressr" type="radio" value="1" {if $RECEIPT_addressr == 1}checked{/if}>
												</div>
											</td>
											<td>
												<div align="left">
													<input type="text" name="addressr" style="font-size:12px;width:481px;height:17px;" {if $RECEIPT_addressr == "" || $RECEIPT_addressr == 0}disabled{/if} value="{$addressr}">
												</div>
											</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				</li>
				<li>
					<div><img class="securityImage" alt="Security Image" src="../securityimage/securityimage.php" /></div>
					<div class="style40 comfirmCode">確認碼：請照著上方您所看到的字輸入，並請注意大小寫，需正確輸入。</div>                    
					<input type="text" name="securityImageValue" style="font-size:9pt;float:left;width:80px;height:17px;">
				</li>
			</ul>
		</li>
	</ul>
	<div class="registFooter">
		<div class="footerTop"></div>
		<div class="subCateSelection">
			<input type="button" name="Submit" value="送出" class="submit" />　
			<input name="reset" type="reset" value="重新設定" class="reset">
			<input name="cancel" type="button" value="上一步" class="cancel">
			<input type="hidden" name="ACCOUNT" value="{$ACCOUNT}">
			<input type="hidden" name="PWD" value="{$PWD}">
		</div>
		<div class="footerBottom"></div>
	</div>
</form>
<script>
{literal}
function data_check(){
    var M_NAME=document.pers_data.M_NAME.value;
    var PHONE=document.pers_data.PHONE.value;
    var MOBILE=document.pers_data.MOBILE.value;
    var address=document.pers_data.address.value;
    var RECEIPT_TYPE=document.pers_data.RECEIPT_TYPE.value;
	var RECEIPT_SN=document.pers_data.RECEIPT_SN.value;
    var RECEIPT_addressr=document.pers_data.RECEIPT_addressr[0].checked;
    var addressr=document.pers_data.addressr.value;
	var EMAIL=document.pers_data.EMAIL.value;
	var comany_nm=document.pers_data.comany_nm.value;
    var securityImageValue=document.pers_data.securityImageValue.value;
	if(M_NAME==""){
	    alert("請輸入姓名！");
		document.pers_data.M_NAME.focus();
		return;
	}
	if(EMAIL && !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(EMAIL))){	   
        alert("信箱格式錯誤請確實填寫!!");
		document.pers_data.EMAIL.value=""
		document.pers_data.EMAIL.focus();
		return;	
	}
	if(PHONE=="" && MOBILE==""){
	    alert("至少要輸入一組聯絡電話！");
		document.pers_data.PHONE.focus();
		return;
	}
	if(address==""){
	    alert("請輸入送貨地址！");
		document.pers_data.address.focus();
		return;
	}
	if(comany_nm && comany_nm.match(/[\"\;\'\$]/)){
	    alert("請勿輸入符號！");
		document.pers_data.PHONE.focus();
		return;	
	}
	if(RECEIPT_SN && (isNaN(RECEIPT_SN) || RECEIPT_SN.length!=8)){
	    alert("請輸入正確的統一編號！");
		document.pers_data.RECEIPT_SN.value=""
		document.pers_data.RECEIPT_SN.focus();
		return;		
	}
	if(RECEIPT_TYPE==""){
	    alert("請選擇發票種類！");
		document.pers_data.RECEIPT_TYPE.focus();
		return;
	}
	if(document.pers_data.RECEIPT_addressr[1].checked && addressr==""){
	    alert("請輸入發票地址！");
		document.pers_data.rm1.focus();
		return;
	}
	if(securityImageValue.length==0){
	    alert("請照著系統所提示的文字輸入！");
		document.pers_data.securityImageValue.focus();
		return;
	}
	document.pers_data.submit();
}
function cancel(){
	window.history.back();
}
;(function($){
	$(".submit").bind("click", data_check);
	$(".cancel").bind("click", cancel);
	var receiveAdress= $("input[name='RECEIPT_addressr']");
	receiveAdress.bind("click", function(event){
		var target= $(event.target);
		var adrees= $("input[name='addressr']");
		if(target.val() == 0){
			adrees.attr("disabled", true);
		}else{
			adrees.attr("disabled", false);
		}
	});
})(jQuery);
{/literal}
</script>