<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Assign Mail</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center" valign="top" bgcolor="#ababab" style="background-color:#ababab;"><br>
            <br>
            <table width="600" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left" valign="top"></td>
                </tr>
                <tr>
                    <td align="left" valign="top" bgcolor="#ffffff" style="background-color:#ffffff;"><table width="570" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:15px;">
                            <tr>
                                <td align="left" valign="middle" style="padding:10px;"></td>
                            </tr>
                        </table>
                        <table width="570" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:15px;">
                            <tr>
                                <td width="360" align="left" valign="middle" style="font-family:Arial, Helvetica, sans-serif; color:#4e4e4e; font-size:13px; padding-right:10px;">
                                    <div style="font-size:24px;">You are assigned to a new Project!<br>
                                        <br>
                                    </div>
                                    <h2>Name: {{$project[0]->projectName}}</h2></td>
                                <td align="right" valign="middle"><table width="210" border="0" cellspacing="0" cellpadding="0">

                                    </table></td>
                            </tr>
                        </table>
                        <table width="570" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:15px;">

                            <tr>
                                <td align="left" valign="middle" bgcolor="#1ba5db" style="padding:0px 20px 0px 20px; font-family:Arial, Helvetica, sans-serif; background-color:#1ba5db; color:#ffffff;"><div style="font-size:20px;">Main Technical: {{$project[0]->techSkill}} <br>

                                    </div>

                            </tr>

                        </table>
                        <table width="570" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:15px;">

                            <tr>
                                <td align="left" valign="middle" bgcolor="#1ba5db" style="padding:0px 20px 0px 20px; font-family:Arial, Helvetica, sans-serif; background-color:#1ba5db; color:#ffffff;"><div style="font-size:20px;">Customer code: {{$project[0]->customer_code}} <br>

                                    </div>

                            </tr>

                        </table>
                        <table width="570" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:15px;">

                            <tr>
                                <td align="left" valign="middle" bgcolor="#1ba5db" style="padding:0px 20px 0px 20px; font-family:Arial, Helvetica, sans-serif; background-color:#1ba5db; color:#ffffff;"><div style="font-size:20px;">Date Of Begin: {{$project[0]->dateOfBegin}} <br>

                                    </div>

                            </tr>

                        </table>
                        <table width="570" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:15px;">

                            <tr>
                                <td align="left" valign="middle" bgcolor="#1ba5db" style="padding:0px 20px 0px 20px; font-family:Arial, Helvetica, sans-serif; background-color:#1ba5db; color:#ffffff;"><div style="font-size:20px;">Team name: {{$team}} <br>

                                    </div>

                            </tr>

                        </table>
                        <table width="570" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:15px;">

                            <tr>
                                <td align="left" valign="middle" bgcolor="#1ba5db" style="font-size:20px;padding:0px 20px 0px 20px; font-family:Arial, Helvetica, sans-serif; background-color:#1ba5db; color:#ffffff;">Your colleague: <br>
                                    @foreach ($engineer as $name)


                                    <div style="font-size:15px;">{{$name}} </div>



                                    @endforeach
                                </td>
                            </tr>

                        </table>
                        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:20px;">
                            <tr>

                                <td width="50%" align="left" valign="middle" style="color:#595959; font-size:11px; font-family:Arial, Helvetica, sans-serif; padding:10px;"> <b>Company Address</b><br> Company URL: <a href="http://enclave.vn" target="_blank"  style="color:#595959; text-decoration:none;">http://enclave.vn</a><br>
                                    <br>
                                    <b>Hours:</b> Mon-Fri 8:00-5:00. Sat, Sun: Closed <br>

                            </tr>
                        </table></td>
                </tr>
            </table>
            <br>
            <br></td>
    </tr>
</table>
</body>
</html>
