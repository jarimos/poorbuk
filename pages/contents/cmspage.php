

<!--style="display:none;" -->
<div id="testingNow"></div>




<div id="divWebsiteName" style="float:left;width:350px;margin:20px;">

	<div  class="labelInput">Show post only for this website</div>	
	
	<select style="margin:20px;" id="showPostByWebsiteName" name="showPostByWebsiteName" onchange="phpcmsShowPostByWebsiteNameBox1(this.value);" >	<!--onchange="phpcmsShowPostByWebsiteNameBox1()" -->


	</select>	

	<div id="postsWrapper" style="clear:none;float:left;width:340px;">

	</div>

</div>





<!---FIRST COLUMN ---------------->

<!---BUTTONS SHOW HIDE GARBAGE, SAVE, NEW, EDIT---------------->		

	<div id="first-column-buttons-webnames" style="float:left;">	
	
			<br><br>
			<button id="buttonShowGarbage">Show / Hide Garbage</button>						
			<br>
			<button class="insertPost buttonTextEditor mySubmitButton green">Save</button>	
			<br><br>
			<button id="buttonNewPostCMS" class="buttonTextEditor mySubmitButton green">New</button>	
			<br><br>
			<button style="width:120px;" id="phpcmsButtonEditPostFullTime" class="buttonTextEditor mySubmitButton green">Edit ON-OFF</button>	
<!--		<br><br>
			<button id="phpcmsButtonEditPostCMS" class="buttonTextEditor mySubmitButton green">Edit</button>	
			<br><br>
-->
			<br><br>
			<br>
		
<!---EDIT WEBSITE NAME, POST NAME , URL, FULL URL---------------->
			<div id="wrapperWebEdit1">
			
					<div id="wrapperForWebsiteName" style="border:solid 1px grey;padding:8px;">
						<div class="labelInput">Choose an existing Website Name </div>	
						<select id="websiteNamesForUser" name="websiteNamesForUser"  style="margin:20px;" onchange="phpcmsShowPostByWebsiteNameBox1(this.value)"   ><!--onchange="phpcmsShowPostByWebsiteNameBox2()" -->	
						</select>	
						<div class="labelInput">..or write a new</div>		
						<input  maxlength="200" style="width:160px;" type="text" onchange="$('#pId').val('');" placeholder="New Website Name" name="pWebsiteName"  id="pWebsiteName" >
						<input  maxlength="20" style="display:none;width:160px;" type="text"  placeholder="pWebId" name="pWebId"  id="pWebId" >
					</div>
					
					<br><br>	
					<div class="labelInput">Title</div>		
					<input  maxlength="200" style="width:160px;" type="text"  onchange="var pTitle =$(this).val();$('#mName').val(pTitle);" placeholder="Title" name="pTitle"  id="pTitle" >
					<br><br>	
					<div class="labelInput">Friendly url</div>		
					<input  maxlength="200" style="width:160px;" type="text"   onchange="" placeholder="Url" name="pUrl"  id="pUrl" >
					<br><br>		
					<div class="labelInput">Full link to post</div>	
					<div id="fullUrl"  style="font-size:18px;" class="labelInput"></div>		
					<br><br>	
					<input  maxlength="20" style="display:none;width:160px;" type="text"  placeholder="pId" name="pId"  id="pId" >
			</div><!--wrapperWebEdit1-->
			
			
			
			<!---SHOW WEBSITE NAME, POST NAME , URL, FULL URL---------------->			
			<div id="wrapperWebShow1">
			
					<div id="wrapperForWebsiteName" style="border:solid 1px grey;padding:8px;">
						<div class="labelInput">Website Name </div>	
						<div id ="showpWebsiteName" class="labelInput"></div>			
					</div>
					
					<br><br>	
					<div class="labelInput">Title</div>		
					<div id ="showpTitle" class="labelInput"></div>	
					<br><br>	
					<div class="labelInput">Friendly url</div>	
					<div id ="showpUrl" class="labelInput"></div>						
						<br><br>		
					<div class="labelInput">Full link to post</div>	
					<div id="showpFullUrl"  style="font-size:18px;" class="labelInput"></div>		
					<br><br>	
			</div><!--wrapperWebShow1-->
	</div><!--first-column-buttons-webnames-->
<!---END FIRST COLUMN ---------------->	

	
<!---SECOND COLUMN ---------------->	
<!---MENUS---------------->
	
	<div id="second-column-all-menus" style="margin-left:40px;margin-top:40px;float:left;clear:right;">	

