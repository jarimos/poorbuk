
<div class="allContentWrapper">
<table class="tableCheckBox">
<tr>
	<td>
			<div class="labelGeneral" id="labelChatMessage">
				Chat
			</div>
	</td>
</tr>

<tr>
	<td>
	
		<!--USER FINDER ALL-->	
		<div id="divUserFinderAll">
		
			<div class="labelInput" id="labelFindUserByNameMessage">
				Buscar usuario
			</div>
			
			<input id="userfinderbynamePrivateMesssage" type="text" name="userfinderbyname" onkeyup="PrivateMessagefindUser(this.value);" />

			<!--USER FINDER-->	
			<div  id="txtHintFindUsersForMessage"><!--Person info will be listed here.--></div>
		
		<!--USER LIST-->	
			<div  id="divUsersListAll">	
				<div class="labelInput" id="labelForMessage">
					Para:
				</div>
				<div  id="divUsersListToSendToMesssages"></div>
			</div><!--divUsersListAll-->
		</div><!--divUserFinderAll-->
		
		<!--CONVERSATION ALL
		<div id="divConversationAll">

			<div id="divShowConversation" ></div>
		</div>
		
		<!--MESSAGE TEXT-->	
		
		<div class="labelInput" id="labelWriteHerMessage">
			<br>Escribe aquí:
		</div>
		<textarea class="textareaMessage" id="textareaMessage" ></textarea>
		<br><br><br>
		<button class="myButtonAll" id="buttonSubmitMessage">Enviar</button>
		
	</td>
	

</tr>

<tr >
	<td>
		<div id="divNewMessagesAllWrapper">
			<br><br>
			<div class="labelGeneral" id="labelNewMessages">
			Nuevos mensajes</div>	
			<div id="divShowNewMessages"></div>		
		</div>
		
		<br><br>
		<div class="labelGeneral" id="labelAllMyChats">
			Todos mis chats<br><br>
		</div>	
		<div id="divShowAllMessages"></div>
		<br><br><br><br>
	</td>

</tr>
<tr >
	<td>

		<br>
			<!--<button  id="buttonNewMessage" class="myButtonAll" >Nuevo chat</button>-->
		<br><br>
	
	</td>

</tr>
</table>


    <!-----phpmessagesfinduser --------------------------------------------------------------->				
    <script type="text/javascript" src="/application/modules/phpmessagesfinduser/scripts/phpmessageFindUser.js"></script>	
    <script type="text/javascript" src="/application/modules/phpmessagesfinduser/scripts/phpmessageAddUserToList.js"></script>

    <!-----phpmessages --------------------------------------------------------------->					
    <script type="text/javascript" src="/application/modules/phpmessages/scripts/phpmessagesSubmitMessage.js"></script>	
    <script type="text/javascript" src="/application/modules/phpmessages/scripts/phpmessagesShowConversation.js"></script>			
    <script type="text/javascript" src="/application/modules/phpmessages/scripts/phpmessagesButtonNewMessage.js"></script>	
    <script type="text/javascript" src="/application/modules/phpmessages/scripts/phpmessagesShowAllMessages.js"></script>						
    <script type="text/javascript" src="/application/modules/phpmessages/scripts/phpmessagesShowConversationButton.js"></script>			
    <script type="text/javascript" src="/application/modules/phpmessages/scripts/phpmessagesShowConversationNoStatus.js"></script>			
    <script type="text/javascript" src="/application/modules/phpmessages/scripts/phpmessagesRefreshConversationAuto.js"></script>			
    <script type="text/javascript" src="/application/modules/phpmessages/scripts/phpmessagesStart.js"></script>			
    <script type="text/javascript" src="/application/modules/phpmessages/scripts/phpmessagesShowNewMessages.js"></script>			
    <script type="text/javascript" src="/application/modules/phpmessages/scripts/phpmessagesShowAllMessagesNoStatus.js"></script>			


	
</div><!--<div class="allContentWrapper">-->


