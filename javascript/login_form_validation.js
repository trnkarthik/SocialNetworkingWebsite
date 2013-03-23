
     
     count= 0;
     
     function validate_form()
    {
        if(check_emails_pwd()){ 
        validate_passwords();
        validate_emails();
        }
    }
    function validate_passwords()
    {
        var p1=document.getElementById('pwd1').value;
        var p2=document.getElementById('pwd2').value;
        if(p1!=p2)
        {
            alert("Passwords not matched");
            count++;
        }
    }
     function validate_emails()
    {
        var p1=document.getElementById('em1').value;
        var p2=document.getElementById('em2').value;
        if(p1!=p2)
        {
            alert("Emails not matched");
            count++;
        }
    }
    function check_emails_pwd()
    {
        var p1=document.getElementById('em1').value;
        var p2=document.getElementById('em2').value;
        var p3=document.getElementById('pwd1').value;
        var p4=document.getElementById('pwd2').value;
        
        if(p1=="" || p2=="" || p3=="" || p4=="")
        {
            alert("Please dont leave the required fields empty");
            count++;
            return false;
        }
        else{
            return true;
        }
    }
function validate()
{
    if(count>0)
    {
        return true;
    }
    else
    {
        return false;
    }
}