<!---EDIT MENUS---------------->	
		<div id="wrapperWebEdit2">	
		
			<div style="font-size:24px;color:grey;font-weight: bold;" class="labelInput">MENUS</div>	
			<div class="labelInput">Menu name</div>		
				<input  maxlength="200" style="width:160px;" type="text"   onchange="" placeholder="Menu Name" name="mName"  id="mName" >
				<br><br>		
				
						<div class="labelInput">Parent menu</div>			
						<select id="mParent" name="mParent">	
							<option value='NO'>NO</option>
						</select>	
						<br><br>
						
						<div class="labelInput">Menu active</div>			
						<select id="mActive" name="mActive">	
							<option value='YES'>YES</option>
							<option value='NO'>NO</option>

						</select>	
						<br><br>

						<div style="display:none;">				
										<div class="labelInput">Menu type</div>			
										<select id="mType" name="mType">	
											<option value='Main'>Main</option>
											<option value='Lateral'>Lateral</option>
										</select>	
										<br><br>
						</div>
						
						<div class="labelInput">Menu position</div>			
						<select id="mPosition" name="mPosition">	
							<option value='0'>0</option>
							<option value='1'>1</option>
							<option value='2'>2</option>
							<option value='3'>3</option>
							<option value='4'>4</option>
							<option value='5'>5</option>
							<option value='6'>6</option>
							<option value='7'>7</option>
							<option value='8'>8</option>
							<option value='9'>9</option>
							<option value='10'>10</option>
							<option value='11'>11</option>
							<option value='12'>12</option>
							<option value='13'>13</option>
							<option value='14'>14</option>
							<option value='15'>15</option>
						</select>	
						<br><br>

						<div class="labelInput">All menus</div>			
						<select id="mAllmenus" name="mAllmenus" onchange="phpcmsOptionBoxMenuSelectedShowPost();" >	

							

						</select>	
						<br><br>

		</div><!--wrapperWebEdit2-->
		
		
		
<!---SHOW MENUS---------------->
		
		<div id="wrapperWebShow2">

				<div id="wrapperForWebsiteName" style="border:solid 1px grey;padding:8px;">
					<div class="labelInput">Menu name </div>	
					<div id ="showmName" class="labelInput"></div>			
				</div>
				<br><br>	
				<div class="labelInput">Parent menu</div>		
				<div id ="showmParent" class="labelInput"></div>		
				<br><br>	
				<div class="labelInput">Menu active</div>		
				<div id ="showmActive" class="labelInput"></div>	
				<br><br>	
				<div class="labelInput">Menu type</div>	
				<div id ="showmType" class="labelInput"></div>						
					<br><br>		
				<div class="labelInput">Menu position</div>	
				<div id="showmPosition"  style="font-size:18px;" class="labelInput"></div>		
				<br><br>	
		</div><!--wrapperWebShow1-->		
	</div><!--second-column-all-menus-->
	
<!---END SECOND COLUMN ---------------->	
	
	
	
<div id="textEditorWrapperAllJarim" style="">	
<!---------------------------------------------------------------------------------------->


		
<!---TEXT EDITOR HTML-------------------------------------------------------------------------------------------------------->		
<form enctype="multipart/form-data" accept-charset="UTF-8" name="compForm" method="post" action="" onsubmit="alert(textEditorObject.innerHTML);return false;" >	

