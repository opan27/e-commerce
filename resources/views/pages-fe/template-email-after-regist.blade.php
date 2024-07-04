<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>SSSKIN - Email Credential</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900&display=swap" rel="stylesheet">
  </head>
  <body style="margin: 0; padding: 0; box-sizing: border-box;">
    <table align="center" cellpadding="0" cellspacing="0" width="95%">
      <tr>
        <td align="center">
          <table align="center" cellpadding="0" cellspacing="0" width="600" style="border-spacing: 2px 5px;" bgcolor="#fff">
            <tr>
              <td align="center" style="padding: 5px 5px 5px 5px;">
                <img src="https://ssskin.co.id/wp-content/uploads/2024/06/ss-logo-1.png" alt="">
              </td>
            </tr>
            <tr>
              <td bgcolor="#fff">
                <table cellpadding="0" cellspacing="0" width="100%%">
                  <tr>
                    <td style="padding: 10px 0 10px 0; font-family: Nunito, sans-serif; font-size: 20px; font-weight: 900">
                      Login Account
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td bgcolor="#fff">
                <table cellpadding="0" cellspacing="0" width="100%%">
                  <tr>
                    <td style="padding: 20px 0 20px 0; font-family: Nunito, sans-serif; font-size: 16px;">
                      Hi, {{$name}}
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 0; font-family: Nunito, sans-serif; font-size: 16px;">
                      Terima kasih telah mendaftar sebagai user di SSSKIN. Berikut ini Adalah Email Dan Password Anda.
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 0; font-family: Nunito, sans-serif; font-size: 16px;">
                      <p>Email : {{$email}}</p>
                      <p>Password : {{$pass}}
                    </td>
                  </tr>

                  <tr>
                    <td style="padding: 0; font-family: Nunito, sans-serif; font-size: 16px;">
                      Regarts,
                      <p>SSSKIN</p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
