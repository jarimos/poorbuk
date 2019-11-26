function phpinstalacionCommentValidate()
{
    var instaid= localStorage["poorbook.instaid"];
    var userid= localStorage["poorbook.myuserid"];
    $("#myuserid").val(userid);
    $("#instaid").val(instaid);

    if( document.myForm.inputInstaComCurrantes.value == "" )
    {
        alert( "Por favor, inserta al menos un nombre en currantes" );
        document.myForm.inputInstaComCurrantes.focus() ;

        return false;
    }
    else
    {
        setStatus("Loading...", "divLoadingStatus");
        return true ;

    }


}