<!--		
		<!-- onsubmit="if(validateMode()){this.myDoc.value=textEditorObject.innerHTML;return true;}return false;"> -->
		<input type="hidden" name="myDoc">
		
	
		
		<div id="textEditorToolbar1">
				<p id="labelShowHTML" style="margin-left:30px;margin-right:20px;float:left;">
				
				<input type="checkbox" name="switchMode" id="switchBox" onchange="textEditorShowPlainHtml(this.checked);" /> 
					<br>
					<label for="switchBox">
						HTML
					</label>
				</p>		
				<div class="buttonTextEditor"  id="insertImage"  title="insertImage" onclick="formatDoc('insertHTML');" >INSERT IMAGE
				</div>
				<select onchange="formatDoc('formatblock',this[this.selectedIndex].value);this.selectedIndex=0;">
				<option selected>-format-</option>
				<option value="h1">h1</option>
				<option value="h2">h2</option>
				<option value="h3">h3</option>
				<option value="h4">h4</option>
				<option value="h5">h5</option>
				<option value="h6">h6</option>
				<option value="p">p</option>
				<option value="pre">pre</option>
				</select>
				<select onchange="formatDoc('fontname',this[this.selectedIndex].value);this.selectedIndex=0;">
				<option selected>-font-</option>
				<option>Arial</option>
				<option>Arial B</option>
				<option>Courier</option>
				<option>Times</option>
				</select>
				<select onchange="formatDoc('fontsize',this[this.selectedIndex].value);this.selectedIndex=0;">
				<option  selected>- size -</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				</select>
				<select onchange="formatDoc('forecolor',this[this.selectedIndex].value);this.selectedIndex=0;">
				<option  selected>-color-</option>
				<option value="red">Red</option>
				<option value="blue">Blue</option>
				<option value="green">Green</option>
				<option value="black">Black</option>
				</select>
				<select onchange="formatDoc('backcolor',this[this.selectedIndex].value);this.selectedIndex=0;">
				<option selected>-backgr-</option>
				<option value="red">Red</option>
				<option value="green">Green</option>
				<option value="black">Black</option>
				</select>
		</div>
		
		
		<div id="toolBar2">
				<img class="textEditorIcons" title="Delete All" onclick="if(validateMode()&&confirm('Are you sure?')){textEditorObject.innerHTML=textEditorText;};" src="data:image/gif;base64,R0lGODlhFgAWAIQbAD04KTRLYzFRjlldZl9vj1dusY14WYODhpWIbbSVFY6O7IOXw5qbms+wUbCztca0ccS4kdDQjdTLtMrL1O3YitHa7OPcsd/f4PfvrvDv8Pv5xv///////////////////yH5BAEKAB8ALAAAAAAWABYAAAV84CeOZGmeaKqubMteyzK547QoBcFWTm/jgsHq4rhMLoxFIehQQSAWR+Z4IAyaJ0kEgtFoLIzLwRE4oCQWrxoTOTAIhMCZ0tVgMBQKZHAYyFEWEV14eQ8IflhnEHmFDQkAiSkQCI2PDC4QBg+OAJc0ewadNCOgo6anqKkoIQA7" />
				<img class="textEditorIcons" title="Print" onclick="printDoc();" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAABGdBTUEAALGPC/xhBQAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9oEBxcZFmGboiwAAAAIdEVYdENvbW1lbnQA9syWvwAAAuFJREFUOMvtlUtsjFEUx//n3nn0YdpBh1abRpt4LFqtqkc3jRKkNEIsiIRIBBEhJJpKlIVo4m1RRMKKjQiRMJRUqUdKPT71qpIpiRKPaqdF55tv5vvusZjQTjOlseUkd3Xu/3dPzusC/22wtu2wRn+jG5So/OCDh8ycMJDflehMlkJkVK7KUYN+ufzA/RttH76zaVocDptRxzQtNi3mRWuPc+6cKtlXZ/sddP2uu9uXlmYXZ6Qm8v4Tz8lhF1H+zDQXt7S8oLMXtbF4e8QaFHjj3kbP2MzkktHpiTjp9VH6iHiA+whtAsX5brpwueMGdONdf/2A4M7ukDs1JW662+XkqTkeUoqjKtOjm2h53YFL15pSJ04Zc94wdtibr26fXlC2mzRvBccEbz2kiRFD414tKMlEZbVGT33+qCoHgha81SWYsew0r1uzfNylmtpx80pngQQ91LwVk2JGvGnfvZG6YcYRAT16GFtW5kKKfo1EQLtfh5Q2etT0BIWF+aitq4fDbk+ImYo1OxvGF03waFJQvBCkvDffRyEtxQiFFYgAZTHS0zwAGD7fG5TNnYNTp8/FzvGwJOfmgG7GOx0SAKKgQgDMgKBI0NJGMEImpGDk5+WACEwEd0ywblhGUZ4Hw5OdUekRBLT7DTgdEgxACsIznx8zpmWh7k4rkpJcuHDxCul6MDsmmBXDlWCH2+XozSgBnzsNCEE4euYV4pwCpsWYPW0UHDYBKSWu1NYjENDReqtKjwn2+zvtTc1vMSTB/mvev/WEYSlASsLimcOhOBJxw+N3aP/SjefNL5GePZmpu4kG7OPr1+tOfPyUu3BecWYKcwQcDFmwFKAUo90fhKDInBCAmvqnyMgqUEagQwCoHBDc1rjv9pIlD8IbVkz6qYViIBQGTJPx4k0XpIgEZoRN1Da0cij4VfR0ta3WvBXH/rjdCufv6R2zPgPH/e4pxSBCpeatqPrjNiso203/5s/zA171Mv8+w1LOAAAAAElFTkSuQmCC">
				<img class="textEditorIcons" title="Undo" onclick="formatDoc('undo');" src="data:image/gif;base64,R0lGODlhFgAWAOMKADljwliE33mOrpGjuYKl8aezxqPD+7/I19DV3NHa7P///////////////////////yH5BAEKAA8ALAAAAAAWABYAAARR8MlJq7046807TkaYeJJBnES4EeUJvIGapWYAC0CsocQ7SDlWJkAkCA6ToMYWIARGQF3mRQVIEjkkSVLIbSfEwhdRIH4fh/DZMICe3/C4nBQBADs=" />
				<img class="textEditorIcons" title="Redo" onclick="formatDoc('redo');" src="data:image/gif;base64,R0lGODlhFgAWAMIHAB1ChDljwl9vj1iE34Kl8aPD+7/I1////yH5BAEKAAcALAAAAAAWABYAAANKeLrc/jDKSesyphi7SiEgsVXZEATDICqBVJjpqWZt9NaEDNbQK1wCQsxlYnxMAImhyDoFAElJasRRvAZVRqqQXUy7Cgx4TC6bswkAOw==" />
				<img class="textEditorIcons" title="Remove formatting" onclick="formatDoc('removeFormat')" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAABGdBTUEAALGPC/xhBQAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAAd0SU1FB9oECQMCKPI8CIIAAAAIdEVYdENvbW1lbnQA9syWvwAAAuhJREFUOMtjYBgFxAB501ZWBvVaL2nHnlmk6mXCJbF69zU+Hz/9fB5O1lx+bg45qhl8/fYr5it3XrP/YWTUvvvk3VeqGXz70TvbJy8+Wv39+2/Hz19/mGwjZzuTYjALuoBv9jImaXHeyD3H7kU8fPj2ICML8z92dlbtMzdeiG3fco7J08foH1kurkm3E9iw54YvKwuTuom+LPt/BgbWf3//sf37/1/c02cCG1lB8f//f95DZx74MTMzshhoSm6szrQ/a6Ir/Z2RkfEjBxuLYFpDiDi6Af///2ckaHBp7+7wmavP5n76+P2ClrLIYl8H9W36auJCbCxM4szMTJac7Kza////R3H1w2cfWAgafPbqs5g7D95++/P1B4+ECK8tAwMDw/1H7159+/7r7ZcvPz4fOHbzEwMDwx8GBgaGnNatfHZx8zqrJ+4VJBh5CQEGOySEua/v3n7hXmqI8WUGBgYGL3vVG7fuPK3i5GD9/fja7ZsMDAzMG/Ze52mZeSj4yu1XEq/ff7W5dvfVAS1lsXc4Db7z8C3r8p7Qjf///2dnZGxlqJuyr3rPqQd/Hhyu7oSpYWScylDQsd3kzvnH738wMDzj5GBN1VIWW4c3KDon7VOvm7S3paB9u5qsU5/x5KUnlY+eexQbkLNsErK61+++VnAJcfkyMTIwffj0QwZbJDKjcETs1Y8evyd48toz8y/ffzv//vPP4veffxpX77z6l5JewHPu8MqTDAwMDLzyrjb/mZm0JcT5Lj+89+Ybm6zz95oMh7s4XbygN3Sluq4Mj5K8iKMgP4f0////fv77//8nLy+7MCcXmyYDAwODS9jM9tcvPypd35pne3ljdjvj26+H2dhYpuENikgfvQeXNmSl3tqepxXsqhXPyc666s+fv1fMdKR3TK72zpix8nTc7bdfhfkEeVbC9KhbK/9iYWHiErbu6MWbY/7//8/4//9/pgOnH6jGVazvFDRtq2VgiBIZrUTIBgCk+ivHvuEKwAAAAABJRU5ErkJggg==">
				<img class="textEditorIcons" title="Bold" onclick="formatDoc('bold');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAInhI+pa+H9mJy0LhdgtrxzDG5WGFVk6aXqyk6Y9kXvKKNuLbb6zgMFADs=" />
				<img class="textEditorIcons" title="Italic" onclick="formatDoc('italic');" src="data:image/gif;base64,R0lGODlhFgAWAKEDAAAAAF9vj5WIbf///yH5BAEAAAMALAAAAAAWABYAAAIjnI+py+0Po5x0gXvruEKHrF2BB1YiCWgbMFIYpsbyTNd2UwAAOw==" />
				<img class="textEditorIcons" title="Underline" onclick="formatDoc('underline');" src="data:image/gif;base64,R0lGODlhFgAWAKECAAAAAF9vj////////yH5BAEAAAIALAAAAAAWABYAAAIrlI+py+0Po5zUgAsEzvEeL4Ea15EiJJ5PSqJmuwKBEKgxVuXWtun+DwxCCgA7" />
				<img class="textEditorIcons" title="Left align" onclick="formatDoc('justifyleft');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAIghI+py+0Po5y02ouz3jL4D4JMGELkGYxo+qzl4nKyXAAAOw==" />
				<img class="textEditorIcons" title="Center align" onclick="formatDoc('justifycenter');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAIfhI+py+0Po5y02ouz3jL4D4JOGI7kaZ5Bqn4sycVbAQA7" />
				<img class="textEditorIcons" title="Right align" onclick="formatDoc('justifyright');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAIghI+py+0Po5y02ouz3jL4D4JQGDLkGYxouqzl43JyVgAAOw==" />
				<img class="textEditorIcons" title="Numbered list" onclick="formatDoc('insertorderedlist');" src="data:image/gif;base64,R0lGODlhFgAWAMIGAAAAADljwliE35GjuaezxtHa7P///////yH5BAEAAAcALAAAAAAWABYAAAM2eLrc/jDKSespwjoRFvggCBUBoTFBeq6QIAysQnRHaEOzyaZ07Lu9lUBnC0UGQU1K52s6n5oEADs=" />
				<img class="textEditorIcons" title="Dotted list" onclick="formatDoc('insertunorderedlist');" src="data:image/gif;base64,R0lGODlhFgAWAMIGAAAAAB1ChF9vj1iE33mOrqezxv///////yH5BAEAAAcALAAAAAAWABYAAAMyeLrc/jDKSesppNhGRlBAKIZRERBbqm6YtnbfMY7lud64UwiuKnigGQliQuWOyKQykgAAOw==" />
				<!--
				<img class="textEditorIcons" title="Quote" onclick="formatDoc('formatblock','blockquote');" src="data:image/gif;base64,R0lGODlhFgAWAIQXAC1NqjFRjkBgmT9nqUJnsk9xrFJ7u2R9qmKBt1iGzHmOrm6Sz4OXw3Odz4Cl2ZSnw6KxyqO306K63bG70bTB0rDI3bvI4P///////////////////////////////////yH5BAEKAB8ALAAAAAAWABYAAAVP4CeOZGmeaKqubEs2CekkErvEI1zZuOgYFlakECEZFi0GgTGKEBATFmJAVXweVOoKEQgABB9IQDCmrLpjETrQQlhHjINrTq/b7/i8fp8PAQA7" />
				-->
				<img class="textEditorIcons" title="Add indentation" onclick="formatDoc('outdent');" src="data:image/gif;base64,R0lGODlhFgAWAMIHAAAAADljwliE35GjuaezxtDV3NHa7P///yH5BAEAAAcALAAAAAAWABYAAAM2eLrc/jDKCQG9F2i7u8agQgyK1z2EIBil+TWqEMxhMczsYVJ3e4ahk+sFnAgtxSQDqWw6n5cEADs=" />
				<img class="textEditorIcons" title="Delete indentation" onclick="formatDoc('indent');" src="data:image/gif;base64,R0lGODlhFgAWAOMIAAAAADljwl9vj1iE35GjuaezxtDV3NHa7P///////////////////////////////yH5BAEAAAgALAAAAAAWABYAAAQ7EMlJq704650B/x8gemMpgugwHJNZXodKsO5oqUOgo5KhBwWESyMQsCRDHu9VOyk5TM9zSpFSr9gsJwIAOw==" />
				<img class="textEditorIcons" title="Hyperlink" onclick="var sLnk=prompt('Write the URL here','http:\/\/');if(sLnk && sLnk!=='' && sLnk !== 'http://'){formatDoc('createlink',sLnk);}" src="data:image/gif;base64,R0lGODlhFgAWAOMKAB1ChDRLY19vj3mOrpGjuaezxrCztb/I19Ha7Pv8/f///////////////////////yH5BAEKAA8ALAAAAAAWABYAAARY8MlJq7046827/2BYIQVhHg9pEgVGIklyDEUBy/RlE4FQF4dCj2AQXAiJQDCWQCAEBwIioEMQBgSAFhDAGghGi9XgHAhMNoSZgJkJei33UESv2+/4vD4TAQA7" />
				<!--
				<img class="textEditorIcons" title="Cut" onclick="formatDoc('cut');" src="data:image/gif;base64,R0lGODlhFgAWAIQSAB1ChBFNsRJTySJYwjljwkxwl19vj1dusYODhl6MnHmOrpqbmpGjuaezxrCztcDCxL/I18rL1P///////////////////////////////////////////////////////yH5BAEAAB8ALAAAAAAWABYAAAVu4CeOZGmeaKqubDs6TNnEbGNApNG0kbGMi5trwcA9GArXh+FAfBAw5UexUDAQESkRsfhJPwaH4YsEGAAJGisRGAQY7UCC9ZAXBB+74LGCRxIEHwAHdWooDgGJcwpxDisQBQRjIgkDCVlfmZqbmiEAOw==" />
				<img class="textEditorIcons" title="Copy" onclick="formatDoc('copy');" src="data:image/gif;base64,R0lGODlhFgAWAIQcAB1ChBFNsTRLYyJYwjljwl9vj1iE31iGzF6MnHWX9HOdz5GjuYCl2YKl8ZOt4qezxqK63aK/9KPD+7DI3b/I17LM/MrL1MLY9NHa7OPs++bx/Pv8/f///////////////yH5BAEAAB8ALAAAAAAWABYAAAWG4CeOZGmeaKqubOum1SQ/kPVOW749BeVSus2CgrCxHptLBbOQxCSNCCaF1GUqwQbBd0JGJAyGJJiobE+LnCaDcXAaEoxhQACgNw0FQx9kP+wmaRgYFBQNeAoGihCAJQsCkJAKOhgXEw8BLQYciooHf5o7EA+kC40qBKkAAAGrpy+wsbKzIiEAOw==" />
				<img class="textEditorIcons" title="Paste" onclick="formatDoc('paste');" src="data:image/gif;base64,R0lGODlhFgAWAIQUAD04KTRLY2tXQF9vj414WZWIbXmOrpqbmpGjudClFaezxsa0cb/I1+3YitHa7PrkIPHvbuPs+/fvrvv8/f///////////////////////////////////////////////yH5BAEAAB8ALAAAAAAWABYAAAWN4CeOZGmeaKqubGsusPvBSyFJjVDs6nJLB0khR4AkBCmfsCGBQAoCwjF5gwquVykSFbwZE+AwIBV0GhFog2EwIDchjwRiQo9E2Fx4XD5R+B0DDAEnBXBhBhN2DgwDAQFjJYVhCQYRfgoIDGiQJAWTCQMRiwwMfgicnVcAAAMOaK+bLAOrtLUyt7i5uiUhADs=" />
				-->
				<img class="textEditorIcons" title="insertHTML" onclick="formatDoc('insertHTML');" src="data:image/gif;base64,R0lGODlhFgAWAIQUAD04KTRLY2tXQF9vj414WZWIbXmOrpqbmpGjudClFaezxsa0cb/I1+3YitHa7PrkIPHvbuPs+/fvrvv8/f///////////////////////////////////////////////yH5BAEAAB8ALAAAAAAWABYAAAWN4CeOZGmeaKqubGsusPvBSyFJjVDs6nJLB0khR4AkBCmfsCGBQAoCwjF5gwquVykSFbwZE+AwIBV0GhFog2EwIDchjwRiQo9E2Fx4XD5R+B0DDAEnBXBhBhN2DgwDAQFjJYVhCQYRfgoIDGiQJAWTCQMRiwwMfgicnVcAAAMOaK+bLAOrtLUyt7i5uiUhADs=" />

		
                

                
                </div>
	<!--
                                <button id="searhTextEditor">SEARCH</button>
                                <button id="reinitializeSearchTextEditor">SEARCH-REINITIALIZE</button>
                                <button id="replaceTextEditor">REPLACE</button>
                                <button id="replaceAllTextEditor">REPLACE ALL</button>	
        -->
	
		<div id="textEditorJarim" contenteditable="true"></div>
		<!--textEditorPreElementForHTML.id = "jarimTextId";-->


		<!--<p><input type="submit" value="TESTING" /></p>-->
