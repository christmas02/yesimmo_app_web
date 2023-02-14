<div style="background-color:#fff">
    <div style="background-color:#fff">
        <div style="margin:0 auto;min-width:480px;max-width:600px">
        <!-- -->
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
            style="background-position:center center;background-size:contain;background-repeat:no-repeat;width:100%">
            <tbody>
                <!-- -->
                <tr>
                    <td align="left" valign="middle"  style="overflow:hidden;min-width:480px;max-width:600px;padding:0px 0px 0px 0px">
                        <a href="#" style="display:block;width:600px;height:88px" aria-hidden="true">
                            <img src="http://yesimmo.ci/img/header-email.jpg" width="600" height="88" title=""  alt="" border="0" style="display:block;width:600px;max-width:600px"class="CToWUd">
                        </a>
                    </td>
                </tr>
                <!-- -->
                <tr>
                    <td align="left" valign="top" style="direction:ltr;padding:0 24px 0 24px">
                        <p style="margin:0;padding:0;color:#131313;font-family:Roboto,Arial,Helvetica,sans-serif;font-size:16px;font-weight:400;line-height:24px;letter-spacing:0.1px">
                            <h3> Bonjour </h3>
                            @if($data['type'] == 2)
                            Monsieur/ Madame {{ $data['nom_agent']}} vous avez une viste prévue le {{ $data['date_debut']}} avec un client, {{ $data['nom_client']}} <br>Contact du client 
                            est {{ $data['phone_client']}} <br> Adresse mail  {{ $data['email_client']}}. <br><br>
                            @elseif($data['type'] == 1)
                            Monsieur/ Madame {{ $data['nom_agent']}} vous avez une reservation de l'appartement meublé  {{ $data['titre']}} pour la periode du {{ $data['date_debut']}} au {{ $data['date_fin']}}  par Mr / Mm {{ $data['nom_client']}} (Client) <br>
                            Contact du client est {{ $data['phone_client']}} <br> Adresse mail  {{ $data['email_client']}}. <br>
                            le montant de cette reservation est de {{ number_format($data['cout_sejour']) }} .XOF ,
                            <br>                                                   
                            @endif
                        </p>
                        <p><i>Merci, L'équipe </i></p>
                    </td>
                </tr>
                <!-- -->
                <tr>
                    <td align="left" valign="top"  style="direction:ltr;padding:0 24px 0 24px">
                        <p style="margin:0;padding:0;color:#131313;font-family:Roboto,Arial,Helvetica,sans-serif;font-size:16px;font-weight:400;line-height:24px;letter-spacing:0.1px">
                            <a href="http://yesimmo.ci/">www.yesimmobilier.ci</a>
                        </p>
                    </td>
                </tr>
                <!-- -->
                <tr>
                    <td style="font-size:0">
                        <div style="height:16px">&nbsp;</div>
                    </td>
                </tr>
                <!-- -->
                <tr>
                    <td style="font-size:0">
                        <div style="height:16px">&nbsp;</div>
                    </td>
                </tr>
                <!-- -->
                <tr>
                    <td align="left" valign="top"
                        style="direction:ltr;padding:0 24px 0 24px">
                        <p style="margin:0;padding:0;color:#606060;font-family:Roboto,Arial,Helvetica,sans-serif;font-size:12px;font-weight:400;line-height:18px">
                            Cette notification vous a été envoyée afin de confirmer votre demande de bien immobilier. <br>
                            Si vous n’êtes pas l’auteur de cette action veuillez ignorer ce mail.
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- -->
        </div>
    </div>
</div>