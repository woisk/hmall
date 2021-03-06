<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" name="StoreForm" action="<?php echo U('store/add');?>" class="pageForm required-validate" onsubmit="return iframeCallback(this, navTabAjaxDone);" enctype="multipart/form-data">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>店铺名称：</dt>
			<dd>
		        <input name="name" type="text" class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>登陆密码：</dt>
			<dd>
		        <input name="pass" id="pass" type="password" class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>确认密码：</dt>
			<dd>
		        <input name="checkpwd" type="password" equalto="#pass" class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>店铺Logo：</dt>
			<dd>
			<input type="file" name="attach" id="attach" />
		    </dd>
		</dl>
		<dl>
			<dt>店铺等级：</dt>
			<dd>
			    <select name="storegrade" class="valid">
                <option value="0">请选择...</option>
			    <?php if(is_array($sg_list)): foreach($sg_list as $key=>$val): ?><option value="<?php echo ($val['sg_id']); ?>">&nbsp;&nbsp;<?php echo ($val['sg_name']); ?></option><?php endforeach; endif; ?>
			    </select>
		    </dd>
		</dl>
		<dl>
			<dt>店主姓名：</dt>
			<dd>
		        <input name="name_auth" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>身份证号：</dt>
			<dd>
		        <input name="idcard" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>店铺地址：</dt>
			<dd>
		        <input name="store_address" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>邮政编码：</dt>
			<dd>
		        <input name="store_zip" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>手机号：</dt>
			<dd>
		        <input name="store_mobile" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>店铺状态：</dt>
			<dd>
		        <input name="store_state" value="1" type="radio" checked />开启
		        <input name="store_state" value="0" type="radio" />关闭
		    </dd>
		</dl>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>