</form>

		<button  class="insertPost buttonTextEditor mySubmitButton green" style="margin-left:30px;">Save</button>	
		

</div>		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
<!---------OPTION ELEMENTS--------------------------------------------------------------------------------->	



	<div class="textEditorOptionsJarim" style="">	
			<div class="labelInput">Header file</div>
			<select id="pHeader" name="pHeader">	
				<option value='header.php'>header.php</option>			
				<?php	
					$my_file_path = "/pages/headers/";
					$ignoreFiles = Array(".", "..", "header.php");
					showFolderFiles	($my_file_path,$ignoreFiles);
				?>
                        </select>		
			<br><br>
			<div class="labelInput">Menu file</div>		
			<select id="pMenu" name="pMenu">			
				<option value='menu.php'>menu.php</option>			
				<?php	
					$my_file_path = "/pages/menus/";
					$ignoreFiles = Array(".", "..", "menu.php");
					showFolderFiles	($my_file_path,$ignoreFiles);
				?>
			</select>
			<br><br>
			
			
			<div class="labelInput">Content file</div>
			<select id="pContent" name="pContent">		
				<option value='content.php'>content.php</option>			
				<?php	
					$my_file_path = "/pages/contents/";
					$ignoreFiles = Array(".", "..", "content.php");
					showFolderFiles	($my_file_path,$ignoreFiles);
				?>
			</select>
			<br><br>

			
			<div class="labelInput">Footer file</div>		
			<select id="pFooter" name="pFooter">	
				<option value='footer.php'>footer.php</option>		
				<?php	
					$my_file_path = "/pages/footers/";
					$ignoreFiles = Array(".", "..", "footer.php");
					showFolderFiles	($my_file_path,$ignoreFiles);
				?>
			</select>
			<br><br>
		
		
		
		
		
		</div>
		

		
		<div class="textEditorOptionsJarim" style="">	
			
				<div class="labelInput">Post type</div>		
				<select id="pType" name="pType">	
					<option value='page'>page</option>
					<option value='front-page'>front-page</option>
					<option value='post'>post</option>
				</select>
				<br><br>
				
				
				<div class="labelInput">Published</div>			
				<select id="pPublished" name="pPublished">	
					<option value='YES'>YES</option>
					<option value='NO'>NO</option>
				</select>
				<br><br>
				
				<div class="labelInput">Comment allowed</div>				
				<select id="pCommentAllowed" name="pCommentAllowed">	
					<option value='NO'>NO</option>
					<option value='YES'>YES</option>
				</select>	
				<br><br>
				
				<div class="labelInput">Love allowed</div>			
				<select id="pLoveAllowed" name="pLoveAllowed">	
					<option value='NO'>NO</option>
					<option value='YES'>YES</option>
				</select>	
				<br><br>
		
		</div>
		
		
		
		
	<div class="textEditorOptionsJarim" style="">	

				<div class="labelInput">Password</div>
				<input  maxlength="30" style="width:160px;" type="password"  placeholder="" id="pPass" name="pPass"  >
				</br>
				<div class="labelInput">Repeat password</div>
				<input  maxlength="30" style="width:160px;" type="password"  placeholder="" id="pPass2" name="pPass2"  >
				</br>
				<br><br>
				<!--<button class="insertPost buttonTextEditor mySubmitButton green">Save all</button>-->
		
	</div>
	
		<div class="buttonTextEditor buttonAddEditorToWebsite"  id="buttonAddEditorToWebsite"  title="buttonAddEditorToWebsite" onclick="formatDoc('insertHTML');" >Add another editor to this Website
		</div>






