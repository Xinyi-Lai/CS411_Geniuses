var xmlHttp

document.write("<script type='text/javascript' src='getQueryString.js'></script>")

function load_page() {
    var search_item = getQueryString("search_item")
    var choosedb = getQueryString("choosedb")
    var user_id = getQueryString("user_id")
    load_related(search_item, choosedb, user_id)
}
 
function load_related(search_item, choosedb, user_id)
{
    // Get xmlHttpObject object，if null，then the browser doesn't suppport ajax
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
        alert ("Browser does not support HTTP Request")
        return false
    } 
    // Get url
    var url="get_related.php"
    url=url+"?search_item="+search_item+"&choosedb="+choosedb+"&user_id="+user_id
    url=url+"&sid="+Math.random()
    // Set the callback function
    xmlHttp.onreadystatechange=stateChanged 
    //open
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
    return false
} 
 
function stateChanged() 
{ 
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
    { 
        // Set the html content
        document.getElementById("related").innerHTML=xmlHttp.responseText 
        return false
    } 
}
 
// Get xmlHttp object
function GetXmlHttpObject()
{
    var xmlHttp=null;
    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttp=new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}
