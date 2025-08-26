<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Visitor Notification</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f9f9f9; padding:20px;">

    <table align="center" cellpadding="0" cellspacing="0" 
           style="max-width:600px; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 4px 8px rgba(0,0,0,0.1);">
        <tr>
            <td style="background:#4CAF50; color:white; padding:15px; text-align:center; font-size:20px;">
                Visitor Management System
            </td>
        </tr>
        <tr>
            <td style="padding:20px; color:#333;">
                <p><strong>New Visitor:</strong> {{ $visitor->name }}</p>
                <p>Please take action:</p>

                <a href="{{ url('/visitor/'.$visitor->id.'/approve') }}" 
                   style="display:inline-block; margin:10px 5px; padding:10px 15px; background:#4CAF50; color:#fff; text-decoration:none; border-radius:5px;">
                   ✅ Approve
                </a>

                <a href="{{ url('/visitor/'.$visitor->id.'/cancel') }}" 
                   style="display:inline-block; margin:10px 5px; padding:10px 15px; background:#db756e; color:#fff; text-decoration:none; border-radius:5px;">
                   ❌ Cancel
                </a>
            </td>
        </tr>
    </table>

</body>
</html>