<!--ADD NEW EDITOR TO WEBSITE!!!!-->
		
<div id="overlayButtonAddEditorToWebsite"  >
		<div id="dialogButtonAddEditorToWebsite" >
			<table class="tableCheckBox">

			<tr >
				<td>
						<div id="divWebsiteNameAddEditor" style="float:left;width:350px;">

							<div  class="labelInput">Select website name to add editor</div>	
							
							<select style="margin-bottom:40px;" id="showPostByWebsiteNameAddEditor" name="showPostByWebsiteNameAddEditor" onchange="phpcmsShowPostByWebsiteNameBox1()" >	


							</select>	

						</div>
				</td>

			</tr>

			<tr >
				<td>
				

											
						<div  class="labelGeneral" id="divfinduserbyname" >Search users by name</div>			
						<input style="margin-bottom:40px;" type="text" id="inputUserFinderbynameAddEditor" class="inputUserFinderbynameAddEditor"  onkeyup="phpcmsAddEditorFriendFinder(this.value)" />
						<div  id="txtHint"></div>	
					
					<!--<div  id="txtHint"></div>-->	
					



			<!--		<div  id="divProfileFriendAllWrapper">
						<div  id="divProfileFriendProfile"></div>
						<div  id="divProfileFriendFriends"  ></div>			
						<div  id="divProfileFriendPosts"  ></div>	
			-->

					
					</div>	
				</td>

			</tr>
			<tr >
				<td>
						
							<!--<button class="buttonTextEditor" id="insertImageDialogBox" >Insert</button><br><br>-->
							<button class="buttonTextEditor" id="phpcmsButtonAddEditorToWebsiteCancel" >Salir</button>
				</td>

			</tr>

			</table>

				<!--*********END UPLOAD PICTURE IN IMG TAG FORM ONCHANGE UPDATE MY TEXT EDITOR  *************************************************--> 

				<br><br>
