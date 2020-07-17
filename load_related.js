var xmlHttp
 
function load_related()
{
    console.log("load_related called");
    search_str = document.getElementById("search_box").value
    if (search_str.length==0)
    { 
        // document.getElementById("txtHint").innerHTML=""
        return false
    }
    // Get xmlHttpObject object，if null，then the browser doesn't suppport ajax
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
        alert ("Browser does not support HTTP Request")
        return false
    } 
    // Get url
    var url="get_related.php"
    url=url+"?q="+search_str
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
