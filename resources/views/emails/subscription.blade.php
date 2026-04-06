<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
    <p>Hello {{ $user->name ?? 'Subscriber' }},</p>
    <p>Thank you for subscribing to <strong>{{ isset($plan->name) ? $plan->name : 'Unknown Plan' }}</strong> plan.</p>
    <p>Your payment of <strong>${{ isset($plan->price) ? number_format($plan->price, 2) : '0.00' }}</strong> has been successfully processed.</p>
    
    <table>
        <tr>
            <td><strong>Plan:</strong></td>
            <td>{{ isset($plan->name) ? $plan->name : 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Amount Paid:</strong></td>
            <td>${{ isset($plan->price) ? number_format($plan->price, 2) : '0.00' }}</td>
        </tr>
        <tr>
            <td><strong>Payment Date:</strong></td>
            <td>{{ now()->format('F j, Y') }}</td>
        </tr>
        <tr>
            <td><strong>Subscription Valid Until:</strong></td>
            <td>{{ isset($user->activeSubscription->expired_at) ? $user->activeSubscription->expired_at->format('F j, Y') : 'N/A' }}</td>
        </tr>
    </table>
    

</body>
</html>