<!--				<input type="text" class="" id="imageUrl" name="imageUrl"  placeholder="Url" /><br>
				<input type="text" class=""  id="imageText" name="imageText" placeholder="Text" /><br>
				<input type="text" class=""  id="imageAlt" name="imageAlt" placeholder="Alt"/><br>
				<input type="text" class=""  id="imageWidth" name="imageWidth" placeholder="Width"/><br>
				<input type="text" class=""  id="imageHeight" name="imageHeight" placeholder="Height"/><br><br>
-->

		</div> 
</div><!--END overlayButtonAddEditorToWebsite-->




<div id="overlayStatus"  >
	<!--<div id="overlay_div_Status" " >-->
		<!--<img id="overlayImage" style="width:600px;" src="jarimImages/big.jpg" alt="A Random Image" />-->
			<div id="divLoadingStatus" >Loading...<br><img src="files/images/loader.gif" ><br></div>	
		<!--<div id="close_button" >X</div>-->
	<!--</div>-->
</div>

<div id="overlayMessages" >
	<!--<div id="overlay_div_Status" " >-->
		<!--<img id="overlayImage" style="width:600px;" src="jarimImages/big.jpg" alt="A Random Image" />-->
		<div id="divAllMessagesWrapper" >
			<div  id="divAllMessages" ></div>	
			<div class ="close_button" id="close_button_Messages" >X</div>
		</div>
	<!--</div>-->
</div>

<div id="overlayInsertHTMLImage"  >
		<div id="dialogInsertHTMLImage" >
				<!--*********UPLOAD PICTURE IN IMG TAG FORM ONCHANGE UPDATE MY TEXT EDITOR  *************************************************--> 
				<form style="float:left;" id="uploadform"  method="post" accept=".bmp,.gif,.jpg,.jpeg,.png" enctype="multipart/form-data" target="uploadframe" >
					<div id="divFileImageAllWrapper" style="height:24px;" >	 
						<!--<img class="imgInputFileImage" src="files/icons/camera4242icon.png" style="">  -->
					
						<div style="position:relative;">
							<input type="button" class="red" id="pseudobutton" value="PHOTO">
							<input accept="image/*" type="file"  id="myfile" class="hidefileinput" name="myfile"     onchange="getElementById('FileField').value = getElementById('myfile').value;mysubmit();" onmousedown="buttonPush('depressed');" onmouseup="buttonPush('normal');" onmouseout="buttonPush('phased');">
							<div style="display:none;"  id="BrowserVisible">
								<input type="text" id="FileField" />
							</div>
						</div>

						<input style="display:none;" id="myuseridimage" type="text" name="myuseridimage">
						<input style="display:none;" id="userfolderimage" value="lort" type="text" name="userfolderimage">
						
					</div>
				</form>		
				<iframe style="background-color:white;display:none;"  id="uploadframe" name="uploadframe" src=""   width="700" height="200" ></iframe>
				<!--*********END UPLOAD PICTURE IN IMG TAG FORM ONCHANGE UPDATE MY TEXT EDITOR  *************************************************--> 

				<br><br>
				<input type="text" class="" id="imageUrl" name="imageUrl"  placeholder="Url" /><br>
				<input type="text" class=""  id="imageText" name="imageText" placeholder="Text" /><br>
				<input type="text" class=""  id="imageAlt" name="imageAlt" placeholder="Alt"/><br>
				<input type="text" class=""  id="imageWidth" name="imageWidth" placeholder="Width"/><br>
				<input type="text" class=""  id="imageHeight" name="imageHeight" placeholder="Height"/><br><br>
				<button class="buttonTextEditor" id="insertImageDialogBox" >Insert</button><br><br>
				<button class="buttonTextEditor" id="insertImageDialogBoxCancel" >Cancel</button>
		</div> 
</div>


	
	<!--phpcms CMS ------------------------------------------	-------------------------------------------------->	




	<!--CHECK THE USER ROLL AND REDIRECT IF NECCESSARY: NORMAL,TECNICO,EDITOR,ADMIN-->
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsCheckUserRoll.js"></script>

	
	
	<!--INITIALIZE VARS-->		
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsInitializeVars.js"></script>
	

	<!--INITIALIZE SHOW ALL POST-->		
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsInitializeShowAllPosts.js"></script>
	
	
	<!--VALIDATE FIELDS BEFORE INSERT NEW POST-->	
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsValidation.js"></script>	
	<!--INSERT NEW POST-->	
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsButtonInsertPost.js"></script>	
	<!--EDIT POST	-->		
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsButtonEditPost.js"></script>	
	<!--SHOW POST BY ID-->
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsShowPostById.js"></script>		

	<!--SHOW ONLY GARBAGE POSTS  -->		
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsInitializeShowAllPostsGarbageOnly.js"></script>


	<!--SHOW GARBAGE BUTTON POSTS (BACK-UPS OF PREVIOUSLY EDITED POSTS) -->		
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsButtonShowGarbage.js"></script>
	<!--EDIT GARBAGE POST-->		
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsButtonEditPostGarbage.js"></script>	
		
	<!--CHECK IF WEBSITE_NAME EXISTS-->		
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcms_check_If_Exists_New_WebsiteName.js"></script>
	<!--GET WEB_ID AND  WEBSITE_NAME -->		
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcms_get_WebId_WebsiteName.js"></script>
	



	<!--CHECK IF POST_URL EXISTS-->		
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmslookupUrlExistsByPostIdWebId.js"></script>

	<!--INSERT IMAGE DIALOG BOX SCRIPTS-->		
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsImageUpload.js"></script>	
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsButtonInsertImage.js"></script>	
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsButtonInsertImageDialogBox.js"></script>	
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsButtonInsertImageDialogBoxCancel.js"></script>

	<!--TEXT EDITOR-->		
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsTextEditorCMS.js"></script>
        
	<!--TEXT EDITOR SEARCH-REPLACE-->		
	<!--
        <script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsTextEditorSearchReplace.js"></script>
        -->
	<!--NEW POST BUTTON-->			
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsButtonNewPostCMS.js"></script>	

	<!--EDIT CMS SHOW FOR EDIT / SHOW FOR NO EDIT BUTTON-->			
<!--	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsButtonEditPostCMS.js"></script>	
-->
	<!--EDIT/NO EDIT SHOW-HIDE FUNCTIONS-->			
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsShowHidePostsForEditNotEdit.js"></script>	

	<!-- EDIT/NO EDIT BUTTON SHOW EDIT FULL TIME-->			
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsButtonEditPostFullTime.js"></script>	

	


	
	<!--*******WEBSITES NAMES + MENUS SHOW ALL FUNCTION****************************************-->	
	
	<!-- WEBSITES NAMES + MENUS SHOW ALL FUNCTION-->	
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsReinitializeWebnamesAndMenus.js"></script>	

	

	<!--*******MENUS****************************************-->	
	
	<!--SHOW MENU PARAMETERS:  NAME, PARENT POSITION AND ACTIVE BY WEB_ID AND U_ID-->	
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsMenusSetNameParentPositionActiveBymPId.js"></script>	

	<!--ALL MENUS BUT THIS TO OPTION BOX BY WEB_ID, UID AND PID -->
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsShowAllMenusMainButThisOneByUserWebsiteToOptionBox.js"></script>	

	<!--  SHOW ALL MENUS IN THE OPTION BOX - ALL MENUS -->	
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsMenusShowAllForWebIdToOptionBox.js"></script>

	<!--SHOW POST FOR THE SELECTED MENU - ALL MENUS = THE LAST OPTION BOX IN MENUS-->	
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsOptionBoxMenuSelectedShowPost.js"></script>	

	<!--SHOW ALL MENUS FOR WEB_ID-->
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsShowAllMenusMainToOptionBox.js"></script>

	

	
	
	<!--*******WEBSITES NAMES****************************************-->	
	
	<!-- SHOW WEBSITES NAMES FOR USER -  - ALL OPTIONS BOXES-->	
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsWebsiteNamesToOptionBox.js"></script>	
	
	<!--SHOW POSTS FOR THE CHOOSEN WEBSITE NAME (BY WEB_ID) IN THE FIRST OPTION BOX-->
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsShowPostByWebsiteNameBox1.js"></script>	
	
	<!-- SHOW POSTS FOR THE CHOOSEN WEBSITE NAME (BY WEB_ID) IN THE SECOND OPTION BOX-->	
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsShowPostByWebsiteNameBox2.js"></script>	
	
	

	


	<!--*******ADD EDITOR TO WEBSITE****************************************-->	

	
	<!--SHOW THE DIALOG BOX TO ADD EDITOR (VIA JQ-CSS) -->	
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsAddEditorButtonShow.js"></script>	
	
	<!--????HIDE THE DIALOG BOX TO ADD EDITOR (VIA JQ-CSS) AND RESET THE VALUES??? -->	
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsAddEditorButtonCancel.js"></script>	
	
	<!--TO ADD EDITORS (other poorbuk users) TO THE WEBSITE -->	
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsAddEditorFriendFinder.js"></script>	
	
	<!--ADD EDITOR TO WEBSITE FRIEND BUTTON FOR INSERTING FRIEND ID -->
	<script type="text/javascript" src="/application/modules/phpcms/scripts/phpcmsAddEditorButtonAddFriend.js"></script>
	



	
	<div id="targetElement" ></div>

